<?php
/**
 * Woolly Mammal One-Off Image Panel.
 *
 * @package RP3
 */
?>

<!-- Woolly Mammal One-Off Image Panel -->

<?php if ( '' != get_sub_field( 'woolly-mammoth-image' ) ) : ?>

<section class="work-single__full--woolly-mammoth scroll-effect effect-ease-up">
	<div class="scroll-effect-target">
		<?php
		$image['small'] = wp_get_attachment_image_src( get_sub_field( 'woolly-mammoth-image' ), 'woolly_mammoth_small' );
		$image['small_2x'] = wp_get_attachment_image_src( get_sub_field( 'woolly-mammoth-image' ), 'woolly_mammoth_small_2x' );

		$image['medium'] = wp_get_attachment_image_src( get_sub_field( 'woolly-mammoth-image' ), 'woolly_mammoth_medium' );
		$image['medium_2x'] = wp_get_attachment_image_src( get_sub_field( 'woolly-mammoth-image' ), 'woolly_mammoth_medium_2x' );

		$image['large'] = wp_get_attachment_image_src( get_sub_field( 'woolly-mammoth-image' ), 'woolly_mammoth_large' );
		$image['large_2x'] = wp_get_attachment_image_src( get_sub_field( 'woolly-mammoth-image' ), 'woolly_mammoth_large_2x' );
		?>

		<picture>
			<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
			<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
			<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
		</picture>

	</div>
</section>

<?php endif; ?>
