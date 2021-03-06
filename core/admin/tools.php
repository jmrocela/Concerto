<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: ConcertoAdmin
 * @copyright: see LICENSE
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

/**
 * Admin Tools
 *
 * Tools backend dashboard for Design
 */
function admin_tools() {
?>
<div class="wrap concerto">

	<div style="float:right;padding:0 10px;font-weight:bold;"><a href="http://codepassive.zendesk.com/home" target="_new" class="button">Submit Feedback</a></div>
	<div style="clear:both;"></div>
	
	<div id="concerto_header">
		<div class="left">
			<h2 id="concerto_title" class="left">Conc&#0233;rto</h2>
			<div class="clear"></div>
			<div id="concerto_navigation">
				<ul>
					<li><a href="http://themeconcert.com/" target="_new">ThemeConcert</a></li>
					<li><a href="http://themeconcert.com/concerto/manual" target="_new">User Manual</a></li>
					<li><a href="http://support.themeconcert.com/" target="_new">Support</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="right">
			<div id="concerto_stage">
				<?php
					global $stages, $stage;
					if (!empty($stages->stages)) {
				?>
				Active Stage
				<select name="concerto_stage" disabled>
					<?php
						$st = $stages->stages;
						foreach ($st as $sta) {
							?>
								<option value="<?php echo $sta['name']; ?>"<?php echo (strtolower($sta['name']) == strtolower($stage)) ? ' selected': ''; ?>><?php echo $sta['name']; ?></option>
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
			<p>
				You are running <strong>Concerto <?php echo CONCERTO_VERSION; ?></strong>.
			</p>
		</div>
		<div class="clear"></div>
	</div>
	<?php do_action('concerto_admin_notices'); ?>
	<?php if (@$_GET['restored'] == 1) { ?>
	<div class="concerto_notice level_updated">Your <strong><?php echo @implode(' &amp; ', array_map('ucfirst',explode(',', strip_tags(urldecode($_GET['restored_context']))))); ?></strong> configurations for stage "<strong><?php echo @ucfirst(strip_tags(urldecode($_GET['restored_to']))); ?></strong>" has been restored to their default values.</div>
	<?php } ?>
	<?php if (@$_GET['stage_created']) { ?>
	<div class="concerto_notice level_updated">Stage "<strong><?php echo @ucfirst(strip_tags(urldecode($_GET['stage_created']))); ?></strong>" has been created!</div>
	<?php } ?>
	<?php if (@$_GET['code'] != null) {
		switch ($_GET['code']) {
			case '0':
				$error = 'Sorry but the stage name you selected is not available or it already exists. Please try another one!';
			break;
			case '2':
				$error = 'It seems that the Stage folder is unwritable. See <a href="http://themeconcert.com/manual/createnewstage">solution here</a>';
			break;
			case '4':
				$error = 'We can\'t make the Stage folder. See <a href="http://themeconcert.com/manual/createnewstage">solution here</a>';
			break;
			case '8':
				$error = 'Our default stage file is missing! See <a href="http://themeconcert.com/manual/createnewstage">solution here</a>';
			break;
			case '16':
				$error = 'Oops! Your host does not have ZipArchive installed on his Server. See <a href="http://themeconcert.com/manual/createnewstage">solution here</a>';
			break;
			default:
				$error = "Unkown error! #" . strip_tags($_GET['code']);
			break;
		}
	?>
	<div class="concerto_notice level_red">An error occured while creating your Stage<br/><strong><?php echo $error; ?></strong></div>
	<?php } ?>
	<div id="concerto_dashboard">
		<?php do_action('concerto_admin_tools'); ?>		
	</div>
	<script type="text/javascript">
		jQuery(function($) {
			/**
			 * Masonry
			 */
			$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
		});
	</script>
</div>
<?php
}

/**
 * Tools Box: Fonts Manager
 *
 * Add Custom Fonts for your Theme
 */
function admin_tools_box_fontmanager() {
?>
<div class="box box2columns">
	<h3>Font Manager</h3>
	<div class="inner">
		You can manage your fonts here. Please make sure that you are allowed to use them as this may be a violation of copyright for the font's creators and a violation of Concerto's terms of use.
		<div class="clear"></div>
		<div style="float:left;width:290px;background:#f9f9f9;margin:20px 10px 10px;margin-left:0;padding:10px;" id="addfont">
			<p>Font Name</p>
			<p><input type="text" value="" name="fontname" id="fontname" class="text" style="width:100%;" /></p>
			<p>Source URL, CSS or Script</p>
			<p><textarea value="" name="fontsource" id="fontsource" class="text" style="width:100%;"></textarea></p>
			<p align="center" style="margin-top:10px;"><input type="submit" value="Add Custom Font" class="button" id="addfont_button" /></p>
		</div>
		<div style="float:left;width:250px;margin: 20px 10px;" id="deletefonts">
			<?php
				$fonts = get_option('concerto_fonts_custom');
				if (!empty($fonts)) {
					foreach ($fonts as $font) {
			?>
				<div class="font" id="<?php echo $font['slug']; ?>"><?php echo $font['name']; ?><span></span></div>
			<?php
					}
				} else {
			?>
				<p style="text-align:center;font-size:30px;font-weight:bold;margin-top:75px;font-family:arial;color:#e0e0e0;" id="placeholderforfonts">Add a Font</p>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
		jQuery(function($){
			$('#addfont_button').click(function(){
				$.post(ajaxurl, {action: 'add_font',name:$('#fontname').val(),source:$('#fontsource').val()}, function(response){
					if (response == 100) {
						Alert('That font is already on your library.');
					} else {
						if (response) {
							$('#deletefonts').append('<div class="font" id="' + response['slug'] + '">' + response['name'] + '<span></span></div>');
							$('#placeholderforfonts').hide();
							$('#fontname,#fontsource').val('');
						}
					}
				}, 'json');
			});
			$('.font span').live('click', function(){
				var t = this;
				Confirm({
					title: 'Remove your Font',
					message: 'Are you sure you want to remove this font from your library?',
					ok: function() {
						$.post(ajaxurl, {action: 'remove_font',slug:$(t).parents('.font').attr('id')}, function(response){
							$(t).parents('.font').fadeOut(500, function(){
								$(this).remove();
								if ($('.font').length <= 0) {
									$('#placeholderforfonts').show();
								}
							});
						});
					}
				});
				return false;
			});
		});
	</script>
</div>
<?php
}

/**
 * Tools Box AJAX: Add a font
 *
 * Adds font to the custom fonts collection
 */
function admin_tools_add_font() {
	if (@$_POST) {		
		$fonts = get_option('concerto_fonts_custom');
		$slug = 'cf_' . sanitize_title($_POST['name']);
		if (!$fonts[$slug]) {
		
			// css file, link, script, @fontface
			if (preg_match('/@font/i', $_POST['source'])) {
				$stype = 'fontface';
			} else if (preg_match('/\<script/i', $_POST['source'])) {
				$stype = 'script';
			} else if (preg_match('/\<link/i', $_POST['source'])) {
				$stype = 'link';
			} else if (preg_match('/(http|https):\/\//i', $_POST['source'])) {
				$stype = 'css';
			}
		
			$fonts[$slug] = array(
				'name' => $_POST['name'],
				'source' => $_POST['source'],
				'slug' => $slug,
				'source-type' => $stype
			);
			echo json_encode($fonts[$slug]);
		} else {
			echo 100;
		}
	}
	update_option('concerto_fonts_custom', $fonts);
	die();
}

/**
 * Tools Box AJAX: Remove a font
 *
 * Removes font to the custom fonts collection
 */
function admin_tools_remove_font() {
	if (@$_POST) {		
		$fonts = get_option('concerto_fonts_custom');
		$slug = $_POST['slug'];
		if ($fonts[$slug]) {
			unset($fonts[$slug]);
			echo 1;
		}
	}
	update_option('concerto_fonts_custom', $fonts);
	die();
}

/**
 * Tools Box: Import Configuration
 *
 * Import configuration
 */
function admin_tools_box_importconfiguration () {
?>
<div class="box box1column">
	<h3>Import Configuration</h3>
	<div class="inner">
		<p class="desc">If you would like to import a specific Configuration Set for your Concerto installation, you can do so here.</p>
		<p><label>Select a  <code>.cfwconf</code> file</label></p>
		<p>
			<span id="swfupload-control"><span id="spanButtonPlaceholder"></span></span>
			<script type="text/javascript">
				jQuery(function($) {
					/**
					 * Upload functionality
					 */
					$('#swfupload-control').swfupload({
						upload_url: ajaxurl + '?action=concerto_upload',
						flash_url : "<?php bloginfo('url'); ?>/wp-includes/js/swfupload/swfupload.swf",
						post_params: {concerto_action: "importconfig", _concerto_nonce: "<?php echo get_option('concerto_upload_nonce'); ?>"},
						
						file_post_name: "CONCERTO_UPLOAD",
						file_size_limit : "2 MB",
						file_types : "*.cfwconf;*.json",
						file_types_description : "Concerto Export or JSON files only",
						file_queue_limit : "1",

						button_placeholder_id : "spanButtonPlaceholder",
						button_text: '<span class="importconfigbutton">Import Configuration</span>',
						button_width: 120,
						button_height: 20,
						button_text_style: ".importconfigbutton { color: #639638; font-family: arial; }",
						button_cursor: SWFUpload.CURSOR.HAND, 
						button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
						button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT, 
					});
					$('#swfupload-control')
						.bind('fileQueued', function(event, file){$.swfupload.getInstance('#swfupload-control').addPostParam('stage', $('#concerto_tools_import_to').val());$(this).swfupload('startUpload');})
						.bind('uploadProgress', function(event, file, bytesLoaded){progress(bytesLoaded, file.size)})
						.bind('fileQueueError', function(event, file, errorCode, message){Alert('Sorry we cannot Upload your file at this time. Please make sure the file you selected is below 2MB and is a Stage Configuration file.')})
						.bind('uploadSuccess', function(event, file, response){
							$('.concerto_notice.level_updated,.concerto_notice.level_red').remove();
							if (response == 1) {
								$('#concerto_dashboard').before('<div class="concerto_notice level_updated">Configuration file has been uploaded and updated in the database.</div>');
							} else {
								$('#concerto_dashboard').before('<div class="concerto_notice level_red">Sorry but the file you uploaded might be damaged or not a Concerto exported configuration file at all.<br/>Please make sure you Uploaded a valid configuration file.</div>');
							}
						});
				});
			</script>
			<label>
				to
				<select name="concerto_tools_import_to" id="concerto_tools_import_to">
				<?php
					global $stages;
					if (!empty($stages->stages)) {
						$st = $stages->stages;
						foreach ($st as $stage) {
							?>
								<option value="<?php echo strtolower($stage['name']); ?>"><?php echo $stage['name']; ?></option>
							<?php
						}
					} else {
				?>
					<option>No Stages available</option>
				<?php
					}
				?>
				</select>
				Stage
			</label>
		</p>
	</div>
</div>
<?php
}

/**
 * Tools Box: Export Configuration
 *
 * Export configuration
 */
function admin_tools_box_exportconfiguration () {
?>
<div class="box box1column">
	<h3>Export Configuration</h3>
	<div class="inner">
		<form method="POST" action="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=concerto_admin_tools">
		<?php wp_nonce_field('concerto_exportconfig', 'concerto_exportconfig_nonce'); ?> 
		<p class="desc">If you would like to export your Configuration from this Installation to another, you can do so here.</p>
		<p><label><input type="checkbox" value="1" name="concerto_tools_export_general" checked /> General Options</label></p>
		<p><label><input type="checkbox" value="1" name="concerto_tools_export_design" checked /> Design Options</label></p>
		<p>
			<input type="submit" value="Export" class="button"/>
			<label>
				from
				<select name="concerto_tools_export_from">
				<?php
					global $stages;
					if (!empty($stages->stages)) {
						$st = $stages->stages;
						foreach ($st as $stage) {
							?>
								<option value="<?php echo strtolower($stage['name']); ?>"><?php echo $stage['name']; ?></option>
							<?php
						}
					} else {
				?>
					<option>No Stages available</option>
				<?php
					}
				?>
				</select>
				Stage
			</label>
		</p>
		</form>
	</div>
</div>
<?php
}

/**
 * Tools Box: New Stage
 *
 * New Stage
 */
function admin_tools_box_newstage () {
?>
<div class="box box1column">
	<h3>Create New Stage</h3>
	<div class="inner">
		<form method="POST" action="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=concerto_admin_tools">
		<?php wp_nonce_field('concerto_newstage', 'concerto_newstage_nonce'); ?> 
		<p class="desc">If you wish to create a new stage with all the default settings, supply it's name and we will make it for you.</p>
		<h4>Manual</h4>
		<p><input type="text" value="" name="concerto_tools_stage_name" class="text" style="width:155px;" /> <input type="submit" value="Create this Stage" class="button"/></p>
		<p class="desc">If you already have a stage set with images, you can upload it here.</p>
		<h4>Upload</h4>
		<span id="swfupload-control2"><span id="spanButtonPlaceholder"></span></span>
		<script type="text/javascript">
			jQuery(function($) {
				/**
				 * Upload functionality
				 */
				$('#swfupload-control2').swfupload({
					upload_url: ajaxurl + '?action=concerto_upload',
					flash_url : "<?php bloginfo('url'); ?>/wp-includes/js/swfupload/swfupload.swf",
					post_params: {concerto_action: "newstage", _concerto_nonce: "<?php echo get_option('concerto_upload_nonce'); ?>"},
					
					file_post_name: "CONCERTO_UPLOAD",
					file_size_limit : "10 MB",
					file_types : "*.zip;*.tar.gz;",
					file_types_description : "Concerto Stage archives only",
					file_queue_limit : "1",

					button_placeholder_id : "spanButtonPlaceholder",
					button_text: '<span class="importconfigbutton">Upload a Stage</span>',
					button_width: 120,
					button_height: 20,
					button_text_style: ".importconfigbutton { color: #639638; font-family: arial; }",
					button_cursor: SWFUpload.CURSOR.HAND, 
					button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
					button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT, 
				});
				$('#swfupload-control2')
					.bind('fileQueued', function(event, file){$(this).swfupload('startUpload');})
					.bind('uploadProgress', function(event, file, bytesLoaded){progress(bytesLoaded, file.size)})
					.bind('fileQueueError', function(event, file, errorCode, message){Alert('Sorry we cannot Upload your file at this time. Please make sure the file you selected is below 10MB and is a Stage archive.')})
					.bind('uploadSuccess', function(event, file, response){
						$('.concerto_notice.level_updated,.concerto_notice.level_red').remove();
						switch (response) {
							case '0':
								$('#concerto_dashboard').before('<div class="concerto_notice level_red">An error occured while creating your Stage<br/><strong>Sorry but the Stage file is invalid or it already exists. Please try another one!</strong></div>');
							break;
							case '2':
								$('#concerto_dashboard').before('<div class="concerto_notice level_red">An error occured while creating your Stage<br/><strong>It seems that the Stage folder is unwritable. See <a href="http://themeconcert.com/manual/createnewstage">solution here</a></strong></div>');
							break;
							case '4':
								$('#concerto_dashboard').before('<div class="concerto_notice level_red">An error occured while creating your Stage<br/><strong>We can\'t make the Stage folder. See <a href="http://themeconcert.com/manual/createnewstage">solution here</a></strong></div>');
							break;
							case '8':
								$('#concerto_dashboard').before('<div class="concerto_notice level_red">An error occured while creating your Stage<br/><strong>Our default stage file is missing! See <a href="http://themeconcert.com/manual/createnewstage">solution here</a></strong></div>');
							break;
							case '16':
								$('#concerto_dashboard').before('<div class="concerto_notice level_red">An error occured while creating your Stage<br/><strong>Oops! Your host does not have ZipArchive installed on his Server. See <a href="http://themeconcert.com/manual/createnewstage">solution here</a></strong></div>');
							break;
							default:
								response = response.charAt(0).toUpperCase() + response.slice(1);
								$('#concerto_dashboard').before('<div class="concerto_notice level_updated">Stage "<strong>' + response + '</strong>" has been created!</div>');
							break;
						}
					});
				$('#restoredefault').click(function(){
					Confirm({
						title: 'Restore Defaults',
						message: 'Are you sure you want to restore the default values for your selected items?',
						ok: function() {
							$('#restoredefaults').submit();
						}
					});
					return false;
				})
			});
		</script>
		</form>
	</div>
</div>
<?php
}

/**
 * Tools Box: Restore Configuration
 *
 * Restore Configuration
 */
function admin_tools_box_restoreconfiguration () {
?>
<div class="box box1column">
	<h3>Restore Default Configuration</h3>
	<div class="inner">
		<form method="POST" action="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=concerto_admin_tools" id="restoredefaults">
		<?php wp_nonce_field('concerto_restoreconfig', 'concerto_restoreconfig_nonce'); ?> 
		<p class="desc">Don't like what you see but don't know what you did wrong? Try restoring to the default configuration, it might fix your problem.</p>
		<p><label><input type="checkbox" value="1" name="concerto_tools_restore_general" /> General Options</label></p>
		<p><label><input type="checkbox" value="1" name="concerto_tools_restore_design" /> Design Options</label></p>
		<p>
			<input type="submit" value="Restore Defaults" class="button" id="restoredefault"/>
			<label>
				to
				<select name="concerto_tools_restore_from">
				<?php
					global $stages;
					if (!empty($stages->stages)) {
						$st = $stages->stages;
						foreach ($st as $stage) {
							?>
								<option value="<?php echo strtolower($stage['name']); ?>"><?php echo $stage['name']; ?></option>
							<?php
						}
					} else {
				?>
					<option>No Stages available</option>
				<?php
					}
				?>
				</select>
				Stage
			</label>
		</p>
		</form>
	</div>
</div>
<?php
}
?>