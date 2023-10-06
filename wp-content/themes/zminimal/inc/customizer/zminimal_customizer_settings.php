<?php

// Customizer - Add Custom Styling

function zminimal_sanitize_default( $value ) {
	return $value;
}

// Customizer - Add Settings

function zminimal_register_theme_customizer( $wp_customize ) {
	$wp_customize->add_panel( 'zminimal_theme_options' ,
        array(
            'title'       => esc_html__( 'ZMINIMAL: Theme Options', 'zminimal' ),
            'description' => ''
        )
    );
 	
	// Add Sections
	$wp_customize->add_section( 'zminimal_help' , array(
	    'title'       => esc_html__( 'THEME HELP', 'zminimal' ),
	    'description' => '',
	    'priority'   => 13,
	    'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_custom_css' , array(
   		'title'      => esc_html__('Custom CSS', 'zminimal'),
   		'description'=> esc_html__('Add your custom CSS which will overwrite the theme CSS', 'zminimal'),
   		'priority'   => 12,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_color_general' , array(
   		'title'      => esc_html__('Colors: General', 'zminimal'),
   		'description'=> esc_html__('Change color Accent.', 'zminimal'),
   		'priority'   => 11,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_color_topbar' , array(
   		'title'      => esc_html__('Colors: Top Bar', 'zminimal'),
   		'description'=> esc_html__('Change color on Top Bar.', 'zminimal'),
   		'priority'   => 10,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_footer' , array(
   		'title'      => esc_html__('Footer Settings', 'zminimal'),
   		'description'=> esc_html__('Settings footer, upload footer logo, footer text...', 'zminimal'),
   		'priority'   => 9,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_social' , array(
   		'title'      => esc_html__('Social Media Settings', 'zminimal'),
   		'description'=> esc_html__('Enter your social media(URL). Icons will not show if left blank.', 'zminimal'),
   		'priority'   => 8,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_page' , array(
   		'title'      => esc_html__('Page Settings', 'zminimal'),
   		'description'=> esc_html__('All settings for Page.', 'zminimal'),
   		'priority'   => 7,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_post' , array(
   		'title'      => esc_html__('Post Settings', 'zminimal'),
   		'description'=> esc_html__('All settings for Posts.', 'zminimal'),
   		'priority'   => 6,
   		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_promo' , array(
		'title'      => esc_html__('Promo Box Settings', 'zminimal'),
		'description'=> esc_html__('Add 3 promo boxes.', 'zminimal'),
		'priority'   => 5,
		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_featured' , array(
		'title'      => esc_html__('Featured Area Settings', 'zminimal'),
		'description'=> esc_html__('All settings for Featured Slider.', 'zminimal'),
		'priority'   => 4,
		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_topbar' , array(
		'title'      => esc_html__('Social Icon Settings', 'zminimal'),
		'description'=> esc_html__('Settings Social Icon on right page.', 'zminimal'),
		'priority'   => 3,
		'panel'       => 'zminimal_theme_options',
	) );
	$wp_customize->add_section( 'zminimal_new_section_general' , array(
   		'title'      => esc_html__('General Settings', 'zminimal'),
   		'description'=> esc_html__('Settings Layout and Sidebar on Homepage, Archives, Post page.', 'zminimal'),
   		'priority'   => 1,
   		'panel'       => 'zminimal_theme_options',
	) );
	
	
	
	// Add Setting
		
		// General
		$wp_customize->add_setting(
		    'zminimal_top_logo',
		    array(
		        'default'     => '',
		        'sanitize_callback' => 'zminimal_sanitize_default'
		    )
		);
		$wp_customize->add_setting(
	        'zminimal_home_layout',
	        array(
	            'default'     => 'full',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_grid_title',
	        array(
	            'default'     => 'Latest Posts',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_grid_sub',
	        array(
	            'default'     => 'A theme perfect for fashion & travel blog.',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_archive_layout',
	        array(
	            'default'     => 'full',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		$wp_customize->add_setting(
	        'zminimal_sidebar_home',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		$wp_customize->add_setting(
	        'zminimal_sidebar_posts',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		$wp_customize->add_setting(
	        'zminimal_sidebar_archive',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
	
		// Top Bar
		$wp_customize->add_setting(
	        'zminimal_topbar_social_check',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		// Featured area
		$wp_customize->add_setting(
	        'zminimal_featured_slider',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
	    $wp_customize->add_setting(
	        'zminimal_featured_cat',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_featured_slider_slides',
	        array(
	            'default'     => '6',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );

	    // Promo Boxes
		$wp_customize->add_setting(
	        'zminimal_promo',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo1_title',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo1_image',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo1_url',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo2_title',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo2_image',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo2_url',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo3_title',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo3_image',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_promo3_url',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		// Post Settings
		$wp_customize->add_setting(
	        'zminimal_post_tags',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_author',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_related',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_thumb',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_nav',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_date',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_cat',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_post_title_lowercase',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		// Page Settings
		$wp_customize->add_setting(
	        'zminimal_page_comments',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_page_share',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		// Social Media
		
		$wp_customize->add_setting(
	        'zminimal_facebook',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_twitter',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_instagram',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_pinterest',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_tumblr',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_bloglovin',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_google',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_youtube',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		// Footer Options

		$wp_customize->add_setting(
	        'zminimal_footer_widget_area',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_footer_logo_area',
	        array(
	            'default'     => false,
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_footer_logo',
	        array(
	            'default'     => '',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );

		$wp_customize->add_setting(
	        'zminimal_footer_text',
	        array(
	            'default'     => 'Crafted with <i class="fa fa-heart"></i> by ZThemes',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		$wp_customize->add_setting(
	        'zminimal_footer_copyright',
	        array(
	            'default'     => 'Keep it simple, stupid.',
	            'sanitize_callback' => 'zminimal_sanitize_default'
	        )
	    );
		
		// Color Options
		
			// Top bar
			$wp_customize->add_setting(
				'zminimal_topbar_bg',
				array(
					'default'     => '#fff',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_topbar_nav_color',
				array(
					'default'     => '#000',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_topbar_nav_color_active',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			
			$wp_customize->add_setting(
				'zminimal_drop_bg',
				array(
					'default'     => '#fff',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_drop_border',
				array(
					'default'     => '#333333',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_drop_text_color',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_drop_text_hover_bg',
				array(
					'default'     => '#333333',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_drop_text_hover_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			
			$wp_customize->add_setting(
				'zminimal_topbar_social_color',
				array(
					'default'     => '#6B6B6B',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_topbar_social_color_hover',
				array(
					'default'     => '#6B6B6B',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			
			$wp_customize->add_setting(
				'zminimal_topbar_search_bg',
				array(
					'default'     => '#f9f9f9',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_topbar_search_magnify',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_topbar_search_bg_hover',
				array(
					'default'     => '#474747',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting(
				'zminimal_topbar_search_magnify_hover',
				array(
					'default'     => '#cccccc',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);

			// Color general
			$wp_customize->add_setting(
				'zminimal_color_accent',
				array(
					'default'     => '#000',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);

			// Custom CSS
			$wp_customize->add_setting(
				'zminimal_custom_css',
				array(
					'default'     => '',
					'sanitize_callback' => 'zminimal_sanitize_default'
				)
			);
			$wp_customize->add_setting( 'zminimal_docs', array(
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );
    // Add Control
		
		// General
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'top_logo',
				array(
					'label'      => esc_html__('Upload Top Logo', 'zminimal'),
					'section'    => 'zminimal_new_section_general',
					'settings'   => 'zminimal_top_logo',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_layout',
				array(
					'label'          => esc_html__('Homepage Layout', 'zminimal'),
					'section'        => 'zminimal_new_section_general',
					'settings'       => 'zminimal_home_layout',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'full'   => esc_html__('Full Posts', 'zminimal'),
						'grid'  => esc_html__('Grid Posts', 'zminimal')
					)
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'grid_title',
				array(
					'label'      => esc_html__('Grid Layout: Heading', 'zminimal'),
					'section'    => 'zminimal_new_section_general',
					'settings'   => 'zminimal_grid_title',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'grid_sub',
				array(
					'label'      => esc_html__('Grid Layout: Sub heading', 'zminimal'),
					'section'    => 'zminimal_new_section_general',
					'settings'   => 'zminimal_grid_sub',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'archive_layout',
				array(
					'label'          => esc_html__('Archive Layout', 'zminimal'),
					'section'        => 'zminimal_new_section_general',
					'settings'       => 'zminimal_archive_layout',
					'type'           => 'radio',
					'priority'	 => 5,
					'choices'        => array(
						'full'   => esc_html__('Full Posts', 'zminimal'),
						'grid'  => esc_html__('Grid Posts', 'zminimal')
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_home',
				array(
					'label'      => esc_html__('Enable Sidebar on Homepage', 'zminimal'),
					'section'    => 'zminimal_new_section_general',
					'settings'   => 'zminimal_sidebar_home',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_posts',
				array(
					'label'      => esc_html__('Enable Sidebar on Posts', 'zminimal'),
					'section'    => 'zminimal_new_section_general',
					'settings'   => 'zminimal_sidebar_posts',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_archive',
				array(
					'label'      => esc_html__('Enable Sidebar on Archives', 'zminimal'),
					'section'    => 'zminimal_new_section_general',
					'settings'   => 'zminimal_sidebar_archive',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		
		// Top Bar
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_social_check',
				array(
					'label'      => esc_html__('Disable Social Icons', 'zminimal'),
					'section'    => 'zminimal_new_section_topbar',
					'settings'   => 'zminimal_topbar_social_check',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
		// Featured area
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_slider',
				array(
					'label'      => esc_html__('Enable Featured Slider', 'zminimal'),
					'section'    => 'zminimal_new_section_featured',
					'settings'   => 'zminimal_featured_slider',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Category_Control(
				$wp_customize,
				'featured_cat',
				array(
					'label'    => esc_html__('Select Featured Category', 'zminimal'),
					'settings' => 'zminimal_featured_cat',
					'section'  => 'zminimal_new_section_featured',
					'priority'	 => 2
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'featured_slider_slides',
				array(
					'label'      => esc_html__('Amount of Slides', 'zminimal'),
					'section'    => 'zminimal_new_section_featured',
					'settings'   => 'zminimal_featured_slider_slides',
					'type'		 => 'number',
					'priority'	 => 4
				)
			)
		);

		// Promo Boxes
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo_box',
				array(
					'label'      => esc_html__('Enable Promo Boxes', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo1_title',
				array(
					'label'      => esc_html__('Promo Box #1 Title', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo1_title',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'promo1_image',
				array(
					'label'      => esc_html__('Promo Box #1 Image', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo1_image',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo1_url',
				array(
					'label'      => esc_html__('Promo Box #1 URL', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo1_url',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo2_title',
				array(
					'label'      => esc_html__('Promo Box #2 Title', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo2_title',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'promo2_image',
				array(
					'label'      => esc_html__('Promo Box #2 Image', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo2_image',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo2_url',
				array(
					'label'      => esc_html__('Promo Box #2 URL', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo2_url',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo3_title',
				array(
					'label'      => esc_html__('Promo Box #3 Title', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo3_title',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'promo3_image',
				array(
					'label'      => esc_html__('Promo Box #3 Image', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo3_image',
					'priority'	 => 9
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'promo3_url',
				array(
					'label'      => esc_html__('Promo Box #3 URL', 'zminimal'),
					'section'    => 'zminimal_new_section_promo',
					'settings'   => 'zminimal_promo3_url',
					'type'		 => 'text',
					'priority'	 => 10
				)
			)
		);
		
		// Post Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => esc_html__('Hide Category', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_date',
				array(
					'label'      => esc_html__('Hide Date', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_date',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => esc_html__('Hide Tags', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => esc_html__('Hide Author Box', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => esc_html__('Hide Related Posts Box', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'      => esc_html__('Hide Featured Image from top of Post', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_thumb',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_nav',
				array(
					'label'      => esc_html__('Hide Next/Prev Post Navigation', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_nav',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_title_lowercase',
				array(
					'label'      => esc_html__('Turn off uppercase in post title', 'zminimal'),
					'section'    => 'zminimal_new_section_post',
					'settings'   => 'zminimal_post_title_lowercase',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		
		// Page settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_comments',
				array(
					'label'      => esc_html__('Hide Comments', 'zminimal'),
					'section'    => 'zminimal_new_section_page',
					'settings'   => 'zminimal_page_comments',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_share',
				array(
					'label'      => esc_html__('Hide Share Buttons', 'zminimal'),
					'section'    => 'zminimal_new_section_page',
					'settings'   => 'zminimal_page_share',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		// Social Media
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'facebook',
				array(
					'label'      => 'Facebook',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_facebook',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter',
				array(
					'label'      => 'Twitter',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_twitter',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'instagram',
				array(
					'label'      => 'Instagram',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_instagram',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pinterest',
				array(
					'label'      => 'Pinterest',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_pinterest',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bloglovin',
				array(
					'label'      => 'Bloglovin',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_bloglovin',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'google',
				array(
					'label'      => 'Google Plus',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_google',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tumblr',
				array(
					'label'      => 'Tumblr',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_tumblr',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'youtube',
				array(
					'label'      => 'Youtube',
					'section'    => 'zminimal_new_section_social',
					'settings'   => 'zminimal_youtube',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		
		// Footer Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_widget_area',
				array(
					'label'      => esc_html__('Disable Footer Widget Area', 'zminimal'),
					'section'    => 'zminimal_new_section_footer',
					'settings'   => 'zminimal_footer_widget_area',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_logo_area',
				array(
					'label'      => esc_html__('Disable Footer Logo Area', 'zminimal'),
					'section'    => 'zminimal_new_section_footer',
					'settings'   => 'zminimal_footer_logo_area',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo',
				array(
					'label'      => esc_html__('Upload Footer Logo', 'zminimal'),
					'section'    => 'zminimal_new_section_footer',
					'settings'   => 'zminimal_footer_logo',
					'priority'	 => 4
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_text',
				array(
					'label'      => esc_html__('Footer Text', 'zminimal'),
					'section'    => 'zminimal_new_section_footer',
					'settings'   => 'zminimal_footer_text',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright',
				array(
					'label'      => esc_html__('Footer Copyright Text', 'zminimal'),
					'section'    => 'zminimal_new_section_footer',
					'settings'   => 'zminimal_footer_copyright',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		
		// Color Settings
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_bg',
					array(
						'label'      => esc_html__('Top Bar BG', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color',
					array(
						'label'      => esc_html__('Top Bar Menu Text Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_nav_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color_active',
					array(
						'label'      => esc_html__('Top Bar Menu Text Hover Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_nav_color_active',
						'priority'	 => 3
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_bg',
					array(
						'label'      => esc_html__('Dropdown BG', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_drop_bg',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_border',
					array(
						'label'      => esc_html__('Dropdown Border Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_drop_border',
						'priority'	 => 5
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_color',
					array(
						'label'      => esc_html__('Dropdown Text Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_drop_text_color',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_bg',
					array(
						'label'      =>	esc_html__('Dropdown Text Hover BG', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_drop_text_hover_bg',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_color',
					array(
						'label'      => esc_html__('Dropdown Text Hover Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_drop_text_hover_color',
						'priority'	 => 8
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color',
					array(
						'label'      => esc_html__('Top Bar Social Icons', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_social_color',
						'priority'	 => 9
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color_hover',
					array(
						'label'      => esc_html__('Top Bar Social Icons Hover', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_social_color_hover',
						'priority'	 => 10
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_bg',
					array(
						'label'      => esc_html__('Top Bar Search BG', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_search_bg',
						'priority'	 => 11
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_magnify',
					array(
						'label'      => esc_html__('Top Bar Search Magnify Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_search_magnify',
						'priority'	 => 12
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_bg_hover',
					array(
						'label'      => esc_html__('Top Bar Search BG Hover', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_search_bg_hover',
						'priority'	 => 13
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_magnify_hover',
					array(
						'label'      => esc_html__('Top Bar Search Magnify Hover Color', 'zminimal'),
						'section'    => 'zminimal_new_section_color_topbar',
						'settings'   => 'zminimal_topbar_search_magnify_hover',
						'priority'	 => 14
					)
				)
			);
			
			// Colors general
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'color_accent',
					array(
						'label'      => esc_html__('Accent', 'zminimal'),
						'section'    => 'zminimal_new_section_color_general',
						'settings'   => 'zminimal_color_accent',
						'priority'	 => 1
					)
				)
			);
			
			$wp_customize->add_control(
				new Customize_CustomCss_Control(
					$wp_customize,
					'custom_css',
					array(
						'label'      => esc_html__('Custom CSS', 'zminimal'),
						'section'    => 'zminimal_new_section_custom_css',
						'settings'   => 'zminimal_custom_css',
						'type'		 => 'custom_css',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
	            new ZMinimal_Customize_Control(
	                $wp_customize,
	                'zminimal_docs',
	                array(
	                    'label'      => esc_html__( 'Theme Help!', 'zminimal' ),
	                    'description'   => '<span>Say Hello,</span><span>We are ZThemes Team (<a target="_blank" href="https://themeforest.net/user/zthemes_/portfolio?ref=ZTHEMES_">View Portfolio</a>)</span><span>Minimal Theme (<a target="_blank" href="https://themeforest.net/item/zminimal-minimalist-blog-theme-for-creatives/17912115?ref=ZTHEMES_">View</a>)</span><span>Minimal Support (<a target="_blank" href="https://themeforest.net/item/zminimal-minimalist-blog-theme-for-creatives/17912115/support">Here</a>)</span><span>If you like Minimal.</span><span>Please dont forget to rate it!(<a target="_blank" href="https://themeforest.net/item/zminimal-minimalist-blog-theme-for-creatives/reviews/17912115">Here</a>)</span><span>Thanks for purchasing my item!</span>',
	                    'section'    => 'zminimal_help',
	                )
	            )
			);
 
}
add_action( 'customize_register', 'zminimal_register_theme_customizer' );

function zminimal_customizer_load_css(){
    wp_enqueue_style( 'zminimal-customizer', get_template_directory_uri() . '/css/customizer.css' );
}
add_action('customize_controls_print_styles', 'zminimal_customizer_load_css');
?>