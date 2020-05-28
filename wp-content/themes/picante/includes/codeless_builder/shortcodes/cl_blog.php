<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
                   
wp_reset_postdata();

// Element ID
$blog_id = 'cl_blog_' . str_replace( ".", '-', uniqid("", true) );


if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

/* Image Filters */
if( $image_filter != 'normal' )
    wp_enqueue_style('codeless-image-fitlers', CODELESS_BASE_URL.'css/codeless-image-filters.css' );

// Vars of portfolio
$categories = codeless_js_object_to_array($categories);

$posts_per_page_ = (int) $posts_per_page;
// Blog News Posts Per page
if( $blog_style == 'news' && $blog_news == 'grid_1' )
	$posts_per_page_ = 4;
if( $blog_style == 'news' && $blog_news == 'grid_2' )
	$posts_per_page_ = 5;
if( $blog_style == 'news' && $blog_news == 'grid_3' )
	$posts_per_page_ = 4;


// Build New Query
$new_query = array( 'orderby'   => $orderby, 
                    'order'     => $order,
                    'posts_per_page' => $posts_per_page
); 

if( ! empty( $categories ) && is_array( $categories ) && count( $categories ) > 0 && !empty($categories[0]) )
	$new_query['cat'] = $categories;

$paged_attr = 'paged';

if( is_front_page() )
	$paged_attr = 'page';

if( get_query_var( $paged_attr ) )
	$new_query['paged'] = get_query_var( $paged_attr );


/* Used for related posts */

if( isset( $related ) && (int) $related != 0 ){
	$tags = wp_get_post_tags($related);
	if ($tags){
		
		$tag_list = array();

		foreach( $tags as $tag ){
			$tag_list[] = $tag->term_id;
		}


		$new_query = array( 
			'tag__in' => $tag_list,
			'post__not_in' => array($related),
			'posts_per_page' => $posts_per_page,
			'ignore_sticky_posts'=>1
		);
	}
}
	

global $cl_from_element;

if( $blog_style == 'masonry' ){
	$blog_style = 'grid';
	$cl_from_element['blog_masonry'] = true;
}

$filterable_class = '';

$cl_from_element['blog_style'] = $blog_style;
$cl_from_element['blog_grid_layout'] = $blog_grid_layout;
$cl_from_element['blog_pagination'] = $blog_pagination;
$cl_from_element['blog_distance'] = $distance;
$cl_from_element['blog_button_style'] = $blog_pagination;
$cl_from_element['blog_animation'] = $blog_pagination;
$cl_from_element['blog_excerpt_length'] = 60;
$cl_from_element['blog_animation'] = $blog_animation;
$cl_from_element['blog_news'] = $blog_news;
$cl_from_element['blog_image_filter'] = $image_filter;
$cl_from_element['blog_lazyload'] = $blog_image_lazyload;
$cl_from_element['blog_from_element'] = true;
$cl_from_element['blog_image_size'] = $image_size;
$cl_from_element['blog_related_posts'] = $related;

if( $blog_style == 'default' && isset( $cl_from_element['blog_with_filters'] ) && $cl_from_element['blog_with_filters'] )
	$cl_from_element['blog_grid_layout'] = 1;

$filters_id = '';

if( isset( $cl_from_element['blog_with_filters'] ) && $cl_from_element['blog_with_filters']  ){
	$cl_from_element['blog_masonry'] = true;
	$filters_id = $cl_from_element['blog_with_filters'];
	$filterable_class = 'filterable-entries';
}


if( $blog_style == 'masonry' ){
	$cl_from_element['blog_entry_meta_author'] = false;
    $cl_from_element['blog_entry_meta_categories'] = false;
}




add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 999 );

$the_query = new WP_Query( $new_query );

						
// Display posts
if ( $the_query->have_posts() ) :


?>
<?php $extra_style = ' margin-left:-'.$distance.'px; margin-right:-'.$distance.'px; '; ?>

<div id="<?php echo esc_attr( $blog_id ) ?>" class="cl_blog cl-element <?php echo esc_attr( $this->generateClasses('.cl_blog') ) ?>" <?php $this->generateStyle('.cl_blog', $extra_style, true) ?>>


	<div class="blog-entries <?php echo esc_attr( $filterable_class ) ?> <?php echo esc_attr( $this->generateClasses('.cl_blog > .blog-entries') ) ?> <?php echo esc_attr( codeless_extra_classes( 'blog_entries' ) ) ?>" <?php echo codeless_extra_attr( 'blog_entries' ) ?> <?php  $this->generateStyle('.cl_blog > .blog-entries', '', true) ?> data-filters-id="<?php echo esc_attr( $filters_id ) ?>">
		
	

	<?php
									
		// Loop counter
		$i = 0;
		codeless_loop_counter($i);						
		// Start loop
		while ( $the_query->have_posts() && $posts_per_page_ >= ( $i + 1 ) ) : $the_query->the_post();
			
			if( ! has_post_thumbnail() && ( $blog_style == 'media' || $blog_style == 'news' ) )
				continue;

			codeless_loop_counter(++$i);	
			/*
			 * Get Blog Template Style
			 * Codeless_blog_style returns the style selected
			 * from Theme Options or a custom filter
			 */
			get_template_part( 'template-parts/blog/style', codeless_blog_style() );
				
		// End loop
		endwhile; ?>
				
	</div><!-- #blog-entries -->
				
	<?php
		// Display post pagination (next/prev - 1,2,3,4..)
		if( $blog_pagination )
			codeless_blog_pagination( $the_query ) ; 
		wp_reset_postdata();
	?>
	</div><!-- .cl_blog -->
	<?php				
	else : ?>
				
		<div class="content-none"><?php esc_html_e( 'No Posts found.', 'picante' ); ?></div>
				
	<?php endif; ?>
