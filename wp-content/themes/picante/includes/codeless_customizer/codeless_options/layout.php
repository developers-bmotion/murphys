<?php

Kirki::add_section( 'cl_layout', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Layout', 'picante' ),
	    'tooltip' => esc_html__( 'Overall site layout options', 'picante' ),
	) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'layout',
			'label'    => esc_html__( 'All Pages Layout', 'picante' ),
			'tooltip' => esc_html__( 'The general website layout. This can be overwrite from Blog Layout and from single page/post layouts', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'picante' )
			),
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'search_page_layout',
			'label'    => esc_html__( 'Search Page Layout', 'picante' ),
			'tooltip' => esc_html__( '', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'picante' )
			),
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'boxed_layout',
			'label'    => esc_html__( 'Boxed Layout', 'picante' ),
			'tooltip' => esc_html__( 'Switch on if you want to make all page boxed', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'boxed_layout_width',
			'label'    => esc_html__( 'Boxed Wrapper Width', 'picante' ),
			'tooltip' => esc_html__( 'Define boxed wrapper width in pixel.', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '1200',
			'choices'     => array(
				'min'  => '970',
				'max'  => '1600',
				'step' => '10',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.cl-boxed-layout',
					'units' => 'px',
					'property' => 'width',
					'media_query' => '@media (min-width: 992px)'
				),
			)
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'layout_container_width',
			'label'    => esc_html__( 'Site Container Width', 'picante' ),
			'tooltip' => esc_html__( 'Define site container width in pixel. A max-width:100% is set to not destroy the layout on smaller screens. It\'s applied on min-width media screens: 1200px', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '1180',
			'choices'     => array(
				'min'  => '970',
				'max'  => '1600',
				'step' => '10',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.container',
					'units' => 'px',
					'property' => 'width',
					'media_query' => '@media (min-width: 1200px)'
				),
			)
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'sidebar_sticky',
			'label'    => esc_html__( 'Sticky Sidebar', 'picante' ),
			'tooltip' => esc_html__( 'Switch on if you want to make sidebar sticky on page scroll', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'sidebar_sticky_offset',
			'label'    => esc_html__( 'Sidebar Sticky Offset', 'picante' ),
			'tooltip' => esc_html__( 'If you leave 0, sidebar will be sticky from top. If you select 2 for example, sidebar will be sticky only for the last 2 widgets of sidebar not for the all sidebar.', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				'min'  => 0,
				'max'  => 15,
				'step' => 1,
			),
			'inline_control' => true,
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'sidebar_sticky',
					'operator' => '==',
					'value'    => true,
				),
								
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'layout_modern',
			'label'    => esc_html__( 'Layout Modern', 'picante' ),
			'tooltip' => esc_html__( 'Switch if you want to make web layout with sidebar background color. You can change color on Styling ', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'layout_bordered',
			'label'    => esc_html__( 'Layout Bordered', 'picante' ),
			'tooltip' => esc_html__( 'Add a transparent border of 20px around webpages (all pages).', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'refresh',
		) );
		
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'inner_content_padding_top',
			'label'    => esc_html__( 'Inner Content Distance from Top', 'picante' ),
			'tooltip' => esc_html__( 'Define the default distance of Inner Content ( Content / Sidebar ) from Header ( Header / Page Header / Other inserted elements ). Usable with: Pages without page builder, blog, defined page templates, posts.', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.inner-content-row',
					'units' => 'px',
					'property' => 'padding-top'
				),
			)
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'inner_content_padding_bottom',
			'label'    => esc_html__( 'Inner Content Distance from Bottom', 'picante' ),
			'tooltip' => esc_html__( 'Define the default distance of Inner Content ( Content / Sidebar ) from Footer. Usable with: Pages without page builder, blog, defined page templates, posts.', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.inner-content-row',
					'units' => 'px',
					'property' => 'padding-bottom'
				),
			)
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'row_default_padding',
			'label'    => esc_html__( 'Row Elements Default Padding', 'picante' ),
			'tooltip' => esc_html__( 'Define a default padding-top and padding-bottom for each new row when added with Codeless Builder. Need save and refresh for apply.', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '45',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'column_default_padding',
			'label'    => esc_html__( 'Column Elements Default Padding', 'picante' ),
			'tooltip' => esc_html__( 'Define a default padding-top and padding-bottom for each new column when added with Codeless Builder. Need save and refresh for apply. in px', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '10',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'elements_default_margin',
			'label'    => esc_html__( 'Elements Default Margin Top', 'picante' ),
			'tooltip' => esc_html__( 'Define a default margin-top for each new element when added with Codeless Builder. Need save and refresh for apply. in px', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '20',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_article_distance',
			'label'    => esc_html__( 'Distance between blog entries', 'picante' ),
			'tooltip' => esc_html__( 'Define distance in pixel between Blog Entries in Blog Page', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '80',
			'choices'     => array(
				'min'  => '0',
				'max'  => '160',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.blog-entries article',
					'units' => 'px',
					'property' => 'margin-bottom'
				),
			)
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'portfolio_distance',
			'label'    => esc_html__( 'Distance between portfolio items', 'picante' ),
			'tooltip' => esc_html__( 'Define distance in pixel between Portfolio Items', 'picante' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '15',
			'choices'     => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
			'output' => array(
				array(
					'element' => '#portfolio-entries .portfolio_item',
					'units' => 'px',
					'property' => 'padding'
				),
			)
		) );


?>