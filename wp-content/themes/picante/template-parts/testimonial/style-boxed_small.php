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

<div class="content">"<?php

    echo wp_strip_all_tags( get_the_content() );

?>"</div>
            
<div class="title">
   
    <?php the_post_thumbnail( 'thumbnail' ); ?>
    
- <?php echo get_the_title() ?>   
</div>