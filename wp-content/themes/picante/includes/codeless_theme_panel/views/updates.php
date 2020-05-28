<?php
	$cl_update = cl_backpanel::cl_version();
	$new_update = false;
	$my_theme = wp_get_theme();

	if(version_compare($cl_update,  $my_theme->get('Version')) > 0) 
		$new_update = true;
?>

<div class="wrapper postbox with-pad">

	<h2 class="box-title"><?php esc_html_e( 'Updates', 'picante' ) ?></h2>

	<div class="inner-wrapper">


        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/includes/codeless_theme_panel/assets/img/updates.png" width="200" />

        <h2><?php esc_html_e('Stay Updated!', 'picante' ) ?></h2>

        <div class="description"><?php esc_html_e('Now you are ready to start install templates and build your next website!', 'picante') ?>
        <p><?php esc_html_e('Your current theme version:', 'picante' ) ?> <strong><?php echo esc_html( $my_theme->get('Version') ) ?></strong></p>
        <?php if( !$new_update ){ ?>

        	<h5><?php esc_html_e('You have the latest version installed', 'picante' ) ?></h5>

        <?php } else{ ?> 

        	<p><?php esc_html_e('A new version is released', 'picante' ) ?>: <strong><?php echo esc_html( $cl_update ) ?></strong></p>
        	
        	<?php if( ! class_exists('Envato_Market')): ?>
        		
        		<p><?php esc_html_e('You need to install or active the Envato Market Plugin for an automatically update.', 'picante' ) ?> <a href="<?php echo esc_url( admin_url('themes.php?page=install-required-plugins') ) ?>"><?php esc_html_e('Click here', 'picante' ) ?></a></p>

        	<?php endif; ?>

        	<?php if( function_exists('envato_market') ):

        		
        		$options = envato_market()->get_options();
        		
        		if( ! empty($options) && ( ! empty( $options['token'] ) || (isset( $options['items'] ) && ! empty($options['items'] ) )  ) ){
        			?>

        				<a id="updatesBtn" href="<?php echo esc_url( admin_url('update-core.php') ) ?>" class="button-primary codeless-hint-qtip"><?php esc_html_e( 'Update Now', 'picante' ); ?></a>

        			<?php
        		}else{
        			?>
        				<p><?php esc_html_e('Please configure the Envato Market API to begin the automatic update.', 'picante' ) ?> <a href="<?php echo esc_url( admin_url('admin.php?page=envato-market') ) ?>"><?php esc_html_e('Click here', 'picante' ) ?></a></p>

        			<?php
        		}

        	endif; ?>

	        <p>
	            
	        </p>

	    <?php } ?>

        </div>
	</div>

</div>