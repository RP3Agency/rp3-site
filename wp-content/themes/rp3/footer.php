<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RP3
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="top">

			<div class="site-info">

				<h1 class="logo">RP3 Agency</h1>

				<section class="left">
					<h2 class="logo">RP3 Agency</h2>

					<p>Our mission is to tell the story inside every brand and help establish its purpose in people's lives through humanity, technology and creativity. In today's connected world, the lines between these areas have blurred. RP3 Agency has embraced this new paradigm by building an interdisciplinary team adept at leveraging them all in concert to accomplish our client's business objectives.</p>

					<?php dynamic_sidebar( 'fact-sheet' ); ?>
				</section>
				<!-- // .footer-blurb -->

				<div class="right">
					<ul class="social">
						<li class="facebook"><a href="https://www.facebook.com/rp3agency">Facebook</a></li>
						<li class="twitter"><a href="https://twitter.com/rp3agency">Twitter</a></li>
						<li class="linkedin"><a href="https://www.linkedin.com/company/rp3-agency">LinkedIn</a></li>
					</ul>
					<ul class="social">
						<li class="googleplus"><a href="https://plus.google.com/+RP3agency">Google+</a></li>
						<li class="github"><a href="https://github.com/RP3Agency">Github</a></li>
						<li class="instagram"><a href="http://instagram.com/rp3agency">Instagram</a></li>
					</ul>
					<ul class="social">
						<li class="youtube"><a href="https://www.youtube.com/user/RP3Agency">YouTube</a></li>
						<li class="pinterest"><a href="http://www.pinterest.com/rp3agency/">Pinterest</a></li>
						<li class="email"><a href="mailto:info@rp3agency.com">Email info@rp3agency.com</a></li>
					</ul>

					<?php $mailchimp_custom_css = false; ?>
					<?php mailchimpSF_signup_form(array(
						'mc_use_javascript'         => true,
						'mc_header_content'         => '',
						'mc_subheader_content'      => 'Sign up for newsletter updates',
						'mc_submit_text'            => 'GO'
					)); ?>
				</div>
				<!-- // .social-media -->

			</div>
			<!-- // .site-info -->

		</div>
		<!-- // .top -->

		<div class="bottom">

			<div class="site-info">

				<div class="address-phone-combined">

					<div class="address">
						<a href="https://www.google.com/maps/place/7316+Wisconsin+Ave/@38.982666,-77.094007,18z/data=!3m1!4b1!4m2!3m1!1s0x89b7c97b02dc5265:0x1dfbc833b8797b9b">
						7316 Wisconsin Avenue<br>
						Suite 450<br>
						Bethesda, Maryland 20814
						</a>
					</div>
					<!-- // .address -->

					<div class="phone">
						t. 301.718.0333<br>
						f. 301.718.9333<br>
						<span class="copyright">© <?php echo date('Y'); ?> RP3 Agency,<br>
							<a href="http://www.aaaa.org/news/agency/Pages/RP3AgencyReceivesCertificationAsaWomen-OwnedSmallBusiness.aspx">a certified woman-owned business.</a></span>
					</div>
					<!-- // .phone -->

				</div>
				<!-- // .address-phone-combined -->

			</div>
			<!-- // .site-info -->

		</div>
		<!-- // .bottom -->

	</footer>
	<!-- // #colophon -->

</div>
<!-- // #page -->

<?php wp_footer(); ?>

</body>
</html>
