<?php
/**
 * Pre get post filters
 *
 * @package RP3
 */

function rp3_pre_get_posts( $query ) {

	if ( ( $query->is_main_query() ) && ( ! is_admin() ) ) :

		// Search Results

		if ( is_search() ) {

			$query->set( 'post_type', 'post' );
			$query->set( 'category__in', array( 2, 7 ) );

		}

		// Author Landing Page

		if ( is_author() ) {

			$query->set( 'post_type', 'post' );
			$query->set( 'category__not_in', array( 25, 7 ) );
			$query->set( 'posts_per_page', -1 );
		}

		// Blog
		// There is no more blog landing page. Instead, any hit to /blog/ will
		// result in the full text of the most recent blog post.

		if ( is_home() ) {
			
			$query->set( 'posts_per_page', 1 );
		}

	endif;
}

add_action( 'pre_get_posts', 'rp3_pre_get_posts' );
