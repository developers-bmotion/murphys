<?php


class CodelessHeaderImporter{

	var $process_list = array( 'install_header', 'install_footer' );

	public function __construct(){

		$current_theme = wp_get_theme();
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#','',$current_theme->get( 'Name' ) ) );

		add_action('wp_ajax_cl_import_header_data', array(&$this, 'ajax_handler'));
		add_action('wp_ajax_cl_import_footer_data', array(&$this, 'ajax_handler'));
	}

	public function ajax_handler(){
		$process = isset( $_POST['process']) ? esc_attr( $_POST['process'] ) : 0;
		
		if( esc_attr( $_POST['action'] ) == 'cl_import_header_data' )
			$this->process_install_header();

		if( esc_attr( $_POST['action'] ) == 'cl_import_footer_data' )
			$this->process_install_footer();
	}

	public function process_install_header(){
		$dir = esc_attr( $_POST['demo'] );
		$file = 'data.txt';
		$theme_mods = $this->read_file_header($file, $dir);

		if( $theme_mods && ! empty( $theme_mods ) ){
			foreach ((array) $theme_mods as $key => $val) {
				if( $key != 'dropdown_bg_color' && $key != 'dropdown_item_hover_bg' && $key != 'dropdown_item_hover_color' && $key != 'dropdown_borders_color'  && $key != 'dropdown_hassubmenu_item'  && $key != 'dropdown_item_typography' )
					set_theme_mod( $key, $val );
			}
		}else{
			wp_send_json_error( array('message' => esc_html__('Options not loaded or files missed.', 'picante')) );
		}

		wp_send_json_success( array('message' => esc_html__('Header Successfully imported', 'picante')) );
	}

	public function process_install_footer(){
		$dir = esc_attr( $_POST['demo'] );
		$file = 'data.txt';

		$data = $this->read_file_footer($file, $dir);

		if( $data && ! empty( $data ) ){
			$sections = array( 'cl_footer_general', 'cl_footer_design', 'cl_footer_copyright', 'cl_top_footer_style' );

            foreach( Kirki::$fields as $field ){
                if( in_array( $field['section'], $sections ) ){
                	$val = isset( $data['options'][$field['id']] ) ? $data['options'][$field['id']] : $field['default'];
                    set_theme_mod($field['id'], $val);
                }
            }

            $sidebars = $data['sidebars'];
            $final_widgets = $data['final_widget'];


            $widgets = get_option("sidebars_widgets");

			unset($widgets['array_version']);

			if ( is_array($sidebars) ) {
			
				$widgets = array_merge( (array) $widgets, (array) $sidebars );
				
				unset($widgets['wp_inactive_widgets']);
				
				$widgets = array_merge(array('wp_inactive_widgets' => array()), $widgets);
				$widgets['array_version'] = 3;
				
				update_option('sidebars_widgets', $widgets);

				foreach ((array) $final_widgets as $widget => $widget_params) {

					if( $widget == 'nav_menu' ){
						foreach ($widget_params as $id => $value) {
							$name = $value['title'];
							$menu = wp_get_nav_menu_object( $name );

							if( $menu !== false ){
								$new_id = $menu->term_id;
								$widget_params[$id]['nav_menu'] = $new_id;
							}
							
						}
					}
				
                    update_option( 'widget_' . $widget, $widget_params );
                }
			}

		}else{
			wp_send_json_error( array('message' => esc_html__('Options not loaded or files missed.', 'picante')) );
		}

		wp_send_json_success( array('message' => esc_html__('Footer Successfully imported', 'picante')) );
	}

	// Read the file that will be written
		public function read_file_header($file, $dir){
			$content = "";
			
			$file = get_template_directory() . '/includes/codeless_header_predefined/'.$dir.'/'. $file;
			
			if ( file_exists($file) ) {
				
				$content = $this->get_content($file);
				
			} else {
				$this->message = esc_html__("File doesn't exist", "picante");
			}
			
			if ($content) {

				if( ! empty( $content ) ){
					$unserialized_content = unserialize(codeless_decode_content($content));

					if ($unserialized_content) {

						return $unserialized_content;
					}
				}else{
					return '';
				}
			}
			return false;
		}

		public function read_file_footer($file, $dir){
			$content = "";
			
			$file = get_template_directory() . '/includes/codeless_footer_predefined/'.$dir.'/'. $file;
			
			if ( file_exists($file) ) {
				
				$content = $this->get_content($file);
				
			} else {
				$this->message = esc_html__("File doesn't exist", "picante");
			}
			
			if ($content) {

				if( ! empty( $content ) ){
					$unserialized_content = unserialize(codeless_decode_content($content));

					if ($unserialized_content) {

						return $unserialized_content;
					}
				}else{
					return '';
				}
			}
			return false;
		}

		function get_content( $file ) {
			return codeless_generic_get_content($file);
		}
}



class CodelessImporter{

	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';
	protected $tgmpa_instance;
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';
	protected $theme_name;

	var $process_list = array( 'install_plugins', 'import_content', 'import_options', 'import_menus', 'import_widgets' );

	public function __construct(){

		$current_theme = wp_get_theme();
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#','',$current_theme->get( 'Name' ) ) );

		add_action('wp_ajax_cl_import_demo_data', array(&$this, 'ajax_handler'));
		add_action('tgmpa_load', array( &$this, 'tgmpa_load' ));

		if(class_exists( 'TGM_Plugin_Activation' ) && isset($GLOBALS['tgmpa'])) {
			add_action( 'init', array( &$this, 'get_tgmpa_instanse' ), 30 );
			add_action( 'init', array( &$this, 'set_tgmpa_url' ), 40 );
		}

		if( class_exists('WC_Admin_Notices') ){
			WC_Admin_Notices::remove_notice('install');
		}

	}

	public function ajax_handler(){
		$process = isset( $_POST['process'] ) ? esc_attr( $_POST['process'] ) : 0;
		
		$process_function = $this->process_list[ esc_attr( $_POST['process'] ) ];
		$this->{'process_' . $process_function }();
	}

	public function process_install_plugins(){
		
		$response['message'] = 'process_install_plugins';

		$this->ajax_plugins();
	}

	public function process_import_widgets(){
		$dir = esc_attr( $_POST['demo'] );
		$file = 'sidebar_widgets.txt';
		$options = $this->read_file($file, $dir);

		if($options){

			foreach ((array) $options['final_widget'] as $widget => $widget_params) {

				if( $widget == 'nav_menu' ){
					foreach ($widget_params as $id => $value) {
						$name = $value['title'];
						$menu = wp_get_nav_menu_object( $name );

						if( $menu !== false ){
							$new_id = $menu->term_id;
							$widget_params[$id]['nav_menu'] = $new_id;
						}
						
					}
				}


				update_option( 'widget_' . $widget, $widget_params );
			}

			$this->import_sidebars_widgets($file, $dir);
			wp_send_json_success( array('message' => esc_html__('Widgets Successfully imported', 'picante')) );
			
		}else{
			wp_send_json_error( array('message' => esc_html__('Demo doesnt contain sidebar_widgets.txt file.', 'picante')) );
		}
		
	}

	public function process_import_options(){
		$dir = $_POST['demo'];
		$file = 'customizer.txt';

		$theme_mods = $this->read_file($file, $dir);

		if( $theme_mods && ! empty( $theme_mods ) ){
			foreach ((array) $theme_mods as $key => $val) {
				set_theme_mod( $key, $val );
			}

			$file = 'options.txt';
			$options = $this->read_file($file, $dir);

			if( $options ){
				foreach ((array) $options as $key => $val) {
					if( $key == 'page_on_front' ){
						$new_ = get_page_by_path( $val, ARRAY_A );
						
						if( is_array( $new_ ) && isset( $new_['ID'] ) )
							$val = $new_['ID'];
						
					}
					update_option( $key, $val );
				}

			}else{
				wp_send_json_error( array('message' => esc_html__('Options not loaded or files missed.', 'picante'). $val) );
			}
		}

		wp_send_json_success( array('Success'. $val) );
	}

	public function process_import_content(){
		$dir = esc_attr( $_POST['demo'] );
		$current_part = esc_attr( $_POST['current_part'] );
	    $attachments = true;

	    ob_start();

	    define('WP_LOAD_IMPORTERS', true);

	    
		require_once( get_template_directory() . '/includes/codeless_theme_panel/importer/wordpress-importer.php');
		
					
		$wp_import = new WP_Import();
		set_time_limit(0);
		$file = 'content_' . $current_part . '.xml';
		$path = get_template_directory() . '/includes/codeless_demos_content/'.$dir.'/'. $file;
                
		$wp_import->fetch_attachments = $attachments;
		$value = $wp_import->import($path);

		ob_get_clean();
		if(is_wp_error($value)){
			$msg = $result->get_error_message();
			wp_send_json_error( array('message' => esc_html__('Error. Content can\'t be installed.', 'picante') . $msg ) );
		}
		else {
			wp_send_json_success( array('message' => esc_html__('Content Successfully Installed', 'picante')) );
		}
	}

	public function process_import_menus(){
		global $wpdb;
		$dir = esc_attr( $_POST['demo'] );
		$terms = $wpdb->prefix . "terms";
		$menus_data = $this->read_file('menu.txt', $dir);
			
		if($menus_data){
			$menu_array = array();
			if(is_array($menus_data) && !empty($menus_data)){
				foreach ($menus_data as $registered_menu => $menu_slug) {
					$term_rows = $wpdb->get_results($wpdb->prepare(
					  "SELECT * FROM $wpdb->terms where slug = '%s' ",
					  $menu_slug
					), ARRAY_A);
					
					if(isset($term_rows[0]['term_id'])) {
						$term_id_by_slug = $term_rows[0]['term_id'];
					} else {
						$term_id_by_slug = null; 
					}
					$menu_array[$registered_menu] = $term_id_by_slug;
					
				}
			}
				
			set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );
			wp_send_json_success( array('message' => esc_html__('Menu Successfully Installed', 'picante')) );

		}else{
			wp_send_json_error( array('message' => esc_html__('Error. Menu can\'t installed.', 'picante') ) );
		}
	}

	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}

	private function _get_plugins() {
			$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
			$plugins = array(
				'all'      => array(), // Meaning: all plugins which still have open actions.
				'install'  => array(),
				'update'   => array(),
				'activate' => array(),
			);
			
			foreach ( $instance->plugins as $slug => $plugin ) {
				if( ! $plugin['required'] )
					continue;

				if ( $instance->is_tgm_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
					// No need to display plugins if they are installed, up-to-date and active.
					continue;
				} else {
					$plugins['all'][ $slug ] = $plugin;

					if ( ! $instance->is_plugin_installed( $slug ) ) {
						$plugins['install'][ $slug ] = $plugin;
					} else {

						if ( $instance->can_plugin_activate( $slug ) ) {
							$plugins['activate'][ $slug ] = $plugin;
						}
					}
				}
			}
			return $plugins;
	}

	public function ajax_plugins() {

			$json = array();
			// send back some json we use to hit up TGM
			$plugins = $this->_get_plugins();

			$json['active'] = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-activate',
						'action2' => -1,
						'message' => esc_html__( 'Activating Plugin','picante' ),
			);

			$json['install'] = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-install',
						'action2' => -1,
						'message' => esc_html__( 'Installing Plugin','picante' ),
			);


			// what are we doing with this plugin?
			foreach ( $plugins['activate'] as $slug => $plugin ) {
				
				$json['active']['plugin'][] = $slug;
				
			}
			
			foreach ( $plugins['install'] as $slug => $plugin ) {
				
				$json['install']['plugin'][] = $slug;
				$json['active']['plugin'][] = $slug;
			}

			if ( $json && ( !empty($json['active']['plugin']) || !empty($json['install']['plugin']) ) ) {
			
				wp_send_json_success( array( 'plugins' => $json ) );
			} else {
				wp_send_json_success( array( 'message' => esc_html__( 'No plugins to install or activate', 'picante' ) ) );
			}
			exit;

	}

		/**
		 * Get configured TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function get_tgmpa_instanse(){
			$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		}

		/**
		 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function set_tgmpa_url(){

			$this->tgmpa_menu_slug = ( property_exists($this->tgmpa_instance, 'menu') ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
			$this->tgmpa_menu_slug = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug);

			$tgmpa_parent_slug = ( property_exists($this->tgmpa_instance, 'parent_slug') && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';

			$this->tgmpa_url = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug.'?page='.$this->tgmpa_menu_slug);

		}
        


		function import_sidebars_widgets($file, $dir){
			$widgets = get_option("sidebars_widgets");

			unset($widgets['array_version']);

			$data = $this->read_file($file, $dir);

			if ( is_array($data['sidebars']) ) {
			
				$widgets = array_merge( (array) $widgets, (array) $data['sidebars'] );
				
				unset($widgets['wp_inactive_widgets']);
				
				$widgets = array_merge(array('wp_inactive_widgets' => array()), $widgets);
				$widgets['array_version'] = 3;
				
				update_option('sidebars_widgets', $widgets);
			}
		}

		// Read the file that will be written
		public function read_file($file, $dir){
			$content = "";
			
			$file = get_template_directory() . '/includes/codeless_demos_content/'.$dir.'/'. $file;
			
			if ( file_exists($file) ) {
				
				$content = $this->get_content($file);
				
			} else {
				$this->message = esc_html__("File doesn't exist", "picante");
			}
			
			if ($content) {

				if( ! empty( $content ) ){
					$unserialized_content = unserialize(codeless_decode_content($content));

					if ($unserialized_content) {

						return $unserialized_content;
					}
				}else{
					return '';
				}
			}
			return false;
		}

		function get_content( $file ) {
			return codeless_generic_get_content($file);
		}

}

if( is_admin() )
	new CodelessImporter();

if( is_admin() )
	new CodelessHeaderImporter();

?>