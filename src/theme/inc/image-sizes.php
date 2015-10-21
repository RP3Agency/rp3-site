<?php
/**
 * Custom image sizes for this theme.
 *
 * @package RP3
 */

function rp3_image_sizes() {

	// Ratios are calculated by dividing the height by the width

	$ratio__four_three		= 3 / 4;
	$ratio__eight_three		= 3 / 8;
	$ratio__three_four		= 4 / 3;
	$ratio__sixteen_nine	= 9 / 16;
	$ratio__woolly_mammoth	= 1690 / 2400;

	/* ==========================================================================
	   4:3
	   ========================================================================== */

	add_image_size( 'four_three_thumb', 320 / 2, 320 * $ratio__four_three / 2, true );

	add_image_size( 'four_three_small', 320, 320 * $ratio__four_three, true );
	add_image_size( 'four_three_small_2x', 320 * 2, 320 * $ratio__four_three * 2, true );

	add_image_size( 'four_three_medium', 600, 600 * $ratio__four_three, true );
	add_image_size( 'four_three_medium_2x', 600 * 2, 600 * $ratio__four_three * 2, true );

	add_image_size( 'four_three_large', 1200, 1200 * $ratio__four_three, true );
	add_image_size( 'four_three_large_2x', 1200 * 2, 1200 * $ratio__four_three * 2, true );


	/* ==========================================================================
	   8:3
	   ========================================================================== */

	add_image_size( 'eight_three_thumb', 320 / 2, 320 * $ratio__eight_three / 2, true );

	add_image_size( 'eight_three_small', 320, 320 * $ratio__eight_three, true );
	add_image_size( 'eight_three_small_2x', 320 * 2, 320 * $ratio__eight_three * 2, true );

	add_image_size( 'eight_three_medium', 600, 600 * $ratio__eight_three, true );
	add_image_size( 'eight_three_medium_2x', 600 * 2, 600 * $ratio__eight_three * 2, true );

	add_image_size( 'eight_three_large', 1200, 1200 * $ratio__eight_three, true );
	add_image_size( 'eight_three_large_2x', 1200 * 2, 1200 * $ratio__eight_three * 2, true );


	/* ==========================================================================
	   3:4
	   ========================================================================== */

	add_image_size( 'three_four_thumb', 320 / 2 * $ratio__three_four, 320 / 2, true );

	add_image_size( 'three_four_small', 320 * $ratio__three_four, 320, true );
	add_image_size( 'three_four_small_2x', 320 * $ratio__three_four * 2, 320 * 2, true );

	add_image_size( 'three_four_medium', 600 * $ratio__three_four, 600, true );
	add_image_size( 'three_four_medium_2x', 600 * 2 * $ratio__three_four, 600 * 2, true );

	add_image_size( 'three_four_large', 1200 * $ratio__three_four, 1200, true );
	add_image_size( 'three_four_large_2x', 1200 * $ratio__three_four * 2, 1200 * 2, true );


	/* ==========================================================================
	   16:9
	   ========================================================================== */

	add_image_size( 'sixteen_nine_thumb', 320 / 2, 320 * $ratio__sixteen_nine / 2, true );

	add_image_size( 'sixteen_nine_small', 320, 320 * $ratio__sixteen_nine, true );
	add_image_size( 'sixteen_nine_small_2x', 320 * 2, 320 * $ratio__sixteen_nine * 2, true );

	add_image_size( 'sixteen_nine_medium', 600, 600 * $ratio__sixteen_nine, true );
	add_image_size( 'sixteen_nine_medium_2x', 600 * 2, 600 * $ratio__sixteen_nine * 2, true );

	add_image_size( 'sixteen_nine_large', 1200, 1200 * $ratio__sixteen_nine, true );
	add_image_size( 'sixteen_nine_large_2x', 1200 * 2, 1200 * $ratio__sixteen_nine * 2, true );


	/* ==========================================================================
	   Woolly Mammoth
	   ========================================================================== */

	add_image_size( 'woolly_mammoth_thumb', 320 / 2, 320 * $ratio__woolly_mammoth / 2, true );

	add_image_size( 'woolly_mammoth_small', 320, 320 * $ratio__woolly_mammoth, true );
	add_image_size( 'woolly_mammoth_small_2x', 320 * 2, 320 * $ratio__woolly_mammoth * 2, true );

	add_image_size( 'woolly_mammoth_medium', 600, 600 * $ratio__woolly_mammoth, true );
	add_image_size( 'woolly_mammoth_medium_2x', 600 * 2, $ratio__woolly_mammoth * 2, true );

	add_image_size( 'woolly_mammoth_large', 1200, 1200 * $ratio__woolly_mammoth, true );
	add_image_size( 'woolly_mammoth_large_2x', 1200 * 2, 1200 * $ratio__woolly_mammoth * 2, true );


	/* ==========================================================================
	   In-Post Images
	   ========================================================================== */

	add_image_size( 'in_post', 720 );
}

add_action( 'after_setup_theme', 'rp3_image_sizes' );


/** Allow for our custom image size to be used in posts */

function rp3_custom_image_size( $sizes ) {
	return array_merge( $sizes, array(
		'in_post' => 'In-Post Image'
	) );
}

add_filter( 'image_size_names_choose', 'rp3_custom_image_size' );
