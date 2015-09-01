<?php
/**
 * Blog template page.
 *
 * There is no more landing page for the blog. Instead,
 * a cold hit to the blog will display the full text of
 * the most recent post, and navigation commences from there
 * via infinite scroll.
 *
 * @package RP3
 */

// if blog page request has "ajax=html" query parameter, serve HTML fragment for infinite scroll
if( 'html' == $_GET['ajax'] ) {
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'single-blog-ajax' );
	endwhile;
	exit;
}

get_header( 'blog' ); ?>

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single-blog' ); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

<?php get_footer( 'blog' ); ?>
