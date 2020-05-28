<?php
/**
 * Template part for displaying testimonial
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package picante
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>
<span class="testimonial-icon"></span>
<div class="content">"<?php

    echo wp_strip_all_tags( get_the_content() );

?>"</div>
            
<div class="title">
	<span class="name"><?php echo get_the_title() ?></span>
	<span class="position"><?php echo codeless_get_meta('staff_position', 'Team Position', get_the_ID()); ?></span>
</div>