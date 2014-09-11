<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package RP3
 */

/**
 * Get our home panels
 */
// $panels = new WP_Query( array(
// 	'post_type'			=> 'rp3_home_panels',
// 	'posts_per_page'	=> 3,
// 	'orderby'			=> 'menu_order',
// 	'order'				=> 'ASC'
// ) );

get_header(); ?>

	<section id="introduction" class="introduction">
		<picture>
			<source srcset="<?php echo get_template_directory_uri(); ?>/images/city-of-possibilities.jpg, <?php echo get_template_directory_uri(); ?>/images/city-of-possibilities@2x.jpg 2x" media="(min-width: 40em)">
			<source srcset="<?php echo get_template_directory_uri(); ?>/images/city-of-possibilities-small.jpg, <?php echo get_template_directory_uri(); ?>/images/city-of-possibilities-small@2x.jpg 2x">
			<img srcset="<?php echo get_template_directory_uri(); ?>/images/city-of-possibilities-small.jpg, <?php echo get_template_directory_uri(); ?>/images/city-of-possibilities-small@2x.jpg 2x" alt="City of Possibilities">
		</picture>

		<div class="headline norfolk-southern">
			<a href="#!">
				<h1>City of Possibilities</h1>
				<p class="subtitle">for <strong>Norfolk Southern</strong></p>
			</a>
		</div>
	</section>

	<!-- <section id="home-panels" class="home-panels"> -->

	<?php // if ( $panels->have_posts() ) : while ( $panels->have_posts() ) : $panels->the_post(); ?>

	<?php
	// $image_small		= get_field( 'image_small' );
	// $image_medium		= get_field( 'image_medium' );
	// $image_large		= get_field( 'image_large' );
	?>

		<?php /*
		<article class="full-screen">
			<a href="<?php the_field('url'); ?>">
				<picture>
					<source srcset="<?php echo $image_large['url']; ?>" media="(min-width: 1024px)" />
					<source srcset="<?php echo $image_medium['url']; ?>" media="(min-width: 690px)" />
					<source srcset="<?php echo $image_small['url']; ?>" />
					<img srcset="<?php echo $image_small['url']; ?>" alt="<?php the_title(); ?>" />
				</picture>
			</a>
		</article>
		*/ ?>

	<?php // endwhile; endif; ?>

	<!-- </section> -->


	<section class="home-featured">

	<?php
    rp3_display_homepage_post( 'left' );
    rp3_display_homepage_post( 'center' );
    rp3_display_homepage_post( 'right' );
	?>

	</section>
	<!-- // home-featured -->

<?php get_footer(); ?>
