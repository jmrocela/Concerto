<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

// Actions
add_action('concerto_head', 'concerto_head');
add_action('concerto_title', 'concerto_title');
add_action('concerto_head', 'concerto_syndication');
add_action('concerto_head', 'concerto_comment_syndication');
add_action('concerto_head', 'wp_head');

add_action('concerto_start', 'concerto_default_start');
add_action('concerto_before_header', 'concerto_default_before_header');
add_action('concerto_header', 'concerto_default_header');
add_action('concerto_after_header', 'concerto_default_after_header');
add_action('concerto_after_header', 'concerto_access');

add_action('concerto_branding', 'concerto_default_branding_site_title');
add_action('concerto_branding', 'concerto_default_branding_site_description');
add_action('concerto_access', 'concerto_default_access');

//add_action('concerto_header_content', 'concerto_default_banner');
add_action('concerto_content', 'concerto_default_content');
add_action('concerto_before_content', 'concerto_default_before_content');
add_action('concerto_loop', 'concerto_default_loop');
add_action('concerto_custom_page', 'concerto_default_custom_page');
add_action('concerto_after_content', 'concerto_default_after_content');
add_action('concerto_after_content', 'concerto_default_article_navigation');
add_action('concerto_sidebars', 'concerto_default_sidebars');

add_action('concerto_before_footer', 'concerto_default_before_footer');
add_action('concerto_footer', 'concerto_default_footer');
add_action('concerto_after_footer', 'concerto_default_after_footer');
add_action('concerto_end', 'concerto_default_end');

/**
 * Article Hooks
 */
add_action('concerto_after_article', 'concerto_default_after_article');
add_action('concerto_article_title', 'concerto_default_article_title');
add_action('concerto_article_meta', 'concerto_default_article_meta');
add_action('concerto_article_content', 'concerto_default_article_content');
add_action('concerto_article_content', 'concerto_default_article_pages');
add_action('concerto_article_utility', 'concerto_default_article_utility');
add_action('concerto_article_comments', 'concerto_default_article_comments');

/**
 * Comment Hooks
 */
add_action('concerto_before_commentlist', 'concerto_default_before_commentlist');
add_action('concerto_commentlist', 'concerto_default_commentlist');
add_action('concerto_before_comment', 'concerto_default_before_comment');
add_action('concerto_comment_vcard', 'concerto_default_comment_vcard');
add_action('concerto_comment_metadata', 'concerto_default_comment_metadata');
add_action('concerto_comment_body', 'concerto_default_comment_body');
add_action('concerto_after_comment', 'concerto_default_after_comment');
add_action('concerto_after_commentlist', 'concerto_default_after_commentlist');

/**
 * Respond Form Hooks
 */
add_action('comment_form_before', 'concerto_default_before_respond');
add_action('comment_form_must_log_in_after', 'concerto_default_respond_after_login');
add_action('comment_form_top', 'concerto_default_respond_top');
add_action('comment_form_logged_in_after', 'concerto_default_respond_after_loggedin');
add_action('comment_notes_before', 'concerto_default_respond_before_notes');
add_action('comment_form_before_fields', 'concerto_default_respond_before_fields');
add_action('comment_form_after_fields', 'concerto_default_respond_after_fields');
add_action('comment_notes_after', 'concerto_default_respond_after_notes');
add_action('comment_form', 'concerto_default_respond_form');
add_action('comment_form_after', 'concerto_default_after_respond');
add_action('comment_form_comments_closed', 'concerto_default_respond_closed');

?>