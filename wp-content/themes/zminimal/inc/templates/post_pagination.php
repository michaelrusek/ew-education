<div class="post-pagination">
		
	<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>
	
	<?php if (!empty( $prev_post )) : ?>
	<div class="prev-post">
		<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
		<div class="pagi-text">
			<span><?php esc_html_e('&larr; Previous Post','zminimal'); ?></span>
			<h5><?php echo esc_attr(get_the_title( $prev_post->ID )); ?></h5>
		</div>
		</a>
	</div>
	<?php endif; ?>
	
	<?php if (!empty( $next_post )) : ?>
	<div class="next-post">
		<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
		<div class="pagi-text">
			<span><?php esc_html_e('Next Post &rarr;','zminimal'); ?></span>
			<h5><?php echo esc_attr(get_the_title( $next_post->ID )); ?></h5>
		</div>
		</a>
	</div>
	<?php endif; ?>
		
</div>