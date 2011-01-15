<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="<?php bloginfo('text_direction'); ?>" lang="<?php bloginfo('language'); ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>"/>
	<title><?php do_action('concerto_hook_title'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php do_action('concerto_hook_head'); ?>
</head>
<?php $custom = (CONCERTO_CONFIG_CUSTOM == 'custom') ? 'custom-page': 'normal-page'; ?>
<body <?php body_class(array('concerto', $custom, 'html4' , 'column' . CONCERTO_CONFIG_COLUMNS_ORDER . 'order')); ?>>
<?php do_action('concerto_hook_start'); ?>
<div id="wrapper" class="<?php echo (CONCERTO_CONFIG_LAYOUT == 'wrapped') ? 'wrapped': 'fullwidth'; ?>">