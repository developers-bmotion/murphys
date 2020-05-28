<?php
global $woocommerce_loop;

add_action( 'init', 'codeless_woocommerce_element', 9999 );

/* Remove Page Title */
add_filter( 'woocommerce_show_page_title', function(){  return is_product_category(); } );

/* Change Position of Page Content (from Builder) */
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
add_action( 'codeless_hook_content_begin', 'codeless_woocommerce_product_archive_description' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',                 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',     10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );

add_filter( 'loop_shop_columns', 'codeless_woocommerce_loop_shop_columns' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_false');
add_filter( 'woocommerce_product_description_heading', '__return_false');

// Shop Products: Extra Classes
add_filter( 'codeless_extra_classes_shop_products', 'codeless_extra_classes_shop_products' );
// Shop Products: Extra Attributes
add_filter( 'codeless_extra_attr_shop_products', 'codeless_extra_attr_shop_products' );

// Product Item: Extra Classes
add_filter( 'codeless_extra_classes_product_item', 'codeless_extra_classes_product_item' );
// Product Item: Extra Attributes
add_filter( 'codeless_extra_attr_product_item', 'codeless_extra_attr_product_item' );


// Product Item: Extra Classes
add_filter( 'codeless_extra_classes_product_cat', 'codeless_extra_classes_product_cat' );
// Product Item: Extra Attributes
add_filter( 'codeless_extra_attr_product_cat', 'codeless_extra_attr_product_cat' );

add_action( 'woocommerce_before_shop_loop_item', 'codeless_woocommerce_before_shop_loop_item', 1 );
add_action( 'woocommerce_after_shop_loop_item', 'codeless_woocommerce_after_shop_loop_item', 9999 );


add_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_before', 25 );
add_action( 'woocommerce_before_shop_loop', 'codeless_woo_inpage_filter_button', 39 );
add_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_after', 40 );
add_action( 'woocommerce_before_shop_loop', 'codeless_woo_inpage_filters', 41 );



add_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_item_counter' );
add_action( 'woocommerce_before_shop_loop_item', 'codeless_woocommerce_item_counter_plus' );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'codeless_woocommerce_template_loop_product_title' );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );  
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close' );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );


add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );

add_action( 'woocommerce_after_shop_loop_item_title', 'codeless_woo_switch_price_and_rating', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 15 ); 
//add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 20 );  

add_action( 'woocommerce_after_shop_loop_item_title', 'codeless_woo_switch_price_and_rating_close', 25 );



remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );

add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_thumb_wrapper', 5 );

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 6 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 7 );


add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_thumb_wrapper_actions', 8 );


add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_loop_product_thumbnail', 10 );


add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_add_second_image', 11 );

add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_thumb_wrapper_end', 999 );


remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

add_action( 'codeless_hook_content_begin', 'codeless_woo_add_top_content', 11 );
add_action( 'codeless_hook_content_end', 'codeless_woo_add_footer_content', 11 );
add_action( 'woocommerce_after_single_product_summary', 'codeless_woo_add_product_content', 2 );


add_filter( 'loop_shop_per_page', function(){ 
    if( is_product_category() ) 
        return codeless_get_mod( 'shop_item_per_category', 8 );  

    return codeless_get_mod( 'shop_item_per_page', 8 ); 

}, 20 );


function codeless_woocommerce_loop_product_thumbnail(){
    global $woocommerce_loop;

    echo woocommerce_get_product_thumbnail(); 
}


function codeless_get_product_item_style(){
    global $woocommerce_loop;

    $style = codeless_get_mod( 'shop_product_style', 'normal' );

    if( is_product_category() )
        $style = codeless_get_mod( 'shop_category_style', 'normal' );

    if( isset( $woocommerce_loop['name'] ) && $woocommerce_loop['name'] == 'related' )
        $style = codeless_get_mod( 'shop_related_style', 'normal' );

    if( isset( $woocommerce_loop['name'] ) && $woocommerce_loop['name'] == 'cross-sells' )
        $style = codeless_get_mod( 'shop_related_style', 'normal' );

    return $style;
}



// function that generate woocommerce plugin content
function codeless_woocommerce_content(){
    woocommerce_content();
}


/* Add Wrapper for result-count and orderby */
function codeless_woocommerce_before_shop_loop_before(){

    if( is_shop() || is_product_category() ){

    ?>
        <div class="cl-woocommerce-results-title">

            
                <div class="shop_show_options">
                    
                        <div class="grid-options">
                            <label><?php esc_html_e( 'Show', 'picante' ) ?></label>
                            <div>
                                <?php $cols = codeless_woocommerce_loop_shop_columns(); ?>
                                <a class="<?php if( $cols == 2 ) echo 'active'; ?>" data-grid-cols="2" href="#">2</a>
                                <a class="<?php if( $cols == 3 ) echo 'active'; ?>" data-grid-cols="3" href="#">3</a>
                                <a class="<?php if( $cols == 4 ) echo 'active'; ?>" data-grid-cols="4" href="#">4</a>
                                <a class="<?php if( $cols == 5 ) echo 'active'; ?>" data-grid-cols="5" href="#">5</a>
                            </div>
                        </div>

                </div>
            

            <div class="right-part">

    <?php
    }
}

function codeless_woocommerce_before_shop_loop_after(){
    if( is_shop() || is_product_category() ){
    ?>

            </div><!-- .right-part -->
        </div><!-- .cl-woocommerce-results-title -->
    <?php
    }
}


/**
 * Default loop columns on product archives
 *
 * @return integer products per row
 * @since  1.0.0
 */
function codeless_woocommerce_loop_shop_columns(){
    global $woocommerce_loop;

    $cols = codeless_get_mod( 'shop_columns', 3 );

    if( is_single() )
        $cols = codeless_get_mod( 'shop_cross_sell_single', 2 );

    if( is_single() && isset( $woocommerce_loop['name'] ) && $woocommerce_loop['name'] == 'related' )
        $cols = 3;

    if( is_product_category() && codeless_get_mod( 'shop_category_layout', 'fullwidth' ) != 'fullwidth' )
        $cols = 3;

    if( is_single() && isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'up-sells' )
        $cols = 4;

    if( is_product_category() ){
        $cols = codeless_get_mod( 'shop_categories_columns', 3 );
    }

    return apply_filters( 'codeless_loop_shop_columns', $cols ); // 3 products per row

}



/**
 * Manage Classes of Shop Products
 * @since 1.0.0
 */
function codeless_extra_classes_shop_products( $classes ){
    global $woocommerce_loop;
    /*$classes[] =  'portfolio-layout-' . codeless_portfolio_layout();
    $classes[] =  'portfolio-style-' . codeless_portfolio_style();*/

    
    $classes[] = 'shop-products';

    if( isset( $woocommerce_loop['name'] ) )
        $classes[] = 'name-'.$woocommerce_loop['name'];

    $style = 'grid';
    

    $classes[] = $style.'-entries';

    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $classes[] = 'animated-entries';

    if( codeless_get_mod( 'shop_filters', 'disabled' ) != 'disabled' )
        $classes[] = 'filterable-entries';

    if( codeless_get_mod( 'shop_carousel', 0 ) || ( isset( $woocommerce_loop['name'] ) && $woocommerce_loop['name'] == 'related' )  )
        $classes[] = 'owl-carousel cl-carousel owl-theme';


    
    return $classes;
}



/**
 * Manage Attributes of Shop Products
 * @since 1.0.0
 */
function codeless_extra_attr_shop_products( $attr ){
    global $woocommerce_loop;
    $attr[] = 'data-grid-cols="'. codeless_woocommerce_loop_shop_columns() .'"';

    if( codeless_get_mod( 'shop_carousel', 0 ) || ( isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'related' ) ){


        $attr[] = 'data-carousel-nav="'. ( $woocommerce_loop['name'] == 'related' ? true : codeless_get_mod( 'shop_carousel_nav', false ) ) .'"';
        $attr[] = 'data-carousel-dots="'. ( $woocommerce_loop['name'] == 'related' ? false : codeless_get_mod( 'shop_carousel_dots', false ) ).'"';
    }
    
    $attr[] = 'data-columns-mobile="'.codeless_get_mod('shop_columns_mobile', 1).'"';

    return $attr;
}


/**
 * Shop Product Item 
 * Style, Layout, Animation
 * @since 1.0.0
 */
function codeless_extra_classes_product_item( $classes ){
    global $woocommerce_loop;
    $classes[] = 'product_item';


    // Add animation style class
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' ){
        $classes[] = 'animate_on_visible';
        $classes[] = codeless_get_mod( 'shop_animation', 'bottom-t-top' );
    }

    $style = codeless_get_product_item_style();

    $classes[] = 'style_'.$style;
    // Check if isotope is active and add necessary class
    $classes[] = 'cl-isotope-item';

    
    // Add large-featured or wide or default class for items that should look larger than others to create the masonry
    /*if( codeless_portfolio_layout() == 'masonry' ){
        $classes[] = 'cl-msn-size-'. codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() );
    }*/

    // Portfolio Boxed
   /* if( codeless_get_meta( 'portfolio_boxed', 0 ) )
        $classes[] = 'portfolio_boxed';*/

    
    return $classes;
}


function codeless_extra_classes_product_cat( $classes ){
    global $woocommerce_loop;
    $classes[] = 'product_item';


    // Add animation style class
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' ){
        $classes[] = 'animate_on_visible';
        $classes[] = codeless_get_mod( 'shop_animation', 'bottom-t-top' );
    }

    $style = codeless_get_product_item_style();
    
    $classes[] = 'style_'.$style;
    // Check if isotope is active and add necessary class
    $classes[] = 'cl-isotope-item';

    
    // Add large-featured or wide or default class for items that should look larger than others to create the masonry
    /*if( codeless_portfolio_layout() == 'masonry' ){
        $classes[] = 'cl-msn-size-'. codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() );
    }*/

    // Portfolio Boxed
   /* if( codeless_get_meta( 'portfolio_boxed', 0 ) )
        $classes[] = 'portfolio_boxed';*/

    
    return $classes;
}


/**
 * Shop Item Attr
 * Item Animation
 * @since 1.0.0
 */
function codeless_extra_attr_product_item( $attr ){
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $attr[] = 'data-speed="300"';
    
    $default_delay = 100;
    $counter = 1;
    if( codeless_loop_counter() != 0  ){

        $counter = codeless_loop_counter() + 1;

        if( $counter > codeless_woocommerce_loop_shop_columns() )
            $counter = $counter % codeless_woocommerce_loop_shop_columns();

        if( $counter == 0 )
            $counter = codeless_woocommerce_loop_shop_columns();

        $default_delay = 100;
    }

    if( codeless_get_mod( 'shop_carousel', 0 ) && ((int)codeless_loop_counter() + 1) > (int) codeless_woocommerce_loop_shop_columns() ){
        $counter = 1;
    }
    
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $attr[] = 'data-delay="'. ( $default_delay * $counter ) .'"';
        
    return $attr;
}

function codeless_extra_attr_product_cat( $attr ){
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $attr[] = 'data-speed="300"';
    
    $default_delay = 100;
    $counter = 1;
    if( codeless_loop_counter() != 0  ){

        $counter = codeless_loop_counter() + 1;

        if( $counter > codeless_woocommerce_loop_shop_columns() )
            $counter = $counter % codeless_woocommerce_loop_shop_columns();

        if( $counter == 0 )
            $counter = codeless_woocommerce_loop_shop_columns();

        $default_delay = 100;
    }

    if( codeless_get_mod( 'shop_carousel', 0 ) && ((int)codeless_loop_counter() + 1) > (int) codeless_woocommerce_loop_shop_columns() ){
        $counter = 1;
    }
    
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $attr[] = 'data-delay="'. ( $default_delay * $counter ) .'"';
        
    return $attr;
}

remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title' );
add_action( 'woocommerce_shop_loop_subcategory_title', 'codeless_woocommerce_template_loop_category_title' );

function codeless_woocommerce_template_loop_category_title( $category ) {
        ?>
        <h3 class="woocommerce-loop-category__title custom_font">
            <?php
            echo esc_html( $category->name );

            if ( $category->count > 0 ) {
                echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
            }
            ?>
        </h3>
        <?php
}


/* Add Inner Wrapper on Product Item */
function codeless_woocommerce_before_shop_loop_item(){
    ?>
        <div class="inner-wrapper" style="padding: <?php echo codeless_get_mod( 'shop_item_distance', 15 ); ?>px;">
            
    <?php
}
function codeless_woocommerce_after_shop_loop_item(){
    ?>
        </div><!-- .inner-wrapper -->
    <?php
}


function codeless_woocommerce_item_counter(){
    $i = 1;
    codeless_loop_counter($i);
}

function codeless_woocommerce_item_counter_plus(){
    $i = codeless_loop_counter();
    codeless_loop_counter( ++$i );
}

function codeless_woocommerce_template_loop_product_title() {

    echo '<h3 class="'.codeless_get_mod( 'shop_item_heading', 'h4' ).' custom_font"><a href="'. esc_url( get_permalink() ) .'">' . get_the_title() . '</a></h3>';

    $tags = '';

    $terms = get_the_terms( get_the_ID(), 'product_cat' );

    if( ! empty( $terms ) && is_array( $terms ) ){
        foreach ($terms as $term) {

            $term_link = get_term_link( $term );
    
            // If there was an error, continue to the next term.
            if ( is_wp_error( $term_link ) ) {
                continue;
            }

            $tags .= '<a href="'.esc_url( $term_link ).'">' . $term->name.'</a>, '; 
        }

        echo '<span class="tags">'.trim( $tags, ', ' ).'</span>';
    }

    if( codeless_get_mod( 'shop_show_description', false ) ){
        echo '<div class="desc">'; 
        the_excerpt();
        echo '</div>';
    }
}


function codeless_woo_switch_price_and_rating(){
    ?>

        <div class="cl-price-rating">

    <?php
}


function codeless_woo_switch_price_and_rating_close(){
    ?>

        </div><!-- .cl-price-rating-->

    <?php
   
}

function codeless_woocommerce_thumb_wrapper(){
    
    global $product;
    $next_id = 0;

    $ids = $product->get_gallery_image_ids();
    if( !empty( $ids ) ){
        $i = array_slice($ids, 0, 1);
        $next_id = (int) array_shift($i) ;
    }
    $extra_class = '';
    if( codeless_get_meta( 'with_two_img', false, get_the_ID() ) ){
        $extra_class = 'with_two_img';
    }

    ?>
        <div class="cl-thumb-wrapper <?php echo esc_attr( $extra_class ) ?>">
            <div class="overlay"></div>
    <?php

    if( $product->get_type() == 'variable' ){
        woocommerce_variable_add_to_cart();
    }
}


function codeless_woocommerce_thumb_wrapper_end(){
    global $woocommerce_loop;
    ?>
        </div><!-- .cl-thumb-wrapper -->
    <?php
    
}


function codeless_woocommerce_thumb_wrapper_actions(){
    global $woocommerce_loop;


    codeless_woocommerce_actions();
}


function codeless_woocommerce_actions(){

    $product = wc_get_product( get_the_ID() );
    global $woocommerce_loop;
    ?>

    <div class="cl-actions">
        <div class="wrapper">
            <?php 
                $args = array();

                $more_classes = '';

                if( $product->get_type() == 'variable' )
                    $args = array(
                        'class'    => implode( ' ', array_filter( array(
                                'button',
                                'product_type_' . $product->get_type(),
                                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                'ajax_add_to_cart_variable',
                                $more_classes
                        ) ) ) 
                    );
                woocommerce_template_loop_add_to_cart( $args ); 

            
            $quick_view = '';

            if( codeless_get_mod( 'shop_quick_view', true ) )
                $quick_view = 'cl-quick-view';
            ?>
            
            <a href="<?php echo esc_url( get_permalink( get_the_ID() ) ) ?>" class="cl-action expand <?php echo esc_attr($quick_view); ?>" data-id="<?php echo get_the_ID() ?>"><i class="cl-icon-arrow-expand"></i></a>
            <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', get_the_ID(), get_permalink( get_option('yith_wcwl_wishlist_page_id') ) ) ) ?>"  data-product-id="<?php echo get_the_ID() ?>" data-product-type="<?php echo esc_attr( $product->get_type() )  ?>" class="cl-action add_to_wishlist <?php echo esc_attr( $more_classes ) ?>">
                <i class="cl-icon-heart-outline"></i>
                <?php if( codeless_get_product_item_style() == 'large' ): ?>
                    <?php esc_attr_e( 'Add to Wishlist', 'picante' ); ?>
                <?php endif; ?>
            </a>
        
        </div>
    </div>


 
    <?php

}


add_action( 'wp_ajax_codeless_woocommerce_add_to_cart_variable', 'codeless_woocommerce_add_to_cart_variable' );
add_action( 'wp_ajax_nopriv_codeless_woocommerce_add_to_cart_variable', 'codeless_woocommerce_add_to_cart_variable' );
    
if( ! function_exists('codeless_woocommerce_add_to_cart_variable') ){

    function codeless_woocommerce_add_to_cart_variable() {
        
        ob_start();
        
        $product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
        $quantity = empty( $_POST['quantity'] ) ? 1 : apply_filters( 'woocommerce_stock_amount', $_POST['quantity'] );
        $variation_id = $_POST['variation_id'];
        $variation  = $_POST['variation'];
        $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    
        if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation  ) ) {
            do_action( 'woocommerce_ajax_added_to_cart', $product_id );
            if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
                wc_add_to_cart_message( $product_id );
            }
    
            // Return fragments
            WC_AJAX::get_refreshed_fragments();
        } else {
            
    
            // If there was an error adding to the cart, redirect to the product page to show any errors
            $data = array(
                'error' => true,
                'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
                );
            wp_send_json( $data );
        }
        die();
    }  
}


function codeless_woocommerce_add_second_image(){
    global $product;

    if( ! codeless_get_meta( 'with_two_img', false, get_the_ID() ) )
        return false;

    $next_id = 0;

    $ids = $product->get_gallery_image_ids();

    if( !empty( $ids ) ){
        $i = array_slice($ids, 0, 1);
        $next_id = (int) array_shift($i) ;
    }

    if( $next_id != 0 ){
        $image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

        echo wp_get_attachment_image( $next_id, $image_size, '', array( "class" => "second-img" ) );

    }


    ?>

    <?php
}


/**
 * Used only for shop pagination
 * Use conditionals to get the style of pagination
 * 
 * @since 1.0.0
 */
function codeless_woocommerce_pagination(){
    

    global $wp_query;

    $pages = $wp_query->max_num_pages;

    if ( ! $pages) {
        $pages = 1;
    }

    if ( 1 == $pages )
        return false;

    echo '<div class="cl-shop-pagination" data-container-id="shop-entries">';
    
    $pagination_style = codeless_get_mod( 'shop_pagination_style', 'numbers' );

    if ( $pagination_style == 'infinite_scroll' ) {
        echo codeless_infinite_scroll();
    } elseif ( $pagination_style == 'next_prev' ) {
        echo codeless_nextprev_pagination();
    } elseif ( $pagination_style == 'load_more' ){
        echo codeless_infinite_scroll('loadmore');
    }else {
        codeless_number_pagination();
    }
    
    echo '</div>';
}


    /**
     * Show a shop page description on product archives.
     *
     * @subpackage  Archives
     */
function codeless_woocommerce_product_archive_description() {
        if ( is_post_type_archive( 'product' ) ) {
            $shop_page   = get_post( wc_get_page_id( 'shop' ) );
            setup_postdata($shop_page);
            if ( $shop_page ) {
                $description = $shop_page->post_content;
                $description = apply_filters('the_content', apply_filters( 'codeless_the_content' , $description ) );
                if ( $description ) {
                    echo '<div class="page-description">' . $description . '</div>';
                }
            }
            wp_reset_postdata();
        }
}


function codeless_woocommerce_element(){
    if( 1 == 1 )
        return;

    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    
    remove_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_before', 10 );
    remove_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_after', 40 );
}




if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
    add_filter( 'woocommerce_add_to_cart_fragments', 'codeless_cart_update_count' );
} else {
    add_filter( 'add_to_cart_fragments', 'codeless_cart_update_count' );
}

function codeless_cart_update_count( $fragments ){
    ob_start();
    echo '<span class="cl-cart-total-fragment cart-total">' . WC()->cart->get_cart_contents_count() . '</span>';

    $fragments['.cl-cart-total-fragment'] = ob_get_clean();


    ob_start();
    echo '<span class="cart-total-sum">' . WC()->cart->get_cart_total() . '</span>';

    $fragments['.cart-total-sum'] = ob_get_clean();

    return $fragments;
}


/**
 * Trim zeros in price decimals
 **/
 add_filter( 'woocommerce_price_trim_zeros', '__return_true' );


function codeless_get_single_product_style($id = false){
    global $woocommerce_loop, $single_style;

    if( isset( $single_style ) )
        return $single_style;

    $current_id = get_the_ID();

    if( $id !== false )
        $current_id = $id;

    $single_style = codeless_get_mod( 'shop_global_product_style', 'default' );

    $single_style_meta = codeless_get_meta( 'product_style', 'default', $current_id );

    if( $single_style_meta != 'none' )
        $single_style = $single_style_meta;

    return $single_style;
}


function codeless_single_product_style_class( $classes ) {

    if( get_post_type() == 'product' && is_single() ){
        $classes[] = 'cl-style-'.codeless_get_single_product_style();
    }

    return $classes;
}
add_filter( 'post_class', 'codeless_single_product_style_class' );


function codeless_woocommerce_breadcrumb(){
    return woocommerce_breadcrumb( array( 'delimiter' => '' ) );
}


add_action( 'woocommerce_before_add_to_cart_quantity', 'codeless_woocommerce_add_qty_label' );
function codeless_woocommerce_add_qty_label(){
    ?>
    <div class="qty_container">
        <label><?php esc_html_e( 'Qty', 'picante' ); ?></label>
    <?php
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'codeless_woocommerce_close_qty_label' );
function codeless_woocommerce_close_qty_label(){
    ?>
    </div>
    
    <?php
}



function codeless_woocommerce_wishlist_shares(){
    $product = new WC_Product( get_the_ID() );
    ?>

    <div class="cl-wishlist-share-wrapper">
        <div class="wishlist">
            
            <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', get_the_ID(), get_permalink( get_option('yith_wcwl_wishlist_page_id') ) ) ) ?> " data-product-id="<?php echo get_the_ID() ?>" data-product-type="<?php echo esc_attr( $product->get_type() )  ?>" class="cl-action add_to_wishlist"><?php esc_html_e('Add to Wishlist', 'picante') ?><i class="cl-icon-heart-outline"></i></a>

        </div>
        <div class="share">
            <?php esc_html_e( 'Share this', 'picante' ); ?>
            <?php echo codeless_get_entry_tool_share() ?>
        </div>
    </div>

    <?php
}



add_action( 'woocommerce_before_single_product_summary', 'codeless_woocommerce_single_images_wrapper', 5 );
add_action( 'woocommerce_before_single_product_summary', 'codeless_woocommerce_single_images_wrapper_end', 25 );

function codeless_woocommerce_single_images_wrapper(){

    ?>

    <div class="cl-product-info">
        <div class="cl-images-wrapper">
    <?php
}

function codeless_woocommerce_single_images_wrapper_end(){
    ?>
        </div><!-- cl-images-wrapper -->
    <?php
}


add_action( 'woocommerce_after_single_product_summary', 'codeless_woocommerce_single_wrapper_end', 1 );
function codeless_woocommerce_single_wrapper_end(){
    ?>

    </div><!-- .cl-product-info -->
    <?php
}



function codeless_woocommerce_single_product(){
    if( codeless_get_single_product_style() == 'default' )
        codeless_woocommerce_single_product_default();
}


add_action( 'woocommerce_before_single_product', 'codeless_woocommerce_single_product', 1 );


function codeless_woocommerce_single_product_default(){
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' );

    add_action( 'woocommerce_single_product_summary', 'codeless_woocommerce_breadcrumb', 1 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 6 );
    //add_action( 'woocommerce_single_product_summary', 'codeless_woocommerce_single_useful_info', 7 );
    //add_action( 'woocommerce_single_product_summary', 'codeless_woocommerce_wishlist_shares', 31 );
}


add_action( 'woocommerce_init', 'codeless_woocommerce_fixed_upsells', 9999 );

function codeless_woocommerce_fixed_upsells(){
    global $show_on_content_div;
    $show_on_content_div = true;

    add_action( 'codeless_hook_content_begin', function(){

        if( !is_product() )
            return;

        echo '<div class="fixed-up-sells">';
            woocommerce_upsell_display();
        echo '</div>';

    }, 10 );
    $show_on_content_div = false;
}




function codeless_woo_single_center_meta(){
    ?>

    <div class="shares">
            <?php esc_html_e( 'Share this', 'picante' ); ?>
            <?php echo codeless_get_entry_tool_share() ?>
    </div>

    <div class="metas">

    <?php
}

function codeless_woo_single_center_meta_end(){
    ?>
    </div>
    <?php
}

add_filter( 'woocommerce_single_product_carousel_options', 'codeless_woo_flexslider_options' );

function codeless_woo_flexslider_options( $options ) {

    if( codeless_get_single_product_style() != 'long_gallery' )
    $options['directionNav'] = true;

    return $options;
}



function codeless_woocommerce_single_useful_info(){
    
    $product = new WC_Product( get_the_ID() ); 

    ?>
 
    <div class="cl-useful-info">

        <?php if( $product->is_in_stock() ): ?>
            <div class="cl-info instock"><span class="in-stock"><i class="cl-icon_other-ok-circled"></i><?php esc_html_e( 'In Stock', 'picante' ); ?></span></div>
        <?php else: ?>
            <div class="cl-info outstock"><span class="out-stock"><i class="cl-icon-alert-circle"></i><?php esc_html_e( 'Out of Stock', 'picante' ); ?></span></div>
        <?php endif; ?>

        <?php if( $product->get_review_count() != 0 ): ?>
        <div class="cl-info">
            <?php woocommerce_template_single_rating(); ?>
        </div>
        <?php endif; ?>

        <?php $product_gift = codeless_get_meta( 'product_gifts', '', get_the_ID() ); 

        if( $product_gift != '' ):
        ?>

            <div class="cl-info gift" tabindex="0">
                    <span class="in-gift"><i class="cl-icon_other-gift"></i><?php esc_html_e( 'Gifts', 'picante' ); ?></span>
                    <div class="tooltip"><?php echo codeless_complex_esc( $product_gift ); ?></div>
            </div>
        <?php endif; ?>

    </div>

    <?php
}







add_filter( 'avatar_defaults', 'wpb_new_gravatar' );
function wpb_new_gravatar ($avatar_defaults) {
    $myavatar = get_template_directory_uri().'/img/avatar.png';
    $avatar_defaults[$myavatar] = "Default Gravatar";
    return $avatar_defaults;
}

add_filter( 'woocommerce_date_format', 'codeless_woo_change_date_format' );
function codeless_woo_change_date_format( $format ){
    return 'M j';
}



add_action( 'init', 'codeless_woo_move_to_wishlist', 999 );
function codeless_woo_move_to_wishlist( ){

    if( !isset( $_GET['move_to_wishlist'] ) )
        return;

    foreach( WC()->cart->get_cart() as $key => $item ){
        if( $key == $_GET['move_to_wishlist'] ){
            WC()->cart->remove_cart_item( $key );
            wc_add_notice( esc_html__( 'The product has been moved to Wishlist and removed from cart', 'picante' ), 'notice' );
            break;
        }
    }
}


function codeless_woo_percent_off( $product ) {
    $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
    return sprintf( esc_html__(' %s Off', 'picante' ), $percentage . '%' );
}


add_action( 'wp_head', 'codeless_change_social_form_action' );
function codeless_change_social_form_action(){
    if( ! class_exists( 'YITH_WC_Social_Login_Frontend' ) )
        return;
    
    $inst = YITH_WC_Social_Login_Frontend::get_instance();

    remove_action( 'woocommerce_login_form', array( $inst, 'social_buttons' ) );
    add_action( 'woocommerce_login_form_start', array( $inst, 'social_buttons' ) );

}

add_filter( 'yith_wc_social_login_icon', 'codeless_change_social_login_img', 9999, 3 );
function codeless_change_social_login_img( $social, $key, $args ){
    if ( $key == 'facebook' ) {

        $args['image_url'] = get_template_directory_uri() . '/img/facebook.png';

        $image  = sprintf( '<img src="%s" alt="%s"/>', $args['image_url'], isset( $value['label'] ) ? $value['label'] : $value );
        $social = sprintf( '<a class="%s" href="%s">%s</a>', $args['class'], $args['url'], $image );

        echo codeless_complex_esc( $social );

    }

    if ( $key == 'google' ) {

        $args['image_url'] = get_template_directory_uri() . '/img/google.png';

        $image  = sprintf( '<img src="%s" alt="%s"/>', $args['image_url'], isset( $value['label'] ) ? $value['label'] : $value );
        $social = sprintf( '<a class="%s" href="%s">%s</a>', $args['class'], $args['url'], $image );

        echo codeless_complex_esc( $social );

    }
}


remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
add_action( 'woocommerce_widget_shopping_cart_buttons', 'codeless_woo_widget_shopping_cart_button_view_cart', 10 );
add_action( 'woocommerce_widget_shopping_cart_buttons', 'codeless_woo_widget_shopping_cart_proceed_to_checkout', 20 );

function codeless_woo_widget_shopping_cart_button_view_cart(){
    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward '.codeless_button_classes().'">' . esc_html__( 'View cart', 'picante' ) . '</a>';
}

function codeless_woo_widget_shopping_cart_proceed_to_checkout(){
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward '.codeless_button_classes().'">' . esc_html__( 'Checkout', 'picante' ) . '</a>';
}


add_filter( 'codeless_page_layout', 'codeless_woocommerce_shop_page_layout', 999 );

function codeless_woocommerce_shop_page_layout( $page_layout ){
    if( isset( $_GET['shop_page_layout'] ) && !empty( $_GET['shop_page_layout'] ) ){
        return $_GET['shop_page_layout'];
    }else{
        return $page_layout;
    }
}

add_action( 'init', 'codeless_woocommerce_list_type', 999 );
function codeless_woocommerce_list_type( ){
    global $codeless_online_mods;
    /*if( isset( $_GET['view_style'] ) && $_GET['view_style'] == 'list' ){
        
        $codeless_online_mods['shop_product_style'] = 'list';
    }

    if( isset( $_GET['advanced_list'] ) && $_GET['advanced_list'] == 'yes' && isset( $_GET['view_style'] ) && $_GET['view_style'] == 'list' ){
        $codeless_online_mods['shop_advanced_list'] = true;
    }

    if( isset( $_GET['inpage_filters'] ) && $_GET['inpage_filters'] == 'yes'  ){
        $codeless_online_mods['shop_inpage_filters'] = true;
    }

    if( isset( $_GET['shop_columns'] ) && !empty( $_GET['shop_columns'] ) ){
        $codeless_online_mods['shop_columns'] = (int) $_GET['shop_columns'];
    }

    if( isset( $_GET['shop_fullwidth'] ) && !empty( $_GET['shop_fullwidth'] ) ){
        $codeless_online_mods['layout_container_width'] = (int) 1500;
    }

    if( isset( $_GET['shop_product_style'] ) && !empty( $_GET['shop_product_style'] ) ){
        $codeless_online_mods['shop_product_style'] = $_GET['shop_product_style'];
    }*/
}

function codeless_woo_get_shipping_class_name( $product_id ) {
    $classes = get_the_terms( $product_id, 'product_shipping_class' );
    return ( $classes && ! is_wp_error( $classes ) ) ? current( $classes )->name : '';
}


function codeless_woo_inpage_filter_button(){

    if( is_shop() || is_product_category() ){
        if( ! codeless_get_mod( 'shop_inpage_filters', 0 ) || !is_active_sidebar( 'shop-inpage-filters' ) )
            return;

        echo '<a href="#" class="open-filters">'.esc_html__('Filters', 'picante').'</a>';
    }
}

function codeless_woo_inpage_filters(){
    if( is_shop() || is_product_category() ){

        if( ! codeless_get_mod( 'shop_inpage_filters', 0 ) || !is_active_sidebar( 'shop-inpage-filters' ) )
            return;

        echo '<div class="cl-shop-inpage-filters">';
            
            echo '<div class="filters-wrapper">';
                dynamic_sidebar( 'shop-inpage-filters' );
            echo '</div>';

        echo '</div>';
    }
}

if( !function_exists( 'codeless_woo_add_top_content' ) ){
    function codeless_woo_add_top_content(){
        //codeless_shortcode_add('cl_page_header', 'cl_do_shortcode');

        if(!is_woocommerce() && !is_cart() && !is_checkout() )
            return;

        $page_id = codeless_get_mod( 'shop_top_content', 'none' );//This is page id or post id

        if( (is_woocommerce() && !is_shop() ) || is_cart() || is_checkout() ){ 

            $page_id = codeless_get_mod( 'shop_single_top_content', 'none' );

        }

        if( !empty( $page_id ) && $page_id != 'none' ){
            $content_post = get_post($page_id);
            $content = $content_post->post_content;
            $content    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_content' , $content ));
            echo apply_filters('the_content', $content ); 
        }
    }
}


function codeless_woo_add_footer_content(){
    //codeless_shortcode_add('cl_page_header', 'cl_do_shortcode');

    if(!is_shop())
        return;

    $page_id = codeless_get_mod( 'shop_bottom_content', 'none' );//This is page id or post id

    if( !empty( $page_id ) && $page_id != 'none' ){
        $content_post = get_post($page_id);
        $content = $content_post->post_content;
        $content    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_content' , $content ));
        echo apply_filters('the_content', $content ); 
    }
}


function codeless_woo_add_product_content(){
    //codeless_shortcode_add('cl_page_header', 'cl_do_shortcode');
    $page_id = codeless_get_meta( 'product_builder_content', 'none', get_the_ID() );//This is page id or post id

    if( !empty( $page_id ) && $page_id != 'none' ){
        $content_post = get_post($page_id);
        $content = $content_post->post_content;
        $content    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_content' , $content ));
        echo apply_filters('the_content', $content ); 
    }
}


add_action( 'wp_ajax_codeless_woo_quick_view', 'codeless_woo_quick_view' );
add_action( 'wp_ajax_nopriv_codeless_woo_quick_view', 'codeless_woo_quick_view' );


function codeless_quick_view_scroll_start(){
    ?>
    <div class="sub-summary scrollbar-div nano">
        <div class="nano-content">
    <?php
}

function codeless_quick_view_scroll_end(){
    ?>
        </div>
    </div>
    <?php
}

function codeless_woo_quick_view(){

        if( isset($_GET['id']) ) {
                $id = (int) $_GET['id'];
        }
        if( ! $id || ! class_exists('woocommerce') ) {
            return;
        }

        global $post, $product, $single_style, $woocommerce_loop;
        $single_style = 'default';
        $woocommerce_loop = 'quick-view';


        $args = array( 'post__in' => array($id), 'post_type' => 'product' );

        $quick_posts = get_posts( $args );

        foreach( $quick_posts as $post ) :
            setup_postdata($post);
            $product = wc_get_product($post);

            remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' );


            add_action( 'woocommerce_single_product_summary', 'codeless_quick_view_scroll_start', 1 );

            add_action( 'woocommerce_single_product_summary', 'codeless_woocommerce_breadcrumb', 2 );
            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 6 );
            //add_action( 'woocommerce_single_product_summary', 'codeless_woocommerce_single_useful_info', 7 );
            //add_action( 'woocommerce_single_product_summary', 'codeless_woocommerce_wishlist_shares', 31 );

            add_action( 'woocommerce_single_product_summary', 'codeless_quick_view_scroll_end', 50 );

            

            if( class_exists('TA_WC_Variation_Swatches_Frontend') )
                $inst = TA_WC_Variation_Swatches_Frontend::instance();

            get_template_part('woocommerce/content', 'quick-view');
        endforeach; 

        wp_reset_postdata(); 

        die();
}


add_action( 'wp_ajax_codeless_search_autocomplete', 'codeless_search_autocomplete' );
add_action( 'wp_ajax_nopriv_codeless_search_autocomplete', 'codeless_search_autocomplete' );

function codeless_search_autocomplete(){
    $allowed_types = array('post', 'product', 'portfolio');
    $post_type = 'product';

        $query_args = array(
            'posts_per_page' => 5,
            'post_status'    => 'publish',
            'post_type'      => $post_type,
            'no_found_rows'  => 1,
        );


        if( ! empty( $_REQUEST['post_type'] ) && in_array( $_REQUEST['post_type'], $allowed_types) ) {
            $post_type = strip_tags( $_REQUEST['post_type'] );
            $query_args['post_type'] = $post_type;
        }

        if( $post_type == 'product') {
            
            $product_visibility_term_ids = wc_get_product_visibility_term_ids();
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => $product_visibility_term_ids['exclude-from-search'],
                'operator' => 'NOT IN',
            );

            if( ! empty( $_REQUEST['product_cat'] ) && $_REQUEST['product_cat'] != '-1' ) {
                $query_args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => strip_tags($_REQUEST['product_cat'])
                );
            }
        }


        if( ! empty( $_REQUEST['query'] ) ) {
            $query_args['s'] = sanitize_text_field( $_REQUEST['query'] );
        }

        if( ! empty( $_REQUEST['number'] ) ) {
            $query_args['posts_per_page'] = (int) $_REQUEST['number'];
        }
        $results = new WP_Query( $query_args );

        $suggestions = array();

        if( $results->have_posts() ) {

            if( $post_type == 'product' ) {
                $factory = new WC_Product_Factory();
            }


            while( $results->have_posts() ) {
                $results->the_post();

                if( $post_type == 'product' ) {
                    $product = $factory->get_product( get_the_ID() );

                    $suggestions[] = array(
                        'value' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'price' => $product->get_price_html(),
                        'thumbnail' => $product->get_image(),
                    );
                } else {
                    $suggestions[] = array(
                        'value' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'thumbnail' => get_the_post_thumbnail( null, 'medium', '' ),
                    );
                }
            }

            wp_reset_postdata();
        } else {
            $suggestions[] = array(
                'value' => ( $post_type == 'product' ) ? esc_html__( 'No products found', 'picante' ) : esc_html__( 'No posts found', 'picante' ),
                'no_found' => true,
                'permalink' => ''
            );
        }


        echo json_encode( array(
            'suggestions' => $suggestions
        ) );

        die();
}


add_filter( 'woocommerce_available_variation', 'codeless_woo_available_variation', 9999, 3 );
function codeless_woo_available_variation( $attr, $scope, $variation ){
    $attachment_id = $variation->get_image_id();

    $src = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' );
    $props = array();

    $props['catalog_src']   = $src[0];
    $props['catalog_src_w'] = $src[1];
    $props['catalog_src_h'] = $src[2];
    $props['catelog_srcset'] = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $attachment_id, 'shop_catalog' ) : false;
    $props['catalog_sizes']  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $attachment_id, 'shop_catalog' ) : false;

    $attr['image'] = array_merge( $attr['image'], $props);

    return $attr;
}


add_action( 'woocommerce_order_details_after_order_table', 'codeless_continue_shopping_button' );
function codeless_continue_shopping_button(){
    echo '<a href="'.esc_url(get_permalink( wc_get_page_id( 'shop' ) ) ).'" class="thankyou-button button alt continue-shopping cl-btn btn-style-square btn-hover-darker">'.esc_html__('Continue Shopping', 'picante'). '<i class="cl-icon-arrow-right"></i></a>';
} 


add_filter( 'woocommerce_product_tabs', 'codeless_woo_product_tabs', 99 );
function codeless_woo_product_tabs( $tabs ){
    global $product, $post;

    if( isset( $tabs['additional_information'] ) )
        unset( $tabs['additional_information'] );

    return $tabs;
}


add_filter( 'comment_form_fields', 'codeless_woo_comment_form_fields', 9 );
function codeless_woo_comment_form_fields( $fields ){
    if( function_exists('is_product') && is_product()  ){
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
    }
    return $fields;
}


/**
 * Apply the ratio/crop settings in <code>Customizer > WooCommerce > Product Images</code> to <code>single</code> images.
 */

add_filter( 'woocommerce_get_image_size_single', 'codeless_crop_wc_image_single' );

function codeless_crop_wc_image_single( $size ) {
    $cropping = get_option( 'woocommerce_thumbnail_cropping', '1: 1' );

    if ( 'uncropped' === $cropping ) {
        $size['height'] = 9999999999;
        $size['crop']   = 0;
    } elseif ( 'custom' === $cropping ) {
        $width          = max( 1, get_option( 'woocommerce_thumbnail_cropping_custom_width', '4' ) );
        $height         = max( 1, get_option( 'woocommerce_thumbnail_cropping_custom_height', '3' ) );
        $size['height'] = round( ( $size['width'] / $width ) * $height );
        $size['crop']   = 1;
    } else {
        $cropping_split = explode( ':', $cropping );
        $width          = max( 1, current( $cropping_split ) );
        $height         = max( 1, end( $cropping_split ) );
        $size['height'] = round( ( $size['width'] / $width ) * $height );
        $size['crop']   = 1;
    }
    return $size;
}

?>