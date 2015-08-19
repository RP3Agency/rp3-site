<?php

function rp3_change_post_label() {
	global $menu;
	$menu[5][0] = 'Blog';
	echo '';
}

add_action( 'admin_menu', 'rp3_change_post_label' );
