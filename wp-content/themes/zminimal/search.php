<?php get_header(); ?>
	
	<?php if (have_posts()) : ?>
	
	<div class="archive-box">
		
		<span><?php esc_html_e( 'Search results for', 'zminimal' ); ?></span>
		<h1><?php printf( esc_html__( '%s', 'zminimal' ), get_search_query() ); ?></h1>
		
	</div>
	
	<div class="container">
	
		<?php while (have_posts()) : the_post(); ?>
							
			<?php get_template_part('content'); ?>
				
		<?php endwhile; ?>
		
			<?php zminimal_pagination(); ?>
		
	<?php else : ?>
		
		<div class="archive-box">
	
			<span><?php esc_html_e( 'Search results for', 'zminimal' ); ?></span>
			<h1><?php printf( esc_html__( '%s', 'zminimal' ), get_search_query() ); ?></h1>
			
		</div>
		
		<div class="container">
		
			<p class="nothing"><?php esc_html_e( 'Sorry, no posts were found. Try searching for something else.', 'zminimal' ); ?></p>
		
	<?php endif; ?>
	
<?php get_footer(); ?>