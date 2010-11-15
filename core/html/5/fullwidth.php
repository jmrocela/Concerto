	<header id="header">
		<?php do_action('concerto_before_header'); ?>
		<div class="container">
			<?php do_action('concerto_header'); ?>
		</div>
		<?php do_action('concerto_after_header'); ?>
	</header>
	<div id="content">
		<div class="container">
			<?php do_action('concerto_content'); ?>
			<?php do_action('concerto_sidebars'); ?>
		</div>
	</div>
	<footer id="footer">
		<?php do_action('concerto_before_footer'); ?>
		<div class="container">
			<?php do_action('concerto_footer'); ?>
		</div>
		<?php do_action('concerto_after_footer'); ?>
	</footer>