<div class="promo-area">
	
	<?php if(get_theme_mod('zminimal_promo1_title') || get_theme_mod('zminimal_promo1_image')) : ?>
	<div class="promo-item" style="background-image:url(<?php if(get_theme_mod('zminimal_promo1_image')) { echo esc_url(get_theme_mod('zminimal_promo1_image')); } else { echo get_template_directory_uri() . '/img/slider-default.jpg'; } ?>)">
		<?php if(get_theme_mod('zminimal_promo1_url')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_promo1_url')); ?>" class="promo-link"></a><?php endif; ?>
		<div class="promo-overlay">
			<?php if(get_theme_mod('zminimal_promo1_title')) : ?>
				<h4><?php echo esc_attr(get_theme_mod('zminimal_promo1_title')); ?></h4>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if(get_theme_mod('zminimal_promo2_title') || get_theme_mod('zminimal_promo2_image')) : ?>
	<div class="promo-item" style="background-image:url(<?php if(get_theme_mod('zminimal_promo2_image')) { echo esc_url(get_theme_mod('zminimal_promo2_image')); } else { echo get_template_directory_uri() . '/img/slider-default.jpg'; } ?>)">
		<?php if(get_theme_mod('zminimal_promo2_url')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_promo2_url')); ?>" class="promo-link"></a><?php endif; ?>
		<div class="promo-overlay">
			<?php if(get_theme_mod('zminimal_promo2_title')) : ?>
				<h4><?php echo esc_attr(get_theme_mod('zminimal_promo2_title')); ?></h4>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if(get_theme_mod('zminimal_promo3_title') || get_theme_mod('zminimal_promo3_image')) : ?>
	<div class="promo-item" style="background-image:url(<?php if(get_theme_mod('zminimal_promo3_image')) { echo esc_url(get_theme_mod('zminimal_promo3_image')); } else { echo get_template_directory_uri() . '/img/slider-default.jpg'; } ?>)">
		<?php if(get_theme_mod('zminimal_promo3_url')) : ?><a href="<?php echo esc_url(get_theme_mod('zminimal_promo3_url')); ?>" class="promo-link"></a><?php endif; ?>
		<div class="promo-overlay">
			<?php if(get_theme_mod('zminimal_promo3_title')) : ?>
				<h4><?php echo esc_attr(get_theme_mod('zminimal_promo3_title')); ?></h4>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
</div>