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
add_action('concerto_hook_title', 'concerto_hook_title');
add_action('concerto_hook_head', 'concerto_hook_meta');
add_action('concerto_hook_head', 'concerto_hook_head');
add_action('concerto_hook_head', 'concerto_hook_scripts');
add_action('concerto_hook_head', 'concerto_hook_scripts_head');
add_action('concerto_hook_head', 'concerto_hook_favicon');
add_action('concerto_hook_head', 'concerto_hook_syndication');
add_action('concerto_hook_head', 'concerto_hook_comment_syndication');
add_action('concerto_hook_head', 'wp_head');

add_action('concerto_hook_start', 'concerto_hook_default_start');
add_action('concerto_hook_before_header', 'concerto_hook_default_before_header');
add_action('concerto_hook_header', 'concerto_hook_default_header');
add_action('concerto_hook_after_header', 'concerto_hook_default_after_header');
add_action('concerto_hook_after_header', 'concerto_hook_access');

add_action('concerto_hook_branding', 'concerto_hook_default_branding_site_title');
add_action('concerto_hook_branding', 'concerto_hook_default_branding_site_description');
add_action('concerto_hook_access', 'concerto_hook_default_access');

add_action('concerto_hook_content', 'concerto_hook_default_content');
add_action('concerto_hook_before_content', 'concerto_hook_default_before_content');
add_action('concerto_hook_loop', 'concerto_hook_default_loop');
add_action('concerto_hook_custom_page', 'concerto_hook_default_custom_page');
add_action('concerto_hook_after_content', 'concerto_hook_default_after_content');
add_action('concerto_hook_after_content', 'concerto_hook_default_article_navigation');

add_action('concerto_hook_before_footer', 'concerto_hook_default_before_footer');
add_action('concerto_hook_footer', 'concerto_hook_default_footer_siteinfo');
add_action('concerto_hook_footer', 'concerto_hook_default_footer_sitegenerator');
add_action('concerto_hook_footer', 'concerto_hook_default_footer');
add_action('concerto_hook_after_footer', 'concerto_hook_default_after_footer');
add_action('concerto_hook_end', 'concerto_hook_scripts_footer');
add_action('concerto_hook_end', 'concerto_hook_default_end');

/**
 * Article Hooks
 */
add_action('concerto_hook_after_article', 'concerto_hook_default_after_article');
add_action('concerto_hook_article_title', 'concerto_hook_default_article_title');
add_action('concerto_hook_article_byline', 'concerto_hook_default_article_byline');
add_action('concerto_hook_article_content', 'concerto_hook_default_article_content');
add_action('concerto_hook_article_content', 'concerto_hook_default_article_pages');
add_action('concerto_hook_article_excerpt', 'concerto_hook_default_article_excerpt');
add_action('concerto_hook_article_excerpt', 'concerto_hook_default_article_pages');
add_action('concerto_hook_article_meta', 'concerto_hook_default_author_description');
add_action('concerto_hook_article_meta', 'concerto_hook_default_article_meta');
add_action('concerto_hook_article_comments', 'concerto_hook_default_article_comments');

/**
 * Sidebars
 */
add_action('concerto_hook_sidebar1', 'concerto_hook_default_sidebar1');
add_action('concerto_hook_sidebar2', 'concerto_hook_default_sidebar2');
add_action('concerto_hook_before_sidebars', 'concerto_hook_default_before_sidebars');
add_action('concerto_hook_before_sidebar_1', 'concerto_hook_default_before_sidebar_1');
add_action('concerto_hook_before_sidebar_2', 'concerto_hook_default_before_sidebar_2');
add_action('concerto_hook_after_sidebar_2', 'concerto_hook_default_after_sidebar_2');
add_action('concerto_hook_after_sidebar_1', 'concerto_hook_default_after_sidebar_1');
add_action('concerto_hook_after_sidebars', 'concerto_hook_default_after_sidebars');

/**
 * Comment Hooks
 */
add_action('concerto_hook_before_commentlist', 'concerto_hook_default_before_commentlist');
add_action('concerto_hook_commentlist', 'concerto_hook_default_comments');
add_action('concerto_hook_comment_pingback', 'concerto_hook_default_pinglist');
add_action('concerto_hook_before_comment', 'concerto_hook_default_before_comment');
add_action('concerto_hook_comment_vcard', 'concerto_hook_default_comment_vcard');
add_action('concerto_hook_comment_metadata', 'concerto_hook_default_comment_metadata');
add_action('concerto_hook_comment_body', 'concerto_hook_default_comment_body');
add_action('concerto_hook_after_comment', 'concerto_hook_default_after_comment');
add_action('concerto_hook_after_commentlist', 'concerto_hook_default_after_commentlist');

/**
 * Respond Form Hooks
 */
add_action('comment_form_before', 'concerto_hook_default_before_respond');
add_action('comment_form_must_log_in_after', 'concerto_hook_default_respond_after_login');
add_action('comment_form_top', 'concerto_hook_default_respond_top');
add_action('comment_form_logged_in_after', 'concerto_hook_default_respond_after_loggedin');
add_action('comment_notes_before', 'concerto_hook_default_respond_before_notes');
add_action('comment_form_before_fields', 'concerto_hook_default_respond_before_fields');
add_action('comment_form_after_fields', 'concerto_hook_default_respond_after_fields');
add_action('comment_notes_after', 'concerto_hook_default_respond_after_notes');
add_action('comment_form', 'concerto_hook_default_respond_form');
add_action('comment_form_after', 'concerto_hook_default_after_respond');
add_action('comment_form_comments_closed', 'concerto_hook_default_respond_closed');

?>