<?php
/**
 * The template used for displaying page content on the work landing page
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'work' ); ?>>

	<?php if ( have_rows( 'work_set' ) ) : ?>

		<?php while ( have_rows( 'work_set' ) ) : the_row(); ?>

			<section class="work__set">

				<?php get_template_part( 'template-parts/component', 'work-landing-full' ); ?>

				<div class="work__set__row">

					<?php get_template_part( 'template-parts/component', 'work-landing-half' ); ?>

					<div class="work__set__row__quarters">

						<?php get_template_part( 'template-parts/component', 'work-landing-quarter-1' ); ?>

						<?php get_template_part( 'template-parts/component', 'work-landing-quarter-2' ); ?>

					</div>
					<!-- work set row quarters -->

				</div>
				<!-- work set row -->

			</section>

		<?php endwhile; ?>

	<?php endif; ?>

</article>
<!-- #post-## -->
