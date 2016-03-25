<?php

/**
 * Custom page titles for Guest Authors with WordPress SEO
 * Returns "[author name], Author at [site name]"
 *
 */
add_filter('wpseo_title', 'my_co_author_wseo_title');
function my_co_author_wseo_title( $title ) {

	// Only filter title output for author pages
	if ( is_author() && function_exists( 'get_coauthors' ) ) {

		$qo = get_queried_object();
		$author_name = $qo->display_name;
		$author_title = get_metadata( 'post', $qo->ID, 'title', true );

		return $author_name . ', ' . $author_title . ' | ' . get_bloginfo('name');
	}

	return $title;
}
