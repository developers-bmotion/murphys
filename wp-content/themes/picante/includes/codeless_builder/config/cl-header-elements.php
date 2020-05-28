<?php
	
	Kirki::add_section( 'cl_codeless_header_builder', array(
	    'title'          => esc_html__( 'Header Builder', 'picante' ),
	    'description'    => esc_html__( 'Options for adding an additional element on header', 'picante' ),
	    'panel'          => '',
	    'type'			 => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );
	
	
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Menu', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'icon'		  => 'icon-basic-todo-txt',
			'transport'   => 'postMessage',
			'settings'    => 'cl_header_menu',
			'fields'	  => array(

				'general' => array(
						'type' => 'group_start',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'general'
				),

					'menu_id' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Menu to display', 'picante' ),
						'default'     => 'default',
						'choices' => codeless_get_all_wordpress_menus(),
						'reloadTemplate' => true,
					),

					'vertical_menu' => array( 
						'type'        => 'switch',
						'label'       => esc_html__( 'Vertical Menu', 'picante' ),
						'tooltip' => esc_html__('Works only on fullscreen overlay menu or other vertical header type.', 'picante'),
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'picante' ),
							'off' => esc_attr__( 'Off', 'picante' ),
						),
						'selector' => '#navigation',
						'addClass' => 'vertical-menu',
					),

					'use_for_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Use For Responsive', 'picante' ),
								'description' => esc_html__('Switch On to use this Navigation for responsive', 'picante'),
								'default'     => 1,
								'priority'    => 10,
								'selector' => '.cl-primary-navigation',
								'addClass' => 'use-for-responsive',
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true
					),

					'open_menu_button' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show Open Menu Button in-place.', 'picante' ),
								'tooltip' => esc_html__('Switch On to show the Open Menu Button in-place, if you leave off, the menu button will be shown in Tools elements instead. Use this when Tools Element is not actived.', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'use_for_responsive',
										'operator' => '==',
										'value'    => 1,
									),
								),
					),

					'responsive_menu' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show other menu in responsive', 'picante' ),
								'description' => esc_html__('Switch on to show another menu in Responsive Header', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'use_for_responsive',
										'operator' => '==',
										'value'    => 1,
									),
								),

					),

					'responsive_menu_id' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Responsive Menu to display', 'picante' ),
						'default'     => 'default',
						'choices' => codeless_get_all_wordpress_menus(),
						'reloadTemplate' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'responsive_menu',
								'operator' => '==',
								'value'    => 1,
							),
						),
					), 

				'general_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'general'
				),

				'hamburger_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Hamburger Menu', 'picante'),
						'groupid' => 'hamburger'
				),
					'hamburger' => array(
						'type'        => 'switch',
						'label'       => esc_html__( 'Hamburger Menu', 'picante' ),
						'description' => esc_html__('Switch On to make this menu appear as Hamburger menu. Select one of styles below.', 'picante'),
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'picante' ),
							'off' => esc_attr__( 'Off', 'picante' ),
						),
						'reloadTemplate' => true
					),

					'hamburger_style' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Hamburger Menu Style', 'picante' ),
						'default'     => 'overlay',
						'choices' => array(
							'overlay' => esc_html__('Fullscreen Overlay', 'picante'),
							'half_overlay' => esc_html__('Half Overlay', 'picante'),
							'inline' => esc_html__('Display Inline', 'picante')
						),
						'reloadTemplate' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

					'hamburger_half_overlay_width' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Overlay Width', 'picante'),
							'default' => '40',
							'selector' => '.cl-half-overlay-menu',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '10',
								'max'  => '100',
								'step' => '1',
								'suffix' => '%'
							),
							'suffix' => '%',
							'cl_required'    => array(
								array(
									'setting'  => 'hamburger_style',
									'operator' => '==',
									'value'    => 'half_overlay',
								),
							),
						),

					'hamburger_overlay_text' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Hamburger Overlay Text', 'picante' ),
						'default' => 'light-text',
						'choices' => array(
							'dark-text' => esc_html__('Dark', 'picante'),
							'light-text' => esc_html__('Light', 'picante')
						),
						'selector' => '.cl-fullscreen-overlay-menu',
						'selectClass' => ' ',

						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

					'hamburger_overlay_bg' => array(
						'type' => 'color',
						'label' => esc_html__('Background Color', 'picante'),
						'default' => 'rgba(0,0,0,0.9)',
						'selector' => '.cl-fullscreen-overlay-menu',
								
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

				'hamburger_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Hamburger', 'picante'),
						'groupid' => 'hamburger'
				),


				'typography_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography'
					),

					'custom_color' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Items Color', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
						),

					'text_color' => array(
							'type' => 'color',
							'label' => esc_html__('Color', 'picante'),
							'default' => '',
							'selector' => 'nav ul li a',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'custom_color',
									'operator' => '==',
									'value'    => 1,
								),
							),
					),
					
						
				

				'typography_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography'
				),

				'Animation_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'animation'
				),

					'item_animation' => array(
						'type'     => 'inline_select',
						'priority' => 10,
					    'label'       => esc_attr__( 'Items Animation Effect', 'picante' ),
						'default'     => 'none',
						'choices' => array(
							'none'	=> esc_html__('None', 'picante'),
							'top-t-bottom' =>	esc_html__('Top-Bottom', 'picante' ),
							'bottom-t-top' =>	esc_html__('Bottom-Top', 'picante'),
							'right-t-left' => esc_html__('Right-Left', 'picante'),
							'left-t-right' => esc_html__('Left-Right', 'picante'),
							'alpha-anim' => esc_html__('Fade-In', 'picante'),	
							'zoom-in' => esc_html__('Zoom-In', 'picante'),	
							'zoom-out' => esc_html__('Zoom-Out', 'picante'),
							'zoom-reverse' => esc_html__('Zoom-Reverse', 'picante'),
								),
						'selector' => '#navigation nav > ul > li'
					),

					'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Delay between items', 'picante' ),
							'default'     => '100',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000',
								'1100' =>	'ms 1100',
								'1200' =>	'ms 1200',
								'1300' =>	'ms 1300',
								'1400' =>	'ms 1400',
								'1500' =>	'ms 1500',
								'1600' =>	'ms 1600',
								'1700' =>	'ms 1700',
								'1800' =>	'ms 1800',
								'1900' =>	'ms 1900',
								'2000' =>	'ms 2000',
							
							),
							
							'cl_required'    => array(
								array(
									'setting'  => 'item_animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'animation_speed' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Speed', 'picante' ),
							'default'     => '500',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000'
								
							
							),
							'selector' => '#navigation nav > ul > li',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'item_animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),

				'animation_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'animation'
				),

			)
			
		));
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Logo', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-star',
			'settings'    => 'cl_header_logo',
			'open_section' => 'logo_type'
			
		));
		
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Tools', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-settings',
			'settings'    => 'cl_header_tools',
			'fields'	  => array(
					
						'search_group' => array(
							'type' => 'group_start',
							'label' => esc_html__('Search', 'picante'),
							'groupid' => 'search'
						), 
						
							'search_button' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Search button', 'picante' ),
								'tooltip' 	  => esc_html__('Activate to show search button. Works better with ', 'picante'),
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true,
								
							),

						'search_group_end' => array(
							'type' => 'group_end',
							'label' => esc_html__('Search Tool', 'picante'),
							'groupid' => 'search'
						),
						
						'shop_group' => array(
							'type' => 'group_start',
							'label' => esc_html__('Shop', 'picante'),
							'groupid' => 'shop'
						),
							
							

							'cart_button' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show Cart', 'picante' ),
								'description' => esc_html__('Show Cart if WooCommerce installed', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true
							),

							
						'shop_group_end' => array(
							'type' => 'group_end',
							'label' => esc_html__('Shop Tools', 'picante'),
							'groupid' => 'shop'
						),

						'force_light_version' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Force Light Version', 'picante' ),
							'description' => esc_html__('Show a Light Version of Tools', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.extra_tools_wrapper',
							'addClass' => 'tools-forced-light',
							'reloadTemplate' => true
						),
			),
			
		));


		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Button', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-signs',
			'settings'    => 'cl_header_button',
			'fields'	  => array(
					
					'btn_title' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl-btn span',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'description' => esc_attr__( 'This will be the label for your link', 'picante' ),
						'default'     => esc_html__('View More', 'picante'),
						'reloadTemplate' => true
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'picante' ),
						'default'     => '#'
					),

					'hide_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Responsive', 'picante' ),
								'description' => esc_html__('Switch On to hide from responsive Header', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'selector' => '.cl-btn',
								'addClass' => 'remove-responsive',
								'reloadTemplate' => true
					), 

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'default' => array('padding-top' => '', 'padding-bottom' => ''),
							'selector' => '.cl-btn-div',
							'css_property' => '',
					),
			),
			
		)); 

		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Icon Text', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-signs',
			'settings'    => 'cl_header_icon_text',
			'fields'	  => array(
					
					'hide_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Responsive', 'picante' ),
								'description' => esc_html__('Switch On to hide from responsive Header', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true
					), 

					'text_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-icon-text .title',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'description' => esc_attr__( 'This will be the label for your link', 'picante' ),
						'default'     => esc_html__('Text for this element. Click to Edit.', 'picante')
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'picante' ),
						'default'     => ''
					),

					'icon' => array(
						'type'     => 'select_icon',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Icon', 'picante' ),
						'default'     => 'cl-icon-phone',
						'selector' => '.cl-icon-text i',
						'selectClass' => ' ',
					),

					'icon_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Size', 'picante' ),
							'description' => esc_attr__( '', 'picante' ),
							'default'     => '16',
							
							'selector' => '.cl-icon-text i',
							'css_property' => 'font-size',
							'choices'     => array(
									'min'  => '10',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
							'suffix' => 'px',
						),

					'space_title' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Space between title and icon', 'picante' ),
							'description' => esc_attr__( '', 'picante' ),
							'default'     => '35',
							
							'selector' => '.cl-icon-text .title',
							'css_property' => 'padding-left',
							'choices'     => array(
									'min'  => '0',
									'max'  => '120',
									'step' => '1',
									'suffix' => 'px'
								),
							'suffix' => 'px',
						),

					'text_color' => array(
							'type' => 'color',
							'label' => esc_html__('Text Color', 'picante'),
							'default' => '',
							'selector' => '.cl-icon-text',
							'css_property' => 'color',
							'alpha' => true,
					),

					'icon_color' => array(
							'type' => 'color',
							'label' => esc_html__('Icon Color', 'picante'),
							'default' => codeless_get_mod( 'primary_color' ),
							'selector' => '.cl-icon-text i',
							'css_property' => 'color',
							'alpha' => true,
					),

			),
			
		));

		/* Text */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Text', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'icon'		  => 'icon-software-font-smallcaps',
			'transport'   => 'postMessage',
			'settings'    => 'cl_header_text',

			'fields' => array(
				'content' => array(
					'type'     => 'text',
					'priority' => 10,
					'selector' => '.cl-text',
					'label'       => esc_attr__( 'Text', 'picante' ),
					'description' => esc_attr__( 'This will be the label for your link', 'picante' ),
					'default'     => esc_html__('Text El', 'picante'),
					'reloadTemplate' => true
				),

				'link' => array(
					'type'     => 'text',
					'priority' => 10,
					'label'       => esc_attr__( 'Link', 'picante' ),
				),

				'hide_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Responsive', 'picante' ),
								'description' => esc_html__('Switch On to hide from responsive Header', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true
				), 

				'margin_paragraphs' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Distance between paragraphs', 'picante'),
							'default' => '10',
							'selector' => '.cl-text p',
							'css_property' => array('margin-top', 'margin-bottom'),
							'choices'     => array(
								'min'  => '0',
								'max'  => '40',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
						),

				'typography_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography'
					),

					'custom_typography' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Typography', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
						),

					
					'text_font_family' => array(
	
							'type' => 'inline_select',
							'label' => esc_html__('Font Family', 'picante'),
							'default' => 'theme_default',
							'selector' => '.cl-text',
							'css_property' => 'font-family',
							'choices'     => codeless_get_google_fonts(),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'text_font_size' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Text Font Size', 'picante'),
							'default' => '14',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '12',
								'max'  => '72',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'text_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => esc_html__('Title Font Weight', 'picante'),
							'default' => '400',
							'selector' => '.cl-text',
							'css_property' => 'font-weight',
							'choices'     => array(
								'100' => '100',
								'200' => '200',
								'300' => '300',
								'400' => '400',
								'500' => '500',
								'600' => '600',
								'700' => '700',
								'800' => '800'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
						
					'text_line_height' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Line Height', 'picante'),
							'default' => '20',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '100',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
					
					'text_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Text Transform', 'picante' ),
							'default'     => 'none',
							'selector' => '.cl-text',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'uppercase' => esc_html__('Uppercase', 'picante')
							),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
							
						),

						'text_letterspace' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Letter-Spacing', 'picante'),
								'default' => '0',
								'selector' => '.cl-text',
								'css_property' => 'letter-spacing',
								'choices'     => array(
									'min'  => '0',
									'max'  => '4',
									'step' => '0.05',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_typography',
										'operator' => '==',
										'value'    => 1,
									),
								),
							),
						

						'text_color' => array(
							'type' => 'color',
							'label' => esc_html__('Color', 'picante'),
							'default' => '',
							'selector' => '.cl-text',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
					),
					
						
				

				'typography_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography'
				),


					'animation_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'animation'
					),
					
						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'top-t-bottom' =>	esc_html__('Top-Bottom', 'picante'),
								'bottom-t-top' =>	esc_html__('Bottom-Top', 'picante'),
								'right-t-left' => esc_html__('Right-Left', 'picante'),
								'left-t-right' => esc_html__('Left-Right', 'picante'),
								'alpha-anim' => esc_html__('Fade-In', 'picante'),	
								'zoom-in' => esc_html__('Zoom-In', 'picante'),	
								'zoom-out' => esc_html__('Zoom-Out', 'picante'),
								'zoom-reverse' => esc_html__('Zoom-Reverse', 'picante'),
							),
							'selector' => '.cl-text'
						),
						
						'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Delay', 'picante' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000',
								'1100' =>	'ms 1100',
								'1200' =>	'ms 1200',
								'1300' =>	'ms 1300',
								'1400' =>	'ms 1400',
								'1500' =>	'ms 1500',
								'1600' =>	'ms 1600',
								'1700' =>	'ms 1700',
								'1800' =>	'ms 1800',
								'1900' =>	'ms 1900',
								'2000' =>	'ms 2000',
							
							),
							'selector' => '.cl-text',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'animation_speed' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Speed', 'picante' ),
							'default'     => '400',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000'
								
							
							),
							'selector' => '.cl-text',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'animation'
					),
			),
			
		) );


		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Widget Sidebar', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-gear',
			'settings'    => 'cl_header_widget',
			'fields'	  => array(
					
					'widget_sidebar' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Widgetized Area', 'picante' ),
							'description' => esc_attr__( 'Select the widgetized area that you want to add', 'picante' ),
							'default'     => '',
							'choices' => codeless_get_registered_sidebars(),
							'reloadTemplate' => true,
						),

				
					'text_color' => array(
							'type' => 'color',
							'label' => esc_html__('Color', 'picante'),
							'default' => '#ffffff',
							'selector' => '.widgetized',
							'css_property' => 'color',
							'alpha' => true,
					),

			),
			
		));

		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Search', 'picante' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-gear',
			'settings'    => 'cl_header_search',
			'fields'	  => array(

				'style' => array( 
						'type'        => 'inline_select',
						'label'       => esc_html__( 'Style', 'picante' ),
						'description' => '',
						'default'     => 'with_categories',
						'priority'    => 10,
						'choices'     => array(
							'with_categories'  => esc_attr__( 'With Categories', 'picante' ),
							'simple_white' => esc_attr__( 'Simple White', 'picante' ),
							'simple_transparent' => esc_attr__( 'Simple Transparent', 'picante' ),
						),
						'selector' => '.search-element',
						'selectClass' => 'style-',
						'reloadTemplate' => true,
				),


				

				'quick_search' => array( 
						'type'        => 'switch',
						'label'       => esc_html__( 'With Quick Search', 'picante' ),
						'description' => '',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'picante' ),
							'off' => esc_attr__( 'Off', 'picante' ),
						),
						'reloadTemplate' => true,
						'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'with_categories',
								),
						),
				),

				'search_input_width' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Search Input Width', 'picante'),
							'default' => '380',
							'selector' => '.search-element .input-search-field',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '120',
								'max'  => '1200',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							
				),


				'hide_mobile' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Mobile', 'picante' ),
								'description' => esc_html__('Switch On to hide from mobile header', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true,
								'selector' => '.search-element',
								'addClass' => 'hide-mobile'
					), 




			),
			
		));
?>