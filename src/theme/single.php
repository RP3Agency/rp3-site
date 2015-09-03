<?php
/**
 * The Template for displaying all single posts.
 *
 * @package RP3
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( is_singular( 'rp3_cpt_careers' ) ) : ?>

				<?php get_template_part( 'template-parts/content', 'single-careers' ); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php endif; ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

<?php get_footer(); ?>
