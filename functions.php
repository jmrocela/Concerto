<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * Includes and Instantiates libraries needed for the Concerto theme to work properly. It is advised
 * that you steer clear from editing this file as it may cause problems upon future updates. for custom
 * funcitons to your file, please see functions.php under your respective /stage folder.
 */
 
// We define the Theme constants
define('_DS', DIRECTORY_SEPARATOR);
define('CONCERTO_VERSION', '0.1 beta');
define('CONCERTO_ROOT', dirname(__FILE__) . _DS);
define('CONCERTO_STAGES', CONCERTO_ROOT . 'stages' . _DS);
define('CONCERTO_CORE', CONCERTO_ROOT . 'core' . _DS);
define('CONCERTO_LIBS', CONCERTO_CORE . 'libraries' . _DS);
define('CONCERTO_FUNCS', CONCERTO_LIBS . 'functions' . _DS);
define('CONCERTO_ADM', CONCERTO_CORE . 'admin' . _DS);
define('CONCERTO_MOD', CONCERTO_CORE . 'modules' . _DS);
define('CONCERTO_HTML', CONCERTO_CORE . 'html' . _DS);

// We give what Wordpress needs from us
add_theme_support('menus');
register_sidebar(array('name' => 'Main Sidebar'));
register_sidebar(array('name' => 'Second Sidebar'));

// We require the Concerto Framework
require CONCERTO_LIBS . 'concerto.php';

// We determine what context the user wishes to do. In this case, the user is trying to access
// the script via the Administration Views...
if (is_admin()) {

	// We are in the admin, let's call the Administration pages
	require CONCERTO_ADM . 'admin.php';
	new ConcertoAdmin();

}

?>