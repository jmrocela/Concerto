<div class="container">
	<header id="header">
		<?php do_action('concerto_hook_before_header'); ?>
		<?php do_action('concerto_hook_header'); ?>
		<?php do_action('concerto_hook_after_header'); ?>
	</header>
	<?php do_action('concerto_hook_header_content'); ?>
	<section id="main">
		<?php do_action('concerto_hook_content'); ?>
		<div class="clear"></div>
	</section>
	<?php do_action('concerto_hook_content_footer'); ?>
	<footer id="footer">
		<?php do_action('concerto_hook_before_footer'); ?>
		<?php do_action('concerto_hook_footer'); ?>
		<?php do_action('concerto_hook_after_footer'); ?>
	</footer>
</div>