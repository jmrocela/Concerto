<?php
do_action('concerto_hook_before_article');
// Determine the HTML version we are using
do_action('concerto_hook_custom_page');
do_action('concerto_hook_after_article');
/**
 * Do Custom Pages need a comment form? As of right now, I don't see the need
 */
//do_action('concerto_hook_article_comments');
?>