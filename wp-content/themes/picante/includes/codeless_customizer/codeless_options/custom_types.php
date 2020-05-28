<?php

    Kirki::add_panel( 'cl_custom_types', array(
	    'priority'    => 20,
	    'type' => '',
	    'title'       => esc_html__( 'Custom Types', 'picante' ),
	    'tooltip' => esc_html__( 'All Custom Types Options', 'picante' ),
	) );
	    
	    
	    Kirki::add_section( 'cl_custom_portfolio', array(
    	    'title'          => esc_html__( 'Portfolio', 'picante' ),
    	    'tooltip'    => esc_html__( 'All Portfolio Page and single options', 'picante' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );

    	Kirki::add_section( 'cl_custom_staff', array(
    	    'title'          => esc_html__( 'Staff', 'picante' ),
    	    'tooltip'    => esc_html__( 'All Staff (Members) options', 'picante' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );
 
    	Kirki::add_section( 'cl_custom_testimonial', array(
    	    'title'          => esc_html__( 'Testimonial', 'picante' ),
    	    'tooltip'    => esc_html__( 'All Testimonial options', 'picante' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );
    	

    	Kirki::add_field( 'cl_picantee', array(

			'settings' => 'portfolio_slug',
			'label'    => esc_html__( 'Portfolio Slug', 'picante' ),
			'tooltip' => esc_html__( 'Used as prefix for portfolio items links', 'picante' ),
			'section'  => 'cl_custom_portfolio',
			'type'     => 'text',
			'default'  => 'portfolio_items',
			'transport' => 'postMessage'

		) );

    	Kirki::add_field( 'cl_picantee', array(
			'settings' => 'portfolio_main_page',
			'label'    => esc_html__( 'Portfolio Main Page', 'picante' ),
			'tooltip' => esc_html__( 'Set portfolio main page, useful in portfolio single navigation.', 'picante' ),
			'section'  => 'cl_custom_portfolio',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'none',
			'transport' => 'postMessage',
			'choices'  =>   codeless_get_pages()
		) );

			
			

?>