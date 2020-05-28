<?php
/**
 * Template part for displaying team
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

<div class="team-item <?php echo codeless_extra_classes( 'team_item' ) ?>" id="cl_team_item-<?php echo get_the_ID() ?>" <?php echo codeless_extra_attr( 'team_item' ) ?>>

	<div class="img-title">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
		<div class="title">
			<h4><?php echo get_the_title() ?></h4>
			<span class="position"><?php echo codeless_get_meta('staff_position', 'Position', get_the_ID()); ?></span>
		</div>
	</div>

	<div class="content"><?php

	    echo get_the_content();

	?></div>
</div>