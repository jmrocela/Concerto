<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: ConcertoAdmin
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing).
 */

global $stage;

register_setting('concerto_general', 'concerto_stage');
register_setting('concerto_general', 'concerto_custom_css');
register_setting('concerto_design', 'concerto_stage');
register_setting('concerto_design', 'concerto_custom_css');

register_setting('concerto_general', 'concerto_' . $stage . '_general_favicon');
register_setting('concerto_general', 'concerto_' . $stage . '_general_homepage_description');
register_setting('concerto_general', 'concerto_' . $stage . '_general_homepage_keywords');
register_setting('concerto_general', 'concerto_' . $stage . '_general_syndication_url');
register_setting('concerto_general', 'concerto_' . $stage . '_general_scripts_head');
register_setting('concerto_general', 'concerto_' . $stage . '_general_scripts_footer');
register_setting('concerto_general', 'concerto_' . $stage . '_general_scripts_libraries_jquery');
register_setting('concerto_general', 'concerto_' . $stage . '_general_scripts_libraries_jquery_ui');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_use_pages');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_pages_items');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_use_categories');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_categories_items');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_use_tags');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_tags_items');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_show_home');
register_setting('concerto_general', 'concerto_' . $stage . '_general_menu_show_feed');
register_setting('concerto_general', 'concerto_' . $stage . '_general_footer_copyright');
register_setting('concerto_general', 'concerto_' . $stage . '_general_footer_copyright_line');
register_setting('concerto_general', 'concerto_' . $stage . '_general_footer_attribution');
register_setting('concerto_general', 'concerto_' . $stage . '_general_footer_attribution_line');
register_setting('concerto_general', 'concerto_' . $stage . '_general_footer_html5');

register_setting('concerto_general', 'concerto_' . $stage . '_personal_twitter');
register_setting('concerto_general', 'concerto_' . $stage . '_personal_facebook');
register_setting('concerto_general', 'concerto_' . $stage . '_personal_youtube');
register_setting('concerto_general', 'concerto_' . $stage . '_personal_linkedin');
register_setting('concerto_general', 'concerto_' . $stage . '_personal_email');
register_setting('concerto_general', 'concerto_' . $stage . '_personal_email_use_admin');

register_setting('concerto_design', 'concerto_' . $stage . '_design_html_version');
register_setting('concerto_design', 'concerto_' . $stage . '_design_page_structure');
register_setting('concerto_design', 'concerto_' . $stage . '_design_paginate');
register_setting('concerto_design', 'concerto_' . $stage . '_design_layout_columns');
register_setting('concerto_design', 'concerto_' . $stage . '_design_layout_columns_order');
register_setting('concerto_design', 'concerto_' . $stage . '_design_layout_columns_width_content');
register_setting('concerto_design', 'concerto_' . $stage . '_design_layout_columns_width_sidebar1');
register_setting('concerto_design', 'concerto_' . $stage . '_design_layout_columns_width_sidebar2');
register_setting('concerto_design', 'concerto_' . $stage . '_design_article_padding');
register_setting('concerto_design', 'concerto_' . $stage . '_design_page_padding');
register_setting('concerto_design', 'concerto_' . $stage . '_design_header_mode');
register_setting('concerto_design', 'concerto_' . $stage . '_design_header_image');
register_setting('concerto_design', 'concerto_' . $stage . '_design_header_title');
register_setting('concerto_design', 'concerto_' . $stage . '_design_header_description');
register_setting('concerto_design', 'concerto_' . $stage . '_design_bylines_page_author');
register_setting('concerto_design', 'concerto_' . $stage . '_design_bylines_page_published_date');
register_setting('concerto_design', 'concerto_' . $stage . '_design_bylines_post_author');
register_setting('concerto_design', 'concerto_' . $stage . '_design_bylines_post_published_date');
register_setting('concerto_design', 'concerto_' . $stage . '_design_meta_show_edit_link');
register_setting('concerto_design', 'concerto_' . $stage . '_design_meta_comments_link');
register_setting('concerto_design', 'concerto_' . $stage . '_design_meta_categories');
register_setting('concerto_design', 'concerto_' . $stage . '_design_meta_tags');
register_setting('concerto_design', 'concerto_' . $stage . '_design_posts_excerpts');
register_setting('concerto_design', 'concerto_' . $stage . '_design_posts_readmore_text');
register_setting('concerto_design', 'concerto_' . $stage . '_design_posts_navigation');
register_setting('concerto_design', 'concerto_' . $stage . '_design_archive_display');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_body');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_menu');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_header');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_content');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_content_title');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_sidebar');
register_setting('concerto_design', 'concerto_' . $stage . '_design_fonts_footer');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_body');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_menu');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_header_title');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_header_description');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_content');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_content_title');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_content_meta');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_sidebar');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_h1');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_h2');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_h3');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_h4');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_h5');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_h6');
register_setting('concerto_design', 'concerto_' . $stage . '_design_sizes_footer');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_site');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_container');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_header');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_main');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_content');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_footer');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_menu');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_menu_active');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_menu_hover');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_article');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_comment_odd');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_background_comment_even');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_site');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_header_title');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_header_description');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_menu');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_menu_active');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_menu_hover');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_footer');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_link');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_link_hover');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_link_visited');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_comment_meta');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_content_title');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_content_link');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_content_link_hover');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_content_meta');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_fonts_respond');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_common');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_menu');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_menu_active');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_menu_hover');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_article_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_article_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_article');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_comment');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_comment_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_comment_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_commentlist_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_colors_borders_commentlist_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_container');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_header');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_header_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_header_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_menu');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_footer');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_footer_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_footer_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_article');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_article_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_article_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_comment');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_comment_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_comment_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_commentlist_top');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_commentlist_bottom');
register_setting('concerto_design', 'concerto_' . $stage . '_design_borders_table');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_is_closed_show_message');
register_setting('concerto_design', 'concerto_' . $stage . '_design_display_comments_index');
register_setting('concerto_design', 'concerto_' . $stage . '_design_display_comments_comments');
register_setting('concerto_design', 'concerto_' . $stage . '_design_display_comments_pings');
register_setting('concerto_design', 'concerto_' . $stage . '_design_display_comments_reply');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_display_avatar');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_display_author');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_display_date');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_display_time');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_display_edit');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_avatar_size');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_time_format');
register_setting('concerto_design', 'concerto_' . $stage . '_design_comments_trackback_date');
register_setting('concerto_design', 'concerto_' . $stage . '_design_glow');
register_setting('concerto_design', 'concerto_' . $stage . '_design_engrave');

do_action('concerto_hook_register_settings');

?>