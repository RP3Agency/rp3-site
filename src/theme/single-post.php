<?php
/**
 * The Template for displaying all single posts.
 *
 * @package RP3
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<?php

	if ( has_category( 'blog' ) ) {

		get_template_part( 'content', 'single-blog' );

	} elseif ( has_category( 'news' ) ) {

		get_template_part( 'content', 'single-news' );

	} elseif ( has_category( 'careers' ) ) {

		get_template_part( 'content', 'single-careers' );
	}

	?>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
