<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: ConcertoAdmin
 * @copyright: see LICENSE
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing).
 */

// General
add_action('concerto_admin_general', 'admin_general_box_navigation', 40);
add_action('concerto_admin_general', 'admin_general_box_home_meta', 60);
add_action('concerto_admin_general', 'admin_general_box_copyright', 80);
add_action('concerto_admin_general', 'admin_general_box_favicon', 100);
add_action('concerto_admin_general', 'admin_general_box_syndication_url', 120);
add_action('concerto_admin_general', 'admin_general_box_personal', 140);
add_action('concerto_admin_general', 'admin_general_box_extensions', 160);
add_action('concerto_admin_general', 'admin_general_box_scripts', 180);
add_action('concerto_admin_general', 'admin_general_box_javascript_libraries', 200);

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
add_action('concerto_admin_tools', 'admin_tools_box_fontmanager', 20);
add_action('concerto_admin_tools', 'admin_tools_box_importconfiguration', 40);
add_action('concerto_admin_tools', 'admin_tools_box_exportconfiguration', 60);
add_action('concerto_admin_tools', 'admin_tools_box_newstage', 80);
add_action('concerto_admin_tools', 'admin_tools_box_restoreconfiguration', 100);

add_action('wp_ajax_add_font', 'admin_tools_add_font');
add_action('wp_ajax_remove_font', 'admin_tools_remove_font');

// Support
add_action('concerto_admin_support', 'admin_support_box_terms_and_agreements', 20);
add_action('concerto_admin_support', 'admin_support_box_search', 40);
add_action('concerto_admin_support', 'admin_support_box_support', 60);
add_action('concerto_admin_support', 'admin_support_box_about', 80);
	
?>