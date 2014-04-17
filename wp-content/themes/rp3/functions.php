
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
	$content_width = 640; /* pixels */
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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rp3' ),
	) );

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
 * Widgets for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
function rp3_scripts() {
	wp_enqueue_style( 'rp3-style', get_stylesheet_directory_uri() . '/css/rp3.min.css' );

	wp_enqueue_script( 'rp3-javascript', get_template_directory_uri() . '/js/rp3.min.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'rp3-vendor', get_template_directory_uri() . '/js/rp3-vendor.min.js', array(), '20120206' );

	wp_enqueue_script( 'rp3-plugins', get_template_directory_uri() . '/js/rp3-plugins.min.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rp3_scripts' );

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
 * Miscellaneous
 */

// Dequeue the stylesheet for Category Post List Widget
function rp3_dequeue_CPLW_css() {
	wp_dequeue_style( 'main-style' );
}
add_action( 'wp_enqueue_scripts', 'rp3_dequeue_CPLW_css' );
