<div id="site-header__site-navigation--desktop" class="site-header__site-navigation site-header__site-navigation--desktop">

	<!-- Primary Navigation -->

	<nav role="navigation">

		<?php wp_nav_menu( array(
			'theme_location'	=> 'primary',
			'menu_class'		=> 'primary-menu horizontal-menu',
			'menu_id'			=> 'primary-menu'
		) ); ?>

	</nav>
	<!-- // #site-navigation -->

	<!-- Auxiliary Navigation -->

	<nav id="site-header__site-navigation--auxiliary" class="site-header__site-navigation--auxiliary" role="navigation">

		<?php wp_nav_menu( array(
			'theme_location'	=> 'auxiliary',
			'menu_class'		=> 'auxiliary-menu horizontal-menu',
			'menu_id'			=> 'auxiliary-menu'
		) ); ?>

	</nav>

</div>
<!-- site navigation desktop -->
