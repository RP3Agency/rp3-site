<div id="site-header__site-navigation--desktop" class="site-header__site-navigation site-header__site-navigation--desktop">

	<!-- Primary Navigation -->

	<nav role="navigation">

		<?php wp_nav_menu( array(
			'theme_location'	=> 'primary',
			'menu_class'		=> 'primary-menu menu--horizontal',
			'menu_id'			=> 'primary-menu'
		) ); ?>

	</nav>
	<!-- // #site-navigation -->

	<!-- Building Opportunity Blog -->

	<div class="site-header__blog-link">

		<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="arrow arrow--right"><span>Building Opportunity</span> Blog</a>

	</div>

</div>
<!-- site navigation desktop -->
