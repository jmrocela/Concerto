<?php
	// General
	add_action('concerto_admin_general', 'admin_general_box_navigation', 40);
	add_action('concerto_admin_general', 'admin_general_box_home_meta', 60);
	add_action('concerto_admin_general', 'admin_general_box_favicon', 80);
	add_action('concerto_admin_general', 'admin_general_box_extensions', 140);
	add_action('concerto_admin_general', 'admin_general_box_syndication_url', 100);
	add_action('concerto_admin_general', 'admin_general_box_personal', 120);
	add_action('concerto_admin_general', 'admin_general_box_scripts', 140);
	
?>