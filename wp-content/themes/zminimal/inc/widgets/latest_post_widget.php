<?php

/**
 * Latest Posts widget class
 */

class zminimal_widget_latest_posts extends WP_Widget {

	function __construct() {

		$widget_ops = array( 'classname' => 'zminimal_latest_posts_widget', 'description' => esc_html__('A widget that displays your latest posts from all categories or a certain', 'zminimal') );

		parent::__construct( 'zminimal_latest_posts_widget', esc_html__('ZTHEMES: Latest Posts', 'zminimal'), $widget_ops );

	}

	function widget( $args, $instance ) {

		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		$categories = $instance['categories'];

		$number = $instance['number'];

		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);

		$loop = new WP_Query($query);

		if ( $loop->have_posts() ) :

    		echo balancetags($before_widget);

    		if ( $title ) {

    		    echo (balancetags($before_title) . sanitize_text_field($title) . balancetags($after_title));

    		}

?>

			<ul class="latest-post">

			<?php  while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<li>

					<?php if ( has_post_thumbnail() ) : ?>

					<div class="post-image">

						<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark">
						
							<?php the_post_thumbnail('zminimal-thumb', array('class' => 'side-item-thumb')); ?>

                        </a>

					</div>

					<?php endif; ?>

					<div class="post-item-text">

						<span class="post-cate"><?php the_category( ' ' ); ?></span>
						
						<h4><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php esc_attr(the_title()); ?></a></h4>

					</div>

				</li>

			<?php endwhile; ?>

            </ul>

<?php

        wp_reset_postdata();

        echo balancetags($after_widget);

        endif;
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['categories'] = $new_instance['categories'];

		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}

	function form( $instance ) {

		$defaults = array( 'title' => esc_html__('Latest Posts', 'zminimal'), 'number' => 5, 'categories' => '');

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo sanitize_text_field($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'zminimal'); ?></label>

			<input  type="text" class="widefat" id="<?php echo sanitize_text_field($this->get_field_id( 'title' )); ?>" name="<?php echo sanitize_text_field($this->get_field_name( 'title' )); ?>" value="<?php echo sanitize_text_field($instance['title']); ?>"  />
		
		</p>

		<p>
    		<label for="<?php echo sanitize_text_field($this->get_field_id('categories')); ?>">Filter by Category:</label>

    		<select id="<?php echo sanitize_text_field($this->get_field_id('categories')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('categories')); ?>" class="widefat categories" style="width:100%;">

    			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>

    			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>

    			<?php foreach($categories as $category) { ?>

    			<option value='<?php echo esc_attr($category->term_id); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_attr($category->cat_name); ?></option>
    			
    			<?php } ?>

    		</select>

		</p>

		<p>
			<label for="<?php echo sanitize_text_field($this->get_field_id( 'number' )); ?>"><?php esc_html_e('Number of posts to show:', 'zminimal'); ?></label>

			<input  type="text" class="widefat" id="<?php echo sanitize_text_field($this->get_field_id( 'number' )); ?>" name="<?php echo sanitize_text_field($this->get_field_name( 'number' )); ?>" value="<?php echo sanitize_text_field($instance['number']); ?>" size="3" />

		</p>

	<?php

	}
}

function zminimal_latest_posts_widget_init() {

	register_widget( 'zminimal_widget_latest_posts' );

}

add_action( 'widgets_init', 'zminimal_latest_posts_widget_init' );

?>