<?php
/**
 * The template used for displaying page content on the panels page template
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( have_rows( 'flexible_content_panels' ) ) : ?>

		<?php while ( have_rows( 'flexible_content_panels' ) ) : the_row(); ?>

			<section class="page__panel">

				<?php get_template_part( 'panels/' . get_row_layout() ); ?>

			</section>
			<!-- page panels -->

		<?php endwhile; ?>

	<?php endif; ?>

</article>
<!-- #post-## -->
