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
	$stage = get_option('concerto_stage');
	$postedon = 'Posted on';
	$by = 'by';
	?>
		<?php if (is_front_page() || (is_single() && get_option('concerto_' . $stage . '_design_bylines_post_published_date') == 1) || (is_page() && get_option('concerto_' . $stage . '_design_bylines_page_published_date') == 1)) { ?>
		<span class="meta-prep meta-prep-author"><?php echo apply_filters('concerto_article_byline_postedon', $postedon); ?></span>
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_time()); ?>" rel="bookmark">
			<span class="entry-date"><?php the_date(); ?></span>
		</a>
		<?php } ?>
		<?php if (is_front_page() || (is_single() && get_option('concerto_' . $stage . '_design_bylines_post_author') == 1) || (is_page() && get_option('concerto_' . $stage . '_design_bylines_page_author') == 1)) { ?>
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
	$stage = get_option('concerto_stage');
	if ((is_home() && is_front_page()) && get_option('concerto_' . $stage . '_design_posts_excerpts') == 1) {
		the_excerpt();
	} else {
		the_content(get_option('concerto_' . $stage . '_design_posts_readmore_text'));
	}
}

/**
 * Article Content
 */
function concerto_hook_default_article_excerpt () {
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_design_archive_display') == 1) {
		the_excerpt();
	} else {
		the_content(get_option('concerto_' . $stage . '_design_posts_readmore_text'));
	}
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
	$stage = get_option('concerto_stage');
	$postedin = 'Posted in';
	$tagged = 'Tagged';
	$comments_text = array('Leave a Comment', '1 Comment', '% Comments', '', 'Comments Off');

	if (count(get_the_category())) {
		if (get_option('concerto_' . $stage . '_design_meta_categories') == 1) {
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
		if (get_option('concerto_' . $stage . '_design_meta_tags') == 1) {
	?>
		<span class="tag-links">
			<span class="entry-utility-prep entry-utility-prep-tag-links"><?php echo apply_filters('concerto_article_meta_tagged', $tagged); ?></span> <?php echo $tags_list; ?>
		</span>
		<span class="meta-sep">|</span>
	<?php
		}
	}	
	if (get_option('concerto_' . $stage . '_design_meta_comments_link') == 1) {
	$comments_text = apply_filters('concerto_article_meta_commentstext', $comments_text);
	add_filter('get_comments_number', 'concerto_fix_comment_number'); //Fixes the true comment count. Separates it from Pings
	?>
	<span class="comments-link"><?php comments_popup_link($comments_text[0], $comments_text[1], $comments_text[2], $comments_text[3], $comments_text[4]); ?></span>
	<?php
	} 
	if (get_option('concerto_' . $stage . '_design_meta_show_edit_link') == 1) {
		edit_post_link('Edit', '<span class="meta-sep">|</span> <span class="edit-link">', '</span>');
	}
}

/**
 * Author Description box
 */
function concerto_hook_default_author_description () {
	$avatarsize = 60;
	$abouttheauthor = 'About %s';
	$viewallposts = 'View all posts by %s <span class="meta-nav">&rarr;</span>';
	if (get_the_author_meta('description') && is_single()) {
	?>
	<div id="entry-author-info">
		<div id="author-avatar">
			<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('concerto_author_description_avatarsize', $avatarsize)); ?>
		</div>
		<div id="author-description">
			<h2><?php printf(esc_attr__(apply_filters('concerto_author_description_title', $abouttheauthor)), get_the_author()); ?></h2>
			<?php the_author_meta('description'); ?>
			<div id="author-link">
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
					<?php printf(apply_filters('concerto_author_description_link', $viewallposts), get_the_author()); ?> 				
				</a>
			</div>
		</div>
	</div>
	<?php
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
	$stage = get_option('concerto_stage');
	if (is_single() && get_option('concerto_' . $stage . '_design_posts_navigation') == 1) {
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
	global $wp_query;
	$stage = get_option('concerto_stage');
	if (!is_single()) {
		if (get_option('concerto_' . $stage . '_design_paginate') == 1) {
			echo numbered_page_nav();
		} else {
			if ( $wp_query->max_num_pages > 1) {
				?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div>
				<?php
			}
		}
	}
}

?>