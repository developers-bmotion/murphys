<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

extract( $atts );

$post_meta = '';

                            


$title = (isset($title) && !empty($title) ) ? $title : get_the_title( codeless_get_post_id() ) ;
$wait_load = '';

if( $type == 'modern' )
    $wait_load = 'cl-wait-for-load';

$output .= '<div class="cl_page_header cl-element cl-load-component '.$this->generateClasses('.cl_page_header').'" '.$this->generateStyle('.cl_page_header').'>';
    
    
    $output .= '<div class="cl-loading"></div>';

    $output .= '<div class="wrapper-layers '.$wait_load.'" data-delay="1">';
            
        $output .= '<div class="bg-layer '.$this->generateClasses('.cl_page_header .bg-layer').'" '.$this->generateStyle('.cl_page_header .bg-layer').' data-parallax-config=\'{ "speed": 0.3 }\'></div>';

        $output .= '<div class="overlay '.$this->generateClasses('.cl_page_header .overlay').'" '.$this->generateStyle('.cl_page_header .overlay').'></div>';

        $output .= '<div class="effect-wrapper"></div>';
    $output .= '</div>';
        
        if( $type == 'modern' ){
            $output .= '<div class="wrapper-content '.$wait_load.'" data-delay="2">';
                $output .= '<div class="container container-content">';
                    $output .= '<div class="row">';
                            $output .= '<div class="col-sm-12">';
                                $output .= '<div class="title_part">';
                                    $output .= '<h1 class="'.$this->generateClasses('.cl_page_header .title_part h1').'" '.$this->generateStyle('.cl_page_header .title_part h1').'>'.wp_kses($title, '', '').'</h1>';
                                    if((int) $add_description)
                                        $output .= '<span class="subtitle" '.$this->generateStyle('.cl_page_header .title_part .subtitle').'>'.wp_kses( $description, '', '' ).'</span>';
                                    
                                    $output .= $post_meta;

                                $output .= '</div>';

                                if($type == 'simple'){
                                    $output .= '<div class="breadcrumbss">';
                                        
                                        $output .= '<ul class="page_parents pull-right" style="background-color: '. codeless_get_meta( 'page_bg_color', '#fff' ) .';">';
                                        
                                            $output .= '<li>'.esc_html__('You are here', 'picante').'</li>';
                                            $output .= '<li class="home"><a href="'.esc_url(home_url()).'">'.esc_html__('Home', 'picante').'</a></li>';
                                                $page_parents = codeless_page_parents();
                                                
                                                for($i = count($page_parents) - 1; $i >= 0; $i-- ){
                    
                                                    $output .= '<li><a href="'.esc_url(get_permalink($page_parents[$i])).'">'.esc_html(get_the_title($page_parents[$i])).'</a></li>';
                    
                                                }
                                            if(!is_front_page())  
                                                $output .= '<li class="active"><a href="'.esc_url(get_permalink()).'">'.esc_attr($title).'</a></li>';
                
                                        $output .= '</ul>';
                                    $output .= '</div>';
                                }
                                
                            $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        }else{
            ob_start();
            get_template_part( 'template-parts/default-page-header' );
            $output .= '<div class="wrapper-content" data-delay="2">';
                $output .= ob_get_clean();
            $output .= '</div>';
        }
$output .= '</div>';

echo cl_remove_wpautop( $output );

?>