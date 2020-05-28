<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_style('ilightbox', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css' ); ?>

<div class="cl_video_lightbox cl-element" <?php $this->generateStyle('.cl_video_lightbox', '', true); ?>>
	<?php if( $video == 'self' ): ?>
		<a href="<?php echo esc_url( $video_mp4 ) ?>" class="lightbox self-hosted play" data-options="width:848, height:480, html5video: { webm: '<?php echo esc_url( $video_webm ) ?>' }"></a>
	<?php endif; ?>

	<?php if( $video == 'youtube' ): ?>
		<a href="<?php echo esc_url( $video_youtube ) ?>" class="lightbox youtube play" data-options="width:848, height:480"></a>
	<?php endif; ?>

	<?php if( $video == 'vimeo' ): ?>
		<a href="<?php echo esc_url( $video_vimeo ) ?>" class="lightbox vimeo play" data-options="width:848, height:480"></a>
	<?php endif; ?>
</div>