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
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing).
 */

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
}

/**
 * The Default page title of the theme
 */
function concerto_hook_title() {
	if (is_front_page() && is_home()) {
		$title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
	} else {
		$title = trim(wp_title('', false));
	}
	echo apply_filters('concerto_title', $title);
	# NOTE: AS FILTER?
	# have Titles from specific post if specified.
	# if (get_post_meta($post->ID, 'concerto_custom_post_title')) >>> as title
}

/**
 * Homepage Meta
 */
function concerto_hook_meta() {
	$stage = get_option('concerto_stage');
	if (is_front_page() && is_home()) {
		if (get_option('concerto_' . $stage . '_general_homepage_description')) {
		?>
		<meta name="description" content="<?php echo get_option('concerto_' . $stage . '_general_homepage_description'); ?>" />
		<?php
		}
		if (get_option('concerto_' . $stage . '_general_homepage_keywords')) {
		?>
		<meta name="keywords" content="<?php echo get_option('concerto_' . $stage . '_general_homepage_keywords'); ?>" />
		<?php
		}
	} // else individual POST: handled by SEO extension?
}

/**
 * Scripts for the Theme
 */
function concerto_hook_scripts() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_scripts_libraries_jquery') == 1) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('concerto-base', get_bloginfo('stylesheet_directory') . '/core/scripts/concerto.js');
	}
	if (get_option('concerto_' . $stage . '_general_scripts_libraries_jquery_ui') == 1) {
		wp_enqueue_script('jquery-ui-core'); //load all UI libs?
	}
}

/**
 * Additional Head Scripts
 */
function concerto_hook_scripts_head() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_scripts_head')) {
		$hasScript = strpos(get_option('concerto_' . $stage . '_general_scripts_head'), '<script');
		echo ($hasScript === false) ? '<script type="text/javascript">': '';
		echo get_option('concerto_' . $stage . '_general_scripts_head');
		echo ($hasScript === false) ? '</script>': '';
	}
}

/**
 * Additional Footer Scripts
 */
function concerto_hook_scripts_footer() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_scripts_footer')) {
		$hasScript = strpos(get_option('concerto_' . $stage . '_general_scripts_footer'), '<script');
		echo ($hasScript === false) ? '<script type="text/javascript">': '';
		echo get_option('concerto_' . $stage . '_general_scripts_footer');
		echo ($hasScript === false) ? '</script>': '';
	}
}

/**
 * Syndication link in the <head> tag
 */
function concerto_hook_syndication() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_syndication_url')) {
	?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Feed" href="<?php echo get_option('concerto_' . $stage . '_general_syndication_url'); ?>" />
	<?php
	} else {
	?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<?php
	}
}

/**
 * Site Favicon
 */
function concerto_hook_favicon() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_favicon')) {
	?>
	<link rel="shortcut icon" href="<?php echo get_option('concerto_general_favicon'); ?>" type="image/x-icon" />
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
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_design_header_mode') == 2 && get_option('concerto_' . $stage . '_design_header_image')) {
	?>
		<div id="site-logo">
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('concerto_' . $stage . '_design_header_image'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
		</div>
	<?php
	}

	if ((!get_option('concerto_' . $stage . '_design_header_image')) || (get_option('concerto_' . $stage . '_design_header_mode') == 1) || (get_option('concerto_' . $stage . '_design_header_mode') == 2 && get_option('concerto_' . $stage . '_design_header_image')) || (get_option('concerto_' . $stage . '_design_header_mode') == 3 && get_option('concerto_' . $stage . '_design_header_image'))) {
		if (get_option('concerto_' . $stage . '_design_header_title') == 1) {
			if (!is_single() && !is_page()) {
			?>
			<h1 id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></h1>
			<?php
			} else {
			?>
			<div id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></div>
			<?php
			}
		}
	}
}

/**
 * Default Branding Mark up: Site Description
 */
function concerto_hook_default_branding_site_description() {
	$stage = get_option('concerto_stage');
	if ((!get_option('concerto_' . $stage . '_design_header_image')) || (get_option('concerto_' . $stage . '_design_header_mode') == 1) || (get_option('concerto_' . $stage . '_design_header_mode') == 2 && get_option('concerto_' . $stage . '_design_header_image')) || (get_option('concerto_' . $stage . '_design_header_mode') == 3 && get_option('concerto_' . $stage . '_design_header_image'))) {
		if (get_option('concerto_' . $stage . '_design_header_description') == 1) {
		?>
		<p id="site-description"><?php bloginfo('description'); ?></p>
		<?php
		}
	}
}

/**
 * Default Menu
 */
function concerto_hook_default_access() {
	$stage = get_option('concerto_stage');
	$container = (CONCERTO_CONFIG_HTML == 5) ? 'nav': 'div';

	if (get_option('concerto_' . $stage . '_general_menu') == 'default') {
		add_filter('wp_nav_menu_items', 'concerto_filter_additional_nav_items');
		add_filter('wp_list_pages', 'concerto_filter_additional_nav_items');
		wp_nav_menu(array('container' => $container, 'show_home' => false, 'theme_location' => 'primary')); //not outputting correct element: DIV should be NAV on HTML5
	} else {
		add_filter('concerto_filter_access', 'concerto_filter_additional_nav_items');
		buildConcertoNavigation();
	}

}

/**
 * Filter for Nav items
 */
function concerto_filter_additional_nav_items($items) {
	$stage = get_option('concerto_stage');
	$feed = (get_option('concerto_' . $stage . '_general_syndication_url')) ? get_option('concerto_' . $stage . '_general_syndication_url'): get_bloginfo('rss2_url');
	
	if (is_home()) {
		$home = (get_option('concerto_' . $stage . '_general_menu_show_home') == 1) ? '<li class="current_page_item"><a href="' . get_bloginfo('url') . '">Home</a></li>': '';
	} else {
		$home = (get_option('concerto_' . $stage . '_general_menu_show_home') == 1) ? '<li><a href="' . get_bloginfo('url') . '">Home</a></li>': '';
	}
	
	$feed = (get_option('concerto_' . $stage . '_general_menu_show_feed') == 1) ? '<li id="feedlink"><a href="' . $feed . '">Subscribe</a></li>': '';
	$items = $home . $items . $feed;
	return $items;
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
	switch (CONCERTO_CONFIG_COLUMNS_ORDER) {
		case 2:
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar1', 10);
			add_action('concerto_hook_main', 'concerto_hook_default_content_main', 20);
		break;
		case 3:
			add_action('concerto_hook_main', 'concerto_hook_default_content_main', 10);
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar1', 20);
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar2', 30);
		break;
		case 4:
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar1', 10);
			add_action('concerto_hook_main', 'concerto_hook_default_content_main', 20);
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar2', 30);
		break;
		case 5:
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar1', 10);
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar2', 20);
			add_action('concerto_hook_main', 'concerto_hook_default_content_main', 30);
		break;
		default:
		case 1:
			add_action('concerto_hook_main', 'concerto_hook_default_content_main', 10);
			add_action('concerto_hook_main', 'concerto_hook_default_content_sidebar1', 20);
		break;
	}

	require CONCERTO_HTML_DIR . 'content.php';
}

/**
 * Default Content
 */
function concerto_hook_default_content_main() {
?>
<section id="content">
<?php do_action('concerto_hook_before_content'); ?>
<?php do_action('concerto_hook_loop'); ?>
<?php do_action('concerto_hook_after_content'); ?>
</section>
<?php
}

/**
 * Default Sidebar 1
 */
function concerto_hook_default_content_sidebar1() {
	if (!CONCERTO_CONFIG_CUSTOM) {
		do_action('concerto_hook_sidebar1'); 
	}
}

/**
 * Default Sidebar 2
 */
function concerto_hook_default_content_sidebar2() {
	if (!CONCERTO_CONFIG_CUSTOM) {
		do_action('concerto_hook_sidebar2'); 
	}
}

/**
 * Default Sidebars
 */
function concerto_hook_default_sidebar1() {
	require CONCERTO_HTML_DIR . 'sidebar1.php';
}

function concerto_hook_default_sidebar2() {
	require CONCERTO_HTML_DIR . 'sidebar2.php';
}

/**
 * Search Form
 */
function concerto_hook_default_searchform() {
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>
<?php
}

/**
 * Content before the Footer area
 */
function concerto_hook_default_before_footer() {}

/**
 * Default Footer Content
 */
function concerto_hook_default_footer_copyright() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_footer_copyright') == 1) {
	?>
	<div id="site-info">
		<?php
		if (get_option('concerto_' . $stage . '_general_footer_copyright_line')) {
			echo get_option('concerto_' . $stage . '_general_footer_copyright_line');
		} else {
			?>
			Copyright &#0169; <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
			<?php 
		}
		?>
	</div>
	<?php
	}
}

function concerto_hook_default_footer_attribution() {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_general_footer_attribution') == 1) {
	?>
	<div id="site-generator">
		<?php
		if (get_option('concerto_' . $stage . '_general_footer_attribution_line')) {
			echo get_option('concerto_' . $stage . '_general_footer_attribution_line');
		} else {
			?>
			Powered by <a href="http://themeconcert.com/concerto">the Concerto Theme</a> from ThemeConcert
			<?php 
		}
		?>
	</div>
	<?php
	}
}

/**
 * Default Footer
 *
 * @revisit
 */
function concerto_hook_default_footer() {
?>
<div class="clear"></div>
<?php
}

/**
 * Content after the Footer area
 */
function concerto_hook_default_after_footer() {}

/**
 * Content right before the closing <body> tag
 */
function concerto_hook_default_end() {
?>
<div id="wp-footer">
	<?php wp_footer(); ?>
</div>
<?php
}

?>