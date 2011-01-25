<div id="header">
	<?php do_action('concerto_hook_before_header'); ?>
	<div class="container">
		<?php do_action('concerto_hook_header'); ?>
	</div>
	<?php do_action('concerto_hook_after_header'); ?>
</div>
<?php do_action('concerto_hook_header_content'); ?>
<div id="main">
	<div class="container">
		<?php do_action('concerto_hook_content'); ?>
	</div>
</div>
<?php do_action('concerto_hook_content_footer'); ?>
<div id="footer">
	<?php do_action('concerto_hook_before_footer'); ?>
	<div class="container">
		<?php do_action('concerto_hook_footer'); ?>
	</div>
	<?php do_action('concerto_hook_after_footer'); ?>
</div>