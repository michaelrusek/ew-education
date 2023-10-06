<?php global $zminimal_like_post,$post; ?>

<li>
	<article id="post-<?php the_ID(); ?>" class="item">
		
		<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('zminimal-thumb'); ?></a>
		
		<div class="item-content">

			<span class="cat"><?php the_category(', '); ?></span>

			<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h2>

			<p><?php echo zminimal_string_limit_words(get_the_excerpt(), 30); ?>&hellip;</p>

		</div>

		<div class="grid-meta">

			<span class="post-likes">

        		<?php echo wp_kses_post($zminimal_like_post->add_love()); ?>

			</span>

			<span class="date"><?php the_time( get_option('date_format') ); ?></span>

		</div>
		
	</article>
	
</li>