<section class="front-page__hero">

	<div class="front-page__hero__container">

		<?php
		$image['small'] = wp_get_attachment_image_src( 10917, 'sixteen_nine_small' );
		$image['small_2x'] = wp_get_attachment_image_src( 10917, 'sixteen_nine_small_2x' );

		$image['medium'] = wp_get_attachment_image_src( 10917, 'sixteen_nine_medium' );
		$image['medium_2x'] = wp_get_attachment_image_src( 10917, 'sixteen_nine_medium_2x' );

		$image['large'] = wp_get_attachment_image_src( 10917, 'sixteen_nine_large' );
		$image['large_2x'] = wp_get_attachment_image_src( 10917, 'sixteen_nine_large_2x' );
		?>

		<picture>
			<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
			<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
			<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
		</picture>

		<div class="front-page__hero__video">

			<iframe src="https://player.vimeo.com/video/138792354?title=0&byline=0&portrait=0" width="500" height="375" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="front-page__video"></iframe>

		</div>

	</div>

</section>
