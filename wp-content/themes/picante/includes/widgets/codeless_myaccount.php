<?php 

class CodelessMyAccount extends WP_Widget{



    function __construct(){

        $options = array('classname' => 'widget_myaccount', 'description' => '', 'customize_selective_refresh' => true );

		parent::__construct( 'widget_myaccount', THEMENAME.' Widget MyAccount', $options );

    }


 
    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

        $my_account = empty($instance['my_account']) ? esc_html__( 'My Account', 'picante' ) : $instance['my_account'];
        $login = empty($instance['login']) ? esc_html__( 'Login / Sign Up', 'picante') : $instance['my_account'];

		if ( is_user_logged_in() ) { ?>
            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="widget_myaccount" title="<?php echo esc_attr( $my_account ) ?>"><?php echo esc_html( $my_account ); ?></a>
         <?php } 
         else { ?>
            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="widget_myaccount" title="<?php echo esc_attr( $login ) ?>"><?php echo esc_html( $login ) ?></a>
         <?php }

    }

    function update($new_instance, $old_instance){

        $instance = array();

        $instance['my_account'] = $new_instance['my_account'];
        $instance['login'] = $new_instance['login'];
        return $instance;

    }


    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'my_account' => '', 'login' => '') );

        $my_account = isset($instance['my_account']) ? $instance['my_account']: esc_html__( 'My Account', 'picante' );
        $login = isset($instance['login']) ? $instance['login']: esc_html__( 'Login / Sign Up', 'picante' );

        echo '<p>'.esc_html__('Used on header', 'picante').'</p>'; ?>


        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('my_account') ); ?>"><?php esc_html_e( 'My Account', 'picante' ) ?>: 

            <input id="<?php echo esc_attr( $this->get_field_id('my_account') ); ?>" name="<?php echo esc_attr( $this->get_field_name('my_account') ); ?>" type="text" value="<?php echo esc_attr($my_account); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('login') ); ?>"><?php esc_html_e( 'Login / Sign Up', 'picante' ) ?>: 

            <input id="<?php echo esc_attr( $this->get_field_id('login') ); ?>" name="<?php echo esc_attr( $this->get_field_name('login') ); ?>" type="text" value="<?php echo esc_attr($login); ?>" /></label>

        </p>

        <?php

    }

}