<?php
do_action('concerto_hook_before_article');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div>
		<?php do_action('concerto_hook_article_title'); ?>
	</div>
	<div class="entry-content">
		<?php do_action('concerto_hook_article_content'); ?>
	</div>
</div>
<?php
do_action('concerto_hook_after_article');
do_action('concerto_hook_article_comments');
?>