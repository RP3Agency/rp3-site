<?php
/**
 * The Template for displaying all single work items.
 *
 * @package RP3
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/content', 'single-work' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
