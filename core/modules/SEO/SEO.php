<?php
/**
 * Module Name: SEO
 * Description: Enables SEO functionality for your Concerto Framework. It is recommended that you always turn this feature on
 * Version: 1.0
 */

/**
 * We bind actions by context
 */
if (is_admin()) {
	add_action('concerto_admin_general', 'admin_general_box_site_title', 20);
	add_action('concerto_admin_general', 'admin_general_box_seo', 30);
	add_action('concerto_hook_register_settings', 'register_seo_settings');
	add_action('concerto_default_options_install', 'install_seo_settings');
	add_action('add_meta_boxes', 'seo_add_meta_boxes');
	add_action('save_post', 'seo_save_meta_box');
} else {
	// We bind everything that can be used in the front end
	add_filter('concerto_title', 'seo_title');
	add_action('concerto_hook_head', 'seo_meta');
	add_action('concerto_hook_head', 'seo_canonical');
	add_action('concerto_hook_head', 'seo_robots');
}

/**
 * Title
 *
 * SEO method for customizing the title
 */
function seo_title ($title) {
	global $stage, $post;
	if (have_posts()) {
		if (is_single() || is_page()) {
			$title = ($t = get_post_meta($post->ID, 'concerto_seo_title', true)) ? $t: $title;
		} else if (is_front_page() && is_home()) {
			$title = ($t = get_option('concerto_' . $stage . '_seo_homepage_title')) ? $t: $title;
		}
	}
	return $title;
}

/**
 * Meta
 *
 * SEO method for meta keywords and descriptions
 */
function seo_meta() {
	global $post;
	if (have_posts()) {
		if (is_single() || is_page()) {
			$description = get_post_meta($post->ID, 'concerto_seo_description', true);
			$keywords = get_post_meta($post->ID, 'concerto_seo_keywords', true);
			if ($description) {
				echo '<meta name="description" content="' . $description . '" />';
			}
			if ($keywords) {
				echo '<meta name="keyword" content="' . $keywords . '" />';
			}
		}
	}
}

/**
 * Robots
 *
 * SEO method for displaying robots
 */
function seo_robots () {
	global $stage, $post;
	$no = array();
	$where = null;
	if (have_posts()) {
		if (is_single()) {
			if (get_post_meta($post->ID, 'concerto_seo_noindex', true) == 1) {
				$no[] = 'noindex';
			}
			if (get_post_meta($post->ID, 'concerto_seo_nofollow', true) == 1) {
				$no[] = 'nofollow';
			}
		} else if (is_page() && $post->post_parent) {
			$where = 'child';
		} else if (is_day()) {
			$where = 'day';
		} else if (is_month()) {
			$where = 'month';
		} else if (is_year()) {
			$where = 'year';
		} else if (is_author()) {
			$where = 'author';
		} else if (is_category()) {
			$where = 'category';
		} else if (is_tag()) {
			$where = 'tag';
		}
	} else {
		echo '<meta name="robots" content="noindex, nofollow" />';
	}

	if ($where) {
		if (get_option('concerto_' . $stage . '_seo_' . $where . '_noindex') == 1) {
			$no[] = 'noindex';
		}
		if (get_option('concerto_' . $stage . '_seo_' . $where . '_nofollow') == 1) {
			$no[] = 'nofollow';
		}
		if (get_option('concerto_' . $stage . '_seo_' . $where . '_noarchive') == 1) {
			$no[] = 'noarchive';
		}
	}
	if (!empty($no)) {
		echo '<meta name="robots" content="' . implode(', ', $no) . '" />';
	}
}

/**
 * Canonical
 *
 * SEO method for canonical links
 */
function seo_canonical() {
	global $stage, $post;
	// We remove WP's canonical function first
	remove_action('wp_head', 'rel_canonical');

	// Do the canonicals
	if (get_option('concerto_' . $stage . '_seo_enable_canonical') == 1) {
		$canonical = get_bloginfo('url');
		if (is_single() || is_page()) {
			$canonical = get_permalink($post->ID);
		} else if (is_day()) {
			$year = get_query_var('year');
			$month = get_query_var('year');
			$day = get_query_var('day');
			$canonical = get_year_link($year, $month, $day);
		} else if (is_month()) {
			$year = get_query_var('year');
			$month = get_query_var('monthnum');
			$canonical = get_year_link($year, $month);
		} else if (is_year()) {
			$year = get_query_var('year');
			$canonical = get_year_link($year);
		} else if (is_author()) {
			$author = get_query_var('author');
			$canonical = get_author_posts_url($author);
		} else if (is_category()) {
			$cat = get_query_var('cat');
			$canonical = get_category_link($cat);
		} else if (is_tag()) {
			$tag = get_query_var('tag_id');
			$canonical = get_tag_link($tag);
		}
		echo '<link rel="canonical" href="' . $canonical . '" />';
	}
}

/**
 * Install
 *
 * Install SEO settings
 */
function install_seo_settings($stage, $context) {
	update_option('concerto_' . $stage . '_extensions_seo_enabled', 1);
	update_option('concerto_' . $stage . '_seo_homepage_title', 1);
	update_option('concerto_' . $stage . '_seo_enable_canonical', 1);
	update_option('concerto_' . $stage . '_seo_child_noindex', 1);
	update_option('concerto_' . $stage . '_seo_child_nofollow', 0);
	update_option('concerto_' . $stage . '_seo_child_noarchive', 0);
	update_option('concerto_' . $stage . '_seo_category_noindex', 0);
	update_option('concerto_' . $stage . '_seo_category_nofollow', 0);
	update_option('concerto_' . $stage . '_seo_category_noarchive', 0);
	update_option('concerto_' . $stage . '_seo_tag_noindex', 1);
	update_option('concerto_' . $stage . '_seo_tag_nofollow', 1);
	update_option('concerto_' . $stage . '_seo_tag_noarchive', 0);
	update_option('concerto_' . $stage . '_seo_author_noindex', 1);
	update_option('concerto_' . $stage . '_seo_author_nofollow', 1);
	update_option('concerto_' . $stage . '_seo_author_noarchive', 0);
	update_option('concerto_' . $stage . '_seo_month_noindex', 1);
	update_option('concerto_' . $stage . '_seo_month_nofollow', 1);
	update_option('concerto_' . $stage . '_seo_month_noarchive', 0);
	update_option('concerto_' . $stage . '_seo_day_noindex', 1);
	update_option('concerto_' . $stage . '_seo_day_nofollow', 1);
	update_option('concerto_' . $stage . '_seo_day_noarchive', 0);
	update_option('concerto_' . $stage . '_seo_year_noindex', 1);
	update_option('concerto_' . $stage . '_seo_year_nofollow', 1);
	update_option('concerto_' . $stage . '_seo_year_noarchive', 0);
}

/**
 * Register
 *
 * Register SEO settings for admin
 */
function register_seo_settings() {
	global $stage;
	register_setting('concerto_general', 'concerto_' . $stage . '_extensions_seo_enabled');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_homepage_title');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_enable_canonical');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_child_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_child_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_child_noarchive');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_category_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_category_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_category_noarchive');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_tag_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_tag_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_tag_noarchive');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_author_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_author_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_author_noarchive');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_month_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_month_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_month_noarchive');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_day_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_day_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_day_noarchive');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_year_noindex');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_year_nofollow');
	register_setting('concerto_general', 'concerto_' . $stage . '_seo_year_noarchive');
}

/**
 * Add Meta Box
 *
 * Add meta box to post and page context
 */
function seo_add_meta_boxes() {
	add_meta_box('concerto_seo', 'Concerto SEO Options', 'seo_meta_box', 'post', 'normal', 'high');
	add_meta_box('concerto_seo', 'Concerto SEO Options', 'seo_meta_box', 'page', 'normal', 'high');
}

/**
 * Save Meta Box
 *
 * Save metas from meta box
 */
function seo_save_meta_box ($post_id) {
	if (!wp_verify_nonce($_POST['concerto_seo_meta_box'], plugin_basename(__FILE__))) {
		return $post_id;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	if ( 'page' == $_POST['post_type'] ) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} else {
		if (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
	}
	
	$post = get_post($post_id);
	
	$title = @$_POST['concerto_seo_title'];
	$description = @$_POST['concerto_seo_description'];
	$keywords = @$_POST['concerto_seo_keywords'];
	$noindex = (@$_POST['concerto_seo_noindex'] == 1) ? 1: 0;
	$nofollow = (@$_POST['concerto_seo_nofollow'] == 1) ? 1: 0;

	update_post_meta($post->ID, 'concerto_seo_title', $title);
	update_post_meta($post->ID, 'concerto_seo_description', $description);
	update_post_meta($post->ID, 'concerto_seo_keywords', $keywords);
	update_post_meta($post->ID, 'concerto_seo_noindex', $noindex);
	update_post_meta($post->ID, 'concerto_seo_nofollow', $nofollow);
}

/**
 * Meta Box
 *
 * Meta box for post and page context
 */
function seo_meta_box () {
	global $stage, $post;
	wp_nonce_field(plugin_basename(__FILE__), 'concerto_seo_meta_box');
	?>
	<p>Concerto gives you the option to specify SEO options individually through your Posts and Pages. Your settings below will override the global options for Concerto.</p>
	<p><label><strong>Custom Title</strong><input type="text" value="<?php echo get_post_meta($post->ID, 'concerto_seo_title', true); ?>" name="concerto_seo_title" style="width:99%;" /></label></p>
	<p><label><strong>Meta Description</strong><textarea style="width:99%;height:4em;" name="concerto_seo_description"><?php echo get_post_meta($post->ID, 'concerto_seo_description', true); ?></textarea></label></p>
	<p><label><strong>Meta Keywords</strong><input type="text" value="<?php echo get_post_meta($post->ID, 'concerto_seo_keywords', true); ?>" name="concerto_seo_keywords" style="width:99%;" /></label></p>
	<p><strong>Robots</strong></p>
	<p>
		<label><input type="checkbox" value="1" name="concerto_seo_noindex" <?php echo (get_post_meta($post->ID, 'concerto_seo_noindex', true) == 1) ? 'checked ': ''; ?>/> <code>noindex</code></label><br/>
		<label><input type="checkbox" value="1" name="concerto_seo_nofollow" <?php echo (get_post_meta($post->ID, 'concerto_seo_nofollow', true) == 1) ? 'checked ': ''; ?>/> <code>nofollow</code></label>
	</p>
	<?php
}

/**
 * Admin site title
 *
 * Admin box dashboard site title
 */
function admin_general_box_site_title() {
	global $stage;
	?>
	<div class="box box2columns" id="concerto_site_title">
		<h3>Site Title</h3>
		<div class="inner">
			<p class="desc">If you would rather have Concerto replace the default Wordpress Title for your homepage to a more SEO friendlier one.</p>
			<input type="text" class="text" name="concerto_<?php echo $stage; ?>_seo_homepage_title" value="<?php echo get_option('concerto_' . $stage . '_seo_homepage_title'); ?>" />
		</div>
	</div>
	<?php
}

/**
 * Admin site box seo
 *
 * Admin box dashboard site SEO
 */
function admin_general_box_seo() {
	global $stage;
	?>
	<div class="box box2columns" id="concerto_seo">
		<h3><abbr title="Search Engine Optimization">SEO</abbr> Options</h3>
		<div class="inner">
			<p class="desc">You can easily fine tune your Site's Global SEO here. You can also set SEO options for <a href="http://themeconcert.com/concerto/manual/" target="_new">individual Posts or Pages</a></p>
			<table>
				<thead>
					<tr>
						<th></th>
						<th><code>noindex</code></th>
						<th><code>nofollow</code></th>
						<th><code>noarchive</code></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Child Pages</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_child_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_child_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_child_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_child_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_child_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_child_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Categories</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_category_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_category_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_category_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_category_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_category_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_category_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Tags</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_tag_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_tag_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_tag_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_tag_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_tag_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_tag_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Authors</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_author_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_author_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_author_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_author_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_author_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_author_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Months</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_month_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_month_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_month_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_month_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_month_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_month_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Days</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_day_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_day_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_day_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_day_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_day_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_day_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Years</td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_year_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_year_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_year_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_year_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_year_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_year_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
				</tbody>
			</table>
				<div class="clear"></div>
			<p><label><input type="checkbox" name="concerto_<?php echo $stage; ?>_seo_enable_canonical" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_enable_canonical') == 1) ? 'checked ': '';?>/> Support Canonical URLs for your Site</label></p>
		</div>
	</div>
	<?php
}

?>