<?php

Kirki::add_section( 'cl_shop', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Shop', 'picante' ),
	    'tooltip' => esc_html__( 'All Shop Options', 'picante' ),
	) );

		    	
		Kirki::add_field( 'cl_picantee', array(
				    		
				   'settings' => 'title_shop_page',
				   'label'    => esc_html__( 'Shop Page Archive', 'picante' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );
			
			Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_catalog_mode',
				'label'    => esc_html__( 'Catalog Mode', 'picante' ),
				'tooltip' => esc_html__( 'Switch on to make shop only catalog mode. Hide add to cart', 'picante' ),
				'section'  => 'cl_shop',
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
				'settings' => 'shop_product_style',
				'label'    => esc_html__( 'Shop Items Style', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'normal',
				'choices'     => array(
					'normal'  => esc_attr__( 'Normal', 'picante' ),
				),
			) );

			

			Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_columns',
				'label'    => esc_html__( 'Shop Columns', 'picante' ),
				'tooltip' => esc_html__( 'Select number of items to display per Row on SHOP Page', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => '3',
				'choices'     => array(
					'2'  => esc_attr__( '2 Columns', 'picante' ),
					'3'  => esc_attr__( '3 Columns', 'picante' ),
					'4'  => esc_attr__( '4 Columns', 'picante' ),
					'5'  => esc_attr__( '5 Columns', 'picante' ),
					'6'  => esc_attr__( '6 Columns', 'picante' ),
				),
			) );

			Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_columns_mobile',
				'label'    => esc_html__( 'Shop Columns in Mobile', 'picante' ),
				'tooltip' => esc_html__( 'Select number of items to display per Row on SHOP Page in mobile', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => '1',
				'choices'     => array(
					'1'  => esc_attr__( '1 Columns', 'picante' ),
					'2'  => esc_attr__( '2 Columns', 'picante' )
				),
			) );

			Kirki::add_field('cl_picantee', array(
				'settings' => 'shop_item_per_page',
				'label' => esc_html__('Shop Items Per Page', 'picante') ,
				'tooltip' => esc_html__('', 'picante') ,
				'section' => 'cl_shop',
				'type' => 'number',
				'priority' => 10,
				'default' => 8,
				'choices' => array(
					'min' => 1,
					'max' => 50,
					'step' => 1,
				) ,
				
				'transport' => 'postMessage',
				
			));

			Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_top_content',
				'label'    => esc_html__( 'Shop Top Content', 'picante' ),
				'tooltip' => esc_html__( 'Select a page, use the content of that page as elements in the top of Shop Page', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'none',
				'transport' => 'postMessage',
				'choices'  =>   codeless_get_pages()
			) );

			Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_bottom_content',
				'label'    => esc_html__( 'Shop Bottom Content', 'picante' ),
				'tooltip' => esc_html__( 'Select a page, use the content of that page as elements in the end of Shop Page', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'none',
				'transport' => 'postMessage',
				'choices'  =>   codeless_get_pages()
			) );



		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'divider_shop_category',
		   'label'    => '',
		   'section'  => 'cl_shop',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
				    		
				   'settings' => 'title_shop_category',
				   'label'    => esc_html__( 'Shop Categories', 'picante' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );




		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_category_style',
			'label'    => esc_html__( 'Shop Category Items Style', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'normal',
			'choices'     => array(
				'normal'  => esc_attr__( 'Normal', 'picante' ),
			),
		) );




		Kirki::add_field('cl_picantee', array(
			'settings' => 'shop_item_per_category',
			'label' => esc_html__('Shop Items Per Category', 'picante') ,
			'tooltip' => esc_html__('', 'picante') ,
			'section' => 'cl_shop',
			'type' => 'number',
			'priority' => 10,
			'default' => 8,
			'choices' => array(
				'min' => 1,
				'max' => 50,
				'step' => 1,
			) ,
			
			'transport' => 'postMessage',
			
		));

		Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_categories_columns',
				'label'    => esc_html__( 'Shop Categories Columns', 'picante' ),
				'tooltip' => esc_html__( 'Select number of items to display per Row on Categories', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => '3',
				'choices'     => array(
					'2'  => esc_attr__( '2 Columns', 'picante' ),
					'3'  => esc_attr__( '3 Columns', 'picante' ),
					'4'  => esc_attr__( '4 Columns', 'picante' ),
					'5'  => esc_attr__( '5 Columns', 'picante' ),
					'6'  => esc_attr__( '6 Columns', 'picante' ),
				),
			) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_category_layout',
			'label'    => esc_html__( 'Shop Categories Layout', 'picante' ),
			'tooltip' => esc_html__( 'Select shop Product Categories page layout.', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' )
			),
		) );








		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'divider_shop_extra',
		   'label'    => '',
		   'section'  => 'cl_shop',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
				    		
				   'settings' => 'title_shop_extra',
				   'label'    => esc_html__( 'Shop Extra', 'picante' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );

		Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_related_style',
				'label'    => esc_html__( 'Related Items Style', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'normal',
				'choices'     => array(
					'normal'  => esc_attr__( 'Normal', 'picante' ),
				),
			) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_search_page_layout',
			'label'    => esc_html__( 'Search Page Layout', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'left_sidebar',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'picante' )
			),
		) );



		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'slider',
		    'settings' => 'shop_item_distance',
			'label' => 'Distance between items',
			'default' => '15',
			'choices'     => array(
			'min'  => '0',
			'max'  => '30',
			'step' => '1',
							),
			'inline_control' => true,
			'section'  => 'cl_shop',
			'transport' => 'postMessage'
    	));

    	Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_animation',
				'label'    => esc_html__( 'Animation Type', 'picante' ),
				
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'bottom-t-top',
				'choices' => array(
					'none'	=> 'None',
					'top-t-bottom' =>	'Top-Bottom',
					'bottom-t-top' =>	'Bottom-Top',
					'right-t-left' => 'Right-Left',
					'left-t-right' => 'Left-Right',
					'alpha-anim' => 'Fade-In',	
					'zoom-in' => 'Zoom-In',	
					'zoom-out' => 'Zoom-Out',
					'zoom-reverse' => 'Zoom-Reverse',
				),
				'transport' => 'postMessage'
	) );

    	Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_item_heading',
			'label'    => esc_html__( 'Shop Item Heading', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'h4',
			'choices'     => array(
				'h1'  => esc_attr__( 'H1', 'picante' ),
				'h2'  => esc_attr__( 'H2', 'picante' ),
				'h3'  => esc_attr__( 'H3', 'picante' ),
				'h4'  => esc_attr__( 'H4', 'picante' ),
				'h5'  => esc_attr__( 'H5', 'picante' ),
				'h6'  => esc_attr__( 'H6', 'picante' ),
				'custom_font'  => esc_attr__( 'Custom Font', 'picante' ),
			),
			'transport' => 'postMessage'
		) );


		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'typography',
			'settings'    => 'shop_custom_typography',
			'label'       => esc_attr__( 'Shop Custom Title Font', 'picante' ),
			'section'     => 'cl_shop',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.4px',
				'font-weight' => '600',
				'text-transform' => 'none',
				'font-size' => '14px',
				'line-height' => '26px',
				'color' => '#262a2c',
				'font-family' => 'Montserrat'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'shop_custom_typography' )
				),

			),
			'required'    => array(
				array(
					'setting'  => 'shop_item_heading',
					'operator' => '==',
					'value'    => 'custom_font',
				),
								
			),
		));


    	Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_pagination_style',
			'label'    => esc_html__( 'Shop Pagination Style', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'load_more',
			'choices'     => array(
				'numbers'  => esc_attr__( 'With Page Numbers', 'picante' ),
				'next_prev'  => esc_attr__( 'Next/Prev', 'picante' ),
				'load_more'  => esc_attr__( 'Load More Button', 'picante' ),
				'infinite_scroll'  => esc_attr__( 'Infinite Scroll', 'picante' ),
			),
			'transport' => 'refresh'
		) );

		

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_inpage_filters',
			'label'    => esc_html__( 'Inpage Filters', 'picante' ),
			'tooltip' => esc_html__( 'Filters on top of page will be shown. Please fill the Widgetized Area "Shop InPage Filters at Widgets." ', 'picante' ),
			'section'  => 'cl_shop',
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
			'type'        => 'repeater',
			'label'       => esc_attr__( 'Custom Quick Search Terms', 'picante' ),
			'tooltip'	  => esc_attr__( 'Leave empty to use product tags as quick search', 'picante' ),
			'section'     => 'cl_shop',
			'priority'    => 10,
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__('Search Term', 'picante' ),
			),
			'settings'    => 'shop_quick_search',
			'default'     => array(
				
			),
			'fields' => array(
				'term' => array(
					'type'        => 'text',
					'label'       => esc_attr__( 'Quick Search Term', 'picante' ),
					'default'     => 'Dresses',
				),
			),
			'transport' => 'postMessage'
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_open_toggles',
			'label'    => esc_html__( 'Filter Toogles Open by default', 'picante' ),
			'tooltip' => esc_html__( 'Switch On to open all filter toggles by default" ', 'picante' ),
			'section'  => 'cl_shop',
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
			'settings' => 'shop_show_description',
			'label'    => esc_html__( 'Show Description on Item', 'picante' ),
			'tooltip' => esc_html__( 'By Activating this, description will be shown on woocommerce products items blocks', 'picante' ),
			'section'  => 'cl_shop',
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
		    		
		   'settings' => 'divider_shop_product',
		   'label'    => '',
		   'section'  => 'cl_shop',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
				    		
				   'settings' => 'title_shop_product',
				   'label'    => esc_html__( 'Shop Single Product', 'picante' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_global_product_style',
			'label'    => esc_html__( 'Shop Global Single Product Style', 'picante' ),
			'tooltip' => esc_html__( 'Select a global product style for woocommerce products. Can be override from each product page.', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'default',
			'transport' => 'postMessage',
			'choices'  =>   array(
				  'default'  => esc_attr__( 'Default', 'picante' ),
			)
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_product_lightbox',
			'label'    => esc_html__( 'Product Lightbox', 'picante' ),
			'tooltip' => esc_html__( 'Active lightbox on products" ', 'picante' ),
			'section'  => 'cl_shop',
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
			'settings' => 'shop_quick_view',
			'label'    => esc_html__( 'Quick View', 'picante' ),
			'tooltip' => esc_html__( 'Active quickview on products" ', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'shop_share_buttons',
			'label'    => esc_html__( 'Shop Share Buttons', 'picante' ),
			'tooltip' => esc_html__( '" ', 'picante' ),
			'section'  => 'cl_shop',
			'type'     => 'sortable',
			'priority' => 10,
			'default'     => array(
				'facebook',
				'twitter',
				'google',
				'pinterest'
			),
			'choices'     => array(
				'facebook' => 'Facebook',
				'twitter' => 'Twitter',
				'google' => 'Google',
				'whatsapp' => 'Whatsapp',
				'linkedin' => 'Linkedin',
				'pinterest' => 'Pinterest'
			),
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_picantee', array(
				'settings' => 'shop_single_top_content',
				'label'    => esc_html__( 'Shop Single Top Content', 'picante' ),
				'tooltip' => esc_html__( 'Select a page, use the content of that page as elements in the top of Shop Single Pages and other shop pages', 'picante' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'none',
				'transport' => 'postMessage',
				'choices'  =>   codeless_get_pages()
			) );

		Kirki::add_field('cl_picantee', array(
			'settings' => 'shop_single_transparent_header',
			'label' => esc_html__('Shop Single Header Transparent', 'picante') ,
			'section' => 'cl_shop',
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
			'settings' => 'shop_single_header_color',
			'label' => esc_html__('Shop Single Header Color', 'picante') ,
			'section' => 'cl_shop',
			'type' => 'select',
			'default' => 'dark',
			'priority' => 10,
			'choices'     => array(
		      'dark' => esc_attr__( 'Dark', 'picante' ),
		      'light' => esc_attr__( 'Light', 'picante' ),
		   ),
			'transport' => 'postMessage',
		));

		
?>