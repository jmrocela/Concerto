<?php

/**
 * Markup just outside and before the commentlist
 */
function concerto_hook_default_before_commentlist () {}

/**
 * Comment List
 */
function concerto_hook_default_commentlist () {
	?>
	<ol class="commentlist">
		<?php wp_list_comments(array('callback' => array('ConcertoComments', 'commentlist'), 'type' => 'comment')); ?>
	</ol>
	<?php
}

function concerto_hook_default_comments () {
	$stage = get_option('concerto_stage');
	$index = get_option('concerto_' . $stage . '_design_display_comments_index');
	foreach ($index as $i) {
		if (($i - 1) == 0 && get_option('concerto_' . $stage . '_design_display_comments_comments') == 1) {
			concerto_default_common_comment_navigation();
			concerto_default_commentlist_title();
			concerto_hook_default_commentlist();
			concerto_default_common_comment_navigation();
		}
		if (($i - 1) == 1 && get_option('concerto_' . $stage . '_design_display_comments_pings') == 1) {
			concerto_default_comment_pings();
		}
		if (($i - 1) == 2 && get_option('concerto_' . $stage . '_design_display_comments_reply') == 1) {
			ConcertoComments::respond();
		}
	}
}

/**
 * Markup inside the comment container, before the Comment title
 */
function concerto_hook_default_before_comment () {}

/**
 * Comment vcard
 */
function concerto_hook_default_comment_vcard () {
	global $comment;
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_design_comments_display_avatar') == 1) {
		echo get_avatar($comment, get_option('concerto_' . $stage . '_design_comments_avatar_size'));
	}
	if (get_option('concerto_' . $stage . '_design_comments_display_author') == 1) {
		printf('%s <span class="says">says:</span>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
	}
}

/**
 * Comment metadata
 */
function concerto_hook_default_comment_metadata () {
	global $comment;
	$stage = get_option('concerto_stage');
	if (get_option('concerto_' . $stage . '_design_comments_display_date') == 1 || get_option('concerto_' . $stage . '_design_comments_display_time') == 1) {
	?>
	<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
	<?php
		if (get_option('concerto_' . $stage . '_design_comments_display_date') == 1 && get_option('concerto_' . $stage . '_design_comments_display_time') == 1) {
			printf('%1$s at %2$s', get_comment_date(),  get_comment_time());
		} else if (get_option('concerto_' . $stage . '_design_comments_display_date') == 1 && get_option('concerto_' . $stage . '_design_comments_display_time') == 0) {
			printf('%1$s', get_comment_date(get_option('concerto_' . $stage . '_design_comments_time_format')));
		} else {
			printf('%1$s', get_comment_time());
		}
	?>
	</a>
	<?php
	}
	if (get_option('concerto_' . $stage . '_design_comments_display_edit') == 1) {
		edit_comment_link('(Edit)', ' ');
	}
}

/**
 * Comment body
 */
function concerto_hook_default_comment_body () {
	comment_text();
}

/**
 * Markup inside the comment container, after the Comment body
 */
function concerto_hook_default_after_comment () {}

/**
 * Markup just outside and after the commentlist
 */
function concerto_hook_default_after_commentlist () {}

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

function concerto_default_commentlist_title () {
	$comments_title = array('One Response to %2$s', '%1$s Responses to %2$s');
	$comments_title = apply_filters('concerto_commentlist_title', $comments_title);
	?>
	<h3 id="comments-title"><?php printf(_n($comments_title[0], $comments_title[1], ConcertoComments::commentCount()), number_format_i18n(ConcertoComments::commentCount()), '<em>' . get_the_title() . '</em>'); ?></h3>
	<?php
}

/**
 * Displays the list of Trackbacks and Pingbacks
 */
function concerto_default_comment_pings () {
	$comments_pings = array('One Trackback', '%1$s Trackbacks');
	$comments_pings = apply_filters('concerto_comment_pings_title', $comments_pings);
	if (ConcertoComments::pingCount()) {
	?>
	<h3><?php printf(_n($comments_pings[0], $comments_pings[1], ConcertoComments::pingCount()), number_format_i18n(ConcertoComments::pingCount())); ?></h3>
	<ol class="pinglist">
		<?php wp_list_comments(array('callback' => array('ConcertoComments', 'pinglist'), 'type' => 'pings')); ?>
	</ol>
	<?php
	}
}

/**
 * Comment Pingback
 */
function concerto_hook_default_pinglist () {
	$stage = get_option('concerto_stage');
	comment_author_link();
	if (get_option('concerto_' . $stage . '_design_comments_trackback_date') == 1) {
		echo ' on ' . get_comment_date() . ' ';
	}
	edit_comment_link('(Edit)', ' ' );
}

/**
 * ---------------------------------------------
 * Abstractions to the Concerto Hook Conventions
 * ---------------------------------------------
 */
function concerto_hook_default_before_respond () { do_action('concerto_hook_before_respond'); }

function concerto_hook_default_respond_after_login () { do_action('concerto_hook_respond_after_login'); }

function concerto_hook_default_respond_top () { do_action('concerto_hook_respond_top'); }

function concerto_hook_default_respond_after_loggedin () { do_action('concerto_hook_respond_after_loggedin'); }

function concerto_hook_default_respond_before_notes () { do_action('concerto_hook_respond_before_notes'); }

function concerto_hook_default_respond_before_fields () { do_action('concerto_hook_respond_before_fields'); }

function concerto_hook_default_respond_after_fields () { do_action('concerto_hook_respond_after_fields'); }

function concerto_hook_default_respond_after_notes () { do_action('concerto_hook_respond_after_notes'); }

function concerto_hook_default_respond_form () { do_action('concerto_hook_respond_form'); }

function concerto_hook_default_after_respond () { do_action('concerto_hook_after_respond'); }

function concerto_hook_default_respond_closed () { do_action('concerto_hook_respond_closed'); }

?>