<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( ! isset( $col_id ) || empty( $col_id ) )
    $col_id = 'cl_column_inner_' . str_replace( ".", '-', uniqid("", true) );

$width = cl_translateColumnWidthToSpan($width);

$css_classes = array(
    'cl_column_inner',
    $width
);

global $cl_from_element;

if( isset($cl_from_element['cl_row_multiscroll']) &&  $cl_from_element['cl_row_multiscroll'] ){

	echo '<div class="ms-element">';
    echo cl_remove_wpautop($content);
    echo '</div>';

    return;
}

if( $css_style_991_colinner_bool ){
    $this->addCustomCss( '@media (max-width:991px){ #'.$col_id.' > .wrapper{ ' . $this->generateCSSBox( $css_style_991 ) . ' } }' );
}

if( $css_style_767_colinner_bool ){
    $this->addCustomCss( '@media (max-width:767px){ #'.$col_id.' > .wrapper{ ' . $this->generateCSSBox( $css_style_767 ) . ' } }' );
}

?>

<div id="<?php echo esc_attr( $col_id ) ?>" class="cl-element <?php echo implode(' ', $css_classes) ?> <?php echo esc_attr( $this->generateClasses('.cl_column_inner') ) ?>" <?php $this->generateStyle('.cl_column_inner', '', true )?>>
	<div class="wrapper <?php echo esc_attr( $this->generateClasses('.cl_column_inner > .wrapper') ) ?>" <?php $this->generateStyle('.cl_column_inner > .wrapper', '', true) ?>>

		<div class="bg-layer <?php echo esc_attr( $this->generateClasses('.cl_column_inner > .wrapper > .bg-layer') ) ?>" <?php $this->generateStyle('.cl_column_inner > .wrapper > .bg-layer', '', true) ?>></div>

        <div class="overlay <?php echo esc_attr( $this->generateClasses('.cl_column_inner > .wrapper > .overlay') ) ?>" <?php $this->generateStyle('.cl_column_inner > .wrapper > .overlay', '', true) ?>></div>
		<div class="col-content">
			<?php echo cl_remove_wpautop($content); ?>
		</div>
	</div>
</div>