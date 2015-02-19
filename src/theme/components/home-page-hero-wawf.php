<?php

/**
 * Create 44 blocks.
 * Each block will have 1 of 4 possible size variations:
 *     100x100
 *     100x200
 *     200x100
 *     300x300
 * Each block will either be blur or photo
 * Blocks are numbered left to right, top to bottom based on the starting
 *     position (sort of like a crossword puzzle)
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
	array( '100x100', 'blur', 'green' ),		// 19
	array( '100x100', 'blur', 'blue' ),			// 20

	array( '200x200', 'photo', 'photo-11' ),	// 21
	array( '100x100', 'blur', 'green' ),		// 22

	array( '200x100', 'photo', 'photo-12' ),	// 23
	array( '100x100', 'blur', 'gray' ),			// 24
	array( '200x100', 'blur', 'gray' ),			// 25
	array( '100x200', 'photo', 'photo-13' ),	// 26
	array( '300x300', 'photo', 'photo-14' ),	// 27

	array( '100x100', 'blur', 'pink' ),			// 28
	array( '100x200', 'photo', 'photo-15' ),	// 29
	array( '300x300', 'photo', 'photo-16' ),	// 30
	array( '100x100', 'photo', 'photo-17' ),	// 31
	array( '200x100', 'blur', 'gold' ),			// 32

	array( '100x200', 'photo', 'photo-18' ),	// 33
	array( '100x200', 'blur', 'blue' ),			// 34
	array( '200x100', 'photo', 'photo-19' ),	// 35
	array( '200x200', 'photo', 'photo-20' ),	// 36
	array( '200x100', 'blur', 'gray' ),			// 37
	array( '100x100', 'photo', 'photo-21' ),	// 38

	array( '100x100', 'blur', 'gold' ),			// 39
	array( '200x100', 'blur', 'pink' ),			// 40
	array( '100x100', 'blur', 'pink' ),			// 41
	array( '100x100', 'photo', 'photo-22' ),	// 42
	array( '200x100', 'blur', 'blue' ),			// 43
	array( '200x100', 'blur', 'pink' ),			// 44


	/** Customization for the RP3 home page hero */
	array( '200x100', 'blur', 'gold' ),			// 45
	array( '100x200', 'photo', 'photo-8' ),		// 46
	array( '100x200', 'blur', 'gray' ),			// 47
	array( '100x100', 'photo', 'photo-21' ),	// 48
	array( '100x200', 'blur', 'blue' ),			// 49
	array( '100x100', 'blur', 'green' ),		// 51
	array( '200x100', 'blur', 'pink' ),			// 50
);

// Set a master counter and a photo counter
$counter = 1;
?>
<section id="home-splash" class="home-splash home-hero hero hero-image wawf-hero">

	<a href="#!" class="hero__container">

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

			<div class="hero__headline"><h1>Washington Area Women's Foundation</h1></div>

		</div>

	</a>

</section>

<?php wp_reset_postdata(); ?>
