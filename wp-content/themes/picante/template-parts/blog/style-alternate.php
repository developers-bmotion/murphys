<?php
/**
 * Template part for displaying posts
 * Alternate Style (Image on one side, content in other side)
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
	
	
	<?php 
	
	$post_format = get_post_format() || '';
	
	/**
	 * Generate Post Thumbnail for Single Post and Blog Page
	 */ 
	
	if ( $post_format != 'gallery' ) {
		
		get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' );
	
	} ?>
	
	
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
	
	<?php
		
		/**
		 * Add entry-wrapper
		 * Used only on blog page
		 */ 
		if( ! codeless_is_single_post() ): ?>
		<div class="entry-wrapper-content">
		<?php endif; ?>
		    
    		<?php 
    		/**
    		 * Entry Header
    		 * Output Entry Meta and title
    		 */ 
    		?>
    		<header class="entry-header">
				
				<?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>
				
				<?php
					if ( codeless_is_single_post() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif( get_post_format() != 'quote' ) {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>
			</header><!-- .entry-header -->
    		    
			<?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>
			<?php get_template_part( 'template-parts/blog/parts/entry', 'readmore' ); ?>
			
		<?php
		/**
		 * Close Entry Wrapper
		 */ 
		if ( ! codeless_is_single_post() ) : ?>
		</div><!-- .entry-wrapper-content -->
		<?php endif; ?>
		
	</div><!-- .entry-wrapper -->
	
</article><!-- #post-## -->
