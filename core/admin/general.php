<?php
function admin_general() {

?>
<div class="wrap concerto">
	<form method="POST" action="options.php" id="concerto_options">
	<?php settings_fields('concerto_general'); ?>
	<div id="concerto_header">
		<div class="left">
			<h2 id="concerto_title" class="left">Concerto</h2>
			<div class="clear"></div>
			<div id="concerto_navigation">
				<ul>
					<li><a href="http://themeconcert.com/" target="_new">ThemeConcert</a></li>
					<li><a href="http://themeconcert.com/concert/manual" target="_new">User Manual</a></li>
					<li><a href="http://support.themeconcert.com/" target="_new">Support</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="right">
			<div id="concerto_stage">
				Active Stage
				<select name="concerto_stage">
					<option value="default">Default</option>
				</select>
			</div>
			<p>You are running <strong>Concerto <?php echo CONCERTO_VERSION; ?></strong>. <em><a href="http://themeconcert.com/members/update/" target="_new">Upgrade your Copy</a></em></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="concerto_notice level_green">You are running a Beta Version of Concerto. This product is provided free under our <a href="http://themeconcert.com/documents/licenses/free-beta" target="_new"">Terms and Agreements</a>.</div>
	<?php if (@$_GET['updated'] == 'true') { ?>
	<div class="concerto_notice level_updated">Your Configuration has been changed and saved. <a href="<?php bloginfo('url'); ?>">See the changes on your site</a></div>
	<?php } ?>
	<h3 id="concerto_context"><input type="submit" value="Save Changes" /></h3>
	<div id="concerto_dashboard">
	
		<div class="box box2columns" id="concerto_site_title">
			<h3>Site Title</h3>
			<div class="inner">
				<p>If you would rather have Concerto replace the default Wordpress Title for all pages to a more SEO friendlier one.</p>
				<input type="text" class="text" name="concerto_general_site_title" value="<?php echo get_option('concerto_general_site_title'); ?>" />
			</div>
		</div>
		
		<div class="box box2columns" id="concerto_seo">
			<h3><abbr title="Search Engine Optimization">SEO</abbr> Options</h3>
			<div class="inner">
				<p>You can easily fine tune your Site's Global SEO here. You can also set SEO options for <a href="http://themeconcert.com/concert/manual/" target="_new">individual Posts or Pages</a></p>
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
							<td><input type="checkbox" name="concerto_seo_child_noindex" value="1" <?php echo (get_option('concerto_seo_child_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_child_nofollow" value="1" <?php echo (get_option('concerto_seo_child_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_child_noarchive" value="1" <?php echo (get_option('concerto_seo_child_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
						<tr>
							<td>Categories</td>
							<td><input type="checkbox" name="concerto_seo_category_noindex" value="1" <?php echo (get_option('concerto_seo_category_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_category_nofollow" value="1" <?php echo (get_option('concerto_seo_category_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_category_noarchive" value="1" <?php echo (get_option('concerto_seo_category_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
						<tr>
							<td>Tags</td>
							<td><input type="checkbox" name="concerto_seo_tag_noindex" value="1" <?php echo (get_option('concerto_seo_tag_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_tag_nofollow" value="1" <?php echo (get_option('concerto_seo_tag_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_tag_noarchive" value="1" <?php echo (get_option('concerto_seo_tag_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
						<tr>
							<td>Authors</td>
							<td><input type="checkbox" name="concerto_seo_author_noindex" value="1" <?php echo (get_option('concerto_seo_author_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_author_nofollow" value="1" <?php echo (get_option('concerto_seo_author_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_author_noarchive" value="1" <?php echo (get_option('concerto_seo_author_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
						<tr>
							<td>Months</td>
							<td><input type="checkbox" name="concerto_seo_month_noindex" value="1" <?php echo (get_option('concerto_seo_month_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_month_nofollow" value="1" <?php echo (get_option('concerto_seo_month_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_month_noarchive" value="1" <?php echo (get_option('concerto_seo_month_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
						<tr>
							<td>Days</td>
							<td><input type="checkbox" name="concerto_seo_day_noindex" value="1" <?php echo (get_option('concerto_seo_day_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_day_nofollow" value="1" <?php echo (get_option('concerto_seo_day_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_day_noarchive" value="1" <?php echo (get_option('concerto_seo_day_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
						<tr>
							<td>Years</td>
							<td><input type="checkbox" name="concerto_seo_year_noindex" value="1" <?php echo (get_option('concerto_seo_year_noindex') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_year_nofollow" value="1" <?php echo (get_option('concerto_seo_year_nofollow') == 1) ? 'checked="checked" ': '';?>/></td>
							<td><input type="checkbox" name="concerto_seo_year_noarchive" value="1" <?php echo (get_option('concerto_seo_year_noarchive') == 1) ? 'checked="checked" ': '';?>/></td>
						</tr>
					</tbody>
				</table>
					<div class="clear"></div>
				<p><label><input type="checkbox" name="concerto_seo_enable_canonical" value="1" <?php echo (get_option('concerto_seo_enable_canonical') == 1) ? 'checked="checked" ': '';?>/> Support Canonical URLs for your Site</label></p>
			</div>
		</div>
		
		<div class="box box1column" id="concerto_navigation">
			<h3>Navigation</h3>
			<div class="inner">
				<h4>Please Select Menu Type</h4>
				<p>This will determine if Concerto will handle Navigation display or let Wordpress display it's menus.</p>
				<p><label><input type="radio" name="concerto_general_menu" value="default" <?php echo (get_option('concerto_general_menu') == 'default') ? 'checked': ''; ?>/> Wordpress Default Menu</em></label></p>
				<p><label><input type="radio" name="concerto_general_menu" value="concerto" <?php echo (get_option('concerto_general_menu') == 'concerto') ? 'checked': ''; ?>/> Concerto Navigation</label></p>
				<div class="navigationlists">
					<h4><label><input type="checkbox" name="concerto_general_menu_use_pages" value="1" <?php echo (get_option('concerto_general_menu_use_pages') == 1) ? 'checked': ''; ?>/> Pages</label></h4>
					<p>You can sort the Pages you would like to include in your Navigation Menu here</p>
					<ul>
						<?php
							$pages = get_pages();
							$pages_used = get_option('concerto_general_menu_pages_items');
							foreach ($pages as $page) {
						?>
						<li><label><input type="checkbox" name="concerto_general_menu_pages_items[]" value="<?php echo $page->ID; ?>" <?php echo (in_array($page->ID, $pages_used)) ? 'checked="checked" ': ''; ?>/> <?php echo $page->post_title; ?></label></li>
						<?php } ?>
					</ul>
				</div>
				<div class="navigationlists">
					<h4><label><input type="checkbox" name="concerto_general_menu_use_categories" value="1" <?php echo (get_option('concerto_general_menu_use_categories') == 1) ? 'checked': ''; ?>/> Categories</label></h4>
					<p>Sort the Categories you would want to show up on your Navigation Menu</p>
					<ul>
						<?php
							$categories = get_categories();
							$categories_used = get_option('concerto_general_menu_categories_items');
							foreach ($categories as $category) {
						?>
						<li><label><input type="checkbox" name="concerto_general_menu_categories_items[]" value="<?php echo $category->term_id; ?>" <?php echo (in_array($category->term_id, $categories_used)) ? 'checked="checked" ': ''; ?>/> <?php echo $category->cat_name; ?></label></li>
						<?php } ?>
					</ul>
				</div>
				<div class="navigationlists">
					<h4><label><input type="checkbox" name="concerto_general_menu_use_tags" value="1" <?php echo (get_option('concerto_general_menu_use_tags') == 1) ? 'checked': ''; ?>/> Tags</label></h4>
					<p>Sort Tags you want to display on your Navigation Menu</p>
					<ul>
						<?php
							$tags = get_tags();
							$tags_used = get_option('concerto_general_menu_tags_items');
							foreach ($tags as $tag) {
						?>
						<li><label><input type="checkbox" name="concerto_general_menu_tags_items[]" value="<?php echo $tag->term_id; ?>" <?php echo (in_array($tag->term_id, $tags_used)) ? 'checked="checked" ': ''; ?>/> <?php echo $tag->name; ?></label></li>
						<?php } ?>
					</ul>
				</div>
				<p><label><input type="checkbox" name="concerto_general_menu_show_home" value="1" <?php echo (get_option('concerto_general_menu_show_home') == 1) ? 'checked': ''; ?>/> Show the Home Link</em></label></p>
				<p><label><input type="checkbox" name="concerto_general_menu_show_feed" value="1" <?php echo (get_option('concerto_general_menu_show_feed') == 1) ? 'checked': ''; ?>/> Show Subscribe Link</label></p>
			</div>
		</div>
	
		<div class="box box1column" id="concerto_home_meta">
			<h3>Homepage Meta</h3>
			<div class="inner">
				<p>Description</p>
				<textarea name="concerto_general_homepage_description"><?php echo get_option('concerto_general_homepage_description'); ?></textarea>
				<p>Keywords</p>
				<input type="text" class="text" name="concerto_general_homepage_keyword" value="<?php echo get_option('concerto_general_homepage_keyword'); ?>"/>
			</div>
		</div>
		
		<div class="box box1column" id="concerto_favicon">
			<h3>Favicon</h3>
			<div class="inner">
				<p>If you would like to have a custom favicon for your site. Upload it here.</p>
				<div id="favicon">
					<div id="favicon_preview"></div>
					Current Favicon
					<div class="clear"></div>
				</div>
				<!-- 
					Javascript Upload using Native Wordpress methods
				-->
			</div>
		</div>
		
		<div class="box box1column" id="concerto_syndication_url">
			<h3>RSS URL</h3>
			<div class="inner">
				<p>Enter the URL of your custom feed in the box below. Leave the box blank if you want to use Wordress' native feed.</p>
				<input type="text" class="text" name="concerto_general_syndication_url" value="<?php echo get_option('concerto_general_syndication_url'); ?>" />
			</div>
		</div>
		
		<div class="box box1column" id="concerto_extensions">
			<h3>Theme Extensions</h3>
			<div class="inner">
				<?php
					if (!empty($extensions)) {
				?>
					<p>Tick the extensions you would like Concerto to use. The option boxes for the plugins will be available upon activation.</p>
					<?php
						foreach ($extensions as $extension) {
						$title = $extension['Title'];
					?>
						<p><label title="<?php echo $extension['Description']; ?>"><input type="checkbox" name="concerto_options[general][<?php echo strtolower($title); ?>_enabled]" <?php echo (concerto::option(strtolower($title) . '_enabled')) ? 'checked': ''; ?>/> <?php _e($title, 'concerto'); ?></label></p>
					<?php
						}
					} else {
					?>
					<p>It seems that you are missing a few files on your Concerto Directory.</p>
					<p class="red">The extensions directory is empty.</p>
				<?php
					}
				?>
			</div>
		</div>
		
		<div class="box box1column" id="concerto_personal">
			<h3>Personal Information</h3>
			<div class="inner">
				<p>These options here are plainly for custom use only and are not required. You can use them on the widgets included or <a href="http://themeconcert.com/concert/manual/" target="_new">through code</a>.</p>
				<h4>Twitter</h4>
				<input type="text" class="text" name="concerto_personal_twitter" value="<?php echo get_option('concerto_personal_twitter'); ?>"
				<h4>Facebook</h4>
				<input type="text" class="text" name="concerto_personal_facebook" value="<?php echo get_option('concerto_personal_facebook'); ?>"
				<h4>Youtube</h4>
				<input type="text" class="text" name="concerto_personal_youtube" value="<?php echo get_option('concerto_personal_youtube'); ?>"
				<h4>LinkedIn</h4>
				<input type="text" class="text" name="concerto_personal_linkedin" value="<?php echo get_option('concerto_personal_linkedin'); ?>"
				<h4>Email</h4>
				<input type="text" class="text" name="concerto_personal_email" value="<?php echo get_option('concerto_personal_email'); ?>"
				<p><label><input type="checkbox" name="concerto_personal_email_use_admin" value="1" <?php echo (get_option('concerto_personal_email_use_admin') == 1) ? 'checked="checked" ': '';?>/> Use Administrator Email</label></p>
			</div>
		</div>
		
		<div class="box box1column" id="concerto_scripts">
			<h3>Additional Scripts</h3>
			<div class="inner">
				<div>
					<h4>Head</h4>
					<p>If you want to add additional scripts to the <code>&lt;head&gt;</code> tag, place them here.</p>
					<textarea name="concerto_general_scripts_head"><?php echo get_option('concerto_general_scripts_head'); ?></textarea>
				</div>
				<div>
					<h4>Footer</h4>
					<p>If you want to run Tracking scripts such as Google Analytics, place them here.</p>
					<textarea name="concerto_general_scripts_footer"><?php echo get_option('concerto_general_scripts_footer'); ?></textarea>
				</div>
			</div>
		</div>
		
		<div class="box box1column" id="concerto_javascript_libraries">
			<h3>Javascript Libraries</h3>
			<div class="inner">
				<p>This option will help you load javascript libraries the right way.</p>
				<p><label><input type="checkbox" name="concerto_general_scripts_libraries_jquery" value="1" <?php echo (get_option('concerto_general_scripts_libraries_jquery') == 1) ? 'checked="checked" ': '';?>/> jQuery</label></p>
				<p><label><input type="checkbox" name="concerto_general_scripts_libraries_jquery_ui" value="1" <?php echo (get_option('concerto_general_scripts_libraries_jquery_ui') == 1) ? 'checked="checked" ': '';?>/> jQuery UI</label></p>
			</div>
		</div>
		
	</div>
	</form>
	<script type="text/javascript">
		jQuery(function($) {
			/*
			// NOT IMPLEMENTED YET
			// FOCUS ON BOX CURRENTLY BEING EDITED(MOUSE OVER??)
			$('.box').mouseover(function(){
				$('.box').addClass('blur');
				$(this).removeClass('blur');
			});
			$('.box').mouseout(function(){
				$('.box').removeClass('blur');
			});
			*/
			$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
		});
	</script>
</div>
<?php
	}
?>