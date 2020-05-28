<?php
/**
 * Template part for displaying posts
 * Minimal Style
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
    	
    	if ( has_post_thumbnail() && $post_format != 'gallery' ) :
    		
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

	</div><!-- Entry Media Wrapper -->
	
	<div class="entry-wrapper">

		<?php
		
		/**
		 * Add entry-wrapper
		 * Used only on blog page
		 */ 
		if( ! is_single() ): ?>
		<div class="entry-wrapper-content">
		<?php endif; ?>
			
			<?php	
			/**
			 * Entry Header
			 * Output Entry Meta and title
			 */ 
			?>
			<header class="entry-header">
                

                
				<?php

					the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
					
				?>
				
				<span class="date"><?php echo get_the_date() ?></span>
				
			</header><!-- .entry-header -->
				
		<?php
		/**
		 * Close Entry Wrapper
		 */ 
		if ( ! is_single() ) : ?>
			</div><!-- .entry-wrapper-content -->
		<?php endif; ?>
		
	
	</div><!-- .entry-wrapper -->

</article><!-- #post-## -->
