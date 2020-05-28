<?php
/**
 * Blog Template Part for displaying single blog related posts
 *
 * @package picante
 * @subpackage Blog Parts
 * @since 1.0.0
 *
 */
?>

<div class="entry-single-related">
	<h4 class="single-blog-extra-heading"><?php esc_html_e( 'Related Posts', 'picante' ) ?></h4>
	<div class="related-wrapper"><?php codeless_single_post_related() ?></div>
</div>
