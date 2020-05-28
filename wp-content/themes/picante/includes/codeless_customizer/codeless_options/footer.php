<?php

Kirki::add_panel( 'cl_footer', array(
		'priority' => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Footer', 'picante' ),
	    'tooltip' => esc_html__( 'Footer Options and Layout', 'picante' ),
	) );


Kirki::add_section('cl_footer_general', array(
	'title' => esc_html__('General', 'picante') ,
	'tooltip' => esc_html__('General Footer Options', 'picante') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_footer',
			'label'    => esc_html__( 'Show Footer', 'picante' ),
			'tooltip' => esc_html__( 'Switch On/Off Footer on website', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'footer_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_fullwidth',
			'label'    => esc_html__( 'Footer Fullwidth', 'picante' ),
			'tooltip' => esc_html__( 'Switch On if you want footer content without container', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
		    'required'    => array(
				array(
					'setting'  => 'show_footer',
					'operator' => '==',
					'value'    => true,
				),
							
			),
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_layout',
			'label'    => esc_html__( 'Footer Layout', 'picante' ),
			'tooltip' => esc_html__( 'Use this option to change layout of footer. You can use the UI on the page too.', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'select',
			'priority' => 10,
			'default'  => '14_16_16_16_14',
			'choices'     => array(
			    '16_16_16_16_16_16'  => esc_attr__( '6 Columns', 'picante' ),
			    '14_12_14'  => esc_attr__( '1 col (1/4), 1 col (1/2), 1 col (1/4)', 'picante' ),
			    '16_16_16_16_13'  => esc_attr__( '4 cols (1/6) and 1 col (1/3)', 'picante' ),
			    '14_16_16_16_14'  => esc_attr__( '1 col (1/4), 3 col (1/6) and 1 col (1/4)', 'picante' ),
			    '13_16_16_13'  => esc_attr__( '1 col (1/3), 2 col (1/6) and 1 col (1/3)', 'picante' ),
				'14_14_14_14'  => esc_attr__( '4 Columns', 'picante' ),
				'13_13_13'  => esc_attr__( '3 Columns', 'picante' ),
				'12_12'  => esc_attr__( '2 Columns', 'picante' ),
				'11'  => esc_attr__( '1 Column', 'picante' ),
				'14_34'  => esc_attr__( '1/4 3/4', 'picante' ),
				'34_14'  => esc_attr__( '3/4 1/4', 'picante' ),
				'13_23'  => esc_attr__( '1/3 2/3', 'picante' ),
				'23_13'  => esc_attr__( '2/3 1/3', 'picante' ),
			),
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'show_footer',
					'operator' => '==',
					'value'    => true,
				),
							
			),
			'partial_refresh' => array(
		        'footer_layout' => array(
		            'selector'            => 'footer#colophon .footer-content-row',
		            'render_callback'     => 'codeless_build_footer_layout'
		        ),
		    ),
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_centered_content',
			'label'    => esc_html__( 'Footer Centered Content', 'picante' ),
			'tooltip' => esc_html__( 'Switch to center content of column. When 3 columns, its valid for the middle column', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'required',
			
		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_vertical_middle',
			'label'    => esc_html__( 'Footer Vertical Align Middle', 'picante' ),
			'tooltip' => esc_html__( '', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'required',
			
		
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_quicksearches',
			'label'    => esc_html__( 'Show Quick Searches', 'picante' ),
			'tooltip' => esc_html__( 'Show quick searches in footer', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'quicksearches_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_google_map',
			'label'    => esc_html__( 'Show Google Map', 'picante' ),
			'tooltip' => esc_html__( 'Configure Google Map to show on top of footer', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'google_api_key',
			'label'    => esc_html__( 'Google Api key', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'text',
			'priority' => 10,
			'default'  => '',
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),

		    'required'    => array(
				array(
					'setting'  => 'show_google_map',
					'operator' => '==',
					'value'    => true,
				),
							
			),

		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'google_lat_lon',
			'label'    => esc_html__( 'Google Latitude & Longitude', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'text',
			'priority' => 10,
			'default'  => '',
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),

		    'required'    => array(
				array(
					'setting'  => 'show_google_map',
					'operator' => '==',
					'value'    => true,
				),
							
			),

		) );



		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_instagram_feed',
			'label'    => esc_html__( 'Show Instagram Feed', 'picante' ),
			'tooltip' => esc_html__( 'Configure Access Token and User Id', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );



		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_instagram_feed_token',
			'label'    => esc_html__( 'Instagram Feed Token', 'picante' ),
			'tooltip' => esc_html__( '', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'text',
			'priority' => 10,
			'default'  => '',
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),

		    'required'    => array(
				array(
					'setting'  => 'show_instagram_feed',
					'operator' => '==',
					'value'    => true,
				),
							
			),

		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_instagram_feed_userid',
			'label'    => esc_html__( 'Instagram Feed User Id', 'picante' ),
			'tooltip' => esc_html__( '', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'text',
			'priority' => 10,
			'default'  => '',
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		    'required'    => array(
				array(
					'setting'  => 'show_instagram_feed',
					'operator' => '==',
					'value'    => true,
				),
							
			),

		
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'show_copyright',
			'label'    => esc_html__( 'Show Copyright', 'picante' ),
			'tooltip' => esc_html__( 'Switch On/Off Copyright on website', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'copyright_centered_content',
			'label'    => esc_html__( 'Copyright centered content', 'picante' ),
			'tooltip' => esc_html__( 'Switch on to center copyright left widget area.', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'required',
			'required'    => array(
				array(
					'setting'  => 'show_copyright',
					'operator' => '==',
					'value'    => true,
				),
							
			),
		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_reveal_effect',
			'label'    => esc_html__( 'Footer Reveal Effect', 'picante' ),
			'tooltip' => esc_html__( 'Switch On/Off to activate reveal footer effect', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage'
		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'footer_widget_distance',
			'label'       => esc_attr__( 'Distance between widgets', 'picante' ),
			'section'     => 'cl_footer_general',
			'into_group' => true,
			'default'     => '12',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon .widget',
					'units'  => 'px',
					'property' => 'padding-top'
				),
				array(
					'element' => 'footer#colophon .widget',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_dark',
			'label'    => esc_html__( 'Footer Dark Style', 'picante' ),
			'tooltip' => esc_html__( 'Switch On/Off Footer Dark Style Elements', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'footer_special_column',
			'label'    => esc_html__( 'Footer Special Style', 'picante' ),
			'tooltip' => esc_html__( 'A special design effect of the second column of the footer. Used on Footer1', 'picante' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );


Kirki::add_section('cl_footer_design', array(
	'title' => esc_html__('Main Footer Style', 'picante') ,
	'tooltip' => esc_html__('Main Footer Design Options', 'picante') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

		Kirki::add_field('cl_picantee', array(
			'settings' => 'footer_design',
			'label' => esc_html__('Footer Box Design', 'picante') ,
			'section' => 'cl_footer_design',
			'type' => 'css_tool',
			'priority' => 1,
			'default' => array(
				'padding-top' => '50px',
				'padding-bottom' => '35px'
			) ,
			'into_group' => true,
			'transport' => 'postMessage',
		));


		Kirki::add_field('cl_picantee', array(
			'type' => 'select',
			'settings' => 'footer_border_style',
			'label' => esc_html__('Outer Border Style', 'picante'),
			'default' => 'solid',
			'choices' => array(
				'solid' => 'solid',
				'dotted' => 'dotted',
				'dashed' => 'dashed',
				'double' => 'double',
				'groove' => 'groove',
				'ridge' => 'ridge',
				'inset' => 'inset',
				'outset' => 'outset',
			) ,
			'priority' => 1,
			'inline_control' => true,
			'section' => 'cl_footer_design',
			'priority' => 1,
			'output' => array(
				array(
					'element' => 'footer#colophon',
					'property' => 'border-style'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_picantee', array(
			'type' => 'color',
			'settings' => 'footer_outer_border_color',
			'label' => esc_html__('Outer Border Color', 'picante'),
			'default' => '#dbe1e6',
			'inline_control' => true,
			'section' => 'cl_footer_design',
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 1,
			'output' => array(
				array(
					'element' => 'footer#colophon, .footer-quick-searches-content-row .inner',
					'property' => 'border-color'
				)
			) ,
			'transport' => 'auto'
		));


		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'footer_bg_color',
			'label' => esc_html__('BG Color', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => 'footer#colophon, #copyright input, #copyright select, #copyright textarea ',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'footer_dark_bg_color',
			'label' => esc_html__('Second Color', 'picante'),
			'tooltip' => esc_html__('Used for inputs, textarea and other more darken area', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_dark_bg_color' ),
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'footer_button_bg_color',
			'label' => esc_html__('Button BG Color', 'picante'),
			'tooltip' => esc_html__('Used for buttons', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_button_bg_color' ),
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'main_footer_title_typography',
			'label'       => esc_attr__( 'Main Footer Title Typography', 'picante' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'default'     => array(
				'font-family'    => esc_html__('Montserrat', 'picante'),
				'letter-spacing' => '0.04em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '14px',
				'line-height' => '28px',
				'color' => '#262a2c'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'main_footer_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'footer_font_color',
			'label'       => esc_attr__( 'Body Font Color', 'picante' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#8b99a3',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon, footer#colophon.widget_most_popular li .content .date',
					'property' => 'color'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'footer_link_color',
			'label'       => esc_attr__( 'Link Color', 'picante' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#8b99a3',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon a:not(.cl-btn), footer#colophon .widget_rss cite,  footer#colophon .widget_calendar thead th',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'footer_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'picante' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#262a2c',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'footer_border_color',
			'label'       => esc_attr__( 'Inner Borders Color', 'picante' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'default'     => '#dbe1e6',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_border_color' ),
					'property' => 'border-color'
				),

			)
		));
		

		Kirki::add_section('cl_footer_copyright', array(
			'title' => esc_html__('Copyright Style', 'picante') ,
			'tooltip' => esc_html__('Copyright Design Options', 'picante') ,
			'panel' => 'cl_footer',
			'type' => '',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'copyright_bg_color',
			'label' => esc_html__('BG Color', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_footer_copyright',
			'output' => array(
				array(
					'element' => '#copyright',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'copyright_title_typography',
			'label'       => esc_attr__( 'Copyright Typography', 'picante' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => array(
				'font-family'    => esc_html__('Montserrat', 'picante'),
				'letter-spacing' => '0.04em',
				'font-weight' => '400',
				'text-transform' => 'uppercase',
				'font-size' => '14px',
				'line-height' => '18px',
				'color' => '#262a2c'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'copyright_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'copyright_link_color',
			'label'       => esc_attr__( 'Link Color', 'picante' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#262a2c',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright a',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'copyright_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'picante' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#262a2c',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'copyright_border_color',
			'label'       => esc_attr__( 'Borders Color', 'picante' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#fff',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'copyright_border_color' ),
					'property' => 'border-color'
				),

			)
		));

		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'copyright_padding_top',
			'label'       => esc_attr__( 'Content Distance From Top', 'picante' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => '25',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'units'  => 'px',
					'property' => 'padding-top'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'copyright_padding_bottom',
			'label'       => esc_attr__( 'Content Distance From Bottom', 'picante' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => '25',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'copyright_border_top',
			'label'    => esc_html__( 'Add Inner Border Top', 'picante' ),
			'tooltip' => esc_html__( 'Switch on to add inner border top', 'picante' ),
			'section'  => 'cl_footer_copyright',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage'
		
		) );




		Kirki::add_section('cl_top_footer_style', array(
			'title' => esc_html__('Top Footer Style', 'picante') ,
			'tooltip' => esc_html__('Top Footer Style Options', 'picante') ,
			'panel' => 'cl_footer',
			'type' => '',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'topfooter_bg_color',
			'label' => esc_html__('BG Color', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_top_footer_style',
			'output' => array(
				array(
					'element' => '#top_footer',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'topfooter_title_typography',
			'label'       => esc_attr__( 'Top Footer Title Typography', 'picante' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'default'     => array(
				'font-family'    => esc_html__('Montserrat', 'picante'),
				'letter-spacing' => '0.04em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '14px',
				'line-height' => '28px',
				'color' => '#262a2c'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'top_footer_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'topfooter_link_color',
			'label'       => esc_attr__( 'Link Color', 'picante' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#73848e',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer a:not(.tag-cloud-link)',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'topfooter_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'picante' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#222',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'color',
			'settings'    => 'topfooter_border_color',
			'label'       => esc_attr__( 'Borders Color', 'picante' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#dbe1e6',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'topfooter_border_color' ),
					'property' => 'border-color'
				),

			)
		));

		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'topfooter_padding_top',
			'label'       => esc_attr__( 'Content Distance From Top', 'picante' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'default'     => '38',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer',
					'units'  => 'px',
					'property' => 'padding-top'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'topfooter_padding_bottom',
			'label'       => esc_attr__( 'Content Distance From Bottom', 'picante' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'default'     => '37',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'topfooter_border_top',
			'label'    => esc_html__( 'Add Border Top', 'picante' ),
			'tooltip' => esc_html__( 'Switch on to add border top', 'picante' ),
			'section'  => 'cl_top_footer_style',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage'
		
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'topfooter_unique_style',
			'label'    => esc_html__( 'Unique Centered Style Widget', 'picante' ),
			'tooltip' => esc_html__( 'By activate this option, the top footer area will be shown centered with a background image. You can change the Content of this area on Widgets -> Top Footer Left.', 'picante' ),
			'section'  => 'cl_top_footer_style',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage'
		
		) );


		Kirki::add_field('cl_picantee', array(
			'settings' => 'topfooter_unique_style_bg',
			'label' => esc_html__('Background of highlighted section', 'picante') ,
			'tooltip' => esc_html__('', 'picante') ,
			'section' => 'cl_top_footer_style',
			'type' => 'image',
			'priority' => 10,
			'default' => '',
			'required' => array(
				array(
					'setting' => 'topfooter_unique_style',
					'operator' => '==',
					'value' => 1,
				) ,
			) ,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.topfooter-unique-style',
					'property' => 'background-image'
				)
			),
		));

?>