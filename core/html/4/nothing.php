<?php
do_action('concerto_hook_before_article');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 id="errornothing">Sorry, but there seems to be no results found for your request.</h2>
	<div id="centersearch"><?php do_action('concerto_hook_no_results'); ?></div>
</div>
<?php
do_action('concerto_hook_after_article');
do_action('concerto_hook_article_comments');
?>