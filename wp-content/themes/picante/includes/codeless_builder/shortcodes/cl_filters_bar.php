<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

global $cl_from_element;
$cl_from_element['blog_with_filters'] = 'filter-id-'.str_replace( ".", '-', uniqid("", true) );
$cl_from_element

?>

<div id="<?php echo esc_attr( $cl_from_element['blog_with_filters'] ) ?>">

	<?php

	get_template_part( 'template-parts/blog/parts/filters' );

	?>

</div>