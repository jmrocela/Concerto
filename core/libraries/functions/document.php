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
 * Markup inside the Content section and just above the loop
 */
function concerto_default_before_content () {}

/**
 * The Loop
 */
function concerto_default_loop () {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'loop.php';
}

/**
 * 404 Page
 */
function concerto_default_404 () {}

/**
 * Search Form
 */
function concerto_default_search () {}

/**
 * Custom Page
 */
function concerto_default_custom_page () {}

/**
 * Markup inside the article, before the title
 */
function concerto_default_before_article () {}

/**
 * Article Title
 */
function concerto_default_article_title () {}

/**
 * Article Meta
 */
function concerto_default_article_meta () {}

/**
 * Article Content
 */
function concerto_default_article_content () {}

/**
 * Article Comments
 */
function concerto_default_article_comments () {
	comments_template('/core/html/' . CONCERTO_CONFIG_HTML . '/comments.php', true);
}

/**
 * Article Utility <div>
 */
function concerto_default_article_utility () {}

/**
 * Markup inside the article, after the utility <div>
 */
function concerto_default_after_article () {
	if (is_single()) {
		?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_post_link(); ?></div>
				<div class="nav-next"><?php previous_post_link(); ?></div>
			</div>
		<?php
	}
}

/**
 * Markup inside the Content section and just below the loop
 */
function concerto_default_after_content () {}

/**
 * Article Navigation
 */
function concerto_default_article_navigation () {
	if (is_home() && is_front_page()) {
		echo numbered_page_nav();
	}
}

/**
 * Markup just outside and before the commentlist
 */
function concerto_default_before_commentlist () {}

/**
 * Markup inside the comment container, before the Comment title
 */
function concerto_default_before_comment () {}

/**
 * Comment vcard
 */
function concerto_default_comment_vcard () {}

/**
 * Comment metadata
 */
function concerto_default_comment_metadata () {}

/**
 * Comment body
 */
function concerto_default_comment_body () {}

/**
 * Markup inside the comment container, after the Comment body
 */
function concerto_default_after_comment () {}

/**
 * Markup just outside and after the commentlist
 */
function concerto_default_after_commentlist () {}

/**
 * Comment Pingback
 */
function concerto_default_comment_pingback () {}

/**
 * Markup inside the respond <div>, before the respond title
 */
function concerto_default_before_respond () {}

/**
 * Respond Title
 */
function concerto_default_respond_title () {}

/**
 * Respond Actions
 */
function concerto_default_respond_actions () {}

/**
 * Respond Form
 */
function concerto_default_respond_form () {}

/**
 * Markup inside the respond <div>, after the Respond form
 */
function concerto_default_after_respond () {}

/**
 * Default Sidebars
 */
function concerto_default_sidebars() {
	require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'sidebar.php';
}

/**
 * Markup inside the Sidebars section and before the first widget
 */
function concerto_default_before_sidebars () {}

/**
 * Markup inside the widget, before the widget title
 */
function concerto_default_before_widget () {}

/**
 * Widget Title
 */
function concerto_default_widget_title () {}

/**
 * Markup inside the widget, after the widget content
 */
function concerto_default_after_widget () {}

/**
 * Markup inside the Sidebars section and after the last widget
 */
function concerto_default_after_sidebars () {}


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