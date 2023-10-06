<?php get_header(); ?>
	
	<div class="container">
	
		<div class="error-404">

			<h1><?php esc_html_e('404','zminimal') ?></h1>

				<p><?php esc_html_e( 'You may have mis-typed the URL. Or the page has been removed, had its name changed, or is temporarily unavailable. Perhaps searching can help.', 'zminimal' ); ?></p>

			<?php get_search_form(); ?>
			
		</div>
		
<?php get_footer(); ?>