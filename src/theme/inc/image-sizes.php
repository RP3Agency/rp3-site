<?php
/**
 * Custom image sizes for this theme.
 *
 * @package RP3
 */

function rp3_image_sizes() {

	/* ==========================================================================
	   4:3
	   ========================================================================== */

	add_image_size( 'four_three_thumb', 320 / 2, 320 * 0.75 / 2, true );

	add_image_size( 'four_three_small', 320, 320 * 0.75, true );
	add_image_size( 'four_three_small_2x', 320 * 2, 320 * 0.75 * 2, true );

	add_image_size( 'four_three_medium', 600, 600 * 0.75, true );
	add_image_size( 'four_three_medium_2x', 600 * 2, 600 * 0.75 * 2, true );

	add_image_size( 'four_three_large', 1200, 1200 * 0.75, true );
	add_image_size( 'four_three_large_2x', 1200 * 2, 1200 * 0.75 * 2, true );


	/* ==========================================================================
	   8:3
	   ========================================================================== */

	add_image_size( 'eight_three_thumb', 320 / 2, 320 * 0.375 / 2, true );

	add_image_size( 'eight_three_small', 320, 320 * 0.375, true );
	add_image_size( 'eight_three_small_2x', 320 * 2, 320 * 0.375 * 2, true );

	add_image_size( 'eight_three_medium', 600, 600 * 0.375, true );
	add_image_size( 'eight_three_medium_2x', 600 * 2, 600 * 0.375 * 2, true );

	add_image_size( 'eight_three_large', 1200, 1200 * 0.375, true );
	add_image_size( 'eight_three_large_2x', 1200 * 2, 1200 * 0.375 * 2, true );


	/* ==========================================================================
	   3:4
	   ========================================================================== */

	add_image_size( 'three_four_thumb', 320 / 2 * 0.75, 320 / 2, true );

	add_image_size( 'three_four_small', 320 * 0.75, 320, true );
	add_image_size( 'three_four_small_2x', 320 * 0.75 * 2, 320 * 2, true );

	add_image_size( 'three_four_medium', 600 * 0.75, 600, true );
	add_image_size( 'three_four_medium_2x', 600 * 2, 600 * 0.75 * 2, true );

	add_image_size( 'three_four_large', 1200 * 0.75, 1200, true );
	add_image_size( 'three_four_large_2x', 1200 * 0.75 * 2, 1200 * 2, true );


	/* ==========================================================================
	   16:9
	   ========================================================================== */

	add_image_size( 'sixteen_nine_thumb', 320 / 2, 320 * 0.5625 / 2, true );

	add_image_size( 'sixteen_nine_small', 320, 320 * 0.5625, true );
	add_image_size( 'sixteen_nine_small_2x', 320 * 2, 320 * 0.5625 * 2, true );

	add_image_size( 'sixteen_nine_medium', 600, 600 * 0.5625, true );
	add_image_size( 'sixteen_nine_medium_2x', 600 * 2, 600 * 0.5625 * 2, true );

	add_image_size( 'sixteen_nine_large', 1200, 1200 * 0.5625, true );
	add_image_size( 'sixteen_nine_large_2x', 1200 * 2, 1200 * 0.5625 * 2, true );
}

add_action( 'init', 'rp3_image_sizes' );


/** Allow for our custom image size to be used in posts */

function rp3_custom_image_size( $sizes ) {
	return array_merge( $sizes, array(
		'eight_three_large' => '8:3',
		'four_three_large' => '4:3',
		'three_four_large' => '3:4',
		'sixteen_nine_large' => '16:9'
	) );
}

add_filter( 'image_size_names_choose', 'rp3_custom_image_size' );
