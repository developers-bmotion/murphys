<?php
/**
 * Header Login Box
 *
 *
 * @package picante
 * @subpackage Templates
 * @since 1.0.0
 *
 */
?>

<div class="login-box woocommerce">
	<h6><?php esc_html_e( 'Already got an account?', 'picante' ); ?></h6>

	<form class="woocommerce-form woocommerce-form-login login" method="post">

			<div class="login_div">
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_attr_e( 'Username or email address', 'picante' ); ?>" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_attr_e( 'Password', 'picante' ); ?>" type="password" name="password" id="password" />
				</p>

				<p class="other">
					
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" style="font-size:16px; color:#73bbb1; line-height:20px;"><?php esc_html_e( 'Lost your password?', 'picante' ); ?></a>

					<label style="font-size:16px; float:right;" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'picante' ); ?></span>
					</label>
					

				</p>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<p class="form-row">
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<input type="submit" class="woocommerce-Button button cl-btn btn-style-square btn-hover-darker" name="login" value="<?php esc_attr_e( 'Login', 'picante' ); ?>" />
					
					<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="button cl-btn btn-style-square btn-hover-darker register_link"><?php esc_html_e('Create Account', 'picante') ?></a>
				</p>


			</div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

	</form>
</div>