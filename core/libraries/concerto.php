<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

class Concerto {

	public function __construct() {
		// We then Setup the Theme to be displayed
		define('CONCERTO_CONFIG_HTML', (get_option('concerto_design_html') == 4) ? 4: 5); // Determine the HTML version used
		define('CONCERTO_CONFIG_LAYOUT', (get_option('concerto_design_layout') == 'wrapped') ? 'wrapped': 'fullwidth'); // Determine the Layout of the Theme
		
		// We add the Hooks to Wordpress
		require CONCERTO_LIBS . 'theme.php';
		require CONCERTO_LIBS . 'hooks.php';
	
		// We require the pages
		require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'head.php';
		require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . CONCERTO_CONFIG_LAYOUT . '.php';
		require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'foot.php';
	}

}

?>