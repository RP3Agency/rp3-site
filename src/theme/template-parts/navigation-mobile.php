<div id="site-header__site-navigation--mobile" class="site-header__site-navigation site-header__site-navigation--mobile">

	<!-- Primary Navigation -->

	<nav id="site-navigation-mobile" class="mobile-nav__menu">

		<?php wp_nav_menu( array(
			'theme_location'	=> 'mobile',
			'menu_class'		=> 'mobile-navigation menu--vertical',
			'menu_id'			=> 'mobile-navigation'
		) ); ?>

	</nav>
	<!-- // #site-navigation -->

	<button id="mobile-nav__close" class="mobile-nav__close blog-search__close">Close</button>

</div>
<!-- // #mobile-nav -->
