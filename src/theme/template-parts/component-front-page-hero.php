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

			<iframe id="front-page__video" src="https://player.vimeo.com/video/138791940?api=1&amp;player_id=front-page__video&amp;autoplay=1" width="630" height="354" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

		</div>

		<a class="front-page__hero__play-audio" href="#!" id="play-with-audio"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33.9 30.6" enable-background="new 0 0 33.9 30.6" xml:space="preserve"><polygon fill="none" stroke="#00ADEE" stroke-width="1.4" stroke-miterlimit="10" points="17.2,15.3 17.2,28.5 8.9,21.7 0.7,21.7 0.7,15.4 0.7,9 8.9,9 17.2,2.2 17.2,15.4 "/><path fill="none" stroke="#00ADEE" stroke-width="1.4" stroke-miterlimit="10" d="M22.9,5.7c2,2.4,3.4,6.1,3.4,10.2 c0,3.5-1,6.8-2.5,9.1"/><path fill="none" stroke="#00ADEE" stroke-width="1.4" stroke-miterlimit="10" d="M28,0.5c3.2,3.7,5.2,9.4,5.2,15.7 c0,5.4-1.5,10.4-3.9,14.1"/></svg></a>

	</div>

</section>
