<?php
/**
 * Video Panel.
 *
 * @package RP3
 */
?>

<!-- Full-Width Image Panel -->

<section class="video-panel panel video-panel__trigger">

	<a href="#!" id="video__trigger" class="video-panel__image block">

		<div class="video-panel__image__content">

			<?php if ( '' != get_sub_field( 'full-width-image' ) ) : ?>

				<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'full-width-image' ) ), 'video-panel' ); ?>

			<?php endif; ?>

		</div>
		<!-- full-width-image-panel image content -->

	</a>
	<!-- full-width-image-panel image -->

	<div class="video-panel__modal" id="video__modal">

		<?php echo wp_oembed_get( get_sub_field( 'video_link' ) ); ?>

	</div>

</section>
<!-- full-width-image-panel -->
