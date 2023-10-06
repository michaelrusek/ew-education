<?php 

$orig_post = $post;

global $post;

$categories = get_the_category($post->ID);

if ($categories) {

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	
	$args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 3, // Number of related posts that will be shown.
		'ignore_sticky_posts' => 1,
		'orderby' => 'date'
	);

	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="post-related"><div class="post-box"><h4 class="post-box-title"><?php esc_html_e('You Might Also Like', 'zminimal'); ?></h4></div>
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
				<div class="item-related">

					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
						<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('zminimal-thumb'); ?></a>
					<?php else : ?>
						<a href="<?php echo esc_url(get_permalink()); ?>"><img width="350" height="350" src="<?php echo esc_url(get_template_directory_uri() . '/img/350.jpg'); ?>" class="attachment-zminimal-thumb size-zminimal-thumb wp-post-image" alt=""></a>
					<?php endif; ?>

					
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
						</h2>
					</header>
				</div>
		<?php
		}
		echo '</div>';
	}
}

$post = $orig_post;

wp_reset_query();

?>