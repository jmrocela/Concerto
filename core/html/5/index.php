<?php
do_action('concerto_hook_before_article');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php do_action('concerto_hook_article_title'); ?>
		<div class="entry-meta">
			<?php do_action('concerto_hook_article_byline'); ?>
		</div>
	</header>
	<section class="entry-content">
		<?php do_action('concerto_hook_article_content'); ?>
	</section>
	<footer>
		<div class="entry-utility">
			<?php do_action('concerto_hook_article_meta'); ?>
		</div>
	</footer>
</article>
<?php
do_action('concerto_hook_after_article');
do_action('concerto_hook_article_comments');
?>