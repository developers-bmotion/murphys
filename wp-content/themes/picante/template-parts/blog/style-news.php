<?php
/**
 * Template part for displaying posts
 * News Style
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package picante
 * @subpackage Templates
 * @since 1.0.0
 *
 */

codeless_hook_news_grid_item_before();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
	
	<div class="grid-holder">

        <div class="grid-holder-inner">
	 
        	<?php 
        	
        	$post_format = get_post_format() || '';
        	
        	/**
        	 * Generate Post Thumbnail for Single Post and Blog Page
        	 */ 
        		
        	?>

            <div class="entry-media">
                <div class="overlay"></div>
                <div class="post-thumbnail">
    
                    <?php the_post_thumbnail( codeless_get_post_thumbnail_size() ); ?>

                </div><!-- .post-thumbnail --> 

            </div><!-- .entry-media -->

            <div class="content">

                <header class="entry-header">
                    
                    <span class="categories"><?php echo codeless_get_entry_meta_categories() ?></span>

                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

                    <span class="info"><?php echo codeless_get_entry_meta_date() ?>, <?php esc_html_e( 'by', 'picante' ) ?> <?php echo codeless_get_entry_meta_author() ?></span>

                </header><!-- .entry-header -->

                
            

            </div><!-- .content -->

            <a href="<?php echo esc_url( get_permalink() ) ?>" class="entry-link"></a>

        </div><!-- .grid-holder-inner -->

    </div><!-- .grid-holder -->
    
</article><!-- #post-## -->

<?php codeless_hook_news_grid_item_after() ?>