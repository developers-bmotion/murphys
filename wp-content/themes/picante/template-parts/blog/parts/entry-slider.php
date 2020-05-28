<?php

$slider_data = get_post_gallery( get_the_ID(), false );

?>
<div class="entry-media">
    <div class="entry-gallery">
        
        <!-- Slider main container -->
        <div id="swiper_post_slider_<?php the_ID() ?>" class="swiper-container cl-post-swiper-slider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php
                    
                    // Generate Slide
                    if( is_array( $slider_data ) && ! empty( $slider_data['src'] ) ):
                        
                        foreach( $slider_data['src'] as $src ):
                            echo '<div class="swiper-slide">';
                                echo '<img src="'.$src.'" alt="'.esc_attr__( 'Slider Img', 'picante' ).'" />';
                                
                                    
                            echo '</div><!-- .swiper-slide --> ';
                        endforeach;
                    endif;
                    
                    
                ?>
                    
            </div>
            
            <?php if( codeless_get_mod( 'blog_slider_nav', 'true' ) ): ?>
            <!-- If we need navigation buttons -->
            <div class="cl-post-slider-nav swiper-button-prev swiper-button-white"></div>
            <div class="cl-post-slider-nav  swiper-button-next swiper-button-white"></div>
            <?php endif; ?>
            
            <?php if( codeless_get_mod( 'blog_slider_pagination', 'true' ) ): ?>
            <!-- If we need pagination buttons -->
            <div class="cl-post-slider-pagination swiper-pagination"></div>
            <?php endif; ?>
            
        </div>
        
    </div>
</div><!-- .entry-media --> 