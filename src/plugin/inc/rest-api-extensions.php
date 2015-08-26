<?php

/**
 * Extensions to JSON API
 */

define( 'RP3_JSON_PREFIX', 'rp3_json_' );

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
		$coauthors = get_coauthors( $post[ 'ID' ] );
		foreach( $coauthors as $coauthor ) {
			$author_data = array( 'ID' => $coauthor->ID ); //TODO: grab basic author fields here
			$data['authors'][] = apply_filters( RP3_JSON_PREFIX . 'coauthor_fields', $author_data, (array) $coauthor );
		}
	}

	return $data;
}
add_filter( 'json_prepare_post', 'rp3_json_api', 10, 3 );

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
		'user_email' => get_the_author_meta( 'user_email', $coauthor['ID'] ),
		'facebook' => get_the_author_meta( 'facebook', $coauthor['ID'] ),
		'twitter' => get_the_author_meta( 'twitter', $coauthor['ID'] ),
		'linkedin' => get_the_author_meta( 'linkedin', $coauthor['ID'] ),
		'instagram' => get_the_author_meta( 'instagram', $coauthor['ID'] ),
	);

	return array_merge( $data, $social );
}
add_filter( RP3_JSON_PREFIX . 'coauthor_fields', 'rp3_json_coauthor_social_links', 10, 2 );
