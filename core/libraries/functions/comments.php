<?php

class ConcertoComments {
	
	public function __construct() {
		comments_template('/core/html/' . CONCERTO_CONFIG_HTML . '/comments.php', true);
	}

	public function commentlist($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) {
			case '':
				require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'comment.php';
			break;
			case 'pingback':
			case 'trackback':
				require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'pingback.php';
			break;
		}
	}
	
	// Placeholder for Feed Comments
	public function feed() {}
	
}

?>