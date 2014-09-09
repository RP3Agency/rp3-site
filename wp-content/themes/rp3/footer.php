<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RP3
 */
?>


	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="bottom">

			<div class="site-info">

				<div class="address-phone-combined">


					<div class="address">

						<div class='miniNav'>

							<ul>
								<li><img class='minilogo' alt="RP3 Agency" src="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" /></li>
								<li class='navLink'><a href="careers">OUR WORK</a></li>
								<li class='navLink'><a href="about" >ABOUT US</a></li>
								<li class='navLink'><a href="news-views" >NEWS & BLOG</a></li>
								<li class='navLink'><a href="contact" >CONTACT</a></li>
							</ul>
						</div>
						<!-- //.miniNav -->

						<h6>Offices</h6><br>
						7316 Wisconsin Avenue<br>
						Suite 450<br>
						Bethesda, Maryland 20814<br><br><br>

						<h6>Phone</h6><br>
						301.718.0333<br>
						
					</div>
					<!-- // .phone -->

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
