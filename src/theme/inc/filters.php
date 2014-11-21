<?php
/**
 * Custom filters for this theme.
 *
 * @package RP3
 */

if ( ! function_exists( '' ) ) :
/**
 * Customized excerpt return
 */
function rp3_excerpt( $more ) {
	return ' …';
}
endif;
add_filter('excerpt_more', 'rp3_excerpt');
