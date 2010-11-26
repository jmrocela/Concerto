<section id="content">
<?php do_action('concerto_hook_before_content'); ?>
<?php do_action('concerto_hook_loop'); ?>
<?php do_action('concerto_hook_after_content'); ?>
</section>
<?php
if (!CONCERTO_CONFIG_CUSTOM) {
	do_action('concerto_hook_sidebars'); 
}
?>