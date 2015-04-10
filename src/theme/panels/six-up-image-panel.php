<?php
/**
 * Display the six-up image panel.
 *
 * @package RP3
 */
?>

<section class="panel six-up-image-panel">

	<?php while ( have_rows( 'images' ) ) : the_row(); ?>

		<div class="six-up-image-panel__image">

			<?php echo rp3_picture_element_v2( get_sub_field( 'image' ), 'six-up' ); ?>

		</div>

	<?php endwhile; ?>

</section>
