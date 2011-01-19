<?php
do_action('concerto_hook_before_article');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 id="error404">You stumbled upon a non-existing entry or a broken link.<br/>Check your URL and try again.</h2>
	<div id="centersearch"><?php do_action('concerto_hook_404'); ?></div>
</div>
<?php
do_action('concerto_hook_after_article');
do_action('concerto_hook_article_comments');
?>