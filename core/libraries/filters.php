<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

// Filters
add_filter('wp_nav_menu_items', 'concerto_filter_additional_nav_items');
add_filter('wp_list_pages', 'concerto_filter_additional_nav_items');

?>