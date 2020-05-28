<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( !class_exists('WooCommerce') )
	return;

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
wp_reset_postdata();

// Element ID
$element_id = uniqid();

// Set Query

// Set some global vars for use with codeless_get_from_element or directly from cl_get_option
global $cl_from_element;
$cl_from_element['shop_columns'] = $columns;
$cl_from_element['shop_item_distance'] = $distance;
$cl_from_element['shop_animation'] = $animation;
$cl_from_element['shop_item_heading'] = $product_title;
$cl_from_element['shop_pagination_style'] = $pagination_style;
$cl_from_element['shop_carousel'] = $carousel;
$cl_from_element['shop_carousel_nav'] = $carousel_nav;
$cl_from_element['shop_carousel_dots'] = $carousel_dots;
$cl_from_element['shop_filters'] = $filters;
$cl_from_element['shop_product_style'] = $product_style;
$cl_from_element['shop_selected_category'] = $category;
$cl_from_element['shop_shortcode'] = $shortcode;
/* Add Custom Styles */
wp_enqueue_style('codeless-woocommerce', CODELESS_BASE_URL.'css/codeless-woocommerce.css' );


if( $carousel ){
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );
}
                     

// Start displaying WooCommerce Element                            
?>
<div id="<?php echo esc_attr( $element_id ) ?>" class="cl_woocommerce <?php echo esc_attr( $this->generateClasses('.cl_woocommerce') ) ?> cl-element" <?php $this->generateStyle('.cl_woocommerce', '', true) ?> >
	
	<?php 
	$extra = '';
	if( $category != 'all' )
		 $extra = 'category="'.$category.'"';

	?>



	<?php 

		// Load Filters if needed
		if( $filters != 'disabled' )
			get_template_part( 'woocommerce/filters' );

		if( $shortcode != 'archive' )
			echo do_shortcode( '['.$shortcode.' per_page="'.$per_page.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'" '.$extra.']' );
		
		else{

			$args['per_page'] = (int) $per_page;
			$args['orderby'] = $orderby;
			$args['order'] = $order;
			if( $category != 'all' )
				$args['category'] = $category;

			// Build a new query
		
			
			

			codeless_set_woocommerce_query($args);
			codeless_execute_query();
			?>

			<div class="woocommerce">


				<?php codeless_woocommerce_content(); ?>
			</div><!-- .woocommerce -->

			<?php

			wp_reset_postdata();
		}


		if( $product_style == 'small' && (int) $small_list && function_exists('wc_get_page_id') ){
			echo '<div><a class="show-all" href="'.esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ).'"> '.esc_html__( 'See All', 'picante' ).'</a></div>';
		}
	?>
	

</div><!-- .cl_woocommerce -->




