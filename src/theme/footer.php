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

		<div class="site-footer__wrapper component component--padded">

			<div class="site-footer__logo">
				<a href="<?php echo esc_url( home_url() ); ?>" class="block">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_2" x="0px" y="0px" width="139.728px" height="98.005px" viewBox="0 0 139.728 98.005" style="enable-background:new 0 0 139.728 98.005;" xml:space="preserve">
						<g>
							<path d="M124.671 17.876l10.773-17.873l-0.002-0.002L135.444 0h-0.002H119.65H97.87l-8.758 13.552h15.988 h6.381l-9.213 15.288c1.928-0.763 4.027-1.187 6.229-1.187c3.222 0 6.2 0.9 8.8 2.461c4.883 3 8.1 8.3 8.1 14.5 c0 9.357-7.585 16.943-16.942 16.943c-4.194 0-8.026-1.528-10.984-4.052c-1.543 4.59-3.904 8.891-6.938 12.7 c5.074 3.6 11.3 5.7 17.9 5.663c17.248 0 31.23-13.983 31.23-31.231C139.728 33.3 133.7 23.4 124.7 17.876z"/>
							<path d="M36.557 13.856c-0.975-0.124-1.933-0.229-2.865-0.305c-3.138-0.256-6.037-0.248-8.703 0 c-6.702 0.626-11.946 2.752-15.845 5.962L0 15.536v60.303h15.875V41.048c0-7.363 2.799-12.31 9.729-12.57 c1.551-3.635 3.618-7.011 6.186-9.993C33.254 16.8 34.9 15.2 36.6 13.856z"/>
						</g>
						<g>
							<path d="M90.688 52.042c0.488-2.318 0.934-5.188 0.934-7.523c0-4.513-0.896-8.792-2.511-12.674 c-2.808-6.744-7.857-12.215-14.447-15.412c-4.029-1.955-8.614-3.081-13.64-3.081c-0.189 0-0.367 0.022-0.555 0 c-9.4 0.152-17.271 4.115-22.617 10.326c-3.734 4.338-6.224 9.762-7.124 15.763c-0.247 1.648-0.408 3.329-0.408 5.053V61v13.552 v23.453h15.411c0 0 0-11.157 0-23.453c0-4.53 0-9.213 0-13.552c0-10.113 0-18.348 0-18.357c0-4.086 1.911-7.998 4.944-10.798 c2.679-2.471 6.76-4.107 10.7-4.161c9.115 0.4 16.4 7.8 16.4 17.035c0 0.554-0.031 1.101-0.083 1.6 c-0.116 1.196-0.349 2.358-0.697 3.471c-2.173 6.929-8.646 11.958-16.291 11.958c-0.141 0-0.278-0.018-0.418-0.021l-7.258 12 c3.034 1.3 6.4 2 10.1 1.995c6.968 0 13.287-2.801 18.226-7.356c3.939-3.762 6.959-8.471 8.69-13.769l0.684-2.384 c0.011-0.042 0.021-0.083 0.03-0.125c-0.001-0.004-0.001-0.004-0.004-0.007C90.721 52.1 90.7 52.1 90.7 52.042z"/>
						</g>
					</svg>
				</a>
			</div>
			<!-- // .site-footer__logo -->
							
			<nav class="site-footer__navigation" >
				<?php wp_nav_menu( array(
					'theme_location'	=> 'primary',
					'menu_class'		=> 'footer-navigation',
					'menu_id'			=> 'footer-navigation'
				) ); ?>
			</nav>
			<!--- // .site-footer__navigation -->

			<div class="site-footer__address">
				<h1 class="site-footer__subheader">Address</h1>

				<p>7316 Wisconsin Avenue<br>
				Suite 450<br>
				Bethesda, Maryland 20814</p>
			</div>
			<!-- //.office-address -->

			<div class="site-footer__phone">
				<h1 class="site-footer__subheader">Phone</h1>

				<p>t. 301.718.0333<?php /*<br>
					f. 301.718.9333*/ ?></p>
			</div>
			<!-- // .site-footer__phone -->

			<div class="site-footer__email">
				<h1 class="site-footer__subheader">Email</h1>
				<p><a href="mailto:info@rp3agency.com">info@rp3agency.com</a></p>
			</div>
			<!-- // .site-footer__email -->

			<nav class="site-footer__social social">
				<?php wp_nav_menu( array(
					'theme_location'	=> 'footer-social'
				) ); ?>
			</nav>
			<!-- // .site-footer__social -->

			<div class="site-footer__copyright">
				<span class="copyright">© <?php echo date('Y'); ?> RP3 Agency, <a href="http://www.aaaa.org/news/agency/Pages/RP3AgencyReceivesCertificationAsaWomen-OwnedSmallBusiness.aspx">A Certified Woman-Owned Small Business</a></span>
			</div>
			<!-- // .copy -->

		</div>
		<!-- // .site-footer__wrapper -->

	</footer>
	<!-- // #colophon -->

</div>
<!-- // #page -->

<?php wp_footer(); ?>

</body>
</html>
