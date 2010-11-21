<?php
do_action('concerto_before_article');
// Determine the HTML version we are using
do_action('concerto_custom_page');
do_action('concerto_after_article');
/**
 * Do Custom Pages need a comment form? As of right now, I don't see the need
 */
//do_action('concerto_article_comments');
?>