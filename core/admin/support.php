<?php

function admin_support() {
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
	<div id="concerto_dashboard">
		<?php do_action('concerto_admin_support'); ?>
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

function admin_general_box_registration() {
?>
	<div class="box box1column" id="concerto_registration">
		<h3>Your Registration</h3>
		<div class="inner">
			<?php if (get_option('concerto_naughty') == 1) { ?>
			<div id="naughty"><strong>I think someone's being naughty!</strong><br/>It seems you are using an unregistered copy of Concerto.</div>
			<p style="text-align:center;font-size:10px;"><a href="http://themeconcert.com/unregistered/">What is this?</a> <a href="http://themeconcert.com/members/verify/">Do you think this is wrong?</a></p>
			<?php } else { ?>
			<div style="text-align:center;">
				<p>This copy of Concerto is registered to</p>
				<p id="license_to"><strong class="greentext"><?php echo get_option('concerto_license_to'); ?></strong></p>
				<p>and is licensed for <strong><?php echo get_option('concerto_license'); ?></strong> use on</p>
				<p id="license_on">
				<?php
					$sites = unserialize(get_option('concerto_license_on'));
					foreach ($sites as $site) {
				?>
					<strong><a href="<?php echo $site; ?>"><?php echo $site; ?></a></strong><br/>
				<?php 
					}
				?>
				</p>
			</diV>
			<?php if (get_option('concerto_license') != 'unrestricted') { ?>
			<form action="http://themeconcert.com/pricing/" method="POST" id="registation_upgrade">
				<input type="hidden" name="license" value="<?php echo get_option('concerto_license'); ?>" />
				<input type="hidden" name="license_to" value="<?php echo get_option('concerto_license_to'); ?>" />
				<input type="hidden" name="license_key" value="<?php echo get_option('concerto_license_key'); ?>" />
				<input type="hidden" name="license_on" value="<?php echo get_option('concerto_license_on'); ?>" />
				<input type="hidden" name="license_copies" value="<?php echo get_option('concerto_license_copies'); ?>" />
				<input type="hidden" name="license_referrer" value="<?php bloginfo('url'); ?>/" />
				<input type="submit" value="Upgrade your Package."/>
				<a href="http://themeconcert.com/pricing/">Plans &amp; Pricing</a>
			</form>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
<?php
}

function admin_general_box_about() {
?>
	<div class="box box1column" id="concerto_about">
		<h3>About Concerto</h3>
		<div class="inner">
			<p class="desc">Concerto is a Powerful Theme Framework built on top of the powerful Wordpress Blogging platform. Concerto might be the only Theme you will need the rest of your life. Concerto provides the regular user to customize endlessly and enables the WordPress developer and Designer great deal of flexibility.</p>
			<p class="desc">For more in-depth explanation of what Concerto has to offer, visit <a href="http://themeconcert.com" target="_blank">Themeconcert</a></p>
			<p class="desc">Copyright &#0169; 2010 Concerto, Themeconcert.</p>
		</div>
	</div>
<?php
}

function admin_general_box_support() {
?>
	<div class="box box1column" id="concerto_support">
		<h3>Customer Support</h3>
		<div class="inner">
			<p class="desc">For customer support, please email <a href="mailto:support@themeconcert.com">support@themeconcert.com</a>. We will reply to everyone's messages. The usual response time for messages is less than 6 hours and will not be automated.</p>
			<p class="desc">For a much quicker solution, please visit the <a href="http://themeconcert.com/community/">Concerto Community</a> and post your question there. Our growing community will be glad to help you in your problem.</p>
		</div>
	</div>
<?php
}

function admin_general_box_terms_and_agreements() {
?>
	<div class="box box2columns" id="concerto_terms_and_agreements">
		<h3>Terms &amp; Agreements</h3>
		<div class="inner">
			<p class="desc">Please read the gist of Concerto's Terms &amp; Agreements. As a customer, it is your right to know the things usually overlooked.</p>
			<div id="terms_agreements_box">
				<div style="text-align:center;">
					<h4 style="font-size:18px;">Temporary Terms and Agreements</h4>
					<p style="font-size:12px;">This is a Temporary Document for Concerto serving as a Placeholder.</p>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id nisi iaculis dui imperdiet scelerisque eget vitae dolor. Proin egestas odio vel leo hendrerit consectetur. Cras a odio urna, et hendrerit massa. Suspendisse ut est tortor, id dictum mi. Quisque eget tellus erat. Sed purus nunc, volutpat eu fermentum eget, luctus aliquam sapien. Vestibulum bibendum mauris eu est suscipit sed pretium ipsum suscipit. Pellentesque sit amet neque sem, vel pretium tortor. In vitae felis orci. Etiam elementum libero non massa tempor feugiat. Proin a justo et diam lobortis ullamcorper. Vivamus sit amet odio quam, vel volutpat nisi. Ut tincidunt ultricies orci et viverra. Duis vel orci velit, eu luctus libero.</p>
				<p>Nunc ut neque urna, at tempus turpis. Sed tempor ornare porta. Aliquam venenatis congue diam sed lacinia. Nam ut justo libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper mauris ac mauris tempor vel molestie sapien condimentum. Nulla facilisi. Cras ac nunc ipsum. Etiam condimentum pellentesque aliquam. Integer accumsan, arcu eu tempus volutpat, risus mauris lacinia est, eu vehicula enim mauris et quam. Fusce in leo elit. Donec tincidunt consequat ultricies. Aliquam erat volutpat. In pharetra interdum sapien in molestie. Morbi nunc arcu, rutrum in tincidunt et, ultrices sit amet sem. Quisque molestie mi non nunc placerat ac pharetra ipsum facilisis. Aenean bibendum molestie luctus. Aliquam leo enim, hendrerit molestie bibendum et, congue blandit dui. Ut massa metus, aliquet ut rutrum ac, porta varius odio.</p>
				<p>Nam mauris magna, hendrerit et scelerisque vel, vehicula id lacus. Nam posuere nibh id purus scelerisque commodo. Morbi at diam nulla. Ut mattis nisi eu ligula facilisis id ultricies mauris varius. Aenean luctus, mauris eget luctus molestie, elit felis dignissim nibh, at tempus urna eros eu quam. Fusce ut bibendum augue. Cras elementum purus eros, ut varius lectus. Etiam vel leo a augue dapibus dignissim. Vestibulum metus nunc, aliquet non congue a, tincidunt vel neque. Mauris at est quis ante dictum venenatis nec id magna. Nulla blandit justo vitae tortor egestas adipiscing. Donec quis pulvinar urna. Proin tincidunt enim id erat faucibus gravida. Maecenas mollis nunc ut ante condimentum luctus vestibulum ipsum cursus. Nullam interdum lectus tempor metus semper aliquet. Maecenas velit dui, scelerisque vel euismod at, venenatis quis sapien. Etiam luctus, diam vitae auctor eleifend, mauris lectus commodo sapien, bibendum dapibus lectus dolor a risus.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id nisi iaculis dui imperdiet scelerisque eget vitae dolor. Proin egestas odio vel leo hendrerit consectetur. Cras a odio urna, et hendrerit massa. Suspendisse ut est tortor, id dictum mi. Quisque eget tellus erat. Sed purus nunc, volutpat eu fermentum eget, luctus aliquam sapien. Vestibulum bibendum mauris eu est suscipit sed pretium ipsum suscipit. Pellentesque sit amet neque sem, vel pretium tortor. In vitae felis orci. Etiam elementum libero non massa tempor feugiat. Proin a justo et diam lobortis ullamcorper. Vivamus sit amet odio quam, vel volutpat nisi. Ut tincidunt ultricies orci et viverra. Duis vel orci velit, eu luctus libero.</p>
				<p>Nunc ut neque urna, at tempus turpis. Sed tempor ornare porta. Aliquam venenatis congue diam sed lacinia. Nam ut justo libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper mauris ac mauris tempor vel molestie sapien condimentum. Nulla facilisi. Cras ac nunc ipsum. Etiam condimentum pellentesque aliquam. Integer accumsan, arcu eu tempus volutpat, risus mauris lacinia est, eu vehicula enim mauris et quam. Fusce in leo elit. Donec tincidunt consequat ultricies. Aliquam erat volutpat. In pharetra interdum sapien in molestie. Morbi nunc arcu, rutrum in tincidunt et, ultrices sit amet sem. Quisque molestie mi non nunc placerat ac pharetra ipsum facilisis. Aenean bibendum molestie luctus. Aliquam leo enim, hendrerit molestie bibendum et, congue blandit dui. Ut massa metus, aliquet ut rutrum ac, porta varius odio.</p>
				<p>Nam mauris magna, hendrerit et scelerisque vel, vehicula id lacus. Nam posuere nibh id purus scelerisque commodo. Morbi at diam nulla. Ut mattis nisi eu ligula facilisis id ultricies mauris varius. Aenean luctus, mauris eget luctus molestie, elit felis dignissim nibh, at tempus urna eros eu quam. Fusce ut bibendum augue. Cras elementum purus eros, ut varius lectus. Etiam vel leo a augue dapibus dignissim. Vestibulum metus nunc, aliquet non congue a, tincidunt vel neque. Mauris at est quis ante dictum venenatis nec id magna. Nulla blandit justo vitae tortor egestas adipiscing. Donec quis pulvinar urna. Proin tincidunt enim id erat faucibus gravida. Maecenas mollis nunc ut ante condimentum luctus vestibulum ipsum cursus. Nullam interdum lectus tempor metus semper aliquet. Maecenas velit dui, scelerisque vel euismod at, venenatis quis sapien. Etiam luctus, diam vitae auctor eleifend, mauris lectus commodo sapien, bibendum dapibus lectus dolor a risus.</p>
			</div>
			<p class="desc">You can read the whole Terms &amp; Agreement document online <a href="http://themeconcert.com/documents/licenses/<?php echo get_option('concerto_license'); ?>" target="_blank">Here</a>.</p>
		</div>
	</div>
<?php
}

function admin_general_box_search() {
?>
	<div class="box box1column" id="concerto_search">
		<h3>Search the Manual</h3>
		<div class="inner">
			<p class="desc">Are you stuck? Check the Manual with this convenient Search Tool.</p>
			<form method="GET" action="http://themeconcert.com/" target="_search">
			<input type="text" class="text" name="s" />
		</div>
	</div>
<?php
}
?>