<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="post-header">
		
		<h1><?php esc_attr(the_title()); ?></h1>
		
	</div>
	
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>

	<div class="post-image">

		<a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('zminimal-full-thumb'); ?></a>

	</div>

	<?php endif; ?>
	
	<div class="post-entry">
	
		<?php the_content(); ?>

		<?php wp_link_pages(); ?>
	
	</div>
	
	<?php if(!get_theme_mod('zminimal_page_share')) : ?>

	<div class="post-share">
		
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(the_permalink()); ?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
		<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20%20-%20<?php esc_url(the_permalink()); ?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
		<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
		<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink()); ?>&media=<?php echo esc_url($pin_image); ?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
		<a target="_blank" href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
		<?php comments_popup_link( '<span class="share-box"><i class="fa fa-comment-o"></i></span>', '<span class="share-box"><i class="fa fa-comment-o"></i></span>', '<span class="share-box"><i class="fa fa-comment-o"></i></span>', '', ''); ?>
		
	</div>

	<?php endif; ?>
	
	<?php if(!get_theme_mod('zminimal_page_comments')) : ?>

		<?php comments_template( '', true );  ?>

	<?php endif; ?>
	
</article>