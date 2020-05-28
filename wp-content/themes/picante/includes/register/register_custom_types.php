<?php

// Register Portfolio

$argsPortfolio = array(

	'post_type' => 'portfolio',

	'taxonomy' => 'portfolio_entries',

	'labels' => array( 

		'name' => _x('Portfolio Items', 'post type general name', 'picante' ),

		'singular_name' => _x('Portfolio Entry', 'post type singular name', 'picante' ),

		'add_new' => _x('Add New', 'portfolio', 'picante' ),

		'add_new_item' => esc_html__('Add New Portfolio Entry', 'picante' ),

		'edit_item' => esc_html__('Edit Portfolio Entry', 'picante' ),

		'new_item' => esc_html__('New Portfolio Entry', 'picante' ),

		'view_item' => esc_html__('View Portfolio Entry', 'picante' ),

		'search_items' => esc_html__('Search Portfolio Entries', 'picante' ),

		'not_found' =>  esc_html__('No Portfolio Entries found', 'picante' ),

		'not_found_in_trash' => esc_html__('No Portfolio Entries found in Trash', 'picante' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Portfolio Categories', 'picante' ),

	'slugRule' => codeless_get_mod( 'portfolio_slug', 'portfolio' ),

	'show_in_customizer' => true

);



codeless_register_post_type( $argsPortfolio );



// Register Staff

$argsStaff = array(

	'post_type' => 'staff',

	'taxonomy' => 'staff_entries',

	'labels' => array(

		'name' => _x('Team', 'post type general name', 'picante' ),

		'singular_name' => _x('Staff Entry', 'post type singular name', 'picante' ),

		'add_new' => _x('Add New', 'staff', 'picante' ),

		'add_new_item' => esc_html__('Add New Staff Entry', 'picante' ),

		'edit_item' => esc_html__('Edit Staff Entry', 'picante' ),

		'new_item' => esc_html__('New Staff Entry', 'picante' ),

		'view_item' => esc_html__('View Staff Entry', 'picante' ),

		'search_items' => esc_html__('Search Staff Entries', 'picante' ),

		'not_found' =>  esc_html__('No Staff Entries found', 'picante' ),

		'not_found_in_trash' => esc_html__('No Staff Entries found in Trash', 'picante' ), 

		'parent_item_colon' => ''
	),

	'taxonomy_label' => esc_html__( 'Staff Categories', 'picante' ),

	'slugRule' => codeless_get_mod( 'staff_slug', 'staff' ),

	'show_in_customizer' => true

);


codeless_register_post_type( $argsStaff );



// Register Testimonial

$argsTestimonial = array(

	'post_type' => 'testimonial',

	'taxonomy' => 'testimonial_entries',

	'labels' => array(

		'name' => _x('Testimonials', 'post type general name', 'picante' ),

		'singular_name' => _x('Testimonial Entry', 'post type singular name', 'picante' ),

		'add_new' => _x('Add New', 'testimonial', 'picante' ),

		'add_new_item' => esc_html__('Add New Testimonial Entry', 'picante' ),

		'edit_item' => esc_html__('Edit Testimonial Entry', 'picante' ),

		'new_item' => esc_html__('New Testimonial Entry', 'picante' ),

		'view_item' => esc_html__('View Testimonial Entry', 'picante' ),

		'search_items' => esc_html__('Search Testimonial Entries', 'picante' ),

		'not_found' =>  esc_html__('No Testimonial Entries found', 'picante' ),

		'not_found_in_trash' => esc_html__('No Testimonial Entries found in Trash', 'picante' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Testimonial Categories', 'picante' ),

	'slugRule' => codeless_get_mod( 'testimonial_slug', 'testimonial' ),

	'show_in_customizer' => true


);


codeless_register_post_type( $argsTestimonial );



// Register Content Blocks

$argsContentBlocks = array(

	'post_type' => 'content_block',

	'taxonomy' => 'content_blocks',

	'labels' => array(

		'name' => _x('Content Blocks', 'post type general name', 'picante' ),

		'singular_name' => _x('Content Block', 'post type singular name', 'picante' ),

		'add_new' => _x('Add New', 'content_block', 'picante' ),

		'add_new_item' => esc_html__('Add New Content Block', 'picante' ),

		'edit_item' => esc_html__('Edit Content Block', 'picante' ),

		'new_item' => esc_html__('New Content Block', 'picante' ),

		'view_item' => esc_html__('View Content Block', 'picante' ),

		'search_items' => esc_html__('Search Content Blocks', 'picante' ),

		'not_found' =>  esc_html__('No Content Blocks found', 'picante' ),

		'not_found_in_trash' => esc_html__('No Content Blocks found in Trash', 'picante' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Content Blocks Categories', 'picante' ),

	'slugRule' => codeless_get_mod( 'content_block_slug', 'content_block' ),

	'show_in_customizer' => false


);


codeless_register_post_type( $argsContentBlocks );



// Register Careers

$argsCareers = array(

	'post_type' => 'career',

	'taxonomy' => 'career_entries',

	'labels' => array(

		'name' => _x('Careers', 'post type general name', 'picante' ),

		'singular_name' => _x('Career Entry', 'post type singular name', 'picante' ),

		'add_new' => _x('Add New', 'career', 'picante' ),

		'add_new_item' => esc_html__('Add New Career Entry', 'picante' ),

		'edit_item' => esc_html__('Edit Career Entry', 'picante' ),

		'new_item' => esc_html__('New Career Entry', 'picante' ),

		'view_item' => esc_html__('View Career Entry', 'picante' ),

		'search_items' => esc_html__('Search Career Entries', 'picante' ),

		'not_found' =>  esc_html__('No Career Entries found', 'picante' ),

		'not_found_in_trash' => esc_html__('No Career Entries found in Trash', 'picante' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Career Categories', 'picante' ),

	'slugRule' => codeless_get_mod( 'career_slug', 'career_items' ),

	'show_in_customizer' => true


);


codeless_register_post_type( $argsCareers );



/* Restaurant Menus */

$argsMenus = array(

	'post_type' => 'restaurant_menu',

	'taxonomy' => 'restaurant_menus_entries',

	'labels' => array( 

		'name' => _x('Restaurant Menu', 'post type general name', 'picante' ),

		'singular_name' => _x('Restaurant Menu', 'post type singular name', 'picante' ),

		'add_new' => _x('Add New', 'multiscroll', 'picante' ),

		'add_new_item' => esc_html__('Add New Restaurant Menu', 'picante' ),

		'edit_item' => esc_html__('Edit Restaurant Menu', 'picante' ),

		'new_item' => esc_html__('New Restaurant Menu', 'picante' ),

		'view_item' => esc_html__('View Restaurant Menu', 'picante' ),

		'search_items' => esc_html__('Search Restaurant Menu', 'picante' ),

		'not_found' =>  esc_html__('No Restaurant Menu found', 'picante' ),

		'not_found_in_trash' => esc_html__('No Restaurant Menus found in Trash', 'picante' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Restaurant Menu Category', 'picante' ),

	'slugRule' => 'restaurant_menu',

	'show_in_customizer' => false

);



codeless_register_post_type( $argsMenus );

?>