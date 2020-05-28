<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl-element cl_table_row <?php echo esc_attr( $this->generateClasses('.cl_table_row') ) ?>"> 
	<h4 class="title"><?php echo cl_remove_wpautop($title) ?></h4>
	<div class="desc" >
		<span class="subtitle"><span <?php $this->generateStyle('.cl_table_row .subtitle span', '', true); ?>><?php echo cl_remove_wpautop($subtitle) ?></span></span>
		<span class="dots"> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</span>
		<span class="price"><span class="" <?php $this->generateStyle('.cl_table_row .price span', '', true); ?>><?php echo cl_remove_wpautop($price) ?></span></span>
	</div>
</div><!-- .cl_list_item -->