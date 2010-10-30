<?php
function admin_support() {
?>
<div class="wrap concerto">
	<div id="concerto_header">
		<h2 id="cfw_title">Concerto &#0187; Support</h2>
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
				<h3><?php _e('Your Registration', 'concerto'); ?></h3>
				<p class="green">You are running a Beta version of Concerto which is Free! Enjoy :)</p>
				<p><?php _e('This distribution is registered to <strong class="greentext">jmrocela</strong> and is licensed to be <strong class="greentext">allowed use on http://projects/concerto/ only.</strong>', 'concerto'); ?></p>
				<p><input type="button" value="Upgrade to a Multi-Domain Package."/> <a href="#"><?php _e('Plans &amp; Pricing', 'concerto'); ?></a></p>
			</div>
			<div class="cfw_box">
				<h3><?php _e('Customer Support', 'concerto'); ?></h3>
				<p><?php _e('For customer support, please email <em><a href="mailto:support@themeconcert.com">support@themeconcert.com</a></em>. We will reply to everyone\'s messages. The usual response time for messages is less than 6 hours.', 'concerto'); ?></p>
				<p><?php _e('For a much quicker solution, please visit the <em><a href="http://themeconcert.com/forums/">Concerto Community</a></em> and post your question there. Our lovely community will be glad to help you in your problem.', 'concerto'); ?></p>
			</div>
			<div class="cfw_box">
				<h3><?php _e('Search the Manual', 'concerto'); ?></h3>
				<p><?php _e('Are you stuck? Check the Manual with this convenient Search Tool.', 'concerto'); ?></p>
				<form method="GET" action="http://themeconcert.com/search" target="cfw_search">
				<input type="text" name="s" />
			</div>
		</div>
		<div class="cfw_column">
			<div class="cfw_box">
				<h3><?php _e('Terms &amp; Agreements', 'concerto'); ?>*</h3>
				<p><?php _e('Please read the <em>gist</em> of Concerto\'s Terms &amp; Agreements. As a customer, it is your right to know the things usually overlooked.', 'concerto'); ?></p>
				<div id="cfw_terms_agreements_box">

				</div>
				<p><?php _e('You can read the whole Terms &amp; Agreement document online <em><a href="http://themeconcert.com/terms-and-agreements" target="_blank">Here</a></em>', 'concerto'); ?></p>
			</div>
		</div>
		<div class="cfw_column">
			<div class="cfw_box">
				<h3><?php _e('About Concerto', 'concerto'); ?></h3>
				<p><?php _e('Concerto is a Powerful Wordpress Theme Framework. Developed by <em>John Rocela</em>, a Wordpress Expert for 2 years, Concerto might be the only Theme you will need the rest of your Wordpress Blogging life. Concerto provides the <code>PHP/HTML/CSS</code> illiterate user to customize endlessly and enables the Wordpress developer great deal of flexibility.', 'concerto'); ?></p>
				<p><?php _e('For more in-depth explanation of what Concerto has to offer, visit <em><a href="http://themeconcert.com" target="_blank">Themeconcert</a></em>', 'concerto'); ?></p>
				<p><?php _e('Copyright', 'concerto'); ?> &#0169; 2010 Concerto, Themeconcert.</p>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>