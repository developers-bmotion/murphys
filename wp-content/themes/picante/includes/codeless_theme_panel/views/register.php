<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }


    if( isset($_POST['register']) && $_POST['register'])
        $o = cl_backpanel::cl_registerproduct($_POST['code']);

    if( isset($_POST['remove']) && $_POST['remove'])
        $o = cl_backpanel::cl_removeproduct();


?>
<div class="wrapper postbox">

     <?php if (get_option('add_purchase_code') ){ ?>

            <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/includes/codeless_theme_panel/assets/img/success.png" class="success" />

            <h2><?php esc_html_e( 'Now you are part of Codeless!', 'picante' ) ?></h2>

            <div class="description success"><?php esc_html_e( 'Now you are ready to start install templates and build your next website!', 'picante' ) ?></div>


    <?php } else{ ?>

            <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/includes/codeless_theme_panel/assets/img/unlock.png" />

            <h2><?php esc_html_e( 'Welcome, youre almost finished!', 'picante' ) ?></h2>

            <div class="description"><?php esc_html_e( 'By activate your picante WordPress Theme you will able to use any theme feature. You can install demos and activate our plugins.', 'picante' ) ?></div>

            <div class="form">
                <p>
                    <input name="email" placeholder="<?php esc_attr_e('Email Address', 'picante') ?>" type="email" />
                </p>

                <p>
                    <input  name="purchase-code" placeholder="<?php esc_attr_e('Purchase Code', 'picante') ?>" type="text" />
                </p>
                
                <p>
                    <input id="registerBtn" type="button" class="button-primary  codeless-hint-qtip" value="<?php esc_attr_e( 'Register', 'picante' ); ?>" />
                </p>
                        
            </div>
    <?php } ?>        
          
</div>