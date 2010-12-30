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
				<?php
					global $stages;
					if (!empty($stages->stages)) {
				?>
				Active Stage
				<select name="concerto_stage">
					<?php
						$stages = $stages->stages;
						foreach ($stages as $stage) {
							?>
								<option value="<?php echo strtolower($stage['name']); ?>"><?php echo $stage['name']; ?></option>
							<?php
						}
					?>
				</select>
				<?php 
					} else {
				?>
					<span class="warning_span"><strong>Warning:</strong> there are no <em>Stages</em> in your Stage directory.</span>
				<?php
					}
				?>
			</div>
			<p>You are running <strong>Concerto <?php echo CONCERTO_VERSION; ?></strong>. <em><a href="http://themeconcert.com/members/update/" target="_new">Upgrade your Copy</a></em></p>
		</div>
		<div class="clear"></div>
	</div>
	<?php do_action('concerto_admin_notices'); ?>
	<?php if (@$_GET['updated'] == 'true') { ?>
	<div class="concerto_notice level_updated">Your Configuration has been changed and saved. <a href="<?php bloginfo('url'); ?>">See the changes on your site</a></div>
	<?php } ?>
	<h3 id="concerto_context"><input type="submit" value="Save Changes" /></h3>
	<div id="concerto_dashboard">
		<?php do_action('concerto_admin_general'); ?>
	</div>
	</form>
	<script type="text/javascript">
		jQuery(function($) {
			/**
			 * Upload functionality
			 */
			$('.swfupload-control').swfupload({
				upload_url: ajaxurl + '?action=concerto_upload',
				flash_url : "<?php bloginfo('url'); ?>/wp-includes/js/swfupload/swfupload.swf",
				post_params: {concerto_action: "favicon", _concerto_nonce: "<?php echo wp_create_nonce('CONCERTO_UPLOAD'); ?>"},
				
				file_post_name: "CONCERTO_UPLOAD",
				file_size_limit : "2 MB",
				file_types : "*.ico;*.png",
				file_types_description : "ICO or PNG files only",
				file_queue_limit : "1",

				button_placeholder_id : "spanButtonPlaceholder",
				button_text: '<span class="changefavicon">Change Favicon</span>',
				button_width: 100,
				button_height: 20,
				button_text_style: ".changefavicon { color: #639638; font-family: arial; }",
				button_cursor: SWFUpload.CURSOR.HAND, 
				button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT, 
			});
			$('.swfupload-control')
				.bind('fileQueued', function(event, file){$(this).swfupload('startUpload');})
				.bind('uploadSuccess', function(event, file, response){
					$('#favicon_preview img').attr('src', response);
					$('#favicon_hidden').val(response);
					$('#removefavicon').show();
				});
			
			/**
			 * Behaviour
			 */
			if ($('#favicon_hidden').val() == '') {
				$('#removefavicon').hide();
			}
			$('#removefavicon').click(function() {
				if (confirm('Are you sure you want to remove your Favicon?')) {
					$('#favicon_preview img').attr('src', '');
					$('#favicon_hidden').val('');
					$('#removefavicon').hide();
				}
			});
			$('.navigationlists h4 input').change(function(){
				if ($(this).is(':checked')) {
					$(this).parents('.navigationlists').find('.navigationlist').show();
				} else {
					$(this).parents('.navigationlists').find('.navigationlist').hide();
				}
				$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
			});
			$('.menu_type').change(function(){
				if ($(this).val() == 'default') {
					$('.navigationlists').hide();
				} else {
					$('.navigationlists').show();
				}
				$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
			});
			$('.navigationlists h4 input').each(function(){
				if ($(this).is(':checked')) {
					$(this).parents('.navigationlists').find('.navigationlist').show();
				} else {
					$(this).parents('.navigationlists').find('.navigationlist').hide();
				}
			});
			if ($('.menu_type:checked').val() == 'default') {
				$('.navigationlists').hide();
			} else {
				$('.navigationlists').show();
			}
			
			/**
			 * Masonry
			 */
			$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
		});
	</script>
</div>
<?php
}

function admin_general_box_navigation() {
?>
	<div class="box box1column" id="concerto_navigation">
		<h3>Navigation</h3>
		<div class="inner">
			<h4>Please Select Menu Type</h4>
			<p class="desc">This will determine if Concerto will handle Navigation display or let Wordpress display it's menus.</p>
			<p><label><input type="radio" name="concerto_general_menu" class="menu_type" value="default" <?php echo (get_option('concerto_general_menu') == 'default') ? 'checked': ''; ?>/> Wordpress Default Menu</em></label></p>
			<p><label><input type="radio" name="concerto_general_menu" class="menu_type" value="concerto" <?php echo (get_option('concerto_general_menu') == 'concerto') ? 'checked': ''; ?>/> Concerto Navigation</label></p>
			<div class="navigationlists">
				<h4><label><input type="checkbox" name="concerto_general_menu_use_pages" value="1" <?php echo (get_option('concerto_general_menu_use_pages') == 1) ? 'checked': ''; ?>/> Pages</label></h4>
				<div class="navigationlist">
				<p>You can sort the Pages you would like to include in your Navigation Menu here</p>
				<ul>
					<?php
						$pages = get_pages();
						$pages_used = get_option('concerto_general_menu_pages_items');
						foreach ($pages as $page) {
					?>
					<li><label><input type="checkbox" name="concerto_general_menu_pages_items[]" value="<?php echo $page->ID; ?>" <?php echo (@in_array($page->ID, $pages_used)) ? 'checked ': ''; ?>/> <?php echo $page->post_title; ?></label></li>
					<?php } ?>
				</ul>
				</div>
			</div>
			<div class="navigationlists">
				<h4><label><input type="checkbox" name="concerto_general_menu_use_categories" value="1" <?php echo (get_option('concerto_general_menu_use_categories') == 1) ? 'checked': ''; ?>/> Categories</label></h4>
				<div class="navigationlist">
				<p>Sort the Categories you would want to show up on your Navigation Menu</p>
				<ul>
					<?php
						$categories = get_categories();
						$categories_used = get_option('concerto_general_menu_categories_items');
						foreach ($categories as $category) {
					?>
					<li><label><input type="checkbox" name="concerto_general_menu_categories_items[]" value="<?php echo $category->term_id; ?>" <?php echo (@in_array($category->term_id, $categories_used)) ? 'checked ': ''; ?>/> <?php echo $category->cat_name; ?></label></li>
					<?php } ?>
				</ul>
				</div>
			</div>
			<div class="navigationlists">
				<h4><label><input type="checkbox" name="concerto_general_menu_use_tags" value="1" <?php echo (get_option('concerto_general_menu_use_tags') == 1) ? 'checked': ''; ?>/> Tags</label></h4>
				<div class="navigationlist">
				<p>Sort Tags you want to display on your Navigation Menu</p>
				<ul>
					<?php
						$tags = get_tags();
						$tags_used = get_option('concerto_general_menu_tags_items');
						foreach ($tags as $tag) {
					?>
					<li><label><input type="checkbox" name="concerto_general_menu_tags_items[]" value="<?php echo $tag->term_id; ?>" <?php echo (@in_array($tag->term_id, $tags_used)) ? 'checked ': ''; ?>/> <?php echo $tag->name; ?></label></li>
					<?php } ?>
				</ul>
				</div>
			</div>
			<p><label><input type="checkbox" name="concerto_general_menu_show_home" value="1" <?php echo (get_option('concerto_general_menu_show_home') == 1) ? 'checked': ''; ?>/> Show the Home Link</em></label></p>
			<p><label><input type="checkbox" name="concerto_general_menu_show_feed" value="1" <?php echo (get_option('concerto_general_menu_show_feed') == 1) ? 'checked': ''; ?>/> Show Subscribe Link</label></p>
		</div>
		<script type="text/javascript">
			jQuery(function($) {
			});
		</script>
	</div>
<?php
}

function admin_general_box_home_meta() {
?>
	<div class="box box1column" id="concerto_home_meta">
		<h3>Homepage Meta</h3>
		<div class="inner">
			<p>Description</p>
			<textarea name="concerto_general_homepage_description"><?php echo get_option('concerto_general_homepage_description'); ?></textarea>
			<p>Keywords</p>
			<input type="text" class="text" name="concerto_general_homepage_keywords" value="<?php echo get_option('concerto_general_homepage_keywords'); ?>"/>
		</div>
	</div>
<?php
}

function admin_general_box_favicon() {
?>
	<div class="box box1column" id="concerto_favicon">
		<h3>Favicon</h3>
		<div class="inner">
			<p class="desc">If you would like to have a custom favicon for your site. Upload it here.</p>
			<div id="favicon">
				<div id="favicon_preview"><img src="<?php echo get_option('concerto_general_favicon'); ?>" width="16" height="16" alt="" border="0" /></div>
				<div class="swfupload-control"><span id="spanButtonPlaceholder"></span></div>
				<input type="hidden" name="concerto_general_favicon" id="favicon_hidden" value="<?php echo get_option('concerto_general_favicon'); ?>"/>
				<div class="clear"></div>
				<a href="javascript:;" id="removefavicon">Remove Favicon</a>
			</div>
		</div>
	</div>
<?php
}

function admin_general_box_syndication_url() {
?>
	<div class="box box1column" id="concerto_syndication_url">
		<h3>RSS URL</h3>
		<div class="inner">
			<p class="desc">Enter the URL of your custom feed in the box below. Leave the box blank if you want to use Wordress' native feed.</p>
			<input type="text" class="text" name="concerto_general_syndication_url" value="<?php echo get_option('concerto_general_syndication_url'); ?>" />
		</div>
	</div>
<?php
}

function admin_general_box_personal() {
?>
	<div class="box box1column" id="concerto_personal">
		<h3>Personal Information</h3>
		<div class="inner">
			<p class="desc">These options here are plainly for custom use only and are not required. You can use them on the widgets included or <a href="http://themeconcert.com/concert/manual/" target="_new">through code</a>.</p>
			<h4>Twitter</h4>
			<input type="text" class="text" name="concerto_personal_twitter" value="<?php echo get_option('concerto_personal_twitter'); ?>" />
			<h4>Facebook</h4>
			<input type="text" class="text" name="concerto_personal_facebook" value="<?php echo get_option('concerto_personal_facebook'); ?>" />
			<h4>Youtube</h4>
			<input type="text" class="text" name="concerto_personal_youtube" value="<?php echo get_option('concerto_personal_youtube'); ?>" />
			<h4>LinkedIn</h4>
			<input type="text" class="text" name="concerto_personal_linkedin" value="<?php echo get_option('concerto_personal_linkedin'); ?>" />
			<h4>Email</h4>
			<input type="text" class="text" name="concerto_personal_email" value="<?php echo get_option('concerto_personal_email'); ?>" />
			<p><label><input type="checkbox" name="concerto_personal_email_use_admin" value="1" <?php echo (get_option('concerto_personal_email_use_admin') == 1) ? 'checked ': '';?>/> Use Administrator Email</label></p>
		</div>
	</div>
<?php
}

function admin_general_box_scripts() {
?>
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
<?php
}

function admin_general_box_javascript_libraries() {
?>
	<div class="box box1column" id="concerto_javascript_libraries">
		<h3>Javascript Libraries</h3>
		<div class="inner">
			<p class="desc">This option will help you load javascript libraries the right way.</p>
			<p><label><input type="checkbox" name="concerto_general_scripts_libraries_jquery" value="1" <?php echo (get_option('concerto_general_scripts_libraries_jquery') == 1) ? 'checked ': '';?>/> jQuery</label></p>
			<p><label><input type="checkbox" name="concerto_general_scripts_libraries_jquery_ui" value="1" <?php echo (get_option('concerto_general_scripts_libraries_jquery_ui') == 1) ? 'checked ': '';?>/> jQuery UI</label></p>
		</div>
	</div>
<?php
}

function admin_general_box_extensions() {
?>
	<div class="box box1column" id="concerto_extensions">
		<h3>Theme Extensions</h3>
		<div class="inner">
			<?php
				global $extensions;
				if (!empty($extensions->extensions)) {
					$extensions = $extensions->get();
			?>
				<p class="desc">Enable extensions available for your Installation of Concerto.</p>
				<ul id="extensions">
					<?php
					foreach ($extensions as $extension) {
						$author = '';
						if ($extension['author']) {
							if ($extension['author_uri']) {
								$author = ' by <a href="' . $extension['author_uri'] . '" target="_new">' . $extension['author'] . '</a>';
							} else {
								$author = ' by ' . $extension['author'];
							}
						}
					?>
					<li>
						<label><input type="checkbox" name="concerto_extensions_<?php echo $extension['id']; ?>_enabled" value="1" <?php echo (get_option('concerto_extensions_' . $extension['id'] . '_enabled') == 1) ? ' checked': ''; ?>/> <?php echo $extension['name']; ?><?php echo $author; ?></label>
						<p><?php echo $extension['description']; ?></p>
					</li>
				<?php
					}
				?>
				</ul>
				<?php
				} else {
				?>
				<p>It seems that you are missing a few files on your Concerto Directory.</p>
				<p class="red">The Extension directory is empty.</p>
			<?php
				}
			?>
		</div>
	</div>
<?php
}
?>