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

<section class="work-single__half">

	<?php if ( '' != get_sub_field( 'half-width-image-left' ) ) : ?>

		<?php
		$image['small'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-left' ), 'four_three_small' );
		$image['small_2x'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-left' ), 'four_three_small_2x' );

		$image['medium'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-left' ), 'four_three_medium' );
		$image['medium_2x'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-left' ), 'four_three_medium_2x' );
		?>

		<picture>
			<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
			<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
		</picture>

	<?php endif; ?>

	<?php if ( '' != get_sub_field( 'half-width-image-right' ) ) : ?>

		<?php
		$image['small'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-right' ), 'four_three_small' );
		$image['small_2x'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-right' ), 'four_three_small_2x' );

		$image['medium'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-right' ), 'four_three_medium' );
		$image['medium_2x'] = wp_get_attachment_image_src( get_sub_field( 'half-width-image-right' ), 'four_three_medium_2x' );
		?>

		<picture>
			<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
			<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
		</picture>

	<?php endif; ?>

</section>
<!-- half-width-image-panel -->
