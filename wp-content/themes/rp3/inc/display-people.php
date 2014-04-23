<?php

function rp3_get_people() {
	// Initialize our return value
	$people = array();

	// Query for users who should appear on the site.
	$people_query = new WP_User_Query( array(
		'meta_key'		=> 'show_on_site',
		'meta_value'	=> true
	) );

	// Build associative array of people
	if ( $people_query->results ) {
		foreach ( $people_query->results as $person ) {
			$id = $person->ID;

			$meta = get_user_meta( $id );

			// Create a separate $display_order array for sorting purposes
			$display_order[] = $meta['display_order'][0];

			$people[$id]['user_login']		= $person->user_login;
			$people[$id]['display_order']	= $meta['display_order'][0];
			$people[$id]['first_name']		= $meta['first_name'][0];
			$people[$id]['last_name']		= $meta['last_name'][0];
			$people[$id]['title']			= $meta['title'][0];
			$people[$id]['email']			= $person->user_email;
			$people[$id]['photo']			= $meta['photo'][0];
			$people[$id]['facebook']		= $meta['facebook'][0];
			$people[$id]['twitter']			= $meta['twitter'][0];
			$people[$id]['linkedin']		= $meta['linkedin'][0];
			$people[$id]['github']			= $meta['github'][0];
			$people[$id]['behance']			= $meta['behance'][0];
			$people[$id]['dribbble']		= $meta['dribbble'][0];
			$people[$id]['instagram']		= $meta['instagram'][0];
			$people[$id]['pinterest']		= $meta['pinterest'][0];

			// If the person doesn't have an uploaded photo, use their
			// gravatar as a fallback
			if ( ! $people[$id]['photo'] ) {
				$people[$id]['photo']		= get_avatar( $id );
			}
		}
	}

	// Sort our $people array by display order
	array_multisort( $display_order, SORT_ASC, $people );

	// Insert spacer blocks into the sorted array
	// $people = array_slice( $people, 0, 3, true ) + array( 'spacer' => true ) + array_slice( $people, 3, count( $people ) - 1, true );
	// $people = array_slice( $people, 0, 7, true ) + array( 'spacer' => true ) + array_slice( $people, 7, count( $people ) - 1, true );
	$people = rp3_get_people_insert_spacer( $people, array( 3, 7, 8, 13, 15 ) );

	return $people;
}

function rp3_get_people_insert_spacer( $array, $positions ) {
	foreach ( $positions as $position ) {
		$array = array_slice( $array, 0, $position, true ) + array( 'spacer' => true ) + array_slice( $array, $position, count( $array ) - 1, true );
		$array = array_values( $array );
	}

	return $array;
}
