<?php
/**
 * Handles all server side logic for the ld-infobar Gutenberg Block. This block is functionally the same
 * as the ld_infobar shortcode used within LearnDash.
 *
 * @package LearnDash
 * @since 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ( class_exists( 'LearnDash_Gutenberg_Block' ) ) && ( ! class_exists( 'LearnDash_Gutenberg_Block_Infobar' ) ) ) {
	/**
	 * Class for handling LearnDash Infobar Block
	 */
	class LearnDash_Gutenberg_Block_Infobar extends LearnDash_Gutenberg_Block {

		/**
		 * Object constructor
		 */
		public function __construct() {
			$this->shortcode_slug   = 'ld_infobar';
			$this->block_slug       = 'ld-infobar';
			$this->block_attributes = array(
				'display_type'      => array(
					'type' => 'string',
				),
				'course_id'         => array(
					'type' => 'string',
				),
				'post_id'           => array(
					'type' => 'string',
				),
				'group_id'          => array(
					'type' => 'string',
				),
				'user_id'           => array(
					'type' => 'string',
				),
				'preview_show'      => array(
					'type' => 'boolean',
				),
				'preview_user_id'   => array(
					'type' => 'string',
				),
				'editing_post_meta' => array(
					'type' => 'object',
				),
			);
			$this->self_closing     = true;

			$this->init();
		}

		/**
		 * Render Block
		 *
		 * This function is called per the register_block_type() function above. This function will output
		 * the block rendered content. In the case of this function the rendered output will be for the
		 * [ld_infobar] shortcode.
		 *
		 * @since 2.5.9
		 *
		 * @param array         $block_attributes The block attributes.
		 * @param string        $block_content    The block content.
		 * @param WP_Block|null $block            The block object.
		 *
		 * @return string $block_content The block content.
		 */
		public function render_block( $block_attributes = array(), $block_content = '', WP_Block $block = null ) {
			$block_attributes = $this->preprocess_block_attributes( $block_attributes );

			if ( $this->block_attributes_is_editing_post( $block_attributes ) ) {
				/** This block does not support the Legacy template. */
				if ( 'legacy' === LearnDash_Theme_Register::get_active_theme_key() ) {
					return '';
				}

				/**
				 * We are only attempting to validate the block settings to display any errors to the user editing the post.
				 */
				$block_attributes['course_id'] = $this->block_attributes_get_post_id( $block_attributes, 'course' );
				$block_attributes['post_id']   = $this->block_attributes_get_post_id( $block_attributes, 'post' );
				$block_attributes['group_id']  = $this->block_attributes_get_post_id( $block_attributes, 'group' );

				if ( ( empty( $block_attributes['course_id'] ) ) && ( empty( $block_attributes['post_id'] ) ) && ( empty( $block_attributes['group_id'] ) ) ) {
					$edit_post_type = $this->block_attributes_get_editing_post_type( $block_attributes );
					$edit_post_id   = $this->block_attributes_get_editing_post_id( $block_attributes );

					if ( learndash_get_post_type_slug( 'group' ) === $edit_post_type ) {
						if ( ! empty( $edit_post_id ) ) {
							$block_attributes['group_id'] = $edit_post_id;
						}
					}

					if ( in_array( $edit_post_type, learndash_get_post_types( 'course' ), true ) ) {
						if ( ! empty( $edit_post_id ) ) {
							$block_attributes['post_id'] = $edit_post_id;
						}

						$course_id = $this->block_attributes_get_editing_course_id( $block_attributes );
						if ( ! empty( $course_id ) ) {
							$block_attributes['course_id'] = $course_id;
						} elseif ( ! empty( $edit_post_id ) ) {
							$course_id = learndash_get_course_id( $edit_post_id );
							if ( ! empty( $course_id ) ) {
								$block_attributes['course_id'] = $course_id;
							}
						}
					}
				}

				if ( ( empty( $block_attributes['course_id'] ) ) && ( empty( $block_attributes['group_id'] ) ) ) {
					return $this->render_block_wrap(
						'<span class="learndash-block-error-message">' . sprintf(
						// translators: placeholder: Course, Group.
							_x( '%1$s ID or %2$s ID is required.', 'placeholder: Course, Group', 'learndash' ),
							LearnDash_Custom_Label::get_label( 'course' ),
							LearnDash_Custom_Label::get_label( 'group' )
						) . '</span>'
					);
				}

				if ( ! empty( $block_attributes['course_id'] ) ) {
					$course_post = get_post( $block_attributes['course_id'] );
					if ( ( ! is_a( $course_post, 'WP_Post' ) ) || ( learndash_get_post_type_slug( 'course' ) !== $course_post->post_type ) ) {
						return $this->render_block_wrap(
							'<span class="learndash-block-error-message">' . sprintf(
							// translators: placeholder: Course.
								_x( 'Invalid %1$s ID.', 'placeholder: Course', 'learndash' ),
								LearnDash_Custom_Label::get_label( 'course' )
							) . '</span>'
						);
					}
				}

				if ( ! empty( $block_attributes['group_id'] ) ) {
					$group_post = get_post( $block_attributes['group_id'] );
					if ( ( ! is_a( $group_post, 'WP_Post' ) ) || ( learndash_get_post_type_slug( 'group' ) !== $group_post->post_type ) ) {
						return $this->render_block_wrap(
							'<span class="learndash-block-error-message">' . sprintf(
							// translators: placeholder: Group.
								_x( 'Invalid %1$s ID.', 'placeholder: Group', 'learndash' ),
								LearnDash_Custom_Label::get_label( 'group' )
							) . '</span>'
						);
					}
				}

				if ( ! empty( $block_attributes['post_id'] ) ) {
					$post_post = get_post( $block_attributes['post_id'] );
					if ( ( ! is_a( $post_post, 'WP_Post' ) ) || ( ! in_array( $post_post->post_type, learndash_get_post_types( 'course' ), true ) ) ) {
						return $this->render_block_wrap(
							'<span class="learndash-block-error-message">' . esc_html__( 'Invalid Step ID.', 'learndash' ) . '</span>'
						);
					}
				}
			}

			/** This filter is documented in includes/gutenberg/blocks/ld-course-list/index.php */
			$block_attributes = apply_filters( 'learndash_block_markers_shortcode_atts', $block_attributes, $this->shortcode_slug, $this->block_slug, '' );

			$shortcode_out = '';

			$shortcode_str = $this->build_block_shortcode( $block_attributes, $block_content );

			if ( ! empty( $shortcode_str ) ) {
				$shortcode_out = do_shortcode( $shortcode_str );
			}

			if ( ! empty( $shortcode_out ) ) {
				if ( $this->block_attributes_is_editing_post( $block_attributes ) ) {
					$shortcode_out = $this->render_block_wrap( $shortcode_out );
				}
			}

			return $shortcode_out;
		}

		// End of functions.
	}
}
new LearnDash_Gutenberg_Block_Infobar();
