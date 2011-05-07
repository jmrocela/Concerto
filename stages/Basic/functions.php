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

/**
 * Sticky Footer
 *
 * script to run whenever a page is too short and the footer does not stick to the bottom
 */
function sticky_footer() {
	?>
	<script type="text/javascript">
		jQuery(function($){
			if($(document.body).height() < $(window).height()){
				$('#footer').css({position:'absolute',top:( $(window).scrollTop() + $(window).height() - $("#footer").height() ) + "px",width:"100%"});
			} else {
				$('#footer').css({position: 'static'});
			}   
		});
	</script>
	<?php
}
add_action('concerto_hook_footer', 'sticky_footer');
?>