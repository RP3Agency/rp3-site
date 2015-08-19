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

	<?php

		if ( is_page( 'agency' ) ) {

		// 	get_template_part( 'content', 'page-agency' );

		// } elseif ( is_page( 'news' ) ) {

		// 	get_template_part( 'content', 'page-news' );

		// } elseif ( is_page( 'blog' ) ) {

		// 	get_template_part( 'content', 'page-blog' );

		// } elseif ( is_page( 'contact' ) ) {

		// 	get_template_part( 'content', 'page-contact' );

		// } elseif ( is_page( 'careers' ) ) {

			// get_template_part( 'content', 'page-careers' );

		// } elseif ( is_page( 'contact' ) ) {

		// 	get_template_part( 'content', 'page-contact' );

		// } elseif ( is_404() ) {

		// 	get_template_part( 'content', 'page-404' );

		} else {

			get_template_part( 'template-parts/content', 'page' );

		}
	?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
