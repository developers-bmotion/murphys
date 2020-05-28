<div class="wrapper postbox with-pad">

	<h2 class="box-title"><?php esc_html_e( 'Header Wizard', 'picante' ) ?></h2>

	<div class="inner-wrapper">

		<div class="list-item">
			<h4><?php esc_html_e('Header Wizard', 'picante' ) ?></h4>
			<p><?php esc_html_e('Install any of listed headers with only one click. You can change it anytime!', 'picante' ) ?></p>
		</div>


		<p>
            <a id="headerSetupBtn" name="<?php esc_attr_e('Select Header', 'picante') ?>" href="/TB_inline?width=960&height=600&inlineId=importer_header_dialog"  class="button-primary codeless-hint-qtip thickbox"><?php esc_html_e( 'Header Wizard', 'picante' ); ?></a>
        </p>

	</div>

</div>

<?php include_once(get_template_directory() . '/includes/codeless_theme_panel/views/header_importer.php'); ?>