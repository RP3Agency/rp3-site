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

	<header id="site-header" class="site-header" role="banner">

		<a class="site-header__skip-link skip-link" href="#content"><?php _e( 'Skip to content', 'rp3' ); ?></a>

		<div class="site-header__container">

			<div class="site-header__table">

				<div class="site-header__table-row">

					<h1 class="site-header__site-title site-header__table-cell">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="block">

							<?php

							/** Include the SVG logo inline via WordPress template parts (http://blog.teamtreehouse.com/perfect-wordpress-inline-svg-workflow) */
							get_template_part( '/template-parts/inline', 'rp3-logo.svg' );

							?>

						</a>

					</h1>
					<!-- site title / table cell -->

					<div class="site-header__table-cell">

						<a href="#!" id="site-header__menu-open" class="site-header__menu-open">Menu</a>

						<?php

						/** Primary navigation: "desktop" */
						get_template_part( 'template-parts/navigation', 'desktop' );

						?>

					</div>
					<!-- table cell -->

				</div>
				<!-- table row -->

			</div>
			<!-- // table -->

		</div>
		<!-- // container -->

	</header>
	<!-- // site header -->

	<?php

	/** Primary navigation: "mobile" */
	get_template_part( 'template-parts/navigation', 'mobile' );

	?>

	<main id="content" class="site-content">
