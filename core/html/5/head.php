<!DOCTYPE html>
<html dir="<?php bloginfo('text_direction'); ?>" lang="<?php bloginfo('language'); ?>">
<head>
<?php do_action('concerto_head'); ?>
</head>
<body <?php body_class('concerto'); ?>>
<?php do_action('concerto_start'); ?>
<div id="wrapper" class="<?php echo (get_option('concerto_design_layout') == 'fixed') ? 'fixed': 'fullwidth'; ?>">