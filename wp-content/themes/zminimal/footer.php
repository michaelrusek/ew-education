	
	<!-- END CONTAINER -->
	</div>
	
	<?php if(!get_theme_mod('zminimal_footer_widget_area')) : ?>
	<div id="widget-area">
	
		<div class="container">

			<?php if ( is_active_sidebar( 'footer-sidebar1' ) ) { ?>
			<div class="footer-widget-wrapper">
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 1') ) ?>
			</div>
			<?php } ?>

			<?php if ( is_active_sidebar( 'footer-sidebar2' ) ) { ?>
			<div class="footer-widget-wrapper">
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 2') ) ?>
			</div>
			<?php } ?>

			<?php if ( is_active_sidebar( 'footer-sidebar3' ) ) { ?>
			<div class="footer-widget-wrapper last">
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3') ) ?>
			</div>
			<?php } ?>
			
		</div>
		
	</div>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('zminimal_footer_logo_area')) : ?>
	<div id="footer-logo">
		
		<div class="container">
			
			<?php if(get_theme_mod('zminimal_footer_logo')) : ?>
				<img src="<?php echo esc_url(get_theme_mod('zminimal_footer_logo')); ?>" alt="<?php esc_html(bloginfo( 'name' )); ?>" />
			<?php endif; ?>
			
			<?php if(get_theme_mod('zminimal_footer_text')) : ?>
				<p><?php echo wp_kses_post(get_theme_mod('zminimal_footer_text',esc_html__('Crafted with love by ZThemes', 'zminimal' ))); ?></p>
			<?php endif; ?>
			
		</div>
		
	</div>
	<?php endif; ?>
	
	<footer id="footer-copyright">
		
		<div class="container">
		
			<?php if(get_theme_mod('zminimal_footer_copyright')) : ?>
				<p><?php echo wp_kses_post(get_theme_mod('zminimal_footer_copyright', esc_html__('Keep it simple, stupid.', 'zminimal' )));  ?></p>
			<?php endif; ?>
			<a href="#" class="to-top"><?php esc_html_e( 'Go to top', 'zminimal' ); ?> <i class="fa fa-angle-up"></i></a>
			
		</div>
		
	</footer>
	
	<?php wp_footer(); ?>
	
</body>

</html>