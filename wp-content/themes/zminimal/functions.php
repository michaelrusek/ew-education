<?php

/*** Set Content Width ***/

if ( ! isset( $content_width ) )
	$content_width = 940;

	
/*** Theme set up ***/

add_action( 'after_setup_theme', 'zminimal_theme_setup' );

if ( !function_exists('zminimal_theme_setup') ) {

	function zminimal_theme_setup() {
	
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => 'Primary Menu',
			)
		);
		
		// Localization support
		load_theme_textdomain('zminimal', get_template_directory() . '/lang');
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

		// Title-tag
		add_theme_support( 'title-tag' );

		// Woocommerce
		add_theme_support('woocommerce');

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Remove sidebar on Products page
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

		add_image_size( 'zminimal-full-thumb', 940, 0, true );
		add_image_size( 'zminimal-slider-thumb', 900, 600, true );
		add_image_size( 'zminimal-thumb', 440, 294, true );
		
	
	}

}

/*** WooCommerce settings ***/

// Change number related products
add_filter( 'woocommerce_output_related_products_args', 'zminimal_jk_related_products_args' );
  function zminimal_jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'zminimal_loop_columns');
if (!function_exists('loop_columns')) {
	function zminimal_loop_columns() {
		return 3;
	}
}

// Remove woocommerce breadcrumb
add_action( 'init', 'zminimal_jk_remove_wc_breadcrumbs' );
function zminimal_jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/*** Register & enqueue styles/scripts ***/

add_action( 'wp_enqueue_scripts','zminimal_load_scripts' );

function zminimal_load_scripts() {

	wp_enqueue_style('zminimal-style', esc_url(get_template_directory_uri() . '/style.css'));
	wp_enqueue_style('zminimal-responsive', esc_url(get_template_directory_uri() . '/css/responsive.css'));
	wp_enqueue_style('jquery-bxslider', esc_url(get_template_directory_uri() . '/css/jquery.bxslider.css'));
	wp_enqueue_style('slicknav', esc_url(get_template_directory_uri() . '/css/slicknav.css'));
	wp_enqueue_style('owl-css', esc_url(get_template_directory_uri() . '/css/owl.carousel.css'));
	wp_enqueue_style('owl-theme-css', esc_url(get_template_directory_uri() . '/css/owl.theme.css'));
	wp_enqueue_style('font-awesome-css', esc_url(get_template_directory_uri() . '/css/font-awesome.min.css'));

	wp_enqueue_script('jquery-bxslider', esc_url(get_template_directory_uri() . '/js/jquery.bxslider.min.js'), array('jquery'), false, true);
	wp_enqueue_script('fitvids', esc_url(get_template_directory_uri() . '/js/fitvids.js'), array('jquery'), false, true);
	wp_enqueue_script('jquery-slicknav', esc_url(get_template_directory_uri() . '/js/jquery.slicknav.min.js'), array('jquery'), false, true);
	wp_enqueue_script('owl', esc_url(get_template_directory_uri() . '/js/owl.carousel.min.js'), array('jquery'), false, true);
	wp_enqueue_script('zminimal-script', esc_url(get_template_directory_uri() . '/js/zminimal.js'), array('jquery'), false, true);
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
	
}

/** Load Google fonts ***/
function zminimal_google_fonts_url(){

    $fonts_url  = '';
    $Raleway = _x( 'on', 'Raleway font: on or off', 'zminimal' );
    $CrimsonText      = _x( 'on', 'CrimsonText font: on or off', 'zminimal' );
 
    if ( 'off' !== $Raleway || 'off' !== $CrimsonText ){

        $font_families = array();
 
        if ( 'off' !== $Raleway ) {

            $font_families[] = 'Raleway:400,300,500,600,700';

        }
 
        if ( 'off' !== $CrimsonText ) {

            $font_families[] = 'Crimson Text:400,700';

        }
        
 
        $query_args = array(

            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    }
 
    return esc_url_raw( $fonts_url );
}

function zminimal_enqueue_googlefonts() {

    wp_enqueue_style( 'zthemes-googlefonts', zminimal_google_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'zminimal_enqueue_googlefonts' );

/*** Include files ***/

// Theme Options

require get_template_directory() . '/inc/customizer/zminimal_custom_controller.php';
require get_template_directory() . '/inc/customizer/zminimal_customizer_settings.php';
require get_template_directory() . '/inc/customizer/zminimal_customizer_style.php';

// Post like

require get_template_directory() . '/inc/like/index.php';

// Widgets

require get_template_directory() . '/inc/widgets/about_widget.php';
require get_template_directory() . '/inc/widgets/latest_post_widget.php';
require get_template_directory() . '/inc/widgets/social_widget.php';

/*** Register footer widgets ***/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'zminimal'),
		'id' => 'sidebar',
		'description'   => esc_html__('Widgets in this area will be shown on all posts and pages.','zminimal'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 1', 'zminimal'),
		'id' => 'footer-sidebar1',
		'description'   => esc_html__('Widgets in this area will be shown on footer.','zminimal'),
		'before_widget' => '<div id="%1$s" class="widget first %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 2', 'zminimal'),
		'id' => 'footer-sidebar2',
		'description'   => esc_html__('Widgets in this area will be shown on footer.','zminimal'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => esc_html__('Footer 3', 'zminimal'),
		'id' => 'footer-sidebar3',
		'description'   => esc_html__('Widgets in this area will be shown on footer.','zminimal'),
		'before_widget' => '<div id="%1$s" class="widget last %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
}

/*** PAGINATION ***/

function zminimal_pagination() {

	?>
	
	<div class="pagination">
						
		<div class="older"><?php next_posts_link(esc_html__('Older Posts &rarr;', 'zminimal') ); ?></div>
		<div class="newer"><?php previous_posts_link(esc_html__('&larr; Newer Posts', 'zminimal') ); ?></div>
		
	</div>

	<?php
	
}

/*** COMMENTS LAYOUT ***/

	function zminimal_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'zminimal'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(esc_html__('Edit', 'zminimal')); ?>
					</span>
					<span class="author"><?php echo (get_comment_author_link()); ?></span>
					<span class="date"><?php printf(esc_html__('%1$s at %2$s', 'zminimal'), get_comment_date(),  get_comment_time()) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'zminimal'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}

// Include the TGM_Plugin_Activation class
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'fooze_register_required_plugins');

function fooze_register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> esc_html__('Vafpress Post Formats UI','zminimal'),
			'slug'     				=> 'vafpress-post-formats-ui-develop',
			'source'   				=> esc_url('https://zthemes.net/wp-content/uploads/2017/01/vafpress-post-formats-ui-develop.zip'),
			'required' 				=> true,
			'version' 				=> '1.5',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		),
    	array(
			'name'     				=> esc_html__('WP Instagram Widget','zminimal'),
			'slug'     				=> 'wp-instagram-widget',
			'required' 				=> false,
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		),
		array(
			'name'     				=> esc_html__('Contact Form 7','zminimal'),
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		),
		array(
			'name'     				=> esc_html__('Regenerate Thumbnails','zminimal'),
			'slug'     				=> 'regenerate-thumbnails',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> ''
		)
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to out
	);
	tgmpa($plugins, $config);
}


/*** THE EXCERPT ***/

function zminimal_custom_excerpt_length( $length ) {

	return 99;

}

add_filter( 'excerpt_length', 'zminimal_custom_excerpt_length', 999 );

function zminimal_new_excerpt_more( $more ) {

	return '&hellip;';

}

add_filter( 'excerpt_more', 'zminimal_new_excerpt_more' );

function zminimal_string_limit_words($string, $word_limit){

	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {

		array_pop($words);

	}
	
	return implode(' ', $words);
	
}