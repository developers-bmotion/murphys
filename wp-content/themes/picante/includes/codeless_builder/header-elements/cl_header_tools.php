<?php 
    
    extract( $element['params'] ); 

?>


<div class="extra_tools_wrapper <?php echo esc_attr( $this->generateClasses( '.extra_tools_wrapper' ) ) ?>">
    

    <?php if( (int) $cart_button && function_exists( 'is_woocommerce' ) ): ?>

        <div class="shop tool">
            
            <?php 
                
                $cart_url = wc_get_cart_url();

            ?>

            <a href="<?php echo esc_url($cart_url) ?>" class="tool-link">
               
                    <div class="cart-icon">
                        <span class="cl-img-cart cl-img"></span>
                        <span class="show-side-header"><?php esc_html_e('Cart', 'picante' ) ?></span>
                        <span class="cart-total cl-cart-total-fragment"><?php echo WC()->cart->get_cart_contents_count() ?></span>
                    </div>
            </a>

            <?php if( ! is_cart() && ! is_checkout() ): $cart_style = 'default' ?>

                <div id="site-header-cart" class="<?php if( $cart_style == 'default' ) echo 'cl-submenu'; ?> cl-hide-on-mobile cart-style-<?php echo esc_attr( $cart_style ) ?>">

                        <?php the_widget( 'WC_Widget_Cart', 'title=', array('before_widget' => '<div class="header_cart">', 'after_widget' => '</div>' ) ); ?>
                </div><!-- #site-header-cart -->

            <?php endif; ?>

        </div><!-- .shop.tool -->

    <?php endif; ?>


    <?php if( ( int ) $search_button ): ?>
       
        <div class="search tool search-style-creative">

            <a href="#" id="header_search_btn" class="tool-link">
                <span class="cl-img-search cl-img"></span>
                <span class="show-side-header"><?php esc_html_e('Search', 'picante' ) ?></span>
            </a>

        </div><!-- .search.tool -->

    <?php endif; ?>


    


    <div class="cl-mobile-menu-button cl-color-<?php echo esc_attr( codeless_get_mod('header_mobile_menu_hamburger_color', 'dark') ) ?>">
        <span></span>
        <span></span>
        <span></span>
    </div> 

</div>