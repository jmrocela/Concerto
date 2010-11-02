<!DOCTYPE html>
<html dir="<?php bloginfo('text_direction'); ?>" lang="<?php bloginfo('language'); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> &mdash; <?php bloginfo('description'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingbak_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Comments Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<?php do_action('concerto_head'); ?>
</head>
<body <?php body_class('concerto'); ?>>
<?php do_action('concerto_start'); ?>
<div id="wrapper" class="<?php echo get_option('concerto_design_layout'); ?>">