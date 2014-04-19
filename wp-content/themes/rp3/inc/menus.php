<?php


function rp3_register_nav_menus() {

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rp3' ),
		'header_aux' => __( 'Header Auxiliary', 'rp3' )
	) );
}
add_action( 'init', 'rp3_register_nav_menus' );
