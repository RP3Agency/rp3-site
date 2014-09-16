<?php
/**
 * Custom image sizes for this theme.
 *
 * @package RP3
 */

function rp3_add_image_size( $tag, $sizes ) {
	foreach ( $sizes as $size => $values ) {
		add_image_size( $tag . '-' . $size, $values[0], $values[1], true );
		add_image_size( $tag . '-' . $size . '-2x', $values[0] * 2, $values[1] * 2, true );
	}
}

function rp3_image_sizes() {
	// News thumbnails
	add_image_size( 'news-thumbnails', 137, 137, true );


	// Home Page Hero
	rp3_add_image_size( 'home-page-hero', array(
		'small'			=> array( 320, 450 ),
		'medium'		=> array( 640, 450 ),
		'large'			=> array( 1600, 608 )
	) );


	// Case Studies
	rp3_add_image_size( 'case-study', array(
		'small'			=> array( 320, 200 ),
		'medium'		=> array( 600, 400 ),
		'large'			=> array( 1600, 500 )
	) );
}

add_action( 'init', 'rp3_image_sizes' );
