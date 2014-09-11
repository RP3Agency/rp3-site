<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RP3
 */
?>

	</div>
	<!-- // #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="bottom">

			<div class="site-info">

				<div class="address-phone-combined">


					<div class="address">

						<div class='miniNav'>

							<ul>

								<li><img class='minilogo' alt="RP3 Agency" src="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" /></li>
								<nav class="footer-navigation" >
									<?php wp_nav_menu( array(
										'theme_location'	=> 'primary',
										'menu_class'		=> 'footer-navigation',
										'menu_id'			=> 'footer-navigation'
									) ); ?>
								</nav>
								<!--- // .footer-navigation -->

							</ul>

						</div>
						<!-- //.miniNav -->

						<div class='office-address'>
							<h6>Offices</h6><br>
							7316 Wisconsin Avenue<br>
							Suite 450<br>
							Bethesda, Maryland 20814<br>
						</div>
						<!-- //.office-address -->

						<div class='phone'>
							<h6>Phone</h6>
							<p>301.718.0333</p><br>
						</div>
						<!-- // .phone -->
						
					</div>
					<!--- // .address -->

					<div class="copy">
						<span class="copyright">© <?php echo date('Y'); ?> RP3 Agency.
							<a href="http://www.aaaa.org/news/agency/Pages/RP3AgencyReceivesCertificationAsaWomen-OwnedSmallBusiness.aspx"> a certified woman-owned business.</a></span>
					</div>
					<!-- // .copy -->

					<div class="social">
						<ul>
							<li><a href="https://www.facebook.com/rp3agency">Facebook</a></li>
							<li><a href="https://twitter.com/rp3agency">Twitter</a></li>
							<li><a href="https://www.linkedin.com/company/rp3-agency">LinkedIn</a></li>
							<li><a href="https://plus.google.com/+RP3agency">Google+</a></li>
							<li><a href="http://instagram.com/rp3agency">Instagram</a></li>
						</ul>
		
					</div>
					<!-- // .social -->

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
