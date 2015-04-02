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

	rp3_add_image_size( 'woolly-home-page-hero', array(
		'small'			=> array( 320, 450 ),
		'medium'		=> array( 640, 450 ),
		'large'			=> array( 1638, 600 )
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
		'small'			=> array( 600, 240, true ),
		'medium'		=> array( 1600, 640, true ),
		'large'			=> array( 1600, 640, true )
	) );

	rp3_add_image_size( 'main-copy-counter-image', array(
		'small'			=> array( 320, 180, true ),
		'medium'		=> array( 600, 338, true ),
		'large'			=> array( 800, 450, true )
	) );

	// Related Work
	add_image_size( 'related-work-thumbnail', 250, 200, true );
	add_image_size( 'related-work-thumbnail-2x', 500, 400, true );

	// Blog Authors
	add_image_size( 'blog-author', 425, 425, true );
	add_image_size( 'blog-author-2x', 425 * 2, 425 * 2, true );

	// Six-up Image Panel
	rp3_add_image_size( 'six-up', array(
		'initial'       => array( 320, 120, true ),
		'small'         => array( 600, 225, true ),
		'medium'        => array( 500, 187, true ),
		'large'         => array( 800, 300, true )
	) );

	// Full-width Images
	rp3_add_image_size( 'full-width', array(
		'initial'       => array( 320, 240, true ),
		'small'         => array( 600, 450, true ),
		'medium'        => array( 1000, 375, true ),
		'large'         => array( 1600, 600, true )
	) );

	// Full-width Images (Tall)
	rp3_add_image_size( 'full-width-tall', array(
		'initial'       => array( 320, 342, true ),
		'small'         => array( 600, 641, true ),
		'medium'        => array( 1000, 534, true ),
		'large'         => array( 1600, 854, true )
	) );

	// Half-width Images
	rp3_add_image_size( 'half-width', array(
		'initial'       => array( 320, 240, true ),
		'small'         => array( 600, 450, true ),
		'medium'        => array( 500, 375, true ),
		'large'         => array( 800, 600, true )
	) );

	// Content Images
	rp3_add_image_size( 'content', array(
		'initial'       => array( 320, 180, true ),
		'small'         => array( 600, 338, true ),
		'medium'        => array( 500, 282, true ),
		'large'         => array( 800, 450, true )
	) );



	/** Adding breakpoints, so until I can get all the images squared into a newer, better
	format, going to do the picture element for the blog single template manually */

	add_image_size( 'single-blog-small',     320,      168,     true );
	add_image_size( 'single-blog-small-2x',  320 * 2,  168 * 2, true );
	add_image_size( 'single-blog-medium',    600,      316,     true );
	add_image_size( 'single-blog-medium-2x', 600 * 2,  316 * 2, true );
	add_image_size( 'single-blog-large',     1000,     526,     true );
	add_image_size( 'single-blog-large-2x',  1000 * 2, 526 * 2, true );
	add_image_size( 'single-blog-xlarge',    1600,     842,     true );
	add_image_size( 'single-blog-xlarge-2x', 1600 * 2, 842 * 2, true );
}

add_action( 'init', 'rp3_image_sizes' );
