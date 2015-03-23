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

	<?php if ( is_page( 'agency' ) ) : ?>

		<?php get_template_part( 'content', 'page-agency' ); ?>

	<?php elseif ( is_page( 'news' ) ) : ?>

		<?php get_template_part( 'content', 'page-news' ); ?>

	<?php elseif ( is_page( 'blog' ) ) : ?>

		<?php get_template_part( 'content', 'page-blog' ); ?>

	<?php elseif ( is_page( 'contact' ) ) : ?>

		<?php get_template_part( 'content', 'page-contact' ); ?>

	<?php elseif ( is_page( 'careers' ) ) : ?>

		<?php get_template_part( 'content', 'page-careers' ); ?>

	<?php elseif( is_page( 'work' ) ) : ?>

		<?php get_template_part( 'content', 'page-work' ); ?>

	<?php elseif( is_page( 'sxsw' ) ) : ?>

		<?php get_template_part( 'content', 'page-sxsw' ); ?>

	<?php else: ?>

		<?php get_template_part( 'content', 'page' ); ?>

	<?php endif; ?>

<?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>
