<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: Concerto
 *
 * [WARNING]
 * Includes and Instantiates libraries needed for the Concerto theme to work properly. It is advised
 * that you steer clear from editing this file as it may cause problems upon future updates. for custom
 * functions to your stages, please see functions.php under your respective /stage folder.
 */
 
// We define the Theme constants
define('_DS', DIRECTORY_SEPARATOR);
define('CONCERTO_VERSION', '1.0');
define('CONCERTO_ROOT', dirname(__FILE__) . _DS);
define('CONCERTO_STAGES', CONCERTO_ROOT . 'stages' . _DS);
define('CONCERTO_CORE', CONCERTO_ROOT . 'core' . _DS);
define('CONCERTO_LIBS', CONCERTO_CORE . 'libraries' . _DS);
define('CONCERTO_FUNCS', CONCERTO_LIBS . 'functions' . _DS);
define('CONCERTO_ADM', CONCERTO_CORE . 'admin' . _DS);
define('CONCERTO_MOD', CONCERTO_CORE . 'modules' . _DS);
define('CONCERTO_HTML', CONCERTO_CORE . 'html' . _DS);

// We give what Wordpress needs from us
register_nav_menus(array('primary' => 'Primary Navigation', 'top' => 'Top Navigation', 'footer' => 'Footer Navigation', 'custom' => 'Custom Navigation'));
register_sidebar(array('name' => 'Main Sidebar'));
register_sidebar(array('name' => 'Second Sidebar'));
add_action('switch_theme', 'concerto_install');

// We require the Concerto Framework
require CONCERTO_LIBS . 'concerto.php';

// We determine what context the user wishes to do. In this case, the user is trying to access
// the script via the Administration Views...
if (is_admin()) {

	// We are in the admin, let's call the Administration pages
	require CONCERTO_ADM . 'admin.php';
	new ConcertoAdmin();

}

// Install the theme configuration upon first activation
function concerto_install () {
	if (get_current_theme() == 'Concerto' && get_option('concerto_is_installed') != 1) {		
		require_once CONCERTO_LIBS . 'defaults.php';
		defaultOptions('default', null, true);
		update_option('concerto_is_installed', 1);
	}
}

?>