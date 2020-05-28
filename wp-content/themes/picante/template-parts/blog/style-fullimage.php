<?php
/**
 * Template part for displaying posts
 * Fullimage Style
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

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>

	<div class="entry-media-wrapper">
		<?php 
		
		$post_format = get_post_format() || '';
		
		/**
		 * Generate Post Thumbnail for Single Post and Blog Page
		 */ 
		
		if (  $post_format != 'gallery' && ( ! is_single() || ( is_single() && codeless_get_post_style() == 'classic' ) ) ) :
			
			get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' );
		
		endif; ?>
		
		
		<?php
		
		/**
		 * Generate Slider if needed
		 */ 
		if ( get_post_format() == 'gallery' && get_post_gallery() ):
		
			get_template_part( 'template-parts/blog/parts/entry', 'slider' );
		
		endif; ?>
		
		<?php
		
		/**
		 * Generate Video Output
		 */ 
		if ( get_post_format() == 'video' ):
		
			get_template_part( 'template-parts/blog/parts/entry', 'video' );
		
		endif; ?>
		
		<?php
		
		/**
		 * Generate Audio Output
		 */ 
		if ( get_post_format() == 'audio' ):
		
			get_template_part( 'template-parts/blog/parts/entry', 'audio' );
		
		endif; ?>


		<div class="entry-wrapper">
	

			<div class="entry-wrapper-content">
		
				<header class="entry-header">
						
					<div class="entry-meta-tools">
										
						<?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>

						<?php 

						$entry_tools = codeless_get_post_entry_tools();
							
						if( ! empty( $entry_tools ) ): ?>
							
							<?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
								
						<?php endif; ?>

					</div><!-- .entry-meta-tools -->
						
					<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				</header><!-- .entry-header -->
					
				<?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>

			</div><!-- .entry-wrapper-content -->

			
		
		</div><!-- .entry-wrapper -->


	</div><!-- .entry-media-wrapper -->

</article><!-- #post-## -->
