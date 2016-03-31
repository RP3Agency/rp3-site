<?php
/**
 * Hero image panel.
 *
 * @package RP3
 */
?>

<!-- Hero Image Panel -->

<?php
global $class;
?>

<?php if ( '' != get_sub_field( 'video_link' ) ) : ?>

	<div class="video__trigger">

		<a href="<?php echo esc_url( get_sub_field( 'video_link' ) ); ?>" id="video__trigger" class="block">

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'image' ), array(
				'image_size'	=> 'case-study',
				'classes'		=> 'hero-image ' . $class . '-hero-image case-study-hero-image'
			) ); ?>

		</a>

		<div class="video__modal" id="video__modal">

			<?php echo wp_oembed_get( get_sub_field( 'video_link' ) ); ?>

		</div>

	</div>

<?php else: ?>

	<?php echo rp3_full_bleed_hero_image( get_sub_field( 'image' ), array(
		'image_size'	=> 'case-study',
		'classes'		=> 'hero-image ' . $class . '-hero-image case-study-hero-image'
	) ); ?>

<?php endif; ?>
