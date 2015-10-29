<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

if ( file_exists( '/var/www/assets/wp-config-local.php' ) ) {
	include( '/var/www/assets/wp-config-local.php' );
}
 
// ** MySQL settings - You can get this info from your web host ** //

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nXbAm>uRPG[[$@3hT*B^^,+dHp V+(31Ep7<x*AHfyKo8N@(|8<pQ!aM^>+]>|;2');
define('SECURE_AUTH_KEY',  '$K}:4]O[+?$h~q9FI*,-ljgF1M_n]P)*c>0!oZoe1j5OY/:m6+xF+4#)hB2F- 8^');
define('LOGGED_IN_KEY',    '+! &MSSDO3S(q:^ :+F=oI~wq*:^#iRNuONxc |}hH;)l-6^_gf>,nY6`uZ#Z0j~');
define('NONCE_KEY',        '}S`b;@5Esa48z,P%,WO6tW;nW4v*;87.}=/DfC~-4UBhrV1u4Fj!AdS%;OlU+@3y');
define('AUTH_SALT',        '^Ejv<N=#m?-s[x6c5LMMd2Y=}}9~cN3<]Go&:mo8Qj!EF#1x5W]H9{5G`Mxb|_)g');
define('SECURE_AUTH_SALT', '[b7_@XL-~4Th)C4aM=HN8R)A@^j8sLhcWbHa{U`}#AzP%c +#<|z6C+z?K|@!%VG');
define('LOGGED_IN_SALT',   'iaxn@9}[/.1k`MKc}Bp1?]WYXI`&52 mN,hT&pp3KZsN{9pX:;I-Ktqn&t:cZ(oC');
define('NONCE_SALT',       '#8O?n3}uy%||E]F`|]:E$1kdu*ND >XoGU^2hn&L{S#G*44~rCA(%:Y&t+y#?;]4');

/**#@-*/

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define('WP_DEBUG',         false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
