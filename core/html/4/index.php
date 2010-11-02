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
<div id="wrapper" class="hfeed">
	<div id="header">
		<?php do_action('concerto_before_header'); ?>
		<div class="container">
			<?php do_action('concerto_header'); ?>
			<div id="branding">
				<?php do_action('concerto_branding'); ?>
				<h1 id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></h1>
				<p id="site-description"><?php bloginfo('description'); ?></p>
			</div>
			<div id="access">
				<?php do_action('concerto_access'); ?>
			</div>
		</div>
		<?php do_action('concerto_after_header'); ?>
	</div>
	<div id="main">
		<div class="container">
		
		</div>
	</div>
	<div id="footer">
		<?php do_action('concerto_before_footer'); ?>
		<div class="container">
			<?php do_action('concerto_footer'); ?>
			<div id="site-info">
				Copyright <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
			</div>
			<div id="site-generator">
				Powered by <a href="http://themeconcert.com/concerto">the Concerto Theme</a> from ThemeConcert
			</div>
			<div id="site-login">
				<a href="<?php bloginfo('url'); ?>/wp-admin">Administration Login</a>
			</div>
			<div id="footer-additional">
				Additional Text for your Footer
				<?php wp_footer(); ?>
			</div>
		</div>
		<?php do_action('concerto_after_footer'); ?>
	</div>
</div>
<?php do_action('concerto_end'); ?>
</body>
</html>