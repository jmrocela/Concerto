<?php
 /**
  * Module Name: SEO
  * Description: Enables SEO functionality for your Concerto Framework. It is recommended that you always turn this feature on
  * Version: 1.0
  */
  
// Bind by Context
if (is_admin()) {
	add_action('concerto_admin_general', 'admin_general_box_site_title', 20);
	add_action('concerto_admin_general', 'admin_general_box_seo', 30);
} else {
	// We bind everything that can be used in the front end
}

function admin_general_box_site_title() {
	$stage = get_option('concerto_stage');
?>
	<div class="box box2columns" id="concerto_site_title">
		<h3>Site Title</h3>
		<div class="inner">
			<p class="desc">If you would rather have Concerto replace the default Wordpress Title for all pages to a more SEO friendlier one.</p>
			<input type="text" class="text" name="concerto_general_site_title" value="<?php echo get_option('concerto_' . $stage . '_general_site_title'); ?>" />
		</div>
	</div>
<?php
}
  
function admin_general_box_seo() {
	$stage = get_option('concerto_stage');
?>
	<div class="box box2columns" id="concerto_seo">
		<h3><abbr title="Search Engine Optimization">SEO</abbr> Options</h3>
		<div class="inner">
			<p class="desc">You can easily fine tune your Site's Global SEO here. You can also set SEO options for <a href="http://themeconcert.com/concert/manual/" target="_new">individual Posts or Pages</a></p>
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
						<td><input type="checkbox" name="concerto_seo_child_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_child_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_child_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_child_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_child_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_child_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Categories</td>
						<td><input type="checkbox" name="concerto_seo_category_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_category_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_category_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_category_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_category_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_category_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Tags</td>
						<td><input type="checkbox" name="concerto_seo_tag_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_tag_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_tag_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_tag_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_tag_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_tag_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Authors</td>
						<td><input type="checkbox" name="concerto_seo_author_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_author_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_author_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_author_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_author_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_author_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Months</td>
						<td><input type="checkbox" name="concerto_seo_month_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_month_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_month_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_month_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_month_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_month_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Days</td>
						<td><input type="checkbox" name="concerto_seo_day_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_day_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_day_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_day_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_day_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_day_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
					<tr>
						<td>Years</td>
						<td><input type="checkbox" name="concerto_seo_year_noindex" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_year_noindex') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_year_nofollow" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_year_nofollow') == 1) ? 'checked ': '';?>/></td>
						<td><input type="checkbox" name="concerto_seo_year_noarchive" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_year_noarchive') == 1) ? 'checked ': '';?>/></td>
					</tr>
				</tbody>
			</table>
				<div class="clear"></div>
			<p><label><input type="checkbox" name="concerto_seo_enable_canonical" value="1" <?php echo (get_option('concerto_' . $stage . '_seo_enable_canonical') == 1) ? 'checked ': '';?>/> Support Canonical URLs for your Site</label></p>
		</div>
	</div>
<?php
}
  
?>