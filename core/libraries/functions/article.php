<?php

/**
 * Markup inside the Content section and just above the loop
 */
function concerto_hook_default_before_content () {}

/**
 * The Loop
 */
function concerto_hook_default_loop () {
	new ConcertoLoop();
}

/**
 * 404 Page
 */
function concerto_hook_default_404 () {}

/**
 * Search Form
 */
function concerto_hook_default_search () {}

/**
 * Custom Page
 */
function concerto_hook_default_custom_page () {
	echo 'asd';
}

/**
 * Markup inside the article, before the title
 */
function concerto_hook_default_before_article () {}

/**
 * Article Title
 */
function concerto_hook_default_article_title () {
	if (!is_single()) {
	?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php
	} else {
	?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php
	}
}

/**
 * Article Meta
 */
function concerto_hook_default_article_meta () {
	printf('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'meta-prep meta-prep-author', sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>', get_permalink(), esc_attr(get_the_time()), get_the_date()), sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>', get_author_posts_url(get_the_author_meta('ID')), sprintf(esc_attr__('View all posts by %s'), get_the_author()), get_the_author()));
}

/**
 * Article Content
 */
function concerto_hook_default_article_content () {
	the_content();
}

/**
 * Article Content
 */
function concerto_hook_default_article_pages () {
	wp_link_pages(array('before' => '<div class="page-link"><strong>Pages: </strong>', 'after' => '</div>'));
}

/**
 * Article Comments
 */
function concerto_hook_default_article_comments () {
	new ConcertoComments();
}

/**
 * Article Utility <div>
 */
function concerto_hook_default_article_utility () {
	if (get_the_author_meta('description')) {
	?>
	<div id="entry-author-info">
		<div id="author-avatar">
			<?php echo get_avatar(get_the_author_meta('user_email'), 60); ?>
		</div>
		<div id="author-description">
			<h2><?php printf(esc_attr__('About %s'), get_the_author()); ?></h2>
			<?php the_author_meta('description'); ?>
			<div id="author-link">
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
					<?php printf('View all posts by %s <span class="meta-nav">&rarr;</span>', get_the_author()); ?>
				</a>
			</div>
		</div>
	</div>
	<?php
	}
	if (count(get_the_category())) {
	?>
		<span class="cat-links">
			<?php printf('<span class="%1$s">Posted in</span> %2$s', 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list(', ')); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php
	}
	$tags_list = get_the_tag_list('', ', ');
	if ($tags_list) {
	?>
		<span class="tag-links">
			<?php printf('<span class="%1$s">Tagged</span> %2$s', 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php
	}	
	?>
	<span class="comments-link"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
	<?php edit_post_link('Edit', '<span class="meta-sep">|</span> <span class="edit-link">', '</span>');
}

/**
 * Markup inside the article, after the utility <div>
 */
function concerto_hook_default_after_article () {
	if (is_single()) {
		?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_post_link(); ?></div>
				<div class="nav-next"><?php previous_post_link(); ?></div>
			</div>
		<?php
	}
}

/**
 * Markup inside the Content section and just below the loop
 */
function concerto_hook_default_after_content () {}

/**
 * Article Navigation
 */
function concerto_hook_default_article_navigation () {
	if (!is_single()) {
		echo numbered_page_nav();
	}
}

?>