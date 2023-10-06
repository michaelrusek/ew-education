<?php get_header(); ?>
	
	<?php if (have_posts()) : ?>
	
	<div class="archive-box">
		
		<span><?php esc_html_e( 'Browsing Tag', 'zminimal' ); ?></span>
		<h1><?php printf( esc_html__( '%s', 'zminimal' ), single_tag_title( '', false ) ); ?></h1>
		
	</div>
	
	<div class="container <?php if(get_theme_mod( 'zminimal_sidebar_archive' )) : ?>zminimal_sidebar<?php endif; ?>">
	
	<div id="main">
	
		<?php if(get_theme_mod( 'zminimal_archive_layout' ) == 'grid') : ?><ul class="zt-grid"><?php endif; ?>
	
		<?php while (have_posts()) : the_post(); ?>
							
			<?php get_template_part('content', get_theme_mod('zminimal_archive_layout')); ?>
				
		<?php endwhile; ?>
		
		<?php if(get_theme_mod( 'zminimal_archive_layout' ) == 'grid') : ?></ul><?php endif; ?>
		
		<?php zminimal_pagination(); ?>
		
		<?php endif; ?>
		
	</div>

<?php if(get_theme_mod( 'zminimal_sidebar_archive' )) : ?><?php get_sidebar(); ?><?php endif; ?>

<?php get_footer(); ?>