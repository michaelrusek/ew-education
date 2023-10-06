<?php

/**
 * Social widget class
 */

class zminimal_social_widget extends WP_Widget {

	public function __construct() {

		$widget_ops = array('classname' => 'widget_social', 'description' => esc_html__('A widget displaying social icons.', 'zminimal'));

		parent::__construct('zminimal_social_widget', esc_html__('ZTHEMES: Social Icons', 'zminimal'), $widget_ops);

	}

	public function widget( $args, $instance ) {

		$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Follow Me', 'zminimal') : $instance['title'], $instance, $this->id_base);

        $fb_link = empty($instance['fb_link']) ? '' : $instance['fb_link'];

        $tw_link = empty($instance['tw_link']) ? '' : $instance['tw_link'];

        $it_link = empty($instance['it_link']) ? '' : $instance['it_link'];

        $gl_link = empty($instance['gl_link']) ? '' : $instance['gl_link'];

        $pt_link = empty($instance['pt_link']) ? '' : $instance['pt_link'];

        $yt_link = empty($instance['yt_link']) ? '' : $instance['yt_link'];
        
		echo balancetags($args['before_widget']);
        
        if ( $title ) {

            echo balancetags($args['before_title']) . sanitize_text_field($title) . balancetags($args['after_title']);

        }

    ?>
        <div class="social-widget widget-content">
            <?php if ($fb_link) : ?>
            <a href="<?php echo esc_url( $fb_link ); ?>" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
            <?php endif; ?>
            
            <?php if ($tw_link) : ?>
            <a href="<?php echo esc_url( $tw_link ); ?>" target="_blank">
                <i class="icon fa fa-twitter"></i>
            </a>
            <?php endif; ?>
            
            <?php if ($it_link) : ?>
            <a href="<?php echo esc_url( $it_link ); ?>" target="_blank">
                <i class="icon fa fa-instagram"></i>
            </a>
            <?php endif; ?>
            
            <?php if ($gl_link) : ?>
            <a href="<?php echo esc_url( $gl_link ); ?>" target="_blank">
                <i class="icon fa fa-google-plus"></i>
            </a>
            <?php endif; ?>
            
            <?php if ($pt_link) : ?>
            <a href="<?php echo esc_url( $pt_link ); ?>" target="_blank">
                <i class="icon fa fa-pinterest"></i>
            </a>
            <?php endif; ?>
            
            <?php if ($yt_link) : ?>
            <a href="<?php echo esc_url( $yt_link ); ?>" target="_blank">
                <i class="icon fa fa-youtube"></i>
            </a>
            <?php endif; ?>
        </div>

    <?php

        echo balancetags($args['after_widget']);

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']   = strip_tags($new_instance['title']);

        $instance['fb_link'] = strip_tags($new_instance['fb_link']);

        $instance['tw_link'] = strip_tags($new_instance['tw_link']);

        $instance['it_link'] = strip_tags($new_instance['it_link']);

        $instance['gl_link'] = strip_tags($new_instance['gl_link']);

        $instance['pt_link'] = strip_tags($new_instance['pt_link']);

        $instance['yt_link'] = strip_tags($new_instance['yt_link']);

		return $instance;

	}

	public function form( $instance ) {
		//Defaults
		
        $default = array(
            'title' => 'Follow Me',
            'fb_link' => '#',
            'tw_link' => '#',
            'it_link' => '#',
            'gl_link' => '#',
            'pt_link' => '#',
            'yt_link' => '#'
        );
        
		$instance           = wp_parse_args((array)$instance, $default);
        $title              = $instance['title'];
        $fb_link            = $instance['fb_link'];
        $tw_link            = $instance['tw_link'];
        $it_link            = $instance['it_link'];
        $gl_link            = $instance['gl_link'];
        $pt_link            = $instance['pt_link'];
        $yt_link            = $instance['yt_link']; ?>

		<p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('title')); ?>">Title:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('title')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p>

        <p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('fb_link')); ?>">Facebook URL:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('fb_link')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('fb_link')); ?>" type="text" value="<?php echo esc_url($fb_link); ?>" /></p>
		<p>

        <p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('tw_link')); ?>">Twitter URL:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('tw_link')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('tw_link')); ?>" type="text" value="<?php echo esc_url($tw_link); ?>" /></p>
		<p>

        <p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('it_link')); ?>">Instagram URL:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('it_link')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('it_link')); ?>" type="text" value="<?php echo esc_url($it_link); ?>" /></p>
		<p>

        <p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('gl_link')); ?>">Google Plus URL:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('gl_link')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('gl_link')); ?>" type="text" value="<?php echo esc_url($gl_link); ?>" /></p>
		<p>

        <p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('pt_link')); ?>">Pinterest URL:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('pt_link')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('pt_link')); ?>" type="text" value="<?php echo esc_url($pt_link); ?>" /></p>
		<p>

        <p>
			<label for="<?php echo sanitize_text_field($this->get_field_id('yt_link')); ?>">Youtube URL:</label>
			<input class="widefat" id="<?php echo sanitize_text_field($this->get_field_id('yt_link')); ?>" name="<?php echo sanitize_text_field($this->get_field_name('yt_link')); ?>" type="text" value="<?php echo esc_url($yt_link); ?>" /></p>
		<p> <?php
	}
}

function zminimal_social_widget_init() {

    register_widget('zminimal_social_widget');

}

add_action('widgets_init', 'zminimal_social_widget_init');

?>