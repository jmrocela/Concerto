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
function concerto_hook_default_custom_page () {}

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
function concerto_hook_default_article_byline () {
	$postedon = 'Posted on';
	$by = 'by';
	$byline = Concerto::config('design','bylines');
	?>
		<?php if (is_front_page() || (is_single() && $byline['post']['published_date']) || (is_page() && $byline['page']['published_date'])) { ?>
		<span class="meta-prep meta-prep-author"><?php echo apply_filters('concerto_article_byline_postedon', $postedon); ?></span>
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_time()); ?>" rel="bookmark">
			<span class="entry-date"><?php the_date(); ?></span>
		</a>
		<?php } ?>
		<?php if (is_front_page() || (is_single() && $byline['post']['author']) || (is_page() && $byline['page']['author'])) { ?>
		<span class="meta-sep"><?php echo apply_filters('concerto_article_byline_by', $by); ?></span>
		<span class="author vcard">
			<a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="View all posts by <?php the_author(); ?>">
				<?php the_author(); ?>
			</a>
		</span>
		<?php } ?>
	<?php
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
function concerto_hook_default_article_excerpt () {
	the_excerpt();
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
function concerto_hook_default_article_meta () {
	global $post;
	$postedin = 'Posted in';
	$tagged = 'Tagged';
	$comments_text = array('Leave a Comment', '1 Comment', '% Comments', '', 'Comments Off');
	$meta = Concerto::config('design','meta');
	
	if (get_the_author_meta('description') && is_single()) {
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
		if ($meta['categories']) {
	?>
		<span class="cat-links">
			<span class="entry-utility-prep entry-utility-prep-cat-links"><?php echo apply_filters('concerto_article_meta_postedin', $postedin); ?></span> <?php the_category(', '); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php
		}
	}
	$tags_list = get_the_tag_list('', ', ');
	if ($tags_list) {
		if ($meta['tags']) {
	?>
		<span class="tag-links">
			<span class="entry-utility-prep entry-utility-prep-tag-links"><?php echo apply_filters('concerto_article_meta_tagged', $tagged); ?></span> <?php echo $tags_list; ?>
		</span>
		<span class="meta-sep">|</span>
	<?php
		}
	}	
	if ($meta['comments_link']) {
	$comments_text = apply_filters('concerto_article_meta_commentstext', $comments_text);
	add_filter('get_comments_number', 'concerto_fix_comment_number'); //Fixes the true comment count. Separates it from Pings
	?>
	<span class="comments-link"><?php comments_popup_link($comments_text[0], $comments_text[1], $comments_text[2], $comments_text[3], $comments_text[4]); ?></span>
	<?php
	} 
	if ($meta['show_edit_link']) {
		edit_post_link('Edit', '<span class="meta-sep">|</span> <span class="edit-link">', '</span>');
	}
}

/**
 * Fixes the true comment count. Separates it from Pings
 */
function concerto_fix_comment_number($count) {
	$count = ConcertoComments::commentCount();
	return $count;
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