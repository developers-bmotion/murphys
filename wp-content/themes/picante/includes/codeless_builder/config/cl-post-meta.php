<?php

if( !class_exists( 'Cl_Post_Meta' ) ){

   class Cl_Post_Meta{
    
    
      public static $meta = array();
      public $post_meta = array();
      
      public static function map($meta){
         if( ! function_exists( 'codeless_get_meta' ) )
               return;

         if( ! codeless_get_meta( $meta['meta_key'] ) )
               $meta['value'] = isset( $meta['default'] ) ? $meta['default'] : '';
         else
               $meta['value'] = codeless_get_meta( $meta['meta_key'] );

         self::$meta[] = $meta;
      }

      
   }
}

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_options_title',
   'meta_key' => 'page_options_title',
   'control_type' => 'grouptitle',
   'label' => esc_attr__( 'Page Options', 'picante' ),
   'priority' => 1,
   'inline_control' => true,
   'id' => 'page_options_title',
   'transport' => 'auto', 
   'default' => 'default',
   
));


// ---------- Page Layout -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio', 'career'),
   'feature' => 'page_layout',
   'priority' => 2,
   'meta_key' => 'page_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Layout', 'picante' ),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'picante' ),
      'fullwidth' => esc_attr__( 'Fullwidth', 'picante' ),
      'left_sidebar' => esc_attr__( 'Left Sidebar', 'picante' ),
      'right_sidebar' => esc_attr__( 'Right Sidebar', 'picante' ),
      'dual' => esc_attr__( 'Dual', 'picante' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_layout',
   'transport' => 'auto', 
   'default' => 'default'
   
));

$sidebars = codeless_get_registered_sidebars(true);

Cl_Post_Meta::map(array(
   
   'post_type' => array('page'),
   'feature' => 'page_custom_sidebar',
   'priority' => 2,
   'meta_key' => 'page_custom_sidebar',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Custom Sidebar', 'picante' ),
   'choices'     => $sidebars,
   'tooltip' => esc_html__('This will overwrite all other options on sidebars.', 'picante'),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_custom_sidebar',
   'transport' => 'auto', 
   'default' => 'default'
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => array('page'),
   'feature' => 'sidebar_column_width',
   'priority' => 2,
   'meta_key' => 'sidebar_column_width',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Sidebar Width', 'picante' ),
   'choices'     => array(
      '3' => '1/4',
      '4' => '1/3'
   ),
   'tooltip' => esc_html__('Specify a different width size for sidebar on this page.', 'picante'),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'sidebar_column_width',
   'transport' => 'auto', 
   'default' => '4'
   
));


// ---------- Page Fullwidth Content -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'priority' => 2,
   'feature' => 'layout_modern',
   'meta_key' => 'layout_modern',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Layout Modern', 'picante' ),
   'tooltip' => esc_html__('Works only with layouts with sidebar. Adds a modern sidebar layout. Split the layout in two parts like in the example. Change color of sidebar part on Global Styling.', 'picante'),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'picante' ),
      '0' => esc_attr__( 'No', 'picante' ),
      '1' => esc_attr__( 'Yes', 'picante' )
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'layout_modern',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

// ---------- Page Fullwidth Content -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'priority' => 2,
   'feature' => 'page_fullwidth_content',
   'meta_key' => 'page_fullwidth_content',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Fullwidth Content', 'picante' ),
   'tooltip' => esc_attr__( 'Remove container from page and show page content from left of the screen to the right', 'picante' ),
   'choices'     => array(
      1  => esc_attr__( 'On', 'picante' ),
      0 => esc_attr__( 'Off', 'picante' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_fullwidth_content',
   'transport' => 'postMessage', 
   'default' => 0
   
));


// ---------- Page BG Color -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'portfolio', 'career'),
   'priority' => 3,
   'feature' => 'page_bg_color',
   'meta_key' => 'page_bg_color',
   'control_type' => 'kirki-color',
   'tooltip' => esc_attr__( 'Actual Page Content Background Color', 'picante' ),
   'label' => esc_attr__( 'Page Content BG Color', 'picante' ),
   'choices'     => array(
      'on'  => esc_attr__( 'On', 'picante' ),
      'off' => esc_attr__( 'Off', 'picante' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_bg_color',
   'transport' => 'postMessage'
   
));





// ---------- One Page -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'one_page',
   'priority' => 3,
   'meta_key' => 'one_page',
   'control_type' => 'kirki-select',
   'label' => esc_html__('Page as One Page', 'picante'),
   'tooltip' => esc_attr__( 'Make this page acts as a one page. Please add a custom id for each section and connect it with a menu item.', 'picante' ),
   'choices'     => array(
      1  => esc_attr__( 'On', 'picante' ),
      0 => esc_attr__( 'Off', 'picante' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'one_page',
   'transport' => 'auto', 
   'default' => 0
   
));




Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio', 'career'),
   'feature' => 'header_color',
   'priority' => 4,
   'meta_key' => 'header_color',
   'control_type' => 'kirki-select',
   'label' => esc_html__('Header Color', 'picante'),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'picante' ),
      'dark' => esc_attr__( 'Dark', 'picante' ),
      'light' => esc_attr__( 'Light', 'picante' ),
   ),
   'group_in' => 'general',
   'tooltip' => esc_attr__( 'General Header Color for this page. If you use Codeless Slider and Header Transparent (on top of page), for each slide, you can select custom header color on: slide Row -> Design -> Text Color', 'picante' ) ,
   'inline_control' => true,
   'id' => 'header_color',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

// ---------- Transparent Header -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio', 'career'),
   'feature' => 'transparent_header',
   'priority' => 4,
   'meta_key' => 'transparent_header',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Header Over Content (Transparent)', 'picante' ),
   'tooltip' => esc_attr__( 'Show Header above (over) of page content, you can make it transparent or add a small opacity', 'picante' ),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'picante' ),
      'transparent' => esc_attr__( 'Transparent Header', 'picante' ),
      'no_transparent' => esc_attr__( 'No Transparent', 'picante' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'transparent_header',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_background_image',
   'priority' => 4,
   'meta_key' => 'page_background_image',
   'control_type' => 'kirki-select',
   'label' => esc_html__('Use Featured Image as Page BG Image', 'picante'),
   'choices'     => array(
      'no'  => esc_attr__( 'No', 'picante' ),
      'yes' => esc_attr__( 'Yes', 'picante' )
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_background_image',
   'transport' => 'postMessage', 
   'default' => 'yes'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_show_footer',
   'priority' => 4,
   'meta_key' => 'page_show_footer',
   'control_type' => 'kirki-select',
   'label' => esc_html__('Show Footer on this page', 'picante'),
   'choices'     => array(
      'yes' => esc_attr__( 'Yes', 'picante' ),
      'no'  => esc_attr__( 'No', 'picante' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_show_footer',
   'transport' => 'postMessage', 
   'default' => 'yes'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_inner_content_padding_top',
   'meta_key' => 'page_inner_content_padding_top',
   'control_type' => 'kirki-slider',
 
   'label' => esc_attr__( 'Inner Content Padding Top', 'picante' ),
   'tooltip' => esc_html__('Leave empty to use the default Theme Option value on Customizer -> Layout. Value without PX, for ex: write "30"', 'picante'),
   'priority' => 4,
   'group_in' => 'general',
   'id' => 'page_inner_content_padding_top',
   'transport' => 'postMessage', 
   'default' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_inner_content_padding_bottom',
   'meta_key' => 'page_inner_content_padding_bottom',
   'control_type' => 'kirki-slider',

   'label' => esc_attr__( 'Inner Content Padding Bottom', 'picante' ),
   'tooltip' => esc_html__('Leave empty to use the default Theme Option value on Customizer -> Layout. Value without PX, for ex: write "30"', 'picante'),
   'priority' => 4,
   'group_in' => 'general',
   'id' => 'page_inner_content_padding_bottom',
   'transport' => 'postMessage', 
   'default' => '',
   
));


// --------- Header Color --------------------



// --------------------- Other Page dividers --------------------------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'other_page_options_divider',
   'meta_key' => 'other_page_options_divider',
   'control_type' => 'groupdivider',
   'label' => '',
   'priority' => 8,
   'inline_control' => true,
   'id' => 'other_page_options_divider',
   'transport' => 'auto', 
   'default' => 'default'
   
));

Cl_Post_Meta::map(array(
   'priority' => 9,
   'post_type' => 'page',
   'feature' => 'other_page_options_title',
   'meta_key' => 'other_page_options_title',
   'control_type' => 'grouptitle',
   'label' => esc_attr__( 'WP Default', 'picante' ),
   'inline_control' => true,
   'id' => 'other_page_options_title',
   'transport' => 'auto', 
   'default' => 'default'
   
));



// Post


Cl_Post_Meta::map(array(
   
   'post_type' => 'post',
   'feature' => 'post_masonry_layout',
   'meta_key' => 'post_masonry_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Masonry Layout', 'picante' ),
   'tooltip' => esc_attr__( 'Used only with a blog masonry layout.', 'picante' ),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'picante' ),
      'wide' => esc_attr__( 'Wide', 'picante' )
   ),
   'group_in' => 'post_data',
   'inline_control' => true,
   'id' => 'post_masonry_layout',
   'transport' => 'auto', 
   'default' => 'default',
   /*'cl_required'    => array(
         'setting'  => 'blog_style',
         'operator' => '==',
         'value'    => 'masonry',
   ),*/
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'post',
   'feature' => 'post_style',
   'meta_key' => 'post_style',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Post Style', 'picante' ),
   'choices'     => array(
      'classic'  => esc_attr__( 'Classic', 'picante' ),
      'custom'  => esc_attr__( 'Custom', 'picante' )
   ),
   'group_in' => 'post_data',
   'inline_control' => true,
   'id' => 'post_style',
   'transport' => 'refresh', 
   'default' => 'default',
   'priority' => 1,
));


// Single Portfolio


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_item_format',
   'meta_key' => 'portfolio_item_format',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Portfolio Item Format', 'picante' ),
   'priority' => 1,
   'choices'     => array(
      'thumbnail'  => esc_attr__( 'Thumbnail', 'picante' ),
      'slider' => esc_attr__( 'Slider', 'picante' ),
      'Video' => esc_attr__( 'Video', 'picante' ),
   ),
   'group_in' => 'portfolio_data',
   'inline_control' => true,
   'id' => 'portfolio_item_format',
   'transport' => 'auto', 
   'default' => 'thumbnail',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_masonry_layout',
   'meta_key' => 'portfolio_masonry_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Masonry Layout', 'picante' ),
   'priority' => 1,
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'picante' ),
      'large' => esc_attr__( 'Large', 'picante' ),
      'wide'  => esc_attr__( 'Wide', 'picante' ),
      'long' => esc_attr__( 'Long', 'picante' ),
   ),
   'group_in' => 'portfolio_data',
   'inline_control' => true,
   'id' => 'portfolio_masonry_layout',
   'transport' => 'auto', 
   'default' => 'default',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_custom_link',
   'meta_key' => 'portfolio_custom_link',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Custom Link', 'picante' ),
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_custom_link',
   'transport' => 'postMessage', 
   'default' => '',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_price_currency',
   'meta_key' => 'portfolio_price_currency',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Price Currency', 'picante' ),
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_price_currency',
   'transport' => 'postMessage', 
   'default' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_price_number',
   'meta_key' => 'portfolio_price_number',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Price Number', 'picante' ),
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_price_number',
   'transport' => 'postMessage', 
   'default' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_price_decimal',
   'meta_key' => 'portfolio_price_decimal',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Price Decimal', 'picante' ),
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_price_decimal',
   'transport' => 'postMessage', 
   'default' => '',
   
));



// Single Staff


Cl_Post_Meta::map(array(
   
   'post_type' => array('staff', 'testimonial'),
   'feature' => 'staff_position',
   'meta_key' => 'staff_position',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Position', 'picante' ) ,
   'priority' => 1,
   'group_in' => 'staff_data',
   'id' => 'staff_position',
   'transport' => 'postMessage',  
   'default' => esc_html__('Developer', 'picante'),
   
));





$socials = codeless_get_team_social_list();
if( ! empty($socials) ):

   foreach($socials as $social):

      Cl_Post_Meta::map(array(
         
         'post_type' => 'staff',
         'feature' => $social['id'].'_link',
         'meta_key' => $social['id'].'_link',
         'control_type' => 'text',
         'label' => ucfirst($social['id']),
         'priority' => 1,
         'group_in' => 'staff_social',
         'dynamic' => true,
         'id' => $social['id'].'_link',
         'transport' => 'auto', 
         'default' => '',
         
      ));

   endforeach;

endif;



/* Product */

Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'product_style',
   'meta_key' => 'product_style',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Product Single Style', 'picante' ),
   'priority' => 1,
   'choices'     => array(
      'none' => esc_attr__( 'Global Default (from Theme Options)', 'picante' ),
      'default'  => esc_attr__( 'Default', 'picante' ),
   ),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'product_style',
   'transport' => 'auto', 
   'default' => 'none',
   
));



Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'product_builder_content',
   'meta_key' => 'product_builder_content',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Product Builder Content', 'picante' ),
   'priority' => 1,
   'choices'  =>   codeless_get_pages(),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'product_builder_content',
   'transport' => 'auto', 
   'default' => 'none',
   
));



Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'with_two_img',
   'meta_key' => 'with_two_img',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Show another image on hover', 'picante' ),
   'priority' => 1,
   'choices'     => array(
      0  => esc_attr__( 'Off', 'picante' ),
      1 => esc_attr__( 'On', 'picante' )
   ),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'with_two_img',
   'transport' => 'auto', 
   'default' => 0,
   
));



?>