<?php
/**
 * Portfolio overlay style for only_media portfolio style
 * Used for entry overlay too.
 *
 * @package picante
 * @subpackage Portfolio Parts
 * @since 1.0.0
 *
 */

	$portfolio_overlay_distance = codeless_get_from_element('portfolio_overlay_distance', '0');
    $portfolio_overlay_title_style = codeless_get_from_element('portfolio_item_title_style', 'h5');
    $portfolio_overlay_title_style .= ' custom_font';


    $portfolio_overlay_color = apply_filters( 'codeless_portfolio_overlay_color', codeless_get_from_element('portfolio_overlay_color'), get_the_ID() );

    $portfolio_overlay_content_color = codeless_get_from_element('portfolio_overlay_content_color');
    $portfolio_overlay_gradient = 'cl-gradient-' . codeless_get_mod('portfolio_overlay_gradient', 'none');
    $delay = 200;

    ?>

    <div class="entry-overlay <?php echo esc_attr($portfolio_overlay_content_color) ?> entry-overlay-color" style="padding:<?php echo esc_attr($portfolio_overlay_distance) ?>px;">


        <div class="overlay-wrapper <?php echo esc_attr( $portfolio_overlay_gradient ) ?>" style=" background-color:<?php echo esc_attr($portfolio_overlay_color) ?>;">
            <div class="inner-wrapper">
                
                    <div class="content-wrapper">

                            <h3 class="<?php echo esc_attr($portfolio_overlay_title_style) ?> with_anim cl-portfolio-title" data-delay="<?php echo esc_attr($delay) ?>"><?php echo get_the_title() ?></h3>

                            <div  data-delay="<?php echo ( (int) esc_attr( $delay ) + 100 ) ?>" class="categories with_anim"><?php echo get_the_term_list( get_the_ID(), 'portfolio_entries', '', '', '' ) ?></div>

                            <div  data-delay="<?php echo ( (int) esc_attr( $delay ) + 100 ) ?>" class="price with_anim">
                                 
                                    <sup class="currency"><?php echo codeless_get_meta( 'portfolio_price_currency', false, get_the_ID()); ?></sup><span class="integer"><?php echo codeless_get_meta( 'portfolio_price_number',  false, get_the_ID()); ?></span><sup class="decimal">.<?php echo codeless_get_meta( 'portfolio_price_decimal',  false, get_the_ID()); ?></sup>

                            </div>
                           

                    </div><!-- .content-wrapper -->

               
                    <div class="icons-wrapper">
                    	<?php  
				            
				            $link = codeless_portfolio_item_permalink();
				            $lightbox_link = get_the_post_thumbnail_url();

				        ?>
                        <a class="entry-link with_anim" target="<?php echo codeless_portfolio_item_permalink_target() ?>" href="<?php echo esc_url($link) ?>" title="<?php esc_attr( the_title() ) ?>" data-delay="200"></a>
                        <a class="entry-link lightbox with_anim" href="<?php echo esc_url($lightbox_link) ?>" title="<?php esc_attr( the_title() ) ?>" data-delay="300"></a>
                    </div><!-- .icons-wrapper -->
           
            </div><!-- .inner-wrapper -->

        </div><!-- overlay-wrapper -->

    </div><!-- Entry Overlay -->