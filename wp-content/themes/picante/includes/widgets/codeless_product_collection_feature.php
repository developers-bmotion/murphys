<?php 

class CodelessProductCollectionFeature extends WP_Widget{



    function __construct(){

        $options = array('classname' => 'widget_product_collection_feature', 'description' => '', 'customize_selective_refresh' => true );

		parent::__construct( 'widget_product_collection_feature', THEMENAME.' Widget Product Collection Feature', $options );

    }


 
    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

		echo wp_kses_post( $before_widget );

        $title = empty($instance['title']) ? '' : $instance['title'];

        $image = empty($instance['image']) ? '' : $instance['image'];

        $link_title = empty($instance['link_title']) ? '' : $instance['link_title'];
        $link = empty($instance['link']) ? '' : $instance['link'];

        ?>

        <div class="cl-product-collection-feature">

            <img src="<?php echo esc_url( $image ) ?>" alt="<?php esc_attr_e( 'Product Collection', 'picante' ) ?>" />

            <div class="data">
                <h6><?php echo esc_attr( $title ) ?></h6>
                <a href="<?php echo esc_url( $link ) ?>"><?php echo esc_html( $link_title ) ?></a>
            </div>

        </div>

      
        <?php

        echo wp_kses_post( $after_widget );

    }

    



    function update($new_instance, $old_instance){

        $instance = array();

        $instance['title'] = $new_instance['title'];

        $instance['image'] = $new_instance['image'];

        $instance['link_title'] = $new_instance['link_title'];

        $instance['link'] = $new_instance['link'];
        

        return $instance;

    }



    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'categories' => '', 'link' => '', 'link_title' => '') );

        $title = isset($instance['title']) ? $instance['title']: "";

        $image = isset($instance['image']) ? $instance['image']: "";

        $link_title = isset($instance['link_title']) ? $instance['link_title']: "";

        $link = isset($instance['link']) ? $instance['link']: "";

        $all_categories = get_terms( 'product_cat' );

        ?>

        <p>

    		<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title', 'picante' ) ?>: 

    		<input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>

        </p>

        

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('image') ); ?>"><?php esc_html_e( 'Image URL', 'picante' ) ?>: 

            <input id="<?php echo esc_attr( $this->get_field_id('image') ); ?>" name="<?php echo esc_attr( $this->get_field_name('image') ); ?>" type="text" value="<?php echo esc_attr($image); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('link_title') ); ?>"><?php esc_html_e( 'Link Title', 'picante' ) ?>: 

            <input id="<?php echo esc_attr( $this->get_field_id('link_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_title') ); ?>" type="text" value="<?php echo esc_attr($link_title); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('link') ); ?>"><?php esc_html_e( 'Link', 'picante' ) ?>: 

            <input id="<?php echo esc_attr( $this->get_field_id('link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link') ); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></label>

        </p>

        

        <?php

    }

}