<?php
/**
 * Display the six-up image panel.
 *
 * @package RP3
 */
?>

<section class="six-up-image-panel">

	<?php while ( have_rows( 'images' ) ) : the_row(); ?>

		<div class="six-up-image-panel__image">

			<?php printf( '<img srcset="%s, %s 2x">',
				esc_url( wp_get_attachment_url( get_sub_field( 'image' ), 'six-up' ) ),
				esc_url( wp_get_attachment_url( get_sub_field( 'image' ), 'six-up-2x' ) )
			); ?>

		</div>

	<?php endwhile; ?>

</section>
