<?php

/*
 * Plugin Name: Jetpack Sharing
 * Plugin URI: http://wordpress.org/plugins/jetpack-sharing/
 * Description: Share content with Facebook, Twitter, and many more.
 * Author: Anas H. Sulaiman
 * Version: 2.9.3
 * Author URI: http://ahs.pw/
 * Text Domain: jetpack-sharing
 * Domain Path: /languages/
 * License: GPL2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Module Name: Sharing
 * Module Description: The most super duper sharing tool on the interwebs. Share content with Facebook, Twitter, and many more.
 * Sort Order: 5
 * First Introduced: 1.1
 * Major Changes In: 1.2
 * Requires Connection: No
 * Auto Activate: Yes
 * Module Tags: Social
 */

// E-4 {
define( 'JETPACK_SHARING_VERSION', '2.9.3' );
// }

if ( !function_exists( 'sharing_init' ) )
	include dirname( __FILE__ ).'/sharedaddy/sharedaddy.php';

// E-1 {
/*
add_action( 'jetpack_modules_loaded', 'sharedaddy_loaded' );

function sharedaddy_loaded() {
        Jetpack::enable_module_configurable( __FILE__ );
        Jetpack::module_configuration_load( __FILE__, 'sharedaddy_configuration_load' );
}

function sharedaddy_configuration_load() {
        wp_safe_redirect( menu_page_url( 'sharing', false ) . "#sharing-buttons" );
        exit;
} 
*/
// }

// E-2 {
function jetpack_sharing_load_textdomain() {
	load_plugin_textdomain( 'jetpack-sharing', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'jetpack_sharing_load_textdomain' );
// }

// E-3 {
function jetpack_sharing_settings_link($actions) {
	return array_merge(
		array( 'settings' => sprintf( '<a href="%s">%s</a>', 'options-general.php?page=sharing', __( 'Settings', 'jetpack-sharing' ) ) ),
		$actions
	);
	return $actions;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'jetpack_sharing_settings_link' );
// }

/*
Edits by Anas H. Sulaiman:
E-1 : remove Jetpack specific code
E-2 : load text domain
E-3 : add settings link
E-4 : disconnect from jetpack
*/
