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


	$smaller_hero_images = array(
		'small'			=> array( 320, 200 ),
		'medium'		=> array( 600, 400 ),
		'large'			=> array( 1600, 500 )
	);

	// Sub Page Hero
	rp3_add_image_size( 'sub-page-hero', $smaller_hero_images );


	// Case Studies
	rp3_add_image_size( 'case-study', $smaller_hero_images );

	// News & Blog Thumbnails
	add_image_size( 'news-blog-thumbnail', 511, 9999 );


	// Leadership
	rp3_add_image_size( 'leadership', array(
		'small'			=> array( 152, 121 ),
		'medium'		=> array( 309, 247 ),
		'large'			=> array( 374, 300 )
	) );

	// Work
	rp3_add_image_size( 'work-full-width', array(
		'small'			=> array( 320, 320, true ),
		'medium'		=> array( 532, 532, true ),
		'large'			=> array( 1000, 400, true )
	) );

	rp3_add_image_size( 'work-half-width', array(
		'small'			=> array( 320, 320, true ),
		'medium'		=> array( 532, 532, true ),
		'large'			=> array( 500, 400, true )
	) );

	rp3_add_image_size( 'work-quarter-width', array(
		'small'			=> array( 320, 320, true ),
		'medium'		=> array( 320, 320, true ),
		'large'			=> array( 250, 200, true )
	) );

	rp3_add_image_size( 'case-study', array(
		'small'			=> array( 320, 120, true ),
		'medium'		=> array( 600, 225, true ),
		'large'			=> array( 1600, 600, true )
	) );

	rp3_add_image_size( 'case-study-tall', array(
		'small'			=> array( 320, 180, true ),
		'medium'		=> array( 600, 337.5, true ),
		'large'			=> array( 1600, 900, true )
	) );

	rp3_add_image_size( 'home-page-other-work', array(
		'small'			=> array( 284, 400, true ),
		'medium'		=> array( 534, 600, true ),
		'large'			=> array( 1600, 800, true )
	) );

	rp3_add_image_size( 'interstitial', array(
		// 'small'			=> array( 320, 128, true ),
		'small'			=> array( 600, 240, true ),
		'medium'		=> array( 1600, 640, true ),
		'large'			=> array( 1600, 640, true )
	) );

	// Related Work
	add_image_size( 'related-work-thumbnail', 250, 200, true );
	add_image_size( 'related-work-thumbnail-2x', 500, 400, true );
}

add_action( 'init', 'rp3_image_sizes' );
