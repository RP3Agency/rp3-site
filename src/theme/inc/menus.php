<?php

function rp3_register_nav_menus() {

	register_nav_menus( array(
		'primary'			=> __( 'Primary Menu', 'rp3' ),
		'footer-social'		=> __( 'Footer Social', 'rp3' ),
		'contact-social'	=> __( 'Contact Page Social', 'rp3' ),
		'auxiliary'			=> __( 'Auxiliary Menu', 'rp3' )
	) );
}
add_action( 'init', 'rp3_register_nav_menus' );
