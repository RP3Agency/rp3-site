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

			<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" rel="home" class="block">

				<picture>
					<source srcset="<?php echo esc_url( get_template_directory_uri() . '/images/header-blog-large.jpg' ); ?>, <?php echo esc_url( get_template_directory_uri() . '/images/header-blog-large@2x.jpg' ); ?> 2x" media="(min-width: 37.5rem)" />
					<source srcset="<?php echo esc_url( get_template_directory_uri() . '/images/header-blog-medium.jpg' ); ?>, <?php echo esc_url( get_template_directory_uri() . '/images/header-blog-medium@2x.jpg' ); ?> 2x" media="(min-width: 20.0625rem)" />
					<source srcset="<?php echo esc_url( get_template_directory_uri() . '/images/header-blog-small.jpg' ); ?>, <?php echo esc_url( get_template_directory_uri() . '/images/header-blog-small@2x.jpg' ); ?> 2x" />
					<img srcset="<?php echo esc_url( get_template_directory_uri() . '/images/header-blog-small.jpg' ); ?>, <?php echo esc_url( get_template_directory_uri() . '/images/header-blog-small@2x.jpg' ); ?> 2x" alt="Building Opportunity" />
				</picture>

			</a>

		</div>
		<!-- // container -->

	</header>
	<!-- // site header -->

	<main id="content" class="blog-content" role="main">
