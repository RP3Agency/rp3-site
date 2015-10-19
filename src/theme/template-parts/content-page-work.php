<?php
/**
 * The template used for displaying page content on the work landing page
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'work' ); ?>>

	<?php if ( have_rows( 'work_set' ) ) : ?>

		<?php
			$field_object = get_field_object( 'work_set' );
			$count = count( $field_object['value'] );
			$row = 0;
		?>

		<?php while ( have_rows( 'work_set' ) ) : the_row(); $row++; ?>

			<section class="work__set">

				<?php get_template_part( 'template-parts/component', 'work-landing-full' ); ?>

				<?php $scrollClass = ( $row == $count ? 'effect-fade-in' : 'effect-ease-up' ); ?>
				<div class="scroll-effect <?php echo $scrollClass; ?>">

					<div class="work__set__row scroll-effect-target">

						<?php get_template_part( 'template-parts/component', 'work-landing-half' ); ?>

						<div class="work__set__row__quarters">

							<?php get_template_part( 'template-parts/component', 'work-landing-quarter-1' ); ?>

							<?php get_template_part( 'template-parts/component', 'work-landing-quarter-2' ); ?>

						</div>
						<!-- work set row quarters -->

					</div>

				</div>
				<!-- work set row -->

			</section>

		<?php endwhile; ?>

	<?php endif; ?>

</article>
<!-- #post-## -->
