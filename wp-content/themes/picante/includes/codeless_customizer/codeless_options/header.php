<?php

/* Header Options ---------------------------------------- */


Kirki::add_panel('cl_header', array(
	'priority' => 10,
	'type' => '',
	'title' => esc_html__('Header', 'picante') ,
	'tooltip' => esc_html__('All Header Options', 'picante') ,
));



/* -------------------- Layout --------------------- */

Kirki::add_section('cl_header_general', array(
	'title' => esc_html__('Layout', 'picante') ,
	'tooltip' => esc_html__('General Header Layout, global header options', 'picante') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_container',
	'label' => esc_html__('Header Stretch', 'picante') ,
	'section' => 'cl_header_general',
	'type' => 'select',
	'default' => 'container',
	'priority' => 10,
	'choices' => array(
		'container' => esc_attr__('Into Container', 'picante') ,
		'container-fluid' => esc_attr__('Fullwidth', 'picante') ,
	) ,
	'transport' => 'postMessage',
));



Kirki::add_field('cl_picantee', array(
	'settings' => 'header_layout_advanced',
	'label' => esc_html__('', 'picante') ,
	'section' => 'cl_header_general',
	'type' => 'groupdivider',
));
Kirki::add_field('cl_picantee', array(
	'settings' => 'header_layout_advanced_title',
	'label' => esc_html__('Advanced (Use header wizard)', 'picante') ,
	'section' => 'cl_header_general',
	'type' => 'grouptitle',
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_layout',
	'label' => esc_html__('Header Layout', 'picante') ,
	'tooltip' => esc_html__('Select type of header to use', 'picante') ,
	'section' => 'cl_header_general',
	'tooltip' => esc_html__('Please use the Header Wizard for changing the header Layout', 'picante') ,
	'type' => 'select',
	'default' => 'top',
	'priority' => 10,
	'choices' => array(
		'top' => esc_attr__('Top', 'picante') ,
		'left' => esc_attr__('Left', 'picante') ,
		'right' => esc_attr__('Right', 'picante') ,
		'bottom' => esc_attr__('Bottom', 'picante') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_position_left',
	'label' => esc_html__('Logo Position', 'picante') ,
	'tooltip' => esc_html__('Select the position (alignment) of logo', 'picante') ,
	'section' => 'cl_header_general',
	'type' => 'select',
	'default' => 'center',
	'priority' => 10,
	'choices' => array(
		'flex-start' => esc_html__('Left', 'picante'),
		'center' => esc_html__('Center', 'picante'),
		'flex-end' => esc_html__('Right', 'picante'),
	) ,
	'required' => array(
		array(
			'setting' => 'header_layout',
			'operator' => 'in',
			'value' => array(
				'left',
				'right'
			)
		) ,
	) ,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-h-cl_header_logo',
			'property' => 'justify-content'
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_forced_center',
	'label' => esc_html__('Force Center, Middle Column', 'picante') ,
	'tooltip' => esc_html__('Switch On to force the middle column of the main Header Row to be centered.', 'picante') ,
	'section' => 'cl_header_general',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_boxed',
	'label' => esc_html__('Boxed (Outter) Header', 'picante') ,
	'section' => 'cl_header_general',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));




/* -------------------------- Logo ----------------------------- */

Kirki::add_section('cl_header_logo', array(
	'title' => esc_html__('Logo', 'picante') ,
	'tooltip' => esc_html__('Logo Options', 'picante') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_type',
	'label' => esc_html__('Logo Type', 'picante') ,
	'tooltip' => esc_html__('Select font or image logo type', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'select',
	'default' => 'image',
	'priority' => 10,
	'into_group' => true,
	'choices' => array(
		'font' => esc_attr__('Font Logo', 'picante') ,
		'image' => esc_attr__('Image Logo', 'picante')
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_type' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo',
	'label' => esc_html__('Default Logo', 'picante') ,
	'tooltip' => esc_html__('Upload here the logo that is placed in top of the page', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'image',
	'priority' => 10,
	'default' => get_template_directory_uri() . '/img/logo.png',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_default' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_light',
	'label' => esc_html__('Logo Light', 'picante') ,
	'tooltip' => esc_html__('Upload logo that will be shown on dark baackground or header', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'image',
	'priority' => 10,
	'default' => get_template_directory_uri() . '/img/logo_light.png',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_light' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_height',
	'label' => esc_html__('Logo Height', 'picante') ,
	'tooltip' => esc_html__('Define the Height of your logo', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'number',
	'priority' => 10,
	'default' => 20,
	'choices' => array(
		'min' => 10,
		'max' => 300,
		'step' => 1,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height'
		)
	) ,
	'js_vars' => array(
		array(
			'suffix' => '!important'
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_responsive_div',
	'label' => esc_html__('Logo Responsive', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'groupdivider',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_responsive',
	'label' => esc_html__('Logo Responsive', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'grouptitle',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_iphone',
	'label' => esc_html__('Logo Additional in iPhone', 'picante') ,
	'tooltip' => esc_html__('Upload logo that will be shown only on iPhone', 'picante') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_iphone_refresh' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_ipad',
	'label' => esc_html__('Logo Additional in iPad', 'picante') ,
	'tooltip' => esc_html__('Upload logo that will be shown only on iPad', 'picante') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_ipad_refresh' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_height_ipad',
	'label' => esc_html__('Logo Height (iPad)', 'picante') ,
	'tooltip' => esc_html__('Define the Height of your logo in iPad', 'picante') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'number',
	'priority' => 10,
	'default' => 20,
	'choices' => array(
		'min' => 1,
		'max' => 100,
		'step' => 1,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (max-width: 991px)'
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_height_iphone',
	'label' => esc_html__('Logo Height (iPhone)', 'picante') ,
	'tooltip' => esc_html__('Define the Height of your logo in iPhone', 'picante') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'number',
	'priority' => 10,
	'default' => 20,
	'choices' => array(
		'min' => 1,
		'max' => 100,
		'step' => 1,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (max-width: 480px)'
		)
	)
));

Kirki::add_field('cl_picantee', array(
	'type' => 'text',
	'settings' => 'logo_font_text',
	'label' => esc_attr__('Logo Font', 'picante') ,
	'section' => 'cl_header_logo',
	'default' => 'picante',
	'priority' => 10,
	'into_group' => true,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
		) ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_picantee', array(
	'type' => 'typography',
	'settings' => 'logo_font',
	'label' => esc_attr__('Logo Font Typography', 'picante') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'default' => array(
		'font-family' => esc_html__('Poppins', 'picante'),
		'variant' => '600',
		'font-size' => '28px',
		'line-height' => '',
		'letter-spacing' => '-1',
		'subsets' => array(
			'latin-ext'
		) ,
		'color' => '#222',
		'text-transform' => 'lowercase',
		'text-align' => 'left'
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('logo_font')
		) ,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
		) ,
	) ,
));


Kirki::add_field('cl_picantee', array(
	'settings' => 'logo_font_responsive_color',
	'label' => esc_html__('Logo Font Responsive Color', 'picante') ,
	'section' => 'cl_header_logo',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'picante') ,
		'dark' => esc_attr__('Dark', 'picante') ,
	) ,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
		) ,
	) ,
));



/* --------------------- MENU ------------------------------*/

Kirki::add_section('cl_header_menu', array(
	'title' => esc_html__('Menu Style', 'picante') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_menu_style',
	'label' => esc_html__('Main Menu Style', 'picante'),
	'tooltip' => esc_html__('Select the Main Navigation Items Style', 'picante'),
	'default' => 'border_bottom',
	'choices' => array(
		'simple' => esc_html__('Simple', 'picante'),
		'border_top' => esc_html__('Border Top', 'picante'),
		'border_bottom' => esc_html__('Border Bottom', 'picante'),
		'border_left' => esc_html__('Border Left', 'picante'),
		'border_right' => esc_html__('Border Right', 'picante'),
		'border_effect' => esc_html__('Border Effect', 'picante'),
		'border_effect_two' => esc_html__('Border Effect 2', 'picante'),
		'background_color' => esc_html__('Background Color', 'picante')
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'postMessage'
));


Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_space_menu',
	'label' => esc_html__('Space between Menu Items', 'picante'),
	'default' => 24,
	'choices' => array(
		'min' => '0',
		'max' => '40',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top nav > ul > li, .header_container.header-bottom nav > ul > li',
			'units' => 'px',
			'property' => 'padding-left',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top nav > ul > li, .header_container.header-bottom nav > ul > li',
			'units' => 'px',
			'property' => 'padding-right',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-left nav > ul > li, .header_container.header-right nav > ul > li, .vertical-menu nav > ul > li',
			'units' => 'px',
			'property' => 'padding-top',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-left nav > ul > li, .header_container.header-right nav > ul > li, .vertical-menu nav > ul > li',
			'units' => 'px',
			'property' => 'padding-bottom',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));



Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_menu_border_style',
	'label' => esc_html__('Border Style', 'picante'),
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
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_border_style') ,
			'property' => 'border-style'
		)
	) ,
	'required' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => 'in',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right'
			) ,
		) ,
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_menu_border_width',
	'label' => esc_html__('Border Width', 'picante'),
	'default' => 1,
	'choices' => array(
		'min' => '0',
		'max' => '10',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => 'in',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right'
			) ,
		) ,
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_menu_style_full',
	'label' => esc_html__('Style over full item', 'picante') ,
	'tooltip' => esc_html__('Switch on if you want to apply the style over full menu item or switch off if you want only text to take the style.', 'picante') ,
	'section' => 'cl_header_menu',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => 'in',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right',
				'background_color'
			)
		) ,
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_menu_vertical_dividers',
	'label' => esc_html__('Small dividers between menu items', 'picante') ,
	'tooltip' => esc_html__('Switch on if you want to add small dividers between menu items.', 'picante') ,
	'section' => 'cl_header_menu',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage',
));


Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_menu_vertical_dividers_color',
	'label' => esc_html__('Dividers Color', 'picante'),
	'tooltip' => '',
	'default' => '#ebebeb',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container.header-top.vertical-dividers #navigation nav > ul > li:before, .header_container.header-top.vertical-dividers #navigation nav > ul > li:last-child:after',
			'property' => 'background-color'
		)
	) ,

	'required' => array(
		array(
			'setting' => 'header_menu_vertical_dividers',
			'operator' => '==',
			'value' => true
		) ,
	) ,
	'transport' => 'auto'
));

Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'divider_menu_active',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'title_menu_active',
		   'label'    => esc_html__( 'Hover & Active Item Styles', 'picante' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_menu_border_color',
	'label' => esc_html__('Menu Item Active Border Color', 'picante'),
	'tooltip' => esc_html__('Border color on menu item hover. Used on menu styles with borders only.', 'picante'),
	'default' => '#e68556',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),

	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_border_color'),
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_menu_background_color',
	'label' => esc_html__('Menu Item Active BG Color', 'picante'),
	'tooltip' => esc_html__('BG color on menu item hover. Used on menu styles with background only.', 'picante'),
	'default' => '#222',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_background_color'),
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_menu_font_color',
	'label' => esc_html__('Menu Item Active Font Color', 'picante'),
	'tooltip' => esc_html__('Font color on menu item hover. Used on menu styles with background only.', 'picante'),
	'default' => '#e68556',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_font_color'),
			'property' => 'color',
			'suffix' => '!important'
		)
	) ,
	'transport' => 'auto'
));






Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'divider_menu_main',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'title_menu_main',
		   'label'    => esc_html__( 'Main Menu Typography', 'picante' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );



Kirki::add_field('cl_picantee', array(
	'type' => 'typography',
	'settings' => 'menu_font',
	'label' => esc_attr__('Menu Typography', 'picante') ,
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-family' => esc_html__('Open Sans', 'picante'),
		'variant' => '700',
		'font-size' => '14px',
		'line-height' => '16px',
		'letter-spacing' => '0.0px',
		'color' => '#262a2c',
		'text-align' => 'center',
		'text-transform' => 'uppercase',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('menu_font')
		) ,
	) ,
));


Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'divider_menu_dropdown',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'title_menu_dropdown',
		   'label'    => esc_html__( 'Dropdown Typography', 'picante' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );


Kirki::add_field('cl_picantee', array(
	'type' => 'typography',
	'settings' => 'dropdown_hassubmenu_item',
	'label' => esc_attr__('Dropdown Items with submenu typography', 'picante'),
	'tooltip' => esc_attr__('Except Main Navigation Items', 'picante'),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'show_variants' => true,
	'default' => array(
		'variant' => '',
		'font-size' => '14px',
		'line-height' => '26px',
		'letter-spacing' => '0.04em',
		'color' => '#eae5d6',
		'text-transform' => 'uppercase',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('dropdown_hassubmenu_item')
		) ,
	) ,
));
Kirki::add_field('cl_picantee', array(
	'type' => 'typography',
	'settings' => 'dropdown_item_typography',
	'label' => esc_attr__('Dropdown Items typography', 'picante') ,
	'tooltip' => esc_attr__( 'All other items without Submenu, Except Main Navigation Items.', 'picante' ),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'show_variants' => true,
	'default' => array(
		'font-size' => '14x',
		'line-height' => '30px',
		'variant' => '600',
		'font-weight' => '600',
		'letter-spacing' => '0px',
		'color' => '#eae5d6',
		'text-transform' => 'none',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('dropdown_item_typography')
		) ,
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_mobile_menu_hamburger_color',
	'label' => esc_html__('Mobile Menu Hamburger Color', 'picante') ,
	'section' => 'cl_header_menu',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'picante') ,
		'dark' => esc_attr__('Dark', 'picante') ,
	) ,
	'transport' => 'postMessage',
));


/* ---------------------- MAIN ROW ----------------------------- */

Kirki::add_section('cl_header_main', array(
	'title' => esc_html__('Main Header Row', 'picante') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_design',
	'label' => esc_html__('Header Box Design', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '1px',
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_main_left',
	'label' => esc_html__('Left Column Align', 'picante'),
	'default' => 'center',
	'choices' => array(
		'center' => esc_html__('Center', 'picante'),
		'flex-start' => esc_html__('Top', 'picante'),
		'flex-end' => esc_html__('Bottom', 'picante'),
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main .c-left.header-col',
			'property' => 'align-items'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_main_middle',
	'label' => esc_html__('Middle Column Align', 'picante'),
	'default' => 'center',
	'choices' => array(
		'center' => esc_html__('Center', 'picante'),
		'flex-start' => esc_html__('Top', 'picante'),
		'flex-end' => esc_html__('Bottom', 'picante'),
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main .c-middle.header-col',
			'property' => 'align-items'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_main_right',
	'label' => esc_html__('Right Column Align', 'picante'),
	'default' => 'center',
	'choices' => array(
		'center' => esc_html__('Center', 'picante'),
		'flex-start' => esc_html__('Top', 'picante'),
		'flex-end' => esc_html__('Bottom', 'picante'),
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main .c-right.header-col',
			'property' => 'align-items'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_space_el',
	'label' => esc_html__('Space between elements', 'picante'),
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .main .header-el, .header_container.header-right > .main .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .main .header-el, .header_container.header-bottom > .main .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_width',
	'label' => esc_html__('Header Width', 'picante'),
	'default' => 260,
	'choices' => array(
		'min' => '100',
		'max' => '700',
		'step' => '5',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'required' => array(
		array(
			'setting' => 'header_layout',
			'operator' => 'in',
			'value' => array(
				'left',
				'right'
			) ,
		) ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_height',
	'label' => esc_html__('Header Height', 'picante'),
	'tooltip' => esc_html__('Works on Top, Bottom Layouts or when outter boxed header is actived', 'picante'),
	'default' => 130,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .main, .header_container.header-bottom > .main',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .main, .header_container.header-bottom > .main',
			'units' => 'px',
			'property' => 'line-height',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_divider',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));


Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_ti',
	'label' => esc_html__('Background', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_bg_color',
	'label' => esc_html__('Background Color', 'picante'),
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .main, .header_container.header-left, .heaer_container.header-right',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'image',
	'label' => esc_html__('Background Image', 'picante'),
	'settings' => 'header_bg_image',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-image'
		)
	),
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_bg_pos',
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
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_bg_repeat',
	'label' => esc_html__('Background Repeat', 'picante'),
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_border_divider',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_border_ti',
	'label' => esc_html__('Border', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_border_style',
	'label' => esc_html__('Border Style', 'picante'),
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
	'inline_control' => true,
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_border_color',
	'label' => esc_html__('Border Color', 'picante'),
	'default' => '#dbe1e6',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_shadow',
	'label' => esc_html__('Add Shadow', 'picante') ,
	'tooltip' => esc_html__('Not only border, but add a light shadow that will look awesome on white pages', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));


Kirki::add_field('cl_picantee', array(
	'settings' => 'header_main_advanced_div',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_main_advanced_title',
	'label' => esc_html__('Advanced', 'picante') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_main_adv_left_color',
	'label' => esc_html__('Left Column BG Color', 'picante'),
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .main .c-left.header-col',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));


Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_main_adv_left_color',
	'label' => esc_html__('Left Column BG Color', 'picante'),
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .main .c-left.header-col',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));


Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_main_adv_middle_color',
	'label' => esc_html__('Middle Column BG Color', 'picante'),
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .main .c-middle.header-col',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_main_adv_right_color',
	'label' => esc_html__('Right Column BG Color', 'picante'),
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .main .c-right.header-col',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));



/* ----------------------------- Top Nav --------------------------------------- */
Kirki::add_section('cl_header_top_row', array(
	'title' => esc_html__('Top Navigation Row', 'picante') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_top_nav',
	'label' => esc_html__('Top Header Row', 'picante') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row, than you can add elements.', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_top_nav_sticky',
	'label' => esc_html__('Show on sticky', 'picante') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row on sticky', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_top_nav_mobile',
	'label' => esc_html__('Show on Mobile', 'picante') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row on mobile', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_design_top',
	'label' => esc_html__('Header Box Design', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '0px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_space_el_top',
	'label' => esc_html__('Space between elements', 'picante'),
	'default' => 24,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .top_nav .header-el, .header_container.header-right > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => 'body:not(.rtl) .header_container.header-top > .top_nav .header-el, body:not(.rtl) .header_container.header-bottom > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		),
		array(
			'element' => 'body.rtl .header_container.header-top > .top_nav .header-el, body.rtl .header_container.header-bottom > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-left',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_height_top',
	'label' => esc_html__('Height', 'picante'),
	'tooltip' => esc_html__('Works on Top, Bottom Layouts or when outter boxed header is actived', 'picante'),
	'default' => 30,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .top_nav, .header_container.header-bottom > .top_nav',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .top_nav, .header_container.header-bottom > .top_nav',
			'units' => 'px',
			'property' => 'line-height',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));


Kirki::add_field('cl_picantee', array(
	'settings' => 'header_typography_divider_top',
	'label' => esc_html__('Typography', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_typography_top',
	'label' => esc_html__('Typography', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_overwrite_typography',
	'label' => esc_html__('Overwrite Default Typography', 'picante') ,
	'tooltip' => esc_html__('Switch on to active custom typography for top navigation', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'typography',
	'settings' => 'header_top_typography',
	'label' => esc_html__('Typography Style', 'picante'),
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'default'     => array(
		'font-family'    => esc_html__('Source Sans Pro', 'picante'),
		'letter-spacing' => '0',
		'font-weight' => '400',
		'text-transform' => 'none',
		'font-size' => '14px',
		'color' => '#6a6a6a'
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_top_typography'),
		),

	),
	'required' => array(
		array(
			'setting' => 'header_overwrite_typography',
			'operator' => '==',
			'value' => true,
		) ,
	)
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_divider_top',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_ti_top',
	'label' => esc_html__('Background', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_bg_color_top',
	'label' => esc_html__('Background Color', 'picante'),
	'default' => '#262A2C',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'image',
	'label' => esc_html__('Background Image', 'picante'),
	'settings' => 'header_bg_image_top',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-image'
		)
	) ,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_bg_pos_top',
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
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_bg_repeat_top',
	'label' => esc_html__('Background Repeat', 'picante'),
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_border_divider_top',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_border_ti_top',
	'label' => esc_html__('Border', 'picante') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_border_style_top',
	'label' => esc_html__('Border Style', 'picante'),
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
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_border_color_top',
	'label' => esc_html__('Border Color', 'picante'),
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));






/* ----------------------------- Extra Row --------------------------------------- */

Kirki::add_section('cl_header_extra_row', array(
	'title' => esc_html__('Extra (Bottom) Row', 'picante') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_extra',
	'label' => esc_html__('Extra Header Row', 'picante') ,
	'tooltip' => esc_html__('Switch on to active Extra Header Navigation Row, than you can add elements.', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'refresh'
));


Kirki::add_field('cl_picantee', array(
	'settings' => 'header_extra_boxed',
	'label' => esc_html__('Outer Boxed Row', 'picante') ,
	'tooltip' => esc_html__('Switch on to make this row boxed and to overlap some pixel the content', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_extra_boxed_shadow',
	'label' => esc_html__('Outer Box Shadow', 'picante'),
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_extra_boxed',
			'operator' => '==',
			'value' => true,
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_extra_forced_center',
	'label' => esc_html__('Force Center, Middle Column', 'picante') ,
	'tooltip' => esc_html__('Switch On to force the middle column of the extra Header Row to be centered.', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'refresh',
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_design_extra',
	'label' => esc_html__('Box Design', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '0px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_space_el_extra',
	'label' => esc_html__('Space between elements', 'picante'),
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .extra_row .header-el, .header_container.header-right > .extra_row .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .extra_row .header-el, .header_container.header-bottom > .extra_row .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'slider',
	'settings' => 'header_height_extra',
	'label' => esc_html__('Height', 'picante'),
	'tooltip' => esc_html__('Works on Top, Bottom Layouts or when outter boxed header is actived', 'picante'),
	'default' => 40,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row',
			'units' => 'px',
			'property' => 'height'
		) ,
		array(
			'element' => '.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row',
			'units' => 'px',
			'property' => 'line-height'
		)
	) ,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_divider_extra',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_custom_ti_extra',
	'label' => esc_html__('Background', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_bg_color_extra',
	'label' => esc_html__('Background Color', 'picante'),
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'image',
	'label' => esc_html__('Background Image', 'picante'),
	'settings' => 'header_bg_image_extra',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-image'
		)
	) ,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_bg_pos_extra',
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
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_bg_repeat_extra',
	'label' => esc_html__('Background Repeat', 'picante'),
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_border_divider_extra',
	'label' => esc_html__('Design Options', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_border_ti_extra',
	'label' => esc_html__('Border', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_picantee', array(
	'type' => 'select',
	'settings' => 'header_border_style_extra',
	'label' => esc_html__('Border Style', 'picante'),
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
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_border_color_extra',
	'label' => esc_html__('Border Color', 'picante'),
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));



Kirki::add_field('cl_picantee', array(
	'settings' => 'header_extra_nav_sticky',
	'label' => esc_html__('Show on sticky', 'picante') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row on sticky', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_extra_row_sticky',
	'label' => esc_html__('Show on sticky', 'picante') ,
	'tooltip' => esc_html__('Switch on to active Extra Header Row Row on sticky', 'picante') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
		) ,
	) ,
	'transport' => 'refresh'
));



/* ---------------------------- Dropdown & Mobile -------------------------------- */

Kirki::add_section('cl_header_dropdown', array(
	'title' => esc_html__('Dropdown & Mobile Styles', 'picante') ,
	'tooltip' => esc_html__('All styles of dropdown, megamenu and mobile', 'picante') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));
Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'dropdown_bg_color',
	'label' => esc_html__('Background Color', 'picante'),
	'default' => '#222',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu, nav .menu > li > ul.sub-menu, nav .menu > li > ul.sub-menu ul, .cl-mobile-menu, .cl-submenu',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'dropdown_item_hover_bg',
	'label' => esc_html__('Item Hover BG Color', 'picante'),
	'default' => 'rgba(255,255,255,0)',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .menu li > ul.sub-menu li:hover, #site-header-cart .cart_list li:hover, #site-header-search input[type="search"]',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'dropdown_item_hover_color',
	'label' => esc_html__('Item Hover Font Color', 'picante'),
	'default' => '#fff',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .menu li ul.sub-menu li a:hover, #site-header-search input[type="search"], nav .menu li ul.sub-menu li.hasSubMenu.showDropdown > a',
			'property' => 'color',
			'suffix' => '!important'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'dropdown_borders_color',
	'label' => esc_html__('Separators Color', 'picante'),
	'default' => 'rgba(58,58,58,0)',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu > ul > li, #site-header-search input[type="search"]',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));


/* ----------------- Sticky -------------  */

Kirki::add_section('cl_header_sticky', array(
	'title' => esc_html__('Sticky', 'picante') ,
	'tooltip' => esc_html__('Make header sticky', 'picante') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));
Kirki::add_field('cl_picantee', array(
	'settings' => 'header_sticky',
	'label' => esc_html__('Sticky', 'picante') ,
	'tooltip' => esc_html__('By switch this option, your header will be sticky', 'picante') ,
	'section' => 'cl_header_sticky',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));
Kirki::add_field('cl_picantee', array(
	'type' => 'color',
	'settings' => 'header_sticky_bg',
	'label' => esc_html__('Sticky BG Color', 'picante'),
	'default' => '#ffffff',
	'inline_control' => true,
	'section' => 'cl_header_sticky',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => '.header_container.cl-header-sticky-ready',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_picantee', array(
	'settings' => 'header_sticky_content',
	'label' => esc_html__('Sticky Content Color', 'picante') ,
	'section' => 'cl_header_sticky',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'picante') ,
		'dark' => esc_attr__('Dark', 'picante') ,
	) ,
	'transport' => 'postMessage',
));
Kirki::add_field('cl_picantee', array(
	'settings' => 'header_sticky_shadow',
	'label' => esc_html__('Add Shadow', 'picante') ,
	'section' => 'cl_header_sticky',
	'type' => 'switch',
	'priority' => 10,
	'default' => 1,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));


Kirki::add_section('cl_header_page_defaults', array(
	'title' => esc_html__('Default Header Options', 'picante') ,
	'tooltip' => esc_html__('', 'picante') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'transparent_header',
	'label' => esc_html__('Header Transparent', 'picante') ,
	'section' => 'cl_header_page_defaults',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'picante') ,
		0 => esc_attr__('Off', 'picante') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_picantee', array(
	'settings' => 'header_color',
	'label' => esc_html__('Header Color', 'picante') ,
	'section' => 'cl_header_page_defaults',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices'     => array(
      'dark' => esc_attr__( 'Dark', 'picante' ),
      'light' => esc_attr__( 'Light', 'picante' ),
   ),
	'transport' => 'postMessage',
));


Kirki::add_field('cl_picantee', array(
	'settings' => 'archives_page_header_image',
	'label' => esc_html__('Archives Page Header Image', 'picante') ,
	'tooltip' => esc_html__('For each page you can set a new Page Header Element, but some pages for example archives, you can\'t set a page header. You need to add a default Image here if you use a Transparent Header Style.' , 'picante') ,
	'section' => 'cl_header_page_defaults',
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'transparent_header',
			'operator' => '==',
			'value' => true,
		) ,
	)
));



?>