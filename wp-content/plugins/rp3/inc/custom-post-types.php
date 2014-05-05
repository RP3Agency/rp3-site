<?php

/**
 * Custom post types for the RP3 Agency site
 */


/**
 * Capabilities:
 * Tweet-sized capabilities for the "About" page
 */
function rp3_cpt_capabilities() {

	// Custom Post Type
	$args = array(
		'labels'				=> array(
			'name'					=> 'Capabilities',
			'singular_name'			=> 'Capability'
		),
		'description'			=> 'Tweet-sized capabilities information for the "About" page.',
		'public'				=> true,
		'exclude_from_search'	=> true,
		'publicly_queryable'	=> false,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> false,
		'menu_position'			=> 20,
		'hierarchical'			=> true,
		'supports'				=> array( 'title', 'page-attributes' ),
		'taxonomies'			=> array( 'rp3_capabilities_types' )
	);

	register_post_type( 'rp3_capabilities', $args );

	// Custom Taxonomy
	$args = array(
		'labels'				=> array(
			'name'					=> 'Capability Types',
			'singular_name'			=> 'Capability Type'
		),
		'hierarchical'			=> true
	);

	register_taxonomy( 'rp3_capabilities_types', 'rp3_capabilities', $args );
}


/**
 * Home Panels
 * 3 featured panels to display on the home page.
 * Will eventually link to case studies, etc.
 */
function rp3_cpt_home_panels() {

	// Custom Post Type
	$args = array(
		'labels'				=> array(
			'name'					=> 'Home Panels',
			'singular_name'			=> 'Panel'
		),
		'description'			=> 'Panels that appear on the home page',
		'public'				=> true,
		'exclude_from_search'	=> true,
		'publicly_queryable'	=> false,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> false,
		'menu_position'			=> 20,
		'hierarchical'			=> false,
		'supports'				=> array( 'title' )
	);

	register_post_type( 'rp3_home_panels', $args );
}






/**
 * Activate all the custom post types in one fell swoop
 */
function rp3_cpt() {
	rp3_cpt_capabilities();
	rp3_cpt_home_panels();
}
add_action( 'init', 'rp3_cpt' );
