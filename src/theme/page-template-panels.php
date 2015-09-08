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

	<?php /** Load in the appropriate checker block template part */ ?>

	<?php if ( is_page( 'agency' ) ) : ?>

		<?php get_template_part( 'template-parts/component', 'checker-block-agency' ); ?>

	<?php elseif ( is_page( 'careers' ) ) : ?>

		<?php // get_template_part( 'template-parts/component', 'checker-block-careers' ); ?>

	<?php endif; ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
