<?php
/**
 * Video Panel.
 *
 * @package RP3
 */

/** Get the video embed code and assign an ID to it */

// Create an id off of the MD5 checksum of the Vimeo source string
$hash = md5( get_sub_field( 'video_link' ) );

$embed_args = array(
    'title' => 0,
    'byline' => 0,
    'portrait' => 0,
    'player_id' => $hash . '__iframe',
);
$iframe = wp_oembed_get( get_sub_field( 'video_link' ), $embed_args );
?>

<!-- Video Panel -->

<section id="<?php echo esc_attr( $hash ); ?>" class="video-panel panel video-panel__trigger">

	<a href="#!" id="<?php echo esc_attr( $hash . '__trigger' ); ?>" data-id="<?php echo esc_attr( $hash ); ?>" class="video-panel__image video__trigger block">

		<div class="video-panel__image__content">

			<?php if ( '' != get_sub_field( 'full-width-image' ) ) : ?>

				<?php
				$image['small'] = wp_get_attachment_image_src( get_sub_field( 'full-width-image' ), 'sixteen_nine_small' );
				$image['small_2x'] = wp_get_attachment_image_src( get_sub_field( 'full-width-image' ), 'sixteen_nine_small_2x' );

				$image['medium'] = wp_get_attachment_image_src( get_sub_field( 'full-width-image' ), 'sixteen_nine_medium' );
				$image['medium_2x'] = wp_get_attachment_image_src( get_sub_field( 'full-width-image' ), 'sixteen_nine_medium_2x' );

				$image['large'] = wp_get_attachment_image_src( get_sub_field( 'full-width-image' ), 'sixteen_nine_large' );
				$image['large_2x'] = wp_get_attachment_image_src( get_sub_field( 'full-width-image' ), 'sixteen_nine_large_2x' );
				?>

				<picture>
					<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
					<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
					<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
					<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
				</picture>

			<?php endif; ?>

		</div>
		<!-- video-panel image content -->

		<div class="video-panel__play-button">

			<?php get_template_part( 'template-parts/inline', 'icon-video-play.svg' ); ?>

		</div>

	</a>
	<!-- video-panel image -->

	<div id="<?php echo esc_attr( $hash . '__modal' ); ?>" class="video-panel__modal">

		<?php echo $iframe; ?>

	</div>

</section>
<!-- full-width-image-panel -->
