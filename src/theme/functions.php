<?php
/**
 * RP3 functions and definitions
 *
 * @package RP3
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

if ( ! function_exists( 'rp3_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rp3_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RP3, use a find and replace
	 * to change 'rp3' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rp3', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	require get_template_directory() . '/inc/menus.php';

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rp3_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // rp3_setup
add_action( 'after_setup_theme', 'rp3_setup' );

/**
 * Widget areas for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
function rp3_scripts() {

	if ( WP_DEBUG ) {
		/** Uniminified for debugging */

		// wp_register_style( 'wawf-fonts', get_template_directory_uri() . '/fonts-com.css' );
		wp_register_style( 'rp3-style', get_stylesheet_directory_uri() . '/css/rp3.css' );
		wp_register_script( 'rp3-vendor', get_template_directory_uri() . '/js/rp3-vendor.js', array(), '20120206' );
		wp_register_script( 'rp3-plugins', get_template_directory_uri() . '/js/rp3-plugins.js', array( 'jquery' ), '20120206', true );
		wp_register_script( 'rp3-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDbQMhVNXn8QRMNJoiWJeemZ63O4NN75kI');

		if ( is_page( 'contact' ) ) {
			wp_register_script( 'rp3-javascript', get_template_directory_uri() . '/js/rp3.js', array( 'jquery', 'rp3-plugins', 'rp3-google-maps', 'backbone' ), '20120206', true );
		} else {
			wp_register_script( 'rp3-javascript', get_template_directory_uri() . '/js/rp3.js', array( 'jquery', 'rp3-plugins', 'backbone' ), '20120206', true );
		}

	} else {
		/** Minified for production */

		// wp_register_style( 'wawf-fonts', get_template_directory_uri() . '/fonts-com.css' );
		wp_register_style( 'rp3-style', get_stylesheet_directory_uri() . '/css/rp3.min.css' );
		wp_register_script( 'rp3-vendor', get_template_directory_uri() . '/js/rp3-vendor.min.js', array(), '20120206' );
		wp_register_script( 'rp3-plugins', get_template_directory_uri() . '/js/rp3-plugins.min.js', array( 'jquery' ), '20120206', true );
		wp_register_script( 'rp3-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDbQMhVNXn8QRMNJoiWJeemZ63O4NN75kI');

		if ( is_page( 'contact' ) ) {
			wp_register_script( 'rp3-javascript', get_template_directory_uri() . '/js/rp3.min.js', array( 'jquery', 'rp3-plugins', 'rp3-google-maps', 'backbone' ), '20120206', true );
		} else {
			wp_register_script( 'rp3-javascript', get_template_directory_uri() . '/js/rp3.min.js', array( 'jquery', 'rp3-plugins', 'backbone' ), '20120206', true );
		}
	}

	// wp_enqueue_style( 'wawf-fonts' );
	wp_enqueue_style( 'rp3-style' );
	wp_enqueue_script( 'rp3-vendor' );
	wp_enqueue_script( 'rp3-javascript' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rp3_scripts' );

/**
 * Add page slug into body class
 */
function rp3_add_slug_body_class( $classes ) {
	global $post;

	if ( isset ( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	if ( is_single() && in_category( 'blog' ) ) {
		$classes[] = 'single-post-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'rp3_add_slug_body_class' );

/**
 * Add filter for stripping out <a href=""> tags from content (for the blog archives).
 */
function rp3_strip_anchor_filter( $content ) {
	return preg_replace( '/<\/?a[^>]*>/', '', $content );
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom filters for this theme.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Custom image sizes for this theme.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Display people on the "About" page
 */
require get_template_directory() . '/inc/display-people.php';

/**
 * Pre-get-post filters
 */
require get_template_directory() . '/inc/pre-get-posts.php';

/**
 * Miscellaneous
 */

// Dequeue stylesheets that come with plugins
function rp3_dequeue_plugin_css() {
	wp_dequeue_style( 'main-style' );
	wp_dequeue_style( 'rpbcStyle' );
}
add_action( 'wp_enqueue_scripts', 'rp3_dequeue_plugin_css' );


// Add Favicon
function rp3_favicon() {
	echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.ico">';
}
add_action( 'wp_head', 'rp3_favicon' );


/**
 * Custom excerpts for News & Blog
 */
if ( ! function_exists( 'rp3_all_excerpts_get_more_link' ) ) {

	function rp3_all_excerpts_get_more_link( $post_excerpt ) {

		return '<p>' . $post_excerpt . ' <span class="link continue">Continue Reading</span></p>';
	}
}

add_filter( 'wp_trim_excerpt', 'rp3_all_excerpts_get_more_link' );

if ( ! function_exists( 'rp3_excerpt_length' ) ) {

	function rp3_excerpt_length( $length ) {
		return 20;
	}
}

add_filter( 'excerpt_length', 'rp3_excerpt_length' );

if ( ! function_exists( 'rp3_excerpt_more' ) ) {

	function rp3_excerpt_more( $more ) {
		return '…';
	}
}

add_filter( 'excerpt_more', 'rp3_excerpt_more' );


if ( ! function_exists( 'rp3_add_json_offset' ) ) {

	function rp3_add_json_offset( $valid_vars ) {
		$valid_vars[] = 'offset';
		return $valid_vars;
	}
}
add_filter( 'json_query_vars', 'rp3_add_json_offset' );

/**
 * Create a Limit Login Attempts whitelist for the Agency's IP address
 * https://wordpress.org/plugins/limit-login-attempts/faq/
 */
function rp3_limit_login_attempt_whitelist( $allow, $ip ) {
	return ( $ip == '198.207.29.34' ) ? true : $allow;
}

add_filter( 'limit_login_whitelist_ip', 'rp3_limit_login_attempt_whitelist', 10, 2 );
