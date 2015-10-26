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

			<div class="building-opportunity-container">

				<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" rel="home" class="block">

					<span class="building">Building</span>
					<span class="opportunity">Opportunity</span>

				</a>

			</div>

			<div class="blog-header__sub-header" id="blog-header__sub-header">

				<div class="blog-header__sub-header__container">

					<div class="blog-header__sub-header__inner">

						<div class="blog-header__return">

							<a class="arrow arrow--left" href="<?php echo esc_url( home_url() ); ?>">rp3agency.com</a>

						</div>

						<?php /* <div class="blog-header__search">

							<button id="search__trigger--mobile" class="search__trigger search__trigger--mobile">Search</button>
							<a href="#!" class="search__trigger search__trigger- -mobile">Search</a>

						</div> */ ?>

					</div>
					<!-- sub-header inner -->

				</div>
				<!-- sub-header container -->

			</div>
			<!-- sub-header -->

		</div>
		<!-- // container -->

	</header>
	<!-- // site header -->

	<main id="content" class="blog-content" role="main">
