<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

// Default Layout Hooks
function concerto_default_start() {}

function concerto_default_before_header() {}

function concerto_default_header() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'header.php';
}

function concerto_default_after_header() {}

function concerto_default_branding_site_title() {
	?>
	<h1 id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></h1>
	<?php
}

function concerto_default_branding_site_description() {
	?>
	<p id="site-description"><?php bloginfo('description'); ?></p>
	<?php
}

function concerto_default_access() {}

function concerto_default_content() {
	if (is_home() && is_front_page()) {
	} else if (is_single()) {
	} else if (is_page()) {
	}
}

function concerto_default_before_footer() {}

function concerto_default_footer() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'footer.php';
}

function concerto_default_after_footer() {}

function concerto_default_end() {}

?>