<?php

Kirki::add_section( 'cl_blog', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Blog', 'picante' ),
	    'tooltip' => esc_html__( 'All Blog Styles and options', 'picante' ),
	) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_style',
			'label'    => esc_html__( 'Blog Style', 'picante' ),
			'tooltip' => esc_html__( 'Select one of the blog styles that you want to use as a default template', 'picante' ),
			'section'  => 'cl_blog',
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
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_grid_layout',
			'label'    => esc_html__( 'Grid Layout', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => '4',
			'choices' => array(
				'2'	=> '2 Columns',
				'3'	=> '3 Columns',
				'4'	=> '4 Columns',
				'5'	=> '5 Columns',
			),
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'blog_style', 
					'operator' => 'in',
					'value'    => array('grid', 'masonry'),
				),
								
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'slider',
		    'settings' => 'blog_grid_transition_duration',
			'label' => esc_html__('Grid Transition Duration', 'picante'),
			'default' => '0.4',
			'choices'     => array(
			'min'  => '0.0',
			'max'  => '5',
			'step' => '0.1',
							),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'required'    => array(
				array(
					'setting'  => 'blog_style',
					'operator' => 'in',
					'value'    => array('grid', 'masonry')
				),
								
			),
    	));

		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'select',
		    'settings' => 'blog_button_style',
			'label' => esc_html__('Blog Button Style', 'picante'),
			'tooltip' => esc_html__('Change from default to another style if you want to use another button style on blog', 'picante'),
			'default'     => 'simple_square',
			'choices' => array(
				'simple_square' => esc_html__('Simple Square', 'picante'),
				'square_small_rounded' => esc_html__('Square Small Rounded', 'picante'),
				'simple_text' => esc_html__('Simple Text', 'picante'),
				'rounded' => esc_html__('Rounded', 'picante')
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'transport' => 'postMessage'
    	));

		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_animation',
			'label'    => esc_html__( 'Animation Type', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'none',
			'choices' => array(
				'none'	=> esc_html__('None', 'picante'),
				'top-t-bottom' =>	'Top-Bottom',
				'bottom-t-top' =>	'Bottom-Top',
				'right-t-left' => esc_html__('Right-Left', 'picante'),
				'left-t-right' => esc_html__('Left-Right', 'picante'),
				'alpha-anim' => esc_html__('Fade-In', 'picante'),	
				'zoom-in' => esc_html__('Zoom-In', 'picante'),	
				'zoom-out' => esc_html__('Zoom-Out', 'picante'),
				'zoom-reverse' => esc_html__('Zoom-Reverse', 'picante'),
			),
			'transport' => 'postMessage'
		) );
		
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_layout',
			'label'    => esc_html__( 'Blog Page Layout', 'picante' ),
			'tooltip' => esc_html__( 'Overwrite the default all pages layout option, set a custom layout for blog', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'right_sidebar',
			'choices'     => array(
			    'none'  => esc_attr__( 'Use Default', 'picante' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'picante' )
			),
		) );

		

		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'slider',
		    'settings' => 'blog_width',
			'label' => esc_html__( 'Set the exact blog width', 'picante' ),
			'tooltip' => esc_html__( 'Set a custom width in percentage for your blog', 'picante' ),
			'default' => 100,
			'choices'     => array(
				'min'  => '20',
				'max'  => '100',
				'step' => '1',
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'output' => array(
				array(
					'element' => '.blog-entries.blog_page',
					'units' => '%',
					'property' => 'width',
					'media_query' => '@media (min-width: 992px)'
				)
			),

			'transport' => 'auto'

    	));

    	Kirki::add_field( 'cl_picantee', array(
		    'type' => 'select',
		    'settings' => 'blog_align',
			'label' => esc_html__( 'Set Blog Align', 'picante' ),
			'tooltip' => esc_html__( 'Blog align', 'picante' ),
			'default' => 'left',
			'choices'     => array(
				
				'left'  => esc_attr__('left', 'picante' ),
				'center' => esc_attr__('center', 'picante' ),
				'right' => esc_attr__('right', 'picante' ),
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'selector' => '.blog-entries',
			'selectClass' => '',

			'transport' => 'postMessage'

    	));

    	Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_archive_layout',
			'label'    => esc_html__( 'Blog Archives Layout', 'picante' ),
			'tooltip' => esc_html__( 'Archives & Categories Layout', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
			    'none'  => esc_attr__( 'Use Default', 'picante' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'picante' )
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_post_layout',
			'label'    => esc_html__( 'Blog Posts Layout', 'picante' ),
			'tooltip' => esc_html__( 'Change the layout of blog posts, you can add custom sidebar for posts also.', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'right_sidebar',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'picante' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'picante' )
			),
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_post_style',
			'label'    => esc_html__( 'Blog Posts Style', 'picante' ),
			'tooltip' => esc_html__( 'Change the style of blog posts, you can add custom style for each post.', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'modern',
			'choices'     => array(
				'classic'  => esc_attr__( 'Classic', 'picante' ),
				'modern'  => esc_attr__( 'Modern', 'picante' ),
				'custom'  => esc_attr__( 'Custom ( Build with Page Builder )', 'picante' )
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_excerpt',
			'label'    => esc_html__( 'Enable auto excerpt', 'picante' ),
			'tooltip' => esc_html__( 'If enabled you will see only a small part of content. If disabled all post will show', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			

		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'type'        => 'number',
			'settings'    => 'blog_excerpt_length',
			'label'       => esc_attr__( 'Excerpt Length', 'picante' ),
			'section'     => 'cl_blog',
			'into_group' => true,
			'default'     => '60',
			'priority'    => 10,
			
		));
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_share_buttons',
			'label'    => esc_html__( 'Blog Share Buttons', 'picante' ),
			'tooltip' => esc_html__( 'Select Social share buttons that you want to use on blog page', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'multiple' => 6,
			'priority' => 10,
			'default'  => array('twitter', 'facebook', 'pinterest', 'google'),
			'choices'     => array(
				'twitter'  => esc_attr__( 'Twitter', 'picante' ),
				'facebook'  => esc_attr__( 'facebook', 'picante' ),
				'google'  => esc_attr__( 'Google', 'picante' ),
				'whatsapp'  => esc_attr__( 'Whatsapp', 'picante' ),
				'linkedin'  => esc_attr__( 'LinkedIn', 'picante' ),
				'pinterest'  => esc_attr__( 'Pinterest', 'picante' ),
			),
			'partial_refresh' => array(
		        'blog_share_buttons' => array(
		            'selector'            => '.entry-tool-share',
		            'render_callback'     => 'codeless_get_entry_tool_share'
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_overlay',
			'label'    => esc_html__( 'Blog Overlay Style', 'picante' ),
			'tooltip' => esc_html__( 'Select the style of overlay of blog image on hover', 'picante' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'color',
			'choices'     => array(
				'none'  => esc_attr__( 'None', 'picante' ),
				'color'  => esc_attr__( 'Color Overlay', 'picante' ),
				'zoom_color'  => esc_attr__( 'Zoom and Color', 'picante' ),
				'grayscale'  => esc_attr__( 'Grayscale', 'picante' ),
			),
			'transport' => 'refresh'
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_overlay_icon',
			'label'    => esc_html__( 'Overlay Icon', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'arrow-right',
			'choices'     => array(
				'plus2'  => esc_attr__( 'Plus', 'picante' ),
				'arrow-right'  => esc_attr__( 'Arrow Right', 'picante' ),
				'expand2'  => esc_attr__( 'Expand', 'picante' ),
				'image2'  => esc_attr__( 'Image', 'picante' ),
				'lightbox' => esc_attr__( 'Lightbox', 'picante' ),
			),
			'transport' => 'postMessage'
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_image_link',
			'label'    => esc_html__( 'Entry Image Link', 'picante' ),
			'tooltip' => esc_html__( 'Disable if you dont want that image linked with post', 'picante' ),
			'section'  => 'cl_blog',
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
			'settings' => 'blog_filters',
			'label'    => esc_html__( 'Blog Page Filterable', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'disabled',
			'choices'     => array(
				'disabled'  => esc_attr__( 'Disabled', 'picante' ),
				'small'  => esc_attr__( 'Small Square', 'picante' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' )
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_filters_color',
			'label'    => esc_html__( 'Filter BG', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'dark',
			'choices' => array(
				'dark'	=> esc_html__('Dark', 'picante'),
				'light'	=> esc_html__('Light', 'picante')
			),
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'blog_filters',
					'operator' => '==',
					'value'    => 'fullwidth'
				),
								
			),
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_lazyload',
			'label'    => esc_html__( 'Blog Lazyload', 'picante' ),
			
			'section'  => 'cl_blog',
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
		    		
		   'settings' => 'blog_divider_1',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_post_meta',
		   'label'    => esc_html__( 'Post Entry Meta', 'picante' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_meta_author',
			'label'    => esc_html__( 'Show Author Meta', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_author' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
			
		) );
		
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_meta_categories',
			'label'    => esc_html__( 'Show Categories Meta', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'refresh',
			/*'partial_refresh' => array(
		        'blog_entry_meta_categories' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),*/
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_meta_date',
			'label'    => esc_html__( 'Show Date Meta', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_date' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );


		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_meta_comments',
			'label'    => esc_html__( 'Show Comments Meta', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_date' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );

		
		
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_divider_2',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_post_tools',
		   'label'    => esc_html__( 'Post Entry Tools', 'picante' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		/*Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_tools_likes',
			'label'    => esc_html__( 'Show Post Likes', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_likes' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );*/

		/*Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_tools_share_counts',
			'label'    => esc_html__( 'Show Share Counts', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_share_counts' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );*/

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_tools_share',
			'label'    => esc_html__( 'Show Share Buttons', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_share' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );
		
		
		/*Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_entry_tools_comments_count',
			'label'    => esc_html__( 'Show Comments Count', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_comments_count' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );*/
		
		
		
		
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_divider_4',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_pagination',
		   'label'    => esc_html__( 'Pagination', 'picante' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_pagination_style',
			'label'    => esc_html__( 'Pagination Style', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'numbers',
			'choices'     => array(
				'numbers'  => esc_attr__( 'With Page Numbers', 'picante' ),
				'next_prev'  => esc_attr__( 'Next/Prev', 'picante' ),
				'load_more'  => esc_attr__( 'Load More Button', 'picante' ),
				'infinite_scroll'  => esc_attr__( 'Infinite Scroll', 'picante' ),
				
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_pagination_style' => array(
		            'selector'            => '.cl-blog-pagination',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	codeless_blog_pagination();
		            }
		        ),
		    ),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_pagination_align',
			'label'    => esc_html__( 'Pagination Align', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'center',
			'transport' => 'postMessage',
			'choices'     => array(
				'left'  => esc_attr__( 'Left', 'picante' ),
				'center'  => esc_attr__( 'Center', 'picante' ),
				'right'  => esc_attr__( 'Right', 'picante' ),
				
			),
		) );
		
		
		
		
		
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_divider_3',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_post_slider',
		   'label'    => esc_html__( 'Post Slider', 'picante' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_slider_pagination',
			'label'    => esc_html__( 'Enable Slider Pagination', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_slider_nav',
			'label'    => esc_html__( 'Enable Slider Prev/Next', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_slider_loop',
			'label'    => esc_html__( 'Enable Slider Loop', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
		) );
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_slider_lazyload',
			'label'    => esc_html__( 'Enable Slider Lazy Load', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
		) );
		

		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'blog_slider_effect',
			'label'    => esc_html__( 'Blog Slider Direction', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'scroll',
			'choices'     => array(
				'scroll'  => esc_attr__( 'Scroll', 'picante' ),
				'fade'  => esc_attr__( 'Fade', 'picante' ),
				'cube'  => esc_attr__( 'Cube', 'picante' ),
				'coverflow'  => esc_attr__( 'Coverflow', 'picante' ),
				'flip'  => esc_attr__( 'Flip', 'picante' ),
			),
		) );
		
		
		Kirki::add_field( 'cl_picantee', array(
		    'type' => 'slider',
		    'settings' => 'blog_slider_speed',
			'label' => esc_html__( 'Blog Slider Speed', 'picante' ),
			'tooltip' => esc_html__( 'Leave 0 to remove autoplay', 'picante' ),
			'default' => 0,
			'choices'     => array(
				'min'  => '0',
				'max'  => '5000',
				'step' => '100',
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			
    	));
		
		
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_divider_10',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_picantee', array(
		    		
		   'settings' => 'blog_single_blog_title',
		   'label'    => esc_html__( 'Single Blog', 'picante' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		
		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'single_blog_author_box',
			'label'    => esc_html__( 'Single Blog Author Info', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
		) );

		Kirki::add_field( 'cl_picantee', array(
			'settings' => 'single_blog_related',
			'label'    => esc_html__( 'Single Blog Related Posts', 'picante' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'picante' ),
				0 => esc_attr__( 'Off', 'picante' ),
			),
		) );	

?>