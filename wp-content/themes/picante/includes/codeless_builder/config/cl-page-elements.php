<?php
	
	Kirki::add_section( 'cl_codeless_page_builder', array(
	    'title'          => esc_html__( 'Page Builder', 'picante' ),
	    'description'    => esc_html__( 'Options for adding an additional element on header', 'picante' ),
	    'panel'          => '',
	    'type'			 => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );
	
	/* Row */
	
	cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Row', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => esc_html__('Manage all options of the selected Row', 'picante'),
			
			'icon'		  => 'icon-software-layout',
			'transport'   => 'postMessage',
			'paddingPositions' => array('top', 'bottom'),
			'settings'    => 'cl_row',
			'is_container' => true,
			'is_root'	  => true,
			'fields' => array(
				
				
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'row_layout_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Layout', 'picante'),
						'groupid' => 'layout'
					),
						
						
				
						'row_type' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Type', 'picante' ),
							'default'     => 'container',
							'choices' => array(
								'container' => esc_html__('Into Container', 'picante'),
								'container-fluid' => esc_html__('Stretch Content', 'picante')
							),
							'selector' => '.cl-row > .container, .cl-row > .container-fluid',
							'selectClass' => ' ',
							'group_vc' => esc_html__('Layout', 'picante')
						),
						
						/*'row_vertical_stretch' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Stretch', 'picante' ),
							'tooltip' => esc_attr__( 'Select the type of row to use, this option can be overrided by Design Tool', 'picante' ),
							'default'     => 'with_padd',
							'choices' => array(
								'with_padd' => esc_html__('With Padding', 'picante'),
								'no_padd' => esc_html__('No Padding (Fullheigt Stretch)', 'picante')
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => ' '
						),*/
						
						'fullheight' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Row', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row > div > .row',
							'addClass' => 'cl_row-fullheight cl_row-flex',
							'group_vc' => esc_html__('Layout', 'picante')
						),
						
						
						
						'content_pos' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Position', 'picante' ),
							'tooltip' => esc_attr__( 'Change position of columns and elements into the fullheight Row', 'picante' ),
							'default'     => 'middle',
							'choices' => array(
								'middle' => esc_html__('Middle', 'picante'),
								'top' => esc_html__('Top', 'picante'),
								'bottom' => esc_html__('Bottom', 'picante'),
								'stretch' => esc_html__('Stretch', 'picante')
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => 'cl_row-cp-',
							
							'cl_required'    => array(
								array(
									'setting'  => 'fullheight',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Layout', 'picante')
						),

						'custom_width_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Container Width', 'picante' ),
							'tooltip' => esc_html__('Switch on to add a custom width for container only for this row. Switch Off to leave the default container width.', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'group_vc' => esc_html__('Layout', 'picante')
						),

						'custom_width' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Container Width', 'picante' ),
							'tooltip' => esc_attr__( 'Is applied only for media screen (min-width: 1200px), value in pixel', 'picante' ),
							'default'     => codeless_get_mod('layout_container_width', 1100),
							'choices'     => array(
								'min'  => '0',
								'max'  => '1600',
								'step' => '10',
							),
							'suffix' => 'px',
							'selector' => '.cl-row > .container-content',
							'css_property' => 'width',
							'media_query' => '(min-width: 1200px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_width_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Layout', 'picante')
						),

						
					
					'row_layout_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Row Layout', 'picante'),
						'groupid' => 'layout'
					),
					
					/* ----------------------------------------------------- */
					
					'columns_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Columns', 'picante'),
						'groupid' => 'columns'
					),
						
						
						'columns_gap' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns Gap', 'picante' ),
							'tooltip'     => esc_html__('Distance between columns. Value in px', 'picante'),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.row > .cl_cl_column > .cl_column, .row > .cl_column',
							'css_property' => array('padding-left', 'padding-right'),
							'group_vc' => esc_html__('Columns', 'picante')
						),
						
						
						'equal_height' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Equal Columns Height', 'picante' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row > div > .row',
							'addClass' => 'cl_row-equal_height cl_row-flex',
							'group_vc' => esc_html__('Columns', 'picante')
						), 

						
						
					'columns_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Columns', 'picante'),
						'groupid' => 'columns'
					),
					


					'video_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Video', 'picante'),
						'groupid' => 'video'
					),
					
					
						'video' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Background', 'picante' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'self' =>	'Self-Hosted',
								'youtube' =>	'Youtube',
								'vimeo' => esc_html__('Vimeo', 'picante')
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),
						
						'video_mp4' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Mp4', 'picante' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),
						'video_webm' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Webm', 'picante' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),
						'video_ogv' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Ogv', 'picante' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),

						
						'video_youtube' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Youtube ID', 'picante' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'youtube',
								),
							
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),
						
						'video_vimeo' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Vimeo ID', 'picante' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'vimeo',
								),
							
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),
						
						'video_loop' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Video Loop', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => esc_html__('Video', 'picante')
						),

					'video_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Video', 'picante'),
						'groupid' => 'video'
					),


					/* --------------------------------------------- */
					
					'row_info_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Attributes', 'picante'),
						'groupid' => 'attr'
					),
					
						'row_disabled' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Disable Row', 'picante' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'disabled_row',
							'group_vc' => esc_html__('Attributes', 'picante')
						),
						
						'row_id' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'picante' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'picante' ),
							'default'     => '',
							'group_vc' => esc_html__('Attributes', 'picante')
						),
						
						'extra_class' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Extra Class', 'picante' ),
							'tooltip' => esc_attr__( 'Add extra class identifiers to this row, that can be used for various custom styles.', 'picante' ),
							'default'     => '',
							'group_vc' => esc_html__('Attributes', 'picante')
						),

						'anchor_label' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Anchor Label', 'picante' ),
							'tooltip' => esc_attr__( 'Used on Vertical Codeless Slider', 'picante' ),
							'default'     => '',
							'selector' => '.cl-row',
							'htmldata' => 'anchor',
							'group_vc' => esc_html__('Attributes', 'picante')
						),
						
			
					'row_info_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Attributes', 'picante'),
						'groupid' => 'attr'
					),
					
				
					
					
					
					/* ----------------------------------------------- */
					
					
				
				
				
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'general'
				),
				
				
				/*-------------------------------------------------------*/
				
				
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => esc_html__('Box', 'picante'),
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'row_default_padding', '45' ).'px', 'padding-bottom' => codeless_get_mod( 'row_default_padding', '45' ).'px' ),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Text Color', 'picante'),
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => esc_html__('Dark', 'picante'),
								'light-text' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl-row',
							'selectClass' => '',
							'group_vc' => esc_html__('Design', 'picante')
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => esc_html__('Background Color', 'picante'),
							'default' => '',
							'selector' => '.cl-row > .bg-layer',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'group_vc' => esc_html__('Design', 'picante')
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group',
						'group_vc' => esc_html__('Design', 'picante')
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( '', 'picante' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-image',
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'picante' ),
							'default'     => 'left top',
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
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),

						'background_size' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'picante' ),
							'default'     => 'cover',
							'choices' => array(
								'cover' => esc_html__('Cover', 'picante'),
								'auto' => 'auto',
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-size',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'picante' ),
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => array('background-repeat'),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'picante' ),
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'picante' ),
							'default'     => 'normal',
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
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'parallax' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Parallax', 'picante' ),
							'tooltip'       => esc_html__( 'Works with smoothscroll active only.', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-parallax',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'picante' ),
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'color' => esc_html__('Color', 'picante'),
								'gradient' => esc_html__('Gradient', 'picante')
							),
							'group_vc' => esc_html__('Design', 'picante')
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => esc_html__('Overlay Color', 'picante'),
							'default' => '',
							'selector' => '.cl-row > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false,
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'picante' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'azure_pop' =>	'Azure Pop',
								'love_couple' => esc_html__('Love Couple', 'picante'),
								'disco' => esc_html__('Disco', 'picante'),
								'limeade' => esc_html__('Limeade', 'picante'),
								'dania' => esc_html__('Dania', 'picante'),
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => esc_html__('Sun Horizon', 'picante'),
								'blood_red' => esc_html__('Blood Red', 'picante'),
								'sherbert' => esc_html__('Sherbert', 'picante'),
								'firewatch' => esc_html__('Firewatch', 'picante'),
								'frost' => esc_html__('Frost', 'picante'),
								'mauve' => esc_html__('Mauve', 'picante'),
								'deep_sea' => esc_html__('Deep Sea', 'picante'),
								'solid_vault' => esc_html__('Solid Vault', 'picante'),
								'deep_space' =>	'Deep Space',
								'suzy' => esc_html__('Suzy', 'picante')
								
								
							),
							'selector' => '.cl-row > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => esc_html__('Overlay Opacity', 'picante'),
							'default' => '0.8',
							'selector' => '.cl-row > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Border Style', 'picante'),
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'picante' ),
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl-row',
							'css_property' => 'border-style',
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => esc_html__('Border Color', 'picante'),
							'default' => '',
							'selector' => '.cl-row',
							'css_property' => 'border-color',
							'alpha' => true,
							'group_vc' => esc_html__('Design', 'picante')
						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Border Style', 'picante'),
						'groupid' => 'border',
						'group_vc' => esc_html__('Design', 'picante')
					),
					
					/* --------------------------------------------------- */


					/* ------------------------------------------ */
					
					
					'extra_styles_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Extra Style', 'picante'),
						'groupid' => 'extra_style'
					),
					
						'arrow_top' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Arrow Triangle Top', 'picante' ),
							'tooltip'       => esc_html__( 'Add an triangle arrow at top of section', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-arrow-top',
							'group_vc' => esc_html__('Design', 'picante')
						),

						'arrow_bottom' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Arrow Triangle Bottom', 'picante' ),
							'tooltip'       => esc_html__( 'Add an triangle arrow at bottom of section', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-arrow-bottom',
							'group_vc' => esc_html__('Design', 'picante')
						),

						'close_section' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Section on Button Click', 'picante' ),
							'tooltip'       => esc_html__( 'Hide by default the section and show it only when the "Show Section Button" was clicked. You can set the label for the button on General -> Anchor Label', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-closed-section',
							'group_vc' => esc_html__('Design', 'picante')
						),
					
					
					'extra_styles_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Extra Style', 'picante'),
						'groupid' => 'extra_style'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),





				'animation_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Animation', 'picante'),
					'tabid' => 'animation'
				),

				'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							'default'     => 'none',
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
							'selector' => '.cl-row > .bg-layer',
							'group_vc' => esc_html__('Animations', 'picante')
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
							'selector' => '.cl-row > .bg-layer',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Animations', 'picante')
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
							'selector' => '.cl-row > .bg-layer',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Animations', 'picante')
						),

				'animation_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Animation', 'picante'),
					'tabid' => 'animation'
				),




				'responsive_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),
					
					
						'device_visibility' => array(
							'type'     => 'multicheck',
							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'picante' ),
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (smaller-than-768px)', 'picante' ),
								'hidden-sm' => esc_attr__('Hide on Tables (larger-then-768px)', 'picante' ),
								'hidden-md' => esc_attr__('Hide on Medium Desktops (larger-then-992px) ', 'picante' ),
								'hidden-lg' => esc_attr__('Hide on Large Desktops (larger-then1200px)', 'picante' ),
							),
							'selector' => '.cl-row',
							'selectClass' => '',
							'group_vc' => esc_html__('Responsive', 'picante'),

						),

						'col_responsive' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Responsive Columns', 'picante' ),
							'tooltip' => esc_html__('This option will change the width of columns on tablets sizes from (768px to 992px). Important option to build responsive perfect layouts.', 'picante'),
							'default'     => 'none',
							'priority'    => 10,
							'choices'     => array(
								'none' => esc_html__('None', 'picante'),
								'full'  => esc_attr__( 'Fullwidth Columns', 'picante' ),
								'half' => esc_attr__( 'Half Width Columns', 'picante' ),
								'one_third' => esc_attr__( 'One / Third Width Columns', 'picante' ),
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => 'cl-col-tablet-',
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'css_style_991_row_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:991px', 'picante' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:991px', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'css_style_991' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'row_default_padding', '45' ).'px', 'padding-bottom' => codeless_get_mod( 'row_default_padding', '45' ).'px' ),
							'media_query' => '(max-width: 991px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_991_row_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),



						'css_style_767_row_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:767px', 'picante' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:767px', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
							
						),

						'css_style_767' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'row_default_padding', '45' ).'px', 'padding-bottom' => codeless_get_mod( 'row_default_padding', '45' ).'px' ),
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_767_row_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),
					

				'responsive_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),
			),
			
		) );
		

		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Row', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => esc_html__('Manage all options of the selected Row', 'picante'),
			
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_row_inner',
			'is_container' => true,
			'marginPositions' => array('top'),
			'fields' => array(
				'inner_columns_gap' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Inner Columns Gap', 'picante' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.row > .cl_cl_column_inner',
							'css_property' => array('padding-left', 'padding-right'),
							'customJS' => 'inlineEdit_InnerColumns'
						),
				'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl-row_inner',
							'css_property' => '',
							'default' => array('margin-top' => '35px'),
				),
			)
		));
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Column', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_column',
			'paddingPositions' => array('top', 'bottom', 'left', 'right'),
			'is_container' => true,
			'fields' => array(


				'width' => array(
					'type'     => 'select',
					'priority' => 10,
					'label'       => esc_attr__( 'Link Text', 'picante' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
					'default'     => '1/1',
					'show' => false,
					'choices'     => array(
						'1/12' => '1 Column',
						'1/6' => '2 Columns',
						'1/4' => '3 Columns',
						'1/3' => '4 Columns',
						'5/12' => '5 Columns',
						'1/2' => '6 Columns',
						'7/12' => '7 Columns',
						'2/3' => '8 Columns',
						'3/4' => '9 Columns',
						'5/6' => '10 Columns',
						'11/12' => '11 Columns',
						'1/1' => '12 Columns',
					),
				),
				
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
				
					'column_info_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Content Align', 'picante'),
						'groupid' => 'align'
					),
							

						'horizontal_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Horizontal Align', 'picante' ),
							'tooltip' => esc_attr__( 'Horizontal Alignment of elements into this column(container)', 'picante' ),
							'default'     => 'left',
							'choices' => array(
								'left' => esc_html__('Left', 'picante'),
								'middle' => esc_html__('Middle', 'picante'),
								'right' => esc_html__('Right', 'picante')
							),
							'selector' => '.cl_column',
							'selectClass' => 'align-h-',
							'group_vc' => esc_html__('Content Align', 'picante')
							
						),

						'vertical_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Align', 'picante' ),
							'tooltip' => esc_attr__( 'Vertical Alignment of elements into this column(container)', 'picante' ),
							'default'     => 'top',
							'choices' => array(
								'top' => esc_html__('Top', 'picante'),
								'middle' => esc_html__('Middle', 'picante'),
								'bottom' => esc_html__('Bottom', 'picante')
							),
							'selector' => '.cl_column',
							'selectClass' => 'align-v-',
							'group_vc' => esc_html__('Content Align', 'picante')
							
						),

						'fullheight_col' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Column', 'picante' ),
							'tooltip'	  => esc_html__( 'This option works only if the parent Row is Fullheight too', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl_column-fullheight',
							'group_vc' => esc_html__('Content Align', 'picante')
						),

						'inline_elements' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Inline Elements', 'picante' ),
							'tooltip' => esc_html__('By activating this, elements of this column will be shown inline.', 'picante'),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-inline-column',
							'group_vc' => esc_html__('Content Align', 'picante')
						),

						'flex_elements' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Flex Elements', 'picante' ),
							'tooltip' => esc_html__('By activating this, elements of this column will be shown as flex box, all inline in a flex box style.', 'picante'),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-flex-elements',
							'group_vc' => esc_html__('Content Align', 'picante')
						),

					'column_info_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Content Align', 'picante'),
						'groupid' => 'align'
					),

					'general_group_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'gen'
					),

						'col_sticky' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Sticky Column', 'picante' ),
							'tooltip' => esc_html__('Make this Column sticky on this page', 'picante'),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-sticky',
							'group_vc' => esc_html__('General', 'picante')
						),

						'custom_link' => array(

							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Column Link', 'picante' ),
							'default'     => '#',
							'reloadTemplate' => true,
							'group_vc' => esc_html__('General', 'picante')
						),

						'column_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Effect on hover', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'image_zoom' => esc_html__('Image Zoom', 'picante'),
								'anim_elements' => esc_html__('Animate Inner Elements on Hover', 'picante'),
								'background_hover' => esc_html__('Background Color on hover', 'picante')
							),
							'tooltip' => esc_html__('Please save and refresh the front page to see changes.', 'picante'),
							'selector' => '.cl_column',
							'selectClass' => 'effect-',
							'group_vc' => esc_html__('General', 'picante')
							
						),

						'services_list' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Connect Services', 'picante' ),
							'tooltip'       => esc_html__( 'Connect Services with lines. Works only with Services into this column. Only with Media Aside Service Style', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'services_list',
							'group_vc' => esc_html__('General', 'picante')
						),

						'col_disabled' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Disable Column', 'picante' ),
							'tooltip' => esc_html__('Make this Column invisible in this Page', 'picante'),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'disabled_col',
							'group_vc' => esc_html__('General', 'picante')
						),

					'general_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'gen'
					),

					'attr_group_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Attributes', 'picante'),
						'groupid' => 'attr'
					),

						'col_id' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Column Id', 'picante' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to columns.', 'picante' ),
							'default'     => '',
							'group_vc' => esc_html__('Attributes', 'picante')
						),
						
						'extra_class' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Extra Class', 'picante' ),
							'tooltip' => esc_attr__( 'Add extra class identifiers to this column, that can be used for various custom styles.', 'picante' ),
							'default'     => '',
							'group_vc' => esc_html__('Attributes', 'picante')
						),

					'attr_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Attributes', 'picante'),
						'groupid' => 'attr'
					),

					
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
					
					
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => esc_html__('Box', 'picante'),
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'column_default_padding', '10' ).'px', 'padding-bottom' => codeless_get_mod( 'column_default_padding', '10' ).'px'),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Text Color', 'picante'),
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => esc_html__('Dark', 'picante'),
								'light-text' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl_column',
							'selectClass' => '',
							'group_vc' => esc_html__('Design', 'picante')
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => esc_html__('Background Color', 'picante'),
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true,
							'group_vc' => esc_html__('Design', 'picante')
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( '', 'picante' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-image',
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'picante' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'picante' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'picante' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'picante' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'color' => esc_html__('Color', 'picante'),
								'gradient' => esc_html__('Gradient', 'picante')
							),
							'group_vc' => esc_html__('Design', 'picante')
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => esc_html__('Overlay Color', 'picante'),
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false,
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'azure_pop' =>	'Azure Pop',
								'love_couple' => esc_html__('Love Couple', 'picante'),
								'disco' => esc_html__('Disco', 'picante'),
								'limeade' => esc_html__('Limeade', 'picante'),
								'dania' => esc_html__('Dania', 'picante'),
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => esc_html__('Sun Horizon', 'picante'),
								'blood_red' => esc_html__('Blood Red', 'picante'),
								'sherbert' => esc_html__('Sherbert', 'picante'),
								'firewatch' => esc_html__('Firewatch', 'picante'),
								'frost' => esc_html__('Frost', 'picante'),
								'mauve' => esc_html__('Mauve', 'picante'),
								'deep_sea' => esc_html__('Deep Sea', 'picante'),
								'solid_vault' => esc_html__('Solid Vault', 'picante'),
								'deep_space' =>	'Deep Space',
								'suzy' => esc_html__('Suzy', 'picante')
								
								
							),
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => esc_html__('Overlay Opacity', 'picante'),
							'default' => '0.8',
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Hover', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'dark' =>	'Dark',
								'light' => esc_html__('Light', 'picante'),
								'soft_dark' => esc_html__('Soft Dark', 'picante')
							),
							'selector' => '.cl_column',
							'selectClass' => 'hover_',
							'group_vc' => esc_html__('Design', 'picante')
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Border Style', 'picante'),
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'picante' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => 'border-style',
							'group_vc' => esc_html__('Design', 'picante')
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => esc_html__('Border Color', 'picante'),
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => 'border-color',
							'alpha' => true,
							'group_vc' => esc_html__('Design', 'picante')
						),

						'border_rounded' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Border Rounded', 'picante' ),
							
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-border-rounded',
							'group_vc' => esc_html__('Design', 'picante')
						),

						'column_shadow' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Shadow', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'extra_small-shadow' => esc_html__('Extra Small', 'picante'),
								'small-shadow' => esc_html__('Small', 'picante'),
								'medium-shadow' => esc_html__('Medium', 'picante'),
								'large-shadow' => esc_html__('Large', 'picante'),
								'extra_large-shadow' => esc_html__('Extra Large', 'picante')
							),
							'selector' => '.cl_column',
							'selectClass' => '',
							'group_vc' => esc_html__('Design', 'picante')

						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Border Style', 'picante'),
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),


				'animation_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Animation', 'picante'),
					'tabid' => 'animation'
				),

					'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
								'flip-in' => esc_html__('Flip In', 'picante'),
								'reveal-right' => esc_html__('Reveal Right', 'picante'),
								'reveal-left' => esc_html__('Reveal Left', 'picante'),
								'reveal-top' => esc_html__('Reveal Top', 'picante'),
								'reveal-bottom' => esc_html__('Reveal Bottom', 'picante'),
							),
							'selector' => '.cl_column',
							'group_vc' => esc_html__('Animations', 'picante')
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
							'selector' => '.cl_column',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Animations', 'picante')
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
							'selector' => '.cl_column',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Animations', 'picante')
						),
				'animation_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Animation', 'picante'),
					'tabid' => 'animation'
				),





				'responsive_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),

					'device_visibility' => array(
							'type'     => 'multicheck',
							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'picante' ),
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (smaller-than-768px)', 'picante' ),
								'hidden-sm' => esc_attr__('Hide on Tables (larger-then-768px)', 'picante' ),
								'hidden-md' => esc_attr__('Hide on Medium Desktops (larger-then-992px) ', 'picante' ),
								'hidden-lg' => esc_attr__('Hide on Large Desktops (larger-then1200px)', 'picante' ),
							),
							'selector' => '.cl_column',
							'selectClass' => '',
							'group_vc' => esc_html__('Responsive', 'picante')
						),

					'css_style_991_col_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:991px', 'picante' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:991px', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'css_style_991' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'column_default_padding', '10' ).'px', 'padding-bottom' => codeless_get_mod( 'column_default_padding', '10' ).'px'),
							'media_query' => '(max-width: 991px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_991_col_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),



						'css_style_767_col_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:767px', 'picante' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:767px', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
							
						),

						'css_style_767' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'column_default_padding', '10' ).'px', 'padding-bottom' => codeless_get_mod( 'column_default_padding', '10' ).'px'),
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_767_col_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

				'responsive_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),
					
			),
			
		) );
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Column', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_column_inner',
			'paddingPositions' => array('top', 'bottom', 'left', 'right'),
			'is_container' => true,
			'fields' => array(



				'width' => array(
					'type'     => 'select',
					'priority' => 10,
					'label'       => esc_attr__( 'Link Text', 'picante' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
					'default'     => '1/1',
					'show' => false,
					'choices'     => array(
						'1/12' => '1 Column',
						'1/6' => '2 Columns',
						'1/4' => '3 Columns',
						'1/3' => '4 Columns',
						'5/12' => '5 Columns',
						'1/2' => '6 Columns',
						'7/12' => '7 Columns',
						'2/3' => '8 Columns',
						'3/4' => '9 Columns',
						'5/6' => '10 Columns',
						'11/12' => '11 Columns',
						'1/1' => '12 Columns',
					),
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
				'gen_tab_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
					),

				'horizontal_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Horizontal Align', 'picante' ),
							'tooltip' => esc_attr__( 'Horizontal Alignment of elements into this column(container)', 'picante' ),
							'default'     => 'left',
							'choices' => array(
								'left' => esc_html__('Left', 'picante'),
								'middle' => esc_html__('Middle', 'picante'),
								'right' => esc_html__('Right', 'picante')
							),
							'selector' => '.cl_column_inner',
							'selectClass' => 'align-h-',
							
						),

						'vertical_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Align', 'picante' ),
							'tooltip' => esc_attr__( 'Vertical Alignment of elements into this column(container)', 'picante' ),
							'default'     => 'top',
							'choices' => array(
								'top' => esc_html__('Top', 'picante'),
								'middle' => esc_html__('Middle', 'picante'),
								'bottom' => esc_html__('Bottom', 'picante')
							),
							'selector' => '.cl_column_inner',
							'selectClass' => 'align-v-',
							
						),

				'inline_elements' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Inline Elements', 'picante' ),
							'tooltip' => esc_html__('By activating this, elements of this column will be shown inline.', 'picante'),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column_inner',
							'addClass' => 'cl-inline-column'
					),

					'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'dark' =>	'Dark',
								'light' => esc_html__('Light', 'picante'),
								'soft_dark' => esc_html__('Soft Dark', 'picante')
							),
							'selector' => '.cl_column_inner',
							'selectClass' => 'hover_',
						),

					'col_disabled' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Disable Column', 'picante' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_column_inner',
							'addClass' => 'disabled_col'
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
								'top-t-bottom' =>	'Top-Bottom',
								'bottom-t-top' =>	'Bottom-Top',
								'right-t-left' => esc_html__('Right-Left', 'picante'),
								'left-t-right' => esc_html__('Left-Right', 'picante'),
								'alpha-anim' => esc_html__('Fade-In', 'picante'),	
								'zoom-in' => esc_html__('Zoom-In', 'picante'),	
								'zoom-out' => esc_html__('Zoom-Out', 'picante'),
								'zoom-reverse' => esc_html__('Zoom-Reverse', 'picante'),
							),
							'selector' => '.cl_column_inner',
							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_column_inner',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_column_inner',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'animation'
					),

					'gen_tab_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
					),

					'design_tab_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('Design', 'picante'),
						'tabid' => 'design'
					),
				
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => esc_html__('Box', 'picante'),
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '10px', 'padding-bottom' => '10px'),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Text Color', 'picante'),
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => esc_html__('Dark', 'picante'),
								'light-text' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl_column_inner',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => esc_html__('Background Color', 'picante'),
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Background Image', 'picante' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'picante' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'picante' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'picante' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'picante' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'color' => esc_html__('Color', 'picante'),
								'gradient' => esc_html__('Gradient', 'picante')
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => esc_html__('Overlay Color', 'picante'),
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => true
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'azure_pop' =>	'Azure Pop',
								'love_couple' => esc_html__('Love Couple', 'picante'),
								'disco' => esc_html__('Disco', 'picante'),
								'limeade' => esc_html__('Limeade', 'picante'),
								'dania' => esc_html__('Dania', 'picante'),
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => esc_html__('Sun Horizon', 'picante'),
								'blood_red' => esc_html__('Blood Red', 'picante'),
								'sherbert' => esc_html__('Sherbert', 'picante'),
								'firewatch' => esc_html__('Firewatch', 'picante'),
								'frost' => esc_html__('Frost', 'picante'),
								'mauve' => esc_html__('Mauve', 'picante'),
								'deep_sea' => esc_html__('Deep Sea', 'picante'),
								'solid_vault' => esc_html__('Solid Vault', 'picante'),
								'deep_space' =>	'Deep Space',
								'suzy' => esc_html__('Suzy', 'picante')
								
								
							),
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => esc_html__('Overlay Opacity', 'picante'),
							'default' => '0.8',
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Border Style', 'picante'),
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'picante' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => 'border-style'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => esc_html__('Border Color', 'picante'),
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => 'border-color',
							'alpha' => true
						),

						'column_shadow' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Shadow', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'extra_small-shadow' => esc_html__('Extra Small', 'picante'),
								'small-shadow' => esc_html__('Small', 'picante'),
								'medium-shadow' => esc_html__('Medium', 'picante'),
								'large-shadow' => esc_html__('Large', 'picante'),
								'extra_large-shadow' => esc_html__('Extra Large', 'picante')
							),
							'selector' => '.cl_column_inner > .wrapper',
							'selectClass' => '',

						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Border Style', 'picante'),
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),


				'responsive_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),

					'css_style_991_colinner_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:991px', 'picante' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:991px', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
						),

						'css_style_991' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '10px', 'padding-bottom' => '10px'),
							'media_query' => '(max-width: 991px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_991_colinner_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
						),



						'css_style_767_colinner_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:767px', 'picante' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:767px', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							
						),

						'css_style_767' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '10px', 'padding-bottom' => '10px'),
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_767_colinner_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
						),

				'responsive_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),
				
				
			),
			
		) );


		/* Page Header */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Page Header', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'icon'		  => 'icon-software-layout-header',
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_page_header',
			'shiftClick'  => 'h1_dark_color',
			'marginPositions' => array('top'),
			'is_container' => false,
			'is_root'	  => true,
			'fields' => array(
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
					
					'title' => array(
						'type'     => 'inline_text',
						'only_text' => true,
						'priority' => 10,
						'selector' => '.cl_page_header h1',
						'label'       => esc_attr__( 'Title', 'picante' ),
						'default'     => '',
						'holder' => 'div'
					),
					
					
					'type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Page Header Style', 'picante' ),
							
							'default'     => 'simple',
							'choices' => array(
								'simple'	=> esc_html__('Simple', 'picante'),
								'modern' =>	'Modern'
								
							),

							'selector' => '.cl_page_header',
							'selectClass' => '',
							'reloadTemplate' => true
							
					),



					
					'modern_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Modern Title Position', 'picante' ),
							
							'default'     => 'center',
							'choices' => array(
								'left_center'	=> esc_html__('Left Center', 'picante'),
								'center' =>	'Center',
								'right_center' => esc_html__('Right Center', 'picante'),
								'left_bottom' => esc_html__('Left Bottom', 'picante'),
								'center_bottom' => esc_html__('Center Bottom', 'picante'),
								'right_bottom' => esc_html__('Right Bottom', 'picante'),
								
							),
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
							
							'selector' => '.cl_page_header',
							'selectClass' => 'modern-'
							
					),
					
					
					
						
					'add_description' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Description or second title', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
							
					),

					'hide_title' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Hide title, use as bg only', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'hide-title'
							
					),
					
					'tooltip' => array(
						'type'     => 'inline_text',
						'only_text' => true,
						'priority' => 10,
						'selector' => '.cl_page_header span.subtitle',
						'label'       => esc_attr__( 'tooltip', 'picante' ),
						'default'     => esc_html__('click to edit description', 'picante' ),
					),
					

					'modern_effect' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Effect', 'picante' ),
							'default'     => 'none',
							'priority'    => 10,
							'choices'     => array(
								'none' => esc_attr__( 'None', 'picante' ),
								'gradient_shadow'  => esc_attr__( 'Gradient Shadow', 'picante' )
							),
							'selector' => '.cl_page_header',
							'selectClass' => 'modern-effect-',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
						),
					
					
				
				
				
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
				
				
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => esc_html__('Box', 'picante'),
						'groupid' => 'design_panel'
					),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_page_header',
							'css_property' => '',
							'default' => array()
						),
				
						'height' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Height', 'picante'),
							'default' => '300',
							'selector' => '.cl_page_header',
							'css_property' => 'height',
							'suffix' => 'px',
							'choices'     => array(
								'min'  => '40',
								'max'  => '600',
								'step' => '5',
								'suffix' => 'px'
							),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Text Color', 'picante'),
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => esc_html__('Dark', 'picante'),
								'light-text' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl_page_header',
							'selectClass' => ''
						),


					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => esc_html__('Background Color', 'picante'),
							'default' => '',
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true,
							'choices' => array(
								'alpha' => true
							)
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Color', 'picante'),
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Background image', 'picante' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'picante' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'picante' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'picante' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'picante' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'parallax' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Parallax', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'cl-parallax',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Background Image', 'picante'),
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => esc_html__('Overlay & Border', 'picante'),
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'color' => esc_html__('Color', 'picante'),
								'gradient' => esc_html__('Gradient', 'picante')
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => esc_html__('Overlay Color', 'picante'),
							'default' => '',
							'selector' => '.cl_page_header .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'azure_pop' =>	'Azure Pop',
								'love_couple' => esc_html__('Love Couple', 'picante'),
								'disco' => esc_html__('Disco', 'picante'),
								'limeade' => esc_html__('Limeade', 'picante'),
								'dania' => esc_html__('Dania', 'picante'),
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => esc_html__('Sun Horizon', 'picante'),
								'blood_red' => esc_html__('Blood Red', 'picante'),
								'sherbert' => esc_html__('Sherbert', 'picante'),
								'firewatch' => esc_html__('Firewatch', 'picante'),
								'frost' => esc_html__('Frost', 'picante'),
								'mauve' => esc_html__('Mauve', 'picante'),
								'deep_sea' => esc_html__('Deep Sea', 'picante'),
								'solid_vault' => esc_html__('Solid Vault', 'picante'),
								'deep_space' =>	'Deep Space',
								'suzy' => esc_html__('Suzy', 'picante')
								
								
							),
							'selector' => '.cl_page_header .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => esc_html__('Overlay Opacity', 'picante'),
							'default' => '0.8',
							'selector' => '.cl_page_header .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => esc_html__('Border Color', 'picante'),
							'default' => '#ebebeb',
							'selector' => '.cl_page_header',
							'css_property' => 'border-color',
							'alpha' => true
						),

						'add_border_top' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Border Top', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'border_top',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'simple',
								),
							),
						),
					
					'add_border_bottom' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Border Bottom', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'border_bottom',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'simple',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Overlay', 'picante'),
						'groupid' => 'overlay'
					),
					
					'typography_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography'
					),


					'typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Typography', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style', 'picante'),
							'default'     => 'h1',
							'priority'    => 10,
							'selector' => '.cl_page_header .title_part h1',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'picante' ),
								'h2' => esc_attr__( 'H2', 'picante' ),
								'h3' => esc_attr__( 'H3', 'picante' ),
								'h4' => esc_attr__( 'H4', 'picante' ),
								'h5' => esc_attr__( 'H5', 'picante' ),
								'h6' => esc_attr__( 'H6', 'picante' ),
								'custom_font' => esc_attr__( 'Custom Font', 'picante' ),
							),
						),

					
					'title_font_size' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Title Font Size', 'picante'),
							'default' => '18',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '72',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),

					'title_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => esc_html__('Title Font Weight', 'picante'),
							'default' => '600',
							'selector' => '.cl_page_header .title_part h1',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
						
					'title_line_height' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Title Line Height', 'picante'),
							'default' => '22',
							'selector' => '.cl_page_header .title_part h1',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
					
					'title_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Title Text Transform', 'picante' ),
							
							'default'     => 'none',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'uppercase' => esc_html__('Uppercase', 'picante')
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),

						'title_color' => array(
							'type'     => 'color',
							'priority' => 10,
							'label'       => esc_attr__( 'Title Color', 'picante' ),
							
							'default'     => '',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'color',
							
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),
						
					
						
					
					'desc_color' => array(
							'type' => 'color',
							'label' => esc_html__('Subtitle Color', 'picante'),
							'default' => '',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'color',
							'alpha' => true
					),
					
					'desc_font_size' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Subtitle Font Size', 'picante'),
							'default' => '14',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '60',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),

					'desc_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => esc_html__('Subtitle Font Weight', 'picante'),
							'default' => '300',
							'selector' => '.cl_page_header .title_part .subtitle',
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
							)
						),
						
					'desc_line_height' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Subtitle Line Height', 'picante'),
							'default' => '18',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '80',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),
						
					'desc_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Subtitle Text Transform', 'picante' ),
							
							'default'     => 'none',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'uppercase' => esc_html__('Uppercase', 'picante')
							)
							
						),
						
					
					
					'typography_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography'
					),
					
					
				
					/* ------------------------------------------ */
	
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),
				
				
			),
			
		) );

 		/* Text */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Text', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			
			'icon'		  => 'icon-software-font-smallcaps',
			'transport'   => 'postMessage',
			'settings'    => 'cl_text',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-text',
					'label'       => esc_attr__( 'Text', 'picante' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
					'default'     => esc_html__('At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores ', 'picante'),
					'group_vc' => esc_html__('General', 'picante'),
					'holder' => 'div'
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
					'general_tab_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
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
									'group_vc' => esc_html__('General', 'picante')
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
									'group_vc' => esc_html__('General', 'picante')
								),

							
							'text_font_family' => array(
			
									'type' => 'inline_select',
									'label' => esc_html__('Font Family', 'picante'),
									'default' => 'theme_default',
									'selector' => '.cl-text',
									'css_property' => 'font-family',
									'choices' => codeless_get_google_fonts(),
									
									'cl_required'    => array(
										array(
											'setting'  => 'custom_typography',
											'operator' => '==',
											'value'    => true,
										),
									),
									'group_vc' => esc_html__('General', 'picante')
								),

							'text_font_size' => array(
			
									'type' => 'slider',
									'label' => esc_html__('Text Font Size', 'picante'),
									'default' => '14',
									'selector' => '.cl-text',
									'css_property' => 'font-size',
									'choices'     => array(
										'min'  => '14',
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
									'group_vc' => esc_html__('General', 'picante')
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
									'group_vc' => esc_html__('General', 'picante')
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
									'group_vc' => esc_html__('General', 'picante')
								),

							'text_letterspace' => array(
			
									'type' => 'slider',
									'label' => esc_html__('Letter Spacing', 'picante'),
									'default' => '0',
									'selector' => '.cl-text',
									'css_property' => 'letter-spacing',
									'choices'     => array(
										'min'  => '-10',
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
									'group_vc' => esc_html__('General', 'picante')
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
									'group_vc' => esc_html__('General', 'picante')
									
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
									'group_vc' => esc_html__('General', 'picante')
							),

						'typography_end' => array(
								'type' => 'group_end',
								'label' => esc_html__('Typography', 'picante'),
								'groupid' => 'typography'
						),

					'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
					),

				'design_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),
					

					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.cl-text',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' ),
						'group_vc' => esc_html__('Design', 'picante')
					),

				'design_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),

				'animation_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('Animation', 'picante'),
						'tabid' => 'animation'
					),
					
						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
							'selector' => '.cl-text',
							'group_vc' => esc_html__('Animation', 'picante')
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
							'group_vc' => esc_html__('Animation', 'picante')
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
							'group_vc' => esc_html__('Animation', 'picante')
						),
					
					'animation_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('Animation', 'picante'),
						'tabid' => 'animation'
					),

				'responsive_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive' 
				),

					'custom_responsive_992_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:992px', 'picante' ),
							'tooltip' => esc_html__('Add a custom size for this heading for screens smaller than 992px', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								)
							),
							'group_vc' => esc_html__('Responsive', 'picante')
							
						),

						'custom_responsive_992_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:992px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 992px', 'picante' ),
							'default'     => '24px',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'custom_responsive_992_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:992px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 992px', 'picante' ),
							'default'     => '30px',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

					'custom_responsive_768_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:768px', 'picante' ),
							'tooltip' => esc_html__('Add a custom size for this heading for screens smaller than 768px', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
							
						),

						'custom_responsive_768_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:768px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 768px', 'picante' ),
							'default'     => '18px',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'custom_responsive_768_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:768px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 768px', 'picante' ),
							'default'     => '26px',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),


				'responsive_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Responsive', 'picante'),
					'tabid' => 'responsive'
				),


				
			),
			
		) );

 		/* Custom Heading */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Heading', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			
			'icon'		  => 'icon-software-character',
			'transport'   => 'postMessage',
			'settings'    => 'cl_custom_heading',
			'marginPositions' => array('top'),
			'is_container' => false,
			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-custom-heading',
					'label'       => esc_attr__( 'Text', 'picante' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
					'default'     => esc_html__('Custom Heading', 'picante'),
					'group_vc' => esc_html__('General', 'picante'),
					'holder' => 'h3'
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
					'general_tab_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
					),

						'option_start' => array(
								'type' => 'group_start',
								'label' => esc_html__('Options', 'picante'),
								'groupid' => 'options'
							),

							'tag' => array(
										'type'        => 'inline_select',
										'label'       => esc_html__( 'Heading Tag', 'picante' ),
										'tooltip' => esc_html__('Useful for SEO', 'picante'),
										'default'     => 'h2',
										'priority'    => 10,
										'selector' => '.cl-custom-heading',
										'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'picante' ),
											'h2' => esc_attr__( 'H2', 'picante' ),
											'h3' => esc_attr__( 'H3', 'picante' ),
											'h4' => esc_attr__( 'H4', 'picante' ),
											'h5' => esc_attr__( 'H5', 'picante' ),
											'h6' => esc_attr__( 'H6', 'picante' ),
										),
										'group_vc' => esc_html__('General', 'picante')
							),

						'option_end' => array(
								'type' => 'group_end',
								'label' => esc_html__('Options', 'picante'),
								'groupid' => 'options'
							),

						'typography_start' => array(
								'type' => 'group_start',
								'label' => esc_html__('Typography', 'picante'),
								'groupid' => 'typography'
							),
 
							'typography' => array(
										'type'        => 'inline_select',
										'label'       => esc_html__( 'Title Typography', 'picante' ),
										'tooltip' => esc_html__('Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style', 'picante'),
										'default'     => 'h2',
										'priority'    => 10,
										'selector' => '.cl-custom-heading',
										'selectClass' => 'custom_font ',
										'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'picante' ),
											'h2' => esc_attr__( 'H2', 'picante' ),
											'h3' => esc_attr__( 'H3', 'picante' ),
											'h4' => esc_attr__( 'H4', 'picante' ),
											'h5' => esc_attr__( 'H5', 'picante' ),
											'h6' => esc_attr__( 'H6', 'picante' ),
											'custom_font' => esc_attr__( 'Custom Font', 'picante' ),
										),
										'group_vc' => esc_html__('General', 'picante')
									),

					
								'text_font_family' => array(
				
										'type' => 'inline_select',
										'label' => esc_html__('Font Family', 'picante'),
										'default' => 'theme_default',
										'selector' => '.cl-custom-heading',
										'css_property' => 'font-family',
										'choices' => codeless_get_google_fonts(),
										
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => esc_html__('General', 'picante')
									),

								'text_font_size' => array(
				
										'type' => 'slider',
										'label' => esc_html__('Font Size', 'picante'),
										'default' => '22',
										'selector' => '.cl-custom-heading',
										'css_property' => 'font-size',
										'choices'     => array(
											'min'  => '14',
											'max'  => '160',
											'step' => '1',
											'suffix' => 'px'
										),
										'suffix' => 'px',
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => esc_html__('General', 'picante')
									),

								'text_font_weight' => array(
				
										'type' => 'inline_select',
										'label' => esc_html__('Font Weight', 'picante'),
										'default' => '700',
										'selector' => '.cl-custom-heading',
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
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => esc_html__('General', 'picante')
									),
									
								'text_line_height' => array(
				
										'type' => 'slider',
										'label' => esc_html__('Line Height', 'picante'),
										'default' => '34',
										'selector' => '.cl-custom-heading',
										'css_property' => 'line-height',
										'choices'     => array(
											'min'  => '20',
											'max'  => '200',
											'step' => '1',
											'suffix' => 'px'
										),
										'suffix' => 'px',
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => esc_html__('General', 'picante')
									),

								'text_letterspace' => array(
					
											'type' => 'slider',
											'label' => esc_html__('Letter-Spacing', 'picante'),
											'default' => '0',
											'selector' => '.cl-custom-heading',
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
													'setting'  => 'typography',
													'operator' => '==',
													'value'    => 'custom_font',
												),
											),
											'group_vc' => esc_html__('General', 'picante')
										),
								
								'text_transform' => array(
										'type'     => 'inline_select',
										'priority' => 10,
										'label'       => esc_attr__( 'Text Transform', 'picante' ),
										
										'default'     => 'uppercase',
										'selector' => '.cl-custom-heading',
										'css_property' => 'text-transform',
										'choices' => array(
											'none' => esc_html__('None', 'picante'),
											'uppercase' => esc_html__('Uppercase', 'picante')
										),
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => esc_html__('General', 'picante')
										
									),
									
								
									
								
								'text_color' => array(
										'type' => 'color',
										'label' => esc_html__('Color', 'picante'),
										'default' => '',
										'selector' => '.cl-custom-heading',
										'css_property' => 'color',
										'alpha' => true,
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => esc_html__('General', 'picante')
								),

								
							'typography_end' => array(
								'type' => 'group_end',
								'label' => esc_html__('Typography', 'picante'),
								'groupid' => 'typography'
							),

							'parallel_divider' => array(
										'type'        => 'switch',
										'label'       => esc_html__( 'Parallel Divider Style', 'picante' ),
										'tooltip' => esc_html__('Add a paralell divider (style) to this heading.', 'picante'),
										'default'     => 0,
										'priority'    => 10,
										'choices'     => array(
											'on'  => esc_attr__( 'On', 'picante' ),
											'off' => esc_attr__( 'Off', 'picante' ),
										),
										'selector' => '.wrapper-heading',
										'addClass' => 'parallel-divider',
										'reloadTemplate' => true,
										'group_vc' => esc_html__('General', 'picante')			
									),

							'heading_with_icon' => array(
										'type'        => 'switch',
										'label'       => esc_html__( 'Add Icon', 'picante' ),
										'default'     => 0,
										'priority'    => 10,
										'choices'     => array(
											'on'  => esc_attr__( 'On', 'picante' ),
											'off' => esc_attr__( 'Off', 'picante' ),
										),
										'selector' => '.wrapper-heading',
										'addClass' => 'with-icon',
										'reloadTemplate' => true,
										'group_vc' => esc_html__('General', 'picante')			
									),

							'icon' => array(
										'type'     => 'select_icon',
										'priority' => 10,
										'label'       => esc_attr__( '', 'picante' ),
										'default'     => 'cl-icon-apps',
										'selector' => '.wrapper-heading i[class]',
										'selectClass' => ' ',
										'cl_required'    => array(
											array(
												'setting'  => 'heading_with_icon',
												'operator' => '==',
												'value'    => true,
											),
										),
										'group_vc' => esc_html__('General', 'picante')
									),

							'color_icon' => array(
										'type'     => 'color',
										'priority' => 10,
										'label'       => esc_attr__( 'Icon Color', 'picante' ),
										'default'     => '#222',
										'selector' => '.wrapper-heading i[class]',
										'css_property' => 'color',
										'alpha' => true,
										'cl_required'    => array(
											array(
												'setting'  => 'heading_with_icon',
												'operator' => '==',
												'value'    => true,
											),
										),
										'group_vc' => esc_html__('General', 'picante')
									),

				'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
					),
					

				'box_tab_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('Design', 'picante'),
						'tabid' => 'design'
				),
					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.wrapper-heading',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px'),
						'group_vc' => esc_html__('Design', 'picante')
					),

					'add_background_color' => array(
						'type'        => 'switch',
						'label'       => esc_html__( 'Add Background Color', 'picante' ),
						'tooltip' => esc_html__('Add a paralell divider (style) to this heading.', 'picante'),
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'picante' ),
							'off' => esc_attr__( 'Off', 'picante' ),
						),
						'selector' => '.cl-custom-heading',
						'addClass' => 'display-inline',
						'group_vc' => esc_html__('Design', 'picante')	
					),

					'background_color' => array(
							'type' => 'color',
							'label' => esc_html__('Background Color', 'picante'),
							'default' => '',
							'selector' => '.cl-custom-heading',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'add_background_color',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => esc_html__('Design', 'picante')
					),

					'border_style' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Border Style', 'picante' ),
								
								'default'     => 'solid',
								'choices' => array(
									'solid'	=> 'solid',
									'dotted' =>	'dotted',
									'dashed' =>	'dashed',
									'double' => 'double',
									'groove' => 'groove',
									'ridge' => 'ridge',	
									'inset' => 'inset',	
									'outset' => 'outset',
								),
								'selector' => '.cl-custom-heading',
								'css_property' => 'border-style',
								'group_vc' => esc_html__('Design', 'picante')
							),
							
					'border_color' => array(
						'type' => 'color',
						'label' => esc_html__('Border Color', 'picante'),
						'default' => '',
						'selector' => '.cl-custom-heading',
						'css_property' => 'border-color',
						'alpha' => true,
						'group_vc' => esc_html__('Design', 'picante')
					),
				'box_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('Design', 'picante'),
						'tabid' => 'design'
				),


				'animation_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('Animation', 'picante'),
						'tabid' => 'animation'
					),
					
						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
							'selector' => '.cl-custom-heading',
							'group_vc' => esc_html__('Animation', 'picante')
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
							'selector' => '.cl-custom-heading',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Animation', 'picante')
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
							'selector' => '.cl-custom-heading',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => esc_html__('Animation', 'picante')
						),
					
					'animation_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('Animation', 'picante'),
						'tabid' => 'animation'
					),

				'responsive_tab_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('Responsive', 'picante'),
						'tabid' => 'responsive'
				),


						'custom_responsive_992_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:992px', 'picante' ),
							'tooltip' => esc_html__('Add a custom size for this heading for screens smaller than 992px', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								)
							),
							'group_vc' => esc_html__('Responsive', 'picante')
							
						),

						'custom_responsive_992_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:992px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 992px', 'picante' ),
							'default'     => '24px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'custom_responsive_992_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:992px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 992px', 'picante' ),
							'default'     => '30px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

					'custom_responsive_768_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:768px', 'picante' ),
							'tooltip' => esc_html__('Add a custom size for this heading for screens smaller than 768px', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								)
							),
							'group_vc' => esc_html__('Responsive', 'picante')
							
						),

						'custom_responsive_768_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:768px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 768px', 'picante' ),
							'default'     => '18px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),

						'custom_responsive_768_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:768px', 'picante' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 768px', 'picante' ),
							'default'     => '26px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => esc_html__('Responsive', 'picante')
						),
				'responsive_tab_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('Responsive', 'picante'),
						'tabid' => 'responsive'
				),
			),
			
		) );

 		/* Button */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Button', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-signs',
				'transport'   => 'postMessage',
				'settings'    => 'cl_button',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'btn_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-btn span',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
						'default'     => esc_html__('View More', 'picante'),
						'only_text' => true,
						'holder' => 'div'
					),

					'overwrite_style' => array (

							'type' => 'switch',
							'priority' => 10,
							'default'=> 0,
							'label' => esc_attr__( 'Overwrite the default button style', 'picante' ),
						    'choices' => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							
							),		

				     ),

					

					'button_style' => array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => esc_html__('Button Style', 'picante'),
						'default'=> 'square',
						'choices' => array(

							'square' => esc_html__('Square', 'picante'),
							'rounded' => esc_html__('Rounded', 'picante'),
							'simple_text' => esc_html__('Simple Text', 'picante'),
							'square_small' => esc_html__('Square Small', 'picante')
		
						),

						'selector' => '.cl-btn',
						'selectClass' => 'btn-style-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'with_icon' => array (

							'type' => 'switch',
							'priority' => 10,
							'default'=> 0,
							'label' => esc_attr__( 'With Icon', 'picante' ),
						    'choices' => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							
							),
							'selector' => '.cl-btn',
							'addClass' => 'with_icon',
							'cl_required' => array(

								array(

									'setting'  => 'overwrite_style',
									'operator' => '!=',
									'value'    => 0,

								),	
								
							),		

				     ),

					

					'button_bg_color'=> array(

						'type' => 'color',
						'priority'=> 10,
						'label' => esc_html__('Button Background Color', 'picante'),
						'default' => codeless_get_mod( 'primary_color' ),
						'selector' => '.cl-btn',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					/*'button_bg_color_hover'=> array(

						'type' => 'color',
						'priority'=> 10,
						'label' => esc_html__('Button Background Color on Hover', 'picante'),
						'default' => '#ffffff',
						'selector' => '.cl-btn',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),*/

					'button_font_color' => array(

						'type' => 'color',
				        'priority'=> 10,
						'label' => esc_html__('Button Font Color', 'picante'), 
						'default'=> '#ffffff',
						'selector'=> '.cl-btn',
						'css_property'=> 'color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					/*'button_font_color_hover' => array(

						'type' => 'color',
				        'priority'=> 10,
						'label' => esc_html__('Button Font Color on Hover', 'picante'), 
						'default'=> codeless_get_mod( 'highlight_dark_color' ),
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),*/



					'button_border_color' => array(
						
						'type'=> 'color',
						'priority'=> 10,
						'label'=> esc_html__('Button Border Color', 'picante'),
						'default' => 'transparent',
						'selector' => '.cl-btn',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),	

					'button_hover_effect' => array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => esc_html__('Button Hover Effect', 'picante'),
						'default'=> 'darker',
						'choices' => array(

							'darker' => esc_html__('Darker', 'picante'),
							'shadow' => 'shadow'
		
						),

						'selector' => '.cl-btn',
						'selectClass' => 'btn-hover-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),


					/*'button_border_color_hover' => array(
						
						'type'=> 'color',
						'priority'=> 10,
						'label'=> esc_html__('Button Border Color Hover', 'picante'),
						'default' => 'transparent',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),	*/


					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'picante' ),
						'default'     => '#'
					),

					'target' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Link Target', 'picante' ),
							'default'     => '_self',

							'choices'     => array(
								'_self' => esc_html__('_self', 'picante'),
								'_blank' => esc_html__('_blank', 'picante'),				
							),
							'reloadTemplate' => true
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl-btn-div',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
					),

					'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
							'selector' => '.cl-btn-div'
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
							'selector' => '.cl-btn-div',
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
							'selector' => '.cl-btn-div',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),
				)
			));

 		/* Divider */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Divider', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			
			'icon'		  => 'icon-arrows-minus',
			'transport'   => 'postMessage',
			'settings'    => 'cl_divider',
			'use_on_header' => true,
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
				'height' => array(
					'type'     => 'slider',
					'label' => esc_html__('Divider height', 'picante'),
					'default' => '1',
					'selector' => '.cl_divider .inner',
					'css_property' => 'border-top-width',
					'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1',
								'suffix' => 'px'
							),
				    'suffix' => 'px',

					'label'       => esc_attr__( 'Divider Height', 'picante' ),
					'tooltip' => esc_attr__( 'Set the divider height', 'picante' )
					
				),

				'width_full' => array(
	
							'type'        => 'switch',
							'label'       => esc_html__( 'Set divider fullwidth', 'picante' ),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
						),
					
					
				'width' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Set the divider width', 'picante'),
							'default' => '300',
							'selector' => '.cl_divider .wrapper',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '1',
								'max'  => '1070',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',

							'cl_required'    => array(
								array(
									'setting'  => 'width_full',
									'operator' => '==',
									'value'    => 0,
								),
							),
						),


				'color' => array(
							'type' => 'color',
							'label' => esc_html__('Set Color', 'picante'),
							'default' => '#222',
							'selector' => '.cl_divider .inner',
							'css_property' => 'border-color',
							'alpha' => true
							
					),

				'border_style' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Set the border style', 'picante'),
							'default' => 'solid',
							'selector' => '.cl_divider .inner',
							'css_property' => 'border-style',
							'choices'     => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset'
							
							),
							
							
					),

				'align' => array( 

						    'type' => 'inline_select',
							'label' => esc_html__('Set the border align', 'picante'),
							'default' => '',
							'selector' => '.cl_divider .wrapper',
							'choices'     => array(
								'left_divider'	=> 'left',
								'center_divider' =>	'center',
								'right_divider' =>	'right',
								
															
							),
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'width_full',
									'operator' => '==',
									'value'    => 0,
								),
							),


					),


				'divider_style' => array(
	
							'type' => 'inline_select',
							'label' => esc_html__('Select the style of the divider', 'picante'),
							'default' => 'simple',
							'selector' => '.cl_divider .wrapper',
							'choices'     => array(
								'simple' => esc_html__('Simple', 'picante'),
								'two' => esc_html__('Two Borders', 'picante'),
								'icon' => esc_html__('With Centred Icon', 'picante')
							
							),
							'reloadTemplate' => true
							
						),
						
				'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'picante' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_divider i',
							'selectClass' => ' ',
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'color_icon' => array(
							'type'     => 'color',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Color', 'picante' ),
							'default'     => '#222',
							'selector' => '.cl_divider .wrapper > i',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'size_icon' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon size', 'picante' ),
							'default'     => '10',
							'selector' => '.cl_divider .wrapper > i',
							'css_property'=> 'font-size',
							'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1'
								
							),
				            'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.cl_divider',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
					),
					
					
	
				),
	
			
		));


 		
		
		
		
		
 		/* Media */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Media', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-photo',
				'transport'   => 'postMessage',
				'settings'    => 'cl_media',
				'is_container' => false,
				'css_dependency' => array(CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css'),
				'marginPositions' => array('top'),
				'fields' => array(
						'media_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Media Type', 'picante' ),
							
							'default'     => 'image',
							'choices' => array(
								'image'	=> esc_html__('Image / Embed', 'picante'),
								'video' =>	'Video with Placeholder',
								'live' => esc_html__('Live Photo', 'picante')
							),
							'selector' => '.cl_media',
							'selectClass' => 'type-', 
							'reloadTemplate' => true 
						),

						'position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Position', 'picante' ),
							
							'default'     => 'stretch',
							'choices' => array(
								'left'	=> esc_html__('Left', 'picante'),
								'center' =>	'Center',
								'right' => esc_html__('Right', 'picante'),
								'stretch' => 'stretch' 
							),
							'selector' => '.cl_media',
							'selectClass' => 'position_'
						),

						'image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Upload Image', 'picante' ),
							'default'     => '',
							'priority'    => 10,
							'image_get' => 'id',
							'reloadTemplate' => true,
						),

						'video_mov' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mov', 'picante' ),
								'tooltip' => esc_attr__( 'Add this video if you want to use it for live photo', 'picante' ),
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'media_type',
										'operator' => '==',
										'value'    => 'live',
									),
								),
								'reloadTemplate' => true
							),

						'lightbox' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lightbox on hover', 'picante' ),
							'tooltip' => esc_attr__( 'Show lightbox icon on image hover', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),

							'reloadTemplate' => true,
						),

						'lazyload' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lazyload Image', 'picante' ),
							'tooltip' => esc_attr__( 'Image will be loaded only when it\'s on viewport', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),

							'reloadTemplate' => true,
						),

						'shadow' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Shadow', 'picante' ),
								'tooltip' => esc_html__('Switch on/off shadow', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),

								'selector' => '.cl_media',
								'addClass' => 'add-shadow'
							),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'picante' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">".esc_attr__('Image Sizes Section', 'picante')."</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						

						'custom_width_bool' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Custom Width?', 'picante' ),
								'tooltip' => esc_html__('Add a custom width for this media', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'selector' => '.cl_media',
								'addClass' => 'cl-custom-width'
							),

						'custom_width' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Set Custom Width', 'picante' ),
							
							'default'     => '400px',
						
							'selector' => '.cl_media .inner',
							'css_property' => 'width',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_width_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_link' => array(

							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Link', 'picante' ),
							'default'     => '#',
							'reloadTemplate' => true
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'dark' =>	'Dark',
								'light' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl_media',
							'selectClass' => 'hover_',
							'cl_required'    => array(
									array(
										'setting'  => 'custom_link',
										'operator' => '!=',
										'value'    => '#',
									),
								),
						),

						'video_start' => array(
							'type' => 'group_start',
							'label' => esc_html__('Video', 'picante'),
							'groupid' => 'video'
						),
						
						
							'video' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Background', 'picante' ),
								
								'default'     => 'none',
								'choices' => array(
									'none'	=> esc_html__('None', 'picante'),
									'self' =>	'Self-Hosted',
									'youtube' =>	'Youtube',
									'vimeo' => esc_html__('Vimeo', 'picante')
								),
								'reloadTemplate' => true
								//'customJS' => 'inlineEdit_videoSection'
							),
							
							'video_mp4' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mp4', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_webm' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Webm', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_ogv' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Ogv', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),

							
							
							'video_youtube' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Youtube ID', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'youtube',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_vimeo' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Vimeo ID', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'vimeo',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_loop' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Video Loop', 'picante' ),
								'tooltip' => esc_html__('Switch on/off video loop', 'picante'),
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '!=',
										'value'    => 'none',
									),
								),
								'reloadTemplate' => true
							),

							'autoplay' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Autoplay', 'picante' ),
								'tooltip' => esc_html__('Switch on when video is used with Image Placeholder', 'picante'),
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),

								'reloadTemplate' => true
							),

							'height' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Video / Embed Height', 'picante' ),
								'tooltip' => esc_attr__( 'Use this only for embed links and for video with image placeholder.', 'picante' ),
								'default'     => '400',
								'choices'     => array(
									'min'  => '0',
									'max'  => '1000',
									'step' => '10',
								),
								'suffix' => 'px',
								'selector' => '.cl_media iframe, .cl_media video',
								'css_property' => 'height',
								
								
							),

						'video_end' => array(
							'type' => 'group_end',
							'label' => esc_html__('Video', 'picante'),
							'groupid' => 'video'
						),


						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
							'selector' => '.cl_media'
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
							'selector' => '.cl_media',
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
							'selector' => '.cl_media',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_media',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
						),
				)
			));

 		/* Gallery */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Gallery', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-picture-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_gallery',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css' ),
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Carousel', 'picante' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_gallery',
							'addClass' => 'cl-carousel owl-carousel owl-theme',
							'reloadTemplate' => true
					),

					'carousel_view_items' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Items', 'picante' ),
							
							'default'     => '6',
							'choices' => array(
								'1' =>	'1 items',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'items',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'reloadTemplate' => true
					),

					'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'picante' ),
							'default'     => 1,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),

					'images' => array(
						'type'     => 'image_gallery',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Images', 'picante' ),
						
						'reloadTemplate' => true,
					),

					'items_per_row' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items per Row', 'picante' ),
							
							'default'     => 'all',
							'choices' => array(
								'all'	=> esc_html__('All', 'picante'),
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_gallery',
							'selectClass' => 'items_',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 0,
								),
							),
					),

					'distance' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Distance between items', 'picante'),
							'default' => '10',
							'selector' => '.cl_gallery .gallery-item',
							'css_property' => 'padding',
							'choices'     => array(
								'min'  => '0',
								'max'  => '60',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
						),


					'lightbox' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lightbox on hover', 'picante' ),
							'tooltip' => esc_attr__( 'Show lightbox icon on image hover', 'picante' ),
							'default'     => 1,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_gallery',
							'addClass' => 'with-lightbox',
							'reloadTemplate' => true,
							

						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'picante' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">".esc_attr__('Image Sizes Section', 'picante')."</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_gallery',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
					),
				)
			));

 		/* Service */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Service', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => esc_html__('Manage all options of the selected Row', 'picante'),
			
			'icon'		  => 'icon-arrows-circle-check',
			'transport'   => 'postMessage',
			'settings'    => 'cl_service',
			'marginPositions' => array('top'),

			'predefined'  => array(
				'simple_left_icon' => array(
					'photo' => get_template_directory_uri().'/img/predefined_elements/cl_service/simple_left_icon.png',
					'label' => esc_attr__( 'Simple Left Icon', 'picante' ),
					'content' => '[cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{\'margin-top\':\'55px\'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="0"]A technology that renders via GPU, power saver, dependency manager, faster load. Load only scripts that needed for page.[/cl_service]'
				),
				'simple_top_icon' => array(
					'photo' => get_template_directory_uri().'/img/predefined_elements/cl_service/simple_top_icon.png',
					'label' => esc_attr__( 'Simple Top Icon', 'picante' ),
					'content' => '[cl_service media="type_icon" layout_type="media_top" title="Experienced Support Team" icon="cl-icon-profile-male" css_style="{\'margin-top\':\'50px\'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="100"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service]'
				),
			),


			'is_container' => false,
			'shiftClick' => array( 
					array( 'option' => 'h5_font_size', 'selector' => '.box-content h3' ) 
			),
			'fields' => array(

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'options_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Layout', 'picante'),
						'groupid' => 'layout'
					),
						
						'media' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Media Type', 'picante' ),
							
							'default'     => 'type_text',
							'choices' => array(
								'type_text' => esc_html__('Only Text', 'picante'),
								'type_icon' => esc_html__('Icon', 'picante'),
								'type_svg' => esc_html__('SVG', 'picante'),
								'type_custom' => esc_html__('Custom IMG', 'picante')
							),
							'selector' => '.cl_service',
							'reloadTemplate' => true,
							'selectClass' => ''
						),

						'image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Upload Image', 'picante' ),
							'default'     => '',
							'priority'    => 10,
							'image_get' => 'id',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_custom',
								),
							),
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'picante' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">".esc_attr__('Image Sizes Section', 'picante')."</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
						),

						'animation_icon' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'SVG Animation', 'picante' ),
							'tooltip' => esc_html__('Switch to animate SVG on load', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_svg',
								),
							),
						),	
				
						'layout_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout Type', 'picante' ),
							'tooltip' => esc_attr__( 'Select layout type of service element', 'picante' ),
							'default'     => 'media_aside',
							'choices' => array(
								'media_aside' => esc_html__('Media Aside', 'picante'),
								'media_top' => esc_html__('Media Top', 'picante')
							),
							'selector' => '.cl_service',
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								),
							),
						),

						'layout_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Align Content and Icon', 'picante' ),
							'tooltip' => esc_attr__( 'Select the align of content and layout of service element', 'picante' ),
							'default'     => 'align_left',
							'choices' => array(
								'align_left' => esc_html__('Align Left', 'picante'),
								'align_center' => esc_html__('Align Center', 'picante'),
								'align_right' => esc_html__('Align Right', 'picante')
							),
							'selector' => '.cl_service',
							'selectClass' => ''
						),

						'title' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'only_text' => true,
							'selector' => '.cl_service .box-content > h3',
							'label'       => esc_attr__( 'Title', 'picante' ),
							'default'     => esc_html__('Custom Service Title', 'picante'),
							'replace_type_vc' => 'textfield',
							'holder' => 'h3'
						),

						'subtitle' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'only_text' => true,
							'selector' => '.cl_service .box-content > .subtitle',
							'label'       => esc_attr__( 'Subtitle', 'picante' ),
							'default'     => esc_html__('Custom Subtitle for service', 'picante'),
							'replace_type_vc' => 'textfield'
						),

						'content' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'selector' => '.cl_service .box-content > .content',
							'label'       => esc_attr__( 'Content', 'picante' ),
							'default'     => esc_html__('On the other hand, we denounce with righteous indignation and dislike men who are so beguiled', 'picante'),
							'holder' => 'div'
						),

						'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'picante' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_service > .icon_wrapper i',
							'selectClass' => ' ',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),

						'wrapper' => array(
							
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Wrapper', 'picante' ),
							'tooltip' => esc_attr__( 'Select the type of wrapper around Icon if you want one', 'picante' ),
							'default'     => 'wrapper_none',
							'choices' => array(
								'wrapper_none' => esc_html__('None', 'picante'),
								'wrapper_circle' => esc_html__('Circle', 'picante'),
								'wrapper_square' => esc_html__('Square', 'picante'),
								//'wrapper_hexagon' => esc_html__('Hexagon', 'picante')
							),
							'selector' => '.cl_service > .icon_wrapper',
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								),
							),
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'wrapper_accent_color' => esc_html__('Wrapper Accent Color', 'picante')
							),
							'selector' => '.cl_service',
							'selectClass' => 'cl-hover-'
						),

						'service_link' => array(
							'type'     => 'text',
							'priority' => 10,
							'selector' => '',
							'label'       => esc_attr__( 'Service Link', 'picante' ),
							'default'     => ''
						),

					'options_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Layout', 'picante'),
						'groupid' => 'layout'
					),

					
					'extra_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Extra', 'picante'),
						'groupid' => 'extra'
					),

						'subtitle_bool' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add subtitle', 'picante' ),
							'tooltip' => esc_html__('Switch On if you want a custom subtitle after Primary Title', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'reloadTemplate' => true
						),

						


					'extra_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Extra', 'picante'),
						'groupid' => 'extra'
					),

				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
				'design_tab_begin' => array(
					'type' => 'tab_start',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),

					'panel' => array(
						'type' => 'group_start',
						'label' => esc_html__('Box', 'picante'),
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_service',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
						),

						'box_border_color' => array(
							'type' => 'color',
							'label' => esc_html__('Box Border Color', 'picante'),
							'default' => 'rgba(0,0,0,0.0)',
							'selector' => '.cl_service',
							'css_property' => 'border-color',
							'alpha' => true,
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Text Color', 'picante'),
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => esc_html__('Dark', 'picante'),
								'light-text' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl_service',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Animation', 'picante'),
						'groupid' => 'design_panel'
					),

					'icon_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Style and Distances', 'picante'),
						'groupid' => 'icon'
					),

						'icon_font_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Icon Size', 'picante' ),
							'tooltip' => esc_attr__( 'Change Icon size by moving the slider', 'picante' ),
							'default'     => '36',
							'choices'     => array(
								'min'  => '14',
								'max'  => '120',
								'step' => '1',
							),
							'suffix' => 'px', 
							'selector' => '.cl_service > .icon_wrapper i',
							'css_property' => 'font-size',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),

						'icon_color' => array(
							'type' => 'color',
							'label' => esc_html__('Icon Color', 'picante'),
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_service > .icon_wrapper i',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),
						'svg_color' => array(
							'type' => 'color',
							'label' => esc_html__('SVG Color', 'picante'),
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_service > .icon_wrapper svg',
							'css_property' => 'stroke',
							'alpha' => false,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_svg',
								),
							),
						),

						'wrapper_bg_color' => array(
							'type' => 'color',
							'label' => esc_html__('Wrapper BG Color', 'picante'),
							'default' => 'rgba(0,0,0,0)',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'wrapper',
									'operator' => '!=',
									'value'    => 'wrapper_none',
								),
							),
						),

						'wrapper_border_color' => array(
							'type' => 'color',
							'label' => esc_html__('Wrapper Border Color', 'picante'),
							'default' => 'rgba(0,0,0,0.5)',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => 'border-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'wrapper',
									'operator' => '!=',
									'value'    => 'wrapper_none',
								),
							),
						),

						'wrapper_box_shadow' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add Shadow', 'picante' ),
							'tooltip' => esc_html__('Switch On to add shadow to icon wrapper', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_service > .icon_wrapper',
							'addClass' => 'with-shadow'
						),


						'wrapper_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Wrapper and SVG Size', 'picante' ),
							'tooltip' => esc_attr__( 'Change Wrapper size by moving the slider. Can be used for SVG size too.', 'picante' ),
							'default'     => '72',
							'choices'     => array(
								'min'  => '30',
								'max'  => '240',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => array('width', 'height'),
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								)
							),
						),

						'wrapper_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon and Wrapper Distance', 'picante' ),
							'tooltip' => esc_attr__( 'Icon and Wrapper distance from content', 'picante' ),
							'default'     => '20',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service > .icon_wrapper',
							'css_property' => array('padding-right', 'padding-bottom', 'padding-left'),
						),

						'title_distance_top' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance Title From Top', 'picante' ),
							'tooltip' => esc_attr__( 'Drag to change the distance of the title from top of element', 'picante' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > h3',
							'css_property' => 'margin-top',

						),

						'title_content_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance beetween Title and Content', 'picante' ),
							'tooltip' => esc_attr__( 'Drag to change the distance of the content from Title', 'picante' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > .content',
							'css_property' => 'margin-top',
							
						),
						'title_subtitle_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance beetween Title and Subtitle', 'picante' ),
							'tooltip' => esc_attr__( 'Drag to change the distance of the title from subtitle', 'picante' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > .subtitle',
							'css_property' => 'margin-top',
							'cl_required'    => array(
								array(
									'setting'  => 'subtitle_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							
						),


					'icon_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Icon', 'picante'),
						'groupid' => 'icon'
					),



					'typography_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography',
					),

						'title_typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Typography', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style', 'picante'),
							'default'     => 'h5',
							'priority'    => 10,
							'selector' => '.cl_service .box-content > h3',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'picante' ),
								'h2' => esc_attr__( 'H2', 'picante' ),
								'h3' => esc_attr__( 'H3', 'picante' ),
								'h4' => esc_attr__( 'H4', 'picante' ),
								'h5' => esc_attr__( 'H5', 'picante' ),
								'h6' => esc_attr__( 'H6', 'picante' ),
								'custom_font' => esc_attr__( 'Custom Font', 'picante' ),
							),
						),	


						'title_font_size' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Title Font Size', 'picante'),
								'default' => '16',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'title_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => esc_html__('Title Font Weight', 'picante'),
								'default' => '600',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
							
						'title_line_height' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Title Line Height', 'picante'),
								'default' => '22',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'title_letterspace' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Title Letter-space', 'picante'),
								'default' => '1',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
						
						'title_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Title Text Transform', 'picante' ),
								
								'default'     => 'uppercase',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => esc_html__('None', 'picante'),
									'uppercase' => esc_html__('Uppercase', 'picante')
								),
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
								
							),

						'title_color' => array(
								'type' => 'color',
								'label' => esc_html__('Title Color', 'picante'),
								'default' => '#444444',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
						),
							
						
						
						'custom_desc_typography' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Content Typography', 'picante' ),
							'tooltip' => esc_html__('Switch On if you want to modify default typography of content', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
						),	
						
						
						
						'desc_font_size' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Content Font Size', 'picante'),
								'default' => '14',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '60',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),

						'desc_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => esc_html__('Content Font Weight', 'picante'),
								'default' => '400',
								'selector' => '.cl_service .box-content > .content',
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
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),
							
						'desc_line_height' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Content Line Height', 'picante'),
								'default' => '22',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'line-height',
								'choices'     => array(
									'min'  => '20',
									'max'  => '80',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),
							
						'desc_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Content Text Transform', 'picante' ),
								
								'default'     => 'none',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => esc_html__('None', 'picante'),
									'uppercase' => esc_html__('Uppercase', 'picante')
								),
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
								
							),
						'desc_color' => array(
								'type' => 'color',
								'label' => esc_html__('Content Color', 'picante'),
								'default' => '#6a6a6a',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
						),


						'subtitle_typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Subtitle Typography', 'picante' ),
							'tooltip' => esc_html__('Select typography style of Subtitle', 'picante'),
							'default'     => 'default',
							'priority'    => 10,
							'selector' => '.cl_service .box-content > .subtitle',
							'selectClass' => '',
							'choices'     => array(
								'default'  => esc_attr__( 'Default', 'picante' ),
								'custom_font' => esc_attr__( 'Custom Font', 'picante' ),
							),
							'cl_required'    => array(
									array(
										'setting'  => 'subtitle_bool',
										'operator' => '==',
										'value'    => true,
									),
							),
						),	


						'subtitle_font_size' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Subtitle Font Size', 'picante'),
								'default' => '14',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'subtitle_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => esc_html__('Subtitle Font Weight', 'picante'),
								'default' => '400',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
							
						'subtitle_line_height' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Subtitle Line Height', 'picante'),
								'default' => '18',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'subtitle_letterspace' => array(
		
								'type' => 'slider',
								'label' => esc_html__('Subtitle Letter-space', 'picante'),
								'default' => '0',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
						
						'subtitle_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Subtitle Text Transform', 'picante' ),
								
								'default'     => 'none',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => esc_html__('None', 'picante'),
									'uppercase' => esc_html__('Uppercase', 'picante')
								),
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
								
							),

						'subtitle_color' => array(
								'type' => 'color',
								'label' => esc_html__('Subtitle Color', 'picante'),
								'default' => '#a7a7a7',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
						),




					'typography_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Typography', 'picante'),
						'groupid' => 'typography',
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
								'top-t-bottom' =>	'Top-Bottom',
								'bottom-t-top' =>	'Bottom-Top',
								'right-t-left' => esc_html__('Right-Left', 'picante'),
								'left-t-right' => esc_html__('Left-Right', 'picante'),
								'alpha-anim' => esc_html__('Fade-In', 'picante'),	
								'zoom-in' => esc_html__('Zoom-In', 'picante'),	
								'zoom-out' => esc_html__('Zoom-Out', 'picante'),
								'zoom-reverse' => esc_html__('Zoom-Reverse', 'picante'),
							),
							'selector' => '.cl_service'
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
							'selector' => '.cl_service',
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
							'selector' => '.cl_service',
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


				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => esc_html__('Design', 'picante'),
					'tabid' => 'design'
				),
			)
		));

 		

		/* Portfolio */



 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Portfolio', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => esc_html__('Create Portfolio Element', 'picante'),
			
			'icon'		  => 'icon-arrows-squares',
			'transport'   => 'postMessage',
			'settings'    => 'cl_portfolio',
			'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-portfolio.css', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css', CODELESS_BASE_URL.'css/owl.carousel.min.css', CODELESS_BASE_URL.'css/codeless-image-filters.css'),
			'marginPositions' => array('top'),
			'is_container' => false,
			'fields' => array(

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'overlay' => array( 'Overlay', 'cl-icon-tune' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => esc_html__('General', 'picante'),
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'options_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Layout', 'picante'),
						'groupid' => 'layout'
					),

						


						'layout' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout', 'picante' ),
							'default'     => 'grid',
							'choices' => array(
								'grid' => esc_html__('Grid', 'picante'),
								'masonry' => esc_html__('Masonry', 'picante'),
								'inline' => esc_html__('Inline', 'picante')
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'portfolio-layout-',
							'reloadTemplate' => true,
							
						),

						'masonry_extra_layout' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Masonry Extra Layout', 'picante' ),
							'tooltip' => esc_attr__( 'If you leave default, all portfolio layouts in masonry will get the masonry layout from post meta(you can find in each portfolio post).', 'picante' ),
							'default'     => 'default',
							'choices' => array(
								'default' => esc_html__('Default', 'picante'),
								'all_long' => esc_html__('Only Long Layout', 'picante'),
								
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
									array(
										'setting'  => 'layout',
										'operator' => '==',
										'value'    => 'masonry',
									),
								),
							
						),

						'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'default'     => 'only_media',
							'choices' => array(
								'classic' => esc_html__('Classic', 'picante'),
								'classic_excerpt' => esc_html__('Classic & Excerpt', 'picante'),
								'only_media' => esc_html__('Only Media', 'picante'),
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'portfolio-style-',
							'reloadTemplate' => true
							
						),

						'only_media_tags' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Show Categories', 'picante' ),
							'default'     => 1,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off'  => esc_attr__( 'Off', 'picante' )
							),
							'reloadTemplate' => true,
							'addClass' => 'show-tags',
							'selector' => '#portfolio-entries',
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'only_media',
								),
							),
							
						),

						'only_media_price' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Show Price', 'picante' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off'  => esc_attr__( 'Off', 'picante' )
							),
							'reloadTemplate' => true,
							'addClass' => 'show-price',
							'selector' => '#portfolio-entries',
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'only_media',
								),
							),
							
						),

						

						'columns' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns', 'picante' ),
							'default'     => '3',
							'choices'     => array(
							  '1'  => esc_attr__( '1 Column', 'picante' ),
						      '2'  => esc_attr__( '2 Columns', 'picante' ),
						      '3' => esc_attr__( '3 Columns', 'picante' ),
						      '4' => esc_attr__( '4 Columns', 'picante' ),
						      '5' => esc_attr__( '5 Columns', 'picante' ),
						   ),
							'selector' => '#portfolio-entries', 
							'htmldata' => 'grid-cols',
							'customJS' => array('front' => 'init_cl_portfolio'),
							'reloadTemplate' => true
							
						),

						'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns (Items) Gap', 'picante' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries .portfolio_item',
							'css_property' => 'padding',
							'customJS' => array('front' => 'init_cl_portfolio')
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'picante' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">".esc_attr__('Image Sizes Section', 'picante')."</a>",
								'default'     => 'portfolio_entry',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						'portfolio_justify' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Gallery', 'picante' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off'  => esc_attr__( 'Off', 'picante' )
							),
							'reloadTemplate' => true,
							'addClass' => 'cl-justify-gallery',
							'selector' => '#portfolio-entries',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),
							
						),

						'portfolio_justify_rowheight' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Row Height', 'picante' ),
							'default'     => '200',
							'choices'     => array(
								'min'  => '120',
								'max'  => '1100',
								'step' => '5',
							),
							'suffix' => '',
							'selector' => '#portfolio-entries',
							'htmldata' => 'rowheight',
							'customJS' => array('front' => 'init_cl_portfolio'),
							array(
									'setting'  => 'portfolio_justify',
									'operator' => '==',
									'value'    => true,
							),
						),

						'portfolio_justify_margins' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Item Margins', 'picante' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries',
							'htmldata' => 'margins',
							'customJS' => array('front' => 'init_cl_portfolio'),
							array(
									'setting'  => 'portfolio_justify',
									'operator' => '==',
									'value'    => true,
							),
						),

						'last_item_button' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Last Item Button', 'picante' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off'  => esc_attr__( 'Off', 'picante' )
							),
							'reloadTemplate' => true,
							
						),

						'last_item_button_text' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Last Item Button Text', 'picante' ),
							'default'  => esc_attr__( 'VIEW GALLERY', 'picante' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'last_item_button',
									'operator' => '==',
									'value'    => true,
								),
							),
						),

						'last_item_button_link' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Last Item Button Link', 'picante' ),
							'default'  => '#',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'last_item_button',
									'operator' => '==',
									'value'    => true,
								),
							),
						),


					'options_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Layout', 'picante'),
						'groupid' => 'layout'
					),


					'carousel_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Carousel', 'picante'),
						'groupid' => 'carousel'
					),
						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '#portfolio-entries',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio')
						),	


						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '#portfolio-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '#portfolio-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Carousel', 'picante'),
						'groupid' => 'carousel'
					),

					'extra_style' => array(
						'type' => 'group_start',
						'label' => esc_html__('Extra Style', 'picante'),
						'groupid' => 'extra'
					),

						'portfolio_item_title_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Style', 'picante' ),
							'tooltip' => '',
							'default'     => 'h4',
							'priority'    => 10,
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'picante' ),
								'h2' => esc_attr__( 'H2', 'picante' ),
								'h3' => esc_attr__( 'H3', 'picante' ),
								'h4' => esc_attr__( 'H4', 'picante' ),
								'h5' => esc_attr__( 'H5', 'picante' ),
								'h6' => esc_attr__( 'H6', 'picante' ),
							),
							
							'reloadTemplate' => true
						),


						'portfolio_item_title_font_family' => array(
			
									'type' => 'inline_select',
									'label' => esc_html__('Font Family', 'picante'),
									'default' => 'theme_default',
									'selector' => '#portfolio-entries h4, #portfolio-entries .subtitle',
									'css_property' => 'font-family',
									'choices' => codeless_get_google_fonts(),
									
									
						),

						'portfolio_pagination_style' => array( 
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Pagination', 'picante' ),
							'default'     => 'numbers',
							'choices'     => array(
								'none'  => esc_attr__( 'None', 'picante' ),
								'numbers'  => esc_attr__( 'Page Numbers', 'picante' ),
								'next_prev'  => esc_attr__( 'Next/Prev', 'picante' ),
								'load_more'  => esc_attr__( 'Load More', 'picante' ),
								'infinite_scroll'  => esc_attr__( 'Infinite', 'picante' ),
								
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),

						),

						'portfolio_filters' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filters', 'picante' ),
							'default'     => 'disabled',
							'choices'     => array(
								'disabled'  => esc_attr__( 'Disabled', 'picante' ),
								'small'  => esc_attr__( 'Small Square', 'picante' ),
								'fullwidth'  => esc_attr__( 'Fullwidth', 'picante' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),
							
						),

						'portfolio_filters_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filter Align', 'picante' ),
							'default'     => 'center',
							'choices'     => array(
								'left'  => esc_attr__( 'Left', 'picante' ),
								'center'  => esc_attr__( 'Center', 'picante' ),
								'right'  => esc_attr__( 'Right', 'picante' ),
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '!=',
									'value'    => 'disabled',
								),
							),
							
						),

						'portfolio_filters_color' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filter Color Type', 'picante' ),
							'default'     => 'dark',
							'choices'     => array(
								'dark'  => esc_attr__( 'Dark', 'picante' ),
								'light'  => esc_attr__( 'Light', 'picante' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),



						'filter_fullwidth_shadow' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Fullwidth Filter with Shadow', 'picante' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off'  => esc_attr__( 'Off', 'picante' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),

						'filter_fullwidth_sticky' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Fullwidth Filter Sticky', 'picante' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off'  => esc_attr__( 'Off', 'picante' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),



						'image_filter' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Images Filter', 'picante' ),
							'tooltip' => esc_attr__( 'Applied on portfolio images', 'picante' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'normal',
								'darken' => 'darken',
								'_1977' => '1977',
								'aden' => 'aden',
								'brannan' => 'brannan',
								'brooklyn' => 'brooklyn',
								'clarendon' => 'clarendon',
								'earlybird' => 'earlybird',
								'gingham' => 'gingham',
								'hudson' => 'hudson',
								'inkwell' => 'inkwell',
								'kelvin' => 'kelvin',
								'lark' => 'lark',
								'lofi' => 'lo-Fi',
								'maven' => 'maven',
								'mayfair' => 'mayfair',
								'moon' => 'moon',
								'nashville' => 'nashville',
								'perpetua' => 'perpetua',
								'reyes' => 'reyes',
								'rise' => 'rise',
								'slumber' => 'slumber',
								'stinson' => 'stinson',
								'toaster' => 'toaster',
								'valencia' => 'valencia',
								'walden' => 'walden',
								'willow' => 'willow',
								'xpro2' => 'x-pro II'
							),
							'reloadTemplate' => true
						),

						

						'boxed' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Boxed Style', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want to add a boxed shadow. Works only on Classic and Classic with Excerpt', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '#portfolio-entries',
							'addClass' => 'portfolio_boxed',
						),	

						'portfolio_animation' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Animation', 'picante' ),
							'default'     => 'bottom-t-top',
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

							'reloadTemplate' => true,
						),




					'extra_style_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Extra Style', 'picante'),
						'groupid' => 'extra'
					),


					'query_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'picante' ),
							'default'     => '',
							'choices' => codeless_get_terms( 'portfolio_entries' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'picante' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show in one portfolio page', 'picante' ),
							'default'  => 12,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							'default'     => 'date',

							'choices'     => array(
								'none' => esc_html__('No order', 'picante'),
								'ID' => esc_html__('Post ID', 'picante'),
								'author' => esc_html__('Author', 'picante'),
								'title' => esc_html__('Title', 'picante'),
								'name' => esc_html__('Name (slug)', 'picante'),
								'date' => esc_html__('Date', 'picante'),
								'modified' => esc_html__('Modified', 'picante'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order', 'picante' ),
							'default'     => esc_html__('DESC', 'picante'),

							'choices'     => array(
								'DESC' => esc_html__('Descending', 'picante'),
								'ASC' => esc_html__('Ascending', 'picante'),				
							),
							'reloadTemplate' => true
						),

						'portfolio_custom_link_target' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Link Target', 'picante' ),
							'default'     => '_self',

							'choices'     => array(
								'_self' => esc_html__('_self', 'picante'),
								'_blank' => esc_html__('_blank', 'picante'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),

				'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('General', 'picante'),
						'tabid' => 'general'
				),	

				'overlay_start' => array(
						'type' => 'tab_start',
						'label' => esc_html__('Overlay', 'picante'),
						'tabid' => 'overlay'
				),

					'overlay_layout' => array(
						'type' => 'group_start',
						'label' => esc_html__('Overlay Layout', 'picante'),
						'groupid' => 'overlay_layout'
					),
						

						'portfolio_overlay_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance', 'picante' ),
							'tooltip' => esc_attr__( 'Distance between portfolio overlay and photo corners', 'picante' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '5',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries .entry-overlay',
							'css_property' => 'padding'
						),

					'overlay_layout_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Overlay Layout', 'picante'),
						'groupid' => 'overlay_layout'
					),


					'overlay_design' => array(
						'type' => 'group_start',
						'label' => esc_html__('Overlay Design', 'picante'),
						'groupid' => 'overlay_design'
					),

						'portfolio_overlay_color' => array(

							'type' => 'color',
							'label' => esc_html__('BG Color', 'picante'),
							'default' => 'rgba(31, 180, 204, 0.86)',
							'selector' => '#portfolio-entries .portfolio_item .entry-overlay .overlay-wrapper',
							'css_property' => 'background-color',
							'alpha' => true
							
						),

						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Bg Color', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'azure_pop' =>	'Azure Pop',
								'love_couple' => esc_html__('Love Couple', 'picante'),
								'disco' => esc_html__('Disco', 'picante'),
								'limeade' => esc_html__('Limeade', 'picante'),
								'dania' => esc_html__('Dania', 'picante'),
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => esc_html__('Sun Horizon', 'picante'),
								'blood_red' => esc_html__('Blood Red', 'picante'),
								'sherbert' => esc_html__('Sherbert', 'picante'),
								'firewatch' => esc_html__('Firewatch', 'picante'),
								'frost' => esc_html__('Frost', 'picante'),
								'mauve' => esc_html__('Mauve', 'picante'),
								'deep_sea' => esc_html__('Deep Sea', 'picante'),
								'solid_vault' => esc_html__('Solid Vault', 'picante'),
								'deep_space' =>	'Deep Space',
								'suzy' => esc_html__('Suzy', 'picante')
								
								
							),
							'selector' => '#portfolio-entries .portfolio_item .entry-overlay .overlay-wrapper',
							'selectClass' => 'cl-gradient-',
						
						),

						'portfolio_overlay_content_color' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Color', 'picante' ),
							'default'     => 'light-text',

							'choices'     => array(
								'light-text'  => esc_attr__( 'Light', 'picante' ),
								'dark-text'  => esc_attr__( 'Dark', 'picante' )
							),

							'reloadTemplate' => true,
							'selector' => '#portfolio-entries .entry-overlay',
							'selectClass' => ''
						),
						

						'portfolio_overlay_content_animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Animation', 'picante' ),
							'default'     => 'alpha-anim',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'top-t-bottom' =>	'Top-Bottom',
								'bottom-t-top' =>	'Bottom-Top',
								'left-t-right' => esc_html__('Left-Right', 'picante'),
								'alpha-anim' => esc_html__('Fade-In', 'picante'),	
							
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'overlay-anim_'
						),

					'overlay_design_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Overlay Design', 'picante'),
						'groupid' => 'overlay_design'
					),

				'overlay_end' => array(
						'type' => 'tab_end',
						'label' => esc_html__('Overlay', 'picante'),
						'tabid' => 'overlay'
				),


				

			)
 		));
		
			/*cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Portfolio Nav', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				'tooltip' => '',
				
				'icon'		  => 'icon-basic-webpage-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_portfolio_nav',
				'marginPositions' => array('top'),
				'is_container' => false,
				'show_only_on' => 'portfolio',
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'default'     => 'simple',
							'choices' => array(
								'simple'	=> esc_html__('Simple', 'picante'),
								'modern' =>	'Modern & Images',
							),
							'reloadTemplate' => true,
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.portfolio-navigation',
							'css_property' => '',
							'default' => array('margin-top' => '80px'),
					),
				)
			));*/
		


 		/* Codeless Slider */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Codeless Slider', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => esc_html__('Codeless Slider', 'picante'),
			
			'icon'		  => 'icon-basic-webpage-multiple',
			'transport'   => 'postMessage',
			'settings'    => 'cl_slider',
			'is_root'	  => true,
			'marginPositions' => array('top'),
			'is_container' => true,
			'fields' => array(

				

				'slider_height' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider Height', 'picante' ),
							'tooltip' => esc_attr__( 'This is used as slider height. All slides inherit this value', 'picante' ),
							'default'     => '400',
							'choices'     => array(
								'min'  => '200',
								'max'  => '2000',
								'step' => '5',
							),
							'suffix' => 'px', 
							'selector' => '.cl_slider',
							'css_property' => 'height'
				),



				'centered_carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Use as centered carousel', 'picante' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-centered_carousel',
							'customJS' => array('front' => 'codelessSlider')
				),

				'max_width_slide' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Max Width for slide', 'picante' ),
							'tooltip' => esc_attr__( 'Set a max width for slide, useful to create a carousel style', 'picante' ),
							'default'     => '',
							'choices'     => array(
								'min'  => '400',
								'max'  => '1800',
								'step' => '10',
							),
							'suffix' => 'px', 
							'selector' => '.cl_slider .swiper-slide',
							'css_property' => 'max-width',
							'cl_reuired'    => array(
								array(
									'setting'  => 'centered_carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'customJS' => array('front' => 'codelessSlider')
				),

				'fullheight_slider' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Slider', 'picante' ),
							'tooltip' => esc_html__('Stretch Slider in a fullscreen style.', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-fullheight',
							'customJS' => array('front' => 'codeless_builder_fullHeightSlider'),
				),

				

				'fullheight_responsive' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Force Fullheight on responsive', 'picante' ),
							'tooltip' => esc_html__('Active to force fullheight slider on responsive devices', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-force-fullheight',
							'customJS' => array('front' => 'codeless_builder_fullHeightSlider'),
				),

				'navigation' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Prev / Next Buttons', 'picante' ),
							'tooltip' => esc_html__('Switch on/off navigation buttons', 'picante'),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'navigation',
						),

				'navigation_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Navigation Style', 'picante' ),
							'tooltip' => esc_html__('Switch on/off navigation buttons', 'picante'),
							'default'     => 'lateral',
							'priority'    => 10,
							'choices'     => array(
								'lateral' => esc_html__('Lateral', 'picante'),
								'rounded_left_bottom' => esc_html__('Rounded Left Bottom', 'picante'),
								'modern' => esc_html__('Modern', 'picante')
							),
							'selector' => '.cl_slider',
							'htmldata' => 'navigation-style',
						),

				'pagination' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Pagination Buttons', 'picante' ),
							'tooltip' => esc_html__('Switch on/off pagination buttons', 'picante'),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'pagination',
						),

				'pagination_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Pagination Style', 'picante' ),
							'tooltip' => esc_html__('Switch on/off pagination buttons', 'picante'),
							'default'     => 'round',
							'priority'    => 10,
							'choices'     => array(
								'round' => esc_html__('Rounded', 'picante'),
								'lines' => esc_html__('Lines', 'picante')
							),
							'selector' => '.cl_slider',
							'htmldata' => 'pagination-style',
						),
				'effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Effect', 'picante' ),
							'tooltip' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'picante' ),
							'default'     => 'fade',
							'choices' => array(
								'fade' => esc_html__('Fade', 'picante'),
								'slide' => esc_html__('Slide', 'picante'),
								'cube' => esc_html__('Cube', 'picante'),
								'coverflow' => esc_html__('Coverflow', 'picante'),
								'flip' => esc_html__('Flip', 'picante'),
								'interleave' => esc_html__('Interleave', 'picante'),
								'softscale' => esc_html__('SoftScale', 'picante')
							),
							'selector' => '.cl_slider',
							'htmldata' => 'effect',
							'customJS' => array('front' => 'codelessSlider')
						),
				'direction' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Direction', 'picante' ),
							'tooltip' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'picante' ),
							'default'     => 'horizontal',
							'choices' => array(
								'horizontal' => esc_html__('Horizontal', 'picante'),
								'vertical' => esc_html__('Vertical', 'picante'),
								
							),
							'selector' => '.cl_slider',
							'htmldata' => 'direction'
						),
				'responsive_plain_slider' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Slider as Plain in responsive', 'picante' ),
							'tooltip' => esc_html__('By switch this on slider will show as plain sections not as slider in responsive devices. Works only with Vetical Slider', 'picante'),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'qcl_reuired'    => array(
								array(
									'setting'  => 'direction',
									'operator' => '==',
									'value'    => 'vertical',
								),
							),
							'addClass' => 'cl_slider-responsive-plain',
				),
				'speed' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Transition Speed', 'picante' ),
							'tooltip' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'picante' ),
							'default'     => '300',
							'selector' => '.cl_slider',
							'htmldata' => 'speed'
						),
				'autoplay' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Autoplay, delay between slides in ms', 'picante' ),
							'tooltip' => esc_attr__( 'Leave 0 if you dont want an autoplay slider', 'picante' ),
							'default'     => '6500',
							'selector' => '.cl_slider',
							'htmldata' => 'autoplay'
						),
				'loop' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Loop', 'picante' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'loop',
						),

				'anchor_labels' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Anchor Labels', 'picante' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'anchors',
						),
				'mousewheel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Mousewheel', 'picante' ),
							'tooltip' => esc_html__('Useful in vertical sliders', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'mousewheel',
						),

				'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_slider',
							'css_property' => '',
							'default' => array('margin-top' => '0px' )
					),

				
			)
		));

			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Codeless Slide', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				'tooltip' => esc_html__('Add new slide for codeless slider', 'picante'),
				
				'icon'		  => 'icon-basic-elaboration-browser-star',
				'transport'   => 'postMessage',
				'settings'    => 'cl_slide',
				'hide_from_list' => true,
				'is_container' => true,
				'fields' => array(
					'animation_slide' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'cinemagraphs_first' => esc_html__('Cinemagraphs 1', 'picante'),
								'cinemagraphs_two' => esc_html__('Cinemagraphs 2', 'picante')
								
							),
							'selector' => '.cl-slide',
							'selectClass' => 'cl-slide-animation animation--'
					),

					'add_scroll_svg' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Scroll SVG Bottom', 'picante' ),
							'tooltip' => esc_html__( 'By activate this a new SVG Mouse Scroll indication will show on this slide.', 'picante' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							)
							
					),
				)
			));


			/*cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Multiscroll Slider', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				'tooltip' => esc_html__('Multiscroll Slider', 'picante'),
				
				'icon'		  => 'icon-basic-elaboration-browser-star',
				'transport'   => 'postMessage',
				'settings'    => 'cl_multiscroll',
				'is_container' => false,
				'fields' => array(
					'slider' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider', 'picante' ),
							'default'     => '',
							'choices' => codeless_get_terms( 'multiscroll_slider', false, 'term_id' ),
							'reloadTemplate' => true,
					),

					'text_font_family' => array(
			
						'type' => 'inline_select',
						'label' => esc_html__('Font Family', 'picante'),
						'default' => 'theme_default',
						'selector' => '.multiscroll',
						'css_property' => 'font-family',
						'choices_from' => 'codelessGoogleFonts',
						'choices' => array(),
								
					),

					'height' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider Height', 'picante' ),
							'tooltip' => esc_attr__( 'This is used as slider height. All slides inherit this value', 'picante' ),
							'default'     => '900',
							'choices'     => array(
								'min'  => '200',
								'max'  => '2000',
								'step' => '5',
							),
							'suffix' => 'px', 
							'selector' => '.multiscroll',
							'css_property' => 'height'
					),
				)
			));*/



			

			/* Testimonial */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Testimonial', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-message-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_testimonial',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css'),
				'marginPositions' => array('top'),
				'fields' => array(
					'main_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Main', 'picante'),
						'groupid' => 'main'
					),	
						'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'tooltip' => esc_attr__( 'In all styles with Photo use the featured Image Field to add an image.', 'picante' ),
							'default' => 'left_aligned_photo',
							'choices' => array(
								'simple' => esc_html__('Simple', 'picante'),
								'simple_photo_circle' => esc_html__('Simple With Circle Photo', 'picante'),
								'boxed_small' => esc_html__('Boxed Small', 'picante'),
								'left_aligned_photo' => esc_html__('Left Aligned Photo', 'picante')
							),
							'selector' => '.testimonial-entries',
							'selectClass' => 'style-',
							'reloadTemplate' => true
						),

						'is_single' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Single Testimonial', 'picante' ),
							'tooltip' => esc_html__('Switch On to show only one Testimonial.', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_testimonial',
							'addClass' => 'is_single',
							'reloadTemplate' => true
						),

						'testimonial_id' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Single Item', 'picante' ),
							
							'default'     => '',
							'choices' => codeless_get_items_by_term( 'testimonial' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 1,
								),
							)
						),

					'main_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Main', 'picante'),
						'groupid' => 'main'
					),	

					'carousel_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Carousel', 'picante'),
						'groupid' => 'carousel'
					),	
						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.testimonial-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.testimonial-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,

						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Carousel', 'picante'),
						'groupid' => 'carousel'
					),

					'query_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'picante' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'testimonial_entries' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'picante' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show', 'picante' ),
							'default'  => 12,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							
							'default'     => 'date',
							'multiple' => false,
							'choices'     => array(
								'none' => esc_html__('No order', 'picante'),
								'ID' => esc_html__('Post ID', 'picante'),
								'author' => esc_html__('Author', 'picante'),
								'title' => esc_html__('Title', 'picante'),
								'name' => esc_html__('Name (slug)', 'picante'),
								'date' => esc_html__('Date', 'picante'),
								'modified' => esc_html__('Modified', 'picante'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							
							'default'     => esc_html__('DESC', 'picante'),
							'multiple' => false,
							'choices'     => array(
								'DESC' => esc_html__('Descending', 'picante'),
								'ASC' => esc_html__('Ascending', 'picante'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.testimonial-entries',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),

				)

			));
			
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Filters Bar', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-archive-full',
				'transport'   => 'postMessage',
				'settings'    => 'cl_filters_bar',
				'is_container' => false,
				'fields' => array(

				)
			));

			/* Blog */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Blog', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-archive-full',
				'transport'   => 'postMessage',
				'settings'    => 'cl_blog',
				'is_container' => false,
				'marginPositions' => array('top'),
				'css_dependency' => array( CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css', CODELESS_BASE_URL.'css/owl.carousel.min.css', CODELESS_BASE_URL.'css/codeless-image-filters.css'),
				'fields' => array(
					'general_group_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'general'
					),	

						'blog_style' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Blog Style', 'picante' ),
							'tooltip' => esc_html__( 'Select one of the blog styles that you want to use as a default template', 'picante' ),
							'default'     => 'grid',
							'choices'     => array(
								'default'  => esc_attr__( 'Default', 'picante' ),
								'grid'  => esc_attr__( 'Grid', 'picante' ),
								'fullimage'  => esc_attr__( 'Full Image with White Overlay', 'picante' ),
								'fullimage_transparent'  => esc_attr__( 'Full Image Transparent', 'picante' ),
								'masonry' => esc_attr__( 'Masonry', 'picante' ),
								'news' => esc_attr__( 'News', 'picante' ),
								'minimal' => esc_attr__( 'Minimal', 'picante' ),
								'media' => esc_attr__( 'Only Media', 'picante' )
							),

							'reloadTemplate' => true,
						),


						'blog_grid_minimal' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Grid Minimal Style', 'picante' ),
							'tooltip'       => esc_attr__( 'Remove Images and make more minimal style', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'grid-minimal-style',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'grid',
								),
							),

						),


						'blog_news' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'News Grid Layout', 'picante' ),
							'tooltip' => esc_html__( 'Select one of the blog news grid layouts.', 'picante' ),
							'default'     => 'grid_1',
							'choices' => array(
								'grid_1' => esc_html__('Layout 1', 'picante'),
								'grid_2' => esc_html__('Layout 2', 'picante'),
								'grid_3' => esc_html__('Layout 3', 'picante'),
							),
							'selector' => '.cl_blog > .blog-entries',
							'selectClass' => 'news-layout-',
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'news',
								),
							),
							'reloadTemplate' => true,
						),


						'blog_grid_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Grid Layout', 'picante' ),
							'default'     => '3',
							'choices' => array(
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),

							'reloadTemplate' => true,
						),

						'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns (Items) Gap', 'picante' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_blog > .blog-entries article',
							'css_property' => 'padding',
							'customJS' => array('front' => 'init_cl_portfolio')
						),

						'blog_pagination' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Blog Pagination', 'picante' ),
							
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'reloadTemplate' => true

						),	


						'blog_animation' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Animation Type', 'picante' ),
							'default'     => 'none',
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

							'reloadTemplate' => true,
						),

						'image_filter' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Images Filter', 'picante' ),
							'tooltip' => esc_attr__( 'Applied on blog images', 'picante' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'normal',
								'darken' => 'darken',
								'_1977' => '1977',
								'aden' => 'aden',
								'brannan' => 'brannan',
								'brooklyn' => 'brooklyn',
								'clarendon' => 'clarendon',
								'earlybird' => 'earlybird',
								'gingham' => 'gingham',
								'hudson' => 'hudson',
								'inkwell' => 'inkwell',
								'kelvin' => 'kelvin',
								'lark' => 'lark',
								'lofi' => 'lo-Fi',
								'maven' => 'maven',
								'mayfair' => 'mayfair',
								'moon' => 'moon',
								'nashville' => 'nashville',
								'perpetua' => 'perpetua',
								'reyes' => 'reyes',
								'rise' => 'rise',
								'slumber' => 'slumber',
								'stinson' => 'stinson',
								'toaster' => 'toaster',
								'valencia' => 'valencia',
								'walden' => 'walden',
								'willow' => 'willow',
								'xpro2' => 'x-pro II'
							),
							'reloadTemplate' => true
						),

						'blog_image_lazyload' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lazyload Image', 'picante' ),
							'tooltip' => esc_attr__( 'Image will be loaded only when it\'s on viewport', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),

							'reloadTemplate' => true,
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'picante' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">".esc_html__('Image Sizes Section', 'picante')."</a>. ".esc_html__("When leaved default, for grid, alternate, news, media styles will be use the 'blog_entry_small' for other styles the 'blog_entry' ", 'picante' ),
								'default'     => 'theme_default',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


						'blog_button' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Remove Read More Button', 'picante' ),
							'tooltip' => esc_attr__( '', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'remove-read-more',
							'reloadTemplate' => true,

						),


					'general_group_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'general'
					),


					'carousel_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Carousel', 'picante'),
						'groupid' => 'carousel'
					),	

						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
						),	

						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'picante' ),
							'default'     => 1,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true

						),	

						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,

						),	

						'carousel_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Carousel Layout', 'picante' ),
							'default'     => '3',
							'choices' => array(
								'1'	=> '1 Column',
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-layout',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),

							'reloadTemplate' => true,
						),

						'carousel_effect' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Carousel Effect', 'picante' ),
							'default'     => '3',
							'choices' => array(
								'default'	=> esc_html__('Slide', 'picante'),
								'fade'	=> esc_html__('Fade', 'picante'),
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-effect',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel_layout',
									'operator' => '==',
									'value'    => "1",
								),
							),

							'reloadTemplate' => true,
						),

						'carousel_stagepadding' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Stage Padding', 'picante' ),
							'tooltip' => esc_attr__( 'Add Stage padding to the right', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-stagepadding',
							'reloadTemplate' => true,

						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Carousel', 'picante'),
						'groupid' => 'carousel'
					),

					'query_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'picante' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'post' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'picante' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show', 'picante' ),
							'default'  => 6,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							
							'default'     => 'date',
							'multiple' => false,
							'choices'     => array(
								'none' => esc_html__('No order', 'picante'),
								'ID' => esc_html__('Post ID', 'picante'),
								'author' => esc_html__('Author', 'picante'),
								'title' => esc_html__('Title', 'picante'),
								'name' => esc_html__('Name (slug)', 'picante'),
								'date' => esc_html__('Date', 'picante'),
								'modified' => esc_html__('Modified', 'picante'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							
							'default'     => esc_html__('DESC', 'picante'),
							'multiple' => false,
							'choices'     => array(
								'DESC' => esc_html__('Descending', 'picante'),
								'ASC' => esc_html__('Ascending', 'picante'),				
							),
							'reloadTemplate' => true
						),

						'related' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Related', 'picante' ),
							'tooltip' => esc_html__( 'used for related posts on single blog', 'picante' ),
							'default'  => 0,
							'show' => false
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.cl_blog',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),

				)
			));

 			/* Team */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Team', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-postcard-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_team',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css'),
				'marginPositions' => array('top'),
				'fields' => array(

					'general_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'general'
					),	

						'is_single' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Single Team', 'picante' ),
							'tooltip' => esc_html__('Switch On to show only one Team Member.', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_team',
							'addClass' => 'is_single',
							'reloadTemplate' => true
						),

						'style' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							
							'default'     => 'simple',

							'choices'     => array(
								'simple' => esc_html__('Simple', 'picante'),
								'photo' => esc_html__('Only Photo', 'picante'),
								'left_aligned' => esc_html__('Left Aligned', 'picante')
							),
							'selector' => '.cl_team',
							'selectClass' => 'style-',

							'reloadTemplate' => true,
							
						),

						'hide_content' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Hide Content', 'picante' ),
							'tooltip' => esc_html__('Switch On to hide content', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_team',
							'addClass' => 'hide_content',
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'photo',
								),
							)
						),

						'grid_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Layout', 'picante' ),
							'default'     => '3',
							'choices' => array(
								'1'	=> '1 Columns',
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
								'6'	=> '6 Columns',
							),
							'selector' => '.cl_team',
							'htmldata' => 'columns',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'team_items_distance' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Distance between Team Members', 'picante' ),
								
								'default'     => '15',
								'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '5',
								),
								'suffix' => 'px',
								'selector' => '.cl_team .team-item',
								'css_property' => 'padding'
							),

						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							
							),
							'selector' => '.cl_team',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel')
						),	


						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	

						'carousel_center' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Center', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'center',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	

						'carousel_loop' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Loop', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'loop',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	


						'title_typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Typography', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined title typography styles on Styling Section', 'picante'),
							'default'     => 'h3',
							'priority'    => 10,
							'selector' => '.cl_team .team-name',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'picante' ),
								'h2' => esc_attr__( 'H2', 'picante' ),
								'h3' => esc_attr__( 'H3', 'picante' ),
								'h4' => esc_attr__( 'H4', 'picante' ),
								'h5' => esc_attr__( 'H5', 'picante' ),
								'h6' => esc_attr__( 'H6', 'picante' ),
							),
						),


						'team_animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
							'reloadTemplate' => true
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'picante' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">".esc_attr__('Image Sizes Section', 'picante')."</a>",
								'default'     => 'team_entry',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'general_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('General', 'picante'),
						'groupid' => 'general'
					),	


 					'query_start' => array(
						'type' => 'group_start',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),	

						'team_id' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items', 'picante' ),
							
							'default'     => '',
							'choices' => codeless_get_items_by_term( 'staff' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 1,
								),
							)
						),

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'picante' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'staff_entries' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'picante' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show in one portfolio page', 'picante' ),
							'default'  => 12,
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							
							'default'     => 'date',

							'choices'     => array(
								'none' => esc_html__('No order', 'picante'),
								'ID' => esc_html__('Post ID', 'picante'),
								'author' => esc_html__('Author', 'picante'),
								'title' => esc_html__('Title', 'picante'),
								'name' => esc_html__('Name (slug)', 'picante'),
								'date' => esc_html__('Date', 'picante'),
								'modified' => esc_html__('Modified', 'picante'),
							),

							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'picante' ),
							
							'default'     => esc_html__('DESC', 'picante'),

							'choices'     => array(
								'DESC' => esc_html__('Descending', 'picante'),
								'ASC' => esc_html__('Ascending', 'picante'),				
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => esc_html__('Query', 'picante'),
						'groupid' => 'query'
					),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_team',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
						),



				)
			));
			
 			/* Shop */
			if( class_exists('woocommerce') ){
			
				cl_builder_map(array(
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Shop', 'picante' ),
					'section'     => 'cl_codeless_page_builder',
					
					'icon'		  => 'icon-ecommerce-cart',
					'transport'   => 'postMessage',
					'settings'    => 'cl_woocommerce',
					'marginPositions' => array('top'),
					'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-woocommerce.css', CODELESS_BASE_URL.'css/owl.carousel.min.css'),
					'is_container' => false,
					'fields' => array(

						'shortcode' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Select Action', 'picante' ),
								'tooltip' => esc_attr__( 'Select one of Woocommerce elements that you want to add', 'picante' ),
								'default'     => 'recent_products',
								'choices' => array(
									'archive' => esc_html__('Archive with pagination', 'picante'),
									'recent_products' => esc_html__('Recent Products', 'picante'),
									'featured_products' => esc_html__('Featured Products', 'picante'),
									'product_category' => esc_html__('Product Category', 'picante'),
									'sale_products' => esc_html__('Sale Products', 'picante'),
									'best_selling_products' => esc_html__('Best Selling Products', 'picante'),
									'top_rated_products' => esc_html__('Top Rated Products', 'picante'),
								
								),
								'selector' => '.cl_woocommerce',
								'selectClass' => 'action-',
								'reloadTemplate' => true
							),

						'columns' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns', 'picante' ),
								'default'     => '3',
								'choices'     => array(
								  '1'  => esc_attr__( '1 Column', 'picante' ),
							      '2'  => esc_attr__( '2 Columns', 'picante' ),
							      '3' => esc_attr__( '3 Columns', 'picante' ),
							      '4' => esc_attr__( '4 Columns', 'picante' ),
							      '5' => esc_attr__( '5 Columns', 'picante' ),
							      '6' => esc_attr__( '6 Columns', 'picante' ),
							   ),
								'reloadTemplate' => true
								
							),

						'product_style' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Style', 'picante' ),
								'default'     => 'normal',
								'choices'     => array(
								  'normal'  => esc_attr__( 'Normal', 'picante' ),
							     
							   ),
								'reloadTemplate' => true
								
							),

						
							'category' => array(
								'type'     => 'inline_select', 
								'priority' => 10,
								'label'       => esc_attr__( 'Category', 'picante' ),
								'default'     => '',
								'choices' => codeless_get_terms( 'product_cat', true ),
								'reloadTemplate' => true,
							),

							'per_page' => array(
								'type' => 'text',
								'label'    => esc_html__( 'Items per page', 'picante' ),
								'tooltip' => esc_html__( 'Maximal number of items that will show', 'picante' ),
								'default'  => 12,
								'reloadTemplate' => true
							),

							'orderby' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Order By', 'picante' ),
								'default'     => 'date',

								'choices'     => array(
									'none' => esc_html__('No order', 'picante'),
									'ID' => esc_html__('Post ID', 'picante'),
									'author' => esc_html__('Author', 'picante'),
									'title' => esc_html__('Title', 'picante'),
									'name' => esc_html__('Name (slug)', 'picante'),
									'date' => esc_html__('Date', 'picante'),
									'modified' => esc_html__('Modified', 'picante'),
								),

								'reloadTemplate' => true,
							),


							'order' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Order', 'picante' ),
								'default'     => esc_html__('DESC', 'picante'),

								'choices'     => array(
									'DESC' => esc_html__('Descending', 'picante'),
									'ASC' => esc_html__('Ascending', 'picante'),				
								),
								'reloadTemplate' => true
							),

							'carousel' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Carousel', 'picante' ),
								'tooltip' => '',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'picante' ),
									'off' => esc_attr__( 'Off', 'picante' ),
								),
								'reloadTemplate' => true
						    ),

						    'carousel_nav' => array(
								'type'     => 'switch',
								'priority' => 10,
								'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
								'default'     => 0,
								'choices' => array(
									'on' => esc_html__('On', 'picante'),
									'off' => esc_html__('Off', 'picante')
								
								),
								
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => true,
									),
								),
							),	



							'carousel_dots' => array(
								'type'     => 'switch',
								'priority' => 10,
								'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
								'default'     => 0,
								'choices' => array(
									'on' => esc_html__('On', 'picante'),
									'off' => esc_html__('Off', 'picante')
								
								),
								
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => true,
									),
								),
							),

							'filters' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Filters', 'picante' ),
								'default'     => 'disabled',
								'choices'     => array(
									'disabled'  => esc_attr__( 'Disable', 'picante' ),
									'enable'  => esc_attr__( 'Enable', 'picante' )
								),
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => false,
									),
								),
								
							),	

							'distance' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns (Items) Gap', 'picante' ),
								'default'     => '15',
								'choices'     => array(
									'min'  => '0',
									'max'  => '35',
									'step' => '1',
								),
								'suffix' => 'px',
								'selector' => '#shop-entries .product_item .inner-wrapper',
								'css_property' => 'padding',
								'customJS' => array('front' => 'init_cl_woocommerce')
							),

							'animation' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'    => esc_html__( 'Animation', 'picante' ),
								'default'     => 'bottom-t-top',
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

								'reloadTemplate' => true,
							),

							'product_title' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Product Title Style', 'picante' ),
								'tooltip' => '',
								'default'     => 'h4',
								'priority'    => 10,
								'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'picante' ),
											'h2' => esc_attr__( 'H2', 'picante' ),
											'h3' => esc_attr__( 'H3', 'picante' ),
											'h4' => esc_attr__( 'H4', 'picante' ),
											'h5' => esc_attr__( 'H5', 'picante' ),
											'h6' => esc_attr__( 'H6', 'picante' ),
								),
								'reloadTemplate' => true
							),

							'pagination_style' => array( 
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Pagination', 'picante' ),
								'default'     => 'numbers',
								'choices'     => array(
									'none'  => esc_attr__( 'None', 'picante' ),
									'numbers'  => esc_attr__( 'Page Numbers', 'picante' ),
									'next_prev'  => esc_attr__( 'Next/Prev', 'picante' ),
									'load_more'  => esc_attr__( 'Load More', 'picante' ),
									'infinite_scroll'  => esc_attr__( 'Infinite', 'picante' ),
									
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'shortcode',
										'operator' => '==',
										'value'    => 'archive',
									),
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => false,
									),
								),

							),

							'css_style' => array(
								'type' => 'css_tool',
								'label' => esc_html__('Tool', 'picante'),
								'selector' => '.cl_woocommerce',
								'css_property' => '',
								'default' => array( 'margin-top' => '0px' ),
							),

					)
				));

				
				
			}

 			/* Clients */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Clients', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-cards-hearts',
				'transport'   => 'postMessage',
				'settings'    => 'cl_clients',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Carousel', 'picante' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_clients',
							'addClass' => 'cl-carousel owl-carousel owl-theme',
							'reloadTemplate' => true
					),

					'carousel_view_items' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Items', 'picante' ),
							
							'default'     => '6',
							'choices' => array(
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_clients',
							'htmldata' => 'items',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'reloadTemplate' => true,
					),

					'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_clients',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'picante' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'picante' ),
							'default'     => 1,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_clients',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),

					'images' => array(
						'type'     => 'image_gallery',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Clients Images', 'picante' ),
						
						'reloadTemplate' => true,
					),

					'items_per_row' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items per Row', 'picante' ),
							
							'default'     => 'all',
							'choices' => array(
								'all'	=> esc_html__('All', 'picante'),
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_clients',
							'selectClass' => 'items_',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 0,
								),
							),
					),

					'clients_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('Only Image', 'picante'),
								'opacity_shadow' => esc_html__('Shadow on hover', 'picante')
							),
							'selector' => '.cl_clients',
							'selectClass' => 'style_'
					),

					'overlay_color' => array(
							'type' => 'color',
							'label' => esc_html__('Overlay BG Color', 'picante'),
							'default' => 'rgba(255,255,255,0.85)',
							'selector' => '.cl_clients .client-item .overlay-bg',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'clients_style',
									'operator' => '==',
									'value'    => 'overlay_title',
								),
							),
					),

					'autoplay_timeout' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Autoplay Timeout', 'picante' ),
						
						'default'     => '5000',
						'htmldata' => 'autoplay-timeout',
						'selector' => '.cl_clients',
						'reloadTemplate' => true
					),

					'show_title' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Show Title in overlay', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'clients_style',
									'operator' => '==',
									'value'    => 'overlay_title',
								),
							),

						),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_clients',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				)
			));

 			/* Empty Space */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Empty Space', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_empty',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					'space' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Space in Pixels', 'picante' ),
						
						'selector' => '.cl_empty',
						'css_property' => 'height',
						'default'     => '60px'
					),

					'responsive' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Responsive', 'picante' ),
							'tooltip' => esc_html__('Stretch Row in a fullscreen style.', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
					),

					'custom_767' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Space Max-Width:767px (Phones)', 'picante' ),
							'tooltip' => esc_attr__( 'Is applied only for media screen (max-width:767px)', 'picante' ),
							'default'     => '60',
							
							'suffix' => 'px',
							'selector' => '.cl_empty',
							'css_property' => 'height',
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'responsive',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'custom_1024' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Space Max-Width:1024px ( Tablet )', 'picante' ),
							'tooltip' => esc_attr__( 'Is applied only for media screen (max-width:1024px)', 'picante' ),
							'default'     => '60',
							
							'suffix' => 'px',
							'selector' => '.cl_empty',
							'css_property' => 'height',
							'media_query' => '(max-width: 1024px)',
							'cl_required'    => array(
								array(
									'setting'  => 'responsive',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
				)
			));

			/* Counter */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Counter', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-clessidre',
				'transport'   => 'postMessage',
				'settings'    => 'cl_counter',
				'css_dependency' => array(CODELESS_BASE_URL.'css/odometer.css'),
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'number' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Number Counter', 'picante' ),
						
						'default'     => '124',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'duration' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Animation Duration', 'picante' ),
						
						'default'     => '2000',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'suffix' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Suffix', 'picante' ),
						
						'default'     => '',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'align' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Align', 'picante' ),
							
							'default'     => 'center',
							'multiple' => false,
							'choices'     => array(
								'left' => esc_html__('Left', 'picante'),
								'center' => esc_html__('Center', 'picante'),	
								'right' => esc_html__('Right', 'picante'),			
							),
							'selector' => '.cl_counter',
							'selectClass' => 'align-'
						),

					'custom_color' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Color', 'picante' ),
							'tooltip' => esc_html__('Custom Color', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
					),

					'color' => array(
							'type' => 'color',
							'label' => esc_html__('Color', 'picante'),
							'default' => '#222222',
							'selector' => '.cl_counter',
							'css_property' => 'color',
							'alpha' => true,
							'suffix' => '!important',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_color',
									'operator' => '==',
									'value'    => true,
								),
							),
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_counter',
							'css_property' => '',
							'default' => array('margin-top' => '0px')
					),
				)
			));

			/* Countdown */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Countdown', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-clessidre',
				'transport'   => 'postMessage',
				'settings'    => 'cl_countdown',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'dt' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_countdown',
						'label'       => esc_attr__( 'Date Countdown', 'picante' ),
						
						'default'     => '2021/01/01',
						'reloadTemplate' => true,
						'htmldata' => 'dt'

					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> esc_html__('None', 'picante'),
								'large' =>	'Large'
							),
							'selector' => '.cl_countdown',
							'selectClass' => ''
						),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_countdown',
							'css_property' => '',
							'default' => array('margin-top' => '0px')
					),
				)
			));

 			/* Progress Bar */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Progress Bar', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-battery-half',
				'transport'   => 'postMessage',
				'settings'    => 'cl_progress_bar',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Space in Pixels', 'picante' ),
						
						'selector' => '.cl_progress_bar .title',
						'default' => esc_html__('Development', 'picante'),
					
					),

					'percentage' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Percentage', 'picante' ),
							
							'default'     => '50',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '1',
							),
							'suffix' => '', 
							'selector' => '.cl_progress_bar',
							'htmldata' => 'percentage',
							'customJS' => 'inlineEdit_progress_percentage'
					),

					'color' => array(
							'type' => 'color',
							'label' => esc_html__('Progress Bar Color', 'picante'),
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_progress_bar .bar',
							
							'css_property' => 'background-color',
							'alpha' => true
						),

						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'picante' ),
							
							'default'     => 'none',
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
							'selector' => '.cl_progress_bar'
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
							'selector' => '.cl_progress_bar',
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
							'selector' => '.cl_progress_bar',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_progress_bar',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 			/* Google Map */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Google Map', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-geolocalize-05',
				'transport'   => 'postMessage',
				'settings'    => 'cl_map',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					'api_key' => array(
						'type' => 'text',
						'label' => esc_html__('Api Key', 'picante'),
						'tooltip' => "Generate an API key <a target=\"_blank\" href=\"https://developers.google.com/maps/documentation/javascript/get-api-key\">here</a>, if you don't have one.",
						'selector' => '.cl_map',
						'customJS' => 'inlineEdit_loadGoogleApi',				

					),
					'lat_lon' => array(
						'type' => 'text',
						'label' => esc_html__('Latitude & Longitude', 'picante'),
						'tooltip' => "1. On your computer, visit Google Maps.<br />
2. Right-click a location on the map.<br />
3. Select What's here?.<br />
4. A card appears at the bottom of the screen with more info.<br />",
						'selector' => '.cl_map',
						'reloadTemplate' => true,

					),

					'height' => array(
	
							'type' => 'slider',
							'label' => esc_html__('Map Height', 'picante'),
							'default' => '400',
							'selector' => '.cl-map-element',
							'css_property' => 'height',
							'choices'     => array(
								'min'  => '40',
								'max'  => '1000',
								'step' => '5',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),

					'fullheight_map' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Map', 'picante' ),
							'tooltip' => esc_html__('Stretch Map height 100%', 'picante'),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'picante' ),
								'off' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_map',
							'addClass' => 'cl-map-fullheight',
							'customJS' => 'inlineEdit_mapFullHeight'
					),

					'zoom' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Map Zoom', 'picante' ),
								
								'default'     => '14',
								'choices'     => array(
									'min'  => '0',
									'max'  => '19',
									'step' => '1',
								),
								'suffix' => '',
								'selector' => '.cl_map',
								'htmldata' => 'zoom',
								'customJS' => array('front' => 'codelessGMap')
							),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'tooltip' => esc_attr__( 'Map Style, leave normal for the default style.', 'picante' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => esc_html__('Normal', 'picante'),
								'ultra_light_labels' => esc_html__('Ultra Light Labels', 'picante'),
								'shades_grey' => esc_html__('Shades Of Grey', 'picante'),
								'subtle_grayscale' => esc_html__('Subtle Grayscale', 'picante'),
								'blue_water' => esc_html__('Blue Water', 'picante'),
								'apple_style' => esc_html__('Apple Maps Style', 'picante')
							),
							'selector' => '.cl_map',
							'htmldata' => 'style',
							'customJS' => array('front' => 'codelessGMap')
							
							
							
						),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_map',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


 			/* Contact Form 7 */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Contact Form 7', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-mail',
				'transport'   => 'postMessage',
				'settings'    => 'cl_contact_form7',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					
					'id' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Form', 'picante' ),
							'tooltip' => esc_html__('Select one of the created contact forms. Or create a new form','picante').' <a href="'.admin_url('admin.php?page=wpcf7-new').'" target="_blank">here</a>',
							'default'     => 'none',
							'choices' => codeless_get_items_by_term('wpcf7_contact_form'),
							'reloadTemplate' => true
					),


					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined styles or leave "none" and add your custom style in css.', 'picante'),
							'default'     => 'simple',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'simple' => esc_html__('Simple Vertical', 'picante'),
								'dark' => esc_html__('Simple Dark', 'picante'),
								'border' => esc_html__('Simple Border', 'picante')							
							),
							'selector' => '.cl_contact_form7',
							'selectClass' => 'style-'
					),



					

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_contact_form7',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
						),
				)
			));


			
			/* Toggles */

 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Toggles', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_toggles',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined styles or leave "none" and add your custom style in css.', 'picante'),
							'default'     => 'simple',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'simple' => esc_html__('Simple', 'picante'),
								'square_plus' => esc_html__('Square Plus', 'picante')
							),
							'selector' => '.cl_toggles',
							'selectClass' => 'style-'
					),

					'accordion' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Accordion', 'picante' ),
							'tooltip' => esc_attr__( 'Make this togggles element function as a accordion', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_toggles',
							'htmldata' => 'accordion',
							'customJS' => array('front' => 'codelessToggles')
						),

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_toggles',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Toggle', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_toggle',
				'hide_from_list' => true,
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'is_active' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Active by default', 'picante' ),
							'tooltip' => esc_attr__( 'Make active this toggle by default by switch this option ON', 'picante' ),
							'default'     => 0,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_toggle .title',
							'addClass' => 'open'
						),

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_toggle > .title > a',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
						'default'     => esc_html__('Toggle Title', 'picante'),
						'holder' => 'div'
					),
				)
			));



			/* Tabs */

 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Tabs', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_tabs',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined styles or leave "none" and add your custom style in css.', 'picante'),
							'default'     => 'simple',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'simple' => esc_html__('Simple', 'picante'),
								'large' => esc_html__('Large', 'picante')
							),
							'selector' => '.cl_tabs',
							'selectClass' => 'style-'
					),

		
					'css_style' => array( 
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_tabs',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 			
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Tab', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_tab',
				'hide_from_list' => true,
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.tab-pane',
						'for_tab_title' => true,
						'label'       => esc_attr__( 'Tab Title', 'picante' ),
						'default'     => '',
						'only_text'  => true,
						'holder' => 'div'
					),

					'tab_id' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Tab ID', 'picante' ),
						'tooltip' => esc_attr__( 'Use an unique ID', 'picante' ),
						'default'     => 'tab',
					),

					
				)
			));



			/* List */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'List', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_list',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Type', 'picante' ),
							'tooltip' => esc_html__('Select type of list', 'picante'),
							'default'     => 'ul',
							'choices' => array(
								'ul' => esc_html__('Unordered List', 'picante'),
								'ol' => esc_html__('Ordered List', 'picante'),
								'table' => esc_html__('As table', 'picante')
							),
							'customJS' => 'inlineEdit_listType'
					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'tooltip' => esc_html__('Select one of the predefined styles or leave "none" and add your custom style in css.', 'picante'),
							'default'     => 'simple',
							'choices' => array(
								'none' => esc_html__('None', 'picante'),
								'simple' => esc_html__('Simple', 'picante'),
								'circle' => esc_html__('Circle', 'picante')

							),
							'selector' => '.cl_list',
							'selectClass' => 'style-',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '!=',
									'value'    => 'table',
								),
							)
					),

					'icon_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Size', 'picante' ),
							
							'default'     => '14',
							
							'selector' => '.cl_list_item > i',
							'css_property' => 'font-size',
							'choices'     => array(
									'min'  => '10',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'simple',
								),
								array(
									'setting'  => 'type',
									'operator' => '!=',
									'value'    => 'table',
								),
							)
						),
					

					'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance between items', 'picante' ),
							'tooltip' => esc_attr__( 'Distance between list items in pixel', 'picante' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '20',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_list .cl_list_item',
							'css_property' => array('padding-top','padding-bottom'),
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '!=',
									'value'    => 'table',
								),
							)
						),



					'css_style' => array( 
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_list',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'List Item', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_list_item',
				'hide_from_list' => true,
				'is_container' => false,
				'fields' => array(

					'custom_icon' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Icon', 'picante' ),
							'tooltip' => esc_attr__( 'Switch to add a custom icon to list items', 'picante' ),
							'default'     => 1,
							'choices' => array(
								'on' => esc_html__('On', 'picante'),
								'off' => esc_html__('Off', 'picante')
							
							),
							'selector' => '.cl_list_item',
							'addClass' => 'with_icon',
							'reloadTemplate' => true
						),

					'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'picante' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_list_item > i',
							'selectClass' => ' ',
							
					),

					'content' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_list_item > .text',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'tooltip' => esc_attr__( 'This will be the label for your link', 'picante' ),
						'default'     => esc_html__('Sample. Click to modify', 'picante'),
						'holder' => 'div'
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
								'top-t-bottom' =>	'Top-Bottom',
								'bottom-t-top' =>	'Bottom-Top',
								'right-t-left' => esc_html__('Right-Left', 'picante'),
								'left-t-right' => esc_html__('Left-Right', 'picante'),
								'alpha-anim' => esc_html__('Fade-In', 'picante'),	
								'zoom-in' => esc_html__('Zoom-In', 'picante'),	
								'zoom-out' => esc_html__('Zoom-Out', 'picante'),
								'zoom-reverse' => esc_html__('Zoom-Reverse', 'picante'),
							),
							'selector' => '.cl_list_item',
							'customJS' => array('front' => 'animations')
						),
						
						'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Delay between items', 'picante' ),
							
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
							'selector' => '.cl_list_item',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),

							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_list_item',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
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
				'label'       => esc_attr__( 'Table Row', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_table_row',
				'hide_from_list' => true,
				'is_container' => false,
				'fields' => array(

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_table_row .title',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'tooltip' => esc_attr__( 'Content', 'picante' ),
						'default'     => esc_html__('Title Here', 'picante'),
						'replace_type_vc' => 'textfield',
						'holder' => 'div'

					),

					'subtitle' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_table_row .subtitle span',
						'label'       => esc_attr__( 'Text', 'picante' ),
						'tooltip' => esc_attr__( 'Content', 'picante' ),
						'default'     => esc_html__('Subtitle, click to edit this.', 'picante'),
						'replace_type_vc' => 'textfield'

					),

					'price' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_table_row .price span',
						'label'       => esc_attr__( 'Price', 'picante' ),
						'tooltip' => esc_attr__( 'Price', 'picante' ),
						'default'     => '5.00',
						'replace_type_vc' => 'textfield'

					),

					'wrapper_subtitle' => array(
						'type'     => 'color',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_table_row .subtitle span',
						'css_property' => 'background-color',
						'label'       => esc_attr__( 'Subtitle Wrapper BG Color', 'picante' ),
						'default'     => '#fff',

					),

					'wrapper_price' => array(
						'type'     => 'color',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_table_row .price span',
						'css_property' => 'background-color',
						'label'       => esc_attr__( 'Price Wrapper BG Color', 'picante' ),
						'default'     => '#fff',

					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							
							'default'     => 'simple',
							'choices' => array(
								'simple'	=> esc_html__('Simple', 'picante'),
								'big' =>	'Big',
							),
							'selector' => '.cl_table_row',
							'selectClass' => 'style-',
							
						),
				)
			));


			/* Icon */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Icon', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-clubs',
				'transport'   => 'postMessage',
				'settings'    => 'cl_icon',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'picante' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_icon i',
							'selectClass' => ' '
								
					),

					'icon_link' => array(

							'type' => 'text',
							'priority' => 10,
							'label' => esc_attr__('Set the hyperlink', 'picante'),
							'default' => '#',
							'selector' => '.cl_icon'

					),

					'icon_target' => array(

							'type' => 'inline_select',
							'priority'=> 10,
							'label' => esc_attr__('Set link loading mode', 'picante'),
							'default' => '_blank',
							'selector' => '.cl_icon',
							'choices' =>array(

								'_blank' => esc_html__('New window', 'picante'),
								'_self' => esc_html__('Same Window', 'picante'),
								'_parent' => esc_html__('Parent Window', 'picante'),
								'_top' => esc_html__('Top Window', 'picante'),


						),

					),

					'size' => array(
							'type'     => 'slider',
							'label' => esc_html__('Font size', 'picante'),
							'default' => '15',
							'selector' => '.cl_icon i',
							'css_property' => 'font-size',
							'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
										'suffix' => 'px'
									),
						    'suffix' => 'px',

							'label'       => esc_attr__( 'Icon Font Size', 'picante' )
							
						
					),

					

					'color' => array(

							'type' => 'color',
							'label' => esc_html__('Set Color', 'picante'),
							'default' => '#222',
							'selector' => '.cl_icon i',
							'css_property' => 'color',
							'alpha' => true
								
					),

					'hover_color' => array(

							'type' => 'color',
							'label' => esc_html__('Set Hover Color', 'picante'),
							'default' => '#222',
							'selector' => '.cl_icon > a',
							'alpha' => false
								
					),


					'align' => array(

							'type' => 'inline_select',
							'label' => esc_html__('Icon Alignment', 'picante'),
							'default' => 'left',
							'selector' => '.cl_icon',
							'css_property' => 'text-align',
							'choices' => array(

								'left' => esc_html__('Left', 'picante'),
								'right' => esc_html__('Right', 'picante'),
								'center' => esc_html__('Center', 'picante')
								
							)

						),


					'line_height' => array(

							'type'     => 'slider',
							'label' => esc_html__('Line Height', 'picante'),
							'default' => '10',
							'selector' => '.cl_icon i',
							'css_property' => 'line-height',
							'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
										'suffix' => 'px'
									),
						    'suffix' => 'px',

							'label'       => esc_attr__( 'Set Line Height', 'picante' )
							
						
					),


					

					'css_style' => array(

							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_icon',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')

						),
						
						
		
					),
		
				
			));



		/* Share Icons */
		
		cl_builder_map(array(

			'type'        => 'clelement',
			'label'       => esc_attr__( 'Share Icons', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			
			'icon'		  => 'icon-basic-share',
			'transport'   => 'postMessage',
			'settings'    => 'cl_share',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
		
				'add_facebook' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add Facebook Share Icon', 'picante' ),
							'default'     => '1',
							'priority'    => 10,
							'choices'     => array(
								'1'  => esc_attr__( 'On', 'picante' ),
								'0' => esc_attr__( 'Off', 'picante' ),
							),
							
							'reloadTemplate' => true,
							'selector' => '.cl_share i'


					),



				


				'add_twitter' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Twitter Share Icon', 'picante' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),


				

				'add_linkedin' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Linkedin Share Icon', 'picante' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),

				



				'add_pinterest' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Pinterest Share Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),

				

			

			   'add_google_plus'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Google Plus Share Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true




			   	),


			   'add_whatsapp' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Whatsapp Share Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),



			   'target' => array(

						'type' => 'inline_select',
						'priority'=> 10,
						'label' => esc_attr__('Set link loading mode', 'picante'),
						'default' => '_blank',
						'selector' => '.cl_share',
						'choices' =>array(

							'_blank' => esc_html__('New window', 'picante'),
							'_self' => esc_html__('Same Window', 'picante'),
							'_parent' => esc_html__('Parent Window', 'picante'),
							'_top' => esc_html__('Top Window', 'picante'),


					),

				),

		

				'size' => array(
						'type'     => 'slider',
						'label' => esc_html__('Font size', 'picante'),
						'default' => '15',
						'selector' => '.cl_share i',
						'css_property' => 'font-size',
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Font Size', 'picante' )
						
					
				),

				

				'color' => array(

						'type' => 'color',
						'label' => esc_html__('Set Color', 'picante'),
						'default' => '#222',
						'selector' => '.cl_share > a',
						'css_property' => 'color',
						'alpha' => true
							
				),

				'hover_color' => array(

						'type' => 'color',
						'label' => esc_html__('Set Hover Color', 'picante'),
						'default' => '#222',
						'selector' => '.cl_share > a',
						'alpha' => false
							
				),


				'border' => array(

						'type' => 'inline_select',
						'label' => esc_attr__( 'Set the border style', 'picante' ),
						'default' => 'none',
						'selector' => '.cl_share',
						'choices' => array(

								'round' => esc_html__('Rounded Style', 'picante'),
								'square' => esc_html__('Square Style', 'picante'),
								'none' => esc_html__('None', 'picante')

							),
						'selectClass' => ''
						

					),

				'bcolor' => array(

						'type' => 'color',
						'label' => esc_html__('Border Color', 'picante'),
						'default' => '#222',
						'selector' => '.cl_share',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				'bgcolor' => array(

						'type' => 'color',
						'label' => esc_html__('Background Color', 'picante'),
						'default' => 'transparent',
						'selector' => '.cl_share',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),

				'padding' => array(
						'type'     => 'slider',
						'label' => esc_html__('Icon Size', 'picante'),
						'default' => '38',
						'selector' => '.cl_share',
						'css_property' => array('width', 'height'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Wrapper Size', 'picante' ),
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),

						
					
				),	

				'display' => array(

						'type' => 'inline_select',
						'label' => esc_html__('Icon Display Mode', 'picante'),
						'default' => 'inline-block',
						'selector' => '.cl_share',
						'css_property' => 'display',
						'choices' => array(

							'inline-block' => esc_html__('Inline', 'picante'),
							'block' => esc_html__('Block', 'picante')
							
							
						),


				),


				'margin'=> array(

						'type' => 'slider',
						'label' => esc_html__('Set the margin between icons', 'picante'),
						'default' => '5',
						'selector' => '.cl_share',
						'css_property' => array('margin-left', 'margin-right'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'picante' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),



				),


				'margintop'=> array(

						'type' => 'slider',
						'label' => esc_html__('Set the margin between icons', 'picante'),
						'default' => '5',
						'selector' => '.cl_share',
						'css_property' => array('margin-top', 'margin-bottom'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'picante' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'block',
								),
							)



				),


				'align' => array(

						'type' => 'inline_select',
						'label' => esc_html__('Icon Alignment', 'picante'),
						'default' => 'left',
						'selector' => '.cl_sharediv',
						'css_property' => 'text-align',
						'choices' => array(

							'left' => esc_html__('Left', 'picante'),
							'right' => esc_html__('Right', 'picante'),
							'center' => esc_html__('Center', 'picante')
							
						),

						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							)

					),


				'line_height' => array(

						'type'     => 'slider',
						'label' => esc_html__('Line Height', 'picante'),
						'default' => '37',
						'selector' => '.cl_share i',
						'css_property' => 'line-height',
						'choices'     => array( 
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Set Line Height', 'picante' )
						
					
				),



				'css_style' => array(

						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.cl_icon',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')

					),

			
			),	
		));




		/* Social Icons */
		cl_builder_map(array(

			'type'        => 'clelement',
			'label'       => esc_attr__( 'Social Icons', 'picante' ),
			'section'     => 'cl_codeless_page_builder',
			'use_on_header' => true,
			
			'icon'		  => 'icon-basic-share',
			'transport'   => 'postMessage',
			'settings'    => 'cl_socialicon',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
		
				'add_facebook' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add Facebook Icon', 'picante' ),
							'default'     => '1',
							'priority'    => 10,
							'choices'     => array(
								'1'  => esc_attr__( 'On', 'picante' ),
								'0' => esc_attr__( 'Off', 'picante' ),
							),
							'selector' => '.cl_socialicon i',
							'reloadTemplate' => true



					),


			 	'facebook_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the Facebook icon hyperlink', 'picante' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_facebook',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


			 	'add_instagram' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Instagram Icon', 'picante' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),



				'instagram_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the instagram icon hyperlink', 'picante' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_instagram',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_twitter' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Twitter Icon', 'picante' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'twitter_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the twitter icon hyperlink', 'picante' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_twitter',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_email' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Email Icon', 'picante' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'email_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the email icon hyperlink', 'picante' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_email',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_linkedin' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Linkedin Icon', 'picante' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'linkedin_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Linkedin hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_linkedin',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),



				'add_pinterest' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Pinterest Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'pinterest_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Pinterest hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_pinterest',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_youtube' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Youtube Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'youtube_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Youtube hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_youtube',
									'operator' => '==',
									'value'    => '1',
								),
							),

				),

				'add_vimeo' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Vimeo Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),



				'vimeo_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Viemo hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_vimeo',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),


				'add_soundcloud' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Soundcloud Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'soundcloud_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Soundcloud hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_soundcloud',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_slack' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Slack Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'slack_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Slack hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_slack',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_skype' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Skype Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'skype_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set skype hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_skype',
									'operator' => '==',
									'value'    => '1',
								),
					
						),		
				),

			   'add_google_plus'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Google Plus Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true

			   	),

			   'google_plus_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Google Plus hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_google_plus',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

			    'add_github'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Github Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),


			   	'github_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Github hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_github',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

				'add_dribbble'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Dribbble Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),


				'dribbble_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Dribbble hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_dibbble',
									'operator' => '==',
									'value'    => '1',
								),
					
						),


				),

				'add_behance'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Behance Icon', 'picante' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'picante' ),
							'0' => esc_attr__( 'Off', 'picante' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),

				'behance_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Behance hyperlink', 'picante'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_behance',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

				'target' => array(

						'type' => 'inline_select',
						'priority'=> 10,
						'label' => esc_attr__('Set link loading mode', 'picante'),
						'default' => '_blank',
						'selector' => '.cl_socialicon',
						'choices' =>array(

							'_blank' => esc_html__('New window', 'picante'),
							'_self' => esc_html__('Same Window', 'picante'),
							'_parent' => esc_html__('Parent Window', 'picante'),
							'_top' => esc_html__('Top Window', 'picante'),


					),

				),

		

				'size' => array(
						'type'     => 'slider',
						'label' => esc_html__('Font size', 'picante'),
						'default' => '15',
						'selector' => '.cl_socialicon i',
						'css_property' => 'font-size',
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Font Size', 'picante' )
						
					
				),

				

				'color' => array(

						'type' => 'color',
						'label' => esc_html__('Icon Color', 'picante'),
						'default' => '#222',
						'selector' => '.cl_socialicon > a',
						'css_property' => 'color',
						'alpha' => true
							
				),

				'color_hover' => array(

						'type' => 'color',
						'label' => esc_html__('Icon Color Hover', 'picante'),
						'default' => '',
						'alpha' => false
							
				),

				'bgcolor' => array(

						'type' => 'color',
						'label' => esc_html__('Background Color', 'picante'),
						'default' => 'transparent',
						'selector' => '.cl_socialicon',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),

				'bgcolor_hover' => array(

						'type' => 'color',
						'label' => esc_html__('Background Color Hover', 'picante'),
						'default' => 'transparent',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),


				'border' => array(

						'type' => 'inline_select',
						'label' => esc_attr__( 'Set the border style', 'picante' ),
						'default' => 'none',
						'selector' => '.cl_socialicon',
						'choices' => array(

								'round' => esc_html__('Rounded Style', 'picante'),
								'square' => esc_html__('Square Style', 'picante'),
								'none' => esc_html__('None', 'picante')

							),
						'selectClass' => ''
						

					),

				'bcolor' => array(

						'type' => 'color',
						'label' => esc_html__('Border Color', 'picante'),
						'default' => '#222',
						'selector' => '.cl_socialicon',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				'bcolor_hover' => array(

						'type' => 'color',
						'label' => esc_html__('Border Color Hover', 'picante'),
						'default' => '',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				

				'padding' => array(
						'type'     => 'slider',
						'label' => esc_html__('Icon Size', 'picante'),
						'default' => '38',
						'selector' => '.cl_socialicon',
						'css_property' => array('width', 'height'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Size', 'picante' ),
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),

						
					
				),	

				'display' => array(

						'type' => 'inline_select',
						'label' => esc_html__('Icon Display Mode', 'picante'),
						'default' => 'inline-block',
						'selector' => '.cl_socialicon',
						'css_property' => 'display',
						'choices' => array(

							'inline-block' => esc_html__('Inline', 'picante'),
							'block' => esc_html__('Block', 'picante')
							
							
						),


				),


				'margin'=> array(

						'type' => 'slider',
						'label' => esc_html__('Set the margin between icons', 'picante'),
						'default' => '5',
						'selector' => '.cl_socialicon',
						'css_property' => array('margin-left', 'margin-right'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'picante' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),



				),


				'margintop'=> array(

						'type' => 'slider',
						'label' => esc_html__('Set the margin between icons', 'picante'),
						'default' => '5',
						'selector' => '.cl_socialicon',
						'css_property' => array('margin-top', 'margin-bottom'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'picante' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'block',
								),
							),



				),


				'align' => array(

						'type' => 'inline_select',
						'label' => esc_html__('Icon Alignment', 'picante'),
						'default' => 'left',
						'selector' => '.cl_socialicondiv',
						'css_property' => 'text-align',
						'choices' => array(

							'left' => esc_html__('Left', 'picante'),
							'right' => esc_html__('Right', 'picante'),
							'center' => esc_html__('Center', 'picante')
							
						),

						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),

					),


				'line_height' => array(

						'type'     => 'slider',
						'label' => esc_html__('Line Height', 'picante'),
						'default' => '37',
						'selector' => '.cl_socialicon i',
						'css_property' => 'line-height',
						'choices'     => array( 
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Set Line Height', 'picante' )
						
					
				),


				'device_visibility' => array(
							'type'     => 'multicheck',

							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'picante' ),
							
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (smaller-than-768px)', 'picante' ),
								'hidden-sm' => esc_attr__('Hide on Tables (larger-then-768px)', 'picante' ),
								'hidden-md' => esc_attr__('Hide on Medium Desktops (larger-then-992px) ', 'picante' ),
								'hidden-lg' => esc_attr__('Hide on Large Desktops (larger-then1200px)', 'picante' ),
							),
							'selector' => '.cl_socialicondiv',
							'selectClass' => ''
				),

					

				'css_style' => array(

						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.cl_socialicondiv',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')

				),

				
			)


		));

 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Revolution Slider', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-arrows-keyboard-right',
				'transport'   => 'postMessage',
				'settings'    => 'cl_revslider',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'slides' => array(
						'type' => 'inline_select',
						'label' => esc_attr__('Select slide', 'picante'),
						'tooltip' => esc_html__('Select one of the created slides. Or create a new slider','picante').' <a href="'.admin_url('admin.php?page=revslider').'" target="_blank">here</a>',
						'default' => '',
						'choices' => codeless_get_rev_slides(),
						'reloadTemplate' => true
						),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.rev_slider_wrapper',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				),

			
		));


		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Layer Slider', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-arrows-keyboard-right',
				'transport'   => 'postMessage',
				'settings'    => 'cl_layerslider',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'slides' => array(
						'type' => 'inline_select',
						'label' => esc_attr__('Select slide', 'picante'),
						'tooltip' => esc_html__('Select one of the created slides. Or create a new slider', 'picante').' <a href="'.admin_url('admin.php?page=layerslider').'" target="_blank">here</a>',
						'default' => '1',
						'choices' => codeless_get_layer_slides(),
						'reloadTemplate' => true
						),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.ls-container',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				),

			
		));

		if( class_exists( 'TablePress' ) ){
		
			cl_builder_map(array(
					
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Table', 'picante' ),
					'section'     => 'cl_codeless_page_builder',
					
					'icon'		  => 'icon-software-layout-header-4columns',
					'transport'   => 'postMessage',
					'settings'    => 'cl_table',
					'is_container' => false,
					'marginPositions' => array('top'),
					'fields' => array(		
						'tables' => array(
							'type' => 'inline_select',
							'label' => esc_attr__('Select a table', 'picante'),
							'tooltip' => esc_html__('Select one of the created tables. Or create a new table', 'picante').' <a href="'.admin_url('admin.php?page=tablepress_add').'" target="_blank">here</a>',
							'default' => '1',
							'choices' => codeless_get_tablepress(),
							'reloadTemplate' => true
						),
					),

				
			));

		}


		/* Pricelist */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'PriceList', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_pricelist',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(


					'price' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Price', 'picante' ),
							'default'     => '59',
							'selector' => '.cl_pricelist .price .integer-part',
							'only_text' => true
					),
					'price_decimal' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Price Decimal', 'picante' ),
							'default'     => '99',
							'selector' => '.cl_pricelist .price .decimal-part',
							'only_text' => true
					),
					'currency' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Currency', 'picante' ),
							'default'     => '$',
							'selector' => '.cl_pricelist .price .currency',
							'only_text' => true
					),
					'time' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Time', 'picante' ),
							'default'     => 'monthly',
							'selector' => '.cl_pricelist .price .time',
							'only_text' => true
					),
					'title' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'picante' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'picante' ),
							'default'     => esc_html__('Pricelist Title', 'picante'),
							'selector' => '.cl_pricelist .header h4'
					),

					'btn_title' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'picante' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'picante' ),
							'default'     => esc_html__('Purchase Now', 'picante'),
							'selector' => '.cl_pricelist .footer a span'
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'picante' ),
						'default'     => '#'
					),

					'title_color' => array(
							'type' => 'inline_select',
							'label' => esc_html__('Title Color', 'picante'),
							'default' => 'title_dark',
							'choices' => array(
								'title_dark' => esc_html__('Dark', 'picante'),
								'title_light' => esc_html__('Light', 'picante')
							),
							'selector' => '.cl_pricelist',
							'selectClass' => ''
					), 

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_pricelist',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Custom Code', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_custom_code',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'code' => array(
						'type' => 'text',
						'label' => esc_attr__('Add Custom Code', 'picante'),
						'tooltip' => esc_html__('Add Custom HTML or a Shortcode', 'picante'),
						'default' => '',
						'reloadTemplate' => true
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => esc_html__('Tool', 'picante'),
						'selector' => '.cl_custom_code',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				),

			
		));


		if( function_exists( 'mc4wp_show_form' ) ){
			cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Mailchimp', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_mailchimp',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'picante' ),
							'default'     => 'default',
							'choices' => array(
								'default' => esc_html__('Default', 'picante'),
								'large_button' => esc_html__('With Large Button', 'picante')
							),
							'selector' => '.cl_mailchimp',
							'selectClass' => 'style_'
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_mailchimp',
							'css_property' => '',
							'default' => array('padding-top' => '0px', 'padding-bottom' => '0px' )
						),
				),

			
		));
		}

		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Widget Sidebar', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_widget_sidebar',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'sidebar' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Sidebar', 'picante' ),
							'default'     => 'default',
							'choices' => codeless_get_registered_sidebars(),
							'reloadTemplate' => true
					),

					'reservation_inline' => array(
									'type'        => 'switch',
									'label'       => esc_html__( 'Reservation Inline Style', 'picante' ),
									'default'     => 0,
									'priority'    => 10,
									'description'       => esc_html__( 'Used only on Reservation Widget', 'picante' ),
									'choices'     => array(
										'on'  => esc_attr__( 'On', 'picante' ),
										'off' => esc_attr__( 'Off', 'picante' ),
									),
									'selector' => '.cl_widget_sidebar',
									'addClass' => 'reservation-inline'
								),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_widget_sidebar',
							'css_property' => '',
							'default' => array('padding-top' => '0px', 'padding-bottom' => '0px' )
						),
				),

			
		));




		cl_builder_map(array(
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Menu Tabbed', 'picante' ),
					'section'     => 'cl_codeless_page_builder',
					
					'icon'		  => 'icon-basic-todo-txt',
					'transport'   => 'postMessage',
					'settings'    => 'cl_menu_tabbed',
					
					'is_container' => false,
					'fields' => array(

						'menus' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Select Menus', 'picante' ),
							'default'     => '',
							'choices' => codeless_get_items_by_term( 'restaurant_menu' ),
							'reloadTemplate' => true,
						),


					)
				));



		/* Video Lightbox */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Video Lightbox', 'picante' ),
				'section'     => 'cl_codeless_page_builder',
				
				'icon'		  => 'icon-basic-photo',
				'transport'   => 'postMessage',
				'settings'    => 'cl_video_lightbox',
				'is_container' => false,
				'css_dependency' => array(CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css'),
				'marginPositions' => array('top'),
				'fields' => array(
						
						'video_start' => array(
							'type' => 'group_start',
							'label' => esc_html__('Video', 'picante'),
							'groupid' => 'video'
						),
						
						
							'video' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Background', 'picante' ),
								
								'default'     => 'none',
								'choices' => array(
									'none'	=> esc_html__('None', 'picante'),
									'self' => esc_html__('Self-Hosted', 'picante'),
									'youtube' => esc_html__('Youtube', 'picante'),
									'vimeo' => esc_html__('Vimeo', 'picante')
								),
								'reloadTemplate' => true
							),
							
							'video_mp4' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mp4', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_webm' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Webm', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							
							
							
							'video_youtube' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Youtube URL', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'youtube',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_vimeo' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Vimeo URL', 'picante' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'vimeo',
									),
								
								),
								'reloadTemplate' => true
							),

						'video_end' => array(
							'type' => 'group_end',
							'label' => esc_html__('Video', 'picante'),
							'groupid' => 'video'
						),


						'css_style' => array(
							'type' => 'css_tool',
							'label' => esc_html__('Tool', 'picante'),
							'selector' => '.cl_video_lightbox',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
						),
				)
			));

?>