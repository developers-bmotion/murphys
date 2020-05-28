<?php


/**
 * Get portfolio page layout that you have selected on Page Meta
 *
 * @since 1.0.0
 */
function codeless_portfolio_layout(){
    return apply_filters( 'codeless_portfolio_layout', codeless_get_from_element( 'portfolio_layout', 'grid' ), codeless_get_post_id() );
}


/**
 * Get portfolio page style that you have selected on Page Meta
 *
 * @since 1.0.0
 */
function codeless_portfolio_style(){
    return apply_filters( 'codeless_portfolio_style', codeless_get_from_element( 'portfolio_style', 'only_media' ), codeless_get_post_id() );
}


/**
 * Get single portfolio item format
 * Thumbnail, Video or Slider
 *
 * @since 1.0.0
 */
function codeless_portfolio_item_format(){
    return apply_filters( 'codeless_portfolio_item_format', codeless_get_meta( 'portfolio_item_format', 'thumbnail' ), get_the_ID() );
}


/**
 * Used only for portfolio pagination
 * Use conditionals to get the style of pagination
 * 
 * @since 1.0.0
 */
function codeless_portfolio_pagination( $query = false ){
    
    if( !$query ){
        global $wp_query;
        $query = $wp_query;
    }
    

    $pages = $query->max_num_pages;
    if ( ! $pages) {
        $pages = 1;
    }

    if ( 1 == $pages )
        return false;

    echo '<div class="cl-portfolio-pagination" data-container-id="portfolio-entries">';
    
    $pagination_style = codeless_get_from_element( 'portfolio_pagination_style', 'numbers' );

    if ( $pagination_style == 'infinite_scroll' ) {
        echo codeless_infinite_scroll('', $query);
    } elseif ( $pagination_style == 'next_prev' ) {
        echo codeless_nextprev_pagination('', 4, $query);
    } elseif ( $pagination_style == 'load_more' ){
        echo codeless_infinite_scroll('loadmore', $query);
    }else {
        codeless_number_pagination( $query );
    }
    
    echo '</div>';
}


/**
 * Check if a custom link is set for portfolio item
 * return permalink if not
 * 
 * @since 1.0.0
 * @version 1.0.5
 */
function codeless_portfolio_item_permalink(){

    $custom_link = codeless_get_meta( 'portfolio_custom_link', false, get_the_ID() );
    
    if( $custom_link !== false && ! empty( $custom_link ) )
        return $custom_link;
    else
        return get_permalink();
}


/**
 * Portfolio Link Target
 * return permalink if not
 * 
 * @since 1.0.0
 */
function codeless_portfolio_item_permalink_target(){
    return codeless_get_mod( 'portfolio_custom_link_target', '_blank' );
}


/**
 * Generate Overlay Icon for portfolio
 * 
 * @since 1.0.0
 */
function codeless_portfolio_overlay_icon( $custom = '' ){
    return 'cl-icon-' . apply_filters( 'codeless_portfolio_overlay_icon', $custom );
}


/**
 * Generate Overlay for portfolio entries
 * 
 * @since 1.0.0
 */
function codeless_portfolio_overlay(){

    get_template_part( 'template-parts/portfolio/parts/overlay_style', codeless_portfolio_style() );

}




/**
 * Generate Single Portfolio Navigations
 * 
 * @since 1.0.0
 */
function codeless_single_portfolio_navigation(){
    if( ! is_singular( 'portfolio' ) )
        return;

    if( codeless_get_mod('single_portfolio_navigation') == '1' && ( is_object( get_previous_post() ) || is_object( get_next_post() ) ) ): ?>
            <div class="portfolio_navigation"> 

                        <?php if( is_object( get_previous_post() ) ): ?>

                            <a class="cl-icon-arrow-left portfolio_single_left" href="<?php echo esc_url( get_permalink(get_previous_post()->ID) ); ?>">
                                
                                <span><?php esc_html_e('Prev', 'picante' ) ?></span>

                            </a> 
                            

                        <?php endif; ?>    

                        <?php if( is_object( get_next_post() ) ): ?>

                            <a class="cl-icon-arrow-right portfolio_single_right" href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>">
                                
                                 <span><?php esc_html_e('Next', 'picante' ) ?></span>

                            </a> 
                           

                        <?php endif; ?>   

            </div><!-- .portfolio_navigation -->    
    <?php endif;
}

?>