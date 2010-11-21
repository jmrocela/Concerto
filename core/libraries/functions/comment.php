<?php

/**
 * Markup just outside and before the commentlist
 */
function concerto_default_before_commentlist () {
	concerto_default_common_comment_navigation();
}

/**
 * Comment List
 */
function concerto_default_commentlist () {
	?>
	<ol class="commentlist">
		<?php wp_list_comments(array('callback' => array('ConcertoComments', 'commentlist'))); ?>
	</ol>
	<?php
}

/**
 * Markup inside the comment container, before the Comment title
 */
function concerto_default_before_comment () {}

/**
 * Comment vcard
 */
function concerto_default_comment_vcard () {
	echo get_avatar($comment, 40);
	printf('%s <span class="says">says:</span>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
}

/**
 * Comment metadata
 */
function concerto_default_comment_metadata () {
	?>
	<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
	<?php printf('%1$s at %2$s', get_comment_date(),  get_comment_time()); ?></a><?php edit_comment_link('(Edit)', ' ');
}

/**
 * Comment body
 */
function concerto_default_comment_body () {
	comment_text();
}

/**
 * Markup inside the comment container, after the Comment body
 */
function concerto_default_after_comment () {}

/**
 * Markup just outside and after the commentlist
 */
function concerto_default_after_commentlist () {
	concerto_default_common_comment_navigation();
}

function concerto_default_common_comment_navigation () {
	if (get_comment_pages_count() > 1 && get_option('page_comments')) {
	?>
		<div class="navigation">
			<div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
			<div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>'); ?></div>
		</div>
	<?php
	}
}

/**
 * Comment Pingback
 */
function concerto_default_comment_pingback () {
	?>
	<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link('(Edit)', ' ' ); ?></p>
	<?php
}

/**
 * ---------------------------------------------
 * Abstractions to the Concerto Hook Conventions
 * ---------------------------------------------
 */
function concerto_default_before_respond () { do_action('concerto_before_respond'); }

function concerto_default_respond_after_login () { do_action('concerto_respond_after_login'); }

function concerto_default_respond_top () { do_action('concerto_respond_top'); }

function concerto_default_respond_after_loggedin () { do_action('concerto_respond_after_loggedin'); }

function concerto_default_respond_before_notes () { do_action('concerto_respond_before_notes'); }

function concerto_default_respond_before_fields () { do_action('concerto_respond_before_fields'); }

function concerto_default_respond_after_fields () { do_action('concerto_respond_after_fields'); }

function concerto_default_respond_after_notes () { do_action('concerto_respond_after_notes'); }

function concerto_default_respond_form () { do_action('concerto_respond_form'); }

function concerto_default_after_respond () { do_action('concerto_after_respond'); }

function concerto_default_respond_closed () { do_action('concerto_respond_closed'); }

?>