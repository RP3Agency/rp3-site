<?php
/**
 * The template for displaying pages built via flexible content panels.
 *
 * Template Name: Panels
 * 
 * @package RP3
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); // the loop ?>

	<?php get_template_part( 'template-parts/content', 'page' ); ?>

	<?php get_template_part( 'template-parts/content', 'page-panels' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
