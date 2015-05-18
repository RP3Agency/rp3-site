<?php
/**
 * The template used for displaying page content on the work landing page
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'work' ); ?>>

	<?php if ( have_rows( 'work_set' ) ) : $counter = 0; ?>

		<?php while ( have_rows( 'work_set' ) ) : the_row(); ?>

			<div class="work__set">

				<?php get_template_part( 'components/work-landing', 'full' ); ?>


				<?php if ( 0 == $counter % 2 ) : ?>


					<div class="work__container component component--padded">

						<?php get_template_part( 'components/work-landing', 'half' ); ?>

						<div class="work__container--half">

							<?php get_template_part( 'components/work-landing', 'quarter-1' ); ?>

							<?php get_template_part( 'components/work-landing', 'quarter-2' ); ?>

						</div>
						<!-- // work container half -->

					</div>
					<!-- // work container -->


				<?php else : ?>


					<div class="work__container component component--padded">

						<div class="work__container--half">

							<?php get_template_part( 'components/work-landing', 'quarter-1' ); ?>

							<?php get_template_part( 'components/work-landing', 'quarter-2' ); ?>

						</div>
						<!-- // work container half -->

						<?php get_template_part( 'components/work-landing', 'half' ); ?>

					</div>
					<!-- // work container -->


				<?php endif; ?>

			</div>
			<!-- // work set -->

		<?php $counter++; endwhile; ?>

	<?php endif; ?>

</article>
<!-- #post-## -->
