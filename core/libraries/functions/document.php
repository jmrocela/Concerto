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
function concerto_hook_head() {
?>
	<!-- Concerto Theme Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/core/html/css.php?v=<?php echo time(); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/core/html/fixes.css?v=<?php echo time(); ?>" />
	<!-- Concerto Theme Styles -->
<?php
	wp_enqueue_script('jquery');
	wp_enqueue_script('concerto-base', get_bloginfo('stylesheet_directory') . '/core/scripts/concerto.js');
}

/**
 * The Default page title of the theme
 */
function concerto_hook_title() {
	if (is_front_page() && is_home()) {
		$title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
	} else {
		$title = wp_title('', false);
	}
	echo apply_filters('concerto_title', $title);
	# NOTE: AS FILTER?
	# have Titles from specific post if specified.
	# if (get_post_meta($post->ID, 'concerto_custom_post_title')) >>> as title
}

/**
 * Syndication link in the <head> tag
 */
function concerto_hook_syndication() {
	if (Concerto::config('general','syndication_url')) {
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
function concerto_hook_comment_syndication() {
?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Comments Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />
<?php
}

/**
 * Content right after the opening <body> tag
 */
function concerto_hook_default_start() {}

/**
 * Content before the Header area
 */
function concerto_hook_default_before_header() {}

/**
 * Default Header Content
 */
function concerto_hook_default_header() {
	require CONCERTO_HTML_DIR . 'header.php';
}

/**
 * Content after the Header area
 */
function concerto_hook_default_after_header() {}

/**
 * Menu wrapper after the header area.
 */
function concerto_hook_access() {
	require CONCERTO_HTML_DIR . 'access.php';
}

/**
 * Default Branding Mark up: Site Heading
 */
function concerto_hook_default_branding_site_title() {
?>
	<h1 id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></h1>
<?php
}

/**
 * Default Branding Mark up: Site Description
 */
function concerto_hook_default_branding_site_description() {
?>
	<p id="site-description"><?php bloginfo('description'); ?></p>
<?php
}

/**
 * Default Menu
 */
function concerto_hook_default_access() {
	if (Concerto::config('general','menu') == 'default') {
		wp_nav_menu(array('container' => 'nav', 'show_home' => true));
	} else {

	}
}

/**
 * The Big Banner
 */
function concerto_hook_default_banner() {
	#CHECK HTML VERSION
	if (is_home() && is_front_page()) {
	?>
	<section id="banner">
		<div class="container">
			<div style="background:#c0c0c0;height:300px;"></div>
		</div>
	</section>
	<?php
	}
}

/**
 * Default Content
 */
function concerto_hook_default_content() {
	require CONCERTO_HTML_DIR . 'content.php';
}

/**
 * Default Sidebars
 */
function concerto_hook_default_sidebars() {
	require CONCERTO_HTML_DIR . 'sidebar.php';
}

/**
 * Content before the Footer area
 */
function concerto_hook_default_before_footer() {}

/**
 * Default Footer Content
 */
function concerto_hook_default_footer_siteinfo() {
?>
<div id="site-info">
	Copyright <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
</div>
<?php
}

function concerto_hook_default_footer_sitegenerator() {
?>
<div id="site-generator">
	Powered by <a href="http://themeconcert.com/concerto">the Concerto Theme</a> from ThemeConcert
</div>
<?php
}

function concerto_hook_default_footer() {
?>
<div id="wp-footer">
	<?php wp_footer(); ?>
</div>
<?php
}

/**
 * Content after the Footer area
 */
function concerto_hook_default_after_footer() {}

/**
 * Content right before the closing <body> tag
 */
function concerto_hook_default_end() {}

?>