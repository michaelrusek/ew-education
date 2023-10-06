<div class="post-comments" id="comments">
	
	<?php if ( comments_open() ) : ?>

	<div class="post-box"><h4 class="post-box-title">

	<?php comments_number(esc_html__('No Comments','zminimal'), esc_html__('1 Comment','zminimal'), '% ' . esc_html__('Comments','zminimal') ); ?>

	</h4></div>

	<?php endif; ?>

	<div class='comments'>
	
	<?php
			wp_list_comments(array(
				'avatar_size'	=> 50,
				'max_depth'		=> 5,
				'style'			=> 'ul',
				'callback'		=> 'zminimal_comments',
				'type'			=> 'all'
			));
	?>

	</div>

	<div id='comments_pagination'>

	<?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>

	</div>

	<?php

		$custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

		comment_form(array(
			'comment_field'			=> $custom_comment_field,
			'comment_notes_after'	=> '',
			'logged_in_as' 			=> '',
			'comment_notes_before' 	=> '',
			'title_reply'			=> esc_html__('Leave a Reply', 'zminimal'),
			'cancel_reply_link'		=> esc_html__('Cancel Reply', 'zminimal'),
			'label_submit'			=> esc_html__('Post Comment', 'zminimal')
		));

	?>

</div>