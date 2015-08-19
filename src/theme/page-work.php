<?php
/**
 * The template for displaying work pages.
 *
 * @package RP3
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); // the loop ?>

	<?php get_template_part( 'template-parts/content', 'page-work' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
