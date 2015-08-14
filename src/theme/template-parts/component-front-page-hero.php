<section class="front-page__hero">

	<?php
	$image['small'] = wp_get_attachment_image_src( 10544, 'four_three_small' );
	$image['small_2x'] = wp_get_attachment_image_src( 10544, 'four_three_small_2x' );

	$image['medium'] = wp_get_attachment_image_src( 10544, 'four_three_medium' );
	$image['medium_2x'] = wp_get_attachment_image_src( 10544, 'four_three_medium_2x' );

	$image['large'] = wp_get_attachment_image_src( 10544, 'eight_three_large' );
	$image['large_2x'] = wp_get_attachment_image_src( 10544, 'eight_three_large_2x' );
	?>

	<picture>
		<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
		<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
		<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
		<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
	</picture>

</section>
