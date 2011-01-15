<?php

function defaultOptions($stage = 'default', $context = null, $install  = false) {
	if (!is_array($context)) {
		if ($context != null) {
			if ($exploded = @explode(',', $context)) {
				$context = array_map('trim', $exploded);
			} 
		}
	}
	
	$stage = ($stage == null) ? 'default': $stage;
		
	if ($install) {
		update_option('concerto_version', CONCERTO_VERSION);
		update_option('concerto_stage', $stage);
		
		// Should be on a different file
		update_option('concerto_license', '');
		update_option('concerto_license_to', '');
		update_option('concerto_license_on', '');
		update_option('concerto_license_copies', 0);
		update_option('concerto_license_key', '');
		update_option('concerto_naughty', 0);
		update_option('concerto_need_update', 0);
	}

	if ($context == null || in_array('general', (array) $context)) {
		update_option('concerto_' . $stage . '_general_site_title', '');
		update_option('concerto_' . $stage . '_general_favicon', '');
		update_option('concerto_' . $stage . '_general_homepage_description', '');
		update_option('concerto_' . $stage . '_general_homepage_keywords', '');
		update_option('concerto_' . $stage . '_general_syndication_url', '');
		update_option('concerto_' . $stage . '_general_scripts_head', '');
		update_option('concerto_' . $stage . '_general_scripts_footer', '');
			update_option('concerto_' . $stage . '_general_scripts_libraries_jquery', 1);
			update_option('concerto_' . $stage . '_general_scripts_libraries_jquery_ui', 0);
		update_option('concerto_' . $stage . '_general_menu', 'default');
		update_option('concerto_' . $stage . '_general_menu_use_pages', 0);
			update_option('concerto_' . $stage . '_general_menu_pages_items', ''); //serialized
		update_option('concerto_' . $stage . '_general_menu_use_categories', 0);
			update_option('concerto_' . $stage . '_general_menu_categories_items', ''); //serialized
		update_option('concerto_' . $stage . '_general_menu_use_tags', 0);
			update_option('concerto_' . $stage . '_general_menu_tags_items', ''); //serialized
		update_option('concerto_' . $stage . '_general_menu_show_home', 1);
		update_option('concerto_' . $stage . '_general_menu_show_feed', 1);
	}

	if ($context == null || in_array('design', (array) $context)) {
		update_option('concerto_' . $stage . '_design_html_version', 5);
		update_option('concerto_' . $stage . '_design_page_structure', 'fullwidth');
		update_option('concerto_' . $stage . '_design_paginate', 1);
		update_option('concerto_' . $stage . '_design_layout_columns', 2);
		update_option('concerto_' . $stage . '_design_layout_columns_order', 1);
			update_option('concerto_' . $stage . '_design_layout_columns_width_content', 600);
			update_option('concerto_' . $stage . '_design_layout_columns_width_sidebar1', 300);
			update_option('concerto_' . $stage . '_design_layout_columns_width_sidebar2', 0);
		update_option('concerto_' . $stage . '_design_article_padding', 10);
		update_option('concerto_' . $stage . '_design_page_padding', 10);
									
		update_option('concerto_' . $stage . '_design_header_mode', 1);
		update_option('concerto_' . $stage . '_design_header_image', '');
		update_option('concerto_' . $stage . '_design_header_title', 1);
		update_option('concerto_' . $stage . '_design_header_description', 1);

		update_option('concerto_' . $stage . '_design_bylines_page_author', 0);
		update_option('concerto_' . $stage . '_design_bylines_page_published_date', 0);
		update_option('concerto_' . $stage . '_design_bylines_post_author', 1);
		update_option('concerto_' . $stage . '_design_bylines_post_published_date', 1);

		update_option('concerto_' . $stage . '_design_meta_show_edit_link', 1);
		update_option('concerto_' . $stage . '_design_meta_comments_link', 1);
		update_option('concerto_' . $stage . '_design_meta_categories', 1);
		update_option('concerto_' . $stage . '_design_meta_tags', 1);

		update_option('concerto_' . $stage . '_design_posts_excerpts', 0); //display as excerpts on homepage
		update_option('concerto_' . $stage . '_design_posts_readmore_text', 'Read More');
		update_option('concerto_' . $stage . '_design_posts_navigation', 1);
													
		update_option('concerto_' . $stage . '_design_archive_display', 1);
									
		update_option('concerto_' . $stage . '_design_fonts_body', 'arial');
		update_option('concerto_' . $stage . '_design_fonts_menu', 'inherit-body');
		update_option('concerto_' . $stage . '_design_fonts_header', 'inherit-body');
		update_option('concerto_' . $stage . '_design_fonts_content', 'georgia');
		update_option('concerto_' . $stage . '_design_fonts_content_title', 'arial');
		update_option('concerto_' . $stage . '_design_fonts_sidebar', 'inherit-content');
		update_option('concerto_' . $stage . '_design_fonts_footer', 'inherit-body');

		update_option('concerto_' . $stage . '_design_sizes_body', 12);
		update_option('concerto_' . $stage . '_design_sizes_menu', 'inherit-body');
		update_option('concerto_' . $stage . '_design_sizes_header_title', 40);
		update_option('concerto_' . $stage . '_design_sizes_header_description', 14);
		update_option('concerto_' . $stage . '_design_sizes_content', 15);
		update_option('concerto_' . $stage . '_design_sizes_content_title', 28);
		update_option('concerto_' . $stage . '_design_sizes_content_meta', 13);
		update_option('concerto_' . $stage . '_design_sizes_sidebar', 'inherit-content');
		update_option('concerto_' . $stage . '_design_sizes_h1', 28);
		update_option('concerto_' . $stage . '_design_sizes_h2', 25);
		update_option('concerto_' . $stage . '_design_sizes_h3', 20);
		update_option('concerto_' . $stage . '_design_sizes_h4', 16);
		update_option('concerto_' . $stage . '_design_sizes_h5', 14);
		update_option('concerto_' . $stage . '_design_sizes_h6', 14);
		update_option('concerto_' . $stage . '_design_sizes_footer', 11);

		update_option('concerto_' . $stage . '_design_colors_background_site', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_container', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_header', 'none');
		update_option('concerto_' . $stage . '_design_colors_background_main', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_content', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_footer', 'none');
		update_option('concerto_' . $stage . '_design_colors_background_menu', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_menu_active', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_menu_hover', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_article', '#ffffff');
		update_option('concerto_' . $stage . '_design_colors_background_comment_odd', '#fafafa');
		update_option('concerto_' . $stage . '_design_colors_background_comment_even', '#ffffff');

		update_option('concerto_' . $stage . '_design_colors_fonts_site', '#000000');
		update_option('concerto_' . $stage . '_design_colors_fonts_header_title', '#000000');
		update_option('concerto_' . $stage . '_design_colors_fonts_header_description', '#666666');
		update_option('concerto_' . $stage . '_design_colors_fonts_menu', '#000000');
		update_option('concerto_' . $stage . '_design_colors_fonts_menu_active', '#000000');
		update_option('concerto_' . $stage . '_design_colors_fonts_menu_hover', '#000000');
		update_option('concerto_' . $stage . '_design_colors_fonts_footer', '#666666');
		update_option('concerto_' . $stage . '_design_colors_fonts_link', '#245cba');
		update_option('concerto_' . $stage . '_design_colors_fonts_link_hover', '#ff4b33');
		update_option('concerto_' . $stage . '_design_colors_fonts_link_visited', '#8024ba');
		update_option('concerto_' . $stage . '_design_colors_fonts_comment_meta', '#666666');
		update_option('concerto_' . $stage . '_design_colors_fonts_content_title', '#000000');
		update_option('concerto_' . $stage . '_design_colors_fonts_content_link', '#245cba');
		update_option('concerto_' . $stage . '_design_colors_fonts_content_link_hover', '#ff4b33');
		update_option('concerto_' . $stage . '_design_colors_fonts_content_meta', '#666666');
		update_option('concerto_' . $stage . '_design_colors_fonts_respond', '#888888');

		update_option('concerto_' . $stage . '_design_colors_borders_common', '#dddddd');
		update_option('concerto_' . $stage . '_design_colors_borders_menu', '#eeeeee');
		update_option('concerto_' . $stage . '_design_colors_borders_menu_active', '#dddddd');
		update_option('concerto_' . $stage . '_design_colors_borders_menu_hover', '#dddddd');
		update_option('concerto_' . $stage . '_design_colors_borders_article_top', 'transparent');
		update_option('concerto_' . $stage . '_design_colors_borders_article_bottom', 'transparent');
		update_option('concerto_' . $stage . '_design_colors_borders_article', 'transparent');
		update_option('concerto_' . $stage . '_design_colors_borders_comment', 'transparent');
		update_option('concerto_' . $stage . '_design_colors_borders_comment_top', 'transparent');
		update_option('concerto_' . $stage . '_design_colors_borders_comment_bottom', '#e7e7e7');
		update_option('concerto_' . $stage . '_design_colors_borders_commentlist_top', '#e7e7e7');
		update_option('concerto_' . $stage . '_design_colors_borders_commentlist_bottom', '#e7e7e7');

		update_option('concerto_' . $stage . '_design_borders_container', 1);
		update_option('concerto_' . $stage . '_design_borders_header', 0);
		update_option('concerto_' . $stage . '_design_borders_header_top', 0);
		update_option('concerto_' . $stage . '_design_borders_header_bottom', 1);
		update_option('concerto_' . $stage . '_design_borders_menu', 1);
		update_option('concerto_' . $stage . '_design_borders_footer', 0);
		update_option('concerto_' . $stage . '_design_borders_footer_top', 1);
		update_option('concerto_' . $stage . '_design_borders_footer_bottom', 0);
		update_option('concerto_' . $stage . '_design_borders_article', 0);
		update_option('concerto_' . $stage . '_design_borders_article_top', 0);
		update_option('concerto_' . $stage . '_design_borders_article_bottom', 0);
		update_option('concerto_' . $stage . '_design_borders_comment', 0);
		update_option('concerto_' . $stage . '_design_borders_comment_top', 0);
		update_option('concerto_' . $stage . '_design_borders_comment_bottom', 1);
		update_option('concerto_' . $stage . '_design_borders_commentlist_top', 1);
		update_option('concerto_' . $stage . '_design_borders_commentlist_bottom', 1);
		update_option('concerto_' . $stage . '_design_borders_table', 1);

		update_option('concerto_' . $stage . '_design_comments_is_closed_show_message', 0);
			update_option('concerto_' . $stage . '_design_display_comments_index', ''); //serialized [comments, trackbacks, respond]
				update_option('concerto_' . $stage . '_design_display_comments_comments', 1);
				update_option('concerto_' . $stage . '_design_display_comments_pings', 1);
				update_option('concerto_' . $stage . '_design_display_comments_reply', 1);
			update_option('concerto_' . $stage . '_design_comments_body', '{}'); //serialized [vcard, body, reply] #NOT YET IMPLEMENTED
		update_option('concerto_' . $stage . '_design_comments_display_avatar', 1);
		update_option('concerto_' . $stage . '_design_comments_display_author', 1);
		update_option('concerto_' . $stage . '_design_comments_display_date', 1);
		update_option('concerto_' . $stage . '_design_comments_display_time', 0);
		update_option('concerto_' . $stage . '_design_comments_display_edit', 1);
		update_option('concerto_' . $stage . '_design_comments_avatar_size', 40);
		update_option('concerto_' . $stage . '_design_comments_time_format', 'F j, Y');
		update_option('concerto_' . $stage . '_design_comments_trackback_date', 1);

		update_option('concerto_' . $stage . '_design_glow', 0);
		update_option('concerto_' . $stage . '_design_engrave', 0);
	}

	if ($context == null || in_array('seo', (array) $context)) {
		update_option('concerto_' . $stage . '_extensions_seo_enabled', 1);
			update_option('concerto_' . $stage . '_seo_enable_canonical', 0);
			update_option('concerto_' . $stage . '_seo_child_noindex', 0);
			update_option('concerto_' . $stage . '_seo_child_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_child_noarchive', 0);
			update_option('concerto_' . $stage . '_seo_category_noindex', 0);
			update_option('concerto_' . $stage . '_seo_category_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_category_noarchive', 0);
			update_option('concerto_' . $stage . '_seo_tag_noindex', 0);
			update_option('concerto_' . $stage . '_seo_tag_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_tag_noarchive', 0);
			update_option('concerto_' . $stage . '_seo_author_noindex', 0);
			update_option('concerto_' . $stage . '_seo_author_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_author_noarchive', 0);
			update_option('concerto_' . $stage . '_seo_month_noindex', 0);
			update_option('concerto_' . $stage . '_seo_month_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_month_noarchive', 0);
			update_option('concerto_' . $stage . '_seo_day_noindex', 0);
			update_option('concerto_' . $stage . '_seo_day_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_day_noarchive', 0);
			update_option('concerto_' . $stage . '_seo_year_noindex', 0);
			update_option('concerto_' . $stage . '_seo_year_nofollow', 0);
			update_option('concerto_' . $stage . '_seo_year_noarchive', 0);
			
	}
	
	if ($context == null || in_array('personal', (array) $context)) {
		update_option('concerto_' . $stage . '_personal_twitter', '');
		update_option('concerto_' . $stage . '_personal_facebook', '');
		update_option('concerto_' . $stage . '_personal_youtube', '');
		update_option('concerto_' . $stage . '_personal_linkedin', '');
		update_option('concerto_' . $stage . '_personal_email', '');
		update_option('concerto_' . $stage . '_personal_email_use_admin', 0);
	}

	// Action to run when default options are being called
	do_action('concerto_default_options', $stage, $context, $install);
}

?>