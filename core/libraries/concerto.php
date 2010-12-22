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

	public function __construct($mode = false) {
		// We then Setup the Theme to be displayed
		define('CONCERTO_CONFIG_CUSTOM', ($mode == true) ? true: false); // We are using a Custom Page
		define('CONCERTO_CONFIG_HTML', (get_option('concerto_design_html_version') == 4) ? 4: 5); // Determine the HTML version used
		define('CONCERTO_CONFIG_LAYOUT', (get_option('concerto_design_page_structure') == 'wrapped') ? 'wrapped': 'fullwidth'); // Determine the Layout of the Theme
		define('CONCERTO_HTML_DIR', CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS);
		
		// We add the Hooks to Wordpress
		require CONCERTO_LIBS . 'actions.php';
		require CONCERTO_LIBS . 'filters.php';
		require CONCERTO_LIBS . 'theme.php';
		require CONCERTO_LIBS . 'defaults.php';
	}

}

?>