<?php
/**
 * Template part for displaying posts
 * Grid Style
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

            if( ! codeless_is_single_post() || ( codeless_is_single_post() && get_post_type() == 'post' ) || ( codeless_is_single_post() && ! class_exists( 'Cl_Builder_Manager' ) ) ): 

                /**
                 * Entry Header
                 * Output Entry Meta and title
                 */ 
                ?>
                <header class="entry-header">
                    
                    <div class="entry-meta-tools">
                        

                        <?php

                        // Categories Listing
                        if( codeless_get_mod( 'blog_entry_meta_categories', true ) ){
                            echo codeless_get_entry_meta_categories();
                        }

                        ?>

                        

                        

                    </div><!-- .entry-meta -->
                    
                    <?php
                        if ( codeless_is_single_post() ) {
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        } elseif( get_post_format() != 'quote' ) {
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        }
                        ?>

                        
                        <?php get_template_part( 'template-parts/blog/parts/entry', 'meta' );
                    
                    ?>
                </header><!-- .entry-header -->


                <div class="entry-media-wrapper">
                    <?php 
                    
                    $post_format = get_post_format() || '';
                    
                    /**
                     * Generate Post Thumbnail for Single Post and Blog Page
                     */ 
                    
                    if ( has_post_thumbnail() && $post_format != 'gallery' && ( ! is_single() || ( is_single() && codeless_get_post_style() == 'classic' ) ) ) :
                        
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


                </div><!-- .entry-media-wrapper -->


            <?php endif; ?>
                
            <?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>

            <?php if( ! is_single() ): ?>
                <?php get_template_part( 'template-parts/blog/parts/entry', 'readmore' ); ?>
            <?php endif; ?>

                
        

            <?php 
                        /*
                         * Output Entry Tools
                         * Only on Blog Page, not single post
                         */ 

                $entry_tools = codeless_get_post_entry_tools();
                            
                if( ! empty( $entry_tools ) ): ?>
                            
                    <?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
                                
                <?php endif; 

            ?>

        <?php
        /**
         * Close Entry Wrapper
         */ 
        if ( ! codeless_is_single_post() ) : ?>
            </div><!-- .entry-wrapper-content -->
        <?php endif; ?>
        



    </div><!-- .entry-wrapper -->




    
    <?php if ( codeless_is_single_post() ) : ?>

    <?php endif; ?>
    
</article><!-- #post-## -->
