<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

// We set the Extension and Stage Classes as Global
global $extensions, $stages;

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

class ConcertoExtensions {

	public $extensions = array();

	public function __construct() {
		$this->extensions = $this->get();
	}

	public function get() {
		$extensions = array();
		if (file_exists(CONCERTO_MOD)) {
			if ($dh = opendir(CONCERTO_MOD)) {
				$default_headers = array(
					'Name' => 'Module Name',
					'Description' => 'Description',
					'Author' => 'Author',
					'AuthorURI' => 'Author URI',
					'Version' => 'Version',
					);
				$themes_allowed_tags = array(
					'a' => array(
						'href' => array(),'title' => array()
						),
					'abbr' => array(
						'title' => array()
						),
					'acronym' => array(
						'title' => array()
						),
					'code' => array(),
					'em' => array(),
					'strong' => array()
				);				
				while (($file = readdir($dh)) !== false) {
					if (!is_dir(CONCERTO_MOD . $file) || $file == '.' || $file == '..' || $file == 'CVS' || $file == '.git') {
						continue;
					}
					if (file_exists(CONCERTO_MOD . $file . _DS . $file . '.php') && is_readable(CONCERTO_MOD . $file . _DS . $file . '.php')) {
						$meta = get_file_data(CONCERTO_MOD . $file . _DS . $file . '.php', $default_headers, 'concerto_extensions');
						$extensions[] = array(
							'id' => strtolower($file),
							'name' => $meta['Name'],
							'description' => wp_kses($meta['Description'], $themes_allowed_tags),
							'version' => $meta['Version'],
							'author' => $meta['Author'],
							'author_uri' => $meta['AuthorURI'],
							'path' => CONCERTO_MOD . $file . _DS . $file . '.php'
						);
					}
				}
			}
		}
		return $extensions;
	}
	
	public function load() {
		$extensions = $this->extensions;
			if ($extensions) {
			foreach ($extensions as $extension) {
				if (get_option('concerto_extensions_' . $extension['id'] . '_enabled') == 1) {
					require_once $extension['path'];
				}
			}
		}
	}
	
}

class ConcertoStages {

	public $stages = array();
	
	public function __construct() {
		$this->stages = $this->get();
	}
	
	public function get() {
		$stage = array();
		if (file_exists(CONCERTO_STAGES)) {
			if ($dh = opendir(CONCERTO_STAGES)) {
				while (($file = readdir($dh)) !== false) {
					if (!is_dir(CONCERTO_STAGES . $file) || $file == '.' || $file == '..' || $file == 'CVS' || $file == '.git') {
						continue;
					}
					// Should we check if the stage has a custom stylesheet?
					$stage[] = array(
						'name' => $file,
						'path' => CONCERTO_STAGES . $file
					);
				}
			}
		}
		return $stage;
		// Throw an Error: STAGE FOLDER IS MISSING
	}

}

// Make an instance to the Extension and Stage classes
$extensions = new ConcertoExtensions();
$stages = new ConcertoStages();

?>