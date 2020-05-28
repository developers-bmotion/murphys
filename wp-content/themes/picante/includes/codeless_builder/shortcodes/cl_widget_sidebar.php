<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_reset_postdata();

?>

<aside class="cl_widget_sidebar style-<?php echo esc_attr( $sidebar ); ?> <?php echo esc_attr( $this->generateClasses('.cl_widget_sidebar') ) ?>" <?php $this->generateStyle('.cl_widget_sidebar', true) ?>>
	<?php dynamic_sidebar( $sidebar ); ?>
</aside>