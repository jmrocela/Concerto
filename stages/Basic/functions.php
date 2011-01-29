<?php
/**
 * functions.php
 *
 * "Basic" - A Concerto Stage Theme
 * 
 * This theme serves as a base file for future stage development. You may extend this file through style.css
 * and functions.php(this file). This file will not be modified when Concerto is updated.
 */

// Add your hooks here

/**
 * Custom Banner
 *
 * custom banner example usage
 */
function basic_banner() {
	if (is_front_page() && is_home()) {
		?>
		<div id="concerto_basic_banner"><div class="container"></div></div>
		<?php
	}
}
add_action('concerto_hook_header_content', 'basic_banner', 20);


?>