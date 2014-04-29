<?php
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function rp3_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'News Sidebar', 'rp3' ),
		'id'            => 'news-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rp3_widgets_init' );

// "Fact Sheet" widget for footer
register_sidebar( array(
	'name'				=> __( 'Fact Sheet Area', 'rp3' ),
	'id'				=> 'fact-sheet',
	'class'				=> 'fact-sheet',
	'description'		=> __( 'Where the fact sheet lives.', 'rp3' ),
	'before_widget'		=> '<div id="fact-sheet" class="widget-container fact-sheet %2$s">',
	'after_widget'		=> '</div>',
	'before_title'		=> '',
	'after_title'		=> ''
) );
