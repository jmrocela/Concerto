<?php

class ConcertoComments {
	
	public function __construct() {
		comments_template('/core/html/' . CONCERTO_CONFIG_HTML . '/comments.php', true);
	}

	public function commentlist($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		if ($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback') {
			require CONCERTO_HTML_DIR . 'comment.php';
		}
	}

	public function pinglist($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') {
			require CONCERTO_HTML_DIR . 'pingback.php';
		}
	}
	
	public function commentCount($zero = 'No Responses', $one = 'One Response', $more = '% Responses', $echo = false) {
		global $wpdb;
		$result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments . ' WHERE comment_type = "" AND comment_approved="1" AND comment_post_ID= ' . get_the_ID());
		if ($result == 0) {
			$count = $zero;
		} elseif ($result == 1) {
			$count = $one;
		} elseif($result > 1) {
			$count = str_replace('%', $result, $more);
		}
		if ($echo) {
			echo $count;
		}
		return $result;
	}
	
	public function pingCount($zero = '', $one = '1 Trackback', $more = '% Trackbacks', $echo = false) {
		global $wpdb;
		$result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments . ' WHERE comment_type !=  "" AND comment_approved="1" AND comment_post_ID= ' . get_the_ID());
		if ($result == 0) {
			$count = $zero;
		} elseif ($result == 1) {
			$count = $one;
		} elseif($result > 1) {
			$count = str_replace('%', $result, $more);
		}
		if ($echo) {
			echo $count;
		}
		return $result;
	}
	
	public function respond($args = array(), $post_id = null) {
		global $user_identity, $id;

		if (null === $post_id) {
			$post_id = $id;
		} else {
			$id = $post_id;
		}

		$commenter = wp_get_current_commenter();

		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$fields =  array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
						'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __('Email') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
						'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __('Website') . '</label>' .
						'<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
		);

		$required_text = sprintf(' ' . __('Required fields are marked %s'), '<span class="required">*</span>');
		$defaults = array(
			'fields'               => apply_filters('comment_form_default_fields', $fields),
			'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'must_log_in'          => '<p class="must-log-in">' .  sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
			'logged_in_as'         => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
			'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.') . ($req ? $required_text : '') . '</p>',
			'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s'), ' <code>' . allowed_tags() . '</code>') . '</p>',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => __('Leave a Reply'),
			'title_reply_to'       => __('Leave a Reply to %s'),
			'cancel_reply_link'    => __('Cancel reply'),
			'label_submit'         => __('Post Comment'),
		);

		$args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));
		if (comments_open()) {
			require CONCERTO_HTML_DIR . 'header.php';
		} else {
			do_action('comment_form_comments_closed');
		}
	}
	
	// Placeholder for Feed Comments
	public function feed() {}
	
}

?>