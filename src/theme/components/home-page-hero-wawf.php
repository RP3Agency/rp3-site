<?php

/**
 * Create -44- 51 blocks.
 * Each block will have 1 of 4 possible size variations:
 *     100x100
 *     100x200
 *     200x100
 *     300x300
 * Each block will either be blur or photo
 * Blocks are numbered left to right, top to bottom based on the starting
 *     position (sort of like a crossword puzzle)
 *
 * except for the last 7, which are there to fill in the CTA space that's on
 * the actual WAWF home page.
 */
$blocks = array(
	array( '300x300', 'photo', 'photo-1' ),	// 1
	array( '100x200', 'blur', 'gold' ),		// 2
	array( '200x200', 'photo', 'photo-2' ),	// 3
	array( '200x100', 'blur', 'pink' ),		// 4
	array( '200x100', 'photo', 'photo-3' ),	// 5
	array( '200x100', 'blur', 'pink' ),		// 6
	array( '200x100', 'photo', 'photo-4' ),	// 7
	array( '200x100', 'blur', 'green' ),	// 8

	array( '100x100', 'photo', 'photo-5' ),	// 9
	array( '100x100', 'blur', 'blue' ),		// 10
	array( '100x100', 'photo', 'photo-6' ),	// 11
	array( '200x100', 'blur', 'green' ),	// 12
	array( '100x100', 'photo', 'photo-7' ),	// 13
	array( '200x100', 'blur', 'gray' ),		// 14
	array( '100x200', 'photo', 'photo-8' ),	// 15
	array( '100x200', 'blur', 'gray'  ),	// 16

	array( '100x200', 'photo', 'photo-9' ),		// 17
	array( '100x100', 'photo', 'photo-10' ),	// 18
	array( '300x300', 'photo', 'photo-11' ),	// 19
	array( '100x100', 'blur', 'pink' ),			// 20
	array( '200x100', 'photo', 'photo-12' ),	// 21
	array( '200x100', 'blur', 'gold' ),			// 22
	array( '100x100', 'blur', 'green' ),		// 23

	array( '200x100', 'photo', 'photo-13' ),	// 24
	array( '100x100', 'blur', 'gray' ),			// 25
	array( '100x100', 'blur', 'pink' ),			// 26
	array( '200x100', 'blur', 'blue' ),			// 27
	array( '100x200', 'photo', 'photo-14' ),	// 28
	array( '100x100', 'blur', 'green' ),		// 29
	array( '100x100', 'photo', 'photo-15' ),	// 30
	array( '300x300', 'photo', 'photo-16' ),	// 31

	array( '100x100', 'blur', 'pink' ),			// 32
	array( '100x200', 'photo', 'photo-17' ),	// 33
	array( '100x100', 'blur', 'blue' ),			// 34
	array( '200x200', 'photo', 'photo-18' ),	// 35
	array( '100x100', 'photo', 'photo-19' ),	// 36
	array( '100x100', 'blur', 'gray' ),			// 37
	array( '200x200', 'photo', 'photo-20' ),	// 38

	array( '100x100', 'photo', 'photo-21' ),	// 39
	array( '100x100', 'photo', 'photo-22' ),	// 40
	array( '100x100', 'blur', 'green' ),		// 41
	array( '200x100', 'photo', 'photo-23' ),	// 42
	array( '200x100', 'blur', 'pink' ),			// 43
	array( '100x100', 'blur', 'gray' ),			// 44
);

// Set a master counter and a photo counter
$counter = 1;
?>
<section id="home-splash" class="home-splash home-hero hero hero-image wawf-hero">

	<a href="<?php echo esc_url( home_url( '/work/thewomensfoundation' ) ); ?>" class="hero__container">

		<div class="hero__image">

			<div class="home-splash__inner">

				<?php foreach ( $blocks as $array ) : ?>

					<?php if ( 'photo' == $array[1] ) : ?>
					<div class="home-splash__block home-splash__block--<?php echo esc_attr( $counter ); ?>" data-block-dimensions="<?php echo esc_attr( $array[0] ); ?>" data-block-type="<?php echo esc_attr( $array[1] ); ?>" data-photo="<?php echo esc_attr( $array[2] ); ?>">
					<?php else : ?>
					<div class="home-splash__block home-splash__block--<?php echo esc_attr( $counter ); ?>" data-block-dimensions="<?php echo esc_attr( $array[0] ); ?>" data-block-type="<?php echo esc_attr( $array[1] ); ?>" data-blur="<?php echo esc_attr( $array[2] ); ?>">
					<?php endif; ?>

					</div>

				<?php $counter++; endforeach; ?>

			</div>
			<!-- // home-splash__inner -->

		</div>
		<!-- // hero__image -->

		<div class="wrapper">

			<div class="hero__headline">
				<h1>Stand Together</h1>

				for <strong>Washington Area Women's Foundation</strong>
			</div>

		</div>

	</a>

</section>

<?php wp_reset_postdata(); ?>
