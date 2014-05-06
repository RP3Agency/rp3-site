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
$panels = new WP_Query( array(
	'post_type'			=> 'rp3_home_panels',
	'posts_per_page'	=> 3,
	'orderby'			=> 'menu_order',
	'order'				=> 'ASC'
) );

get_header(); ?>

	<section id="introduction" class="introduction full-screen">
		<h1 class="logo">RP3 Agency</h1>
		<p>
			<span>Instead of the “agency” line, something introducing the philosophy driving this project.</span>
		</p>
	</section>

	<section id="home-panels" class="home-panels">

	<?php if ( $panels->have_posts() ) : while ( $panels->have_posts() ) : $panels->the_post(); ?>

	<?php
	$small		= get_field( 'small_image' );
	$medium		= get_field( 'medium_image' );
	$large		= get_field( 'large_image' );
	?>

		<article class="full-screen">
			<a href="<?php the_field('url'); ?>">
				<picture>
					<source srcset="<?php echo $large['url']; ?>" media="(min-width: 1024px)" />
					<source srcset="<?php echo $medium['url']; ?>" media="(min-width: 690px)" />
					<source srcset="<?php echo $small['url']; ?>" />
					<img srcset="<?php echo $small['url']; ?>" alt="<?php the_title(); ?>" />
				</picture>
			</a>
		</article>

	<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>
