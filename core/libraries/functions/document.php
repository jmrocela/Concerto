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

/**
 * HTML that goes onto the <head> tag
 */
function concerto_head() {
?>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php do_action('concerto_title'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!-- Concerto Theme Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/core/html/css.php" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/core/html/fixes.css" />
	<!-- Concerto Theme Styles -->
<?php
}

/**
 * The Default page title of the theme
 */
function concerto_title() {
	if (get_option('concerto_general_title')) {
		echo get_option('concerto_general_title');
	} else {
		if (is_front_page() && is_home()) {
			bloginfo('name');
			echo ' | ' ;
			bloginfo('description');
		} else {
			wp_title('');
		}
	}
}

/**
 * Syndication link in the <head> tag
 */
function concerto_syndication() {
	if (get_option('concerto_general_syndication_url')) {
	?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Feed" href="<?php echo get_option('concerto_general_syndication_url'); ?>" />
	<?php
	} else {
	?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<?php
	}
}

/**
 * Comment Syndication link in the <head> tag
 */
function concerto_comment_syndication() {
?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Comments Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />
<?php
}

/**
 * Content right after the opening <body> tag
 */
function concerto_default_start() {}

/**
 * Content before the Header area
 */
function concerto_default_before_header() {}

/**
 * Default Header Content
 */
function concerto_default_header() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'header.php';
}

/**
 * Content after the Header area
 */
function concerto_default_after_header() {}

/**
 * Menu wrapper after the header area.
 */
function concerto_access() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'access.php';
}

/**
 * Default Branding Mark up: Site Heading
 */
function concerto_default_branding_site_title() {
?>
	<h1 id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></h1>
<?php
}

/**
 * Default Branding Mark up: Site Description
 */
function concerto_default_branding_site_description() {
?>
	<p id="site-description"><?php bloginfo('description'); ?></p>
<?php
}

/**
 * Default Menu
 */
function concerto_default_access() {
	if (get_option('concerto_general_menu') == 'default') {
	
	} else {
		wp_nav_menu(array('container' => 'nav', 'show_home' => true));
	}
}

/**
 * The Big Banner
 */
function concerto_default_banner() {
	if (is_home() && is_front_page()) {
	?>
	<div id="banner">
		<div class="container">
			<div style="background:#c0c0c0;height:300px;"></div>
		</div>
	</div>
	<?php
	}
}

/**
 * Default Content
 */
function concerto_default_content() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'index.php';
}

/**
 * Default Sidebars
 */
function concerto_default_sidebars() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'sidebar.php';
}

/**
 * Content before the Footer area
 */
function concerto_default_before_footer() {}

/**
 * Default Footer Content
 */
function concerto_default_footer() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'footer.php';
}

/**
 * Content after the Footer area
 */
function concerto_default_after_footer() {}

/**
 * Content right before the closing <body> tag
 */
function concerto_default_end() {}

?>