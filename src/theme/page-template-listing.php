<?php
/**
 * The template for displaying pages with listings of posts (or post-like CPTs).
 *
 * We'll use ACF to allow us to pull in blog posts about a particular service area,
 * industry, tag, or whatever and build uber-targeted pages for specific audiences.
 *
 * Template Name: Listing
 * 
 * @package RP3
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); // the loop ?>

	<?php get_template_part( 'template-parts/content', 'page-listing' ); ?>

	<?php get_template_part( 'template-parts/component', 'listing' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
