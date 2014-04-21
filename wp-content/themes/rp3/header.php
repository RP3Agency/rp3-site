<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package RP3
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<!-- Site Branding -->
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rp3' ); ?></a>
		</div>
		<!-- // .site-branding -->

		<!-- Header Aux -->

		<div class="header-aux">

			<?php wp_nav_menu( array( 'theme_location' => 'header_aux' ) ); ?>

			<!-- <div class="search">Search</div> -->

		</div>
		<!-- // .header-aux -->

		<a href="#!" id="menu-open" class="menu-open">Menu</a>

	</header>
	<!-- // #masthead -->

	<!-- Primary Navigation -->

	<nav id="site-navigation" class="main-navigation" role="navigation">

		<div id="main-nav" class="main-nav">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary-left' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary-right' ) ); ?>
		</div>
		<!-- // #main-nav -->

		<?php get_search_form(); ?>

	</nav>
	<!-- // #site-navigation -->

	<div id="content" class="site-content">
