<?php
/**
 * RP3 Theme Customizer
 *
 * @package RP3
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rp3_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'rp3_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rp3_customize_preview_js() {

	if ( WP_DEBUG ) {
		wp_enqueue_script( 'rp3_customizer', get_template_directory_uri() . '/js/rp3-admin.js', array( 'customize-preview' ), '20130508', true );
	} else {
		wp_enqueue_script( 'rp3_customizer', get_template_directory_uri() . '/js/rp3-admin.min.js', array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'rp3_customize_preview_js' );
