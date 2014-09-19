<?php

function rp3_register_nav_menus() {

	register_nav_menus( array(
		'primary'			=> __( 'Primary Menu', 'rp3' ),
		'about-page'		=> __( 'About Page Submenu', 'rp3' ),
		'footer-social'		=> __( 'Footer Social', 'rp3' ),
		'contact-social'	=> __( 'Contact Page Social', 'rp3' )
	) );
}
add_action( 'init', 'rp3_register_nav_menus' );
