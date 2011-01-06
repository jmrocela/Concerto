<?php
function admin_design() {
?>
<div class="wrap concerto">
	<form method="POST" action="options.php" id="concerto_options">
	<?php settings_fields('concerto_design'); ?>
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
		<?php do_action('concerto_admin_design'); ?>
	</div>
	</form>
	<script type="text/javascript">
		jQuery(function($) {
			/**
			 * Behaviour
			 */
			if ($('#header_hidden').val() == '') {
				$('#removeheader').hide();
			}
			$('#removeheader').click(function() {
				if (confirm('Are you sure you want to remove your Header?')) {
					$('#header_preview img').attr('src', '');
					$('#header_hidden').val('');
					$('#removeheader').hide();
				}
			});
			$('#layout_columns').change(function(){
				if ($(this).val() == 3) {
					$('.columns3, #columnsarrangement').show();
					$('.columns2arrangement').hide();
					$('#defaultfor3columns').attr('checked', true);
				} else if ($(this).val() == 2) {
					$('.columns3').hide();
					$('.columns2, #columnsarrangement').show();
					$('#defaultfor2columns').attr('checked', true);
				} else {
					$('.columns2, .columns3, #columnsarrangement').hide();
				}
				$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
			});
			if ($('#layout_columns').val() == 3) {
				$('.columns2, .columns3, #columnsarrangement').show();
			} else if ($('#layout_columns').val() == 2) {
				$('.columns3').hide();
				$('.columns2, #columnsarrangement').show();
			} else {
				$('.columns2, .columns3, #columnsarrangement').hide();
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

function admin_design_box_markup () {
?>
		<div class="box box1column">
			<h3>Markup</h3>
			<div class="inner">
				<p class="desc">This option enables your page to display markup in HTML4 or HTML5 format. It is recommended that you use HTML4 if you have little knowledge of what HTML5 is.</p>
				<p><label><input type="radio" value="4" name="concerto_design_html_version" <?php echo (get_option('concerto_design_html_version') == 4) ? 'checked ': ''; ?>/> HTML4 (recommended)</label></p>
				<p><label><input type="radio" value="5" name="concerto_design_html_version" <?php echo (get_option('concerto_design_html_version') == 5) ? 'checked ': ''; ?>/> HTML5 <a href="http://themeconcert.com/concerto/manual/markup#html5">(experimental)</a></label></p> <!-- does not degrade yet -->
			</div>
		</div>
<?php
}

function admin_design_box_header () {
?>
		<div class="box box2columns">
			<h3>Header</h3>
			<div class="inner">
				<p class="desc">You can define your header to accomodate Text, Text and Logo or just a whole Banner below. You can customize the style on your stage's stylesheet.</p>
				<div id="header">
					<select name="concerto_design_header_mode" id="header_change">
						<option value="1"<?php echo (get_option('concerto_design_header_mode') == 1) ? ' selected': ''; ?>>Text Only</option>
						<option value="2"<?php echo (get_option('concerto_design_header_mode') == 2) ? ' selected': ''; ?>>Text &amp; Logo</option>
						<option value="3"<?php echo (get_option('concerto_design_header_mode') == 3) ? ' selected': ''; ?>>Image</option>
					</select>
					<div id="header_image">
						<div id="header_preview" style="overflow:hidden;height:150px;"><img src="<?php echo get_option('concerto_design_header_image'); ?>" width="596" alt="" /></div>
						<div class="swfupload-control"><span id="spanButtonPlaceholder"></span></div>
						<a href="javascript:;" id="removeheader">Remove Header</a>
						<input type="hidden" id="header_hidden" value="<?php echo get_option('concerto_design_header_image'); ?>" name="concerto_design_header_image" />
						<div class="clear"></div>
					</div>
					<div id="header_shows">
						<p><label><input type="checkbox" value="1" name="concerto_design_header_title" <?php echo (get_option('concerto_design_header_title') == 1) ? 'checked ': ''; ?>/> Show Title</label></p>
						<p><label><input type="checkbox" value="1" name="concerto_design_header_description" <?php echo (get_option('concerto_design_header_description') == 1) ? 'checked ': ''; ?>/> Show Description</label></p>
					</div>
				</div>
				<script type="text/javascript">
					jQuery(function($){
						$('.swfupload-control').swfupload({
							upload_url: ajaxurl + '?action=concerto_upload',
							flash_url : "<?php bloginfo('url'); ?>/wp-includes/js/swfupload/swfupload.swf",
							post_params: {concerto_action: "header", _concerto_nonce: "<?php echo wp_create_nonce('CONCERTO_UPLOAD'); ?>"},
							
							file_post_name: "CONCERTO_UPLOAD",
							file_size_limit : "5 MB",
							file_types : "*.jpg;*.png;*.gif;*.bmp",
							file_types_description : "Image files only",
							file_queue_limit : "1",

							button_placeholder_id : "spanButtonPlaceholder",
							button_text: '<span class="changeheader">Change Header</span>',
							button_width: 100,
							button_height: 20,
							button_text_style: ".changeheader { color: #639638; font-family: arial; }",
							button_cursor: SWFUpload.CURSOR.HAND, 
							button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
							button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT, 
						});
						if ($('#header_change').val() == 1) {
							$('#header_image').hide();
							$('.swfupload-control').unbind();
							$('#header_hidden').val('');
							$('#header_preview img').attr('src', '');
							$('#header_shows').show()
							$('#header_hidden').parents('.box').removeClass('box2columns');
							$('#header_hidden').parents('.box').addClass('box1column');
						} else {
							$('#header_shows').show()
							if ($('#header_change').val() == 3) $('#header_shows').hide();
							$('#header_image').show();
							$('#header_hidden').parents('.box').addClass('box2columns');
							$('#header_hidden').parents('.box').removeClass('box1column');
							$('.swfupload-control')
								.bind('fileQueued', function(event, file){$(this).swfupload('startUpload');})
								.bind('uploadSuccess', function(event, file, response){
									$('#removeheader').show();
									$('#header_preview img').attr('src', response);
									$('#header_hidden').val(response);
									$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
								});
						}
						$('#header_change').change(function(){
							if ($(this).val() == 1) {
								$('#header_image').hide();
								$('.swfupload-control').unbind();
								$('#header_hidden').val('');
								$('#header_shows').show()
								$('#header_preview img').attr('src', '');
								$('#header_hidden').parents('.box').removeClass('box2columns');
								$('#header_hidden').parents('.box').addClass('box1column');
							} else {
								$('#header_shows').show()
								if ($(this).val() == 3) $('#header_shows').hide();
								$('#header_image').show();
								$('#header_hidden').parents('.box').addClass('box2columns');
								$('#header_hidden').parents('.box').removeClass('box1column');
								$('.swfupload-control')
									.bind('fileQueued', function(event, file){$(this).swfupload('startUpload');})
									.bind('uploadSuccess', function(event, file, response){
										$('#removeheader').show();
										$('#header_preview img').attr('src', response);
										$('#header_hidden').val(response);
										$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
									});
							}
							$('#concerto_dashboard').masonry({columnWidth: 10,itemSelector:'.box',resizable:false});
						});
					});
				</script>
			</div>
		</div>
<?php
}

function admin_design_box_layout () {
?>
		<div class="box box1column">
			<h3>Page Layout</h3>
			<div class="inner">
				<p class="desc">For detailed explanation of what Page Layout is, please visit the <a href="http://themeconcert.com/concerto/manual/page_structure">Concerto Manual</a>. This option will give you more flexibility in customizing your Stages</p>
				<p><label><input type="radio" value="fullwidth" name="concerto_design_page_structure" <?php echo (get_option('concerto_design_page_structure') == 'fullwidth') ? 'checked ': ''; ?>/> Full-Width Layout</label></p>
				<p><label><input type="radio" value="wrapped" name="concerto_design_page_structure" <?php echo (get_option('concerto_design_page_structure') == 'wrapped') ? 'checked ': ''; ?>/> Wrapped Layout</label></p>
			</div>
		</div>
<?php
}

function admin_design_box_fontscolorsborders () {
?>
		<div class="box box1column">
			<h3>Fonts, Colors and Borders</h3>
			<div class="inner">
				<div id="colorpicker"></div>
				<script type="text/javascript">
					jQuery(function($) {
						// Find a way for .color to have farbtastic
					});
				</script>
				<p class="desc">You can tweak font faces, sizes, colors as well as backgrounds for specific elements throughout the default layout. Border sizes and colors are also available below.</p>
				<div>
					<h4>Body</h4>
					<p>Outer Page Padding
						<select name="concerto_design_page_padding">
							<option value="10"<?php echo (get_option('concerto_design_page_padding') == 10) ? ' selected': ''; ?>>10</option>
							<option value="15"<?php echo (get_option('concerto_design_page_padding') == 15) ? ' selected': ''; ?>>15</option>
							<option value="20"<?php echo (get_option('concerto_design_page_padding') == 20) ? ' selected': ''; ?>>20</option>
							<option value="25"<?php echo (get_option('concerto_design_page_padding') == 25) ? ' selected': ''; ?>>25</option>
							<option value="30"<?php echo (get_option('concerto_design_page_padding') == 30) ? ' selected': ''; ?>>30</option>
							<option value="35"<?php echo (get_option('concerto_design_page_padding') == 35) ? ' selected': ''; ?>>35</option>
							<option value="40"<?php echo (get_option('concerto_design_page_padding') == 40) ? ' selected': ''; ?>>40</option>
						</select>
					</p>
					<p>Background <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_background_site'); ?>" name="concerto_design_colors_background_site" /></p>
					<p>Container Background <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_background_container'); ?>" name="concerto_design_colors_background_container" /></p>
					<p>Main Background <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_background_main'); ?>" name="concerto_design_colors_background_main" /></p>
					
					<p>Global Font Face
						<select name="concerto_design_fonts_body">
							<option value="arial"<?php echo (get_option('concerto_design_fonts_body') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_body') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_body') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_body') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_body') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Global Font Size
						<select name="concerto_design_sizes_body">
							<option value="inherit-body"<?php echo (get_option('concerto_design_sizes_body') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="inherit-content"<?php echo (get_option('concerto_design_sizes_body') == 'inherit-content') ? ' selected': ''; ?>>Inherit from Content</option>
							<option value="10"<?php echo (get_option('concerto_design_sizes_body') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_body') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_body') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_body') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_body') == 15) ? ' selected': ''; ?>>15</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_body') == 16) ? ' selected': ''; ?>>16</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_body') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_body') == 20) ? ' selected': ''; ?>>20</option>
							<option value="22"<?php echo (get_option('concerto_design_sizes_body') == 22) ? ' selected': ''; ?>>22</option>
							<option value="24"<?php echo (get_option('concerto_design_sizes_body') == 24) ? ' selected': ''; ?>>24</option>
							<option value="25"<?php echo (get_option('concerto_design_sizes_body') == 25) ? ' selected': ''; ?>>25</option>
						</select>
					</p>
					
					<p>Text Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_fonts_site'); ?>" name="concerto_design_colors_fonts_site" /></p>
					<p>Link Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_fonts_link'); ?>" name="concerto_design_colors_fonts_link" /></p>
					<p>Hover Link Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_fonts_link_hover'); ?>" name="concerto_design_colors_fonts_link_hover" /></p>
					<p>Visted Link Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_fonts_link_visited'); ?>" name="concerto_design_colors_fonts_link_visited" /></p>
					
					<p>Border Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_borders_common'); ?>" name="concerto_design_colors_borders_common" /></p>
					<p>Container Border Size
						<select name="concerto_design_borders_container">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_container') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_container') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_container') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_container') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_container') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_container') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_container') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Header</h4>
					<p>Background <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_background_header'); ?>" name="concerto_design_colors_background_header" /></p>
										
					<p>Font Face
						<select name="concerto_design_fonts_header">
							<option value="inherit-body"<?php echo (get_option('concerto_design_fonts_header') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="arial"<?php echo (get_option('concerto_design_fonts_header') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_header') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_header') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_header') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_header') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Title Font Size
					
						<select name="concerto_design_sizes_header_title">
							<option value="20"<?php echo (get_option('concerto_design_sizes_header_title') == 20) ? ' selected': ''; ?>>20</option>
							<option value="24"<?php echo (get_option('concerto_design_sizes_header_title') == 24) ? ' selected': ''; ?>>24</option>
							<option value="28"<?php echo (get_option('concerto_design_sizes_header_title') == 28) ? ' selected': ''; ?>>28</option>
							<option value="32"<?php echo (get_option('concerto_design_sizes_header_title') == 32) ? ' selected': ''; ?>>32</option>
							<option value="40"<?php echo (get_option('concerto_design_sizes_header_title') == 50) ? ' selected': ''; ?>>40</option>
							<option value="48"<?php echo (get_option('concerto_design_sizes_header_title') == 48) ? ' selected': ''; ?>>48</option>
							<option value="52"<?php echo (get_option('concerto_design_sizes_header_title') == 52) ? ' selected': ''; ?>>52</option>
							<option value="60"<?php echo (get_option('concerto_design_sizes_header_title') == 60) ? ' selected': ''; ?>>60</option>
						</select>
					
					</p>
					
					<p>Description Font Size
										
						<select name="concerto_design_sizes_header_description">
							<option value="12"<?php echo (get_option('concerto_design_sizes_header_description') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_header_description') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_header_description') == 15) ? ' selected': ''; ?>>15</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_header_description') == 16) ? ' selected': ''; ?>>16</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_header_description') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_header_description') == 20) ? ' selected': ''; ?>>20</option>
						</select>
												
					</p>
					
					<p>Title Text Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_fonts_header_title'); ?>" name="concerto_design_colors_fonts_header_title" /></p>
					<p>Description Text Color <input type="text" class="small-text color" value="<?php echo get_option('concerto_design_colors_fonts_header_description'); ?>" name="concerto_design_colors_fonts_header_description" /></p>
					
					<p>Border Size
					
						<select name="concerto_design_borders_header">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_header') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_header') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_header') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_header') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_header') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_header') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_header') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Top Border Size
						
						<select name="concerto_design_borders_header_top">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_header_top') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_header_top') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_header_top') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_header_top') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_header_top') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_header_top') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_header_top') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Bottom Border Size
					
						<select name="concerto_design_borders_header_bottom">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_header_bottom') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_header_bottom') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_header_bottom') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_header_bottom') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_header_bottom') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_header_bottom') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_header_bottom') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Navigation Menu</h4>
					<p>Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_menu'); ?>" name="concerto_design_colors_background_menu" /></p>
					<p>Active Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_menu_active'); ?>" name="concerto_design_colors_background_menu_active" /></p>
					<p>Hover Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_menu_hover'); ?>" name="concerto_design_colors_background_menu_hover" /></p>
					
					<p>Font Face
						<select name="concerto_design_fonts_menu">
							<option value="inherit-body"<?php echo (get_option('concerto_design_fonts_menu') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="arial"<?php echo (get_option('concerto_design_fonts_menu') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_menu') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_menu') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_menu') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_menu') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Font Size

						<select name="concerto_design_sizes_menu">
							<option value="inherit-body"<?php echo (get_option('concerto_design_sizes_menu') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="inherit-content"<?php echo (get_option('concerto_design_sizes_menu') == 'inherit-content') ? ' selected': ''; ?>>Inherit from Content</option>
							<option value="10"<?php echo (get_option('concerto_design_sizes_menu') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_menu') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_menu') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_menu') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_menu') == 15) ? ' selected': ''; ?>>15</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_menu') == 16) ? ' selected': ''; ?>>16</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_menu') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_menu') == 20) ? ' selected': ''; ?>>20</option>
							<option value="22"<?php echo (get_option('concerto_design_sizes_menu') == 22) ? ' selected': ''; ?>>22</option>
						</select>
					</p>
					
					<p>Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_menu'); ?>" name="concerto_design_colors_fonts_menu" /></p>
					<p>Active Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_menu_active'); ?>" name="concerto_design_colors_fonts_menu_active" /></p>
					<p>Hover Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_menu_hover'); ?>" name="concerto_design_colors_fonts_menu_hover" /></p>
					
					<p>Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_menu'); ?>" name="concerto_design_colors_borders_menu" /></p>
					<p>Active Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_menu_active'); ?>" name="concerto_design_colors_borders_menu_active" /></p>
					<p>Hover Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_menu_hover'); ?>" name="concerto_design_colors_borders_menu_hover" /></p>
					
					<p>Border Size
						<select name="concerto_design_borders_menu">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_menu') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_menu') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_menu') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_menu') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_menu') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_menu') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_menu') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Content</h4>
					<p>Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_content'); ?>" name="concerto_design_colors_background_content" /></p>
										
					<p>Title Font Face
						<select name="concerto_design_fonts_content_title">
							<option value="inherit-body"<?php echo (get_option('concerto_design_fonts_content_title') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="arial"<?php echo (get_option('concerto_design_fonts_content_title') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_content_title') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_content_title') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_content_title') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_content_title') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Title Font Size
						<select name="concerto_design_sizes_content_title">
							<option value="inherit-header_title"<?php echo (get_option('concerto_design_sizes_content_title') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Site Title</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_content_title') == 20) ? ' selected': ''; ?>>20</option>
							<option value="24"<?php echo (get_option('concerto_design_sizes_content_title') == 24) ? ' selected': ''; ?>>24</option>
							<option value="28"<?php echo (get_option('concerto_design_sizes_content_title') == 28) ? ' selected': ''; ?>>28</option>
							<option value="32"<?php echo (get_option('concerto_design_sizes_content_title') == 32) ? ' selected': ''; ?>>32</option>
							<option value="40"<?php echo (get_option('concerto_design_sizes_content_title') == 40) ? ' selected': ''; ?>>40</option>
							<option value="44"<?php echo (get_option('concerto_design_sizes_content_title') == 44) ? ' selected': ''; ?>>44</option>
							<option value="48"<?php echo (get_option('concerto_design_sizes_content_title') == 48) ? ' selected': ''; ?>>48</option>
						</select>
					</p>
					
					<p>Font Face
						<select name="concerto_design_fonts_content">
							<option value="inherit-body"<?php echo (get_option('concerto_design_fonts_content') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="arial"<?php echo (get_option('concerto_design_fonts_content') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_content') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_content') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_content') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_content') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Font Size
						<select name="concerto_design_sizes_content">
							<option value="inherit-body"<?php echo (get_option('concerto_design_sizes_content') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="10"<?php echo (get_option('concerto_design_sizes_content') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_content') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_content') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_content') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_content') == 15) ? ' selected': ''; ?>>15</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_content') == 16) ? ' selected': ''; ?>>16</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_content') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_content') == 20) ? ' selected': ''; ?>>20</option>
							<option value="22"<?php echo (get_option('concerto_design_sizes_content') == 22) ? ' selected': ''; ?>>22</option>
						</select>
					</p>
					<p>Meta Font Size
						<select name="concerto_design_sizes_content_meta">
							<option value="inherit-body"<?php echo (get_option('concerto_design_sizes_content_meta') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="inherit-content"<?php echo (get_option('concerto_design_sizes_content_meta') == 'inherit-content') ? ' selected': ''; ?>>Inherit from Content</option>
							<option value="10"<?php echo (get_option('concerto_design_sizes_content_meta') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_content_meta') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_content_meta') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_content_meta') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_content_meta') == 15) ? ' selected': ''; ?>>15</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Sidebar</h4>
					
					<p>Font Face
						<select name="concerto_design_fonts_sidebar">
							<option value="inherit-body"<?php echo (get_option('concerto_design_fonts_sidebar') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="inherit-content"<?php echo (get_option('concerto_design_fonts_sidebar') == 'inherit-content') ? ' selected': ''; ?>>Inherit from Content</option>
							<option value="arial"<?php echo (get_option('concerto_design_fonts_sidebar') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_sidebar') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_sidebar') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_sidebar') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_sidebar') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Font Size
						<select name="concerto_design_sizes_sidebar">
							<option value="inherit-body"<?php echo (get_option('concerto_design_sizes_sidebar') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="10"<?php echo (get_option('concerto_design_sizes_sidebar') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_sidebar') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_sidebar') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_sidebar') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_sidebar') == 15) ? ' selected': ''; ?>>15</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_sidebar') == 16) ? ' selected': ''; ?>>16</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_sidebar') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_sidebar') == 20) ? ' selected': ''; ?>>20</option>
							<option value="22"<?php echo (get_option('concerto_design_sizes_sidebar') == 22) ? ' selected': ''; ?>>22</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Article</h4>
					<p>Padding <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_article'); ?>" name="concerto_design_colors_background_article" /></p>
					
					<p>Article Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_article'); ?>" name="concerto_design_colors_background_article" /></p>
					
					<p>h1
						<select name="concerto_design_sizes_h1">
							<option value="inherit-header_title"<?php echo (get_option('concerto_design_sizes_h1') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Site Title</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_h1') == 20) ? ' selected': ''; ?>>20</option>
							<option value="24"<?php echo (get_option('concerto_design_sizes_h1') == 24) ? ' selected': ''; ?>>24</option>
							<option value="28"<?php echo (get_option('concerto_design_sizes_h1') == 28) ? ' selected': ''; ?>>28</option>
							<option value="32"<?php echo (get_option('concerto_design_sizes_h1') == 32) ? ' selected': ''; ?>>32</option>
							<option value="40"<?php echo (get_option('concerto_design_sizes_h1') == 40) ? ' selected': ''; ?>>40</option>
							<option value="44"<?php echo (get_option('concerto_design_sizes_h1') == 44) ? ' selected': ''; ?>>44</option>
							<option value="48"<?php echo (get_option('concerto_design_sizes_h1') == 48) ? ' selected': ''; ?>>48</option>
						</select>
					</p>
					<p>h2
					
						<select name="concerto_design_sizes_h2">
							<option value="14"<?php echo (get_option('concerto_design_sizes_h2') == 14) ? ' selected': ''; ?>>14</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_h2') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_h2') == 20) ? ' selected': ''; ?>>20</option>
							<option value="25"<?php echo (get_option('concerto_design_sizes_h2') == 25) ? ' selected': ''; ?>>25</option>
							<option value="28"<?php echo (get_option('concerto_design_sizes_h2') == 28) ? ' selected': ''; ?>>28</option>
							<option value="32"<?php echo (get_option('concerto_design_sizes_h2') == 32) ? ' selected': ''; ?>>32</option>
							<option value="40"<?php echo (get_option('concerto_design_sizes_h2') == 40) ? ' selected': ''; ?>>40</option>
						</select>
					</p>
					<p>h3
					
						<select name="concerto_design_sizes_h3">
							<option value="10"<?php echo (get_option('concerto_design_sizes_h3') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_h3') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_h3') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_h3') == 14) ? ' selected': ''; ?>>14</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_h3') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_h3') == 20) ? ' selected': ''; ?>>20</option>
							<option value="25"<?php echo (get_option('concerto_design_sizes_h3') == 25) ? ' selected': ''; ?>>25</option>
							<option value="28"<?php echo (get_option('concerto_design_sizes_h3') == 28) ? ' selected': ''; ?>>28</option>
						</select>
					</p>
					<p>h4
					
						<select name="concerto_design_sizes_h4">
							<option value="10"<?php echo (get_option('concerto_design_sizes_h4') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_h4') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_h4') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_h4') == 14) ? ' selected': ''; ?>>14</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_h4') == 16) ? ' selected': ''; ?>>16</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_h4') == 20) ? ' selected': ''; ?>>20</option>
							<option value="22"<?php echo (get_option('concerto_design_sizes_h4') == 22) ? ' selected': ''; ?>>22</option>
						</select>
					</p>
					<p>h5
					
						<select name="concerto_design_sizes_h5">
							<option value="10"<?php echo (get_option('concerto_design_sizes_h5') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_h5') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_h5') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_h5') == 14) ? ' selected': ''; ?>>14</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_h5') == 18) ? ' selected': ''; ?>>18</option>
						</select>
					</p>
					<p>h6
					
						<select name="concerto_design_sizes_h6">
							<option value="10"<?php echo (get_option('concerto_design_sizes_h6') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_h6') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_h6') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_h6') == 14) ? ' selected': ''; ?>>14</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_h6') == 18) ? ' selected': ''; ?>>18</option>
						</select>
					</p>
					
					<p>Title Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_title'); ?>" name="concerto_design_colors_fonts_content_title" /></p>
					<p>Link Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_link'); ?>" name="concerto_design_colors_fonts_content_link" /></p>
					<p>Hover Link Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_link_hover'); ?>" name="concerto_design_colors_fonts_content_link_hover" /></p>
					<p>Meta Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_meta'); ?>" name="concerto_design_colors_fonts_content_meta" /></p>
					
					<p>Article Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_article'); ?>" name="concerto_design_colors_borders_article" /></p>
					<p>Top Article Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_article_top'); ?>" name="concerto_design_colors_borders_article_top" /></p>
					<p>Bottom Article Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_article_bottom'); ?>" name="concerto_design_colors_borders_article_bottom" /></p>
					
					<p>Border Size
					
						<select name="concerto_design_borders_article">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_article') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_article') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_article') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_article') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_article') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_article') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_article') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Top Border Size
					
						<select name="concerto_design_borders_article_top">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_article_top') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_article_top') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_article_top') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_article_top') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_article_top') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_article_top') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_article_top') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Bottom Border Size
					
						<select name="concerto_design_borders_article_bottom">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_article_bottom') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_article_bottom') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_article_bottom') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_article_bottom') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_article_bottom') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_article_bottom') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_article_bottom') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Table Border Size
					
						<select name="concerto_design_borders_table">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_table') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_table') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_table') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_table') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_table') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_table') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_table') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Comments</h4>
					<p>Even Comments <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_comment_even'); ?>" name="concerto_design_colors_background_comment_even" /></p>
					<p>Odd Comments <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_comment_odd'); ?>" name="concerto_design_colors_background_comment_odd" /></p>
					
					<p>Meta Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_comment_meta'); ?>" name="concerto_design_colors_fonts_comment_meta" /></p>
					<p>Respond Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_respond'); ?>" name="concerto_design_colors_fonts_respond" /></p>
					
					<p>Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_comment'); ?>" name="concerto_design_colors_borders_comment" /></p>
					<p>Top Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_comment_top'); ?>" name="concerto_design_colors_borders_comment_top" /></p>
					<p>Bottom Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_comment_bottom'); ?>" name="concerto_design_colors_borders_comment_bottom" /></p>
					<p>Top Commentlist Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_commentlist_top'); ?>" name="concerto_design_colors_borders_commentlist_top" /></p>
					<p>Bottom Commentlist Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_commentlist_bottom'); ?>" name="concerto_design_colors_borders_commentlist_bottom" /></p>
					
					<p>Border Size
										
						<select name="concerto_design_borders_comment">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_comment') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_comment') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_comment') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_comment') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_comment') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_comment') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_comment') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Top Border Size
										
						<select name="concerto_design_borders_comment_top">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_comment_top') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_comment_top') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_comment_top') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_comment_top') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_comment_top') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_comment_top') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_comment_top') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Bottom Border Size
										
						<select name="concerto_design_borders_comment_bottom">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_comment_bottom') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_comment_bottom') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_comment_bottom') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_comment_bottom') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_comment_bottom') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_comment_bottom') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_comment_bottom') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Top Commentlist Border Size
										
						<select name="concerto_design_borders_commentlist_top">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_commentlist_top') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_commentlist_top') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_commentlist_top') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_commentlist_top') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_commentlist_top') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_commentlist_top') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_commentlist_top') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Bottom Commentlist Border Size
										
						<select name="concerto_design_borders_commentlist_bottom">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_commentlist_bottom') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
				</div>
				<div>
					<h4>Footer</h4>
					<p>Footer Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_footer'); ?>" name="concerto_design_colors_background_footer" /></p>
					
					<p>Font Face
						<select name="concerto_design_fonts_footer">
							<option value="inherit-body"<?php echo (get_option('concerto_design_fonts_footer') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="arial"<?php echo (get_option('concerto_design_fonts_footer') == 'arial') ? ' selected': ''; ?>>Arial</option>
							<option value="verdana"<?php echo (get_option('concerto_design_fonts_footer') == 'verdana') ? ' selected': ''; ?>>Verdana</option>
							<option value="trebuchet ms"<?php echo (get_option('concerto_design_fonts_footer') == 'trebuchet ms') ? ' selected': ''; ?>>Trebuchet MS</option>
							<option value="georgia"<?php echo (get_option('concerto_design_fonts_footer') == 'georgia') ? ' selected': ''; ?>>Georgia</option>
							<option value="times new roman"<?php echo (get_option('concerto_design_fonts_footer') == 'times new roman') ? ' selected': ''; ?>>Times New Roman</option>
						</select>
					</p>
					
					<p>Font Size
					
						<select name="concerto_design_sizes_footer">
							<option value="inherit-body"<?php echo (get_option('concerto_design_sizes_footer') == 'inherit-body') ? ' selected': ''; ?>>Inherit from Body</option>
							<option value="10"<?php echo (get_option('concerto_design_sizes_footer') == 10) ? ' selected': ''; ?>>10</option>
							<option value="11"<?php echo (get_option('concerto_design_sizes_footer') == 11) ? ' selected': ''; ?>>11</option>
							<option value="12"<?php echo (get_option('concerto_design_sizes_footer') == 12) ? ' selected': ''; ?>>12</option>
							<option value="14"<?php echo (get_option('concerto_design_sizes_footer') == 14) ? ' selected': ''; ?>>14</option>
							<option value="15"<?php echo (get_option('concerto_design_sizes_footer') == 15) ? ' selected': ''; ?>>15</option>
							<option value="16"<?php echo (get_option('concerto_design_sizes_footer') == 16) ? ' selected': ''; ?>>16</option>
							<option value="18"<?php echo (get_option('concerto_design_sizes_footer') == 18) ? ' selected': ''; ?>>18</option>
							<option value="20"<?php echo (get_option('concerto_design_sizes_footer') == 20) ? ' selected': ''; ?>>20</option>
							<option value="22"<?php echo (get_option('concerto_design_sizes_footer') == 22) ? ' selected': ''; ?>>22</option>
						</select>
					</p>
					
					<p>Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_footer'); ?>" name="concerto_design_colors_fonts_footer" /></p>
					
					<p>Border Size
					
						<select name="concerto_design_borders_footer">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_footer') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_footer') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_footer') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_footer') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_footer') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_footer') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_footer') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Top Border Size
					
						<select name="concerto_design_borders_footer_top">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_footer_top') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_footer_top') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_footer_top') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_footer_top') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_footer_top') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_footer_top') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_footer_top') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
					<p>Bottom Border Size
					
						<select name="concerto_design_borders_footer_bottom">
							<option value="inherit-container"<?php echo (get_option('concerto_design_borders_footer_bottom') == 'inherit-container') ? ' selected': ''; ?>>Inherit Global</option>
							<option value="0"<?php echo (get_option('concerto_design_borders_footer_bottom') == 0) ? ' selected': ''; ?>>0</option>
							<option value="1"<?php echo (get_option('concerto_design_borders_footer_bottom') == 1) ? ' selected': ''; ?>>1</option>
							<option value="2"<?php echo (get_option('concerto_design_borders_footer_bottom') == 2) ? ' selected': ''; ?>>2</option>
							<option value="3"<?php echo (get_option('concerto_design_borders_footer_bottom') == 3) ? ' selected': ''; ?>>3</option>
							<option value="4"<?php echo (get_option('concerto_design_borders_footer_bottom') == 4) ? ' selected': ''; ?>>4</option>
							<option value="5"<?php echo (get_option('concerto_design_borders_footer_bottom') == 5) ? ' selected': ''; ?>>5</option>
						</select>
					</p>
				</div>
			</div>
		</div>
<?php
}

function admin_design_box_columns () {
?>
		<div class="box box1column">
			<h3>Columns</h3>
			<div class="inner">
				<p class="desc">By Default, Concerto is enabled to display a 2 Column layout. The Theme also supports 3 Columns. You can change the settings below.</p>
				<select name="concerto_design_layout_columns" id="layout_columns">
					<option value="3"<?php echo (get_option('concerto_design_layout_columns') == 3) ? ' selected': ''; ?>>3 columns</option>
					<option value="2"<?php echo (get_option('concerto_design_layout_columns') == 2) ? ' selected': ''; ?>>2 columns</option>
					<option value="1"<?php echo (get_option('concerto_design_layout_columns') == 1) ? ' selected': ''; ?>>1 column</option>
				</select>
				
				<h4>Widths</h4>
				<p class="desc">Concerto automatically calculates how much Width the Theme will take.</p>
				<p>Set the width of your <em>Main Content Column</em> here.</p>
				<p><input type="text" class="small-text" value="<?php echo get_option('concerto_design_layout_columns_width_content'); ?>" name="concerto_design_layout_columns_width_content" /> px</p>

				<div class="columns2">
					<p>Set the width of your <em>Main Sidebar</em> here.</p>
					<p><input type="text" class="small-text" value="<?php echo get_option('concerto_design_layout_columns_width_sidebar1'); ?>" name="concerto_design_layout_columns_width_sidebar1" /> px</p>
				</div>

				<div class="columns3">
					<p>Set the width of your <em>Secondary Sidebar</em> here.</p>
					<p><input type="text" class="small-text" value="<?php echo (get_option('concerto_design_layout_columns_width_sidebar2') == 0) ? '': get_option('concerto_design_layout_columns_width_sidebar2'); ?>" name="concerto_design_layout_columns_width_sidebar2" /> px</p>
				</div>

				<h4 id="columnsarrangement">Arrangement</h4>
				<div class="columns3 columns_order">
					<p><label><input type="radio" value="3" id="defaultfor3columns" name="concerto_design_layout_columns_order" <?php echo (get_option('concerto_design_layout_columns_order') == 3) ? 'checked ': ''; ?>/> Content, Sidebar 1, Sidebar 2</label></p>
					<p><label><input type="radio" value="4" name="concerto_design_layout_columns_order" <?php echo (get_option('concerto_design_layout_columns_order') == 4) ? 'checked ': ''; ?>/> Sidebar 1, Content, Sidebar 2</label></p>
					<p><label><input type="radio" value="5" name="concerto_design_layout_columns_order" <?php echo (get_option('concerto_design_layout_columns_order') == 5) ? 'checked ': ''; ?>/> Sidebar 1, Sidebar 2, Content</label></p>
				</div>

				<div class="columns2 columns_order columns2arrangement">
					<p><label><input type="radio" value="1" id="defaultfor2columns" name="concerto_design_layout_columns_order" <?php echo (get_option('concerto_design_layout_columns_order') == 1) ? 'checked ': ''; ?>/> Content, Sidebar 1</label></p>
					<p><label><input type="radio" value="2" name="concerto_design_layout_columns_order" <?php echo (get_option('concerto_design_layout_columns_order') == 2) ? 'checked ': ''; ?>/> Sidebar 1, Content</label></p>
				</div>
			</div>
		</div>
<?php
}

function admin_design_box_articles () {
?>
		<div class="box box1column">
			<h3>Articles</h3>
			<div class="inner">
				<p class="desc">You can configure Display Options for your Articles below. Naturally, You can leave these options alone, but if you are feeling picky, feel free to check stuff.</p>
				<p><label><input type="checkbox" value="1" name="concerto_design_paginate" <?php echo (get_option('concerto_design_paginate') == 1) ? 'checked ': ''; ?>/> Homepage Pagination</label></p>

				<h4>Post</h4>
				<p class="desc">Display Options for Posts</p>
				<p><label><input type="checkbox" value="1" name="concerto_design_bylines_post_author" <?php echo (get_option('concerto_design_bylines_post_author') == 1) ? 'checked ': ''; ?>/> Show Author</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_bylines_post_published_date" <?php echo (get_option('concerto_design_bylines_post_published_date') == 1) ? 'checked ': ''; ?>/> Show Published Date</label></p>

				<h4>Page</h4>
				<p class="desc">Display Options for Pages</p>
				<p><label><input type="checkbox" value="1" name="concerto_design_bylines_page_author" <?php echo (get_option('concerto_design_bylines_page_author') == 1) ? 'checked ': ''; ?>/> Show Author</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_bylines_page_published_date" <?php echo (get_option('concerto_design_bylines_page_published_date') == 1) ? 'checked ': ''; ?>/> Show Published Date</label></p>

				<h4>Article Display</h4>
				<p class="desc">Display Options for Articles</p>
				<p><label><input type="checkbox" value="1" name="concerto_design_posts_excerpts" <?php echo (get_option('concerto_design_posts_excerpts') == 1) ? 'checked ': ''; ?>/> Homepage List as Excerpts</label></p>
				<p><label>Readmore Text <input type="text" class="text" value="<?php echo get_option('concerto_design_posts_readmore_text'); ?>" name="concerto_design_posts_readmore_text" /></label></p>
				
				
				<p><label><input type="checkbox" value="1" name="concerto_design_posts_navigation" <?php echo (get_option('concerto_design_posts_navigation') == 1) ? 'checked ': ''; ?>/> Navigation</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_is_closed_show_message" <?php echo (get_option('concerto_design_comments_is_closed_show_message') == 1) ? 'checked ': ''; ?>/> Display Message when Comments are closed</label></p>

				<h4>Article Meta</h4>
				<p class="desc">Display Options for Article Metas</p>
				<p><label><input type="checkbox" value="1" name="concerto_design_meta_show_edit_link" <?php echo (get_option('concerto_design_meta_show_edit_link') == 1) ? 'checked ': ''; ?>/> Show Administration Edit Link</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_meta_comments_link" <?php echo (get_option('concerto_design_meta_comments_link') == 1) ? 'checked ': ''; ?>/> Show Comments Link</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_meta_categories" <?php echo (get_option('concerto_design_meta_categories') == 1) ? 'checked ': ''; ?>/> Show Categories</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_meta_tags" <?php echo (get_option('concerto_design_meta_tags') == 1) ? 'checked ': ''; ?>/> Show Tags</label></p>

				<h4>Archive</h4>
				<p class="desc">Display Options for Archive Lists</p>
				<p><label><input type="checkbox" value="1" name="concerto_design_archive_display" <?php echo (get_option('concerto_design_archive_display') == 1) ? 'checked ': ''; ?>/> Display Excerpt</label></p>

			</div>
		</div>
<?php
}

function admin_design_box_comments () {
?>
		<div class="box box1column">
			<h3>Comments</h3>
			<div class="inner">
				<h4>Display Position</h4>
				<div style="height:120px;border:1px solid #c0c0c0;"></div>

				<h4>Body Position</h4>
				<div style="height:60px;border:1px solid #c0c0c0;"></div>
				
				<h4>Meta</h4>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_display_number" <?php echo (get_option('concerto_design_comments_display_number') == 1) ? 'checked ': ''; ?>/> Display Number</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_display_avatar" <?php echo (get_option('concerto_design_comments_display_avatar') == 1) ? 'checked ': ''; ?>/> Display Avatar</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_display_author" <?php echo (get_option('concerto_design_comments_display_author') == 1) ? 'checked ': ''; ?>/> Display Author</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_display_date" <?php echo (get_option('concerto_design_comments_display_date') == 1) ? 'checked ': ''; ?>/> Display Date</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_display_time" <?php echo (get_option('concerto_design_comments_display_time') == 1) ? 'checked ': ''; ?>/> Display Time</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_display_edit" <?php echo (get_option('concerto_design_comments_display_edit') == 1) ? 'checked ': ''; ?>/> Display Edit Link</label></p>
				<p><label><input type="checkbox" value="1" name="concerto_design_comments_trackback_date" <?php echo (get_option('concerto_design_comments_trackback_date') == 1) ? 'checked ': ''; ?>/> Display Trackback Date</label></p>
				
				<h4>Options</h4>
				<p>Avatar Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_comments_avatar_size'); ?>" name="concerto_design_comments_avatar_size" /></p>
				<p>Time Format <input type="text" class="small-text" value="<?php echo get_option('concerto_design_comments_time_format'); ?>" name="concerto_design_comments_time_format" /></p>
			</div>
		</div>
<?php
}

function admin_design_box_eyecandy () {
?>
		<div class="box box1column">
			<h3>EyeCandy</h3>
			<div class="inner">
				<p class="desc">Some EyeCandy Options may not be supported by the browser you are using, mainly Internet Explorer. Check the Features below if you want your blog to have some cool effects.</p>
				<ul id="extensions">
					<li>
						<label><input type="checkbox" value="1" name="concerto_design_glow" <?php echo (get_option('') == 1) ? 'checked ': ''; ?>/> <strong>Glow</strong></label>
						<p>This feature will apply a nice glow to your Blog container's border</p>
					</li>
					<li>
						<label><input type="checkbox" value="1" name="concerto_design_engrave" <?php echo (get_option('') == 1) ? 'checked ': ''; ?>/> <strong>Engraved Text</strong></label>
						<p>This feature will make your text look engraved</p>
					</li>
				</ul>
			</div>
		</div>
<?php
}

?>