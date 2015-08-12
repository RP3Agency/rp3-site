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

	add_image_size( 'four_three_small', 320, 320 * 0.75, true );
	add_image_size( 'four_three_small_2x', 320 * 2, 320 * 0.75 * 2, true );

	add_image_size( 'four_three_medium', 600, 600 * 0.75, true );
	add_image_size( 'four_three_medium_2x', 600 * 2, 600 * 0.75 * 2, true );

	add_image_size( 'four_three_large', 1200, 1200 * 0.75, true );
	add_image_size( 'four_three_large_2x', 1200 * 2, 1200 * 0.75 * 2, true );


	/* ==========================================================================
	   8:3
	   ========================================================================== */

	add_image_size( 'eight_three_small', 320, 320 * 0.375, true );
	add_image_size( 'eight_three_small_2x', 320 * 2, 320 * 0.375 * 2, true );

	add_image_size( 'eight_three_medium', 600, 600 * 0.375, true );
	add_image_size( 'eight_three_medium_2x', 600 * 2, 600 * 0.375 * 2, true );

	add_image_size( 'eight_three_large', 1200, 1200 * 0.375, true );
	add_image_size( 'eight_three_large_2x', 1200 * 2, 1200 * 0.375 * 2, true );
}

add_action( 'init', 'rp3_image_sizes' );
