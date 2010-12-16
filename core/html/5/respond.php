<?php do_action('comment_form_before'); ?>
<div id="respond">
	<h3 id="reply-title"><?php comment_form_title($args['title_reply'], $args['title_reply_to']); ?> <small><?php cancel_comment_reply_link($args['cancel_reply_link']); ?></small></h3>
	<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
		<?php echo $args['must_log_in']; ?>
		<?php do_action('comment_form_must_log_in_after'); ?>
	<?php else : ?>
		<form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" id="<?php echo esc_attr($args['id_form']); ?>">
			<?php do_action('comment_form_top'); ?>
			<?php if (is_user_logged_in()) : ?>
				<?php echo apply_filters('comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity); ?>
				<?php do_action('comment_form_logged_in_after', $commenter, $user_identity); ?>
			<?php else : ?>
				<?php echo $args['comment_notes_before']; ?>
				<?php
				do_action('comment_form_before_fields');
				foreach ((array) $args['fields'] as $name => $field) {
					echo apply_filters("comment_form_field_{$name}", $field) . "\n";
				}
				do_action('comment_form_after_fields');
				?>
			<?php endif; ?>
			<?php echo apply_filters('comment_form_field_comment', $args['comment_field']); ?>
			<?php echo $args['comment_notes_after']; ?>
			<p class="form-submit">
				<input name="submit" type="submit" id="<?php echo esc_attr($args['id_submit']); ?>" value="<?php echo esc_attr($args['label_submit']); ?>" />
				<?php comment_id_fields(); ?>
			</p>
			<?php do_action('comment_form', $post_id); ?>
		</form>
	<?php endif; ?>
</div>
<?php do_action('comment_form_after'); ?>