<?php
do_action('concerto_hook_before_article');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php do_action('concerto_hook_article_title'); ?>
	</header>
	<section class="entry-content">
		<?php do_action('concerto_hook_article_content'); ?>
	</section>
</article>
<?php
do_action('concerto_hook_after_article');
do_action('concerto_hook_article_comments');
?>