<?php get_header(); ?>
	
	<?php if (have_posts()) : ?>
	
	<div class="archive-box">

		<?php if ( is_category() ) : ?>
        <span><?php esc_html_e('Browsing Category', 'zminimal'); ?>: </span>
		<h1><?php printf( esc_html__('%s', 'zminimal'), single_cat_title('', false) ); ?></h1>

        <?php elseif ( is_tag() ) : ?>
        <span><?php esc_html_e('Browsing Tag', 'zminimal'); ?>: </span>
		<h1><?php printf(esc_html__('%s', 'zminimal'), single_tag_title('', false)); ?></h1>

        <?php elseif ( is_author() ) : ?>
        <span><?php esc_html_e('All Posts By', 'zminimal'); ?>: </span>
		<h1><?php the_post(); echo get_the_author(); ?></h1>
        <?php else : ?>

			<?php if ( is_day() ) : ?>
			<span><?php esc_html_e('Daily Archives', 'zminimal'); ?>: </span>
	        <h1><?php echo get_the_date(); ?></h1>
	                    
	        <?php elseif ( is_month() ) : ?>
	        <span><?php esc_html_e('Monthly Archives', 'zminimal'); ?>: </span>
	        <h1><?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'zminimal' ) ); ?></h1>
	                    
	        <?php elseif ( is_year() ) : ?>
	        <span><?php esc_html_e('Yearly Archives', 'zminimal'); ?>: </span>
			<h1><?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'zminimal' ) ); ?></h1>
						
	        <?php else : ?>
	        <h1><?php esc_html_e('Archives', 'zminimal'); ?>: </h1>
			<?php endif; ?>

        <?php endif; ?>
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