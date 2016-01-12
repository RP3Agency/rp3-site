<?php

/**
 * Custom post types for the RP3 Agency site
 */


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
		'supports'				=> array( 'title', 'thumbnail' ),
		'rewrite'				=> array(
			'slug'					=> 'work',
			'with_front'			=> false
		)
	);

	register_post_type( 'rp3_cpt_work', $args );

	// Custom Taxonomy
	$tax_args = array(
		'labels'				=> array(
			'name'					=> 'Work Tags',
			'singular_name'			=> 'Work Tag',
		),
		'public'				=> false,
		'show_ui'				=> true,
		'hierarchical'			=> false
	);

	register_taxonomy( 'rp3_tax_work_tags', 'rp3_cpt_work', $tax_args );
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
 * News
 */
function rp3_cpt_news() {

	// Custom Post Type
	$args = array(
		'labels'				=> array(
			'name'					=> 'News',
			'singular_name'			=> 'News',
		),
		'description'			=> 'News articles and press releases.',
		'public'				=> true,
		'exclude_from_search'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> false,
		'menu_position'			=> 5,
		'hierarchical'			=> false,
		'menu_icon'				=> 'dashicons-media-text',
		'supports'				=> array( 'title', 'thumbnail', 'editor', 'excerpt' ),
		'rewrite'				=> array(
			'slug'					=> 'news',
			'with_front'			=> false,
			'pages'					=> false,
		)
	);

	register_post_type( 'rp3_cpt_news', $args );

	// define explicit news pagination rewrite rule
	add_rewrite_rule('^news/page/([0-9]+)/?$','index.php?pagename=news&paged=$matches[1]','top');

	// Custom Taxonomy
	$tax_args = array(
		'labels'				=> array(
			'name'					=> 'News Categories',
			'singular_name'			=> 'Category'
		),
		'public'				=> true,
		'hierarchical'			=> true
	);

	register_taxonomy( 'rp3_tax_news_categories', 'rp3_cpt_news', $tax_args );
}


/**
 * Careers
 */
function rp3_cpt_careers() {

	// Custom Post Type
	$careers_args = array(
		'labels'				=> array(
			'name'					=> 'Careers',
			'singular_name'			=> 'Job',
		),
		'description'			=> 'Job announcements.',
		'public'				=> true,
		'exclude_from_search'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> false,
		'menu_position'			=> 6,
		'hierarchical'			=> false,
		'menu_icon'				=> 'dashicons-admin-tools',
		'supports'				=> array( 'title', 'editor' ),
		'rewrite'				=> array(
			'slug'					=> 'careers',
			'with_front'			=> false
		)
	);

	register_post_type( 'rp3_cpt_careers', $careers_args );

	// Custom Taxonomy
	$tax_args = array(
		'labels'				=> array(
			'name'					=> 'Departments',
			'singular_name'			=> 'Department'
		),
		'public'				=> true,
		'hierarchical'			=> true
	);

	register_taxonomy( 'rp3_tax_departments', 'rp3_cpt_careers', $tax_args );

	/**
	 * Career Boilerplate Snippets
	 * The benefit boilerplate snippets
	 */


	$boilerplate_args = array(
		'labels'				=> array(
			'name'					=> 'Career Boilerplates',
			'singular_name'			=> 'Boilerplate',
			'add_new_item'			=> 'Add New Boilerplate',
			'edit_item'				=> 'Edit Boilerplate',
			'new_item'				=> 'New Boilerplate',
			'view_item'				=> 'View Boilerplate',
			'search_items'			=> 'Search Boilerplates'
		),
		'description'			=> 'Career boilerplates.',
		'public'				=> false,
		'exclude_from_search'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> false,
		'show_in_menu'			=> true,
		'menu_position'			=> 7,
		'show_in_admin_bar'		=> false,
		'hierarchical'			=> true,
		'menu_icon'				=> 'dashicons-admin-tools',
		'supports'				=> array( 'title', 'editor' )
	);

	register_post_type( 'rp3_cpt_career_bp', $boilerplate_args );
}


/**
 * Custom Taxonomies for Blog Posts
 */
function rp3_blog_taxonomies() {

	$industry_args = array(
		'labels'				=> array(
			'name'					=> 'Industries',
			'singular_name'			=> 'Industry'
		),
		'public'				=> true,
		'hierarchical'			=> true
	);

	register_taxonomy( 'rp3_tax_industries', 'post', $industry_args );

	$service_args = array(
		'labels'				=> array(
			'name'					=> 'Services',
			'singular_name'			=> 'Service'
		),
		'public'				=> true,
		'hierarchical'			=> true
	);

	register_taxonomy( 'rp3_tax_services', 'post', $service_args );

	// remove default "category" taxonomy from posts
	register_taxonomy( 'category', array() );
}


/**
 * Activate all the custom post types and taxonomies in one fell swoop
 */
function rp3_cpt() {
	rp3_cpt_work();
	rp3_cpt_leadership();
	rp3_cpt_news();
	rp3_cpt_careers();
	rp3_blog_taxonomies();
}
add_action( 'init', 'rp3_cpt' );
