<?php
/**
 * Half-Width Image Panel.
 *
 * Narrow: stacked.
 * Medium and above: side-by-side.
 *
 * @package RP3
 */
?>

<!-- Half-Width Image Panel -->

<section class="half-width-image-panel panel">

	<div class="half-width-image-panel__image half-width-image-panel__image--left">

		<div class="half-width-image-panel__image__content">

			<?php if ( '' != get_sub_field( 'half-width-image-left' ) ) : ?>

				<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'half-width-image-left' ) ), 'half-width' ); ?>

			<?php endif; ?>

		</div>
		<!-- half-width-image-panel image content -->

	</div>
	<!-- half-width-image-panel image left -->



	<div class="half-width-image-panel__image half-width-image-panel__image--right">

		<div class="half-width-image-panel__image__content">

			<?php if ( '' != get_sub_field( 'half-width-image-right' ) ) : ?>

				<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'half-width-image-right' ) ), 'half-width' ); ?>

			<?php endif; ?>

		</div>
		<!-- half-width-image-panel image content -->

	</div>
	<!-- half-width-image-panel image right -->

</section>
<!-- half-width-image-panel -->
