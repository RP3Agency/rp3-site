<?php
/**
 * Custom editor styles
 */

function rp3_editor_styles( $init_array ) {

	$style_formats = array(

		array(
			'title'		=> __( 'Call to Action', 'rp3' ),
			'inline'	=> 'span',
			'classes'	=> 'cta',
			'wrapper'	=> false
		),

		array(
			'title'		=> __( 'Larger', 'rp3' ),
			'inline'	=> 'span',
			'classes'	=> 'font-larger',
			'wrapper'	=> false
		)
	);

	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}

add_filter( 'tiny_mce_before_init', 'rp3_editor_styles' );
