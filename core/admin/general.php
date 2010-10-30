<?php
function admin_general() {
?>
<div class="wrap concerto">
	<div id="concerto_header">
		<h2 id="cfw_title">Concerto &#0187; General</h2>
	</div>
	<ul id="concerto_navigation">
		<li><button id="cfw_save" onclick="jQuery('#concerto_options').submit();"><?php _e('Save Changes', 'concerto'); ?></button></li>
		<li><a href="http://themeconcert.com/" target="_blank">Themeconcert</a></li>
		<li><a href="http://themeconcert.com/concerto/manual" target="_blank"><?php _e('User\'s Manual', 'concerto'); ?></a></li>
		<li><a href="http://themeconcert.com/forums/" target="_blank"><?php _e('Community', 'concerto'); ?></a></li>
		<li><a href="http://themeconcert.com/changelog/" target="_blank"><strong><?php _e('Version', 'concerto'); ?> <?php echo CONCERTO_VERSION; ?></strong></a></li>
		<li><input type="text" value="Quick Search Module" id="highlight" onfocus="if(jQuery('#highlight').val() == 'Quick Search Module')jQuery('#highlight').val('')" onblur="if(jQuery('#highlight').val() == '')jQuery('#highlight').val('Quick Search Module')"/></li>
	</ul>
	<div id="concerto_controls">
		<form method="POST" action="options.php" id="concerto_options">
			<?php wp_nonce_field('update-options'); ?>
			<div class="cfw_column">
				<div class="cfw_box">
					<h3><?php _e('Homepage Title', 'concerto'); ?></h3>
					<p><?php _e('If you would rather have Concerto replace the default Wordpress Title to a more SEO friendlier one. Enter it here.', 'concerto'); ?></p>
					<label><input type="text" name="concerto_options[general][homepage_title]" value="<?php echo get_option('homepage_title'); ?>" /></label>
				</div>
				<div class="cfw_box">
					<h3><?php _e('Syndication', 'concerto'); ?></h3>
					<p><?php _e('Enter the URL of your custom feed in the box below. Leave the box blank if you want to use Wordress\' native feed.', 'concerto'); ?></p>
					<label><input type="text" name="concerto_options[general][syndication_url]" value="<?php echo get_option('syndication_url'); ?>" /></label>
				</div>
				<div class="cfw_box">
					<h3><?php _e('Scripts', 'concerto'); ?></h3>
					<div>
						<h4><?php _e('Head', 'concerto'); ?></h4>
						<p><?php _e('If you want to add additional scripts to the <code>&lt;head&gt;</code> tag, place them here.', 'concerto'); ?></p>
						<textarea name="concerto_options[general][scripts_header]"><?php echo get_option('scripts_header'); ?></textarea>
					</div>
					<div>
						<h4><?php _e('Footer', 'concerto'); ?></h4>
						<p><?php _e('If you want to run Tracking scripts such as Google Analytics, place them here.', 'concerto'); ?></p>
						<textarea name="concerto_options[general][scripts_footer]"><?php echo get_option('scripts_footer'); ?></textarea>
					</div>
					<div>
						<h4><?php _e('Libraries', 'concerto'); ?></h4>
						<p><?php _e('This option will help you load javascript libraries the right way.', 'concerto'); ?></p>
						<p><label><input type="checkbox" name="concerto_options[general][load_script_jquery]" <?php echo (get_option('load_script_jquery')) ? ' checked': ''; ?>/> <?php _e('jQuery', 'concerto'); ?></label></p>
						<p><label><input type="checkbox" name="concerto_options[general][load_script_jqueryui]" <?php echo (get_option('load_script_jqueryui')) ? ' checked': ''; ?>/> <?php _e('jQuery UI', 'concerto'); ?></label></p>
					</div>
				</div>
				
			</div>
			<div class="cfw_column">
				<div class="cfw_box">
					<h3><?php _e('Navigation Menu', 'concerto'); ?></h3>
					<h4><?php _e('Please Select Menu Type', 'concerto'); ?></h4>
					<p><?php _e('This will determine if Concerto will handle Navigation display.', 'concerto'); ?></p>
					<p><label><input type="radio" name="concerto_options[general][navigation_menu]" value="wordpress" <?php echo (get_option('navigation_menu') == 'wordpress') ? 'checked': ''; ?>/> <?php _e('Wordpress Default Menus', 'concerto'); ?></em></label></p>
					<p><label><input type="radio" name="concerto_options[general][navigation_menu]" value="concerto" <?php echo (get_option('navigation_menu') == 'concerto') ? 'checked': ''; ?>/> <?php _e('Concerto Navigation', 'concerto'); ?></label></p>
					<div>
						<h4><label><input type="checkbox" name="concerto_options[general][navigation_use_pages]" <?php echo (get_option('navigation_use_pages')) ? 'checked': ''; ?>/> <?php _e('Pages', 'concerto'); ?></label></h4>
						<p><?php _e('You can sort the Pages you would like to include in your Navigation Menu here', 'concerto'); ?></p>
						<ul style="border:1px solid #c0c0c0;background:#ffffff;height:200px;">
							<?php
								$pages = get_pages();
								foreach ($pages as $page) {
							?>
							<li><label style="display: block;padding: 10px;"><input type="checkbox"/> <?php echo $page->post_title; ?></label></li>
							<?php } ?>
						</ul>
					</div>
					<div>
						<h4><label><input type="checkbox" name="concerto_options[general][navigation_use_categories]" <?php echo (get_option('navigation_use_categories')) ? 'checked': ''; ?>/> <?php _e('Categories', 'concerto'); ?></label></h4>
						<p><?php _e('Sort the Categories you would want to show up on your Navigation Menu', 'concerto'); ?></p>
						<ul style="border:1px solid #c0c0c0;background:#ffffff;height:200px;">
							<?php
								$categories = get_categories();
								foreach ($categories as $category) {
							?>
							<li><label style="display: block;padding: 10px;"><input type="checkbox"/> <?php echo $category->cat_name; ?></label></li>
							<?php } ?>
						</ul>
					</div>
					<div>
						<h4><label><input type="checkbox" name="concerto_options[general][navigation_use_custom]" <?php echo (get_option('navigation_use_custom')) ? 'checked': ''; ?>/> <?php _e('Custom Menu', 'concerto'); ?></label></h4>
						<p><?php _e('Pull items from your Category Links', 'concerto'); ?></p>
						<ul style="border:1px solid #c0c0c0;background:#ffffff;height:200px;"></ul>
					</div>
					<p><label><input type="checkbox" name="concerto_options[general][navigation_showhome]" <?php echo (get_option('navigation_showhome')) ? 'checked': ''; ?>/> <?php _e('Show the Home Link', 'concerto'); ?></em></label></p>
					<p><label><input type="checkbox" name="concerto_options[general][navigation_showfeed]" <?php echo (get_option('navigation_showfeed')) ? 'checked': ''; ?>/> <?php _e('Show Subscribe Link', 'concerto'); ?></label></p>
				</div>
			</div>
			<div class="cfw_column">
				<div class="cfw_box">
					<h3><?php _e('Change Stage Location', 'concerto'); ?></h3>
					<p><?php _e('This is an easy to way to toggle through multiple Stage themes without modifying the directory names. Also available as a widget.', 'concerto'); ?></p>
					<p>
						<label>
							<select name="concerto_options[general][stage_location]">
								<option value="no"><?php _e('Do not use a Stage', 'concerto'); ?></option>
								<?php
									global $stages;
									if (!empty($stages)) {
										foreach ($stages as $stage) {
											?>
												<option value="<?php echo strtolower($stage); ?>"<?php echo (strtolower($stage) == concerto::option('stage_location')) ? ' selected': ''; ?>><?php _e(ucfirst($stage), 'concerto'); ?></option>
											<?php
										}
									}
								?>
							</select>
						</label>
					</p>
				</div>
				<div class="cfw_box">
					<h3><?php _e('Admin Language', 'concerto'); ?></h3>
					<p><?php _e('If you would like to force Concerto to use another language instead of the default(English)', 'concerto'); ?>.</p>
					<p>
						<label>
							<select name="concerto_options[general][admin_language]">
								<option value="default"><?php _e('Default', 'concerto'); ?> (<?php _e('English', 'concerto'); ?>)</option>
							</select>
						</label>
					</p>
				</div>
				<div class="cfw_box">
					<h3><?php _e('Additional Extensions', 'concerto'); ?></h3>
					<?php
						if (!empty($extensions)) {
					?>
						<p><?php _e('Tick the extensions you would like Concerto to use. The option boxes for the plugins will be available upon activation.', 'concerto'); ?></p>
						<?php
							foreach ($extensions as $extension) {
							$title = $extension['Title'];
						?>
							<p><label title="<?php echo $extension['Description']; ?>"><input type="checkbox" name="concerto_options[general][<?php echo strtolower($title); ?>_enabled]" <?php echo (concerto::option(strtolower($title) . '_enabled')) ? 'checked': ''; ?>/> <?php _e($title, 'concerto'); ?></label></p>
						<?php
							}
						} else {
						?>
						<p><?php _e('It seems that you are missing a few files on your Concerto Directory.', 'concerto'); ?></p>
						<p class="red"><?php _e('The extensions directory is empty.', 'concerto'); ?></p>
					<?php
						}
					?>
				</div>
			</div>

			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="concerto_options" />
		</form>
	</div>
</div>
<?php
	}
?>