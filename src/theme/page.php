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

get_header(); ?>

<?php while ( have_posts() ) : the_post(); // the loop ?>

	<?php get_template_part( 'template-parts/content', 'page' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
