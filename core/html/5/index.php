<!--
 TODO:
 DETERMINE WHETHER THIS IS A FULL WIDTH
 PAGE, SEARCH, CATEGORY, 404 or the INDEX
-->
<section id="content">
<?php do_action('concerto_before_content'); ?>
<?php do_action('concerto_loop'); ?>
<?php do_action('concerto_after_content'); ?>
</section><!-- #content -->
<?php do_action('concerto_sidebars'); ?>