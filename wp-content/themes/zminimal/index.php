<?php get_header(); ?>
	
	<?php if(get_theme_mod( 'zminimal_featured_slider' ) == true) : ?>

		<?php get_template_part('inc/featured/featured'); ?>

	<?php endif; ?>

	<?php if(get_theme_mod( 'zminimal_promo' ) == true) : ?>

		<div class="container ">

		<?php get_template_part('inc/promo/promo'); ?>

		</div>
		
	<?php endif; ?>

	<div class="container <?php if(get_theme_mod('zminimal_sidebar_home')) : ?>zminimal_sidebar<?php endif; ?>">
	
	<div id="main">
	
	<?php if(get_theme_mod('zminimal_home_layout') == 'grid') : ?>
	
	<?php if(get_theme_mod( 'zminimal_grid_title' )) : ?>

	<div class="zt-grid-title">
		
		<h3><?php echo esc_attr(get_theme_mod( 'zminimal_grid_title' )); ?></h3>

		<span class="sub-title"><?php echo esc_attr(get_theme_mod( 'zminimal_grid_sub' )); ?></span>
		
	</div>
	<?php endif; ?>
	
	<ul class="zt-grid">
	<?php endif; ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
		<?php get_template_part('content', get_theme_mod('zminimal_home_layout')); ?>
			
	<?php endwhile; ?>
	
	<?php if(get_theme_mod('zminimal_home_layout') == 'grid') : ?></ul><?php endif; ?>
	
	<?php zminimal_pagination(); ?>
	
	<?php endif; ?>
	
	</div>
	
<?php if(get_theme_mod('zminimal_sidebar_home')) : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>