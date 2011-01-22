<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: ConcertoAdmin
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

/**
 * Admin Support
 *
 * Support Concerto backend dashboard
 */
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
								<option value="<?php echo strtolower($sta['name']); ?>"<?php echo (strtolower($sta['name']) == strtolower($stage)) ? ' selected': ''; ?>><?php echo $sta['name']; ?></option>
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
				<?php if (get_option('concerto_need_update') == 1) { ?><em><a href="http://themeconcert.com/members/update/" target="_new">Upgrade your Copy</a></em><?php } ?>
			</p>
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

/**
 * Support Box: About
 *
 * About box
 */
function admin_support_box_about() {
?>
	<div class="box box1column" id="concerto_about">
		<h3>About Concerto</h3>
		<div class="inner">
			<p class="desc">Concerto is a Powerful Theme Framework built on top of the powerful Wordpress Blogging platform. Concerto might be the only Theme you will need the rest of your life. Concerto provides the regular user to customize endlessly and enables the WordPress Developer and Designer great deal of flexibility through hooks and filters.</p>
			<p class="desc">For a more in-depth explanation of what Concerto has to offer, visit <a href="http://themeconcert.com" target="_blank">Themeconcert</a></p>
			<p class="desc">Copyright &#0169; <?php echo date('Y'); ?> Concerto, Themeconcert.</p>
		</div>
	</div>
<?php
}

/**
 * Support Box: Support
 *
 * Support box
 */
function admin_support_box_support() {
?>
	<div class="box box1column" id="concerto_support">
		<h3>Customer Support</h3>
		<div class="inner">
			<p class="desc">For customer support, please email <a href="mailto:support@themeconcert.com">support@themeconcert.com</a>. We will reply to everyone's messages. The usual response time for messages is less than 6 hours and will not be automated.</p>
			<p class="desc">For a much quicker solution, please visit the <a href="http://community.themeconcert.com/">Concerto Community</a> and post your question there. Our growing community will be glad to help you in your problem.</p>
			<div style="text-align:center;margin:20px 0 10px;">
				<a href="http://support.themeconcert.com/" class="button">Contact Support</a>
			</div>
		</div>
	</div>
<?php
}

/**
 * Support Box: Terms and Agreements
 *
 * Terms and Agreements
 */
function admin_support_box_terms_and_agreements() {
?>
	<div class="box box2columns" id="concerto_terms_and_agreements">
		<h3>Terms &amp; Conditions</h3>
		<div class="inner">
			<div id="terms_agreements_box">
				<div>
					<p>Before purchasing any products from ThemeConcert, be it the framework, stages or bundles, please make sure that <strong>you have read and agreed to all our terms</strong>. By using Concerto, we will assume that <strong>you have read, agreed and accepted the terms of use</strong> that follows.</p>
					<p>ThemeConcert <strong>reserves the right</strong> to change prices for all it's products. This right also applies to our terms and conditions that will change at anytime without prior notice.</p>
					
					<h5>Limitation of liability</h5>
					<p>Under no circumstances shall <strong>ThemeConcert</strong> be liable for any direct, indirect, special, incidental or consequential damages, including, but not limited to, loss of data or profit, arising aut of the use, or the inability to use, the materials on this site, even if <strong>ThemeConcert</strong> or an authorised representative has been advised of the possibility of such damages. If your use of materials from this site results in the need for servicing, repair or correction of equipment or data, you assume any costs thereof.</p>
					
					<h5>License Types</h5>
					<p>ThemeConcert sells 2 types of licenses: <strong>Personal License</strong> which allows you to use the theme on a single website and domain and the <strong>Developer License</strong>, that allows you to use the theme on multiple websites and domains. It is not allowed to sub-license, assign, or transfer your licenses to anyone.</p>
					<p><strong>You may not</strong> claim intellectual or exclusive ownership to Concerto's core framework, modified or unmodified.</p>
					<p><strong>You may</strong> claim intellectual or exclusive ownership to a Stage theme you developed or designed.</p>
					<p><strong>You are allowed</strong> to use a theme in all your client projects but it <strong>does not allow</strong> redistribution of the theme in any form. Modified or unmodified, it is not permitted to share our themes on a disk, website, or any other medium. Resale is also <strong>not permitted</strong> and it is prohibited to port ThemeConcert stages to other platforms and content management systems.</p>
					<p><strong>You are allowed</strong> to make any changes and modifications in the stages or products to suit your needs. It is not permitted to change or remove the copyright information in the source code. This includes the all PHP, JavaScript, HTML and CSS files distributed with our products. Of course, any visual copyrights, for example the copyrights in the theme footer can be removed. </p>
					
					<h5>Payments &amp; Refund</h5>
					<p>All payments are handled through PayPal using PayPal standard payment.</p>
					<p>Consider that we offer intangible digital goods. We do not issue refunds after the purchase is made, which you are responsible for understanding upon making it.</p>
					
					<h5>Warranty</h5>
					<p>Concerto is provided <strong>"as is"</strong> without warranty of any kind, either expressed or implied. We do not guarantee that themes will work in all browsers, nor do we guarantee that our themes will be functional with all versions of WordPress. ThemeConcert does not guarantee compatibility with any additional third party plug-in, scripts, or applications unless stated otherwise.</p>
					
					<h5>Privacy Policy</h5>
					<p>Any information submitted by you (the buyer) for completing the transaction, delivering the product, informing about new product releases, and addressing any customer service issues are strictly confidential. <strong>We don't share this information with anyone.</strong></p>
				</div>
			</div>
			<p class="desc">You can read the Terms &amp; Conditions document online <a href="http://themeconcert.com/documents/termsandconditions" target="_blank">Here</a>.</p>
		</div>
	</div>
<?php
}

/**
 * Support Box: Search
 *
 * Manual Search Box
 */
function admin_support_box_search() {
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