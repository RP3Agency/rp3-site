<?php
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function rp3_widgets_init() {

	// News Sidebar
	register_sidebar( array(
		'name'          => __( 'News Sidebar', 'rp3' ),
		'id'            => 'news-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	// "Fact Sheet" widget for footer
	register_sidebar( array(
		'name'				=> __( 'Fact Sheet Area', 'rp3' ),
		'id'				=> 'fact-sheet',
		'class'				=> 'fact-sheet',
		'description'		=> __( 'Where the fact sheet lives.', 'rp3' ),
		'before_widget'		=> '<div id="fact-sheet" class="widget-container fact-sheet %2$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );

	// 3 Widget areas for blog archive page
	register_sidebar( array(
		'name'				=> __( 'Blog Archive' ),
		'id'				=> 'blog-archive',
		'before_widget'		=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>',
	) );

	// Blog single post
	register_sidebar( array(
		'name'				=> __( 'Blog Single Post', 'rp3' ),
		'id'				=> 'blog-single-post',
		'class'				=> 'blog-single-post',
		'description'		=> __( 'Sidebar for the single blog posts', 'rp3' ),
		'before_widget'		=> '<aside id="blog-single-widget-area" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );


	// Career listing
	register_sidebar( array(
		'name'				=> __( 'Career Listing Sidebar', 'rp3' ),
		'id'				=> 'career__sidebar',
		'class'				=> 'career__sidebar',
		'description'		=> __( 'Sidebar for career listing pages', 'rp3' ),
		'before_widget'		=> '<aside id="career__single-widget-area" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );

	// Home page: dark blue widget block
	register_sidebar( array(
		'name'				=> __( 'Home Page Widget', 'rp3' ),
		'id'				=> 'home-errata__widget',
		'class'				=> 'home-errata__widget home-errata__block',
		'description'		=> __( 'Blue block in the home page errata (bottom of the page)', 'rp3' ),
		'before_widget'		=> '<aside id="home-errata__widget-area" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );
}
add_action( 'widgets_init', 'rp3_widgets_init' );
