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
		define('CONCERTO_CONFIG_HTML', (Concerto::config('design', 'html_version') == 4) ? 4: 5); // Determine the HTML version used
		define('CONCERTO_CONFIG_LAYOUT', (Concerto::config('design', 'page_structure') == 'wrapped') ? 'wrapped': 'fullwidth'); // Determine the Layout of the Theme
		define('CONCERTO_HTML_DIR', CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS);
		
		// We add the Hooks to Wordpress
		require CONCERTO_LIBS . 'actions.php';
		require CONCERTO_LIBS . 'filters.php';
		require CONCERTO_LIBS . 'theme.php';
		require CONCERTO_LIBS . 'defaults.php';
	}
	
	public static function config($namespace, $name) {
		$options = get_option('concerto_options');
		return (isset($options[$namespace][$name])) ? $options[$namespace][$name]: null;
	}
	
	public static function updateconfig($namespace, $name, $value) {
		$options = get_option('concerto_options');
		$options[$namespace][$name] = $value;
		update_options('concerto_options', $options);
		return true;
	}

}

?>