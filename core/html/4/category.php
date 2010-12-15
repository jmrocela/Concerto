<?php
do_action('concerto_hook_before_article');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div>
		<?php do_action('concerto_hook_article_title'); ?>
		<div class="entry-meta">
			<?php do_action('concerto_hook_article_byline'); ?>
		</div>
	</div>
	<div class="entry-content">
		<?php do_action('concerto_hook_article_excerpt'); ?>
	</div>
	<div>
		<div class="entry-utility">
			<?php do_action('concerto_hook_article_meta'); ?>
		</div>
	</div>
</div>
<?php
do_action('concerto_hook_after_article');
do_action('concerto_hook_article_comments');
?>