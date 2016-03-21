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
}
add_action( 'widgets_init', 'rp3_widgets_init' );
