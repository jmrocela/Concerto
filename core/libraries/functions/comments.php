<?php

class ConcertoComments {
	
	public function __construct() {
		comments_template('/core/html/' . CONCERTO_CONFIG_HTML . '/comments.php', true);
	}

	public function commentlist($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		if ($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback') {
			require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'comment.php';
		}
	}

	public function pinglist($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') {
			require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'pingback.php';
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
	
	// Placeholder for Feed Comments
	public function feed() {}
	
}

?>