<?php

/**
 * Markup inside the Content section and just above the loop
 */
function concerto_default_before_content () {}

/**
 * The Loop
 */
function concerto_default_loop () {
	new ConcertoLoop();
}

/**
 * 404 Page
 */
function concerto_default_404 () {}

/**
 * Search Form
 */
function concerto_default_search () {}

/**
 * Custom Page
 */
function concerto_default_custom_page () {}

/**
 * Markup inside the article, before the title
 */
function concerto_default_before_article () {}

/**
 * Article Title
 */
function concerto_default_article_title () {
	if (!is_single()) {
	?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php
	} else {
	?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<?php
	}
}

/**
 * Article Meta
 */
function concerto_default_article_meta () {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}

/**
 * Article Content
 */
function concerto_default_article_content () {
	the_content();
}

/**
 * Article Content
 */
function concerto_default_article_pages () {
	wp_link_pages(array('before' => '<div class="page-link"><strong>Pages: </strong>', 'after' => '</div>'));
}

/**
 * Article Comments
 */
function concerto_default_article_comments () {
	new ConcertoComments();
}

/**
 * Article Utility <div>
 */
function concerto_default_article_utility () {
	if ( get_the_author_meta( 'description' ) ) :  ?>
	<div id="entry-author-info">
		<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
		</div>
		<div id="author-description">
			<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
			<?php the_author_meta( 'description' ); ?>
			<div id="author-link">
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
					<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
				</a>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ( count( get_the_category() ) ) : ?>
		<span class="cat-links">
			<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php endif; ?>
	<?php
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list ):
	?>
		<span class="tag-links">
			<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php endif; ?>
	<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
	<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' );
}

/**
 * Markup inside the article, after the utility <div>
 */
function concerto_default_after_article () {
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
function concerto_default_after_content () {}

/**
 * Article Navigation
 */
function concerto_default_article_navigation () {
	if (!is_single()) {
		echo numbered_page_nav();
	}
}

?>