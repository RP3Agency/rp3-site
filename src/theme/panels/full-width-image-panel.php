<?php
/**
 * Full-Width Image Panel.
 *
 * @package RP3
 */
?>

<!-- Full-Width Image Panel -->

<?php if ( '' != get_sub_field( 'video_link' ) ) : ?>

	<section class="full-width-image-panel panel video__trigger">

		<a href="#!" id="video__trigger" class="full-width-image-panel__image block">

			<div class="full-width-image-panel__image__content">

				<?php if ( '' != get_sub_field( 'full-width-image' ) ) : ?>

					<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'full-width-image' ) ), 'full-width' ); ?>

				<?php endif; ?>

			</div>
			<!-- full-width-image-panel image content -->

		</a>
		<!-- full-width-image-panel image -->

		<div class="video__modal" id="video__modal">

			<?php echo wp_oembed_get( get_sub_field( 'video_link' ) ); ?>

		</div>

	</section>
	<!-- full-width-image-panel -->

<?php else : ?>

	<section class="full-width-image-panel panel">

		<div class="full-width-image-panel__image">

			<div class="full-width-image-panel__image__content">

				<?php if ( '' != get_sub_field( 'full-width-image' ) ) : ?>

					<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'full-width-image' ) ), 'full-width' ); ?>

				<?php endif; ?>

			</div>
			<!-- full-width-image-panel image content -->

		</div>
		<!-- full-width-image-panel image -->

	</section>
	<!-- full-width-image-panel -->

<?php endif; ?>
