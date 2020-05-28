<?php



	Kirki::add_panel( 'cl_general', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'General', 'picante' ),
	    'tooltip' => esc_html__( 'All General Options of theme', 'picante' ),
	) );




	/* General */
	Kirki::add_section( 'cl_general_options', array(
	    'title'          => esc_html__( 'Site Options', 'picante' ),
	    'tooltip'    => esc_html__( 'Some options about responsive and theme features.', 'picante' ),
	    'panel'          => 'cl_general',
	    'type'           => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'responsive_layout',
			'label'    => esc_html__( 'Responsive Layout', 'picante' ),
			'tooltip' => esc_html__( 'Turn On / Off Responsive functionalities', 'picante' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'transport' => 'postMessage',
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'picante' ),
				0 => esc_attr__( 'Disable', 'picante' ),
			),
		) );




		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'nicescroll',
			'label'    => esc_html__( 'Smooth scroll', 'picante' ),
			'tooltip' => esc_html__('Active smoothscroll over pages to make scrolling more fluid to create better user experience', 'picante' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'transport' => 'postMessage',
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'picante' ),
				0 => esc_attr__( 'Disable', 'picante' ),
			),
		) );


		/*Kirki::add_field( 'cl_picantee', array(
			'settings' => 'favicon',
			'label'    => esc_html__( 'Favicon', 'picante' ),
			'tooltip' => esc_html__( 'Upload favion for website', 'picante' ),
			'section'  => 'cl_general_options',
			'type'     => 'image',
			'default' => '',
		) );*/

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'page_comments',
			'label'    => esc_html__( 'Page Comments', 'picante' ),
			'tooltip'    => esc_html__( 'Enable this option to active comments in normal pages.', 'picante' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'transport' => 'postMessage',
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'picante' ),
				0 => esc_attr__( 'Disable', 'picante' ),
			),
		) );

		/*Kirki::add_field( 'cl_picantee', array(
			'settings' => 'theme_disabled_vc',
			'label'    => esc_html__( 'VC Theme-Disabled Features', 'picante' ),
			'tooltip'    => esc_html__( 'By enable this, all features and elements that are disabled should be enable again.', 'picante' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'picante' ),
				0 => esc_attr__( 'Disable', 'picante' ),
			),
		) );*/

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'back_to_top',
			'label'    => esc_html__( 'Back To Top', 'picante' ),
			'tooltip'    => esc_html__( 'Enable this option to show the "Back to Top" button on site', 'picante' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Show', 'picante' ),
				0 => esc_attr__( 'Hide', 'picante' ),
			),
			'transport' => 'postMessage'
		) );

		

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'textarea',
			'settings'    => '404_error_message',
			'label'       => esc_attr__( '404 Error Message', 'picante' ),
			'section'     => 'cl_general_options',
			'default'     => esc_html__('It looks like nothing was found at this location. Maybe try a search?', 'picante' ),
			'priority'    => 10,
			
			'required'    => array(
				array(
					'setting'  => 'logo_type',
					'operator' => '==',
					'value'    => 'font',
				),
			),
			'transport' => 'postMessage'
		) );






	

		

	/* Page Transitions */
	Kirki::add_section( 'cl_general_transitions', array(
	    'title'          => esc_html__( 'Page Transitions', 'picante' ),
	    'tooltip'    => esc_html__( 'Options to enable page transitions with various effects', 'picante' ),
	    'panel'          => 'cl_general',
	    'priority'       => 160,
	    'type'			 => '',
	    'capability'     => 'edit_theme_options'
	) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'codeless_page_transition',
			'label'    => esc_html__( 'On/Off Page Transitions', 'picante' ),
			'section'  => 'cl_general_transitions',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'picante' ),
				0 => esc_attr__( 'Disable', 'picante' ),
			),
		) );

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'page_transition_in',
			'label'       => esc_html__( 'Page Transition In Effect', 'picante' ),
			'section'     => 'cl_general_transitions',
			'default'     => 'fade-in',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => array(
				'fade-in' => 'fade-in',
                'fade-in-up-sm' => 'fade-in-up-sm',
                'fade-in-up' => 'fade-in-up',
                'fade-in-up-lg' => 'fade-in-up-lg',
                'fade-in-down-sm' => 'fade-in-down-sm',
                'fade-in-down-lg' => 'fade-in-down-lg',
                'fade-in-down' => 'fade-in-down',
                'fade-in-left-sm' => 'fade-in-left-sm',
                'fade-in-left' => 'fade-in-left',
                'fade-in-left-lg' => 'fade-in-left-lg',
                'fade-in-right-sm' => 'fade-in-right-sm',
                'fade-in-right' => 'fade-in-right',
                'fade-in-right-lg' => 'fade-in-right-lg',
			),
			
			'required'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'page_transition_in_duration',
			'label'    => esc_html__( 'Page Transition In Duration', 'picante' ),
			'section'  => 'cl_general_transitions',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 1000,
			'choices'     => array(
				'min' => '0',
				'max' => '10000',
				'step' => '50'
			),
			
			'required'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) );


		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'page_transition_out',
			'label'       => esc_html__( 'Page Transition Out Effect', 'picante' ),
			'section'     => 'cl_general_transitions',
			'default'     => 'fade-out',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => array(
				'fade-out' => 'fade-out',
                'fade-out-up-sm' => 'fade-out-up-sm',
                'fade-out-up' => 'fade-out-up',
                'fade-outout-up-lg' => 'fade-out-up-lg',
                'fade-out-down-sm' => 'fade-out-down-sm',
                'fade-out-down-lg' => 'fade-out-down-lg',
                'fade-out-down' => 'fade-out-down',
                'fade-out-left-sm' => 'fade-out-left-sm',
                'fade-out-left' => 'fade-out-left',
                'fade-out-left-lg' => 'fade-out-left-lg',
                'fade-out-right-sm' => 'fade-out-right-sm',
                'fade-out-right' => 'fade-out-right',
                'fade-out-right-lg' => 'fade-out-right-lg',
			),
			
			'required'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		));

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'page_transition_out_duration',
			'label'    => esc_html__( 'Page Transition Out Duration', 'picante' ),
			'section'  => 'cl_general_transitions',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 1000,
			'choices'     => array(
				'min' => '0',
				'max' => '10000',
				'step' => '50'
			),
			
			'required'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) );




	/* Custom Codes */
	Kirki::add_section( 'cl_general_custom_codes', array(
	    'title'          => esc_html__( 'Custom Codes', 'picante' ),
	    'tooltip'    => esc_html__( 'HTML, JS, CSS custom codes. Add Google Analytics or anything else.', 'picante' ),
	    'panel'          => 'cl_general',
	    'priority'       => 160,
	    'type'			 => '',
	    'capability'     => 'edit_theme_options'
	) );


		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'code',
			'settings'    => 'custom_css',
			'label'       => esc_html__( 'Custom CSS', 'picante' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => '',
			'priority'    => 10,
			'choices'     => array(
				'language' => 'css',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'code',
			'settings'    => 'custom_js',
			'label'       => esc_html__( 'Custom JS', 'picante' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => '',
			'priority'    => 10,
			'choices'     => array(
				'language' => 'js',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'code',
			'settings'    => 'custom_html',
			'label'       => esc_html__( 'Custom HTML', 'picante' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => '',
			'priority'    => 10,
			'choices'     => array(
				'language' => 'html',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
		) );

?>