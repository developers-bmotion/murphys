<?php

    Kirki::add_panel( 'cl_custom_types', array(
	    'priority'    => 10,
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
		    			'settings' => 'portfolio_style',
		    			'label'    => esc_html__( 'Portfolio Style', 'picante' ),
		    			'tooltip' => esc_html__( 'Select style of portfolio pages', 'picante' ),
		    			'section'  => 'cl_custom_portfolio',
		    			'type'     => 'select',
						'priority' => 10,
						'default'  => 'default',
						'choices'     => array(
							'default'  => esc_attr__( 'Default', 'picante' ),
							'alternate'  => esc_attr__( 'Alternate', 'picante' ),
							'minimal'  => esc_attr__( 'Minimal', 'picante' ),
							'timeline'  => esc_attr__( 'Timeline', 'picante' ),
							'grid'  => esc_attr__( 'Grid', 'picante' ),
							'masonry' => esc_attr__( 'Masonry', 'picante' ),
						),
		    			'transport' => 'postMessage',
		
		    		) );

?>