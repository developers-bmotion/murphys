<?php

/**
 * picante functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package picante
 * @subpackage Functions
 * @since 1.0
 */
 
if ( ! isset( $content_width ) )
    $content_width = 1070;

// Load Codeless Framework Constants
require_once( get_template_directory() . '/includes/core/codeless_constants.php' );

// Load Required Plugins Tool
require_once( get_template_directory().'/includes/core/codeless_required_plugins.php' );

require_once( get_template_directory() . '/includes/codeless_builder/config/cl-post-meta.php' );


//Demo Importer
require_once( get_template_directory().'/includes/codeless_theme_panel/importer/codeless_importer.php' );


/**
 * All Start here...
 * 
 * @since 1.0.0
 */
function codeless_setup(){

    // Register Nav Menus Locations to use
    codeless_navigation_menus();
    // Load Codeless Customizer files and Options
    codeless_load_customizer();
    // Load All Codeless Framework Files
    codeless_load_framework();
    // Load Codeless Modules
    codeless_load_modules();

    // Language and text-domain setup
    add_action('init', 'codeless_language_setup');

    // Register Scripts and Styles
    add_action('wp_enqueue_scripts', 'codeless_register_global_styles');
    add_action('wp_enqueue_scripts', 'codeless_register_global_scripts');

    // Https filters
    add_filter( 'https_ssl_verify', '__return_false' );
    add_filter( 'https_local_ssl_verify', '__return_false' );

    // WP features that this theme supports
    codeless_theme_support();

    // Widgets
    codeless_load_widgets();
    codeless_register_widgets();  

    // Megamenu Create
    new codeless_custom_menu();
}

add_action( 'after_setup_theme', 'codeless_setup' );



/**
 * Load Customizer Related Options and Customizer Cotrols Classes
 * 
 * @since 1.0.0
 */
function codeless_load_customizer() {

    // Load and Initialize Codeless Customizer
    include_once( get_template_directory() . '/includes/codeless_customizer/codeless_customizer_config.php' );
}


/**
 * Load all Codeless Framework Files
 * 
 * @since 1.0.0
 */
function codeless_load_framework() {

    // Register all Theme Hooks (add_action, add_filter)
    require_once( get_template_directory() . '/includes/codeless_hooks.php' );

    // Codeless Routing Templates and Custom Type Queries
    require_once( get_template_directory().'/includes/core/codeless_routing.php' );
    

    // Register all theme related sidebars
    require_once( get_template_directory().'/includes/register/register_sidebars.php' );

    // Register Custom Post Types
    // Works with Codeless Builder activated
    // Plugin Territory
    require_once( get_template_directory().'/includes/register/register_custom_types.php' );

    // Load Codeless Post Like
    require_once( get_template_directory().'/includes/core/codeless_post_like.php' );

    // Load Codeless Share Counts
    require_once( get_template_directory().'/includes/core/codeless_share_counts.php' );

    // Load Megamenu
    require_once( get_template_directory().'/includes/core/codeless_megamenu.php' );

    // Load all functions that are responsable for Extra Classes and Extra Attrs
    require_once( get_template_directory().'/includes/codeless_html_attrs.php' );

    // Load all blog related functions
    require_once( get_template_directory().'/includes/codeless_functions_blog.php' );

    // Load all portfolio related functions
    require_once( get_template_directory().'/includes/codeless_functions_portfolio.php' );

    // Load Theme Panels
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_backpanel.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_theme_panel.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_image_sizes.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_modules.php' ); 
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_custom_sidebars.php' ); 
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_system_status.php' );
    
    // Image Resize - Module - Resize image only when needed
    require_once( get_template_directory().'/includes/core/codeless_image_resize.php' );

    // Load Comment Walker
    require_once( get_template_directory().'/includes/core/codeless_comment_walker.php' );
    
    // Codeless Icons List
    require_once( get_template_directory().'/includes/core/codeless_icons.php' );

    // Fallback Class for Header when Codeless Builder Plugin is not active
    require_once( get_template_directory().'/includes/core/codeless_header_fallback.php' );

    // Load Woocommerce Functions
    if( class_exists( 'Woocommerce' ) )
        require_once( get_template_directory().'/includes/codeless_functions_woocommerce.php' );
}


/**
 * Load All Modules
 * 
 * @since 1.0.0
 */
function codeless_load_modules(){
   require_once( get_template_directory().'/includes/codeless_modules/custom_portfolio_overlay_color.php' );
   require_once( get_template_directory().'/includes/codeless_modules/header_boxed_per_page.php' );
   require_once( get_template_directory().'/includes/codeless_modules/custom_primary_color_page.php' );
   require_once( get_template_directory().'/includes/codeless_modules/custom_header_background_per_page.php' );    
}


/**
 * Load Codeless Custom Widgets
 * 
 * @since 1.0.0
 */
function codeless_load_widgets() {
    require_once get_template_directory().'/includes/widgets/codeless_flickr.php';
    require_once get_template_directory().'/includes/widgets/codeless_mostpopular.php';
    require_once get_template_directory().'/includes/widgets/codeless_shortcodewidget.php';
    require_once get_template_directory().'/includes/widgets/codeless_socialwidget.php';
    require_once get_template_directory().'/includes/widgets/codeless_ads.php';
    require_once get_template_directory().'/includes/widgets/codeless_service.php';
    require_once get_template_directory().'/includes/widgets/codeless_contactinfo.php';
    require_once get_template_directory().'/includes/widgets/codeless_button.php';
    require_once get_template_directory().'/includes/widgets/codeless_instagram.php';

    if( class_exists( 'Woocommerce' ) ){
        require_once get_template_directory().'/includes/widgets/codeless_product_collection_feature.php';
        require_once get_template_directory().'/includes/widgets/codeless_myaccount.php';
    }
}


/**
 * Setup Language Directory and theme text domain
 * 
 * @since 1.0.0
 */
function codeless_language_setup() {
    $lang_dir = get_template_directory() . '/lang';
    load_theme_textdomain('picante', $lang_dir);
} 


/**
 * Add Theme Supports
 * 
 * @since 1.0.0
 */
function codeless_theme_support(){
    add_theme_support( 'post-thumbnails' );
    
    add_theme_support('woocommerce', array(
        'gallery_thumbnail_image_width' => 180,
        'single_image_width' => 500
    ));
    if( codeless_get_mod( 'shop_product_lightbox', false ) ){
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
    }
    add_theme_support( 'wc-product-gallery-slider' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support('nav_menus');
    add_theme_support( 'post-formats', array( 'quote', 'gallery','video', 'audio', 'link' ) ); 
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
}


/**
 * Register Navigation Menus
 * 
 * @since 1.0.0
 */
function codeless_navigation_menus(){
    $navigations = array('main' => esc_attr__('Main Navigation', 'picante') );

    foreach($navigations as $id => $name){ 
        register_nav_menu($id, THEMETITLE.' '.$name); 
    }
}

/**
 * Get the real query post ID
 * 
 * @since 1.0.0
 */

if( !function_exists( 'codeless_get_post_id' ) ) {
    
    /**
     * codeless_get_post_id()
     * 
     * @return
     */
    
    function codeless_get_post_id() {
        global $codeless_config, $for_online;
        $ID = false;
        
        if( !isset( $codeless_config['real_ID'] ) || ( isset( $codeless_config['real_ID'] ) && !$codeless_config['real_ID'] ) ) {
            if( !empty( $codeless_config['new_query']['page_id'] ) ) {
                $ID = $codeless_config['new_query']['page_id'];
            } else {
                $ID = @get_the_ID();
            }
            
            $codeless_config['real_ID'] = $ID;
        } else {
            $ID = $codeless_config['real_ID'];
        }
        
        if( class_exists( 'woocommerce' ) && is_shop() ) {
            $ID = get_option( 'woocommerce_shop_page_id' );
        }
        
        if( codeless_is_blog_query() && !is_page_template( 'template-blog.php' ) )
            $ID = get_option( 'page_for_posts' );
        
        if( is_search() )
            $ID = 0;
        
        return (int) $ID;
    }
    
    add_action( 'wp_head', 'codeless_get_post_id' );
}


/**
 * Regster Loaded Widgets
 * 
 * @since 1.0.0
 */
function codeless_register_widgets(){
    if( !function_exists( 'codeless_widget_register' ) )
        return;
        
    codeless_widget_register( 'CodelessSocialWidget' );
    codeless_widget_register( 'CodelessFlickrWidget' );
    codeless_widget_register( 'CodelessShortcodeWidget' );
    codeless_widget_register( 'CodelessMostPopularWidget');
    codeless_widget_register( 'CodelessAdsWidget');
    codeless_widget_register( 'CodelessService');
    codeless_widget_register( 'CodelessContactInfo');
    codeless_widget_register( 'CodelessButton' );
    codeless_widget_register( 'CodelessInstagram' );

    if( class_exists( 'Woocommerce' ) ){
        codeless_widget_register( 'CodelessMyAccount' );
        codeless_widget_register( 'CodelessProductCollectionFeature' );
    }
}


/**
 * Enqueue all needed styles
 * 
 * @since 1.0.0
 */
function codeless_register_global_styles(){ 

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('codeless-style', get_stylesheet_uri());
    
    wp_enqueue_style('codeless-front-elements', get_template_directory_uri() . '/css/codeless-front-elements.css');

    wp_enqueue_style('swiper-slider', get_template_directory_uri() . '/css/swiper.min.css');
    
    if( codeless_get_mod( 'codeless_page_transition' )) 
        wp_enqueue_style('animsition', get_template_directory_uri(). '/css/animsition.min.css'); 
    
    if( codeless_get_mod( 'blog_entry_overlay_icon' ) == 'lightbox' )
        wp_enqueue_style('ilightbox', get_template_directory_uri() . '/css/ilightbox/css/ilightbox.css' );
    
    wp_enqueue_style('codeless-select2', get_template_directory_uri() . '/css/select2.min.css');

    if( function_exists('is_woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_shop() || is_account_page() || get_option( 'yith_wcwl_wishlist_page_id' ) == codeless_get_post_id() ) ){ 
        
        wp_enqueue_style('codeless-woocommerce', get_template_directory_uri() . '/css/codeless-woocommerce.css');  
    }
    wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.min.css' ); 
    // Create Dynamic Styles
    wp_enqueue_style( 'codeless-dynamic', get_template_directory_uri() . '/css/codeless-dynamic.css');
    
    /* Load Custom Dynamic Style and enqueue them with wp_add_inline_style */
    ob_start();
    codeless_custom_dynamic_style();
    $styles = ob_get_clean();

    wp_add_inline_style( 'codeless-dynamic', apply_filters( 'codeless_register_styles', $styles ) );    
}


/**
 * Enqueue all global scripts
 * 
 * @since 1.0.0
 */
function codeless_register_global_scripts(){
    
    wp_enqueue_script( 'codeless-main', get_template_directory_uri() . '/js/codeless-main.js', array( 'jquery', 'imagesloaded' ) );
    wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'bowser', get_template_directory_uri() . '/js/bowser.min.js' );

    if( !class_exists( 'Kirki' ) )
        wp_enqueue_style('codeless-default', get_template_directory_uri() . '/css/codeless-default.css' );

   if( codeless_get_mod( 'codeless_page_transition', false )) 
        wp_enqueue_script('animation', get_template_directory_uri(). '/js/animsition.min.js'); 

    if( codeless_get_mod( 'nicescroll' ) )
        wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js' ); 

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_style('codeless-creative-search', get_template_directory_uri() . '/css/codeless-creative-search.css');

    wp_localize_script(
        'codeless-main',
        'codeless_global',
        array(
            'ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
            'FRONT_LIB_JS' => esc_url( get_template_directory_uri() . '/js/' ),
            'FRONT_LIB_CSS' => esc_url( get_template_directory_uri() . '/css/' ),
            'postSwiperOptions' => codeless_get_post_slider_options(), // Escaped in function
            'cl_btn_classes' => esc_attr( codeless_button_classes() ),
            'wc_placeholder_img_src' => ( function_exists('wc_placeholder_img_src') ? esc_url( wc_placeholder_img_src() ) : '' ),
            'shop_columns_mobile' => esc_attr( codeless_get_mod( 'shop_columns_mobile', 1 ) ),
            'shop_open_toggles' => esc_attr( codeless_get_mod( 'shop_open_toggles', 0 ) ),
            'language' => array(
                'added' => esc_attr__('Added', 'picante'),
                'add_to_cart' => esc_attr__('Add to Cart', 'picante'),
                'filter_by' => esc_attr__('Filter By', 'picante'),
                'please_select' => esc_attr__('Please Select', 'picante')
            )
        )
    );
}

/**
 * Load all styles from register_styles.php
 * Added with wp_add_inline_style on codeless_register_global_styles, action wp_enqueue_scripts
 * @since 1.0.0
 */
function codeless_custom_dynamic_style(){
    include get_template_directory().'/includes/register/register_styles.php';
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_classes_wrapper') for ex,
 * will add a custom class at wrapper html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_classes($tag){
    
    if( empty($tag) )
        return '';
      
    $classes = apply_filters('codeless_extra_classes_'.$tag, array()); 
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_attr_viewport') for ex,
 * will add a custom attr at viewport html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_attr($tag){
    
    if( empty($tag) )
        return '';
      
    $attrs = apply_filters('codeless_extra_attr_'.$tag, array()); 
    return (!empty($attrs) ? implode(" ", $attrs) : '');
}


/**
 * Core Function: Return the value of a specific Mod
 * 
 * @since 1.0.0
 */
function codeless_get_mod( $id, $default = '', $sub_array = '' ){

    //For Online

    global $codeless_online_mods, $cl_from_element;

    if( isset($cl_from_element[$id]) && !empty($cl_from_element[$id]) ){
        return $cl_from_element[$id];
    }

    if( isset($codeless_online_mods[$id])  && ! is_customize_preview() ){
        return $codeless_online_mods[$id];
    }

    if($default == '')
        $default = codeless_theme_mod_default($id);


    if ( is_customize_preview() ) {
        
        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }
    
    global $cl_theme_mods;
    
    if ( ! empty( $cl_theme_mods ) ) {

        if ( isset( $cl_theme_mods[$id] ) ) {

            if($sub_array == '')
                return $cl_theme_mods[$id];
            else
                return $cl_theme_mods[$id][$sub_array];
        }

        else {
            return $default;
        }

    }

    else {

        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }

}


/**
 * Generic Read Function
 * 
 * @since 1.0.0
 */
function codeless_generic_read_file($file){
    if( ! function_exists('codeless_builder_generic_read_file') )
        return false;

    return codeless_builder_generic_read_file( $file );
}


/**
 * Generic Read Function
 * 
 * @since 1.0.0
 */
function codeless_generic_get_content( $file ) {
    if( ! function_exists('codeless_builder_generic_get_content') )
        return false;

    return codeless_builder_generic_get_content( $file );
}


/**
 * Get the Default Value of a theme mod from Codeless Options
 * 
 * @since 1.0.0
 */
function codeless_theme_mod_default($id){
    if( class_exists('Kirki') && isset( Kirki::$fields[$id] ) && isset( Kirki::$fields[$id]['default'] ) && ! empty( Kirki::$fields[$id]['default'] ) )
        return Kirki::$fields[$id]['default'];
    else 
        return '';
}


/**
 * Check if is neccesary to add extra HTML for container and inner row (make an inner container)
 * @since 1.0.0
 */
function codeless_is_inner_content(){
    $condition = false;

    // Condition to test if query is a blog
    if( ! codeless_is_blog_query() )
        $condition = true;


    if( (! codeless_page_from_builder() || 
            ( codeless_get_page_layout() != 'fullwidth' 
                && codeless_get_page_layout() != '' 
                && codeless_get_page_layout() != 'default' ) || 
            ( is_single() 
                && get_post_type() == 'post' 
                && codeless_get_post_style() != 'custom'  ) ||
            is_page_template( 'template-sidenav.php' )
        )
        && $condition )

        return true;

    return false;
}


/**
 * Check if is modern layout
 * @since 1.0.0
 */
function codeless_is_layout_modern(){
    $layout_modern = codeless_get_mod( 'layout_modern' );

    if( codeless_get_meta( 'layout_modern' ) != 'default' &&  codeless_get_meta( 'layout_modern' ) != '' ){
        $layout_modern = codeless_get_meta( 'layout_modern' );
    }

    return $layout_modern;
}



add_action( 'enqueue_block_editor_assets', 'codeless_gutenberg_css', 999 );
function codeless_gutenberg_css(){
    wp_enqueue_style(
		'codeless-guten-css', // Handle.
		get_template_directory_uri() . '/css/gutenberg-editor.css', // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
    );

    $body_type = codeless_get_mod( 'body_typo', array( 'font-family' => 'Open Sans', 'font-size' => '16px', 'line-height' => '30px', 'color' => '#73848e' ) );
    $headings_typo = codeless_get_mod( 'headings_typo', array( 'font-family' => 'Prata' ) );
    $single_blog_title = codeless_get_mod( 'single_blog_title', array( 'font-family' => 'Prata', 'font-size' => '48px' ) );

    $custom_font_link = add_query_arg( array(
		'family' => str_replace( '%2B', '+', urlencode( implode( '|', array( $body_type['font-family'], $headings_typo['font-family'] ) ) . ':400,500,600,700'  ) )
	), 'https://fonts.googleapis.com/css' );

	wp_enqueue_style( 'codeless-guten-font-family', $custom_font_link  );
    
    $dynamic_styles = '.editor-post-title__block .editor-post-title__input{ font-family:\''.$single_blog_title['font-family'].'\'; font-weight:400; font-size:'.$single_blog_title['font-size'].'; }';
    
    $dynamic_styles .= '.editor-styles-wrapper .wp-block-quote div p{ font-size:'.$body_type['font-size'].' !important; font-weight:400; }';
    $dynamic_styles .= '.editor-styles-wrapper .wp-block-quote__citation{ font-weight: 500; font-style: normal; font-size:16px; }';

    $dynamic_styles .= '.editor-styles-wrapper{ font-family: '.$body_type['font-family'].' !important; line-height:'.$body_type['line-height'].' !important; font-size:'.$body_type['font-size'] .'; -webkit-font-smoothing: antialiased !important;   }';

    $dynamic_styles .= '.editor-styles-wrapper .wp-block-paragraph:not(.has-small-font-size):not(.has-large-font-size):not(.has-larger-font-size), .editor-styles-wrapper li{ font-size:'.$body_type['font-size'].' !important; font-family:Open Sans; font-weight:400; line-height:30px;  }';
    $dynamic_styles .= '.editor-styles-wrapper p.has-drop-cap:not(:focus):first-letter { color: '.codeless_get_mod('primary_color', '#eb5a46').'; } ';    
    $dynamic_styles .= '.editor-styles-wrapper p:not(.has-text-color):not(.wp-block-cover-text):not(.wp-block-pullquote), .editor-styles-wrapper .wp-block-quote__citation,  .editor-styles-wrapper li, .editor-styles-wrapper pre { color:'.$body_type['color'].' !important; }'; 
    $dynamic_styles .= '.editor-styles-wrapper h1, .editor-styles-wrapper h2, .editor-styles-wrapper h3, .editor-styles-wrapper h4, .editor-styles-wrapper h5, .editor-styles-wrapper h6{ font-family:\''.$headings_typo['font-family'].'\'; font-weight:400; color: #444; }';
    $dynamic_styles .= '.editor-styles-wrapper h2{font-size:36px !important;}';
    $dynamic_styles .= '.editor-styles-wrapper .wp-block-quote p{ font-family:\''.$body_type['font-family'].'\';}';
    $dynamic_styles .= '.editor-styles-wrapper .wp-block[data-type="core/cover"] .wp-block[data-type="core/paragraph"] p{ font-size: 24px !important; color:#fff !important; }';
    $dynamic_styles .= '.editor-styles-wrapper .wp-block-pullquote:not(.has-text-color) p:not(.has-text-color):not(.wp-block-cover-text):not(.wp-block-pullquote){ color:#40464d !important; }';

    wp_add_inline_style( 'codeless-guten-css', $dynamic_styles );
}



/**
 * Loop Counter
 * @since 1.0.0
 */
function codeless_loop_counter( $i = false ){
    global $codeless_loop_counter;
    
    if( $i !== false )
        $codeless_loop_counter = $i;
    
    return $codeless_loop_counter;
}


/**
 * Select and output sidebar for current page
 * @since 1.0.0
 */
function codeless_get_sidebar(){
    
    // Get current page layout
    $layout = codeless_get_page_layout();
  
    // No sidebar if fullwidth layout
    if( $layout == 'fullwidth' )
        return;
    
    // Load custom sidebar template for dual
    if( $layout == 'dual_sidebar' ){
        get_sidebar( 'dual' );
        return;
    }
    
    // For left/right sidebar layouts get default sidebar template
    get_sidebar();
    
}

if( !function_exists('codeless_js_object_to_array') ){
    function codeless_js_object_to_array($value){
        if( is_array($value) )
            return $value;

        if( strpos( $value, '_-_json' ) !== false ) {
            $value = str_replace( "'", '"', str_replace( '_-_json', '', $value ) );
            $value = json_decode( $value, true );
            return $value;
        }else if( strpos($value, '__array__') !== false && strpos($value, '__array__end__') !== false){
            $value = str_replace("__array__", '[', str_replace('__array__end__', ']', $value) );
            $value = json_decode($value, true);
            return $value;
        }else{
            if( strpos( $value, '|' ) === false && strpos( $value, ':' ) !== false ){
                $value = explode(':', $value);
                return array( $value[0] => $value[1] );
            }else if( strpos( $value, '|' ) !== false ){
                $n_v = explode( '|', $value );
                $final_vals = array();
                foreach( $n_v as $key => $val ){
                    $val = explode(":", $val);
                    $final_vals[$val[0]] = $val[1];
                }
                return $final_vals;
            }
                
        }
    }
}


/**
 * Two functions used for creating a wrapper for sticky sidebar
 * @since 1.0.0
 */
function codeless_sticky_sidebar_wrapper(){
    echo '<div class="cl-sticky-wrapper">';
}
function codeless_sticky_sidebar_wrapper_end(){
    echo '</div><!-- .cl-sticky-wrapper -->';
}


/**
 * Determine if page uses a left/right sidebar or a fullwidth layout
 * @since 1.0.0 
 */
function codeless_get_page_layout(){
    
    global $codeless_page_layout;

    // Make a test and save at the global variable to make the function works faster
    if(!isset($codeless_page_layout) || empty($codeless_page_layout) || (isset($codeless_page_layout) && !$codeless_page_layout) || is_customize_preview() ){
    
        // Default 
        $codeless_page_layout = codeless_get_mod( 'layout', 'fullwidth', '', true );
        
        // Check if query is a blog query
        if( codeless_is_blog_query() && codeless_get_mod( 'blog_layout' ) != 'none' )
            $codeless_page_layout = codeless_get_mod( 'blog_layout' );
        
        // Blog Post layout
        if( is_single() && get_post_type( codeless_get_post_id() ) == 'post' )
            $codeless_page_layout = codeless_get_mod( 'blog_post_layout', 'right_sidebar' );       
       
        // Add single page layout check here
        if( codeless_get_meta( 'page_layout', 'default' ) != "default" )
            $codeless_page_layout = codeless_get_meta( 'page_layout', 'default');

        if( is_archive() && ( !function_exists('is_shop') || ( function_exists('is_shop') && !is_shop() ) ) )
            $codeless_page_layout = codeless_get_mod( 'blog_archive_layout', 'fullwidth' );

        if( function_exists('is_product_category') && is_product_category() )
            $codeless_page_layout = codeless_get_mod( 'shop_category_layout', 'fullwidth' ); 

        if( is_search() )
            $codeless_page_layout = codeless_get_mod( 'search_page_layout', 'fullwidth' );

        if( function_exists('is_shop') && is_shop() && is_search() )
            $codeless_page_layout = codeless_get_mod( 'shop_search_page_layout', 'left_sidebar' );

        // if no sidebar is active return 'fullwidth'
        if( ! codeless_is_active_sidebar() )
            $codeless_page_layout = 'fullwidth';

        // Apply filter and return
        $codeless_page_layout = apply_filters( 'codeless_page_layout', $codeless_page_layout );
    }
    return $codeless_page_layout;
}



/**
 * Generate Content Column HTML class based on layout type
 * @since 1.0.0
 */
function codeless_content_column_class(){
    
    // Get page layout
    $layout = codeless_get_page_layout();
    
    // First part of class "col-sm-"
    $col_class = codeless_cols_prepend();
    
    if( $layout == 'fullwidth' )
        $col_class_n = '12';
    elseif( $layout == 'dual_sidebar' )
        $col_class_n = '6';
    else{
        $col_class_n = '9';

        if( codeless_sidebar_column_size() == '4' )
            $col_class_n = '8';
    }

    if( is_page_template('template-sidenav.php') )
        $col_class_n = '8';

    $col_class .= $col_class_n;
    
    return $col_class;
    
}


/**
 * Generate Bootstrap Column Size for the sidebar
 * @since 1.0.0
 */
function codeless_sidebar_column_size(){
    $size = '4';

    if( codeless_get_meta( 'sidebar_column_width', '4' ) == '3' )
        $size = '3';

    return $size;
}


/**
 * HTML / CSS Column Class Prepend
 * @since 1.0.0
 */
function codeless_cols_prepend(){
    return apply_filters( 'codeless_cols_prepend', 'col-sm-' );
}


/**
 * Buttons Style (Classes)
 * @since 1.0.0
 * @version 1.0.3
 */
function codeless_button_classes( $classes = array(), $overwrite = false, $postID = false ){
    
    if( !is_array( $classes ) )
        $classes = array();

    if( ! $overwrite ){
        $classes[] = 'cl-btn';

        $btn_style = codeless_get_mod( 'button_style', 'square' );

        if( codeless_is_blog_entry() )
            $btn_style = codeless_get_mod( 'blog_button_style', 'square' );

        $classes[] = 'btn-style-' . $btn_style;

        $classes[] = 'btn-hover-' . codeless_get_mod( 'button_hover_effect', 'darker' );

        if( codeless_get_mod( 'custom_button_font', false ) )
            $classes[] = 'btn-font-custom';
    }

    $classes = apply_filters( 'codeless_button_classes', $classes );
    
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Check if page it's generated from Codeless Builder or VC
 * @since 1.0.0
 */
function codeless_page_from_builder(){
    
    global $codeless_page_from_builder;
    
    if( ! isset( $codeless_page_from_builder ) || is_null( $codeless_page_from_builder ) ){
        
        $codeless_page_from_builder = false;
        $page = get_page( codeless_get_post_id() );
        
        if( is_object($page) ){
            $content = $page->post_content;
            preg_match_all('/\[vc_row(.*?)\]/', $content, $matches_vc );
            preg_match_all('/\[cl_page_header(.*?)\]/', $content, $matches_cl_page_header );
            preg_match_all('/\[cl_row(.*?)\]/', $content, $matches_cl_row );
            
            if ( isset($matches_vc[0]) && !empty($matches_vc[0]) )
                $codeless_page_from_builder = true;
            
            if ( isset($matches_cl_page_header[0]) && !empty($matches_cl_page_header[0]) ) 
                $codeless_page_from_builder = true;
            if ( isset($matches_cl_row[0]) && !empty($matches_cl_row[0]) )
                $codeless_page_from_builder = true;
        }else{
            $codeless_page_from_builder = false;
        }

    }

    if( is_customize_preview() && class_exists( 'Cl_Builder_Manager' ) && isset( $_GET['clactive'] ) )
        return true;
        
    return $codeless_page_from_builder;
}


/**
 * Convert Width (1/2 or 1/3 etc) to col-sm-6... 
 * @since 1.0.0
 */
function codeless_widthToSpan( $width ) {
    preg_match( '/(\d+)\/(\d+)/', $width, $matches );

    if ( ! empty( $matches ) ) {
        $part_x = (int) $matches[1];
        $part_y = (int) $matches[2];
        if ( $part_x > 0 && $part_y > 0 ) {
            $value = ceil( $part_x / $part_y * 12 );
            if ( $value > 0 && $value <= 12 ) {
                $width = codeless_cols_prepend() . $value;
            }
        }
    }

    return $width;
}

/**
 * Convert layout string (14_14_14_14) to an array of
 * 1/4, 1/4, 1/4, 1/4
 * @since 1.0.0
 */
function codeless_layoutToArray( $layout ){
    $layout_arr = explode( "_", $layout );
    $layout_ = array();

    foreach($layout_arr as $layout_col){
        $layout_col_arr = array();
        for ($i = 0, $l = strlen($layout_col); $i < $l; $i++) {
            $layout_col_arr[] = $layout_col{$i};
        }
        array_splice( $layout_col_arr, strlen($layout_col) / 2 , 0, '/' );
        $layout_[] = implode( '', $layout_col_arr );
    }
    
    return $layout_;
}


/**
 * Conditionals for showing footer and copyright
 * @since 1.0.0
 */
function codeless_show_footer(){  

    if( codeless_get_meta( 'page_show_footer', 'yes') == 'no' )
        return;

    $cols = codeless_layoutToArray( codeless_get_mod( 'footer_layout', '14_14_14_14' ) );
    $main_footer_bool = $top_footer_bool = $copyright_bool = false;

    for( $i = 1; $i <= count( $cols ); $i++ ) {

        if( is_active_sidebar('footer-column-' . $i) ){
            $main_footer_bool = true;
            break;
        }

    }


    if( is_active_sidebar('top_footer-left') || is_active_sidebar('top_footer-right') ){
        $top_footer_bool = true;
    }


    if( is_active_sidebar('copyright-left') || is_active_sidebar('copyright-right') ){
        $copyright_bool = true;
    }


    if( ! $main_footer_bool && !$top_footer_bool && !$copyright_bool )
        return;

    ?>

    <div id="footer-wrapper" class="<?php echo esc_attr( codeless_extra_classes( 'footer_wrapper' ) ) ?>">  
        <?php

            if( codeless_get_mod('show_instagram_feed', false) )
                get_template_part( 'template-parts/footer/instafeed' ); 

            if( codeless_get_mod('show_google_map', false) )
                get_template_part( 'template-parts/footer/googlemap' ); 

            if( $top_footer_bool )
                get_template_part( 'template-parts/footer/top_footer' );


            if( codeless_get_mod( 'show_footer', true ) && $main_footer_bool )
                get_template_part( 'template-parts/footer/main' );

            if( codeless_get_mod( 'show_quicksearches', false ) )
                get_template_part( 'template-parts/footer/quick-searches' );

            if( codeless_get_mod( 'show_copyright', true ) && $copyright_bool )
                get_template_part( 'template-parts/footer/copyright' );
        ?>
    </div><!-- #footer-wrapper -->

    <?php
}



/**
 * Build Footer Layout and call dynamic sidebar
 * 
 * @since 1.0.0
 */
function codeless_build_footer_layout(){
    // Get Layout string
    $layout = codeless_get_mod( 'footer_layout', '14_14_14_14' );
    
    // Create array of columns
    $cols = codeless_layoutToArray($layout);


    // Generate Footer Output
    $i = 0;
    foreach( $cols as $col ){
        $i++;
        
        if( $i == 2 )
            $special_column = 'special-column';
        else
            $special_column = '';
        ?>
        
        <div class="footer-widget <?php echo esc_attr( $special_column ) ?> <?php echo esc_attr( codeless_widthToSpan( $col ) ) ?>">
        
            <?php
                if( is_active_sidebar( 'footer-column-'.$i ) )
                    dynamic_sidebar( 'footer-column-'.$i );
            ?>
        
        </div><!-- Footer Widget -->
        
        <?php
    }
    
}

/**
 * Build Copyright
 * 
 * @since 1.0.0
 */
function codeless_build_copyright(){
    $center = codeless_get_mod( 'copyright_centered_content', false );
    $center_class = '';
    $col_span = '6';

    if( $center ){
        $center_class = 'centered';
        $col_span = '12';
    }
    ?>

    <div class="copyright-widget <?php echo esc_attr( codeless_cols_prepend().$col_span ) ?> <?php echo esc_attr( $center_class ) ?>">
        
            <?php
                if( is_active_sidebar( 'copyright-left' ) )
                    dynamic_sidebar( 'copyright-left' );
            ?>
        
    </div><!-- Copyright Widget -->

    <?php if( !$center ): ?>

    <div class="copyright-widget <?php echo esc_attr( codeless_cols_prepend().'6' ) ?>">
        
            <?php

                 if( is_active_sidebar( 'copyright-right' ) )
                    dynamic_sidebar( 'copyright-right' );
            ?>
        
    </div><!-- Copyright Widget -->
    <?php endif;
}


/**
 * Build Top Footer
 * 
 * @since 1.0.0
 */
function codeless_build_top_footer(){
    ?>

    <div class="top_footer-widget <?php echo esc_attr( codeless_cols_prepend().'5' ) ?>">
        
            <?php
                if( is_active_sidebar( 'top_footer-left' ) )
                    dynamic_sidebar( 'top_footer-left' );
            ?>
        
    </div><!-- Top Footer Widget -->

    <?php if( !codeless_get_mod( 'topfooter_unique_style', 0 ) ): ?>
    <div class="top_footer-widget col-sm-offset-2 <?php echo esc_attr( codeless_cols_prepend().'5' ) ?>">
        
            <?php

                 if( is_active_sidebar( 'top_footer-right' ) )
                    dynamic_sidebar( 'top_footer-right' );
            ?>
        
    </div><!-- Top Footer Widget -->
    <?php endif; ?>


    <?php
    
}


/**
 * Return Quick Searches
 * @since 1.0.0
 */

function codeless_get_quick_searches($number = 4){

    ?>

    <div class="quick-searches">

        <span><?php esc_html_e('Quick Searches', 'picante') ?>: </span>

        <div class="tags">
            <?php
                $custom_quick_search = codeless_get_mod( 'shop_quick_search', array() );
                if(  is_array($custom_quick_search) && !empty( $custom_quick_search ) ){
                    $tag_string = '';
                    foreach( $custom_quick_search as $quick ){
                        $tag_string .= '<a href="'.esc_url( home_url() .'/?s='.$quick['term'] ).'&post_type=product">'.esc_html( $quick['term'] ).'</a>';
                    }

                    echo codeless_complex_esc( $tag_string );
                }else{

                    $tags = get_terms( 'product_tag', array( 'orderby' => 'count', 'order' => 'desc', 'number' => $number ) );
                    
                    $tag_string = '';

                    if( count($tags) > 0 ){
                        foreach($tags as $tag){
                            $tag_string .= '<a href="'.esc_url( home_url() ).'/?s='.esc_url( $tag->name ).'&post_type=product">'.esc_html( $tag->name ).'</a>';
                        }
                    }

                    echo codeless_complex_esc( $tag_string );
                }

            ?>
        </div>

    </div>  

    <?php
}


/**
 * Extract Page Header Shortcode from Content
 * @since 1.0.0
 */
function codeless_extract_page_header($content){
    $pattern = get_shortcode_regex(array('cl_page_header'));
    preg_match('/'.$pattern.'/s', $content, $matches);
    if (is_array($matches) && isset($matches[2]) ) {
       $shortcode = $matches[0];
       return $shortcode;
    }
}


/**
 * Add Default page title for core WordPress pages.
 * @since 1.0.0
 */
function codeless_add_default_page_title(){ 
    if( !codeless_page_from_builder() && is_page() && ! codeless_is_shop_page() && ( ( function_exists( 'is_wc_endpoint_url' ) && !is_wc_endpoint_url( 'order-received' )  ) || !function_exists('is_wc_endpoint_url') ) && get_page_template_slug() != 'template-sidenav.php' ){
        get_template_part( 'template-parts/default-page-header' );
        return;
    }
}


function codeless_leftnav_page_title(){ 
    if( get_page_template_slug() == 'template-sidenav.php' ){
        get_template_part( 'template-parts/default-page-header' );
        return;
    }
}


/**
 * Add content of Blog Page at the top of page before the loop
 * @since 1.0.0
 */
function codeless_add_page_header(){
    global $post;  
 
     $content    = $post->post_content;
 
     $page_header    = codeless_extract_page_header($content);
 
     $page_header    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_page_header' , $page_header ));
 
     echo '<div class="codeless-content-page-header" data-codeless="true">' . apply_filters( 'codeless_builder_page_header_content', do_shortcode_if_frontend( $page_header ) ) .'</div>'; 
 
     //wp_reset_postdata();
 }

 function do_shortcode_if_frontend($content){
    if( ! is_customize_preview() )
        return do_shortcode($content);
    return $content;
}


/**
 * Displays the generated output from header builder
 * or output the default header layout
 * 
 * @since 1.0.0
 */
function codeless_show_header(){
    echo '<div class="header_container ' . esc_attr( codeless_extra_classes( 'header' ) ) . '" ' . codeless_extra_attr( 'header' ) . '>';

    // If Codeless-Builder is installed load from plugin, if not load the default class
    if( function_exists( 'cl_output_header' ) )
        cl_output_header(); 
    else{
        $cl_header = new CodelessHeaderOutput();
        $cl_header->output();
    }
    echo '</div>';    
  
}




/**
 * Default Header Data
 * 
 * @since 1.0.0
 */
function codeless_get_default_header(){
    $data = array(
        'main' => array ( 
            
            'left' => array ( 
                0 => array ( 
                    'type' => 'cl_header_logo', 
                    'order' => 0, 
                    'params' => array ( ), 
                    'row' => 'main', 
                    'col' => 'left', 
                    'from_content' => true, 
                ), 
                
            ), 

            'right' => array ( 
                0 => array ( 
                    'type' => 'cl_header_menu', 
                    'order' => 2, 
                    'params' => array ( 'hamburger' => false, 'use_for_responsive' => 1, 'open_menu_button' => 1, 'responsive_menu' => 1 ), 
                    'row' => 'main', 
                    'col' => 'right', 
                    'from_content' => true
                ), 
            ), 
        )
    );

    return apply_filters( 'codeless_default_header', $data );
}


function codeless_is_header_boxed(){
    return apply_filters( 'codeless_is_header_boxed', codeless_get_mod( 'header_boxed', false ) );
}


/**
 * Return true if have widget on given page sidebar
 * 
 * @since 1.0.0
 */
function codeless_is_active_sidebar(){

    return is_active_sidebar( codeless_get_sidebar_name() );
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * 
 * @global int $content_width
 * @since 1.0.0
 */
function codeless_content_width() {
    
    global $content_width;
    
    if( codeless_get_page_layout() != 'fullwidth' ){
        $content_width = 795;

        if( codeless_get_mod( 'layout_modern' ) )
            $content_width = 770;
        
        if( codeless_get_page_layout() == 'dual_sidebar' )
            $content_width = 520;
    }

    // Blog Alternate
    if( codeless_is_blog_query() && codeless_blog_style() == 'alternate' && ! is_single() ){
        $content_width = 500;
    }
    
    // Blog Grid
    if( codeless_is_blog_query() && codeless_blog_style() == 'grid' && ! is_single() ){
        $content_width = 500;
    }

}
add_action( 'template_redirect', 'codeless_content_width' );


/**
 * Return the exact thumbnail size to use for portfolio
 *
 * @since 1.0.0
 */
function codeless_get_portfolio_thumbnail_size(){

    $portfolio = codeless_get_mod( 'portfolio_image_size', 'portfolio_entry' );

    if( ( codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() ) == 'large' || codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() ) == 'wide' || (codeless_get_mod( 'portfolio_masonry_extra_layout', 'default' ) == 'all_long' && codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() ) != 'default' ) ) && codeless_get_mod( 'portfolio_layout' ) == 'masonry' )
        $portfolio = 'portfolio_entry';

    return $portfolio;
}  

/**
 * Return the exact thumbnail size to use for team
 *
 * @since 1.0.0
 */
function codeless_get_team_thumbnail_size(){
    $team = codeless_get_mod( 'team_image_size', 'team_entry' );
    return $team;
}  


/**
 * Array of Custom Image Sizes
 * Can be modified by user in Theme Panel
 *
 * @since 1.0.0
 */
add_filter( 'codeless_image_sizes', 'codeless_image_sizes' );
function codeless_image_sizes(){
    
    $default = array(
        'blog_entry'  => array(
            'label'   => esc_html__( 'Blog Entry', 'picante' ),
            'width'   => 'blog_entry_image_width',
            'height'  => 'blog_entry_image_height',
            'crop'    => 'blog_entry_image_crop',
            'section' => 'blog',
            'description' => esc_html__('Used as default for all blog images.', 'picante' ),
        ),
        
        'blog_entry_small'  => array(
            'label'   => esc_html__( 'Blog Entry Small', 'picante' ),
            'width'   => 'blog_entry_small_image_width',
            'height'  => 'blog_entry_small_image_height',
            'crop'    => 'blog_entry_small_image_crop',
            'section' => 'blog',
            'description' => esc_html__('Used for Blog Grid and Carousels, News, Media, Alternate', 'picante'),
            'defaults' => array( '300', '206', 'center-center' )
        ),  

        'blog_entry_wide'  => array(
            'label'   => esc_html__( 'Blog Entry Wide', 'picante' ),
            'width'   => 'blog_entry_wide_image_width',
            'height'  => 'blog_entry_wide_image_height',
            'crop'    => 'blog_entry_wide_image_crop',
            'section' => 'blog',
            'description' => esc_html__('Used for wide blog posts on masonry', 'picante'),
            'defaults' => array( '370', '480', 'center-center' )
        ),
        
        'blog_post'  => array(
            'label'   => esc_html__( 'Blog Post', 'picante' ),
            'width'   => 'blog_post_image_width',
            'height'  => 'blog_post_image_height',
            'crop'    => 'blog_post_image_crop',
            'section' => 'blog',
        ),

        'portfolio_entry'  => array(
            'label'   => esc_html__( 'Portfolio Entry', 'picante' ),
            'width'   => 'portfolio_entry_image_width',
            'height'  => 'portfolio_entry_image_height',
            'crop'    => 'portfolio_entry_image_crop',
            'section' => 'portfolio',
            'description' => esc_html__('Used as default for all portfolio grid.', 'picante' ),
        ),

        'team_entry'  => array(
            'label'   => esc_html__( 'Team Entry', 'picante' ),
            'width'   => 'team_entry_image_width',
            'height'  => 'team_entry_image_height',
            'crop'    => 'team_entry_image_crop',
            'section' => 'team',
            'description' => esc_html__('Used as default for all team members', 'picante' ),
        ),

    
    );

    $custom = codeless_get_mod('cl_custom_img_sizes', array());
    if( empty( $custom ) )
        return $default;

    foreach( $custom as $new ){
        $default[$new] = array(
            'label'   => esc_html__( 'Custom', 'picante' ) . ': ' . $new,
            'width'   => $new . '_image_width',
            'height'  => $new . '_image_height',
            'crop'    => $new . '_image_crop',
            'section' => 'other',
            'description' => '',
        );
    }

    return $default;
}



/**
 * Array of image crop positions
 *
 * @since 1.0.0
 */
function codeless_image_crop_positions() {
    return array(
        ''              => esc_html__( 'Default', 'picante' ),
        'left-top'      => esc_html__( 'Top Left', 'picante' ),
        'right-top'     => esc_html__( 'Top Right', 'picante' ),
        'center-top'    => esc_html__( 'Top Center', 'picante' ),
        'left-center'   => esc_html__( 'Center Left', 'picante' ),
        'right-center'  => esc_html__( 'Center Right', 'picante' ),
        'center-center' => esc_html__( 'Center Center', 'picante' ),
        'left-bottom'   => esc_html__( 'Bottom Left', 'picante' ),
        'right-bottom'  => esc_html__( 'Bottom Right', 'picante' ),
        'center-bottom' => esc_html__( 'Bottom Center', 'picante' ),
    );
}


/**
 * Resize the Image (first time only)
 * Replace SRC attr with the new url created
 * 
 * @since 1.0.0
 */
function codeless_post_thumbnail_attr( $attr, $attachment, $size){
    
    if( is_admin() )
        return $attr;
    
    $size_attr = array();
    $additional_sizes = codeless_wp_get_additional_image_sizes();
    

    if( get_post_type( get_the_ID() ) == 'post' && codeless_get_mod( 'blog_lazyload', false ) ){
        $attr['class'] .= ' lazyload ';
        $attr['data-original'] = codeless_get_attachment_image_src($attachment->ID, $size);
    }

    if( is_string( $size ) && ! isset($additional_sizes[ $size ] ) )
        return $attr;
    
    if( ! codeless_get_mod( 'optimize_image_resizing', false ) )
        return $attr;
        
    if( is_string( $size ) )
        $size_attr = $additional_sizes[ $size ];

    $image = codeless_image_resize( array(
        'image'  => $attachment->guid,
        'width'  => isset($size_attr['width']) ? $size_attr['width'] : '',
        'height' => isset($size_attr['height']) ? $size_attr['height'] : '',
        'crop'   => isset($size_attr['crop']) ? $size_attr['crop'] : ''
    ));
    
    
    $image_meta = wp_get_attachment_metadata($attachment->ID);

    if( isset( $image['url'] ) && !empty( $image['url'] ) )
        $attr['src'] = $image['url'];
    
    // Replace old url and width with new cropped url and width
    if( isset( $attr['srcset'] ) && ! empty( $attr['srcset'] ) ){
        $attr['srcset'] = str_replace($attachment->guid, $image['url'], $attr['srcset']);

        if( ! empty( $image['width'] ) )
            $attr['srcset'] = str_replace($image_meta['width'], $image['width'], $attr['srcset']);
    }

    $attr['sizes'] = '(max-width: '.$image['width'].'px) 100vw, '.$image['width'].'px';

    return $attr;
} 

add_filter('wp_get_attachment_image_attributes', 'codeless_post_thumbnail_attr', 10, 3);


/**
 * Resize the Image (first time only)
 * Return the resized image url
 * 
 * @since 1.0.0
 */
function codeless_get_attachment_image_src( $attachment_id, $size = false ){
    
    if( $size === false )
        $size = 'full';
    
    $src = wp_get_attachment_image_src( $attachment_id, 'full' );
    
    $size_attr = array();
    $additional_sizes = codeless_wp_get_additional_image_sizes();
   

    if( is_array( $size ) || ! isset( $additional_sizes[ $size ] ) )
        return $src[0];
    
    $size_attr = $additional_sizes[ $size ];

    if( is_array( $size_attr ) && ! empty( $src ) ){
        
        $image = codeless_image_resize( array(
            'image'  => $src[0],
            'width'  => isset($size_attr['width']) ? $size_attr['width'] : '',
            'height' => isset($size_attr['height']) ? $size_attr['height'] : '',
            'crop'   => isset($size_attr['crop']) ? $size_attr['crop'] : ''
        ));
        
        return $image['url'];
        
    }
    
    return $src[0];
    
}


/**
 * Removes width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 * @since 1.0.0
 */
function codeless_remove_image_size_attributes( $html, $post_id ) {
    if( get_post_type($post_id) == 'product' && codeless_get_mod( 'shop_product_lightbox', false ) )
        return $html;

    return preg_replace( '/(width|height)="\d*"/', '', $html );
}
 
// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'codeless_remove_image_size_attributes', 9, 2 );


/**
 * List of share buttons and links
 * 
 * @since 1.0.0
 */
function codeless_share_buttons( $for_element = false ){
    if( function_exists(' codeless_builder_share_buttons' ) )
        return codeless_builder_share_buttons( $for_element );

    return false;
}


/**
 * Change default excerpt length
 *
 * @since 1.0.0
 */
function codeless_custom_excerpt_length( $length ) {
    if( codeless_get_from_element('blog_style') == 'fullimage' )
        return 12;
    else if( codeless_get_from_element('blog_style') == 'grid' )
        return 16;
    else

       return codeless_get_mod( 'blog_excerpt_length', 60 );
}
add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 990 );


/**
 * Get first url on content if post format is LINK
 *
 * @since 1.0.0
 */
function codeless_get_permalink( $id ){
    
    $link = get_permalink( $id );
    
    if( get_post_format() == 'link' )
        $link = get_url_in_content( get_the_content() );

    return $link;
    
}


/**
 * Returns fallback for Menu.
 * 
 * @since 1.0.0
 */

if(!function_exists('codeless_default_menu')){
  
    function codeless_default_menu($args){
        
      $current = "";
      if (is_front_page())
        $current = "class='current-menu-item'";
      
      echo "<ul class='menu'>";

        echo "<li $current><a href='".esc_url(home_url())."'>".esc_attr__('Home', 'picante')."</a></li>";
        wp_list_pages('title_li=&sort_column=menu_order&number=2&depth=0');

      echo "</ul>";

    }
}


/**
 * Returns Header Element, used on codeless-customizer-options
 * 
 * @since 1.0.0
 */
if(!function_exists('codeless_load_header_element'))
{

    function codeless_load_header_element($element)
    {
        $output = '';      
        $template = locate_template('includes/codeless_builder/header-elements/'.$element.'.php');
        if(is_file($template)){
          ob_start();
            include( $template );
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
}


/**
 * Basic Pagination Output of theme
 * 
 * @since 1.0.0
 */
function codeless_number_pagination( $query = false, $echo = true ) {
        
    // Get global $query
    if ( ! $query ) {
        global $wp_query;
        $query = $wp_query;
    }

    // Set vars
    $total  = $query->max_num_pages;
    $max    = 999999999;

    // Display pagination
    if ( $total > 1 ) {

        // Get current page
        if ( $current_page = get_query_var( 'paged' ) ) {
            $current_page = $current_page;
        } elseif ( $current_page = get_query_var( 'page' ) ) {
            $current_page = $current_page;
        } else {
            $current_page = 1;
        }

        // Get permalink structure
        if ( get_option( 'permalink_structure' ) ) {
            if ( is_page() ) {
                $format = 'page/%#%/';
            } else {
                $format = '/%#%/';
            }
        } else {
            $format = '&paged=%#%';
        }

        $args = apply_filters( 'codeless_pagination_args', array(
            'base'      => str_replace( $max, '%#%', html_entity_decode( get_pagenum_link( $max ) ) ),
            'format'    => $format,
            'current'   => max( 1, $current_page ),
            'total'     => $total,
            'mid_size'  => 3,
            'type'      => 'list',
            'prev_text' => '<span class="cl-pagination-prev"><i class="cl-icon-arrow-left"></i></span>',
            'next_text' => '<span class="cl-pagination-next"><i class="cl-icon-arrow-right"></i></span>'
        ) );

        $align = codeless_get_mod( 'blog_pagination_align', 'center' );

        if( $echo )
            echo '<div class="cl-pagination cl-pagination-align-'. esc_attr( $align ) .'">'. paginate_links( $args ) .'</div>';
        else
            return '<div class="cl-pagination cl-pagination-align-'. esc_attr( $align ) .'">'. paginate_links( $args ) .'</div>';

    }

}


/**
 * Next/Prev Pagination
 *
 * @since 1.0.0
 */
function codeless_nextprev_pagination( $pages = '', $range = 4, $query = false ) {
    $output     = '';
    $showitems  = ($range * 2)+1; 
    global $paged;
    if ( empty( $paged ) ) $paged = 1;
        
    if ( $pages == '' ) {

        if( ! $query ){
          global $wp_query;
          $query = $wp_query;
        }

        $pages = $query->max_num_pages;
        if ( ! $pages) {
            $pages = 1;
        }
    }

    if ( 1 != $pages ) {

        $output .= '<div class="cl-pagination-jump">';
            $output .= '<div class="newer-posts">';
                $output .= get_previous_posts_link( '&larr; '. esc_html__( 'Newer Posts', 'picante' ), $query->max_num_pages );
            $output .= '</div>';
            $output .= '<div class="older-posts">';
                $output .= get_next_posts_link( esc_html__( 'Older Posts', 'picante' ) .' &rarr;', $query->max_num_pages );
            $output .= '</div>';
        $output .= '</div>';

        
        return $output;
    }
}

/**
 * Load More Button Pagination Style
 * 
 * @since 1.0.0
 */
function codeless_infinite_scroll( $type = '', $query = false ) {
    $max_num_pages = 0;
    if( $query )
        $max_num_pages = $query->max_num_pages;

    // Output pagination HTML
    $output = '';
    $output .= '<div class="cl-pagination-infinite '. $type .'" data-type="' . esc_attr( $type ) . '" data-end-text="' . esc_html__( 'No more posts to load', 'picante' ) . '" data-msg-text="' . esc_html__( 'Loading Content', 'picante' ) . '">';
        $output .= '<div class="older-posts">';
            $output .= get_next_posts_link( esc_html__( 'Older Posts', 'picante' ) .' &rarr;', $max_num_pages);
        $output .= '</div>';

        $output .= '<div class="cl-infinite-loader hidden"><span class="dot dot1"></span><span class="dot dot2"></span><span class="dot dot3"></span><span class="dot dot4"></span></div>';

        if( $type == 'loadmore' )
            $output .= '<button id="cl_load_more_btn" class="' . codeless_button_classes(array('cl-btn btn-hover-shadow btn-style-square'), true) . '">' . esc_html__( 'Load More', 'picante' ) . '</button>';
    $output .= '</div>';

    return $output;

}


/**
 * Add Action for layout Modern on Content
 * 
 * @since 1.0.0
 */
function codeless_layout_modern(){
    if( (int) codeless_is_layout_modern() ){
        echo '<div class="cl-layout-modern-bg"></div>';
    }
}


/**
 * Get Sidebar Name to load for current page
 * 
 * @since 1.0.0
 */
function codeless_get_sidebar_name(){

    $sidebar = 'sidebar-pages';
    if( codeless_is_blog_query() || ( is_single() && get_post_type( codeless_get_post_id() ) == 'post' ) )
        $sidebar = 'sidebar-blog';

    if( is_search() )
        $sidebar = 'search-dynamic';

    if( codeless_is_shop_page() || ( function_exists('is_product_category') && is_product_category() ) || ( function_exists('is_product') && is_product() ) )
        $sidebar = 'woocommerce';

    if( is_page() && is_registered_sidebar( 'sidebar-custom-page-' . codeless_get_post_id() ) )
        $sidebar = 'sidebar-custom-page-' . codeless_get_post_id();

    if( is_archive() ){
        $obj = get_queried_object();
        if( is_object($obj) && isset($obj->term_id) && is_registered_sidebar( 'sidebar-custom-category-' . $obj->term_id ) ){
            $sidebar = 'sidebar-custom-category-' . $obj->term_id;
        }
    }

    if( function_exists('is_product_category') && is_product_category() ){
        $obj = get_queried_object();

        if( is_object($obj) && isset($obj->term_id) && is_registered_sidebar( 'sidebar-custom-product-category-' . $obj->term_id ) ){
            $sidebar = 'sidebar-custom-product-category-' . $obj->term_id;
        }
    }

    if( is_page() && codeless_get_meta( 'page_custom_sidebar', 'default' ) != 'default' )
        $sidebar = codeless_get_meta( 'page_custom_sidebar', 'default' );

    return $sidebar;
}


/**
 * Convert hexdec color string to rgb(a) string
 * 
 * @since 1.0.0
 */
function codeless_hex2rgba($color, $opacity = false) {
 
    $default = 'rgb(0,0,0)';
 
    //Return default if no color provided
    if(empty($color))
          return $default; 
    
    //Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}



/**
 * Get Meta by ID
 * 
 * @since 1.0.0
 * @version 1.0.5
 */
function codeless_get_meta( $meta, $default = '', $postID = '' ){
    /* for online */
    global $codeless_online_mods;
    if( isset($codeless_online_mods[$meta])  && ! is_customize_preview() ){
        return $codeless_online_mods[$meta]; 
    }
    $id = 0;

    if( function_exists('codeless_get_post_id') )
        $id = codeless_get_post_id();
   
    if( $postID != '' )
        $id =  $postID;

    $value = get_post_meta( $id, $meta );
    
    $return = '';
    $nr = 0;
    
    if(!empty($value))
        $nr = count($value);

    if( is_array( $value ) && ( count( $value ) == 1 || ( count($value) >= 2 && $value[0] == $value[1] )  ) )
        $return = $value[$nr-1];
    else
        $return = $value;

    if( is_array( $value ) && empty( $value ) )
        $return = '';
 

    if( $default != '' && ( $return == '' || ! $return ) )
        return $default;
    
    return $return;
}


function codeless_page_background_color( $attr ){

    if( is_archive() )
        return;
    
    $bg_color = codeless_get_meta( 'page_bg_color', '', get_the_ID() );
    if( $bg_color != '' )
        $attr[] = 'style="background-color:'.$bg_color.';"';

    return $attr;
}


/**
 * Core function that register a new post type
 * Codeless Builder plugin should be activated to work
 * 
 * @since 1.0.0
 */
function codeless_register_post_type( $args = array() ){

    if( ! is_array( $args ) || empty( $args ) || ! class_exists( 'Cl_Register_Post_Type' ) )
        return false;

    new Cl_Register_Post_Type( $args );

}



 /**
  * Core function for retrieve all terms for a custom taxonomy
  *
  * @since 1.0.0
  */
function codeless_get_terms( $term, $default_choice = false, $key_type = 'slug' ){ 
    $return = array();
    if( $term == 'post' ){
        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) );
 
        foreach ( $categories as $category ) {
            $return[ $category->term_id ] = $category->name;
        }
    }
    $terms = get_terms( $term );

    if( $default_choice )
        $return['all'] = esc_attr__( 'All', 'picante' );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $return[ $term->{$key_type} ] = $term->name; 
        }
    }

    return $return;
}


 /**
  * Get all posts, custom posts, pages in one array
  *
  * @since 1.0.0
  */
function codeless_get_all_site_links(){
    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => array( 'post', 'page', 'portfolio' ),
        )
    );

    $return = array();

    if( ! empty( $posts_array ) && ! is_wp_error( $posts_array )  ){
        foreach ( $posts_array as $post ) {
            $return[ $post->ID ] = $post->post_title; 
        }
    }

    return $return;
}


/* Get default font-family Headings */

function codeless_get_headings_font_family(){
    $headings = codeless_get_mod( 'headings_typo' );

    return $headings['font-family'];
}


 /**
  * Core function for retrieve all posts for a custom taxonomy
  *
  * @since 1.0.0
  */
function codeless_get_items_by_term( $term ){ 
    $return = array();
    
    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => $term,
        )
    );
    if( ! empty( $posts_array ) && ! is_wp_error( $posts_array )  ){
        $return[ 'none' ] = 'None';
        foreach ( $posts_array as $post ) {
            $return[ $post->ID ] = $post->post_title; 
        }
    }

    return $return; 
}


 /**
  * Core function for retrieve get option value from element
  *
  * @since 1.0.0
  */
function codeless_get_from_element( $id, $default = '' ){
    global $cl_from_element;
    if( isset($cl_from_element[$id]) )
        return $cl_from_element[$id];
    else
        return $default;
}


/**
 * List of socials to use on Team
 * @since 1.0.0
 */
function codeless_get_team_social_list(){
    $list = array(
        array( 'id' => 'twitter', 'icon' => 'cl-icon-twitter' ),
        array( 'id' => 'facebook', 'icon' => 'cl-icon-facebook' ),
        array( 'id' => 'linkedin', 'icon' => 'cl-icon-linkedin' ),
        array( 'id' => 'whatsapp', 'icon' => 'cl-icon-whatsapp' ),
        array( 'id' => 'pinterest', 'icon' => 'cl-icon-pinterest' ),
        array( 'id' => 'google', 'icon' => 'cl-icon-google' ),
    );

    return apply_filters( 'codeless_team_social_list', $list );
}


/**
 * Strip Gallery Shortcode from Content
 * @since 1.0.0
 */
function codeless_strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}


/**
 * Print list of Social for Team ID
 * @since 1.0.0
 */
function codeless_team_socials( ){
    $list = codeless_get_team_social_list();
    $output = '';
    if( empty($list) )
        return;
 
    foreach($list as $social){
        $link = codeless_get_meta( $social['id'] . '_link', '', get_the_ID());

        if( $link != '' ){
            $output .= '<a href="'.esc_url( $link ).'"><i class="'.esc_attr( $social['icon'] ).'"></i></a>';
        }
    }

    
    return $output;
}


/**
 * Return HTMl of all tags with appropiate link
 * @since 1.0.0
 */
function codeless_all_tags_html(){
    $tags = get_tags();
    $html = '<div class="post_tags">';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
                
        $html .= " <a href='". esc_url($tag_link). "' title='". esc_attr( $tag->name )." Tag' class='".esc_attr( $tag->slug )."'>";
        $html .= "#". esc_html( $tag->name )."</a>";
    }
    $html .= '</div>';
    return $html;
}


/**
 * Generate an image HTML tag from thumnail ID, size, lazyload
 * If no thumbnail id, a placeholder will return
 * @since 1.0.0
 */
function codeless_generate_image( $id, $size, $lazyload = false ){
    $attr = array();

    if( $lazyload ){
        $attr['class'] = 'lazyload';
        $attr['data-original'] = codeless_get_attachment_image_src( $id, $size );
    }



    if( $id != 0 )
        return wp_get_attachment_image($id, $size, false, $attr );
}



/**
 * Return a list of all image sizes
 *
 * @since 1.0.0
 */
if( !function_exists( 'codeless_get_additional_image_sizes' ) ){
    function codeless_get_additional_image_sizes(){
        $add = codeless_wp_get_additional_image_sizes();
        $array = array('theme_default' => 'default', 'full' => 'full');

        foreach($add as $size => $val){
            $array[$size] = $size . ' - ' . $val['width'] . 'x' . $val['height'];
        }

        return $array;
    }
}


/**
 * Check function for WP versions lower than WP 4.7
 *
 * @since 1.0.0
 */
if( !function_exists( 'codeless_wp_get_additional_image_sizes' ) ){
    function codeless_wp_get_additional_image_sizes(){
        if( function_exists( 'wp_get_additional_image_sizes' ) )
            return wp_get_additional_image_sizes();
        
        return array();
    }
}


/**
 * Check if is a shop page
 * @since 1.0.0
 */
function codeless_is_shop_page(){
    if( class_exists( 'woocommerce' ) && is_shop() )
        return true;
    return false;
}


/**
 * return Page Parents
 * @since 1.0.0
 */
function codeless_page_parents() {
    global $post, $wp_query, $wpdb;
    
    if( (int) codeless_get_post_id() != 0 ){
      
        $post = $wp_query->post;

        if( is_object( $post ) ){

            $parent_array = array();
            $current_page = $post->ID;
            $parent = 1;

            while( $parent ) {

                $sql = $wpdb->prepare("SELECT ID, post_parent FROM $wpdb->posts WHERE ID = %d; ", array($current_page) );
                $page_query = $wpdb->get_row($sql);
                $parent = $current_page = $page_query->post_parent;
                if( $parent )
                    $parent_array[] = $page_query->post_parent;
                
            }

            return $parent_array;

        }
      
    }
    
}

/**
 * List Revolution Slides
 * @since 1.0.0
 */
function codeless_get_rev_slides(){

    if ( class_exists( 'RevSlider' ) ) {
        $slider = new RevSlider();
            $arrSliders = $slider->getArrSliders();

            $revsliders = array();
            if ( $arrSliders ) {
                $revsliders[ 0 ] = 'none';
                foreach ( $arrSliders as $slider ) {
                    /** @var $slider RevSlider */
                    $revsliders[ $slider->getAlias() ] = $slider->getTitle() ;
                }
            } else {
                $revsliders[ 0 ] = 'none';
            }
        return (array) $revsliders;    
    }        
}


/**
 * List LayerSlider Slides
 * @since 1.0.0
 */
function codeless_get_layer_slides(){

    if( class_exists( 'LS_Sliders' )){
            $ls = LS_Sliders::find( array(
                'limit' => 999,
                'order' => 'ASC',
            ) );
            $layer_sliders = array();
            if ( ! empty( $ls ) ) {
                foreach ( $ls as $slider ) {
                    $layer_sliders[  $slider['id'] ] =  $slider['name'];
                }
            } else {
                $layer_sliders[ 0 ] = 'none';
            }
         return (array) $layer_sliders;   
    }

}

/**
 * Visualizer Charts
 * @since 1.0.0
 */
function codeless_get_visualizer_charts(){

    if( ! function_exists( 'visualizer_launch' ) )
        return;
    
    $query_args = array(
        'post_type'      => Visualizer_Plugin::CPT_VISUALIZER,
        'posts_per_page' => 50,
        'paged'          => 1,
    );

    $data = array(
        'none' => 'None'
    );

    $query  = new WP_Query( $query_args );
    while ( $query->have_posts() ) {
        $chart = $query->next_post();
        $data[$chart->ID] = $chart->ID;
    }

    return $data;
}


/**
 * TablePress
 * @since 1.0.0
 */
function codeless_get_tablepress(){

    if( ! class_exists('TablePress') )
        return;

    $m = TablePress::load_model( 'table' );
    $table_ids = $m->load_all( true, false  );

    $tables = array();
    foreach ( $table_ids as $table_id ) {
        // Load table, without table data, options, and visibility settings.
        $table = $m->load( $table_id );
        $tables[ $table['id'] ] = $table['name'];
    }

    return $tables;
}


/**
 * List Google Fonts
 * @since 1.0.0
 */
if( ! function_exists( 'codeless_get_google_fonts' ) ){
    function codeless_get_google_fonts(){
        $return = array('theme_default' => esc_attr__('Theme Default', 'picante' ), 'Helvetica Black' => 'Helvetica Black');

        $google_fonts   = Kirki_Fonts::get_google_fonts();
        $standard_fonts = Kirki_Fonts::get_standard_fonts();

        $google_fonts = array_combine(array_keys($google_fonts), array_keys($google_fonts));
        $standard_fonts = array_combine(array_keys($standard_fonts), array_keys($standard_fonts));
        $return = array_merge($return, $google_fonts, $standard_fonts);

        return $return;
    }  
}


/**
 * Add bordered style layout
 * @since 1.0.0
 */
function codeless_layout_bordered(){
    if( ! codeless_get_mod( 'layout_bordered', false ) )
        return;
    ?>
    <div class="cl-layout-border-container">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="left"></div>
        <div class="right"></div>
    </div><!-- .cl-layout-border-container -->
    <?php
}  


/**
 * in Future to update
 * @since 1.0.0
 */
function codeless_complex_esc( $data ){
    return $data;
}


/**
 * Generate Palettes for Colorpicker
 * @since 1.0.0
 */
function codeless_generate_palettes(){
    return array(
        codeless_get_mod( 'primary_color' ),
        codeless_get_mod( 'secondary_color' ),
        codeless_get_mod( 'border_accent_color' ),
        codeless_get_mod( 'labels_accent_color' ),
        codeless_get_mod( 'highlight_light_color' ),
        codeless_get_mod( 'other_area_links' ),
        codeless_get_mod( 'h1_dark_color' ),
        codeless_get_mod( 'h1_light_color' )
    );
}


/**
 * Load extra template parts for codeless-builder
 * @since 1.0.0
 */
function codeless_get_extra_template($template){
    include( get_template_directory() . '/template-parts/extra/' . $template . '.php' );
}


/**
 * Get a list of all registered sidebars
 * @since 1.0.0
 */
function codeless_get_registered_sidebars($add_default = false){
    global $wp_registered_sidebars;
    $array = get_option( 'sidebars_widgets' );
    if( empty($array) )
        return array();

    $sidebars = array();

    if( $add_default )
        $sidebars['default'] = 'Default';

    foreach($array as $key => $val){
        if( $key == 'wp_inactive_widgets' )
            continue;
        if( isset( $wp_registered_sidebars[$key] ) ){

            $sidebars[$key] = $wp_registered_sidebars[$key]['name'];
        }
    }

    return $sidebars;
}





function codeless_update_comment_fields( $fields ) {

    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $label     = $req ? '*' : ' ' . esc_attr__( '(optional)', 'picante' );
    $aria_req  = $req ? "aria-required='true'" : '';

    $fields['author'] =
        '<p class="comment-form-author">
            <input id="author" name="author" type="text" placeholder="' . esc_attr__( "Jane Doe", "picante" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30" ' . $aria_req . ' />
        </p>';

    $fields['email'] =
        '<p class="comment-form-email">
            <input id="email" name="email" type="email" placeholder="' . esc_attr__( "name@email.com", "picante" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
        '" size="30" ' . $aria_req . ' />
        </p>';

    $fields['url'] =
        '<p class="comment-form-url">
            <input id="url" name="url" type="url"  placeholder="' . esc_attr__( "http://google.com", "picante" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" />
            </p>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'codeless_update_comment_fields' );



function codeless_update_comment_field( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter comment here...", "picante" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'codeless_update_comment_field' );



/**
 * Get a list of all custom sidebars per page
 * @since 1.0.0
 */
function codeless_get_custom_sidebar_pages(){
    $pages = codeless_get_mod( 'codeless_custom_sidebars_pages' );
    $return = array();

    if( ! empty( $pages ) ){

            foreach($pages as $page)
                $return[(int)$page] = get_the_title( (int)$page );
        
        return $return;
    }

    return array();

}


/**
 * Get a list of all custom sidebars per categories
 * @since 1.0.0
 */
function codeless_get_custom_sidebar_categories(){
    $categories = codeless_get_mod( 'codeless_custom_sidebars_categories' );
    $return = array();

    if( ! empty( $categories ) ){

            foreach($categories as $category){

                $category_name = get_the_category_by_ID( (int)$category );
                $return[(int)$category] = $category_name;
            }
        
        return $return;
    }

    return array();

}

/**
 * Get a list of all custom sidebars per categories
 * @since 1.0.0
 */
function codeless_get_custom_sidebar_product_categories(){
    $categories = codeless_get_mod( 'codeless_custom_sidebars_product_categories' );

    $return = array();
    
    if( $categories ){

            foreach($categories as $category){
                $category_name = get_term( (int)$category, 'product' );
               
                $return[(int)$category] = (! is_wp_error( $category_name ) ? $category_name->name : (int)$category);
            }
        
        return $return;
    }

    return array();

}

/**
 * Top Ancestor
 * @since 1.0.0
 */
if(!function_exists('codeless_get_post_top_ancestor_id')){

    function codeless_get_post_top_ancestor_id(){
        global $post;
        
        if($post->post_parent){
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            return $ancestors[0];
        }
        
        return $post->ID;
    }
}


/**
 * List of registered nav menus
 * @since 1.0.0
 */
function codeless_get_all_wordpress_menus(){
    $terms = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    $menus = array(
        'default' => esc_attr__('Default (Main Theme Location)', 'picante' )
    );

    if( count( $terms ) == 0 )
        return $menus;

    foreach($terms as $term){
        $menus[$term->term_id] = $term->name;
    } 

    return $menus;
}


/**
 * Generate Tool Share Output
 * 
 * @since 1.0.0
 */
function codeless_get_entry_tool_share(){
    
    $output = '<div class="share-buttons">';
    
    $shares = codeless_share_buttons();
    
    if( !empty( $shares ) ){
        foreach( $shares as $social_id => $data ){
            $output .= '<a data-postid="'.esc_attr( get_the_ID() ).'" class="share" href="javascript:window.open(\'' . esc_url( $data['link'] ) . '\', \'Share Window\', \'width=400,height=500\')" title="'.esc_attr__('Social Share', 'picante').' ' . esc_attr( $social_id ) . '" target="_blank"><i class="' . esc_attr( $data['icon'] ) .'"></i></a>';
        }
    }
    $output .= '</div>';
    
    return $output;
}


/**
 * Get header menu color (light/dark)
 * @since 1.0.0
 */
function codeless_get_header_color(){
    $header_color = codeless_get_mod( 'header_color', 'dark' );

    if( function_exists( 'is_woocommerce' ) )
        if( (  is_woocommerce() && !is_shop() ) || is_cart() || is_checkout() )
            $header_color = codeless_get_mod( 'shop_single_header_color', 'dark' );

    $page_specific = codeless_get_meta( 'header_color', 'default' );

    if( $page_specific != 'default' && ! empty( $page_specific ) ){
        $header_color = $page_specific;
    }

    return $header_color;
}


/**
 * Check if page header is transparent or normal colored (white default)
 * @since 1.0.0
 */
function codeless_is_transparent_header(){
    $header_transparent = (int) codeless_get_mod( 'transparent_header', false );

    if( function_exists('is_woocommerce') )
        if( (is_woocommerce() && !is_shop() ) || is_cart() || is_checkout() )
            $header_transparent = (int) codeless_get_mod( 'shop_single_transparent_header', false );

    $page_specific = codeless_get_meta( 'transparent_header', 'default' );

    if( $page_specific != 'default' && ! empty( $page_specific ) ){

        if( $page_specific == 'transparent' )
            $header_transparent = true;
        else
            $header_transparent = false;
    }

    return $header_transparent;
}


/**
 * Get list of pages
 * @since 1.0.0
 */
function codeless_get_pages(){
    $pages = get_pages();
    $return = array('none' => esc_attr__('None', 'picante') );

    foreach( $pages as $page ){
        $return[$page->ID] = $page->post_title;
    }

    return $return;
} 


add_filter( 'rwmb_meta_boxes', 'codeless_register_meta_boxes_inpage' );
function codeless_register_meta_boxes_inpage( $meta_boxes ) {
    if( ! class_exists('Cl_Post_Meta') )
        return array();
    // all meta
    $meta = codeless_transform_meta_inpage( Cl_Post_Meta::$meta );

    $meta_boxes[] = array(
        'id'         => 'general',
        'title'      => esc_html__( 'General', 'picante' ),
        'post_types' => array('page', 'post', 'portfolio', 'product' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['general']
    );

    $meta_boxes[] = array(
        'id'         => 'post_data',
        'title'      => esc_html__( 'Post Data', 'picante' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['post_data']
    );

    $meta_boxes[] = array(
        'id'         => 'portfolio_data',
        'title'      => esc_html__( 'Portfolio Data', 'picante' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['portfolio_data']
    );

    $meta_boxes[] = array(
        'id'         => 'staff_data',
        'title'      => esc_html__( 'Staff Data', 'picante' ),
        'post_types' => array( 'staff', 'testimonial' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['staff_data']
    );

    $meta_boxes[] = array(
        'id'         => 'staff_social',
        'title'      => esc_html__( 'Staff Social', 'picante' ),
        'post_types' => array( 'staff' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['staff_social']
    );

    $meta_boxes[] = array(
        'id'         => 'product_data',
        'title'      => esc_html__( 'Product Data', 'picante' ),
        'post_types' => array( 'product' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['product_data']
    );


    return $meta_boxes;
}


function codeless_transform_meta_inpage($post_metas){

    $organized_metas = array();

    foreach( $post_metas as $meta ){
        $new_meta = array();
        foreach($meta as $key => $value){
            
            if( $key == 'label' )
                $new_meta['name'] = $value;

            if( $key == 'choices' )
                $new_meta['options'] = $value;

            

            if( $key == 'meta_key' )
                $new_meta['id '] = $value;

            if( $key == 'default' )
                $new_meta['std'] = $value;

            if( $key == 'tooltip' )
                $new_meta['desc'] = $value;

            if( $key == 'multiple' )
                $new_meta['multiple'] = true;

        }

        $new_meta['id'] = $meta['meta_key'];

        if( $meta['control_type'] == 'kirki-switch' ){
            $new_meta['options'] = array(
                0 => esc_attr__('Off', 'picante' ),
                1 => esc_attr__('On', 'picante')
            );
        }
        
        if( $meta['control_type'] == 'kirki-select' || $meta['control_type']== 'kirki-switch'  )
            $new_meta['type'] = 'select';
        else if( $meta['control_type'] == 'kirki-color'  )
            $new_meta['type'] = 'color';
        else if( $meta['control_type'] == 'textarea' )
            $new_meta['type'] = 'wysiwyg';
        else if( $meta['control_type'] == 'select_advanced' ){
            $new_meta['type'] = 'select_advanced';
        }
        else{
            $new_meta['type'] = $meta['control_type'];
        }


        if( isset( $meta['group_in'] ) )
            $organized_metas[ $meta['group_in'] ][ $new_meta['id'] ] = $new_meta;
    }

    return $organized_metas;
}


function codeless_placeholder_img(){
    echo '<img src="' . get_template_directory_uri() . '/img/placeholder-img.png" alt="'.esc_attr__( 'Placeholder', 'picante' ).'" />';
}


function codeless_back_to_top_button(){
    if( codeless_get_mod( 'back_to_top', false ) )
        echo '<a href="#" class="scrollToTop"><i class="cl-icon-chevron-up"></i></a>';
}


function codeless_image_link_attr( $form_fields, $post ) {
    $form_fields['cl-image-url'] = array(
        'label' => esc_attr__('Link', 'picante'),
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'cl_image_url', true ),
        'helps' => esc_html__('Add link to this image', 'picante'),
    );
 
    return $form_fields;
}
 
add_filter( 'attachment_fields_to_edit', 'codeless_image_link_attr', 10, 2 );
 

function codeless_image_link_attr_save( $post, $attachment ) {
    if( isset( $attachment['cl-image-url'] ) )
        update_post_meta( $post['ID'], 'cl_image_url', $attachment['cl-image-url'] );
 
    return $post;
}
 
add_filter( 'attachment_fields_to_save', 'codeless_image_link_attr_save', 10, 2 );



/**
 * Returns the list of css html tags for each option
 * 
 * @since 1.0.0
 * @version 1.0.7
 */
function codeless_dynamic_css_register_tags( $option = false, $suboption = false ){
    $data = array();
    $tag_list = '';
    
    // Primary Color
    $data['primary_color'] = array();
    // Font Color
    $data['primary_color']['color'] = array(
        '#testimonial-entries .testimonial_item .title',
        'footer#colophon .widget ul.social-icons-widget li a:hover',
        'aside .widget_categories ul li:hover',
        'body.cl-one-page .header_container:not(.cl-header-light) nav > ul > li.current-menu-item-onepage > a',

        'aside .widget ul li a:hover',
        'aside .widget_rss cite',
        'h1 > a:hover, h2 > a:hover, h3 > a:hover, h4 > a:hover, h5 > a:hover, h6 > a:hover',
        '.cl-pagination a:hover',
        'mark.highlight',
        '.cl_team.style-simple .team-item .team-position',
        '.cl_toggles.style-simple .cl_toggle .title[aria-expanded="true"]',
        '.cl_counter',
        '.single-post .nav-links > div a .nav-title:hover',
        '.shop-products .product_item .cl-price-button-switch a',
        '.woocommerce div.product p.price, .woocommerce div.product span.price',
        '.single-post article .entry-content > a',
        '.header-el .widgetized form i',
        '.cl_toggles.style-square_plus .cl_toggle .title > a:before',
        '.cl_tabs.style-simple .cl-nav-tabs li.active a',
        'aside .widget_nav_menu > ul li:hover > a',
        '.cl_list.style-circle li > i',
        '.cl_pricelist .price .integer-part, .cl_pricelist .price .decimal-part',
        '.cl_pricelist .header.panel',
        '.cl-filters button.selected',
        '.calculated_result, .wpcf7-calculated',
        '.cl-header-side .header_container .extra_tools_wrapper .tool:hover i',
        '.cl-header-side .header_container.header-left nav > ul > li > a:hover:after',
        '.entry-meta-tools .entry-meta-single a',
        '.cl-price-rating .price, body[class*=" currency-"] .cl-price-rating .price',
        '.shop-products .product_item .cl-actions a:hover i',
        '.shop-products .product_item .cl-actions .add_to_cart_button:hover:after, .shop-products .product_item .cl-actions .add_to_cart_button:hover:after, .shop-products .product_item .cl-actions .add_to_wishlist:hover:after',
        '.single-product .cl-info.gift .tooltip a',
        '.single-product .cl-wishlist-share-wrapper .wishlist i, .add_to_wishlist_button i',
        '.cl-default-page-header .page_parents li.active a',
        'table.shop_table .cart_item .product-data .in-stock i',
        'table.cart td.actions .coupon label i',
        '.cart-collaterals .shipping-calculator-button, .cart-collaterals #shipping_method li input[type=radio]:checked ~ .check:before',
        '.cl-info-checkout a, .cl-info-checkout i',
        '.payment_method_paypal a',
        '.cl_woocommerce a.show-all',
        '.cl-product-collection-feature .data a:hover',
        '#portfolio-entries.portfolio-style-presentation .portfolio_item .entry-wrapper-content .entry-content a.preview',
        '.cl-closed-section .close_section_button .icon',
        '.cl-sidenav ul li.current_page_item a',
        '.summary .group_table tr td.label .price *',
        '.woocommerce-loop-category__title mark',
        '.content-col a:not(.cl-btn):hover',
        '.cl_team.style-left_aligned .position',
        '.header_container.cl-header-light:not(.cl-responsive-header.cl-header-sticky-ready) .tool .tool-link .cart-total',
        '.testimonial-entries.style-simple .position',
        'article.default-style .categories_list',
        '.entry-meta a',
        '.blog-entries article .entry-readmore',
        '.comments-title .nr',
        '.comment-author-link .author',
        '.single-menu-tab.active h3 a',
        '.woocommerce .star-rating:before, .woocommerce .star-rating span',
        '.woocommerce #reviews #comments .woocommerce-review__author',
        '.woocommerce p.stars a:before',
        '#site-header-cart .quantity',
        'table.shop_table .woocs_special_price_code, table.shop_table td.product-subtotal',
        '.cl-text a:hover',
        '.portfolio-style-only_media .price, .cl_table_row.style-big .price span',
        'article.grid-style .categories_list'

    );
    // Background Color
    $data['primary_color']['background_color'] = array(
        '.header_container.menu_style-border_effect #navigation nav > ul > li > a:hover:after', 
        '.header_container.menu_style-border_effect #navigation nav > ul > li.current-menu-item > a:after', 
        'article.format-gallery .swiper-pagination-bullet-active',
        '.cl-pagination-jump > div a:hover',
        '.shop-products .product_item .onsale, .cl-product-info .onsale',
        '.widget_product_categories ul li.current-cat > a:before',
        
        '.search__inner--down',
        '.cl_blog .news-entries article:hover .post-categories li',
        '.header_container.menu_style-border_effect_two #navigation nav > ul > li > a:hover:after, .header_container.menu_style-border_effect_two #navigation nav > ul > li.current-menu-item > a:after',
        '.cl_tabs.style-large .cl-nav-tabs li a',
        'aside .widget_nav_menu ul li.current-menu-item',
        '.w3eden .label-default',
        '.tablepress .sorting:hover, .tablepress .sorting_asc, .tablepress .sorting_desc',
        '.cl_column.with_shadow > .cl_col_wrapper > .col-content .cl_pricelist .header',
     
        '.shop-products .product_item .cl-learnmore',
        '.tool .tool-link .cart-total',
        '.cl-header-side .header_container .extra_tools_wrapper .tool:hover a span.cart-total',
        'article .entry-media-wrapper .entry-tag-list a:hover',
        '.cl-pagination span.current',
        'aside .widget-title:after',
        'aside .widget_calendar td#today a',
        '.blog-entries .fullimage_transparent-style h2:after',
        '.cl_blog .blog-filters .title h2:after',
        '.cl-default-page-header h2:after',
        '.cl_mailchimp.style_large_button input[type="submit"]',
        'aside .widget_custom_html .boxed-style .mc4wp-form-fields input[type="submit"]',
        '.all-centered article h2:after',
        '.cl_blog .news-entries h2:after',

        'article .entry-tools .entry-tool-share .share-buttons a:hover',
        '.otw-submit-btn',
        '.wc-proceed-to-checkout .checkout-button.continue-shopping',
        '.social_widget .social-icons-widget.boxed li:hover',
        '.mc4wp-form p input[type="submit"]'
    );


    $data['primary_color']['border-color'] = array(
        '.tablepress thead',
        '.wpcf7-radio_custom [type="radio"]:checked:before',
        '.cl-info-checkout a',
        '.payment_method_paypal a',
        '.cl_woocommerce a.show-all',
        '.cl-carousel:not(.flex-control-thumbs) .owl-nav [class*=owl-]:hover:after',
        'article .entry-tools .entry-tool-share .share-buttons a:hover'
    );


    $data['secondary_color']['background_color'] = array(
        '.cl_toggles.style-square_plus .cl_toggle .title > a:before',
        '.cl_pricelist .header.panel',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-dark button.selected',
        '.wpcf7-radio_custom [type="radio"]::before',
        
    );

    $data['secondary_color']['color'] = array(
        '.light-text #testimonial-entries .testimonial_item .title'
    );

    $data['secondary_color']['border-color'] = array(
        'aside .widget_nav_menu ul li.current-menu-item',
    );
    
    
    // Border Accent Color
    $data['border_accent_color']['border-color'] = array(
        'article.sticky',
        'aside .widget_categories select',
        'aside .widget_archive select',
        'aside .widget_search input[type="search"]',
        'input:focus,textarea:focus,select:focus, button:focus:not(.selected)',
        '.grid-entries article .grid-holder .grid-holder-inner',
        '.masonry-entries article .grid-holder .grid-holder-inner',
        '.portfolio-style-classic .portfolio_item .entry-wrapper-content',
        '.portfolio-style-classic_excerpt .portfolio_item .entry-wrapper-content',
        '.cl_contact_form7.style-simple input:not(.cl-btn), .cl_contact_form7.style-simple  textarea , .cl_contact_form7.style-simple  select',
        '.cl_toggles.style-simple .cl_toggle > .title',
        '.single-post .entry-single-tags a',
        '.single-post .post-navigation',
        'article.comment',
        '#respond.comment-respond textarea',
        '#respond.comment-respond .comment-form-author input, #respond.comment-respond .comment-form-email input, #respond.comment-respond .comment-form-url input',
        'aside .widget_product_search input,[type="search"]',
        '.cl-product-info .product_meta',
        '.post-password-form input[type="password"]',
        '.tablepress tbody td, .tablepress tfoot th',
        '.search-element input[type="search"]',
        '.search-element .select2-container:not(.select2-container--open), .sort-options .select2-container:not(.select2-container--open), .variations_select:not(.select2-container--open)',
        '.select2-dropdown',
        'article .entry-tools .entry-tool-share .share-buttons',
        'aside .widget_calendar thead th',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-meta-tools .entry-tools',
        '.single_blog_style-classic.cl-layout-fullwidth',
        '.single-product .summary h1',
        '.single-product .summary .cl-info.instock',
        '.tawcvs-swatches .swatch-label',
        '.woocommerce-product-details__short-description', 
        '.woocommerce .quantity .qty, .woocommerce .quantity:before, .woocommerce .quantity:after',
        '.single-product .cl-wishlist-share-wrapper .share',
        '.woocommerce div.product .woocommerce-tabs ul.tabs',
        '.single-product .cl-complete-look h6',
        '.cl-review-info .average',
        '.cl-review-info .leave-review',
        '.single-product .related.products .owl-nav > div',
        '.woocommerce table.shop_attributes th, .woocommerce table.shop_attributes td, .woocommerce table.shop_attributes th, .woocommerce table.shop_attributes',
        '.woocommerce table.shop_table td',
        'table.shop_table .cart_item .product-data .meta',
        '.cart-collaterals',
        '.cart-collaterals .order-total td,.cart-collaterals .order-total th',
        '.shipping-calculator-form .select2-container, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .shipping-calculator-form button[type="submit"], .woocommerce .form-row .select2-container',
        '.woocommerce-checkout-review-order-table tfoot th',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot tr:last-child th, .woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot tr:last-child td',
        '#customer_login.u-columns .login_div .or',
        '.woocommerce-MyAccount-navigation ul',
        '.woocommerce input',
        '#site-header-cart ul li',
        '#site-header-cart',
        '#site-login-box',
        'footer .cl-btn',
        '#top_footer.add-topfooter-border-top',
        '.cl_table_row',
        '.single_blog_style-classic, .single_blog_style-classic article.single-article .entry-meta-tools .entry-tools',
        '.advanced-list-entries .product_item .inner-wrapper .advanced-list, .advanced-list-entries .product_item .inner-wrapper, .list-entries .product_item .inner-wrapper',
        '.single-post .single-author',
        '.all-centered article .entry-meta',
        '.portfolio-navigation.simple',
        '#content > .fixed-up-sells .up-sells h5',
        '.single-post .tagged-in', 
        '.single-post .cl-comments',
        '.single-menu-tab',
        '.dark-text .otw-date-li input, .dark-text .otw-time-wrap select, .dark-text .otw-party-size-wrap select',
        '.woocommerce #reviews #comments ol.commentlist li',
        '.single-product .related.products h4',
        '.woocommerce-cart .cart-collaterals .cart_totals tr',
        '.cross-sells h2',
        '.cl-filters.cl-filter-align-center .inner'

    );

    $data['border_accent_color']['background-color'] = array(
        '.header_container.cl-header-dark .extra_tools_wrapper .tool:after',
        '#copyright .add-copyright-inner-border-top:before',
        '.parallel-divider.wrapper-heading .divider',
        '.cl-portfolio-filter.cl-filter-small.cl-filter-color-light button:after',
        'aside.style-sidebar-blog .widget-title:after',
        'article .entry-tools .entry-tool-share .share-buttons:after'
    );
    
    // Labels accent color
    $data['labels_accent_color'] = array(
        'article.format-quote .entry-content i',
        'article.format-quote .entry-content .quote-entry-author',
        'aside .widget_categories ul li',
        'aside .widget_archive ul li',
        'aside .widget_recent_entries .post-date',
        'aside .widget_rss .rss-date',
        '.cl_contact_form7.style-simple label',
        '#respond.comment-respond p > label',
        'article.comment .comment-reply-link, article.comment .comment-edit-link',
        '.woocommerce-result-count',
        '.widget_product_categories ul li .count',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.widget_twitter li .content .date',
        '.search-element input[type="search"]',
        '.mc4wp-form p input[type="email"]',
        '.cl-header-side .header_container:not(.cl-responsive-header) .extra_tools_wrapper .tool a i',
        '.cl-header-side .header_container.header-left nav > ul > li > a:after',
        '.entry-meta-single:after',
        '.shop-products .product_item .tags',
        '.woocommerce ul.products li.product .price del .amount',
        '.single-product .summary.entry-summary .price del',
        '.single-product .cl-style-default .cl-info',
        'select',
        'aside .widget.woocommerce .widget-title',
        '.cl-shop-filter button',
        '.portfolio-navigation.simple a.main_portfolio'

    );
    
    
    // Highligh color light
    $data['highlight_light_color']['background-color'] = array(
        '.cl-pagination-jump > div > a',
        '.cl_progress_bar .progress',
        '.single-post .entry-single-tools .single-share-buttons a',
        '.btn-priority_secondary',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-light',
        '.cl_team.style-simple .team-item .team-content',
        '.quick-searches .tags a,  .widget .tagcloud a',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-tag-list a',
        '.select2-container--default .select2-results__option--highlighted[aria-selected], .variations_select .select2-results__option--highlighted[aria-selected]',
        '.select2-container--default .select2-results__option[aria-selected=true], .variations_select .select2-results__option[aria-selected=true]',
        '.grid-options a.active',
        '.single_blog_style-classic article.single-article .entry-tag-list a',
        '.blog-entries.grid-minimal-style article .entry-tag-list a:not(:hover), .single-modern-header .entry-tag-list a',
        '.woocommerce table.shop_table thead th',
        '.shop_table_responsive.cart .actions',
        '#site-header-cart',
        '.your-order',
        '.woocommerce-order .cl-thankyou-data'

    );
    
    // Highlight color dark
    $data['highlight_dark_color']['background-color'] = array(
        '#cl_load_more_btn',
        '.cl-pagination-jump > div > a:hover',
        '.cl-mobile-menu-button span, .cl-hamburger-menu span',
        '.single-post .entry-single-tags a:hover',
        '.single-post .entry-single-tools .single-share-buttons a:hover',
        '.return-to-shop a',
        '.light-text .cl_widget_sidebar .widget_search input[type="search"]'
        
        
    );

    $data['highlight_dark_color']['color'] = array(
        '.btn-priority_secondary',
        '.extra_tools_wrapper .tool.shop .cart-details .cart-total-sum',
        '.extra_tools_wrapper .tool.wishlist span',
        '.search-element .search-input i',
        '.search-element .select2-container, .sort-options .select2-container, .variations_select',
        '.search-element .select2-container .select2-selection--single, .sort-options .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__rendered, .variations_select .select2-selection--single',
        '.quick-searches .tags a:hover,  .widget .tagcloud a:hover',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-tag-list a:hover',
        '.select2-results__option',
        '.select2-container--default .select2-results__option[aria-selected=true]',
        '.header_container.cl-header-light .extra_tools_wrapper.style-small .tool:hover i',
        '.extra_tools_wrapper .show-side-header',
        '.blog-entries .default-style .entry-tool-single span',
        'article .entry-media-wrapper .entry-tag-list a',
        '.cl-pagination a',
        '.cl-carousel .owl-nav .owl-prev:after, .cl-carousel .owl-nav .owl-next:after',
        'article.format-gallery .cl-post-swiper-slider .swiper-button-prev:after, article.format-gallery .cl-post-swiper-slider .swiper-button-next:after',
        '.grid-options label',
        '.grid-options a.active',
        '.single_blog_style-classic article.single-article blockquote',
        '.single-post .single-author .author_wrapper .author_content .author_links a',
        '.single-blog-extra-heading',
        '.single-product .summary.entry-summary .price ins .amount',
        '.single-product .product .summary form.cart .variations label, .product .qty_container label',
        '.single-product .cl-wishlist-share-wrapper',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.cl-review-info .average span.star',
        '.woocommerce #reviews #comments .cl-user-info .woocommerce-review__author',
        'table.shop_table .cart_item .product-data > a',
        'table.shop_table .cart_item .product-data .meta dd',
        'table.shop_table .cart_item .product-data > .wishlist',
        'table.shop_table .product-price ins .amount',
        '.woocommerce-checkout-review-order-table td.product-total span, .woocommerce-checkout-review-order-table tfoot td span',
        '.cart-collaterals #shipping_method li input[type=radio]:checked ~ label',
        '.shipping-calculator-form button[type="submit"]',
        '.cl-info-checkout',
        '.woocommerce .order_details li strong',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table th',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table td.woocommerce-table__product-total',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot td',
        '.woocommerce .track_order .form-row label',
        '#customer_login.u-columns .col-2 form label',
        '.woocommerce-MyAccount-navigation ul li a',
        '.woocommerce-MyAccount-content label',
        'aside .widget.woocommerce .product-categories li',
        'aside .widget.woocommerce .product-categories li a:after',
        '.cl-closed-section .close_section_button .anchor',
        '.open-filters',
        'aside.style-sidebar-blog .widget-title, aside .social_widget .social-icons-widget li a i',
        '.single-modern-header .entry-tag-list a',
        '#portfolio-entries .portfolio_item .entry-overlay .categories a',
        '.portfolio-navigation.simple',
        '.cl-sidenav ul li a',
        'input:not(.search-field):not(.cl-btn):not(.otw-reservation-date):not([type="submit"]):not(.medium-editor-toolbar-input):not(.qty):not(.search__input), textarea',
        '.dark-text .otw-time-wrap select, .dark-text .otw-party-size-wrap select',
        '.cl-product-info .product_meta span.title',
        '.cart-collaterals h2',
        '.cart-collaterals .order-total td span'
    );

    $data['other_area_links']['color'] = array(
        'article.format-quote .entry-content .quote-entry-content p, article.format-quote .entry-content .quote-entry-content a',
        '.cl-pagination a',
        '.cl-pagination span.current',
        '.cl-pagination-jump a',
        '.cl_progress_bar .labels'
    );
    
    
    //Logo Font
    $data['logo_font'] = array(
        '.cl-h-cl_header_logo .logo_font'    
    );
    
    // Headings Typography
    $data['headings_typo'] = array(
        'h1,h2,h3,h4,h5,h6',
        '#testimonial-entries .testimonial_item .title',
        'article.default-style.format-quote .entry-content',
        'aside .widget_calendar caption',
        '.cl_page_header .title_part .subtitle',
        '.woocommerce-result-count',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.woocommerce ul.products li.product .button',
        '.extra_tools_wrapper .show-side-header',
        'nav .codeless_custom_menu_mega_menu h6, .cl-mobile-menu nav > ul > li > a',
        '.blog-entries .fullimage_transparent-style h2',
        '.grid-options label',
        '.widget_service a',
        '.cl-price-rating .price, .woocommerce ul.products li.product .price del',
        '.single-product .summary.entry-summary .price',
        '.woocommerce .quantity .qty',
        '.cl-review-info .average span.star',
        '.woocommerce #reviews #comments .cl-user-info .woocommerce-review__author',
        'table.shop_table .product-price .price, table.shop_table .woocs_special_price_code, .woocs_price_code > .woocommerce-Price-amount, .price > .woocommerce-Price-amount, .product-price > .woocommerce-Price-amount',
        '.woocommerce-checkout-review-order-table tfoot td span',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table th, .woocommerce-order .cl-thankyou-data .woocommerce-order-details table td.woocommerce-table__product-total',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot th',
        '.woocommerce-order .woocommerce-thankyou-order-received',
        '.woocommerce table.wishlist_table .product-add-to-cart a',
        '.woocommerce .track_order .form-row input[type="submit"]',
        '#customer_login.u-columns .login_div .or',
        '.woocommerce-MyAccount-navigation ul li a',
        '.woocommerce-MyAccount-content input[type="submit"]',
        'aside .widget.woocommerce .product-categories li',
        '#site-header-cart .woocommerce-mini-cart__total',
        '.cl_shop_tabbed .tabbed-tabs li a', 
        '.cl-shop-filter button',
        '.cl-closed-section .close_section_button .anchor',
        '.open-filters',
        '.portfolio-navigation.simple span',
        '.cl-sidenav ul li a',
        '#customer_login.u-columns form input[type="submit"]',
        'article.default-style .categories_list',
        '.cl-filters button',
        '.single-post .tagged-in',
        '.cl-product-info .product_meta',
        '.woocommerce #reviews #comments .woocommerce-review__author',
        '#site-header-cart ul li a span.data .title, #site-header-cart .quantity',
        'table.shop_table .product-data > a',
        'table.shop_table .woocs_special_price_code, table.shop_table td.product-subtotal',
        '.cl_blog .news-entries .categories, .blog-entries .fullimage_transparent-style .categories, article.grid-style .categories_list'
    );

    $data['shop_custom_typography'] = array(
        '.shop-products .product_item h3'
    );
    
    // Body Typography
    $data['body_typo'] = array(
        'html',
        'body',
        '.light-text .breadcrumbss .page_parents',
        'aside .widget_categories ul li a, aside .widget_archive ul li a, aside .widget_pages ul li a',
        '#ship-to-different-address span',
        '.summary .group_table tr td.label .price *',
        '.cart-collaterals h2'
    ); 
    
    // Heading Menu Typography
    $data['menu_font'] = array(
        '.header_container nav ul li a'  
    );
    
    // Widgets Typography
    $data['widgets_title_typography'] = array(
        'aside .widget-title',
    );

    $data['main_footer_title_typography'] = array(
        'footer#colophon .widget:not(.social_widget) .widget-title',
        '#footer-wrapper .quick-searches span',
        '.mc4wp-form p input[type="submit"]'
    );

    $data['top_footer_title_typography'] = array(
        '#top_footer .widget-title'
    );

    $data['copyright_title_typography'] = array(
        '#copyright'
    );
    
    // Blog Entry Typography
    $data['blog_entry_title'] = array(
        '.hentry:not(.fullimage_transparent-style):not(.news-style) h2.entry-title',
        '.entry-single-related .fullimage_transparent-style .entry-title',
    );

    $data['blog_meta_style'] = array(
        'article.hentry .entry-meta'
    );
    
    // Single Blog Typography
    $data['single_blog_title'] = array(
        'article.post h1.entry-title'
    );
    
    
    // Header Menu Border Style
    $data['header_menu_border_style'] = array(
        '.header_container.menu_style-border_top.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_bottom.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_left.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_right.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_top.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_bottom.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_left.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_right.menu-text-style nav > ul > li > a'
    );

    // Blog Image Overlay Color
    $data['blog_overlay_color'] = array(

    );
    
    
    // Footer Border Color
    $data['footer_border_color'] = array(
        'footer#colophon .widget',
        'footer#colophon input, footer#colophon select, footer#colophon textarea'
    );

    $data['copyright_border_color'] = array(
        '#copyright .widget',
        '#copyright input, #copyright select, #copyright textarea'
    );

    $data['topfooter_border_color'] = array(
        '#top_footer .widget',
        '#top_footer input, #top_footer select, #top_footer textarea',
        '.mc4wp-form p input[type="email"]',
        '.mc4wp-form p input[type="submit"]',

    );
    
    // Footer Dark BG Color
    $data['footer_dark_bg_color'] = array(
        'footer#colophon input[type="text"], footer#colophon select, footer#colophon textarea, footer#colophon input[type="email"]',
        'footer#colophon .social_widget .social-icons-widget.circle li',
        'footer#colophon table tbody td'
        
    );

    $data['footer_button_bg_color'] = array(
        'footer#colophon input[type="submit"]'
    );



    // Header menu styles
    $data['header_menu_border_color'] = array(
        '.header_container.menu_style-border_top.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_top.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-border_bottom.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_bottom.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-border_left.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_left.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-border_right.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_right.menu-full-style #navigation nav > ul > li.current-menu-item',

        '.header_container.menu_style-border_top.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_top.menu-text-style #navigation nav > ul > li.current-menu-item > a',
         '.header_container.menu_style-border_bottom.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_bottom.menu-text-style #navigation nav > ul > li.current-menu-item > a',
         '.header_container.menu_style-border_left.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_left.menu-text-style #navigation nav > ul > li.current-menu-item > a',
         '.header_container.menu_style-border_right.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_right.menu-text-style #navigation nav > ul > li.current-menu-item > a',
    );

    $data['header_menu_background_color'] = array(
        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover', 
         '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item', 
         '.header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li.current-menu-item > a',
    );

    $data['header_menu_font_color'] = array(
        '.header_container:not(.cl-header-sticky-active) #navigation nav > ul > li:hover',
         '.header_container:not(.cl-header-sticky-active) #navigation nav > ul > li.current-menu-item',
         '.header_container:not(.cl-header-sticky-active) #navigation nav > ul > li > a:hover', 
         '.header_container:not(.cl-header-sticky-active) #navigation nav > ul > li.current-menu-item > a',

        '.header_container:not(.cl-header-sticky-active) #navigation nav > ul > li:hover > a',
        '.header_container:not(.cl-header-sticky-active) #navigation nav > ul > li.current-menu-item > a',
    );


    $data['header_top_typography'] = array(
        '.header_container .top_nav.header-row'
    );

    $data['dropdown_hassubmenu_item'] = array(
        'nav .codeless_custom_menu_mega_menu h6, .cl-mobile-menu nav > ul > li > a'
    );

    $data['dropdown_item_typography'] = array(
        'nav .menu li ul.sub-menu li a, .cl-submenu a, .cl-submenu .empty'
    );
    
    $data['counter_typography'] = array(
        '.cl_counter'
    );

    $data['highlight_light_color_hover']['background-color'] = array(
        '.quick-searches .tags a:hover, .widget .tagcloud a:hover',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-tag-list a:hover'
    );

    
    $data = apply_filters( 'codeless_dynamic_css_register_tags', $data );
    
    if( ! $option ){
        return $data;
    }
        
    
    if( ! $suboption && isset( $data[ $option ] ) && isset( $data[ $option ][0] ) && ! is_array( $data[ $option ][0] ) )
        return ( ! empty( $data[ $option ] ) ? implode( ", ", $data[ $option ] ) : ' ' );
    
    if( isset( $data[ $option ][ $suboption ] ) )
        return ( ! empty( $data[ $option ][ $suboption ] ) ? implode( ", ", $data[ $option ][ $suboption ] ) : ' ' );
}


// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );
 
function vc_before_init_actions() {
     
    // Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){ 
     
        vc_set_shortcodes_templates_dir( get_template_directory() . '/includes/codeless_builder/shortcodes' );
         
    }
     
}


if(function_exists('vc_set_as_theme')) 
  vc_set_as_theme();

if ( class_exists('WPBakeryVisualComposerAbstract') && class_exists( 'Cl_Builder_Manager' ) ) {
    
    remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect' );
    remove_action( 'admin_init', 'vc_page_welcome_redirect' );

    function codeless_active_vc(){
        require_once locate_template('includes/codeless_functions_backend_editor.php');
    }

    add_action('init','codeless_active_vc', 999 );
}



add_filter( 'kirki/fonts/standard_fonts', 'codeless_add_a_custom_font' );
function codeless_add_a_custom_font( $standard_fonts ){
  
  $standard_fonts[ 'nevis' ] = array(
    'label' => 'Nevis',
    'stack' => "'Nevis'"
  );
  return $standard_fonts;
}
function codeless_enqueue_custom_font_css() {
  // In this file will be included the new font
  wp_enqueue_style( 'codeless-nevis-font-css', get_template_directory_uri() . '/css/fonts/nevis.css' );
}
add_action( 'wp_enqueue_scripts', 'codeless_enqueue_custom_font_css');




function codeless_creative_search(){
    ?>
    <svg class="hidden">
            <defs>
                <symbol id="icon-cross" viewBox="0 0 24 24">
                    
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </symbol>
            </defs>
    </svg>
    <div class="creative-search">
            <button id="btn-search-close" class="btn btn--search-close" aria-label="<?php esc_attr_e('Close search form', 'picante') ?>"><svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg></button>
            <div class="search__inner search__inner--up">
                <form class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input class="search__input" name="s" type="search" placeholder="<?php echo esc_attr__('Search', 'picante' ) ?>" autocomplete="off" spellcheck="false" />
                    <span class="search__info"><?php esc_html_e( 'Hit enter to search or ESC to close', 'picante' ) ?></span>
                </form>
            </div>
            
    </div><!-- /search -->
    <?php
}

set_time_limit(0);
add_filter( 'kirki_telemetry', '__return_false' );

add_filter( 'codeless_builder_custom_bootstrap_css', '__return_true' );
add_filter( 'codeless_builder_custom_frontend_css', '__return_true' );
add_filter( 'codeless_builder_custom_front_js', '__return_true' );

?>