<?php
/**
 * Full-Width Image Panel.
 *
 * @package RP3
 */
?>

<!-- Full-Width Image Panel -->

<?php if ( get_sub_field( 'tall' ) ) : ?>

	<section class="full-width-image-panel panel full-width-image-panel--tall">

<?php else: ?>

	<section class="full-width-image-panel panel">

<?php endif; ?>

	<div class="full-width-image-panel__image">

		<div class="full-width-image-panel__image__content">

			<?php if ( '' != get_sub_field( 'full-width-image' ) ) : ?>

				<?php if ( get_sub_field( 'tall' ) ) : ?>

					<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'full-width-image' ) ), 'full-width-tall' ); ?>

				<?php else: ?>

					<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'full-width-image' ) ), 'full-width' ); ?>

				<?php endif; ?>

			<?php endif; ?>

		</div>
		<!-- full-width-image-panel image content -->

	</div>
	<!-- full-width-image-panel image -->

</section>
<!-- full-width-image-panel -->
