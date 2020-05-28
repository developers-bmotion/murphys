<?php
/**
 * Template part for displaying page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package picante
 * @subpackage Templates
 * @since 1.0.0
 *
 */

$content 	= get_the_content();



$content    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_content' , $content ));

$page_header = codeless_extract_page_header($content);
$content    = str_replace($page_header, '', $content );

echo apply_filters('the_content', $content ); 

?>
