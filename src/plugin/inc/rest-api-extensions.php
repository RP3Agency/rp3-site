<?php

/**
 * Extensions to JSON API
 */

define( 'RP3_JSON_PREFIX', 'rp3_json_' );

/**
 * Add pre-dispatch hook to JSON API
 */
function rp3_json_pre_dispatch( $result, $server) {
	return apply_filters( RP3_JSON_PREFIX . 'pre_dispatch', $result, $server );
}
add_filter( 'json_pre_dispatch', 'rp3_json_pre_dispatch', 10, 2 );

/**
 * Add filter hook to Post JSON preparation
 */
function rp3_json_api( $data, $post, $context ) {

	// Invoke filters to extend post data with ACF fields
	if( function_exists( 'get_fields' ) ) {
		$data = apply_filters( RP3_JSON_PREFIX . 'acf_fields' , $data, $post, $context );
	}

	// For each co-author, invoke filter to get co-author meta fields and append to authors array
	if ( function_exists( 'get_coauthors' ) ) {
		$data['authors'] = array();
		$coauthors = get_coauthors( $post['ID'] );
		foreach( $coauthors as $coauthor ) {
			$author_data = array( );
			$data['authors'][] = apply_filters( RP3_JSON_PREFIX . 'coauthor_fields', $author_data, (array) $coauthor );
		}
	}

	return $data;
}
add_filter( 'json_prepare_post', 'rp3_json_api', 10, 3 );

/**
 * Add Co-Author basic data to post
 */
function rp3_json_coauthor_data( $data, $coauthor ) {

	// Pass coauthor type and display name for all records
	$data['type'] = $coauthor['type'];

	// Get display name from record depending on coauthor type
	if ( 'guest-author' == $coauthor['type'] ) {
		$data['display_name'] = $coauthor['display_name'];
	} else {
		$data['display_name'] = get_the_author_meta( 'display_name', $coauthor['ID'] );

		// additional fields for official RP3 authors
		$data['posts_url'] = esc_url( get_author_posts_url( $coauthor['ID'] ) );
		$data['description'] = get_the_author_meta( 'description', $coauthor['ID'] );
	}

	return $data;
}
add_filter( RP3_JSON_PREFIX . 'coauthor_fields', 'rp3_json_coauthor_data', 10, 2 );

/**
 * Add Co-Author social media links to post
 */
function rp3_json_coauthor_social_links( $data, $coauthor ) {

	// skip social links if guest author
	if ( 'guest-author' == $coauthor['type'] ) {
		return $data;
	}

	// build social media links
	$social = array(
		'email' => esc_url( 'mailto:' . get_the_author_meta( 'user_email', $coauthor['ID'] ) ),
		'facebook' => esc_url( get_the_author_meta( 'facebook', $coauthor['ID'] ) ),
		'twitter' => esc_url( get_the_author_meta( 'twitter', $coauthor['ID'] ) ),
		'linkedin' => esc_url( get_the_author_meta( 'linkedin', $coauthor['ID'] ) ),
		'instagram' => esc_url( get_the_author_meta( 'instagram', $coauthor['ID'] ) ),
	);

	return array_merge( $data, $social );
}
add_filter( RP3_JSON_PREFIX . 'coauthor_fields', 'rp3_json_coauthor_social_links', 10, 2 );

/**
 * Add Co-Author photo URLs to post
 */
function rp3_json_coauthor_photos( $data, $coauthor ) {

	// Get coauthor photo source depending on coauthor type
	if ( 'guest-author' == $coauthor['type'] ) {
		$photo = get_post_thumbnail_id( $coauthor['ID'] );
	} else {
		$photo = get_the_author_meta( 'photo', $coauthor['ID'] );
	}

	list( $data['photo_url'] ) = wp_get_attachment_image_src( $photo, 'four_three_small' );
	list( $data['photo_url_2x'] ) = wp_get_attachment_image_src( $photo, 'four_three_small_2x' );

	return $data;
}
add_filter( RP3_JSON_PREFIX . 'coauthor_fields', 'rp3_json_coauthor_photos', 10, 2 );

/**
 * Add filters to the list of valid REST API query vars
 */
function rp3_json_add_filters( $filters ) {

	// List of filters to allow in API
	$allowed = array( 'post__not_in', 'tax_query', 'tag__in' );

	// Merge with current list
	$filters = array_merge( $filters, $allowed );

	return $filters;
}
add_filter( 'json_query_vars', 'rp3_json_add_filters' );

/**
 * Remove sharing plugin filter on excerpts
 */
function rp3_json_remove_excerpt_sharing() {
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_filter( RP3_JSON_PREFIX . 'pre_dispatch', 'rp3_json_remove_excerpt_sharing' );
