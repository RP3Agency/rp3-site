<?php
/**
 * Display the single full-bleed image panel.
 *
 * @package RP3
 */
?>

<?php if ( '' != get_sub_field( 'video_link' ) ) : ?>

	<div class="video__trigger">

		<a href="<?php echo esc_url( get_sub_field( 'video_link' ) ); ?>" id="video__trigger" class="block">

			<?php rp3_case_study_hero_image( get_sub_field( 'image' ), get_sub_field( 'tall' ) ); ?>

		</a>

		<div class="video__modal" id="video__modal">

			<?php echo wp_oembed_get( get_sub_field( 'video_link' ) ); ?>

		</div>

	</div>

<?php else : ?>

	<?php rp3_case_study_hero_image( get_sub_field( 'image' ), get_sub_field( 'tall' ) ); ?>

<?php endif; ?>
