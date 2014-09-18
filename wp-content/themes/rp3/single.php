<?php
/**
 * The Template for displaying all single posts.
 *
 * @package RP3
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php

			if ( has_category( 'news' ) ) :

				get_template_part( 'content', 'single-news' );

			elseif ( has_category( 'blog' ) ) :

				get_template_part( 'content', 'single-blog' );

			elseif ( has_category( 'careers' ) ) :

				get_template_part( 'content', 'single-careers' );

			elseif ( 'rp3_cpt_work' == get_post_type() ) :

				get_template_part( 'content', 'single-work' );

			else :

				get_template_part( 'content', 'single' );

			endif;

			// if ( has_category('blog') ) :

			// 	// If comments are open or we have at least one comment, load up the comment template
			// 	if ( comments_open() || '0' != get_comments_number() ) :
			// 		comments_template();
			// 	endif;

			// endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

if ( has_category( 'careers' ) ) {

	get_sidebar( 'careers' );

}

// if ( has_category('news') ) {

// 	get_sidebar( 'news' );

// } elseif ( has_category( 'blog' ) ) {

// 	// get_sidebar( 'blog' );

// } elseif ( has_category( 'careers' ) ) {

// 	get_sidebar( 'careers' );

// } else {

// 	get_sidebar();

// }

?>
<?php get_footer(); ?>