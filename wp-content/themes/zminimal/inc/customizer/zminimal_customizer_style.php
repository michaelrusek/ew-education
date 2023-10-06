<?php
// Customizer - Add CSS
function zminimal_customizer_css() {
    ?>
    <style type="text/css">
		#navigation, .slicknav_menu { background:<?php echo get_theme_mod( 'zminimal_topbar_bg' ); ?>; }
		.menu li a, .slicknav_nav a { color:<?php echo get_theme_mod( 'zminimal_topbar_nav_color' ); ?>; }
		.menu li a:hover {  color:<?php echo get_theme_mod( 'zminimal_topbar_nav_color_active' ); ?>; }
		.slicknav_nav a:hover { color:<?php echo get_theme_mod( 'zminimal_topbar_nav_color_active' ); ?>; background:none; }
		.menu .sub-menu, .menu .children { background: <?php echo get_theme_mod( 'zminimal_drop_bg' ); ?>; }
		ul.menu ul a, .menu ul ul a {color:<?php echo get_theme_mod( 'zminimal_drop_text_color' ); ?>; }
		ul.menu ul a:hover, .menu ul ul a:hover { color: <?php echo get_theme_mod( 'zminimal_drop_text_hover_color' ); ?>; background:<?php echo get_theme_mod( 'zminimal_drop_text_hover_bg' ); ?>; }
		#top-social a i { color:<?php echo get_theme_mod( 'zminimal_topbar_social_color' ); ?>; }
		#top-social a:hover i { color:<?php echo get_theme_mod( 'zminimal_topbar_social_color_hover' ); ?> }
		#top-search a { background:<?php echo get_theme_mod( 'zminimal_topbar_search_bg' ); ?> }
		#top-search a { color:<?php echo get_theme_mod( 'zminimal_topbar_search_magnify' ); ?> }
		#top-search a:hover { background:<?php echo get_theme_mod( 'zminimal_topbar_search_bg_hover' ); ?>; }
		#top-search a:hover { color:<?php echo get_theme_mod( 'zminimal_topbar_search_magnify_hover' ); ?>; }
		
		a, #footer-logo p i, .post-header .cat a { color:<?php echo get_theme_mod( 'zminimal_color_accent' ); ?>; }
		.zt-like-post-count, .grid-meta span.post-likes .zt-like-post-count {color:<?php echo get_theme_mod( 'zminimal_color_accent' ); ?>; opacity:0.8;}
		.post-header .cat a{border-color:<?php echo get_theme_mod( 'zminimal_color_accent' ); ?>;}
		.share-box:hover {background-color: <?php echo get_theme_mod( 'zminimal_color_accent' ); ?>;}
		.post-entry blockquote p { border-left:3px solid <?php echo get_theme_mod( 'zminimal_color_accent' ); ?>; }
		
		<?php if(get_theme_mod( 'zminimal_post_title_lowercase' )) : ?>

		.post-header h1 a, .post-header h2 a, .post-header h1 {
			text-transform:none;
			letter-spacing:1px;
		}
		
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'zminimal_custom_css' )) : ?>

		<?php echo get_theme_mod( 'zminimal_custom_css' ); ?>

		<?php endif; ?>
		
    </style>
    <?php
}
add_action( 'wp_head', 'zminimal_customizer_css' );

?>