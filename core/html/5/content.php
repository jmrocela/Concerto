<section id="content">
<?php do_action('concerto_before_content'); ?>
<?php do_action('concerto_loop'); ?>
<?php do_action('concerto_after_content'); ?>
</section>
<?php
if (!CONCERTO_CONFIG_CUSTOM) {
	do_action('concerto_sidebars'); 
}
?>