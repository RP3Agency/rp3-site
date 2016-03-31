<?php
/**
 * Content Panel.
 *
 * @package RP3
 */
?>

<!-- Content Panel -->

<?php if ( '' != get_sub_field( 'content' ) ) : ?>

	<section class="work-single__content">

		<div class="work-single__content__container">

			<div class="work-single__content__inner">

				<?php if ( '' !== get_sub_field( 'headline' ) ) : ?>

					<h2 class="work-single__content__headline"><?php the_sub_field( 'headline' ); ?>:</h2>

				<?php endif; ?>

				<?php the_sub_field( 'content' ); ?>

			</div>

		</div>

	</section>

<?php endif; ?>
