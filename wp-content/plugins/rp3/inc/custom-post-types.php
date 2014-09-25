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
 * Work
 * Work highlights and case studies.
 */
function rp3_cpt_work() {

	// Custom Post Type
	$args = array(
		'labels'				=> array(
			'name'					=> 'Work',
			'singular_name'			=> 'Work',
			'add_new_item'			=> 'Add New Work',
			'edit_item'				=> 'Edit Work',
			'new_item'				=> 'New Work',
			'view_item'				=> 'View Work',
			'search_items'			=> 'Search Work'
		),
		'description'			=> 'Work and case studies.',
		'public'				=> true,
		'exclude_from_search'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> false,
		'menu_position'			=> 20,
		'hierarchical'			=> true,
		'menu_icon'				=> 'dashicons-portfolio',
		'supports'				=> array( 'title', 'editor', 'thumbnail' ),
		'rewrite'				=> array(
			'slug'					=> 'work',
			'with_front'			=> false
		)
	);

	register_post_type( 'rp3_cpt_work', $args );
}


/**
 * Leadership
 */
function rp3_cpt_leadership() {

	// Custom Post Type
	$args = array(
		'labels'				=> array(
			'name'					=> 'Leadership',
			'singular_name'			=> 'Leadership',
			'add_new_item'			=> 'Add New Person',
			'edit_item'				=> 'Edit Person',
			'new_item'				=> 'New Person',
			'view_item'				=> 'View Person',
			'search_items'			=> 'Search Person'
		),
		'description'			=> 'Agency leadership.',
		'public'				=> true,
		'exclude_from_search'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> false,
		'menu_position'			=> 20,
		'hierarchical'			=> true,
		'menu_icon'				=> 'dashicons-businessman',
		'supports'				=> array( 'title', 'thumbnail' ),
		'rewrite'				=> array(
			'slug'					=> 'leadership',
			'with_front'			=> false
		)
	);

	register_post_type( 'rp3_cpt_leadership', $args );
}






/**
 * Activate all the custom post types in one fell swoop
 */
function rp3_cpt() {
	rp3_cpt_capabilities();
	rp3_cpt_work();
	rp3_cpt_leadership();
}
add_action( 'init', 'rp3_cpt' );
