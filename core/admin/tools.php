<?php
function admin_tools() {
?>
<div class="wrap concerto">
	<div id="concerto_header">
		<h2 id="cfw_title">Concerto &#0187; Tools</h2>
	</div>
	<ul id="concerto_navigation">
		<li><a href="http://themeconcert.com/" target="_blank">Themeconcert</a></li>
		<li><a href="http://themeconcert.com/concerto/manual" target="_blank"><?php _e('User\'s Manual', 'concerto'); ?></a></li>
		<li><a href="http://themeconcert.com/forums/" target="_blank"><?php _e('Community', 'concerto'); ?></a></li>
		<li><a href="http://themeconcert.com/changelog/" target="_blank"><strong><?php _e('Version', 'concerto'); ?> <?php echo CONCERTO_VERSION; ?></strong></a></li>
		<li><input type="text" value="Quick Search Module" id="highlight" onfocus="if(jQuery('#highlight').val() == 'Quick Search Module')jQuery('#highlight').val('')" onblur="if(jQuery('#highlight').val() == '')jQuery('#highlight').val('Quick Search Module')"/></li>
	</ul>
	<div id="concerto_controls">
		<div class="cfw_column">
			<div class="cfw_box">
				<h3>Import Configuration</h3>
				<p>If you would like to import a specific Configuration Set for your Concerto installation, you can do so here.</p>
				<p><label>Select a  <code>.cfwconf</code> file <input type="file" name="cfw_import_configuration" /></label></p>
				<p>
					<input type="submit" value="Import"/>
					<label>
						to
						<select name="cfw_import_applyto">
							<option value="default">Default</option>
						</select>
						Stage
					</label>
				</p>
			</div>
			<div class="cfw_box">
				<h3>Export Configuration</h3>
				<p>If you would like to export your Configuration from this Installation to another, you can do so here.</p>
				<p><label><input type="checkbox" value="1" name="cfw_export_general" /> General Options</label></p>
				<p><label><input type="checkbox" value="2" name="cfw_export_design" /> Design Options</label></p>
				<p>
					<input type="submit" value="Export"/>
					<label>
						from
						<select name="cfw_import_applyto">
							<option value="default">Default</option>
						</select>
						Stage
					</label>
				</p>
			</div>				
		</div>
		<div class="cfw_column">
			<div class="cfw_box">
				<h3>Stage File Editor</h3>
				<p>Once you select a file you wish to edit, the editor will pop up. Don't be scared.</p>
				<p>
					<label>
						Select files from
						<select name="cfw_file_editor">
							<option value="default">Default</option>
						</select>
						Stage
					</label>
				</p>
				<p>
					<select name="cfw_file_editor_file" style="width:240px;">
						<option>style.css</option>
						<option>functions.css</option>
					</select>
					<input type="button" value="Edit this file"/>
				</p>
			</div>
			<div class="cfw_box">
				<h3><?php _e('Create a new Stage', 'concerto'); ?></h3>
				<p><?php _e('If you wish to create a new stage with all the default settings, supply it\'s name and we will make it for you.', 'concerto'); ?></p>
				<p><em><?php _e('Manual', 'concerto'); ?></em></p>
				<p><input type="text" value="" name="cfw_new_stage_name" /></p>
				<p><input type="button" value="<?php _e('Create this Stage', 'concerto'); ?>"/></p>
				<p><?php _e('If you already have a stage set with images, you can upload it here.', 'concerto'); ?></p>
				<p><em><?php _e('Upload', 'concerto'); ?></em></p>
				<p><input type="file" value="" name="cfw_new_stage_file" size="27"/><input type="button" value="<?php _e('Upload Stage', 'concerto'); ?>"/></p>
			</div>
		</div>
		<div class="cfw_column">
			<div class="cfw_box">
				<h3>Update Version</h3>
				<p>This tool will let you update your current Concerto installation. We will automatically determine if you need to update.</p>
				<p class="green">You are up to date!</p>
			</div>
			<div class="cfw_box">
				<h3>Restore Default Configuration</h3>
				<p>Don't like what you see but don't know what you did wrong? Try restoring to the default configuration, it might fix your problem.</p>
				<p><label><input type="checkbox" value="1" name="cfw_restore_general" /> General Options</label></p>
				<p><label><input type="checkbox" value="2" name="cfw_restore_design" /> Design Options</label></p>
				<p>
					<input type="submit" value="Restore Defaults"/>
					<label>
						to
						<select name="cfw_import_applyto">
							<option value="default">Default</option>
						</select>
						Stage
					</label>
				</p>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>