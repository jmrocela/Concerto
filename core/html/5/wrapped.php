<div class="container">
	<header id="header">
		<?php do_action('concerto_before_header'); ?>
		<?php do_action('concerto_header'); ?>
		<?php do_action('concerto_after_header'); ?>
	</header>
	<?php do_action('concerto_header_content'); ?>
	<div id="main">
		<?php do_action('concerto_content'); ?>
	</div>
	<?php do_action('concerto_content_footer'); ?>
	<footer id="footer">
		<?php do_action('concerto_before_footer'); ?>
		<?php do_action('concerto_footer'); ?>
		<?php do_action('concerto_after_footer'); ?>
	</footer>
</div>