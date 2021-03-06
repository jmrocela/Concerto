<!DOCTYPE html>
<html dir="<?php bloginfo('text_direction'); ?>" lang="<?php bloginfo('language'); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php do_action('concerto_hook_title'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php do_action('concerto_hook_head'); ?>
</head>
<?php $custom = (CONCERTO_CONFIG_CUSTOM == 'custom') ? 'custom-page': 'normal-page'; ?>
<body <?php body_class(array('concerto', $custom, 'html5' , 'column' . CONCERTO_CONFIG_COLUMNS_ORDER . 'order')); ?>>
<?php do_action('concerto_hook_start'); ?>
<div id="wrapper" class="<?php echo (CONCERTO_CONFIG_LAYOUT == 'wrapped') ? 'wrapped': 'fullwidth'; ?>">