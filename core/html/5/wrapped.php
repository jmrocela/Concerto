	<div id="header">
		<?php do_action('concerto_before_header'); ?>
		<div class="container">
			<?php do_action('concerto_header'); ?>
		</div>
		<?php do_action('concerto_after_header'); ?>
	</div>
	<div id="main">
		<div class="container">
			<?php do_action('concerto_content'); ?>
		</div>
	</div>
	<div id="footer">
		<?php do_action('concerto_before_footer'); ?>
		<div class="container">
			<?php do_action('concerto_footer'); ?>
		</div>
		<?php do_action('concerto_after_footer'); ?>
	</div>