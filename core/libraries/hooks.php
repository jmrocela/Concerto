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
add_action('concerto_sidebars', 'concerto_default_sidebars');

add_action('concerto_before_footer', 'concerto_default_before_footer');
add_action('concerto_footer', 'concerto_default_footer');
add_action('concerto_after_footer', 'concerto_default_after_footer');
add_action('concerto_end', 'concerto_default_end');

?>