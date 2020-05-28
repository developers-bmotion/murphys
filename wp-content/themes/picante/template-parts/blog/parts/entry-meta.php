<div class="entry-meta">
				
	<?php foreach( codeless_get_post_entry_meta() as $entry_meta ): ?>
		<div class="entry-meta-single <?php echo esc_attr( $entry_meta['id'] ) ?>">
			<?php if( ! empty( $entry_meta['prepend'] ) ): ?>
				<span class="entry-meta-prepend"><?php echo codeless_complex_esc( $entry_meta['prepend']) ?></span>
			<?php endif; ?>
			<?php echo wp_kses_post( $entry_meta['value'] ); ?>

			<?php if( ! empty( $entry_meta['append'] ) ): ?>
				<span class="entry-meta-append"><?php echo esc_html( $entry_meta['append']) ?></span>
			<?php endif; ?>

		</div><!-- .entry-meta-single -->
	<?php endforeach; ?>
				
</div><!-- .entry-meta -->