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
		
		<div class="box box1column">
			<h3>Markup</h3>
			<div class="inner">
				<p class="desc">This option enables your page to display markup in HTML4 or HTML5 format. It is recommended that you use HTML4 if you have little knowledge of what HTML5 is.</p>
				<p><label><input type="radio" value="4" name="concerto_design_html_version" <?php echo (get_option('concerto_design_html_version') == 4) ? 'checked ': ''; ?>/> HTML4 (recommended)</label></p>
				<p><label><input type="radio" value="5" name="concerto_design_html_version" <?php echo (get_option('concerto_design_html_version') == 5) ? 'checked ': ''; ?>/> HTML5 <a href="http://themeconcert.com/concerto/manual/markup#html5">(experimental)</a></label></p> <!-- does not degrade yet -->
			</div>
		</div>
		
		<div class="box box2columns">
			<h3>Header</h3>
			<div class="inner">
				<div id="header">
					<select>
						<option>Text Only</option>
						<option>Text &amp; Logo</option>
						<option>Image</option>
					</select>
					<div style="width:596px;height:120px;border:1px solid #c0c0c0;">
						<a href="javascript:;" style="position:relative;top:0;left:0;padding:2px 5px;font-size:11px;">Change Header</a>
					</div>
					<p><label><input type="checkbox" value="1" name="concerto_design_header_title" <?php echo (get_option('concerto_design_header_title') == 1) ? 'checked ': ''; ?>/> Show Title</label></p>
					<p><label><input type="checkbox" value="1" name="concerto_design_header_description" <?php echo (get_option('concerto_design_header_description') == 1) ? 'checked ': ''; ?>/> Show Description</label></p>
				</div>
			</div>
		</div>
		
		<div class="box box1column">
			<h3>Page Layout</h3>
			<div class="inner">
				<p class="desc">For detailed explanation of what Page Layout is, please visit the <a href="http://themeconcert.com/concerto/manual/page_structure">Concerto Manual</a>. This option will give you more flexibility in customizing your Stages</p>
				<p><label><input type="radio" value="fullwidth" name="concerto_design_page_structure" <?php echo (get_option('concerto_design_page_structure') == 'fullwidth') ? 'checked ': ''; ?>/> Full-Width Layout</label></p>
				<p><label><input type="radio" value="wrapped" name="concerto_design_page_structure" <?php echo (get_option('concerto_design_page_structure') == 'wrapped') ? 'checked ': ''; ?>/> Wrapped Layout</label></p>
			</div>
		</div>
		
		<div class="box box1column">
			<h3>Fonts, Colors and Borders</h3>
			<div class="inner">
				<!--FORGOT FONT FAMILY-->
				<div>
					<h4>Body</h4>
					<p>Outer Page Padding <input type="text" class="small-text" value="<?php echo get_option('concerto_design_page_padding'); ?>" name="concerto_design_page_padding" /></p>
					<p>Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_site'); ?>" name="concerto_design_colors_background_site" /></p>
					<p>Container Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_container'); ?>" name="concerto_design_colors_background_container" /></p>
					<p>Main Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_main'); ?>" name="concerto_design_colors_background_main" /></p>
					
					<p>Global Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_body'); ?>" name="concerto_design_sizes_body" /></p>
					
					<p>Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_site'); ?>" name="concerto_design_colors_fonts_site" /></p>
					<p>Link Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_link'); ?>" name="concerto_design_colors_fonts_link" /></p>
					<p>Hover Link Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_link_hover'); ?>" name="concerto_design_colors_fonts_link_hover" /></p>
					<p>Visted Link Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_link_visited'); ?>" name="concerto_design_colors_fonts_link_visited" /></p>
					
					<p>Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_common'); ?>" name="concerto_design_colors_borders_common" /></p>
					<p>Container Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_container'); ?>" name="concerto_design_borders_container" /></p>
				</div>
				<div>
					<h4>Header</h4>
					<p>Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_header'); ?>" name="concerto_design_colors_background_header" /></p>
					
					<p>Title Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_header_title'); ?>" name="concerto_design_sizes_header_title" /></p>
					<p>Description Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_header_description'); ?>" name="concerto_design_sizes_header_description" /></p>
					
					<p>Title Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_header_title'); ?>" name="concerto_design_colors_fonts_header_title" /></p>
					<p>Description Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_header_description'); ?>" name="concerto_design_colors_fonts_header_description" /></p>
					
					<p>Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_header'); ?>" name="concerto_design_borders_header" /></p>
					<p>Top Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_header_top'); ?>" name="concerto_design_borders_header_top" /></p>
					<p>Bottom Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_header_bottom'); ?>" name="concerto_design_borders_header_bottom" /></p>
				</div>
				<div>
					<h4>Navigation Menu</h4>
					<p>Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_menu'); ?>" name="concerto_design_colors_background_menu" /></p>
					<p>Active Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_menu_active'); ?>" name="concerto_design_colors_background_menu_active" /></p>
					<p>Hover Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_menu_hover'); ?>" name="concerto_design_colors_background_menu_hover" /></p>
					
					<p>Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_menu'); ?>" name="concerto_design_sizes_menu" /></p>
					
					<p>Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_menu'); ?>" name="concerto_design_colors_fonts_menu" /></p>
					<p>Active Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_menu_active'); ?>" name="concerto_design_colors_fonts_menu_active" /></p>
					<p>Hover Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_menu_hover'); ?>" name="concerto_design_colors_fonts_menu_hover" /></p>
					
					<p>Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_menu'); ?>" name="concerto_design_colors_borders_menu" /></p>
					<p>Active Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_menu_active'); ?>" name="concerto_design_colors_borders_menu_active" /></p>
					<p>Hover Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_menu_hover'); ?>" name="concerto_design_colors_borders_menu_hover" /></p>
					
					<p>Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_menu'); ?>" name="concerto_design_borders_menu" /></p>
				</div>
				<div>
					<h4>Content</h4>
					<p>Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_content'); ?>" name="concerto_design_colors_background_content" /></p>
					
					<p>Title Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_content_title'); ?>" name="concerto_design_sizes_content_title" /></p>
					<p>Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_content'); ?>" name="concerto_design_sizes_content" /></p>
					<p>Meta Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_content_meta'); ?>" name="concerto_design_sizes_content_meta" /></p>
				</div>
				<div>
					<h4>Sidebar</h4>
					<p>Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_sidebar'); ?>" name="concerto_design_sizes_sidebar" /></p>
				</div>
				<div>
					<h4>Article</h4>
					<p>Padding <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_article'); ?>" name="concerto_design_colors_background_article" /></p>
					
					<p>Article Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_article'); ?>" name="concerto_design_colors_background_article" /></p>
					
					<p>h1 <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_h1'); ?>" name="concerto_design_sizes_h1" /></p>
					<p>h2 <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_h2'); ?>" name="concerto_design_sizes_h2" /></p>
					<p>h3 <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_h3'); ?>" name="concerto_design_sizes_h3" /></p>
					<p>h4 <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_h4'); ?>" name="concerto_design_sizes_h4" /></p>
					<p>h5 <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_h5'); ?>" name="concerto_design_sizes_h5" /></p>
					<p>h6 <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_h6'); ?>" name="concerto_design_sizes_h6" /></p>
					
					<p>Title Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_title'); ?>" name="concerto_design_colors_fonts_content_title" /></p>
					<p>Link Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_link'); ?>" name="concerto_design_colors_fonts_content_link" /></p>
					<p>Hover Link Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_link_hover'); ?>" name="concerto_design_colors_fonts_content_link_hover" /></p>
					<p>Meta Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_content_meta'); ?>" name="concerto_design_colors_fonts_content_meta" /></p>
					
					<p>Article Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_article'); ?>" name="concerto_design_colors_borders_article" /></p>
					<p>Top Article Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_article_top'); ?>" name="concerto_design_colors_borders_article_top" /></p>
					<p>Bottom Article Border Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_borders_article_bottom'); ?>" name="concerto_design_colors_borders_article_bottom" /></p>
					
					<p>Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_article'); ?>" name="concerto_design_borders_article" /></p>
					<p>Top Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_article_top'); ?>" name="concerto_design_borders_article_top" /></p>
					<p>Bottom Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_article_bottom'); ?>" name="concerto_design_borders_article_bottom" /></p>
					<p>Table Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_table'); ?>" name="concerto_design_borders_table" /></p>
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
					
					<p>Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_comment'); ?>" name="concerto_design_borders_comment" /></p>
					<p>Top Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_comment_top'); ?>" name="concerto_design_borders_comment_top" /></p>
					<p>Bottom Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_comment_bottom'); ?>" name="concerto_design_borders_comment_bottom" /></p>
					<p>Top Commentlist Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_commentlist_top'); ?>" name="concerto_design_borders_commentlist_top" /></p>
					<p>Bottom Commentlist Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_commentlist_bottom'); ?>" name="concerto_design_borders_commentlist_bottom" /></p>
				</div>
				<div>
					<h4>Footer</h4>
					<p>Footer Background <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_background_footer'); ?>" name="concerto_design_colors_background_footer" /></p>
					
					<p>Font Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_sizes_footer'); ?>" name="concerto_design_sizes_footer" /></p>
					
					<p>Text Color <input type="text" class="small-text" value="<?php echo get_option('concerto_design_colors_fonts_footer'); ?>" name="concerto_design_colors_fonts_footer" /></p>
					
					<p>Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_footer'); ?>" name="concerto_design_borders_footer" /></p>
					<p>Top Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_footer_top'); ?>" name="concerto_design_borders_footer_top" /></p>
					<p>Bottom Border Size <input type="text" class="small-text" value="<?php echo get_option('concerto_design_borders_footer_bottom'); ?>" name="concerto_design_borders_footer_bottom" /></p>
				</div>
			</div>
		</div>
		
		<div class="box box1column">
			<h3>Columns</h3>
			<div class="inner">
				<script type="text/javascript">
					jQuery(function($) {
						/**
						 * Behaviour
						 */
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
					});
				</script>
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
		
		
	</div>
	</form>
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
?>