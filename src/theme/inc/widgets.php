<?php
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function rp3_widgets_init() {

	// Home page: twitter widget
	register_sidebar( array(
		'name'				=> __( 'Home Page Twitter Block', 'rp3' ),
		'id'				=> 'home-errata__twitter-widget',
		'class'				=> 'home-errata__twitter-widget home-errata__block',
		'description'		=> __( 'Twitter block in the home page errata (bottom of the page)', 'rp3' ),
		'before_widget'		=> '<aside id="home-errata__widget-area" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );

	// Careers Boilerplate Widget
	register_sidebar( array(
		'name'				=> __( 'Careers Boilerplate Widget', 'rp3' ),
		'id'				=> 'careers-boilerplate-widget',
		'class'				=> 'careers-boilerplate-widget boilerplate',
		'description'		=> __( 'Boilerplate for full-time positions.', 'rp3' ),
		'before_widget'		=> '<aside id="careers-boilerplate-widget__widget-area" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );

	// Internship Boilerplate Widget
	register_sidebar( array(
		'name'				=> __( 'Internship Boilerplate Widget', 'rp3' ),
		'id'				=> 'internship-boilerplate-widget',
		'class'				=> 'internship-boilerplate-widget boilerplate',
		'description'		=> __( 'Boilerplate for internship positions.', 'rp3' ),
		'before_widget'		=> '<aside id="internship-boilerplate-widget__widget-area" class="widget %2$s">',
		'after_widget'		=> '</aside>',
		'before_title'		=> '<h1 class="widget-title">',
		'after_title'		=> '</h1>'
	) );
}
add_action( 'widgets_init', 'rp3_widgets_init' );
