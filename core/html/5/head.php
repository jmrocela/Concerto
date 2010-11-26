<!DOCTYPE html>
<html dir="<?php bloginfo('text_direction'); ?>" lang="<?php bloginfo('language'); ?>">
<head>
<?php do_action('concerto_hook_head'); ?>
</head>
<?php $custom = (CONCERTO_CONFIG_CUSTOM == 'custom') ? 'custom-page': 'normal-page'; ?>
<body <?php body_class(array('concerto', $custom)); ?>>
<?php do_action('concerto_hook_start'); ?>
<div id="wrapper" class="<?php echo (get_option('concerto_design_layout') == 'fixed') ? 'fixed': 'fullwidth'; ?>">