<?php
/*vc_remove_element("vc_row_inner");
vc_remove_element("vc_column_inner");*/
vc_remove_element("vc_row");
vc_remove_element("vc_column");
//vc_remove_element("contact-form-7");
vc_remove_element("rev_slider_vc");
vc_remove_element("layerslider_vc");
vc_remove_element("vc_column_text");

// Create multi dropdown param type

if( function_exists( 'vc_add_short_param' ) ){
	vc_add_short_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
	function dropdown_multi_settings_field( $param, $value ) {
	   $param_line = '';

	   $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
	   foreach ( $param['value'] as $text_val => $val ) {
	       if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
	                    $text_val = $val;
	                }
	              
	                $selected = '';

	                if(!is_array($value)) {
	                    $param_value_arr = explode(',',$value);
	                } else {
	                    $param_value_arr = $value;
	                }

	                if ($value!=='' && in_array($val, $param_value_arr)) {
	                    $selected = ' selected="selected"';
	                }
	                $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
	            }
	   $param_line .= '</select>';

	   return  $param_line;
	}
}


vc_map( array (
	'base' => 'cl_row',
  	'name' => __( 'Row', 'picante' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'picante' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Place content elements inside the row', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_row' ),
	'js_view' => 'VcRowView'
));


vc_map( array (
	'base' => 'cl_column',
	'name' => __( 'Column', 'picante' ),
	'icon' => 'icon-wpb-row',
	'is_container' => true,
	'content_element' => false,
	'description' => __( 'Place content elements inside the column', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_column', array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'picante' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'picante' ) => '1/12',
				__( '2 columns - 1/6', 'picante' ) => '1/6',
				__( '3 columns - 1/4', 'picante' ) => '1/4',
				__( '4 columns - 1/3', 'picante' ) => '1/3',
				__( '5 columns - 5/12', 'picante' ) => '5/12',
				__( '6 columns - 1/2', 'picante' ) => '1/2',
				__( '7 columns - 7/12', 'picante' ) => '7/12',
				__( '8 columns - 2/3', 'picante' ) => '2/3',
				__( '9 columns - 3/4', 'picante' ) => '3/4',
				__( '10 columns - 5/6', 'picante' ) => '5/6',
				__( '11 columns - 11/12', 'picante' ) => '11/12',
				__( '12 columns - 1/1', 'picante' ) => '1/1',
			),
			'group' => __( 'General', 'picante' ),
			'description' => __( 'Select column width.', 'picante' ),
			'std' => '1/1',
		) ),
	'js_view' => 'VcColumnView',
));


vc_map( array(
	'base' => 'cl_row_inner',
	'name' => __( 'Inner Row', 'picante' ),
	//Inner Row
	'content_element' => false,
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'weight' => 1000,
	'show_settings_on_create' => false,
	'description' => __( 'Place content elements inside the inner row', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_row_inner' ),
	'js_view' => 'VcRowView',
));


vc_map( array(
	'base' => 'cl_column_inner',
	'name' => __( 'Inner Column', 'picante' ),
	'icon' => 'icon-wpb-row',
	'class' => '',
	'wrapper_class' => '',
	'controls' => 'full',
	'allowed_container_element' => false,
	'content_element' => false,
	'is_container' => true,
	'description' => __( 'Place content elements inside the inner column', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_column_inner', array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'picante' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'picante' ) => '1/12',
				__( '2 columns - 1/6', 'picante' ) => '1/6',
				__( '3 columns - 1/4', 'picante' ) => '1/4',
				__( '4 columns - 1/3', 'picante' ) => '1/3',
				__( '5 columns - 5/12', 'picante' ) => '5/12',
				__( '6 columns - 1/2', 'picante' ) => '1/2',
				__( '7 columns - 7/12', 'picante' ) => '7/12',
				__( '8 columns - 2/3', 'picante' ) => '2/3',
				__( '9 columns - 3/4', 'picante' ) => '3/4',
				__( '10 columns - 5/6', 'picante' ) => '5/6',
				__( '11 columns - 11/12', 'picante' ) => '11/12',
				__( '12 columns - 1/1', 'picante' ) => '1/1',
			),
			'group' => __( 'General', 'picante' ),
			'description' => __( 'Select column width.', 'picante' ),
			'std' => '1/1',
		) ),
));

vc_map( array (
	'base' => 'cl_page_header',
  	'name' => __( 'Page Header', 'picante' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'as_child' => array(
		'only' => '', // Only root
	),
	
	'category' => __( 'Content', 'picante' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Can be edited only on Customizer', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_page_header' ),
));

class WPBakeryShortCode_CL_Page_Header extends WPBakeryShortCode_CL{ 
	public function getBackendEditorControlsElementCssClass() {
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();

		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) && $moveAccess ? ' vc_element-move vc_column-move' : ' ' . $this->nonDraggableClass );

		return 'vc_control-btn vc_element-name' . $sortable;
	}
 }

vc_map( array(
	'base' => 'cl_text',
	'name' => __( 'Text', 'picante' ),
	'icon' => 'icon-wpb-layer-shape-text',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'A block of text with WYSIWYG editor', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_text' ),
));

class WPBakeryShortCode_CL_Text extends WPBakeryShortCode_CL { }

vc_map( array(
	'base' => 'cl_custom_heading',
	'name' => __( 'Custom Heading', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/title_heading.png',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'picante' ),
	'show_settings_on_create' => true,
	'description' => __( 'Text with Google fonts', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_custom_heading' ),
));

class WPBakeryShortCode_CL_Custom_Heading extends WPBakeryShortCode_CL { }

vc_map( array(
	'base' => 'cl_service',
	'name' => __( 'Service', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/services_circle.png',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'picante' ),
	'show_settings_on_create' => true,
	'description' => __( 'Build a service Element', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_service' ),
));

class WPBakeryShortCode_CL_Service extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_slider',
  	'name' => __( 'Codeless Slider', 'picante' ),
	'is_container' => true,
	'icon' => get_template_directory_uri().'/img/icons/slideshow.png',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'picante' ),
	'js_view' => 'VcColumnView',
	'as_parent' => array(
		'only' => 'cl_slide',
	),
	'as_child' => array(
		'only' => '', // Only root
	),
	'class' => 'vc_main-sortable-element',
	'params' => codeless_generate_backend_params( 'cl_slider' ),
));

vc_map( array (
	'base' => 'cl_slide',
  	'name' => __( 'Slide', 'picante' ),
	'is_container' => true,
	'icon' => 'icon-wpb-single-image',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'picante' ),
	

	'as_child' => array(
		'only' => 'cl_slider',
	),

	'class' => 'vc_main-sortable-element',
	'params' => codeless_generate_backend_params( 'cl_slide' ),
));


class WPBakeryShortCode_CL_Slider extends WPBakeryShortCodesContainer_CL { }
class WPBakeryShortCode_CL_Slide extends WPBakeryShortCodesContainer_CL { }

vc_map( array (
	'base' => 'cl_media',
  	'name' => __( 'Media', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/media.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Simple image with CSS animation', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_media' ),
));

class WPBakeryShortCode_CL_Media extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_button',
  	'name' => __( 'Button', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/button.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Add a button', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_button' ),
));

class WPBakeryShortCode_CL_Button extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_divider',
  	'name' => __( 'Divider', 'picante' ),
	 'icon' => get_template_directory_uri().'/img/icons/separator.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Add a divider element between elements', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_divider' ),
));

class WPBakeryShortCode_CL_Divider extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_gallery',
  	'name' => __( 'Gallery', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/slideshow.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Add a gallery of images', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_gallery' ),
));

class WPBakeryShortCode_CL_Gallery extends WPBakeryShortCode_CL { }

vc_map( array (
	'base' => 'cl_clients',
  	'name' => __( 'Clients', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/clients.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Add clients carousel', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_clients' ),
));

class WPBakeryShortCode_CL_Clients extends WPBakeryShortCode_CL { }

vc_map( array (
	'base' => 'cl_empty_space',
  	'name' => __( 'Empty Space', 'picante' ),
	'icon' => 'icon-wpb-ui-empty_space',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Empty Space between elements', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_empty_space' ),
));

class WPBakeryShortCode_CL_Empty_Space extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_counter',
  	'name' => __( 'Counter', 'picante' ),
	'show_settings_on_create' => true,
	'icon' => get_template_directory_uri().'/img/icons/counter.png',
	'category' => __( 'Content', 'picante' ),
	'description' => __( 'Counter element', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_counter' ),
));

class WPBakeryShortCode_CL_Counter extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_countdown',
  	'name' => __( 'Countdown', 'picante' ),
	'show_settings_on_create' => true,
	'icon' => get_template_directory_uri().'/img/icons/countdown.png',
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_countdown' ),
));

class WPBakeryShortCode_CL_Countdown extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_progress_bar',
  	'name' => __( 'Progress Bar', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/skills.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_progress_bar' ),
));

class WPBakeryShortCode_CL_Progress_Bar extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_map',
  	'name' => __( 'Google Map', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/maps.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	
	'params' => codeless_generate_backend_params( 'cl_map' ),
));

class WPBakeryShortCode_CL_Map extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_icon',
  	'name' => __( 'Icon', 'picante' ),
	'icon' => 'icon-wpb-vc_icon',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_icon' ),
));

class WPBakeryShortCode_CL_Icon extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_socialicon',
  	'name' => __( 'Social Icons', 'picante' ),
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_socialicon' ),
));

class WPBakeryShortCode_CL_Socialicon extends WPBakeryShortCode_CL { }










if( function_exists( 'mc4wp_show_form' ) ){

	vc_map( array (
		'base' => 'cl_mailchimp',
	  	'name' => __( 'Mailchimp', 'picante' ),
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'picante' ),
		'params' => codeless_generate_backend_params( 'cl_mailchimp' ),
	));

	class WPBakeryShortCode_CL_Mailchimp extends WPBakeryShortCode_CL { }

}








vc_map( array (
	'base' => 'cl_testimonial',
  	'name' => __( 'Testimonial', 'picante' ),
  	'icon' => get_template_directory_uri().'/img/icons/testimonial.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_testimonial' ),
));

class WPBakeryShortCode_CL_Testimonial extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_blog',
  	'name' => __( 'Blog', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/latest_blog.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_blog' ),
));

class WPBakeryShortCode_CL_Blog extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_team',
  	'name' => __( 'Team', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/staff_single.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_team' ),
));

class WPBakeryShortCode_CL_Team extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_portfolio',
  	'name' => __( 'Portfolio', 'picante' ),
    'icon' => get_template_directory_uri().'/img/icons/recent_portfolio.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_portfolio' ),
));

class WPBakeryShortCode_CL_Portfolio extends WPBakeryShortCode_CL { }


/*
 * Not for picante
vc_map( array (
	'base' => 'cl_portfolio_nav',
  	'name' => __( 'Portfolio Nav', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/recent_portfolio.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_portfolio_nav' ),
));
class WPBakeryShortCode_CL_Portfolio_Nav extends WPBakeryShortCode_CL { }
*/


vc_map( array (
	'base' => 'cl_toggles',
  	'name' => __( 'Toggles', 'picante' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_toggle',
	),
	'icon' => get_template_directory_uri().'/img/icons/list.png',
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_toggles' ),
	'js_view' => 'VcColumnView',
));

class WPBakeryShortCode_CL_Toggles extends WPBakeryShortCodesContainer_CL { }

vc_map( array (
	'base' => 'cl_toggle',
  	'name' => __( 'Toggle', 'picante' ),
	'is_container' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_toggle' ),
	'as_child' => array(
		'only' => 'cl_toggles',
	),

));

class WPBakeryShortCode_CL_Toggle extends WPBakeryShortCodesContainer_CL { }



vc_map( array (
	'base' => 'cl_tabs',
  	'name' => __( 'Tabs', 'picante' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_tab',
	),
	'icon' => get_template_directory_uri().'/img/icons/tabs.png',
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_tabs' ),
));

class WPBakeryShortCode_CL_Tabs extends WPBakeryShortCodesContainer_CL { }


vc_map( array (
	'base' => 'cl_tab',
  	'name' => __( 'Tab', 'picante' ),
	'is_container' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_tab' ),
	'as_child' => array(
		'only' => 'cl_tabs',
	),
));

class WPBakeryShortCode_CL_Tab extends WPBakeryShortCodesContainer_CL { }



vc_map( array (
	'base' => 'cl_pricelist',
  	'name' => __( 'Price List', 'picante' ),
	 'is_container' => true,
	 'icon' => get_template_directory_uri().'/img/icons/price_list.png',
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_list_item',
	),
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_pricelist' ),
));

class WPBakeryShortCode_CL_Pricelist extends WPBakeryShortCodesContainer_CL { }



vc_map( array (
	'base' => 'cl_list',
  	'name' => __( 'List', 'picante' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => array( 'cl_list_item', 'cl_table_row'),
	),
	'icon' => get_template_directory_uri().'/img/icons/list.png',
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_list' ),
));

class WPBakeryShortCode_CL_List extends WPBakeryShortCodesContainer_CL { }


vc_map( array (
	'base' => 'cl_list_item',
  	'name' => __( 'List Item', 'picante' ),
	'is_container' => false,
	'category' => __( 'List Elements', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/list_item.png',
	'params' => codeless_generate_backend_params( 'cl_list_item' ),
	'as_child' => array(
		'only' => 'cl_list',
	),
));

class WPBakeryShortCode_CL_List_Item extends WPBakeryShortCode_CL { }

vc_map( array (
	'base' => 'cl_table_row',
  	'name' => __( 'Table Row', 'picante' ),
	'is_container' => false,
	'category' => __( 'List Elements', 'picante' ),
	'icon' => get_template_directory_uri().'/img/icons/list_item.png',
	'params' => codeless_generate_backend_params( 'cl_table_row' ),
	'as_child' => array(
		'only' => 'cl_list',
	),
));

class WPBakeryShortCode_CL_Table_Row extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_share',
  	'name' => __( 'Share Buttons', 'picante' ),
	'icon' => 'icon-wpb-balloon-facebook-left',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_share' ),
));

class WPBakeryShortCode_CL_Share extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_contact_form7',
  	'name' => __( 'Contact Form 7', 'picante' ),
	'icon' => 'icon-wpb-contactform7',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_contact_form7' ),
));

class WPBakeryShortCode_CL_Contact_Form7 extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_revslider',
  	'name' => __( 'Revolution Slider', 'picante' ),
  	'icon' => 'icon-wpb-revslider',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_revslider' ),
));

class WPBakeryShortCode_CL_Revslider extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_layerslider',
  	'name' => __( 'Layer Slider', 'picante' ),
  	'icon' => 'icon-wpb-layerslider',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_layerslider' ),
));

class WPBakeryShortCode_CL_Layerslider extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_widget_sidebar',
  	'name' => __( 'Widget Sidebar', 'picante' ),
  	'icon' => 'icon-wpb-wp',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_widget_sidebar' ),
));

class WPBakeryShortCode_CL_Widget_Sidebar extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_custom_code',
  	'name' => __( 'Custom Code', 'picante' ),
  	'icon' => 'icon-wpb-raw-html',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_custom_code' ),
));

class WPBakeryShortCode_CL_Custom_Code extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_filters_bar',
  	'name' => __( 'Filters Bar', 'picante' ),
  	'icon' => 'icon-wpb',
  	
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_filters_bar' ),
));

class WPBakeryShortCode_CL_Filters_Bar extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_video_lightbox',
  	'name' => __( 'Video Lightbox', 'picante' ),
  	'icon' => 'icon-wpb',
  	
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_video_lightbox' ),
));

class WPBakeryShortCode_CL_Video_Lightbox extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_menu_tabbed',
  	'name' => __( 'Menu Tabbed', 'picante' ),
  	'icon' => 'icon-wpb',
  	
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'picante' ),
	'params' => codeless_generate_backend_params( 'cl_menu_tabbed' ),
));

class WPBakeryShortCode_CL_Menu_Tabbed extends WPBakeryShortCode_CL { }


if( class_exists('woocommerce') ){


	vc_map( array (
		'base' => 'cl_woocommerce',
	  	'name' => __( 'Shop', 'picante' ),
	 	'icon' => 'icon-wpb-woocommerce',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'picante' ),
		'params' => codeless_generate_backend_params( 'cl_woocommerce' ),
	));

	class WPBakeryShortCode_CL_Woocommerce extends WPBakeryShortCode_CL { }

}




abstract class WPBakeryShortCode_CL extends WPBakeryShortcode {

	// Modified By Codeless
		protected $css_classes = array();
		protected $css_property = array();
		protected $custom_css = '';

	// Modified By Codeless
		protected function checkRequired($cl_required){
			$bool = true;
		
			if(isset($this->atts[$cl_required['element']]) && $this->atts[$cl_required['element']] != $cl_required['value'][0]) {
				$bool = false;
			}							
							
			return $bool;
		}


		// Modified By Codeless
		public function generateClasses($selector){
			$classes = array();
			
			if(isset($this->css_classes[$selector])){
				
				foreach($this->css_classes[$selector] as $field_id => $field){

					if(isset($this->atts[$field_id]))
						$value = $this->atts[$field_id];
					else
						$value = $field['std'];

						
					if(isset($field['dependency'])){
						if(!$this->checkRequired($field['dependency']))
							continue;
					}
					
					if($field_id == 'animation'){
						if($value != 'none'){
							$classes[] = 'animate_on_visible';
							$classes[] = $value;
						}
						continue;
					}
					
					if($field['type'] == 'multicheck'){
						
						$value =  codeless_js_object_to_array($value);
						
						if(!empty($value)){
							foreach($value as $prop => $val){
								$classes[] = $val;
							}
						}
						continue;
					}

					if( $field[ 'type' ] == 'select' && isset($field['multiple']) && $field['multiple'] ) {
						$value = codeless_js_object_to_array( $value );
						
						if( !empty( $value ) ) {
							foreach( $value as $prop => $val ) {
								$classes[] = $val;
							}
						}
						continue;
					}
					
						
					if(isset($field['selectClass'])){
						$classes[] = $field['selectClass'].$value;
						continue;
					}
					
					if(isset($field['addClass'])){
						
						if((int) $value || !empty($value))
							$classes[] = $field['addClass'];
						continue;
					}
				
				}
			}
			
			return implode(" ", $classes);
		
		}

		//Modified By Codeless
		public function addCustomCss( $css ){

			if( strpos($this->custom_css, $css) === false )
				$this->custom_css .= ' '.$css.' ';
		}


		// Modified By Codeless
		protected function generateStyleArray(){
			$fields = $this->settings['params'];

			if(!empty($fields)){
				foreach($fields as $field){
					if( (isset($field['css_property']) || isset($field['htmldata']) ) && isset($field['selector']) && !empty($field['selector'])){
						if(!isset($this->css_property[$field['selector']]))
							$this->css_property[$field['selector']] = array();
							
						$this->css_property[$field['selector']][ $field['param_name'] ] = $field; 

					}
					
					if( (isset($field['selectClass']) || $field['param_name'] == 'animation' ) && isset($field['selector']) && !empty($field['selector'])){
						if(!isset($this->css_classes[$field['selector']]))
							$this->css_classes[$field['selector']] = array();
							
						$this->css_classes[$field['selector']][ $field['param_name'] ] = $field; 
					}
					
					if(isset($field['addClass']) && isset($field['selector']) && !empty($field['selector'])){
						if(!isset($this->css_classes[$field['selector']]))
							$this->css_classes[$field['selector']] = array();
							
						$this->css_classes[$field['selector']][ $field['param_name'] ] = $field; 
					}
					
				
				}
			}
		}

		// Modified By Codlees
		public function generateStyle($selector, $extra = '', $echo = false){
			$style = '';
			$dataHtml = '';
			
			if(isset($this->css_property[$selector])){
				foreach($this->css_property[$selector] as $field_id => $field){

					if( isset($field['media_query']) )
						continue;

					if(isset($this->atts[$field_id]) && ( !empty($this->atts[$field_id]) || $field['type'] == 'css_editor' ) ){
						$value = $this->atts[$field_id];

						if(isset($field['dependency'])){ 
							if(!$this->checkRequired($field['dependency']))
								continue;
						}

						
						$suffix = (isset($field['suffix']) && !empty($field['suffix']) ) ? $field['suffix'] : '';
						$suffix = ( $suffix == '' && isset($field['choices']) && isset($field['choices']['suffix'])) ? $field['choices']['suffix'] : $suffix;		
						
						
						if(isset($field['htmldata']) && !empty($field['htmldata'])){
							$dataHtml .= 'data-'.$field['htmldata'].'="'.$value.'" ';
							continue;
						}
						
						
						if($field['css_property'] == 'background-image'){
							
							
						
							if( strpos( $value, 'http' ) == 0 ){
								$style .= $field[ 'css_property' ] . ': url(' . urldecode( $value ) . ');';
							}else{
								
								$value = codeless_js_object_to_array( $value );
								
								if( is_array($value) ){
									if( isset($value['id']) ){
										$img = codeless_get_attachment_image_src( (int) $value['id'], 'full' );
	
										$style .= $field['css_property'].': url('.$img.');';
									}
								}
							}

							continue;
						}

						if($field['css_property'] == 'font-family' ){
							if( $value == 'theme_default' )
								continue;
							else{
								$value = trim($value, '&#8221;');
								if( strpos($value, ' ') !== false )
									$value = "'".$value."'";

							}
						} 
						
						
						
						if($field['type'] == 'css_editor'){
							
							
							if( !is_array($value) && !empty( $value ) ){
								$value = codeless_js_object_to_array( $value );
							}
							
				
							
							$default = $field['std'];

							$value = array_merge( $default, $value );
							
							foreach($value as $prop => $val){
									$style .= $prop.': '.urldecode($val).';';
							}
							
							continue;
							
						} 
						
						if( ! is_array( $field['css_property'] ) )
							$style .= $field['css_property'].': '.$value.$suffix.';';
						else{
							$css_property1 = $field['css_property'][0];
							$style .= $css_property1.': '.$value.$suffix.';';
							$exec = false;
							if( isset($field['css_property'][1]) && is_array($field['css_property'][1]) ){
								$addition_property = $field['css_property'][1][0];
								$addition_require = $field['css_property'][1][1];
								if( is_array( $addition_require )  ){
									foreach($addition_require as $a_value => $new_value){
										if( ! $exec ){
											if( $a_value == $value )
												$style .= $addition_property.': '.$new_value.';';
											else{
												if( isset( $addition_require['other'] ) ){
													$style .= $addition_property.': '.$new_value.';';
												}
											}
											$exec = true;
										}
									}
								}
							}else{
								if( isset($field['css_property'][1]) ){
									$css_property2 = $field['css_property'][1];
									$style .= $css_property2.': '.$value.$suffix.';';
								}
								
							}
						}
					}
				}
			}
			
			$style = 'style="'.$style.$extra.'" '.$dataHtml;
			
			if( $echo )
                echo codeless_complex_esc( $style );
            else
                return $style;
		}

}











abstract class WPBakeryShortCodesContainer_CL extends WPBakeryShortCode_CL {
	/**
	 * @var array
	 */
	protected $predefined_atts = array();
	protected $backened_editor_prepend_controls = true;

	/**
	 * @return string
	 */
	public function customAdminBlockParams() {
		return '';
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function mainHtmlBlockParams( $width, $i ) {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );

		return 'data-element_type="' . $this->settings['base'] . '" class="wpb_' . $this->settings['base'] . ' ' . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' ) . ' wpb_content_holder vc_shortcodes_container"' . $this->customAdminBlockParams();
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="' . $this->containerContentClass() . '"';
	}

	/**
	 *
	 * @return string
	 */
	public function containerContentClass() {
		return 'wpb_column_container vc_container_for_children vc_clearfix';
	}

	/**
	 * @param $controls
	 * @param string $extended_css
	 *
	 * @return string
	 */
	public function getColumnControls( $controls = 'full', $extended_css = '' ) {
		$controls_start = '<div class="vc_controls vc_controls-visible controls_column' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
		$controls_end = '</div>';

		if ( 'bottom-controls' === $extended_css ) {
			$control_title = sprintf( __( 'Append to this %s', 'picante' ), strtolower( $this->settings( 'name' ) ) );
		} else {
			$control_title = sprintf( __( 'Prepend to this %s', 'picante' ), strtolower( $this->settings( 'name' ) ) );
		}

		$controls_move = '<a class="vc_control column_move vc_column-move" data-vc-control="move" href="#" title="' . sprintf( __( 'Move this %s', 'picante' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-dragndrop"></i></a>';
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();
		if ( ! $moveAccess ) {
			$controls_move = '';
		}
		$controls_add = '<a class="vc_control column_add" data-vc-control="add" href="#" title="' . $control_title . '"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		$controls_edit = '<a class="vc_control column_edit" data-vc-control="edit" href="#" title="' . sprintf( __( 'Edit this %s', 'picante' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_clone = '<a class="vc_control column_clone" data-vc-control="clone" href="#" title="' . sprintf( __( 'Clone this %s', 'picante' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-content_copy"></i></a>';
		$controls_delete = '<a class="vc_control column_delete" data-vc-control="delete" href="#" title="' . sprintf( __( 'Delete this %s', 'picante' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$controls_full = $controls_move . $controls_add . $controls_edit . $controls_clone . $controls_delete;

		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );

		if ( ! empty( $controls ) ) {
			if ( is_string( $controls ) ) {
				$controls = array( $controls );
			}
			$controls_string = $controls_start;
			foreach ( $controls as $control ) {
				$control_var = 'controls_' . $control;
				if ( ( $editAccess && 'edit' == $control ) || $allAccess ) {
					if ( isset( ${$control_var} ) ) {
						$controls_string .= ${$control_var};
					}
				}
			}

			return $controls_string . $controls_end;
		}

		if ( $allAccess ) {
			return $controls_start . $controls_full . $controls_end;
		} elseif ( $editAccess ) {
			return $controls_start . $controls_edit . $controls_end;
		}

		return $controls_start . $controls_end;
	}

	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function contentAdmin( $atts, $content = null ) {
		$width = '';

		$atts = shortcode_atts( $this->predefined_atts, $atts );
		extract( $atts );
		$this->atts = $atts;
		$output = '';

		$output .= '<div ' . $this->mainHtmlBlockParams( $width, 1 ) . '>';
		if ( $this->backened_editor_prepend_controls ) {
			$output .= $this->getColumnControls( $this->settings( 'controls' ) );
		}
		$output .= '<div class="wpb_element_wrapper">';

		if ( isset( $this->settings['custom_markup'] ) && '' !== $this->settings['custom_markup'] ) {
			$markup = $this->settings['custom_markup'];
			$output .= $this->customMarkup( $markup );
		} else {
			$output .= $this->outputTitle( $this->settings['name'] );
			$output .= '<div ' . $this->containerHtmlBlockParams( $width, 1 ) . '>';
			$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
			$output .= $this->paramsHtmlHolders( $atts );
		}

		$output .= '</div>';
		if ( $this->backened_editor_prepend_controls ) {
			$output .= $this->getColumnControls( 'add', 'bottom-controls' );

		}
		$output .= '</div>';

		return $output;
	}

	/**
	 * @param $title
	 *
	 * @return string
	 */
	protected function outputTitle( $title ) {
		$icon = $this->settings( 'icon' );
		if ( filter_var( $icon, FILTER_VALIDATE_URL ) ) {
			$icon = '';
		}
		$params = array(
			'icon' => $icon,
			'is_container' => $this->settings( 'is_container' ),
			'title' => $title,
		);

		return '<h4 class="wpb_element_title"> ' . $this->getIcon( $params ) . '</h4>';
	}

	public function getBackendEditorChildControlsElementCssClass() {
		return 'vc_element-name';
	}
}






















/**
 * WPBakery WPBakery Page Builder row
 *
 * @package WPBakeryPageBuilder
 *
 */
class WPBakeryShortCode_CL_Row extends WPBakeryShortCode_CL {
	protected $predefined_atts = array(
		'el_class' => '',
	);

	public $nonDraggableClass = 'vc-non-draggable-row';

	/**
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->shortcodeScripts();
	}

	protected function shortcodeScripts() {
		wp_register_script( 'vc_jquery_skrollr_js', vc_asset_url( 'lib/bower/skrollr/dist/skrollr.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_register_script( 'vc_youtube_iframe_api_js', 'https//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
	}

	protected function content( $atts, $content = null ) {
		$prefix = '';

		return $prefix . $this->loadTemplate( $atts, $content );
	}

	/**
	 * This returs block controls
	 */
	public function getLayoutsControl() {
		global $vc_row_layouts;
		$controls_layout = '<span class="vc_row_layouts vc_control">';
		foreach ( $vc_row_layouts as $layout ) {
			$controls_layout .= '<a class="vc_control-set-column set_columns" data-cells="' . $layout['cells'] . '" data-cells-mask="' . $layout['mask'] . '" title="' . $layout['title'] . '"><i class="vc-composer-icon vc-c-icon-' . $layout['icon_class'] . '"></i></a> ';
		}
		$controls_layout .= '<br/><a class="vc_control-set-column set_columns custom_columns" data-cells="custom" data-cells-mask="custom" title="' . __( 'Custom layout', 'picante' ) . '">' . __( 'Custom', 'picante' ) . '</a> ';
		$controls_layout .= '</span>';

		return $controls_layout;
	}

	public function getColumnControls( $controls, $extended_css = '' ) {
		$output = '<div class="vc_controls vc_controls-row controls_row vc_clearfix">';
		$controls_end = '</div>';
		//Create columns
		$controls_layout = $this->getLayoutsControl();

		$controls_move = ' <a class="vc_control column_move vc_column-move" href="#" title="' . __( 'Drag row to reorder', 'picante' ) . '" data-vc-control="move"><i class="vc-composer-icon vc-c-icon-dragndrop"></i></a>';
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();
		if ( ! $moveAccess ) {
			$controls_move = '';
		}
		$controls_add = ' <a class="vc_control column_add vc_column-add" href="#" title="' . __( 'Add column', 'picante' ) . '" data-vc-control="add"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		$controls_delete = '<a class="vc_control column_delete vc_column-delete" href="#" title="' . __( 'Delete this row', 'picante' ) . '" data-vc-control="delete"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$controls_edit = ' <a class="vc_control column_edit vc_column-edit" href="#" title="' . __( 'Edit this row', 'picante' ) . '" data-vc-control="edit"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_clone = ' <a class="vc_control column_clone vc_column-clone" href="#" title="' . __( 'Clone this row', 'picante' ) . '" data-vc-control="clone"><i class="vc-composer-icon vc-c-icon-content_copy"></i></a>';
		$controls_toggle = ' <a class="vc_control column_toggle vc_column-toggle" href="#" title="' . __( 'Toggle row', 'picante' ) . '" data-vc-control="toggle"><i class="vc-composer-icon vc-c-icon-arrow_drop_down"></i></a>';
		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );

		if ( is_array( $controls ) && ! empty( $controls ) ) {
			foreach ( $controls as $control ) {
				$control_var = 'controls_' . $control;
				if ( ( $editAccess && 'edit' == $control ) || $allAccess ) {
					if ( isset( ${$control_var} ) ) {
						$output .= ${$control_var};
					}
				}
			}
			$output .= $controls_end;
		} elseif ( is_string( $controls ) ) {
			$control_var = 'controls_' . $controls;
			if ( ( $editAccess && 'edit' === $controls ) || $allAccess ) {
				if ( isset( ${$control_var} ) ) {
					$output .= ${$control_var} . $controls_end;
				}
			}
		} else {
			$row_edit_clone_delete = '<span class="vc_row_edit_clone_delete">';
			if ( $allAccess ) {
				$row_edit_clone_delete .= $controls_delete . $controls_clone . $controls_edit;
			} elseif ( $editAccess ) {
				$row_edit_clone_delete .= $controls_edit;
			}
			$row_edit_clone_delete .= $controls_toggle;
			$row_edit_clone_delete .= '</span>';

			if ( $allAccess ) {
				$output .= $controls_move . $controls_layout . $controls_add . $row_edit_clone_delete . $controls_end;
			} elseif ( $editAccess ) {
				$output .= $row_edit_clone_delete . $controls_end;
			} else {
				$output .= $row_edit_clone_delete . $controls_end;
			}
		}

		return $output;
	}

	public function contentAdmin( $atts, $content = null ) {
		$atts = shortcode_atts( $this->predefined_atts, $atts );

		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );

		$output .= '<div data-element_type="' . $this->settings['base'] . '" class="' . $this->cssAdminClass() . '">';
		$output .= str_replace( '%column_size%', 1, $column_controls );
		$output .= '<div class="wpb_element_wrapper">';
		$output .= '<div class="vc_row vc_row-fluid wpb_row_container vc_container_for_children">';
		if ( '' === $content && ! empty( $this->settings['default_content_in_template'] ) ) {
			$output .= do_shortcode( shortcode_unautop( $this->settings['default_content_in_template'] ) );
		} else {
			$output .= do_shortcode( shortcode_unautop( $content ) );

		}
		$output .= '</div>';
		if ( isset( $this->settings['params'] ) ) {
			$inner = '';
			foreach ( $this->settings['params'] as $param ) {
				if ( ! isset( $param['param_name'] ) ) {
					continue;
				}
				$param_value = isset( $atts[ $param['param_name'] ] ) ? $atts[ $param['param_name'] ] : '';
				if ( is_array( $param_value ) ) {
					// Get first element from the array
					reset( $param_value );
					$first_key = key( $param_value );
					$param_value = $param_value[ $first_key ];
				}
				$inner .= $this->singleParamHtmlHolder( $param, $param_value );
			}
			$output .= $inner;
		}
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	public function cssAdminClass() {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? ' wpb_sortable' : ' ' . $this->nonDraggableClass );

		return 'wpb_' . $this->settings['base'] . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' );
	}

	/**
	 * @deprecated - due to it is not used anywhere? 4.5
	 * @typo Bock - Block
	 * @return string
	 */
	public function customAdminBockParams() {
		// _deprecated_function( 'WPBakeryShortCode_VC_Row::customAdminBockParams', '4.5 (will be removed in 4.10)' );

		return '';
	}

	/**
	 * @deprecated 4.5
	 *
	 * @param string $bg_image
	 * @param string $bg_color
	 * @param string $bg_image_repeat
	 * @param string $font_color
	 * @param string $padding
	 * @param string $margin_bottom
	 *
	 * @return string
	 */
	public function buildStyle( $bg_image = '', $bg_color = '', $bg_image_repeat = '', $font_color = '', $padding = '', $margin_bottom = '' ) {
		// _deprecated_function( 'WPBakeryShortCode_VC_Row::buildStyle', '4.5 (will be removed in 4.10)' );

		$has_image = false;
		$style = '';
		if ( (int) $bg_image > 0 && false !== ( $image_url = wp_get_attachment_url( $bg_image ) ) ) {
			$has_image = true;
			$style .= 'background-image: url(' . $image_url . ');';
		}
		if ( ! empty( $bg_color ) ) {
			$style .= vc_get_css_color( 'background-color', $bg_color );
		}
		if ( ! empty( $bg_image_repeat ) && $has_image ) {
			if ( 'cover' === $bg_image_repeat ) {
				$style .= 'background-repeat:no-repeat;background-size: cover;';
			} elseif ( 'contain' === $bg_image_repeat ) {
				$style .= 'background-repeat:no-repeat;background-size: contain;';
			} elseif ( 'no-repeat' === $bg_image_repeat ) {
				$style .= 'background-repeat: no-repeat;';
			}
		}
		if ( ! empty( $font_color ) ) {
			$style .= vc_get_css_color( 'color', $font_color );
		}
		if ( '' !== $padding ) {
			$style .= 'padding: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding ) ? $padding : $padding . 'px' ) . ';';
		}
		if ( '' !== $margin_bottom ) {
			$style .= 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_bottom ) ? $margin_bottom : $margin_bottom . 'px' ) . ';';
		}

		return empty( $style ) ? '' : ' style="' . esc_attr( $style ) . '"';
	}

	public function generateCSSBox( $value ){
			
		$style = '';

		if( !is_array($value) )
			$value = codeless_js_object_to_array( $value );
						
		if(!empty($value)){

			foreach($value as $prop => $val){
				$style .= $prop.': '.$val.' !important;';
			}
		}
					
		return $style;
	}
}



/**
 * WPBakery WPBakery Page Builder shortcodes
 *
 * @package WPBakeryPageBuilder
 *
 */
class WPBakeryShortCode_CL_Column extends WPBakeryShortCode_CL {
	/**
	 * @var array
	 */
	protected $predefined_atts = array(
		'font_color' => '',
		'el_class' => '',
		'el_position' => '',
		'width' => '1/1',
	);

	public $nonDraggableClass = 'vc-non-draggable-column';

	/**
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->shortcodeScripts();
	}

	protected function shortcodeScripts() {
		wp_register_script( 'vc_jquery_skrollr_js', vc_asset_url( 'lib/bower/skrollr/dist/skrollr.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_register_script( 'vc_youtube_iframe_api_js', 'https//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
	}

	/**
	 * @param $controls
	 * @param string $extended_css
	 *
	 * @return string
	 */
	public function getColumnControls( $controls, $extended_css = '' ) {
		$output = '<div class="vc_controls vc_control-column vc_controls-visible' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
		$controls_end = '</div>';

		if ( ' bottom-controls' === $extended_css ) {
			$control_title = __( 'Append to this column', 'picante' );
		} else {
			$control_title = __( 'Prepend to this column', 'picante' );
		}
		if ( vc_user_access()->part( 'shortcodes' )->checkStateAny( true, 'custom', null )->get() ) {
			$controls_add = '<a class="vc_control column_add vc_column-add" data-vc-control="add" href="#" title="' . $control_title . '"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		} else {
			$controls_add = '';
		}
		$controls_edit = '<a class="vc_control column_edit vc_column-edit"  data-vc-control="edit" href="#" title="' . __( 'Edit this column', 'picante' ) . '"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_delete = '<a class="vc_control column_delete vc_column-delete" data-vc-control="delete"  href="#" title="' . __( 'Delete this column', 'picante' ) . '"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );
		if ( is_array( $controls ) && ! empty( $controls ) ) {
			foreach ( $controls as $control ) {
				if ( 'add' === $control || ( $editAccess && 'edit' === $control ) || $allAccess ) {
					$method_name = vc_camel_case( 'output-editor-control-' . $control );
					if ( method_exists( $this, $method_name ) ) {
						$output .= $this->$method_name();
					} else {
						$control_var = 'controls_' . $control;
						if ( isset( ${$control_var} ) ) {
							$output .= ${$control_var};
						}
					}
				}
			}

			return $output . $controls_end;
		} elseif ( is_string( $controls ) && 'full' === $controls ) {
			if ( $allAccess ) {
				return $output . $controls_add . $controls_edit . $controls_delete . $controls_end;
			} elseif ( $editAccess ) {
				return $output . $controls_add . $controls_edit . $controls_end;
			}

			return $output . $controls_add . $controls_end;
		} elseif ( is_string( $controls ) ) {
			$control_var = 'controls_' . $controls;
			if ( 'add' === $controls || ( $editAccess && 'edit' == $controls || $allAccess ) && isset( ${$control_var} ) ) {
				return $output . ${$control_var} . $controls_end;
			}

			return $output . $controls_end;
		}
		if ( $allAccess ) {
			return $output . $controls_add . $controls_edit . $controls_delete . $controls_end;
		} elseif ( $editAccess ) {
			return $output . $controls_add . $controls_edit . $controls_end;
		}

		return $output . $controls_add . $controls_end;
	}

	/**
	 * @param $param
	 * @param $value
	 *
	 * @return string
	 */
	public function singleParamHtmlHolder( $param, $value ) {
		$output = '';
		// Compatibility fixes.
		$old_names = array(
			'yellow_message',
			'blue_message',
			'green_message',
			'button_green',
			'button_grey',
			'button_yellow',
			'button_blue',
			'button_red',
			'button_orange',
		);
		$new_names = array(
			'alert-block',
			'alert-info',
			'alert-success',
			'btn-success',
			'btn',
			'btn-info',
			'btn-primary',
			'btn-danger',
			'btn-warning',
		);
		$value = str_ireplace( $old_names, $new_names, $value );
		$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
		$type = isset( $param['type'] ) ? $param['type'] : '';
		$class = isset( $param['class'] ) ? $param['class'] : '';

		if ( isset( $param['holder'] ) && 'hidden' !== $param['holder'] ) {
			$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
		}

		return $output;
	}

	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function contentAdmin( $atts, $content = null ) {
		$width = $el_class = '';
		extract( shortcode_atts( $this->predefined_atts, $atts ) );
		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
		$column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );

		if ( ' column_14' === $width || ' 1/4' === $width ) {
			$width = array( 'vc_col-sm-3' );
		} elseif ( ' column_14===$width-14-14-14' ) {
			$width = array(
				'vc_col-sm-3',
				'vc_col-sm-3',
				'vc_col-sm-3',
				'vc_col-sm-3',
			);
		} elseif ( ' column_13' === $width || ' 1/3' === $width ) {
			$width = array( 'vc_col-sm-4' );
		} elseif ( ' column_13===$width-23' ) {
			$width = array(
				'vc_col-sm-4',
				'vc_col-sm-8',
			);
		} elseif ( ' column_13===$width-13-13' ) {
			$width = array(
				'vc_col-sm-4',
				'vc_col-sm-4',
				'vc_col-sm-4',
			);
		} elseif ( ' column_12' === $width || ' 1/2' === $width ) {
			$width = array( 'vc_col-sm-6' );
		} elseif ( ' column_12===$width-12' ) {
			$width = array(
				'vc_col-sm-6',
				'vc_col-sm-6',
			);
		} elseif ( ' column_23' === $width || ' 2/3' === $width ) {
			$width = array( 'vc_col-sm-8' );
		} elseif ( ' column_34' === $width || ' 3/4' === $width ) {
			$width = array( 'vc_col-sm-9' );
		} elseif ( ' column_16' === $width || ' 1/6' === $width ) {
			$width = array( 'vc_col-sm-2' );
		} elseif ( ' column_56' === $width || ' 5/6' === $width ) {
			$width = array( 'vc_col-sm-10' );
		} else {
			$width = array( '' );
		}
		for ( $i = 0; $i < count( $width ); $i ++ ) {
			$output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
			$output .= str_replace( '%column_size%', wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls );
			$output .= '<div class="wpb_element_wrapper">';
			$output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
			$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
			if ( isset( $this->settings['params'] ) ) {
				$inner = '';
				foreach ( $this->settings['params'] as $param ) {
					$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
					if ( is_array( $param_value ) ) {
						// Get first element from the array
						reset( $param_value );
						$first_key = key( $param_value );
						$param_value = $param_value[ $first_key ];
					}
					$inner .= $this->singleParamHtmlHolder( $param, $param_value );
				}
				$output .= $inner;
			}
			$output .= '</div>';
			$output .= str_replace( '%column_size%', wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls_bottom );
			$output .= '</div>';
		}

		return $output;
	}

	/**
	 * @return string
	 */
	public function customAdminBlockParams() {
		return '';
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function mainHtmlBlockParams( $width, $i ) {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );
		$base_ = 'vc_column';
		if( $this->settings['base'] == 'cl_column_inner' )
			$base_ = 'vc_column_inner';
		return 'data-element_type="' . $this->settings['base'] . '" data-vc-column-width="' . wpb_vc_get_column_width_indent( $width[ $i ] ) . '" class="wpb_' . $base_ . ' ' . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' ) . ' ' . $this->templateWidth() . ' wpb_content_holder"' . $this->customAdminBlockParams();
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="wpb_column_container vc_container_for_children"';
	}

	/**
	 * @param string $content
	 *
	 * @return string
	 */
	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}

	/**
	 * @return string
	 */
	protected function templateWidth() {
		return '<%= window.vc_convert_column_size(params.width) %>';
	}

	/**
	 * @param string $font_color
	 *
	 * @return string
	 */
	public function buildStyle( $font_color = '' ) {
		$style = '';
		if ( ! empty( $font_color ) ) {
			$style .= vc_get_css_color( 'color', $font_color );
		}

		return empty( $style ) ? $style : ' style="' . esc_attr( $style ) . '"';
	}


	public function generateCSSBox( $value ){
			
		$style = '';

		if( !is_array($value) )
			$value = codeless_js_object_to_array( $value );
						
		if(!empty($value)){

			foreach($value as $prop => $val){
				$style .= $prop.': '.$val.' !important;';
			}
		}
					
		return $style;
	}
}




class WPBakeryShortCode_CL_Row_Inner extends WPBakeryShortCode_CL_Row {
	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}
}

class WPBakeryShortCode_CL_Column_Inner extends WPBakeryShortCode_CL_Column {

}


function codeless_generate_backend_params( $tag, $add = false ){
	if( !class_exists( 'Cl_Builder_Mapper' ) )
		return array();


	$shortcode = Cl_Builder_Mapper::getShortCode( $tag );
	$new_params = array();

	if( $add !== false ){
		$new_params[] = $add;
	}

	$group_id = '';
	if( is_array( $shortcode['fields'] ) ){
		foreach( $shortcode['fields'] as $field_id => $field_attr ){
			

			if( $field_attr['type'] == 'show_tabs' ||
				$field_attr['type'] == 'tab_start' ||
				$field_attr['type'] == 'group_start' ||
				$field_attr['type'] == 'group_end' ||
				$field_attr['type'] == 'tab_end' ||
				$field_id == 'width' && $tag == 'cl_column' ||
				$field_id == 'width' && $tag == 'cl_column_inner' ){
					if( $field_attr['type'] == 'tab_start' )
						$group_id = $field_attr['label'];
					if( $field_attr['type'] == 'tab_end' )
						$group_id = '';

					continue;
				}
				

			$type_map = array(
				'select' => 'dropdown',
				'switch' => 'dropdown',
				//'css_tool' => 'css_tool',
				'inline_select' => 'dropdown',
				'color' => 'colorpicker',
				'image' => 'attach_image',
				'css_tool' => 'css_editor',
				'image_gallery' => 'attach_images',
				'sortable' => 'sortable',
				'select_icon' => 'iconpicker',
				'multicheck' => 'dropdown_multi'
			);

			$new_param = array(
				'heading' => $field_attr['label'],
				'type' => (isset( $type_map[ $field_attr['type'] ] ) ? $type_map[ $field_attr['type'] ] : 'textfield'),
				'description' => (isset( $field_attr['tooltip'] ) ? $field_attr['tooltip'] : ''),
				'param_name' => $field_id
			);

			if( $field_id == 'content' && $field_attr['type'] == 'inline_text' )
				$new_param['type'] = 'textarea_html';

			if( isset( $field_attr['group_vc'] ) )
				$new_param['group'] = $field_attr['group_vc'];

			if( !empty( $group_id ) )
				$new_param['group'] = $group_id;

			if( isset( $field_attr['selector'] ) )
				$new_param['selector'] = $field_attr['selector'];
			if( isset( $field_attr['selectClass'] ) )
				$new_param['selectClass'] = $field_attr['selectClass'];
			if( isset( $field_attr['htmldata'] ) )
				$new_param['htmldata'] = $field_attr['htmldata'];
			if( isset( $field_attr['addClass'] ) )
				$new_param['addClass'] = $field_attr['addClass'];
			if( isset( $field_attr['css_property'] ) )
				$new_param['css_property'] = $field_attr['css_property'];
			if( isset( $field_attr['suffix'] ) )
				$new_param['suffix'] = $field_attr['suffix'];
			if( isset( $field_attr['media_query'] ) )
				$new_param['media_query'] = $field_attr['media_query'];


			if( isset( $field_attr['holder'] ) ){
				$new_param['holder'] = $field_attr['holder'];
			}
				

			if( isset( $field_attr['cl_required'] ) && $field_attr['cl_required'][0]['operator'] == '==' ){
				$new_param['dependency'] = array(
					'element' => $field_attr['cl_required'][0]['setting'],
					'value' => array( (string) $field_attr['cl_required'][0]['value'] )
				);
			}

			if( isset( $field_attr['replace_type_vc'] ) && !empty( $field_attr['replace_type_vc'] ) )
				$new_param['type'] = $field_attr['replace_type_vc'];


			if( $field_attr['type'] == 'select' || $field_attr['type'] == 'inline_select' || $field_attr['type'] == 'multicheck' ){

				if( isset( $field_attr['choices'] ) ){

					$new_param['value'] = array_flip( $field_attr['choices'] );
					if( $field_attr['type'] == 'multicheck' )
						$new_param['value'] = array( 'None' => 'none_' ) + $new_param['value'];
						
						


				}
			}

			if( $field_attr['type'] == 'switch' ){
				$new_param['value'] = ($field_attr['default']) ? array('On' => 1, 'Off' => 0) : array('Off' => 0, 'On' => 1) ;
			}

			if( $field_attr['type'] == 'select' || $field_attr['type'] == 'inline_select' || $field_attr['type'] == 'multicheck' ){
				$new_param['std'] = $field_attr['default'];

				if( $new_param['type'] == 'dropdown_multi' )
					unset( $new_param['std'] );
			}

			if( $new_param['type'] == 'textfield' && isset( $field_attr['default'] ) )
				$new_param['value'] = $field_attr['default'];

			if( $new_param['type'] == 'css_editor' ){
				$new_param['value'] = $field_attr['default'];
				$new_param['std'] = $field_attr['default'];
			}
			

			if( $field_attr['type'] == 'select_icon' ){
				$new_param['settings'] = array(
					'type' => 'codeless_icons'
				);
			}



			$new_params[] = $new_param;


		}

	}
	return $new_params;
}


add_filter( 'vc_iconpicker-type-codeless_icons', 'codeless_vc_map_icons' );

function codeless_vc_map_icons(){
	return Codeless_Icons::get_icons();
}





add_filter( 'vc_get_all_templates', 'codeless_modify_default_template_name', 999 );
function codeless_modify_default_template_name($data){
    $data[1]['category_name'] = esc_attr__('picante Templates', 'picante');
    $data[1]['category_description'] = esc_attr__( 'Append predefined picante Templates to the actual layout', 'picante' );
    $default_templates = visual_composer()->templatesPanelEditor()->getDefaultTemplates();

    foreach( $data[1]['templates'] as $index => $template_data ){
        if( isset( $template_data['unique_id'] ) && isset( $default_templates[ $template_data['unique_id'] ] ) ){
            
            $data[1]['templates'][$index]['cat_display_name'] = isset( $default_templates[ $template_data['unique_id'] ]['cat_display_name'] ) ? $default_templates[$template_data['unique_id']]['cat_display_name'] : '';
        }
    }
    $data[1]['category_weight'] = 5;

    return $data;
    
}


add_filter( 'vc_templates_render_category', 'codeless_templates_render_category', 999 );
function codeless_templates_render_category($category){
    if( $category['category'] == 'default_templates' ){
        $output = $category['output'];
        $category['output'] = '<div class="library_categories">';
            $category['output'] .= '<ul>';
            $codeless_library_cats = codeless_vc_cat_list();
            $category['output'] .=  '<li data-sort="all" class="active">'.esc_attr__('All', 'picante').'</li>';
            foreach($codeless_library_cats as $cat_id => $cat_name) {
                $category['output'] .=  '<li data-sort="'.$cat_id.'">'.$cat_name.'</li>';
            }
            $category['output'] .= '</ul>';

        $category['output'] .= '</div>';
        $category['output'] .= '<div class="cl-templates-wrap">';
        $category['output'] .= $output;
        $category['output'] .= '</div>';
    }

    return $category;
}


add_filter( 'vc_templates_render_template', 'codeless_templates_render_template', 99, 2 );
function codeless_templates_render_template($name, $template){
    $name = $template['name'];
    $cat_display_name = isset( $template['cat_display_name'] ) ? $template['cat_display_name'] : '';

    $output = '';
    $output .= '<div class="cl-template-wrap">';
        if( isset( $template['image'] ) && !empty(  $template['image'] ) )
            $output .= '<div class="img-wrap"><img class="lazy" data-src="'.$template['image'].'" alt="'.$name.'" width="300" height="200"></div>';
        $output .= '<div class="title-wrap">';
            $output .= '<div class="display_cat">'.$cat_display_name.'</div>';
            $output .= $name;
        $output .= '</div>';
        $output .= '<a type="button" class="vc_ui-list-bar-item-trigger" title="$add_template_title"
    data-template-handler=""
    data-vc-ui-element="template-title"></a>';
    $output .= '</div>';
    return $output;
}


add_action( 'vc_load_default_templates_action','codeless_templates_for_vc' ); 

function codeless_vc_cat_list(){
    $cat_display_names = array(
		'about' => __('About', 'picante'),
		'block' => __('Block', 'picante'),
		'blog' => __('Blog', 'picante'),
		'cta' => __('Call to Action', 'picante'),
		'contact' => __('Carousel', 'picante'),
		'counter' => __('Counter', 'picante'),
		'clients' => __('Clients', 'picante'),
		'events' => __('Events', 'picante'),
		'faq' => __('Faq', 'picante'),
		'grid' => __('Grid', 'picante'),
		'gallery' => __('Gallery', 'picante'),
		'menu' => __('Menu', 'picante'),
		'portfolio' => __('Portfolio', 'picante'),
		'services' => __('Services', 'picante'),
		'skills' => __('Skills', 'picante'),
		'shop' => __('Shop', 'picante'),
		'testimonial' => __('Testimonial', 'picante'),
		'team' => __('Team', 'picante'),
		'title' => __('Title Block', 'picante'),
    );

    return $cat_display_names;
}


function codeless_templates_for_vc() {

$cat_display_names = codeless_vc_cat_list();


// Testimonial 1
$data = array();
$data['name'] = __( 'Testimonial 1', 'picante' );
$data['cat_display_name'] = $cat_display_names['testimonial'];
$data['custom_class'] = 'testimonial';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#f7f4ed" background_position="right top" background_size="auto" parallax="1" row_type="container-fluid" equal_height="1" col_responsive="full"][cl_column width="1/2" css_style="{'padding-top':'100px','padding-bottom':'100px','padding-right':'13%','padding-left':'25%'}_-_json" background_color="#f7f4ed" vertical_align="middle" css_style_767_col_bool="1" css_style_767="{'padding-left':'15px','padding-right':'15px','padding-bottom':'50px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222"]

<mark class="highlight">About</mark> Our Chiefs

[/cl_custom_heading][cl_team style="left_aligned" carousel="1" grid_layout="1" carousel_nav="1"][/cl_column][cl_column width="1/2" background_image="{'id':'20','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F03%2F12333-min-compressed.jpg'}_-_json" background_position="center center"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Gallery
$data = array();
$data['name'] = __( 'Gallery', 'picante' );
$data['cat_display_name'] = $cat_display_names['gallery'];
$data['custom_class'] = 'gallery';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_color="#222023" text_color="light-text" css_style="{'padding-top':'60px','padding-bottom':'','margin-bottom':''}_-_json" row_type="container-fluid" columns_gap="0"][cl_column text_color="light-text" horizontal_align="middle" css_style="{'padding-bottom':'0px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#eae5d6" color_icon="#222222"]

<mark class="highlight">Our</mark> Gallery

[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="16" text_line_height="24" text_color="#eae5d6" css_style="{'margin-top':'25px','margin-bottom':'60px'}_-_json"]

Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum.

Nam molestie sem eu quam fermentum a tempus nisi aliquet.

[/cl_text][cl_portfolio columns="5" distance="0" portfolio_filters="small" portfolio_overlay="two_icons" portfolio_overlay_icon_bool="1" portfolio_overlay_color="rgba(0,0,0,0.67)" portfolio_animation="alpha-anim" portfolio_overlay_content_animation="bottom-t-top"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Services 1
$data = array();
$data['name'] = __( 'Services 1', 'picante' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222"]

<mark class="highlight">Our</mark> Services

[/cl_custom_heading][cl_text margin_paragraphs="0"]

Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum.

Nam molestie sem eu quam fermentum a tempus nisi aliquet.

[/cl_text][cl_row_inner css_style="{'margin-top':'40px'}_-_json"][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'64','mime':'image%2Fpng','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F03%2Fico1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="Breakfast" box_border_color="rgba(0,0,0,0)" wrapper_size="110" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_transform="none" title_color="#e68556" animation="bottom-t-top" animation_speed="600"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'65','mime':'image%2Fpng','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F03%2Fico2.png'}_-_json" layout_type="media_top" layout_align="align_center" title="Lunch" box_border_color="rgba(0,0,0,0)" wrapper_size="127" wrapper_distance="9" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_transform="none" title_color="#e68556" animation="bottom-t-top" animation_speed="600" animation_delay="200"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'66','mime':'image%2Fpng','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F03%2Fico3.png'}_-_json" layout_type="media_top" layout_align="align_center" title="Dinner" box_border_color="rgba(0,0,0,0)" wrapper_size="115" wrapper_distance="16" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_transform="none" title_color="#e68556" animation="bottom-t-top" animation_speed="600" animation_delay="400"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'67','mime':'image%2Fpng','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F03%2Fico4.png'}_-_json" layout_type="media_top" layout_align="align_center" title="Custom" css_style="{'padding-top':'16px'}_-_json" box_border_color="rgba(0,0,0,0)" wrapper_size="100" wrapper_distance="16" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_transform="none" title_color="#e68556" animation="bottom-t-top" animation_speed="600" animation_delay="600"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Menu Black 1
$data = array();
$data['name'] = __( 'Menu Black', 'picante' );
$data['cat_display_name'] = $cat_display_names['menu'];
$data['custom_class'] = 'menu';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json" text_color="light-text" background_image="{'id':'73','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F03%2Fbg1-min.jpg'}_-_json" parallax="1" background_color="#000000" overlay_color="#222023" overlay="color" overlay_opacity="1"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#eae5d6" color_icon="#222222"]

<mark class="highlight">Our</mark> Breakfast

[/cl_custom_heading][cl_row_inner][cl_column_inner width="1/2" text_color="light-text" animation="alpha-anim" animation_speed="600"][cl_list type="table"][cl_table_row title="Eggs Any Style " subtitle="with homefries &amp; toast" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Scrambled Eggs in Puff Pastry" subtitle="with wild mushrooms and asparagus" price="7.00" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Eggs Benedict " subtitle="with homefries" price="6.00" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Eggs Norwegian " subtitle="with homefries" price="12.00" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Soft-Boiled Organic Egg " subtitle="with “soldiers”" price="24.00" wrapper_subtitle="#222023" wrapper_price="#222023"][/cl_list][/cl_column_inner][cl_column_inner width="1/2" animation="alpha-anim" animation_speed="600" animation_delay="200"][cl_list type="table"][cl_table_row title="Soft-Boiled Organic Egg " subtitle="with “soldiers” " wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Eggs Any Style " subtitle="with homefries &amp; toast" price="7.00" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Scrambled Eggs in Puff Pastry" subtitle="with wild mushrooms and asparagus" price="8.00" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Eggs Benedict " subtitle="with homefries" price="11.00" wrapper_subtitle="#222023" wrapper_price="#222023"][cl_table_row title="Eggs Norwegian " subtitle="with homefries" price="22.00" wrapper_subtitle="#222023" wrapper_price="#222023"][/cl_list][/cl_column_inner][/cl_row_inner][cl_button btn_title="

View DETAILS

" overwrite_style="1" with_icon="1" button_border_color="#e68556" button_hover_effect="shadow" css_style="{'margin-top':'52px'}_-_json" link="https://codeless.co/picante/default/?page_id=317"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Intro
$data = array();
$data['name'] = __( 'Intro Block', 'picante' );
$data['cat_display_name'] = $cat_display_names['block'];
$data['custom_class'] = 'block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/5.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'110px','padding-bottom':'110px'}_-_json" equal_height="1" col_responsive="full"][cl_column width="1/2" horizontal_align="middle" vertical_align="middle" css_style="{'padding-right':'60px'}_-_json" css_style_991_col_bool="1" css_style_991="{'padding-right':'0'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_transform="none" text_color="#966589" color_icon="#222222"]

Welcome!

[/cl_custom_heading][cl_custom_heading typography="custom_font" color_icon="#222222" text_color="#23292c" text_font_family="nevis" text_font_size="48" text_font_weight="400" text_letterspace="4"]

<sup>TO</sup>PICANTE

[/cl_custom_heading][cl_text custom_typography="1" text_font_size="24" text_line_height="36" css_style="{'margin-top':'40px'}_-_json"]

<i>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. </i>

[/cl_text][cl_media position="center" image="{'id':'605','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2F123.png'}_-_json" css_style="{'margin-top':'40px'}_-_json"][/cl_column][cl_column width="1/2" css_style="{'padding-top':'0px','padding-bottom':'0px','padding-left':'60px'}_-_json" css_style_991_col_bool="1" css_style_991="{'padding-left':'0'}_-_json"][cl_media image="{'id':'602','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fimg3.jpg'}_-_json" animation="right-t-left"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Menu Featured
$data = array();
$data['name'] = __( 'Menu Featured', 'picante' );
$data['cat_display_name'] = $cat_display_names['block'] . ', ' .$cat_display_names['menu'];
$data['custom_class'] = 'block menu';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/6.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="8" equal_height="1" css_style="{'padding-top':'0px','padding-left':'8px','padding-right':'8px'}_-_json" col_responsive="full"][cl_column width="1/3" horizontal_align="middle" column_effect="image_zoom" css_style="{'padding-top':'130px','padding-bottom':'130px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="light-text" background_image="{'id':'611','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fblock1-compressed.jpg'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="61" text_font_weight="400" text_transform="none" color_icon="#222222"]

<u>   Festive   </u>

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="42" color_icon="#222222"]

SEASON

[/cl_custom_heading][cl_text css_style="{'margin-top':'30px'}_-_json"]

Join us for the ultimate Sunday lunch - 35 day Dry aged Rib of rare breed beef, slow braised shin of beef, Yorkshire puddings &amp; unlimited sides for £25.

[/cl_text][cl_button btn_title="

Book a Table

" overwrite_style="1" button_bg_color="rgba(230,133,86,0)" button_border_color="#ffffff" css_style="{'margin-top':'35px'}_-_json" link="https://codeless.co/picante/default/?page_id=398"][/cl_column][cl_column horizontal_align="middle" column_effect="image_zoom" css_style="{'padding-top':'130px','padding-bottom':'130px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="light-text" background_image="{'id':'612','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fblock2-compressed.jpg'}_-_json" width="1/3"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="61" text_font_weight="400" text_transform="none" color_icon="#222222"]

<u>   Sunday   </u>

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="42" color_icon="#222222"]

Lunch

[/cl_custom_heading][cl_text css_style="{'margin-top':'30px'}_-_json"]

Join us for the ultimate Sunday lunch - 35 day Dry aged Rib of rare breed beef, slow braised shin of beef, Yorkshire puddings &amp; unlimited sides for £25.

[/cl_text][cl_button btn_title="

Book a Table

" overwrite_style="1" button_bg_color="rgba(230,133,86,0)" button_border_color="#ffffff" css_style="{'margin-top':'35px'}_-_json" link="https://codeless.co/picante/default/?page_id=398"][/cl_column][cl_column horizontal_align="middle" column_effect="image_zoom" css_style="{'padding-top':'130px','padding-bottom':'130px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="light-text" background_image="{'id':'613','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fblock3-compressed.jpg'}_-_json" width="1/3"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="61" text_font_weight="400" text_transform="none" color_icon="#222222"]

<u>   Monday   </u>

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="42" color_icon="#222222"]

Wine Club

[/cl_custom_heading][cl_text css_style="{'margin-top':'30px'}_-_json"]

Join us for the ultimate Sunday lunch - 35 day Dry aged Rib of rare breed beef, slow braised shin of beef, Yorkshire puddings &amp; unlimited sides for £25.

[/cl_text][cl_button btn_title="

Book a Table

" overwrite_style="1" button_bg_color="rgba(230,133,86,0)" button_border_color="#ffffff" css_style="{'margin-top':'35px'}_-_json" link="https://codeless.co/picante/default/?page_id=398"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Our Gallery block
$data = array();
$data['name'] = __( 'Gallery Block', 'picante' );
$data['cat_display_name'] = $cat_display_names['block'] . ', ' .$cat_display_names['gallery'];
$data['custom_class'] = 'block gallery';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/7.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="8" equal_height="1" css_style="{'padding-top':'0px','padding-left':'8px','padding-right':'8px'}_-_json" device_visibility="{'0':'hidden-xs'}_-_json" col_responsive="full"][cl_column width="1/3" horizontal_align="middle" column_effect="image_zoom" css_style="{'padding-top':'130px','padding-bottom':'130px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="light-text" background_image="{'id':'686','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Frecipes01-compressed.jpg'}_-_json"][/cl_column][cl_column width="1/3" horizontal_align="middle" custom_link="#gallery" css_style="{'padding-top':'130px','padding-bottom':'130px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="light-text" background_image="{'id':'685','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Frecipes02-compressed.jpg'}_-_json" vertical_align="middle"][cl_row_inner css_style="{'margin-top':''}_-_json"][cl_column_inner css_style="{'padding-top':'40px','padding-bottom':'40px','border-left-width':'1px','border-right-width':'1px','border-top-width':'1px','border-bottom-width':'1px','margin-top':'','margin-bottom':'','padding-right':'','padding-left':'','margin-left':'','margin-right':''}_-_json" background_color="#ffffff"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="40" text_font_weight="400" text_transform="none" text_color="#966589" color_icon="#222222"]

<u>Recipes</u>

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="25" text_font_weight="400" text_letterspace="4" color_icon="#222222" text_color="#23292c"]

<span style="font-size: 28px;">GALLERY</span>

[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/3" horizontal_align="middle" column_effect="image_zoom" css_style="{'padding-top':'130px','padding-bottom':'130px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="light-text" background_image="{'id':'684','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Frecipes03-compressed.jpg'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services 2
$data = array();
$data['name'] = __( 'Services 2', 'picante' );
$data['cat_display_name'] = $cat_display_names['block'] . ', ' .$cat_display_names['services'];
$data['custom_class'] = 'block services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/8.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'70px'}_-_json" parallax="1"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_transform="none" text_color="#966589" color_icon="#222222"]<u>Main</u>

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="42" text_font_weight="400" text_letterspace="4" color_icon="#222222" text_color="#23292c"]SERVICES

[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'55px'}_-_json"][cl_column_inner width="1/4"][cl_service media="type_custom" layout_type="media_top" layout_align="align_center" title="BREAKFAST" subtitle="Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum." wrapper_size="110" wrapper_distance="33" title_content_distance="10" title_typography="custom_font" title_font_size="24" title_line_height="50" title_letterspace="0.25" desc_font_size="16" image="{'id':'849','url':'https://codeless.co/picante/default/wp-content/uploads/2018/06/icon04_01.png'}_-_json" box_border_color="rgba(0,0,0,0.01)" title_color="#a8829e" desc_color="#73848e" desc_line_height="28"]Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" layout_type="media_top" layout_align="align_center" title="LUNCH" subtitle="Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum." wrapper_size="110" wrapper_distance="33" title_content_distance="10" title_typography="custom_font" title_font_size="24" title_line_height="50" title_letterspace="0.25" desc_font_size="16" image="{'id':'851','url':'https://codeless.co/picante/default/wp-content/uploads/2018/06/icon02_01.png'}_-_json" box_border_color="rgba(0,0,0,0.01)" title_color="#a8829e" desc_color="#73848e"]Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" layout_type="media_top" layout_align="align_center" title="DINNER" subtitle="Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum." wrapper_size="110" wrapper_distance="33" title_content_distance="10" title_typography="custom_font" title_font_size="24" title_line_height="50" title_letterspace="0.25" desc_font_size="16" image="{'id':'850','url':'https://codeless.co/picante/default/wp-content/uploads/2018/06/icon03_01.png'}_-_json" box_border_color="rgba(0,0,0,0.01)" title_color="#a8829e" desc_color="#73848e"]Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" layout_type="media_top" layout_align="align_center" title="CUSTOM" subtitle="Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum." wrapper_size="110" wrapper_distance="33" title_content_distance="10" title_typography="custom_font" title_font_size="24" title_line_height="50" title_letterspace="0.25" desc_font_size="16" image="{'id':'852','url':'https://codeless.co/picante/default/wp-content/uploads/2018/06/icon01_01.png'}_-_json" box_border_color="rgba(0,0,0,0.01)" title_color="#a8829e" desc_color="#73848e"]Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Reservation
$data = array();
$data['name'] = __( 'Make Reservation Block', 'picante' );
$data['cat_display_name'] = $cat_display_names['block'];
$data['custom_class'] = 'block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/9.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'190px','padding-bottom':'190px'}_-_json" background_position="center center" parallax="1" background_image="{'id':'683','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fslide04-compressed.jpg'}_-_json"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_media position="center" custom_link="https://codeless.co/picante/default/?page_id=398" image="{'id':'689','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fmake_a_reservation-compressed.jpg'}_-_json"][cl_media][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Menu Block
$data = array();
$data['name'] = __( 'Menu Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['block'] . ', ' .$cat_display_names['menu'];
$data['custom_class'] = 'block menu';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/10.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row equal_height="1" css_style="{'padding-top':'110px','padding-bottom':'110px'}_-_json" col_responsive="full"][cl_column width="1/2" horizontal_align="middle" vertical_align="middle" css_style="{'padding-right':'110px','padding-left':'110px','padding-top':'120px','padding-bottom':'120px'}_-_json" background_image="{'id':'688','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fmenu-compressed.jpg'}_-_json"][cl_row_inner][cl_column_inner css_style="{'padding-top':'120px','padding-bottom':'120px','padding-left':'','padding-right':''}_-_json" background_position="center center" background_image="{'id':'694','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fbackground_menu.png'}_-_json" css_style_767_colinner_bool="1" css_style_767="{'padding-top':'25px','padding-bottom':'25px','padding-left':'25px','padding-right':'25px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_transform="none" custom_responsive_992_bool="1" custom_responsive_992_size="35px" text_color="#966589" color_icon="#222222"]<u>Our</u>

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="48" text_font_weight="400" text_letterspace="4" custom_responsive_992_bool="1" color_icon="#222222" text_color="#ffffff"]<span style="display: inline !important;">MENU</span>

[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/2" horizontal_align="middle" css_style="{'padding-top':'60px','padding-bottom':'0px','padding-left':'60px'}_-_json" css_style_991_col_bool="1" css_style_991="{'padding-left':'0'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_transform="none" text_color="#966589" color_icon="#222222"]
<p style="text-align: center;"><u>Delicious!</u></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="48" text_font_weight="400" text_letterspace="4" color_icon="#222222" text_color="#23292c"]
<p style="text-align: center;">DISHES</p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="36" css_style="{'margin-top':'60px','margin-bottom':'60px'}_-_json"]A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.

[/cl_text][cl_button btn_title="VIEW FULL MENU

" overwrite_style="1" link="https://codeless.co/picante/default/?page_id=317" button_bg_color="#ffffff" button_font_color="#23292c" button_border_color="#23292c"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Contact Block
$data = array();
$data['name'] = __( 'Contact Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['block'] . ', ' .$cat_display_names['contact'];
$data['custom_class'] = 'block contact';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/11.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row custom_width_bool="1" custom_width="500" css_style="{'padding-top':'95px','padding-bottom':'95px'}_-_json" background_image="{'id':'644','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F05%2Fmap_image-compressed.jpg'}_-_json"][cl_column horizontal_align="middle" css_style="{'padding-top':'50px','padding-bottom':'50px'}_-_json" background_color="#ffffff"][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="18" text_letterspace="1.15" text_color="#23292c" color_icon="#222222"]

Location

[/cl_custom_heading][cl_divider width_full="0" width="144" align="center_divider" css_style="{'margin-top':'0px'}_-_json" color="#23292c"][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="12" text_line_height="24" text_letterspace="2.45" css_style="{'margin-top':'15px'}_-_json" text_color="#73848e" color_icon="#222222"]

Little Lonsdale St, Melbourne

Victoria 8011 Australia

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="18" text_letterspace="1.15" css_style="{'margin-top':'35px'}_-_json" text_color="#23292c" color_icon="#222222"]

HOURS

[/cl_custom_heading][cl_divider width_full="0" width="99" align="center_divider" css_style="{'margin-top':'0px'}_-_json" color="#23292c"][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="12" text_line_height="24" text_letterspace="2.5" css_style="{'margin-top':'15px'}_-_json" text_color="#73848e" color_icon="#222222"]

tue - thu

9:30am - 21:30pm

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_family="nevis" text_font_size="12" text_line_height="24" text_letterspace="2.5" css_style="{'margin-top':'15px'}_-_json" text_color="#73848e" color_icon="#222222"]

fri - sun

10:30am - 23:30pm

[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// About Block
$data = array();
$data['name'] = __( 'About Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['block'] . ', ' .$cat_display_names['about'];
$data['custom_class'] = 'block about';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/12.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_color="#222023" css_style="{'padding-top':'75px','padding-bottom':'75px'}_-_json"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#eae5d6" color_icon="#222222"]

	<p><mark class="highlight">About</mark>&nbsp;Us</p>
	[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="16" text_line_height="24" text_color="#eae5d6"]

	<p style="margin-top: 0px; margin-bottom: 0px;"><i>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu.&nbsp;</i></p><p style="margin-top: 0px; margin-bottom: 0px;"><i>Nulla semper arcu vel diam auctor. condimentum.  </i></p>

[/cl_text][cl_row_inner css_style="{'margin-top':'60px'}_-_json"][cl_column_inner width="1/2"][cl_text custom_typography="1" text_font_size="16" text_line_height="30" text_color="#9da7ac"]

	<p style="text-align: left;"><span class="dropcaps">Q</span>uisque volutpat pharetra felis, eu cursus lorem molestie vitae ulla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui ut cus&nbsp;<span style="text-align: center; letter-spacing: 0px;">libero augue at libero. Morbi ut arcu dolor. Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper. lla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui, ut rhoncus libero augue at libero. Morbi ut arcu dolor.</span></p>

[/cl_text][/cl_column_inner][cl_column_inner width="1/2"][cl_text custom_typography="1" text_font_size="16" text_line_height="30" text_color="#9da7ac"]

	<p style="text-align: left;"><span class="dropcaps">W</span>uisque volutpat pharetra felis, eu cursus lorem molestie vitae ulla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui ut cus.&nbsp;<span style="text-align: center; letter-spacing: 0px;">libero augue at libero. Morbi ut arcu dolor. Vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui, ut rhoncus libero augue at libero. Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper, augue est sodales.</span></p>

[/cl_text][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Team CTA
$data = array();
$data['name'] = __( 'Team CTA Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['block'] . ', ' .$cat_display_names['team'];
$data['custom_class'] = 'block team cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/13.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_team style="photo" grid_layout="5" team_items_distance="0" title_typography="h4"][/cl_column][/cl_row][cl_row custom_width_bool="1" custom_width="1240" columns_gap="0" css_style="{'padding-top':'55px','padding-bottom':'55px'}_-_json" background_color="#f7f4ed"][cl_column horizontal_align="middle"][cl_custom_heading color_icon="#222222"]

	<p>One cannot think well, love well, sleep well, <mark class="highlight">if one has not dined well.</mark></p>
	[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Blog
$data = array();
$data['name'] = __( 'Blog', 'picante' );
$data['cat_display_name'] =  $cat_display_names['blog'];
$data['custom_class'] = 'blog';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/14.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row custom_width_bool="1" custom_width="970" css_style="{'padding-top':'95px','padding-bottom':'95px'}_-_json"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#0b2b33" color_icon="#222222"]

	<p><mark class="highlight">Our</mark> Blog</p>
	[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="16" text_line_height="24" text_color="#73848e"]

	<p style="margin-top: 0px; margin-bottom: 0px;"><i>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu.&nbsp;</i></p><p style="margin-top: 0px; margin-bottom: 0px;"><i>Nulla semper arcu vel diam auctor. condimentum.  </i></p>

[/cl_text][cl_divider color="#e9eced" color_icon="#222222" css_style="{'margin-top':'35px'}_-_json"][cl_blog blog_style="default" css_style="{'margin-top':'10px'}_-_json" posts_per_page="1" order="ASC"][cl_button overwrite_style="1" with_icon="1" button_bg_color="#eceff0" button_font_color="#73848e" button_border_color="" css_style="{'margin-top':'35px'}_-_json" link="https://codeless.co/picante/default/?page_id=253"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Testimonial
$data = array();
$data['name'] = __( 'Testimonial', 'picante' );
$data['cat_display_name'] =  $cat_display_names['testimonial'];
$data['custom_class'] = 'testimonial';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/15.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'75px','padding-bottom':'75px'}_-_json" text_color="light-text" background_image="{'id':'200','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F04%2Fabout_img2-compressed.jpg'}_-_json" parallax="1"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#ffffff" color_icon="#222222"]

	<p><font color="#e68556">What</font> People Say</p>
	[/cl_custom_heading][cl_testimonial style="simple" carousel_dots="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Clients
$data = array();
$data['name'] = __( 'Clients', 'picante' );
$data['cat_display_name'] =  $cat_display_names['clients'];
$data['custom_class'] = 'clients';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/16.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_gallery carousel="1" items_per_row="5" distance="54" images="__array__898,899,900,901,902,903__array__end__"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Tabbed Menu
$data = array();
$data['name'] = __( 'Tabbed Menu', 'picante' );
$data['cat_display_name'] =  $cat_display_names['menu'];
$data['custom_class'] = 'menu';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/17.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_color="#ffffff" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" row_type="container-fluid" columns_gap="0"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_menu_tabbed menus="{'0':'335','1':'347','2':'348','3':'349'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// CTA
$data = array();
$data['name'] = __( 'CTA', 'picante' );
$data['cat_display_name'] =  $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/18.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'175px','padding-bottom':'175px'}_-_json" background_image="{'id':'395','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Fpicante%2Fdefault%2Fwp-content%2Fuploads%2F2018%2F04%2Fmenu_bg-compressed.jpg'}_-_json" parallax="1"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="71" text_font_weight="400" text_transform="none" text_color="#ffffff" color_icon="#222222" custom_responsive_992_bool="1" custom_responsive_992_size="40px" custom_responsive_992_line_height="40px"]

	<p>Food prepared from the heart with the soul in mind!&nbsp;</p>
	[/cl_custom_heading][cl_button btn_title="<p>View Details</p>
" overwrite_style="1" with_icon="1" button_border_color="rgba(0,0,0,0)" css_style="{'margin-top':'75px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// About Block
$data = array();
$data['name'] = __( 'About Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['about']. ', ' .$cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/19.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#f7f4ed" background_position="center center" background_size="auto" parallax="1" row_type="container-fluid" equal_height="1" col_responsive="full"][cl_column width="1/2" css_style="{'padding-top':'100px','padding-bottom':'100px','padding-right':'20%'}_-_json" background_image="{'id':'948','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2Forganicslide01.jpg'}_-_json" background_position="center center"][/cl_column][cl_column width="1/2" css_style="{'padding-top':'70px','padding-left':'50px','padding-right':'30%'}_-_json" horizontal_align="middle" background_image="{'id':'949','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2Forganicslide02.jpg'}_-_json" css_style_991_col_bool="1" css_style_991="{'padding-right':'15px','padding-left':'15px'}_-_json"][cl_custom_heading typography="h1" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222" tag="h1" css_style="{'margin-top':'120px'}_-_json"]

ABOUT US

[/cl_custom_heading][cl_media position="center" image="{'id':'711','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2Fherbs_logo.png'}_-_json"][cl_text custom_typography="1" text_font_size="16" text_line_height="24" css_style="{'margin-bottom':'','padding-bottom':'20px'}_-_json"]

At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores

[/cl_text][cl_custom_heading color_icon="#222222"]

WELCOME TO ORGANIC BAR!

[/cl_custom_heading][cl_text css_style="{'margin-bottom':'','padding-bottom':''}_-_json"]

It is Biotrattoria, which has been awarded with a gold eco-label. Y ou will find the restaurant , which has been certified as the leading restaurant for Italian ecology in

[/cl_text][cl_gallery][cl_media position="center" image="{'id':'708','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2Fsignature.png'}_-_json" css_style="{'padding-bottom':'70px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Services
$data = array();
$data['name'] = __( 'Services', 'picante' );
$data['cat_display_name'] =  $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/20.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json" background_image="{'id':'727','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2Fbackground-compressed.jpg'}_-_json"][cl_column horizontal_align="middle" text_color="light-text"][cl_custom_heading typography="h1" text_font_family="Great Vibes" text_font_size="60" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222"]

OUR SERVICES

[/cl_custom_heading][cl_text margin_paragraphs="0" text_color="#ffffff" custom_typography="1" text_font_size="16" text_line_height="24" css_style="{'padding-bottom':'30px'}_-_json"]

Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum.

Nam molestie sem eu quam fermentum a tempus nisi aliquet. 

[/cl_text][cl_row_inner css_style="{'margin-top':'40px'}_-_json"][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'917','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2F01-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="Breakfast" box_border_color="rgba(0,0,0,0)" wrapper_size="125" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_color="#91a831" animation="bottom-t-top" animation_speed="600" desc_color="#ffffff" custom_desc_typography="1" desc_font_size="16" desc_line_height="30"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'916','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2F02-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="LUNCH" box_border_color="rgba(0,0,0,0)" wrapper_size="125" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_color="#91a831" animation="bottom-t-top" animation_speed="600" desc_color="#ffffff" custom_desc_typography="1" desc_font_size="16" desc_line_height="30"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'915','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2F03-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="DINNER" box_border_color="rgba(0,0,0,0)" wrapper_size="125" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_color="#91a831" animation="bottom-t-top" animation_speed="600" desc_color="#ffffff" custom_desc_typography="1" desc_font_size="16" desc_line_height="30"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'914','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Forganic%2Fwp-content%2Fuploads%2F2018%2F06%2F04-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="CUSTOM" box_border_color="rgba(0,0,0,0)" wrapper_size="125" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="400" title_line_height="48" title_color="#91a831" animation="bottom-t-top" animation_speed="600" desc_color="#ffffff" custom_desc_typography="1" desc_font_size="16" desc_line_height="30"]

Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block
$data = array();
$data['name'] = __( 'About Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/21.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'90px','padding-bottom':'90px'}_-_json" background_color="#fcfbf2"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="BenchNine" text_font_size="48" text_font_weight="800" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222" tag="h1" text_letterspace="5"]

<mark class="highlight">WHO</mark> WE ARE

[/cl_custom_heading][cl_media position="center" image="{'id':'720','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2Fcoffee_logo.png'}_-_json" image_size="theme_default" css_style="{'margin-top':'55px','margin-bottom':'65px'}_-_json"][cl_custom_heading color_icon="#222222" typography="custom_font" text_font_family="Prata" text_font_weight="400" text_font_size="24" text_color="#23292c"]

“We know you don’t want to be limited.”

[/cl_custom_heading][cl_text margin_paragraphs="0"]

Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper. lla vehicula,<span style="letter-spacing: 0px;"> lacus ut suscipit fermentum, </span>

<span style="letter-spacing: 0px;">turpis felis ultricies dui, ut rhoncus libero augue at libero. Morbi ut arcu dolor.libero augue at libero. Morbi ut arcu dolor.</span>

Vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui, ut rhoncus libero augue at libero.

[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block
$data = array();
$data['name'] = __( 'Services', 'picante' );
$data['cat_display_name'] =  $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/22.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'120px','padding-bottom':'120px'}_-_json" background_image="{'id':'705','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2Fblock01-compressed.jpg'}_-_json" background_position="center center" text_color="light-text"][cl_column horizontal_align="middle" text_color="light-text"][cl_custom_heading typography="custom_font" text_font_family="BenchNine" text_font_size="48" text_font_weight="800" text_line_height="60" text_transform="none" text_color="#ffffff" color_icon="#222222" tag="h1" text_letterspace="5"]

WHAT WE OFFER

[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'50px'}_-_json"]

<i>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum. </i>

<i>Nam molestie sem eu quam fermentum a tempus nisi aliquet. </i>

[/cl_text][cl_row_inner css_style="{'margin-top':'40px'}_-_json"][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'910','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2F01_icon-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="BEANS" box_border_color="rgba(0,0,0,0)" wrapper_size="110" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="800" title_line_height="48" title_transform="none" title_color="#ffffff" animation="bottom-t-top" animation_speed="600"]

&nbsp;

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'911','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2F02_icon-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="ESPRESSO" box_border_color="rgba(0,0,0,0)" wrapper_size="127" wrapper_distance="9" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="800" title_line_height="48" title_transform="none" title_color="#ffffff" animation="bottom-t-top" animation_speed="600" animation_delay="200"]

&nbsp;

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'912','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2F03_icon-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="GIVEAWAY" box_border_color="rgba(0,0,0,0)" wrapper_size="115" wrapper_distance="16" title_distance_top="5" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="800" title_line_height="48" title_transform="none" title_color="#ffffff" animation="bottom-t-top" animation_speed="600" animation_delay="400"]

&nbsp;

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_custom" image="{'id':'913','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2F04_icon-1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="EXPRESS" css_style="{'padding-top':''}_-_json" box_border_color="rgba(0,0,0,0)" wrapper_size="114" wrapper_distance="23" title_content_distance="10" title_typography="custom_font" title_font_size="30" title_font_weight="800" title_line_height="48" title_transform="none" title_color="#ffffff" animation="bottom-t-top" animation_speed="600" animation_delay="600"]

&nbsp;

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Gallery
$data = array();
$data['name'] = __( 'Gallery', 'picante' );
$data['cat_display_name'] =  $cat_display_names['gallery'];
$data['custom_class'] = 'gallery';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/23.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_color="#ffffff" css_style="{'padding-top':'110px','padding-bottom':'','margin-bottom':''}_-_json" row_type="container-fluid" columns_gap="0"][cl_column horizontal_align="middle" css_style="{'padding-bottom':'0px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="BenchNine" text_font_size="48" text_font_weight="800" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222" tag="h1" text_letterspace="5"]

<mark class="highlight">OUR</mark> GALLERY

[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="16" text_line_height="30" text_color="#23292c" css_style="{'margin-top':'50px','margin-bottom':'60px'}_-_json"]

<i>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum. </i>

<i>Nam molestie sem eu quam fermentum a tempus nisi aliquet. </i>

[/cl_text][cl_portfolio columns="5" distance="0" portfolio_filters="small" portfolio_overlay="two_icons" portfolio_overlay_icon_bool="1" portfolio_overlay_color="rgba(0,0,0,0.67)" portfolio_animation="alpha-anim" portfolio_overlay_content_animation="bottom-t-top" only_media_price="1" only_media_tags="0"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// CTA Block
$data = array();
$data['name'] = __( 'CTA Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/24.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'110px','padding-bottom':'110px'}_-_json" background_image="{'id':'708','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2Fblock03-compressed.jpg'}_-_json" background_position="center center" overlay="color" overlay_color="#23292c" overlay_opacity="0.4" text_color="light-text" parallax="1"][cl_column horizontal_align="middle"][cl_media position="center" image="{'id':'712','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2Flogo03.png'}_-_json"][cl_button button_border_color="" css_style="{'margin-top':'50px','margin-bottom':'50px'}_-_json" button_bg_color="#ffffff" button_font_color="#bc8b5f" overwrite_style="1" btn_title="

GET IN TOUCH

"][cl_custom_heading color_icon="#222222" css_style="{'margin-top':'','padding-bottom':''}_-_json" typography="custom_font" text_font_size="18" text_font_family="Prata"]

CONSECTETUR UT VESTIUBULUMENESAN TELLS NISDL COMMODO EU ALIQUETS

[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Contact Block
$data = array();
$data['name'] = __( 'Contact Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['contact']. ', '.$cat_display_names['block'];
$data['custom_class'] = 'contact block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/25.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'','padding-bottom':''}_-_json" row_type="container-fluid" columns_gap="0"][cl_column width="1/2" css_style="{'padding-top':'','padding-bottom':''}_-_json"][cl_map height="760" style="ultra_light_labels" css_style="{'margin-top':''}_-_json" api_key="AIzaSyDNS4R2BxpPspB31mZPnGvelSPSXvggI4I" lat_lon="40.727944, -74.078947"][/cl_column][cl_column width="1/2" css_style="{'padding-top':'110px','padding-bottom':'110px','padding-left':'50px'}_-_json"][cl_custom_heading color_icon="#222222" typography="custom_font" text_font_size="48" text_font_weight="800" text_letterspace="5"]

<mark class="highlight">FIND</mark> US

[/cl_custom_heading][cl_service media="type_icon" layout_align="align_center" title="TUE - SAT 10.00 - 00.00, Mon CLOSED" css_style="{'margin-top':'50px'}_-_json" box_border_color="rgba(0,0,0,0)" wrapper_size="50" wrapper_distance="0" icon="cl-icon-clock" icon_font_size="30" title_distance_top="10"]

&nbsp;

[/cl_service][cl_service media="type_icon" layout_align="align_center" title="LITTLE LONSDALE ST, MELBOURNE" css_style="{'margin-top':'40px'}_-_json" box_border_color="rgba(0,0,0,0)" wrapper_size="50" wrapper_distance="0" icon="cl-icon-map-marker" icon_font_size="30" title_distance_top="10"]

&nbsp;

[/cl_service][cl_service media="type_icon" layout_align="align_center" title="+1 800 450 17 04 " css_style="{'margin-top':'40px'}_-_json" box_border_color="rgba(0,0,0,0)" wrapper_size="50" wrapper_distance="0" icon="cl-icon-cellphone-android" icon_font_size="30" title_distance_top="10"]

&nbsp;

[/cl_service][cl_service media="type_icon" layout_align="align_center" title="support@company.com " css_style="{'margin-top':'40px'}_-_json" box_border_color="rgba(0,0,0,0)" wrapper_size="50" wrapper_distance="0" icon="cl-icon-email-outline" icon_font_size="30" title_distance_top="10"]

&nbsp;

[/cl_service][cl_button btn_title="

SEND MESSAGE

" overwrite_style="1" button_bg_color="#ffffff" button_font_color="#23292c" button_border_color="#bc8b5f" css_style="{'margin-top':'50px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Team Counter
$data = array();
$data['name'] = __( 'Team & Counter', 'picante' );
$data['cat_display_name'] =  $cat_display_names['team']. ', '.$cat_display_names['counter'];
$data['custom_class'] = 'team counter';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/26.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'120px','padding-bottom':'90px'}_-_json" background_color="#f7f4ed"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_family="BenchNine" text_font_size="48" text_font_weight="800" text_line_height="60" text_transform="none" text_color="#23292c" color_icon="#222222" tag="h1" text_letterspace="5" css_style="{'margin-top':'30px'}_-_json"]

	<p><mark class="highlight">OUR</mark> BARISTAS</p>
	[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="18" text_line_height="30" css_style="{'padding-bottom':'30px','margin-top':'','padding-top':'40px'}_-_json" text_color="#23292c"]

	<p><i>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum. </i></p><p><i>Nam molestie sem eu quam fermentum a tempus nisi aliquet.</i></p>

[/cl_text][cl_team style="photo" posts_per_page="3" css_style="{'margin-bottom':'80px'}_-_json"][cl_row_inner][cl_column_inner width="1/4"][cl_counter number="7"][cl_custom_heading typography="custom_font" text_font_size="24" text_color="#23292c" color_icon="#222222"]

	<p>AWARDS WON</p>
	[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="10"][cl_custom_heading typography="custom_font" text_font_size="24" text_color="#23292c" color_icon="#222222"]

	<p>COMPLETED EVENTS</p>
	[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="4287"][cl_custom_heading typography="custom_font" text_font_size="24" text_color="#23292c" color_icon="#222222"]

	<p>HAPPY CLIENTS</p>
	[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="815"][cl_custom_heading typography="custom_font" text_font_size="24" text_color="#23292c" color_icon="#222222"]

	<p>HOURS SPENT</p>
	[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// CTA
$data = array();
$data['name'] = __( 'CTA', 'picante' );
$data['cat_display_name'] =  $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/27.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'110px','padding-bottom':'110px'}_-_json" background_image="{'id':'762','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2Fblock01-compressed-1.jpg'}_-_json" parallax="1" background_position="center center" text_color="light-text"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':''}_-_json"][cl_custom_heading typography="custom_font" text_font_size="48" text_font_weight="800" text_letterspace="5" color_icon="#222222" css_style="{'margin-bottom':'50px'}_-_json" text_line_height="59"]

	<p>COFFEE AND LOVE ARE THE BEST WHEN THEY ARE HOT</p>
	[/cl_custom_heading][cl_button overwrite_style="1" button_bg_color="rgba(188,139,95,0)" button_border_color="#ffffff" css_style="{'margin-top':'50px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Skills
$data = array();
$data['name'] = __( 'Skills', 'picante' );
$data['cat_display_name'] =  $cat_display_names['skills'];
$data['custom_class'] = 'skills';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/28.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_image="{'id':'763','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fcoffee%2Fwp-content%2Fuploads%2F2018%2F06%2Fblock02.png'}_-_json" css_style="{'padding-top':'110px','padding-bottom':'110px'}_-_json" background_size="auto" columns_gap="0" device_visibility="{'0':'hidden-xs','1':'hidden-sm'}_-_json" col_responsive="full"][cl_column][cl_row_inner][cl_column_inner width="1/2"][/cl_column_inner][cl_column_inner width="1/2"][cl_custom_heading typography="custom_font" text_font_family="BenchNine" text_font_size="48" text_font_weight="800" text_line_height="60" text_transform="none" text_color="#0b2b33" color_icon="#222222" text_letterspace="5"]

	<p><mark class="highlight">OUR</mark> SKILLS</p>
	[/cl_custom_heading][cl_text margin_paragraphs="11" text_font_size="16" text_line_height="24" text_color="#73848e" css_style="{'margin-top':'50px'}_-_json"]

	<p style="margin-top: 0px; margin-bottom: 0px;">A more comprehensive list of tasks to which web development commonly refers, may include web design, web content development, client liaison, client-side/server-side scripting.<br></p>

[/cl_text][cl_progress_bar title="<p>RESPONSIVE WEB DESIGN</p>" percentage="98" css_style="{'margin-top':'50px'}_-_json"][cl_progress_bar title="<p>IOS DEVELOPMENT</p>" percentage="51" css_style="{'margin-top':'30px'}_-_json"][cl_progress_bar title="<p>BRANDING</p>" percentage="74" css_style="{'margin-top':'30px'}_-_json"][cl_progress_bar title="<p>GRAPHIC DESIGN</p>" percentage="38" css_style="{'margin-top':'30px'}_-_json"][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Testimonial Block
$data = array();
$data['name'] = __( 'Testimonial and Offers Block', 'picante' );
$data['cat_display_name'] =  $cat_display_names['testimonial']. ', '.$cat_display_names['block'];
$data['custom_class'] = 'testimonial block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/29.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'0px','margin-top':'200px'}_-_json" text_color="light-text" background_image="{'id':'70','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fbgp.jpg'}_-_json" row_id="about"][cl_column horizontal_align="middle" css_style="{'padding-top':'px','margin-top':'-200px'}_-_json"][cl_media css_style="{'margin-top':'0px'}_-_json" image="{'id':'68','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fpiz.jpg'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'50px'}_-_json"]

WHAT PEOPLE SAY

[/cl_custom_heading][cl_media position="center" css_style="{'margin-top':'0px'}_-_json" image="{'id':'83','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2FRectangle-10.png'}_-_json"][cl_row_inner css_style="{'margin-top':'10px'}_-_json"][cl_column_inner width="1/2"][cl_testimonial style="simple_photo_circle" is_single="1" testimonial_id="81"][/cl_column_inner][cl_column_inner width="1/2"][cl_testimonial style="simple_photo_circle" is_single="1" testimonial_id="80"][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Menu
$data = array();
$data['name'] = __( 'Menu', 'picante' );
$data['cat_display_name'] =  $cat_display_names['menu']. ', '.$cat_display_names['block'];
$data['custom_class'] = 'menu block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/30.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" equal_height="1" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" device_visibility="{'0':'none_'}_-_json" row_id="menu"][cl_column width="1/2" device_visibility="{'0':'none_'}_-_json" background_image="{'id':'102','url':'https://codeless.co/picante/pizza/wp-content/uploads/2019/04/pl.jpg'}_-_json"][/cl_column][cl_column width="1/2" css_style="{'padding-top':'50px','padding-bottom':'80px','padding-right':'15%','padding-left':'60px'}_-_json" device_visibility="{'0':'none_'}_-_json" background_image="{'id':'','mime':'','url':''}_-_json" horizontal_align="middle"][cl_list][cl_custom_heading typography="h3" css_style="{'margin-top':'30px'}_-_json"]

	<p style="">OUR MENU</p>
	[/cl_custom_heading][cl_media position="center" image="{'id':'109','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2FRectangle-10-dark.png'}_-_json" css_style="{'margin-top':'0px'}_-_json"][cl_table_row title="ALL MEAT" subtitle="Classic pepperoni, ham, Italian sausage"][cl_table_row title="DELUXE" subtitle="Bacon, our original sauce and sausage " price="7.00"][cl_table_row title="GARDEN" subtitle="Bacon, our original sauce and signature" price="8.00"][cl_table_row title="PEPPERONI MAGNIFICO" subtitle="Classic pepperoni, ham, Italian bacon" price="14.00"][/cl_list][cl_button btn_title="<p>View ALL</p>
"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// CTA
$data = array();
$data['name'] = __( 'CTA', 'picante' );
$data['cat_display_name'] =  $cat_display_names['cta']. ', '.$cat_display_names['block'];
$data['custom_class'] = 'cta block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/31.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row text_color="light-text" background_image="{'id':'114','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fpizz-sec.jpg'}_-_json" overlay="color" overlay_color="#000000" overlay_opacity="0.15" css_style="{'padding-top':'75px','padding-bottom':'75px'}_-_json" parallax="1"][cl_column horizontal_align="middle"][cl_custom_heading typography="h1"]

	<p>GENUINE</p>
	[/cl_custom_heading][cl_media position="center" image="{'id':'116','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2FRectangle-10-white.png'}_-_json" css_style="{'margin-top':'0px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="24" text_font_weight="600" text_color="#ffffff"]

	<p>we deliver a traditional</p><p>superior-quality pizza.</p>
	[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="18" text_line_height="30"]

	<p>The secret to success is much like the secret to making a better pizza - the more you put</p><p>&nbsp;into it, the more you get out of it. Our pizza family is as hungry for perfection today as&nbsp;</p><p>we were when we first opened our doors more than 20 years ago. </p>

[/cl_text][cl_button overwrite_style="1" button_style="rounded" button_bg_color="#ab162c" button_border_color="" css_style="{'margin-top':'35px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Services
$data = array();
$data['name'] = __( 'Services', 'picante' );
$data['cat_display_name'] =  $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/32.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Services
$data = array();
$data['name'] = __( 'Services', 'picante' );
$data['cat_display_name'] =  $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/32.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'60px','padding-bottom':'60px'}_-_json" background_color="#faf9f7"][cl_column width="1/4"][cl_service media="type_custom" image="{'id':'130','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fps1.png'}_-_json" layout_type="media_top" layout_align="align_center" title="DAILY FRESH" box_border_color="rgba(0,0,0,0)" title_typography="h3"]<p>All meals are prepared using only the best ingredients and cooked when you order them.</p>
[/cl_service][/cl_column][cl_column width="1/4"][cl_service media="type_custom" image="{'id':'129','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fps2.png'}_-_json" layout_type="media_top" layout_align="align_center" title="BEST CHEFS" box_border_color="rgba(0,0,0,0)" title_typography="h3"]<p>Hand-crafted by our master chefs</p><p>to create something everyone will love for sure.</p>
[/cl_service][/cl_column][cl_column width="1/4"][cl_service media="type_custom" image="{'id':'128','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fps3.png'}_-_json" layout_type="media_top" layout_align="align_center" title="BEST CHEFS" box_border_color="rgba(0,0,0,0)" title_typography="h3"]<p>Hand-crafted by our master chefs</p><p>to create something everyone will love for sure.</p>
[/cl_service][/cl_column][cl_column width="1/4"][cl_service media="type_custom" image="{'id':'127','mime':'image%2Fpng','url':'https%3A%2F%2Fcodeless.co%2Fpicante%2Fpizza%2Fwp-content%2Fuploads%2F2019%2F04%2Fps4.png'}_-_json" layout_type="media_top" layout_align="align_center" title="ORDER ONLINE" box_border_color="rgba(0,0,0,0)" title_typography="h3"]<p>Web or App ordering made quick and easy. You can place your order online 24 hours a day!</p>
[/cl_service][/cl_column][/cl_row][cl_row row_type="container-fluid" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" row_id="location"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_map style="ultra_light_labels" api_key="AIzaSyDNS4R2BxpPspB31mZPnGvelSPSXvggI4I" lat_lon="40.727944, -74.078947"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Blog Featured
$data = array();
$data['name'] = __( 'Blog Featured', 'picante' );
$data['cat_display_name'] =  $cat_display_names['blog'];
$data['custom_class'] = 'blog';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/33.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'25px','padding-bottom':'0px'}_-_json" background_color="#23292c" text_color="light-text"][cl_column horizontal_align="middle" css_style="{'padding-bottom':'0px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Great Vibes" text_font_size="48" text_font_weight="400" text_line_height="60" text_transform="none" text_color="#ffffff" color_icon="#222222"]

Featured Posts

[/cl_custom_heading][cl_blog blog_style="fullimage_transparent" distance="0" carousel="1" categories="{'0':'3'}_-_json" css_style="{'margin-top':'30px'}_-_json" blog_animation="alpha-anim"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

}




?>