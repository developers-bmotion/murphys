<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage picante
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <section id="site_content" class="<?php echo esc_attr( codeless_extra_classes( 'site_content' ) ) ?>" <?php echo codeless_extra_attr( 'site_content' ) ?>>

        <?php codeless_hook_content_before(); ?>

        <div id="content" class="<?php echo esc_attr( codeless_extra_classes( 'content' ) ) ?>" <?php echo codeless_extra_attr( 'content' ) ?> >

            <?php codeless_hook_content_begin(); ?>
            
            <div class="inner-content <?php echo esc_attr( codeless_extra_classes( 'inner_content' ) ) ?>">
                
                <div class="inner-content-row <?php echo esc_attr( codeless_extra_classes( 'inner_content_row' ) ) ?>">
                    
                    <?php codeless_hook_content_column_before() ?>
                    
                    <div class="content-col <?php echo esc_attr( codeless_extra_classes( 'content_col' ) ) ?>">
                        
                        <?php codeless_hook_content_column_begin() ?>

                        <h1 class="page-title"><?php esc_html_e( 'Search Results', 'picante' ); ?></h1>

                        <?php
                        global $wp_query;
                        // Display posts
                        if ( have_posts() ) :
                              
                        ?>
                            <div id="blog-entries" class="blog-entries <?php echo esc_attr( codeless_extra_classes( 'blog_entries' ) ) ?>" <?php echo codeless_extra_attr( 'blog_entries' ) ?>>
            
                                <?php
                                
                                // Loop counter
                                $i = 0;
                                codeless_loop_counter($i);
                                
                                // Start loop
                                while ( have_posts() ) : the_post();
                                    codeless_loop_counter(++$i);
                                    
                                    /*
                                    * Get Blog Template Style
                                    * Codeless_blog_style returns the style selected
                                    * from Theme Options or a custom filter
                                    */
                                    get_template_part( 'template-parts/blog/style', codeless_blog_style() );
            
                                // End loop
                                endwhile; ?>
            
                            </div><!-- #blog-entries -->
            
                            <?php
                            // Display post pagination (next/prev - 1,2,3,4..)
                            codeless_blog_pagination() ; ?>
            
                        <?php
            
                        else : ?>
            
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'picante' ); ?></p>

                            <?php get_search_form(); ?>

                            <div class="search__related">

                                <?php if( is_active_sidebar( 'search-dynamic' ) ): ?>
                                <div class="search__col">
                                    <?php dynamic_sidebar( 'search-dynamic' ); ?>
                                </div>
                                <?php endif; ?>

                                <div class="search__col">
                                    <h3><?php esc_html_e('May We Suggest?', 'picante' ) ?></h3>
                                    <p><?php echo codeless_all_tags_html() ?></p>
                                </div>
                                
                            </div>
            
                        <?php endif; ?>
                        
                    </div><!-- .content-col -->
                    
                    <?php codeless_hook_content_column_after() ?>
                    
                </div><!-- .row -->
                
            </div><!-- .inner-content -->
            
            <?php codeless_hook_content_end(); ?>
            
        </div><!-- #content -->

        <?php codeless_hook_content_after(); ?>

    </div><!-- #site-content -->
    
<?php get_footer(); ?>