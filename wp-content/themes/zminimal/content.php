<?php global $zminimal_like_post,$post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="post-header">
		
		<?php if(!get_theme_mod('zminimal_post_cat')) : ?>
			<span class="cat"><?php the_category(' '); ?></span>
		<?php endif; ?>
		
		<?php if(is_single()) : ?>
			<h1><?php esc_attr(the_title()); ?></h1>
		<?php else : ?>
			<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h2>
		<?php endif; ?>
		
		<?php if(!get_theme_mod('zminimal_post_date')) : ?>
			<span class="date"><?php the_time( get_option('date_format') ); ?></span>
		<?php endif; ?>
		
	</div>
	
	<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		
		<?php if($images) : ?>
		<div class="post-image">
		<ul class="bxslider">
		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'zminimal-full-thumb' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> /></li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php endif; ?>
	
	<?php elseif(has_post_format('video')) : ?>
	
		<div class="post-image">
			<?php $zminimal_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if(wp_oembed_get( $zminimal_video )) : ?>
				<?php echo wp_oembed_get($zminimal_video); ?>
			<?php else : ?>
				<?php echo wp_kses_post($zminimal_video); ?>
			<?php endif; ?>
		</div>
	
	<?php elseif(has_post_format('audio')) : ?>
	
		<div class="post-image audio">
			<?php $zminimal_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if(wp_oembed_get( $zminimal_audio )) : ?>
				<?php echo wp_oembed_get($zminimal_audio); ?>
			<?php else : ?>
				<?php echo wp_kses_post($zminimal_audio); ?>
			<?php endif; ?>
		</div>
	
	<?php else : ?>
		
		<?php if(has_post_thumbnail()) : ?>
		<?php if(!get_theme_mod('zminimal_post_thumb')) : ?>
		<div class="post-image">
			<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('zminimal-full-thumb'); ?></a>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		
	<?php endif; ?>
	
	<div class="post-entry">
		<?php if(is_single()) : ?>
		
			<?php the_content(); ?>
			
		<?php else : ?>

		<p><?php echo zminimal_string_limit_words(get_the_excerpt(), 80); ?>&hellip;</p>
		<p class="btn-more"><a href="<?php echo esc_url(get_permalink()); ?>" class="more-link"><span class="more-button"><?php esc_html_e( 'Continue Reading', 'zminimal' ); ?></span></a>

		<?php endif; ?>
		
		<?php wp_link_pages(); ?>
		
		<?php if(!get_theme_mod('zminimal_post_tags')) : ?>
		<?php if(is_single()) : ?>
			<div class="post-tags">
				<?php the_tags("",""); ?>
			</div>
		<?php endif; ?>
		<?php endif; ?>
		
	</div>
	
	<div class="post-metas">
	<div class="post-likes">
        <?php echo wp_kses_post($zminimal_like_post->add_love()); ?>
	</div>
	<div class="post-share">
		
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(the_permalink()); ?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
		<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20%20-%20<?php esc_url(the_permalink()); ?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
		<?php $pin_image = esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>
		<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink()); ?>&media=<?php echo esc_url($pin_image); ?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
		<a target="_blank" href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
		<?php esc_url(comments_popup_link( '<span class="share-box"><i class="fa fa-comment-o"></i></span>', '<span class="share-box"><i class="fa fa-comment-o"></i></span>', '<span class="share-box"><i class="fa fa-comment-o"></i></span>', '', '')); ?>
		
	</div>
	</div>
	
	<?php if(!get_theme_mod('zminimal_post_nav')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/post_pagination'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('zminimal_post_author')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/about_author'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('zminimal_post_related')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/related_posts'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php comments_template( '', true );  ?>
	
</article>