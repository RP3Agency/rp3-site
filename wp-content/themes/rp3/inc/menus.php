<?php

function rp3_register_nav_menus() {

	register_nav_menus( array(
		'primary-left'		=> __( 'Primary Menu (Left)', 'rp3' ),
		'primary-right'		=> __( 'Primary Menu (Right)', 'rp3' ),
		'header-auxiliary'	=> __( 'Header Auxiliary', 'rp3' )
	) );
}
add_action( 'init', 'rp3_register_nav_menus' );
