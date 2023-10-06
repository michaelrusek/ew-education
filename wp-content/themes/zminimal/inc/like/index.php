<?php
class zminimal_like_post {

	 function __construct(){

        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_ajax_zt-like-post', array($this, 'ajax'));
		add_action('wp_ajax_nopriv_zt-like-post', array($this, 'ajax'));
	}

	function enqueue_scripts() {

		wp_enqueue_script( 'zt-like-post', get_template_directory_uri() . '/inc/like/js/zt-like-post.js', array('jquery'), false, true);
		wp_localize_script( 'zt-like-post', 'ZTLike', array(
			'ajaxurl' => esc_url(admin_url('admin-ajax.php'))
		));
	}

	function ajax($post_id) {
		//update
		if( isset($_POST['likes_id']) ) {
			$post_id = str_replace('zt-like-post-', '', $_POST['likes_id']);
			echo balancetags($this->like_post($post_id, 'update'));
		}
		//get
		else {
			$post_id = str_replace('zt-like-post-', '', $_POST['likes_id']);
			echo balancetags($this->like_post($post_id, 'get'));
		}
		exit;
	}

	function like_post($post_id, $action = 'get'){
		if(!is_numeric($post_id)) return;
		switch($action) {
			case 'get':
				$love_count = get_post_meta($post_id, '_zminimal_like_post', true);
				if( !$love_count ){
					$love_count = 0;
					add_post_meta($post_id, '_zminimal_like_post', $love_count, true);
				}
				return '<span class="zt-like-post-count">'. $love_count .'</span>';
				break;

			case 'update':
				$love_count = get_post_meta($post_id, '_zminimal_like_post', true);
				if( isset($_COOKIE['zminimal_like_post_'. $post_id]) ) return $love_count;

				$love_count++;
				update_post_meta($post_id, '_zminimal_like_post', $love_count);
				setcookie('zminimal_like_post_'. $post_id, $post_id, time()*20, '/');

				return '<span class="zt-like-post-count">'. $love_count .'</span>';
				break;
		}
	}

	function add_love() {
		global $post;
		$output = $this->like_post($post->ID);
  		$class = 'zt-like-post';
  		$title = esc_html__('Like this', 'zminimal');
		if( isset($_COOKIE['zminimal_like_post_'. $post->ID]) ){
			$class = 'zt-like-post liked';
			$title = esc_html__('You already liked this!', 'zminimal');
		}
		return '<span class="zthemes-love"><a href="javascript:void(0)" class="'. $class .'" id="zt-like-post-'. $post->ID .'" title="'. esc_attr($title) .'"><i class="fa fa-heart-o"></i> '.$output.'</a></span>';
	}
}

global $zminimal_like_post;
$zminimal_like_post = new zminimal_like_post();