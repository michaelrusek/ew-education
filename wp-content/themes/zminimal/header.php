<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php esc_html(bloginfo( 'charset' )); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if(!get_theme_mod('zminimal_topbar_social_check')) : ?>
			<div id="top-social">
				
				<?php if(get_theme_mod('zminimal_facebook')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_twitter')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_instagram')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_pinterest')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_bloglovin')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_google')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_tumblr')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if(get_theme_mod('zminimal_youtube')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				
			</div>
	<?php endif; ?>

	<nav id="navigation">
	
		<div class="container">

			<div id="logo">

				<?php if(get_theme_mod('zminimal_top_logo')) : ?>

				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod('zminimal_top_logo')); ?>" alt="<?php esc_html(bloginfo( 'name' )); ?>" /></a></h1>

				<?php else : ?>

				<h1 id="top_logo"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo('description'); ?></h2>

				<?php endif; ?>

			</div>

			<div id="navigation-wrapper">
			<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu' ) ); ?>
			</div>
				
			<div class="menu-mobile"></div>
			
		</div>
		
	</nav>