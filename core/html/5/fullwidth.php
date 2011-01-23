<header id="header">
	<div class="container">
		<?php do_action('concerto_hook_before_header'); ?>
		<?php do_action('concerto_hook_header'); ?>
		<?php do_action('concerto_hook_after_header'); ?>
	</div>
</header>
<?php do_action('concerto_hook_header_content'); ?>
<div id="main">
	<div class="container">
		<?php do_action('concerto_hook_content'); ?>
	</div>
</div>
<?php do_action('concerto_hook_content_footer'); ?>
<footer id="footer">
	<div class="container">
		<?php do_action('concerto_hook_before_footer'); ?>
		<?php do_action('concerto_hook_footer'); ?>
		<?php do_action('concerto_hook_after_footer'); ?>
	</div>
</footer>