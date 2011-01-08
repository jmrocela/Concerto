<?php 
$stage = get_option('concerto_stage');
if (get_option('concerto_' . $stage . '_design_layout_columns') >=  2) {
?>
<div class="sidebars concerto_sidebar_main">
<?php do_action('concerto_hook_before_sidebars'); ?>
<?php do_action('concerto_hook_before_sidebar_1'); ?>
<ul>
<?php if (!dynamic_sidebar('Main Sidebar')) { ?>
	<li class="widget widget_concerto_default">
		<h2 class="widgettitle">Default Main Sidebar</h2>
		<p>Concerto is a widgetized Theme. You can Add widgets in the administration dashboard. Go to Themes &gt; Widgets and set your sidebar there.</p>
	</li>
<?php } ?>
</ul>
<?php do_action('concerto_hook_after_sidebar_1'); ?>
<?php do_action('concerto_hook_after_sidebars'); ?>
</div>
<?php } ?>

<?php if (get_option('concerto_' . $stage . '_design_layout_columns') == 3) { ?>
<div class="sidebars concerto_sidebar_secondary">
<?php do_action('concerto_hook_before_sidebars'); ?>
<?php do_action('concerto_hook_before_sidebar_2'); ?>
<ul>
<?php if (!dynamic_sidebar('Second Sidebar')) { ?>
	<li class="widget widget_concerto_default">
		<h2 class="widgettitle">Default Secondary Sidebar</h2>
		<p>Concerto is a widgetized Theme. You can Add widgets in the administration dashboard. Go to Themes &gt; Widgets and set your sidebar there.</p>
	</li>
<?php } ?>
</ul>
<?php do_action('concerto_hook_after_sidebar_2'); ?>
<?php do_action('concerto_hook_after_sidebars'); ?>
</div>
<?php } ?>