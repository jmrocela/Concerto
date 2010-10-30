<?php
function admin_design() {
?>
<div class="wrap concerto">
	<div id="concerto_header">
		<h2 id="cfw_title">Concerto &#0187; Design</h2>
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
					<h3>Markup</h3>
					<p>This option enables your page to display markup in HTML4 or HTML5 format. It is recommended that you use HTML4 if you have little knowledge of what HTML5 is.</p>
					<p><label><input type="radio" value="html4" name="cfw_html_markup" checked/> HTML4 <em>(recommended)</em></label></p>
					<p><label><input type="radio" value="html5" name="cfw_html_markup"/> HTML5 <a href="javascript:;">(?)</a></label></p>
				</div>
				<div class="cfw_box">
					<h3>Page Structure</h3>
					<p>For detailed explanation of what Page structure is, please visit the <a href="http://themeconcert.com/concerto/manual/page_structure">Concerto Manual</a>. This option will give you more flexibility in customizing your Stage themes.</p>
					<p><label><input type="radio" value="wrap" name="cfw_page_struct" checked/> Wrapped</label></p>
					<p><label><input type="radio" value="full" name="cfw_page_struct"/> Full Width</label></p>
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