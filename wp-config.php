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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rp3agency');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[+-9Wzuyo_e_&8.cN8B|Zrd/VU`ss&|U$ozv&igt_idN(ddz&w)k!cY3[KZvXk*B');
define('SECURE_AUTH_KEY',  '`KM#=|C|+Rrjf?<$3^RX/InK*:4.U->u t2XOa-@qfx~p@a@{:4Y]xtf|LBx;m76');
define('LOGGED_IN_KEY',    'SyhA>j]uobIE:H9hnzZ8aIpf6Xox67Y3!;u~Uwz,ym-oaTEk}D~brg:Z3rvaP{i#');
define('NONCE_KEY',        'jyxQ-iWabigQs+Haxu_3bKG1cDx,04!yR2^T4s/1j7?2WrqnI$3{FyUQ{M-s;EY(');
define('AUTH_SALT',        '!09YN6I6@3/p;VJ-h+H4P^&!xzxuxBn,*y#uo-9rTWOqB$j4e]La}juBn:{i$@,|');
define('SECURE_AUTH_SALT', 'qb(1Y`9fKC#&0NGy$+@`JCwT-Uxg[k^lnR/m(X@2wyW?FU0O3^+oj1iDBX7hH{~J');
define('LOGGED_IN_SALT',   'OVShJ&>%F9]RW5sAVNV+:|%vp`t:1`Amz_I^] Z-{aft[e$j;J.fPT2{{QPJ|#8?');
define('NONCE_SALT',       'PQ71pfXU7([E-H|6eP95NL~0)N-!S9D}u;uY:_jYzz5uU0s~tId6fV@!a.(QoWA;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rp3wp_';

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
define('WP_DEBUG',         true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG',     true);

/**
 * Run Jetpack in development mode
 */
define( 'JETPACK_DEV_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
