<div class="wrapper postbox with-pad">

	<h2 class="box-title"><?php esc_html_e( 'Setup Wizard', 'picante' ) ?></h2>

	<div class="inner-wrapper">

		<div class="list-item">
			<h4><?php esc_html_e('1-click theme setup', 'picante') ?></h4>
			<p><?php esc_html_e('By click Setup Now, a new window will appear with the Setup Wizard. Follow the instructions and you\'re done!', 'picante') ?></p>
		</div>

		<div class="list-item">
			<h4><?php esc_html_e('Template, Plugins, Photos, everything...', 'picante' ) ?></h4>
			<p><?php esc_html_e('Not only template, but all needed plugins, photos and widgets for each demo!', 'picante' ) ?></p>
		</div>


		<p>
            <a id="setupBtn" name="<?php esc_attr_e('Select Template', 'picante') ?>" href="/TB_inline?width=960&height=600&inlineId=importer_dialog"  class="button-primary codeless-hint-qtip thickbox"><?php esc_html_e( 'Setup Now', 'picante' ); ?></a>
        </p>

	</div>

</div>

<?php include_once(get_template_directory() . '/includes/codeless_theme_panel/views/importer.php'); ?>