<?php

/** -----------------------------------------------------------------
 * IMPORTANT ROUTING FUNCTION
 * DON'T EDIT THIS
 * 
 * @since 1.0.0
 * ------------------------------------------------------------------
 */


if( !function_exists( 'codeless_routing_template_func' ) ) {
    
    add_action( 'codeless_routing_template', 'codeless_routing_template_func' );
    
    function codeless_routing_template_func( $current_template = false ) {
        global $codeless_config, $for_online, $post;
        $dynamic_id = "";
        
        // Grab Page ID
        if( isset( $post ) )
            $dynamic_id = $post->ID;
        
        
        $frontpage = get_option( 'page_on_front' );
        $blogpage  = get_option( 'page_for_posts' );
        
        
        if( is_customize_preview() && isset( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'cl_load_shortcode' )
            exit();
        
        /* FRONTPAGE QUERY */
        if( $frontpage && isset( $codeless_config['new_query'] ) && $codeless_config['new_query']['page_id'] == $frontpage ) {
            $dynamic_id = $frontpage;
        }
        
        /* BLOG QUERY */
        
        if( ( isset( $post ) && $blogpage == $post->ID && !isset( $codeless_config['new_query'] ) ) ) {
            $codeless_config['new_query'] = array(
                 'paged' => get_query_var( 'paged' ),
                'posts_per_page' => apply_filters( 'codeless_posts_per_page', get_option( 'posts_per_page' ) ) 
            );
            
            get_template_part( 'template', 'blog' );
            exit();
        }
        
    }
    
}


/**
 * Set a new query at Codeless Config global var and execute the new one.
 * 
 * @since 1.0.0
 */

if( !function_exists( 'codeless_execute_query_func' ) ) {
    
    add_action( 'codeless_execute_query', 'codeless_execute_query_func' );
    
    function codeless_execute_query_func( $temp = false ) {
        
        global $codeless_config;
        
        if( is_page_template( 'template-blog.php' ) ) {
            $codeless_config['new_query'] = array(
                 'paged' => get_query_var( 'paged' ),
                'posts_per_page' => apply_filters( 'codeless_posts_per_page', get_option( 'posts_per_page' ) ) 
            );
        }
        
        if( isset( $codeless_config['new_query'] ) ) {
            query_posts( $codeless_config['new_query'] );
        }
        
    }
}


/**
 * Set a Portfolio Query
 * Used on Codeless Builder cl_portfolio.php
 * 
 * @since 1.0.0
 */

function codeless_set_portfolio_query( $vars ) {
    
    $p_per_page = $vars['posts_per_page'];
    $categories = $vars['categories'];
    
    $orderby = $vars['orderby'];
    $order   = $vars['order'];
    
    $new_query = array(
        
        'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
        'posts_per_page' => $p_per_page,
        'post_type' => 'portfolio' 
    );

    if( $orderby != 'none' ){
        $new_query['orderby'] = $orderby;
        $new_query['order'] = $order;
    }
    
    if( is_customize_preview() )
        $new_query['post_status'] = array('publish', 'auto-draft');
    
    if( is_array( $categories ) && !empty( $categories ) ) {
        $new_query['tax_query'] = array(
            
             array(
                 'taxonomy' => 'portfolio_entries',
                'field' => 'slug',
                'terms' => $categories,
                'operator' => 'IN' 
            ) 
        );
    }
    
    return $new_query;
    
}


/**
 * Set a Shop Query
 * Used on Codeless Builder cl_shop.php
 * 
 * @since 1.0.0
 */

function codeless_set_woocommerce_query( $vars ) {
    
    global $codeless_config;
    
    $p_per_page = (int) $vars['per_page'];
    $categories = isset( $vars['category'] ) ? array(
         $vars['category'] 
    ) : array();
    
    $orderby = $vars['orderby'];
    $order   = $vars['order'];
    
    $new_query = array(
         'orderby' => $orderby,
        'order' => $order,
        'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
        'posts_per_page' => $p_per_page,
        'post_type' => 'product' 
    );


    
    if( is_array( $categories ) && !empty( $categories ) ) {
        $new_query['tax_query'] = array(
            
             array(
                 'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $categories,
                'operator' => 'IN' 
            ) 
        );
    }
    
    $codeless_config['new_query'] = $new_query;
    
}

/**
 * Set a Testimonial Query
 * Used on Codeless Builder cl_testimonial.php
 * 
 * @since 1.0.0
 */

function codeless_set_testimonial_query( $vars ) {
    
    if( isset( $vars['testimonial_id'] ) && !empty( $vars['testimonial_id'] ) ) {
        $new_query = array(
             'p' => $vars['testimonial_id'],
            'post_type' => 'testimonial' 
        );
        
        return $new_query;
    }

    $p_per_page = $vars['posts_per_page'];
    $categories = $vars['categories'];
    
    $orderby = $vars['orderby'];
    $order   = $vars['order'];
    
    $new_query = array(
         'orderby' => $orderby,
        'order' => $order,
        'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
        'posts_per_page' => $p_per_page,
        'post_type' => 'testimonial' 
    );

    if( is_customize_preview() )
        $new_query['post_status'] = array('publish', 'auto-draft');
    
    if( is_array( $categories ) && !empty( $categories ) ) {
        $new_query['tax_query'] = array(
            
             array(
                 'taxonomy' => 'testimonial_entries',
                'field' => 'slug',
                'terms' => $categories,
                'operator' => 'IN' 
            ) 
        );
    }
    
    return $new_query;
    
}

/**
 * Set a Team Query
 * Used on Codeless Builder cl_team.php
 * 
 * @since 1.0.0
 */

function codeless_set_team_query( $vars ) {
    
    if( isset( $vars['team_id'] ) && !empty( $vars['team_id'] ) ) {
        $new_query = array(
             'p' => $vars['team_id'],
            'post_type' => 'staff' 
        );
        
        return $new_query;
    }
    
    
    $p_per_page = $vars['posts_per_page'];
    $categories = $vars['categories'];
    
    $orderby = $vars['orderby'];
    $order   = $vars['order'];
    
    $new_query = array(
         'orderby' => $orderby,
        'order' => $order,
        'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
        'posts_per_page' => $p_per_page,
        'post_type' => 'staff' 
    );
    
    if( is_customize_preview() )
        $new_query['post_status'] = array('publish', 'auto-draft');
    
    if( is_array( $categories ) && !empty( $categories ) ) {
        $new_query['tax_query'] = array(
            
             array(
                 'taxonomy' => 'staff_entries',
                'field' => 'slug',
                'terms' => $categories,
                'operator' => 'IN' 
            ) 
        );
    }
    
    return $new_query;
    
}





/** -----------------------------------------------------------------
 * END IMPORTANT ROUTING FUNCTION
 * DON'T EDIT THIS
 * ------------------------------------------------------------------
 */


?>