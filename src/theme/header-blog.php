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

<div id="page" class="hfeed blog">

	<header id="blog-header" class="blog-header blog-header" role="banner">

		<a class="blog-header__skip-link skip-link" href="#content"><?php _e( 'Skip to content', 'rp3' ); ?></a>

		<div class="blog-header__container">

			<div class="blog-header__container__inner">

				<h1 class="blog-header__title blog-header__table-cell">

					<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" rel="home" class="block">Building Opportunity</a>

				</h1>
				<!-- site title / table cell -->

			</div>
			<!-- container inner -->

		</div>
		<!-- // container -->

	</header>
	<!-- // site header -->

	<main id="content" class="blog-content">
