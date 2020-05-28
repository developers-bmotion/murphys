<?php
/**
 * Template part for displaying team items
 * Photo Style
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

	<div class="team-media-wrapper">
		
		<div class="team-thumbnail">
			
			<?php the_post_thumbnail( codeless_get_team_thumbnail_size() ); ?>

		</div><!-- .team-thumbnail -->
		<div class="team-overlay">
			<div class="team-overlay-wrapper">
				
				<div class="team-content">
					<div class="team-title">
						<h3 class="team-name  <?php echo esc_attr( codeless_get_mod( 'team_title_typography', 'h4' ) ) ?> custom_font"><?php echo get_the_title() ?></h3>
						<span class="team-position"><?php echo codeless_get_meta('staff_position', 'Team Position', get_the_ID()); ?></span>
					</div>
					
					
				</div><!-- team-content -->
				<div class="icons-wrapper">
                    	<?php  
				            
				            $link = get_permalink();
				            $lightbox_link = get_the_post_thumbnail_url();

				        ?>
                        <a class="entry-link with_anim" href="<?php echo esc_url($link) ?>" title="<?php esc_attr( the_title() ) ?>" data-delay="200"></a>
                        <a class="entry-link lightbox with_anim" href="<?php echo esc_url($lightbox_link) ?>" title="<?php esc_attr( the_title() ) ?>" data-delay="300"></a>
                    </div><!-- .icons-wrapper -->
			</div>
		</div>
	</div><!-- .team-overlay -->
	<?php codeless_hook_custom_post_end( 'staff', get_the_ID() ); ?>
</div>