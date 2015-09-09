<!-- Half Width -->

<?php
$post = get_sub_field( 'half_width' );
setup_postdata( $post );

/** Determine the headline as some combination of the work title and client */

$title = get_the_title();
$client = get_field( 'client' );

if ( empty( $client ) ) {
	$content = '<h1 class="work__title headline__title">' . esc_html( $title ) . '</h1>';
} elseif ( $title === $client ) {
	$content = '<h1 class="work__title headline__title">' . esc_html( $title ) . '</h1>';
} else {
	$content = '<h1 class="work__title headline__title">' . esc_html( $title ) . '</h1><div class="work__client headline__client">for <b>' . esc_html( $client ) . '</b></div>';
}

/** Determine whether to use the primary or alternate featured image */

$alt_featured_image = rp3_use_alternate_featured_image( 'half_width_featured_image_alt' );
?>

<div class="work__half">

	<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="work__link block">

		<div class="work__image work__image--half">

			<?php

			if ( $alt_featured_image ) {
				$featured_image_id = $alt_featured_image;
			} else {
				$featured_image_id = get_post_thumbnail_id();
			}

			$image['small'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_small' );
			$image['small_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_small_2x' );

			$image['medium'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_medium' );
			$image['medium_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_medium_2x' );

			$image['large'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_large' );
			$image['large_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_large_2x' );
			?>

			<picture>
				<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
				<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
				<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
				<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			</picture>

		</div>
		<!-- work image half -->

		<div class="work__content headline">

			<div class="headline__container">

				<?php echo $content; ?>

			</div>

		</div>

	</a>

</div>
<!-- work half -->

<?php wp_reset_postdata(); ?>

<!-- End Half Width -->
