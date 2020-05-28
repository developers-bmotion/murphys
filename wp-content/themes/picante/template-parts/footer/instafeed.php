<?php wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' ); ?>

<div class="container insta-footer">
	<div class="cl-element wrapper-heading parallel-divider">

		
		<h2 id="cl_custom_heading_5b2cd5fbc02956-37678118" class="cl-custom-heading cl-element custom_font custom_font"><?php esc_html_e( 'Now on Instagram', 'picante' ) ?></h2>

			<div class="divider"></div>
		
	</div>
</div>
<div class="cl-instafeed owl-carousel owl-theme cl-carousel" data-token="<?php echo codeless_get_mod( 'show_instagram_feed_token' ); ?>" data-userid="<?php echo codeless_get_mod( 'show_instagram_feed_userid' ); ?>">

</div>