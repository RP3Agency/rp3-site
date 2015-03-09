<?php
/**
 * Display the six-up image panel.
 *
 * @package RP3
 */

$counter = 0;
?>

<section class="six-up-image-panel">

	<?php while ( have_rows( 'images' ) ) : $counter++; the_row(); ?>

		<?php if ( $counter % 2 !== 0 ) : ?>

			<div class="six-up-image-panel__row">

		<?php endif; ?>

				<div class="six-up-image-panel__image">

					<?php echo rp3_picture_element( get_sub_field( 'image' ), 'six-up' ); ?>

				</div>

		<?php if ( $counter % 2 === 0 ) : ?>

			</div>

		<?php endif; ?>

	<?php endwhile; ?>

</section>
