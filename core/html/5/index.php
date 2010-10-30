
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
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div class="container">
			<div id="branding">
				<h1 id="site-title"><span><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span></h1>
				<p id="site-description"><?php bloginfo('description'); ?></p>
			</div>
			<div id="access"></div>
		</div>
	</div>
	<div id="main">
		<div class="container">
		
		</div>
	</div>
	<div id="footer">
		<div class="container">
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
			</div>
		</div>
	</div>
</div>
</body>
</html>