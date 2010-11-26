<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<?php do_action('concerto_hook_before_comment'); ?>
	<article id="comment-<?php comment_ID(); ?>">
		<header>
		<div class="comment-author vcard">
			<?php do_action('concerto_hook_comment_vcard'); ?>
		</div>
		<?php if ($comment->comment_approved == '0') { ?>
			<em>Your comment is awaiting moderation.</em>
			<br />
		<?php } ?>

		<div class="comment-meta commentmetadata">
			<?php do_action('concerto_hook_comment_metadata'); ?>
		</div>
		</header>

		<section class="comment-body">
			<?php do_action('concerto_hook_comment_body'); ?>
		</section>

		<footer>
			<div class="reply">
				<?php comment_reply_link(array_merge($args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</footer>
		<?php do_action('concerto_hook_after_comment'); ?>
	</article>