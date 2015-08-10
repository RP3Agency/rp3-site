<div id="site-header__site-navigation--mobile" class="site-header__site-navigation site-header__site-navigation--mobile">

	<!-- Primary Navigation -->

	<nav id="site-navigation-mobile" class="mobile-nav__menu">

		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

				<?php

				/** Include the SVG logo inline via WordPress template parts (http://blog.teamtreehouse.com/perfect-wordpress-inline-svg-workflow) */
				get_template_part( '/template-parts/inline', 'rp3-logo.svg' );

				?>

			</a>
		</h1>

		<?php wp_nav_menu( array(
			'theme_location'	=> 'footer',
			'menu_class'		=> 'footer-navigation',
			'menu_id'			=> 'footer-navigation'
		) ); ?>


		<a href="#!" id="menu-close" class="mobile-nav__close">Close</a>

	</nav>
	<!-- // #site-navigation -->

</div>
<!-- // #mobile-nav -->
