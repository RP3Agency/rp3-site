<?php
/**
 * Display the six-up image panel.
 *
 * @package RP3
 */
?>

<section class="work-single__six-up">

	<?php while ( have_rows( 'images' ) ) : the_row(); ?>

		<div class="work-single__six-up__image">

			<?php
			$image['small'] = wp_get_attachment_image_src( get_sub_field( 'image' ), 'eight_three_small' );
			$image['small_2x'] = wp_get_attachment_image_src( get_sub_field( 'image' ), 'eight_three_small_2x' );

			$image['medium'] = wp_get_attachment_image_src( get_sub_field( 'image' ), 'eight_three_medium' );
			$image['medium_2x'] = wp_get_attachment_image_src( get_sub_field( 'image' ), 'eight_three_medium_2x' );
			?>

			<picture>
				<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
				<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
				<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			</picture>

		</div>

	<?php endwhile; ?>

</section>
