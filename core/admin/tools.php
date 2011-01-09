<?php

function admin_tools() {
?>
<div class="wrap concerto">
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
				<select name="concerto_stage" disabled>
					<?php
						$st = $stages->stages;
						foreach ($st as $stage) {
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

function admin_tools_box_importconfiguration () {
?>
		<div class="box box1column">
			<h3>Import Configuration</h3>
			<div class="inner">
				<p class="desc">If you would like to import a specific Configuration Set for your Concerto installation, you can do so here.</p>
				<p><label>Select a  <code>.cfwconf</code> file</label></p>
				<p>
					<input type="submit" value="Import" class="button"/>
					<label>
						to
						<select name="cfw_import_applyto">
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

function admin_tools_box_exportconfiguration () {
?>
		<div class="box box1column">
			<h3>Export Configuration</h3>
			<div class="inner">
				<p class="desc">If you would like to export your Configuration from this Installation to another, you can do so here.</p>
				<p><label><input type="checkbox" value="1" name="cfw_export_general" /> General Options</label></p>
				<p><label><input type="checkbox" value="2" name="cfw_export_design" /> Design Options</label></p>
				<p>
					<input type="submit" value="Export" class="button"/>
					<label>
						from
						<select name="cfw_import_applyto">
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

function admin_tools_box_newstage () {
?>
		<div class="box box1column">
			<h3>Create New Stage</h3>
			<div class="inner">
				<p class="desc">If you wish to create a new stage with all the default settings, supply it's name and we will make it for you.</p>
				<h4>Manual</h4>
				<p><input type="text" value="" name="cfw_new_stage_name" class="text" style="width:155px;" /> <input type="button" value="Create this Stage" class="button"/></p>
				<p class="desc">If you already have a stage set with images, you can upload it here.</p>
				<h4>Upload</h4>
				<p><input type="button" value="Upload Stage" class="button"/></p>
			</div>
		</div>
<?php
}

function admin_tools_box_restoreconfiguration () {
?>
		<div class="box box1column">
			<h3>Restore Default Configuration</h3>
			<div class="inner">
				<p class="desc">Don't like what you see but don't know what you did wrong? Try restoring to the default configuration, it might fix your problem.</p>
				<p><label><input type="checkbox" value="1" name="cfw_restore_general" /> General Options</label></p>
				<p><label><input type="checkbox" value="2" name="cfw_restore_design" /> Design Options</label></p>
				<p>
					<input type="submit" value="Restore Defaults" class="button"/>
					<label>
						to
						<select name="cfw_import_applyto">
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
?>