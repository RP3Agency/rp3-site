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

			get_template_part( 'content', 'page-agency' );

		} elseif ( is_page( 'news' ) ) {

			get_template_part( 'content', 'page-news' );

		} elseif ( is_page( 'blog' ) ) {

			get_template_part( 'content', 'page-blog' );

		} elseif ( is_page( 'contact' ) ) {

			get_template_part( 'content', 'page-contact' );

		} elseif ( is_page( 'careers' ) ) {

			get_template_part( 'content', 'page-careers' );

		} elseif ( is_page( 'contact' ) ) {

			get_template_part( 'content', 'page-contact' );

		} elseif ( is_page( 'work' ) ) {

			get_template_part( 'content', 'page-work' );

		} elseif ( is_page( 'sxsw' ) ) {

			get_template_part( 'content', 'page-sxsw' );

		} elseif ( is_404() ) {

			get_template_part( 'content', 'page-404' );

		} else {

	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content component component--padded">

				<div class="entry-content__container">

					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rp3' ) ); ?>

				</div>
				<!-- // .wrapper -->

			</div>
			<!-- // .entry-content -->

		</article>
		<!-- #post-## -->

	<?php } ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
