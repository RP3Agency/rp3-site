<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RP3
 */
?>

	</main>
	<!-- // #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-footer__wrapper">

			<div class="site-footer__container">

				<div class="site-footer__left">

					<div class="site-footer__logo">

						<a href="<?php echo esc_url( home_url() ); ?>">

							<?php get_template_part( 'template-parts/inline', 'rp3-logo.svg' ); ?>

						</a>

					</div>
					<!-- // .site-footer__logo -->


					<div class="site-footer__address">

						<p>7316 Wisconsin Avenue<br/>
							Suite 450<br/>
							Bethesda, Maryland 20814</p>

					</div>
					<!-- //.office-address -->

					<div class="site-footer__phone-email">

						<p>301.718.0333 | <a href="mailto:info@rp3agency.com">info@rp3agency.com</a></p>

					</div>
					<!-- // .site-footer__phone-email -->

				</div>
				<!-- // site footer left -->


				<div class="site-footer__right">

					<nav class="site-footer__social social">

						<?php wp_nav_menu( array(
							'theme_location'	=> 'footer-social',
							'menu_class'		=> 'menu--horizontal'
						) ); ?>

					</nav>
					<!-- // .site-footer__social -->

					<div class="site-footer__copyright">
						<span class="copyright">© <?php echo date('Y'); ?> RP3 Agency.<br/>
						<a href="http://www.aaaa.org/news/agency/Pages/RP3AgencyReceivesCertificationAsaWomen-OwnedSmallBusiness.aspx">A Certified Woman-Owned Small Business</a></span>
					</div>
					<!-- // .copy -->


				</div>
				<!-- // site footer right -->

			</div>
			<!-- // site footer container -->

		</div>
		<!-- // .site-footer__wrapper -->

	</footer>
	<!-- // #colophon -->

</div>
<!-- // #page -->

<?php

/** Primary navigation: "mobile" */
get_template_part( 'template-parts/navigation', 'mobile' );

?>

<?php wp_footer(); ?>

</body>
</html>
