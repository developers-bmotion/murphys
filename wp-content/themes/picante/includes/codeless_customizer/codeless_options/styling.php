<?php
    
    Kirki::add_section( 'cl_styling', array(
    	    'title'          => esc_html__( 'Styling', 'picante' ),
    	    'tooltip'    => esc_html__( 'All theme styling options', 'picante' ),
    	    'type'			 => '',
    	    'capability'     => 'edit_theme_options'
    	) );
		
		
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_title',
		    'label'    => esc_html__( 'General', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
	
	    Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'primary_color',
			'label' => esc_html__('Primary Accent Color', 'picante'),
			'default' => '#e68556',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'primary_color', 'color' ),
					'property' => 'color',
					'suffix' => '!important'
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'primary_color', 'background_color' ),
				    'property' => 'background-color',
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'primary_color', 'border-color' ),
				    'property' => 'border-color' 
				)
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'secondary_color',
			'label' => esc_html__('Secondary Accent Color', 'picante'),
			'tooltip' => esc_html__('Will be shown on color palette for use over the page. Please Refresh the builder, it can\t display directly.', 'picante'),
			'default' => '#a8db51',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
		    'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'secondary_color', 'color' ),
					'property' => 'color',
					'suffix' => '!important'
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'secondary_color', 'background_color' ),
				    'property' => 'background-color' 
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'secondary_color', 'border-color' ),
				    'property' => 'border-color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'border_accent_color',
			'label' => esc_html__('Border Accent Color', 'picante'),
			'default' => '#e3e3e3',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'border_accent_color', 'border-color' ),
					'property' => 'border-color',
					'suffix' => '!important'
				),
				array(
					'element' => codeless_dynamic_css_register_tags( 'border_accent_color', 'background-color' ),
					'property' => 'background-color',
					'suffix' => '!important'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'labels_accent_color',
			'label' => esc_html__('Labels, Span accent color', 'picante'),
			'tooltip' => esc_html__('Used for prepended text (In, By, etc..), counter ("3" categories for example), quote icon, current pagination and more.', 'picante'),
			'default' => '#8a9eae',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'labels_accent_color' ),
					'property' => 'color'
				)
			),
		    'transport' => 'auto' 
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'highlight_light_color',
			'label' => esc_html__('Highlighted area light', 'picante'),
			'tooltip' => esc_html__('Areas like pagination buttons and other areas with light color highlight', 'picante'),
			'default' => '#f7f4ed',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_light_color', 'background-color' ),
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'highlight_light_color_hover',
			'label' => esc_html__('Highlighted area light Hover', 'picante'),
			'tooltip' => esc_html__('Hover Background Color on some highlighted areas', 'picante'),
			'default' => '#dbe1e6',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_light_color_hover', 'background-color' ),
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'highlight_dark_color',
			'label' => esc_html__('Highlighted area dark', 'picante'),
			'tooltip' => esc_html__('Areas like loadmore button or small links like categories, widgets links, quote text and more.', 'picante'),
			'default' => '#23292c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_dark_color', 'color' ),
					'property' => 'color',
					'suffix' => ' !important'
				),
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_dark_color', 'background-color' ),
					'property' => 'background-color'

				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'other_area_links',
			'label' => esc_html__('Links Color', 'picante'),
			'tooltip' => esc_html__('Other links that dont have the primary accent color, like sidebar links, cetegories links or date link', 'picante'),
			'default' => '#23292c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'other_area_links', 'color' ),
					'property' => 'color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'layout_modern_bg_color',
			'label' => esc_html__('Modern Layout Sidebar BG Color', 'picante'),
			'tooltip' => esc_html__('Used only on modern layout with full sidebar.', 'picante'),
			'default' => '#f7f9fb',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-layout-modern-bg',
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	
			
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));

		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'body_background_title',
		    'label'    => esc_html__( 'Body Background', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));

		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'body_bg_color',
			'label' => esc_html__('Body Overall Background Color', 'picante'),
			'default' => '',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-color',
					'suffix' => ''
				),
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field('cl_picantee', array(
			'type' => 'image',
			'label' => esc_html__('Background Image', 'picante'),
			'settings' => 'body_bg_image',
			'default' => '',
			'inline_control' => true,
			'section' => 'cl_styling',
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-image'
				)
			),
		));

		Kirki::add_field('cl_picantee', array(
			'type' => 'select',
			'settings' => 'body_bg_pos',
			'label' => esc_html__('Background Position', 'picante'),
			'default' => 'left top',
			'choices' => array(
				'left top' => 'left top',
				'left center' => 'left center',
				'left bottom' => 'left bottom',
				'right top' => 'right top',
				'right center' => 'right center',
				'right bottom' => 'right bottom',
				'center top' => 'center top',
				'center center' => 'center center',
				'center bottom' => 'center bottom',
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-position'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_picantee', array(
			'type' => 'select',
			'settings' => 'body_bg_repeat',
			'label' => esc_html__('Background Repeat', 'picante'),
			'default' => 'no-repeat',
			'choices' => array(
				'repeat' => 'repeat',
				'repeat-x' => 'repeat-x',
				'repeat-y' => 'repeat-y',
				'no-repeat' => 'no-repeat'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-repeat'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_picantee', array(
			'type' => 'select',
			'settings' => 'body_bg_attachment',
			'label' => esc_html__('Background Attachment', 'picante'),
			'default' => 'scroll',
			'choices' => array(
				'scroll' => 'scroll',
				'fixed' => 'fixed'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-attachment'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_picantee', array(
			'type' => 'select',
			'settings' => 'body_bg_size',
			'label' => esc_html__('Background Size', 'picante'),
			'default' => 'auto',
			'choices' => array(
				'auto' => 'auto',
				'cover' => 'cover'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-size'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_picantee', array(
			'type' => 'select',
			'settings' => 'body_bg_blend',
			'label' => esc_html__('Background Blend Mode', 'picante'),
			'default' => 'normal',
			'choices' => array(
				'normal' => 'normal',
				'multiply' => 'multiply',
				'screen' => 'screen',
				'overlay' => 'overlay',
				'darken' => 'darken',
				'lighten' => 'lighten',
				'color-dodge' => 'color-dodg',
				'color-burn' => 'color-burn',
				'hard-light' => 'hard-light',
				'soft-light' => 'soft-light',
				'difference' => 'difference',
				'exclusion' => 'exclusion',
				'hue' => 'hue',
				'saturation' => 'saturation',
				'color' => 'color',
				'luminosity' => 'luminosity',
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-blend-mode'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'body_background_end_divider',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'typography_headings_style_title',
		    'label'    => esc_html__( 'Headings', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'headings_typo',
			'label'       => esc_attr__( 'General Headings Typography', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'font-family'    => esc_html__('Prata', 'picante'),
			),
			'priority'    => 10,
			'show_subsets' => false,
			'show_variants' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'headings_typo' ),
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h1_font_size',
			'label'       => esc_attr__( 'H1 Font Size', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '60',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h1_line_height',
			'label'       => esc_attr__( 'H1 Line-height', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '78',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h1_text_transform',
			'label'       => esc_attr__( 'H1 Text Transform', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => esc_html__('None', 'picante'),
				'uppercase' => esc_html__('Uppercase', 'picante')
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h1_font_weight',
			'label'       => esc_attr__( 'H1 Font Weight', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '400',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h1_letter_space',
			'label'       => esc_attr__( 'H1 Letter Spacing', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '1',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h1_dark_color',
			'label' => esc_html__('H1 Color (Dark)', 'picante'),
			'default' => '#283233',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));


    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h1_light_color',
			'label' => esc_html__('H1 Color (Light)', 'picante'),
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h1:not(.custom_font), .light-text .h1',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div_h2',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h2_font_size',
			'label'       => esc_attr__( 'H2 Font Size', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '36',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h2_line_height',
			'label'       => esc_attr__( 'H2 Line-height', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '48',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h2_text_transform',
			'label'       => esc_attr__( 'H2 Text Transform', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => esc_html__('None', 'picante'),
				'uppercase' => esc_html__('Uppercase', 'picante')
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h2_font_weight',
			'label'       => esc_attr__( 'H2 Font Weight', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '400',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h2_letter_space',
			'label'       => esc_attr__( 'H2 Letter Spacing', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '1',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h2_dark_color',
			'label' => esc_html__('H2 Color (Dark)', 'picante'),
			'default' => '#283233',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h2_light_color',
			'label' => esc_html__('H2 Color (Light)', 'picante'),
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h2:not(.custom_font), .light-text .h2',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div_h3',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h3_font_size',
			'label'       => esc_attr__( 'H3 Font Size', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '30',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h3_line_height',
			'label'       => esc_attr__( 'H3 Line-height', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '42',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h3_text_transform',
			'label'       => esc_attr__( 'H3 Text Transform', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => esc_html__('None', 'picante'),
				'uppercase' => esc_html__('Uppercase', 'picante')
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h3_font_weight',
			'label'       => esc_attr__( 'H3 Font Weight', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '400',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h3_letter_space',
			'label'       => esc_attr__( 'H3 Letter Spacing', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h3_dark_color',
			'label' => esc_html__('H3 Color (Dark)', 'picante'),
			'default' => '#283233',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h3_light_color',
			'label' => esc_html__('H3 Color (Light)', 'picante'),
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h3:not(.custom_font), .light-text .h3',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div_h4',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h4_font_size',
			'label'       => esc_attr__( 'H4 Font Size', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '18',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h4_line_height',
			'label'       => esc_attr__( 'H4 Line-height', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '30',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h4_text_transform',
			'label'       => esc_attr__( 'H4 Text Transform', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => esc_html__('None', 'picante'),
				'uppercase' => esc_html__('Uppercase', 'picante')
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h4_font_weight',
			'label'       => esc_attr__( 'H4 Font Weight', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '400',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h4_letter_space',
			'label'       => esc_attr__( 'H4 Letter Spacing', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h4_dark_color',
			'label' => esc_html__('H4 Color (Dark)', 'picante'),
			'default' => '#283233',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h4_light_color',
			'label' => esc_html__('H4 Color (Light)', 'picante'),
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h4:not(.custom_font), .light-text .h4',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div_h5',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h5_font_size',
			'label'       => esc_attr__( 'H5 Font Size', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '16',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h5_line_height',
			'label'       => esc_attr__( 'H5 Line-height', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '28',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h5_text_transform',
			'label'       => esc_attr__( 'H5 Text Transform', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => esc_html__('None', 'picante'),
				'uppercase' => esc_html__('Uppercase', 'picante')
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h5_font_weight',
			'label'       => esc_attr__( 'H5 Font Weight', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '400',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h5_letter_space',
			'label'       => esc_attr__( 'H5 Letter Spacing', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '1',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h5_dark_color',
			'label' => esc_html__('H5 Color (Dark)', 'picante'),
			'default' => '#283233',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h5_light_color',
			'label' => esc_html__('H5 Color (Light)', 'picante'),
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h5:not(.custom_font), .light-text .h5',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div_h6',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h6_font_size',
			'label'       => esc_attr__( 'H6 Font Size', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '14',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h6_line_height',
			'label'       => esc_attr__( 'H6 Line-height', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '22',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h6_text_transform',
			'label'       => esc_attr__( 'H6 Text Transform', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => esc_html__('None', 'picante'),
				'uppercase' => esc_html__('Uppercase', 'picante')
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'select',
			'settings'    => 'h6_font_weight',
			'label'       => esc_attr__( 'H6 Font Weight', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '400',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'h6_letter_space',
			'label'       => esc_attr__( 'H6 Letter Spacing', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '1',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h6_dark_color',
			'label' => esc_html__('H6 Color (Dark)', 'picante'),
			'default' => '#283233',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'h6_light_color',
			'label' => esc_html__('H6 Color (Light)', 'picante'),
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h6:not(.custom_font), .light-text .h6',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'general_style_div_h',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
		
		
		
		
		
		
		
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'body_typo',
			'label'       => esc_attr__( 'Body Typography', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'font-family'    => esc_html__('Open Sans', 'picante'),
				'letter-spacing' => '0',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '16px',
				'line-height' => '30px',
				'color' => '#73848e'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'body_typo' )
				),

			)
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'blog_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'blog_style_title',
		    'label'    => esc_html__( 'Blog', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'blog_entry_title',
			'label'       => esc_attr__( 'Blog Entry Title', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '30px',
				'line-height' => '40px',
				'color' => '#23292c',
				'font-family' => esc_html__('Prata', 'picante')
			),
			'priority'    => 10, 
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_entry_title' )
				),

			)
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'blog_meta_style',
			'label'       => esc_attr__( 'Blog Meta Style', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'variant' => '400italic',
				'text-transform' => 'none',
				'font-size' => '14px',
				'line-height' => '28px',
				'color' => '#73848e',
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_meta_style' )
				),

			)
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'single_blog_title',
			'label'       => esc_attr__( 'Single Blog Title', 'picante' ),
			'section'     => 'cl_styling',
			'show_variants' => true,
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'font-family' => esc_html__('Prata', 'picante'),
				'letter-spacing' => '0',
				'font-weight' => '',
				'text-transform' => 'none',
				'font-size' => '48px',
				'line-height' => '60px',
				'color' => '#23292c'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'single_blog_title' )
				),

			)
		));



		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'blog_overlay_color',
			'label' => esc_html__('Blog Overlay Color', 'picante'),
			'default' => 'rgba(40,64,109,0.92)',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_overlay_color' ) ,
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));


    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'portfolio_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'portfolio_style_title',
		    'label'    => esc_html__( 'Portfolio', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));

		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'portfolio_item_categories',
			'label'       => esc_attr__( 'Portfolio Item Categories', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '13px',
				'line-height' => '20px',
				'color' => '#999'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '.portfolio_item .portfolio-categories a, .portfolio_item .portfolio-categories'
				),

			)
		));



		
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'style_buttons_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'buttons_title',
		    'label'    => esc_html__( 'Buttons', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'select',
		    'settings' => 'button_style',
			'label' => esc_html__('Button Style', 'picante'),
			'default'     => 'square',
			'choices' => array(
				'square' => esc_html__('Square', 'picante'),
				'rounded' => esc_html__('Rounded', 'picante'),
				'simple_text' => esc_html__('Simple Text', 'picante'),
				'sqaure_small' => esc_html__('Sqaure Small', 'picante')
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));


    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'switch',
		    'settings' => 'custom_button_font',
			'label' => esc_html__('Button Font', 'picante'),
			'default'     => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));


    	Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'button_font_custom',
			'label'       => esc_attr__( 'Button Typography', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_variants' => true,
			'default'     => array(
				'font-family'    => 'inherit',
				'letter-spacing' => '0',
				'font-weight' => '400',
				'text-transform' => 'uppercase',
				'font-size' => '12px',
				'line-height' => '24px'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '.cl-btn.btn-font-custom'
				),

			),
			'required'    => array(
				array(
					'setting'  => 'custom_button_font',
					'operator' => '==',
					'value'    => true,
				),
								
			),
		));

    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color',
			'label' => esc_html__('Button BG Color', 'picante'),
			'default' => codeless_get_mod('primary_color'),
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):not(.wpcf7-submit):not(.entry-readmore):not([name="apply_coupon"]):not(.single_add_to_cart_button):not(.update_item_submit):not(.checkout-button):not(#place_order)',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'button_font_color',
			'label' => esc_html__('Button Font Color', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'button_border_color',
			'label' => esc_html__('Button Border Color', 'picante'),
			'tooltip' => esc_html__('Works only on button styles that support border color', 'picante'),
			'default' => 'transparent',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):not(.single_add_to_cart_button):not(.wc-forward):not(.checkout-button)',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'number',
		    'settings' => 'button_border_width',
			'label' => esc_html__('Button Border Width', 'picante'),
			'tooltip' => esc_html__('Works only on button styles that support border color', 'picante'),
			'default' => '1',
			'inline_control' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):not(.single_add_to_cart_button):not(.wc-forward):not(.checkout-button)',
					'property' => 'border-width',
					'suffix' => 'px'
				),
				
			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
				'alpha' => true,
			),
		    'transport' => 'auto'
    	));


    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'select',
		    'settings' => 'button_hover_effect',
			'label' => esc_html__('Button Hover Effect', 'picante'),
			'default'     => 'darker',
			'choices' => array(
				'darker' => esc_html__('Darker', 'picante'),
				'shadow' => esc_html__('Shadow', 'picante')
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));
    	
    	/*Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color_hover',
			'label' => esc_html__('Button Hover BG Color', 'picante'),
			'default' => '#fff',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'background-color'
				),
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'button_font_color_hover',
			'label' => esc_html__('Button Hover Font Color', 'picante'),
			'default' => codeless_get_mod( 'highlight_dark_color' ),
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'color',
		    'settings' => 'button_border_color_hover',
			'label' => esc_html__('Button Hover Border Color', 'picante'),
			'tooltip' => esc_html__('Works only on button styles that support border color', 'picante'),
			'default' => 'transparent',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
    	));*/
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'widget_typo',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'widget_title',
		    'label'    => esc_html__( 'Widgets', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'widgets_title_typography',
			'label'       => esc_attr__( 'Sidebar Widgets Typography', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'font-family'    => esc_html__('Montserrat', 'picante'),
				'letter-spacing' => '0.06em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '14px',
				'line-height' => '20px',
				'color' => '#23292c'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'widgets_title_typography' )
				),

			)
		));
	
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'aside_widget_distance',
			'label'       => esc_attr__( 'Distance between widgets', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '34',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'aside .widget',
					'units'  => 'px',
					'property' => 'padding-top'
				),
				array(
					'element' => 'aside .widget',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));
    	
    	
    	Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'style_elements',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_picantee', array(
		    
		    'settings' => 'style_footer_title',
		    'label'    => esc_html__( 'Elements', 'picante' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));


		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'counter_typography',
			'label'       => esc_attr__( 'Counter Typography', 'picante' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'letter-spacing' => '-3px',
				'line-height' => '64px',
				'font-weight' => '600',
				'font-size' => '60px'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'counter_typography' )
				),

			)
		));



		
		
		
		

?>