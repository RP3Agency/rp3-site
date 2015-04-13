<?php
/**
 * Pre get post filters
 *
 * @package RP3
 */

add_action( 'pre_get_posts', 'rp3_pre_get_posts' );
function rp3_pre_get_posts( $query ) {

	if ( $query->is_main_query() && ! is_admin() && is_search() ) {

		$query->set( 'post_type', 'post' );
		$query->set( 'category__in', array( 2, 7 ) );

	}

	if ( $query->is_main_query() && ! is_admin() && is_author() ) {

		$query->set( 'post_type', 'post' );
		$query->set( 'category__not_in', array( 25, 7 ) );
	}
}
