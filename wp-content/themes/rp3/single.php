<?php
/**
 * The Template for displaying all single posts.
 *
 * @package RP3
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php

	if ( has_category( 'news' ) ) :

		get_template_part( 'content', 'single-news' );

	elseif ( has_category( 'blog' ) ) :

		get_template_part( 'content', 'single-blog' );

	elseif ( has_category( 'careers' ) ) :

		get_template_part( 'content', 'single-careers' );

	elseif ( 'rp3_cpt_work' == get_post_type() ) :

		if ( true == get_field( 'case_study' ) ) :

			get_template_part( 'content', 'single-case-study' );

		else :

			get_template_part( 'content', 'single-work' );

		endif;

	else :

		get_template_part( 'content', 'single' );

	endif;

	if ( has_category('blog') ) :


	endif;
	?>

<?php endwhile; // end of the loop. ?>

<?php

if ( has_category( 'careers' ) ) {

	get_sidebar( 'careers' );

}
?>

<?php get_footer(); ?>
