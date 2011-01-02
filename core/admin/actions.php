<?php
	// Notices
	add_action('concerto_admin_notices', 'admin_notices', 20);

	// General
	add_action('concerto_admin_general', 'admin_general_box_navigation', 40);
	add_action('concerto_admin_general', 'admin_general_box_home_meta', 60);
	add_action('concerto_admin_general', 'admin_general_box_favicon', 80);
	add_action('concerto_admin_general', 'admin_general_box_extensions', 140);
	add_action('concerto_admin_general', 'admin_general_box_syndication_url', 100);
	add_action('concerto_admin_general', 'admin_general_box_personal', 120);
	add_action('concerto_admin_general', 'admin_general_box_scripts', 140);
	add_action('concerto_admin_general', 'admin_general_box_javascript_libraries', 140);
	
	// Design
	add_action('concerto_admin_design', 'admin_design_box_markup', 20);
	add_action('concerto_admin_design', 'admin_design_box_header', 40);
	add_action('concerto_admin_design', 'admin_design_box_layout', 60);
	add_action('concerto_admin_design', 'admin_design_box_fontscolorsborders', 80);
	add_action('concerto_admin_design', 'admin_design_box_columns', 100);
	add_action('concerto_admin_design', 'admin_design_box_articles', 120);
	add_action('concerto_admin_design', 'admin_design_box_comments', 140);
	add_action('concerto_admin_design', 'admin_design_box_eyecandy', 160);
	
	// Tools
	
	
	// Support
	add_action('concerto_admin_support', 'admin_general_box_registration', 20);
	add_action('concerto_admin_support', 'admin_general_box_terms_and_agreements', 40);
	add_action('concerto_admin_support', 'admin_general_box_search', 60);
	add_action('concerto_admin_support', 'admin_general_box_support', 80);
	add_action('concerto_admin_support', 'admin_general_box_about', 100);
	
?>