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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'hHTu|LO=Ok|w3$PaAHp:TW5[LSL-P6|n!fAmC;#@u*tOxKcaWAHL3Dv+~UTy]lL(');
define('SECURE_AUTH_KEY',  'E^*tel]tbV2[JmKNPF+^HO|&sLy<J(`l|@C;]$x4tX:?F4Bf7ZZvd`25)SlpO3U<');
define('LOGGED_IN_KEY',    '>GgU843/1VMBnix OheWzlWK|k?t3HaER)gVrYDgT-p9{$C/3+lCb/xr)X<?F/,J');
define('NONCE_KEY',        '2Bjo19  GEq8b?^1O+38tZ?G%h_.!qZJ!vkuQ#F6qAc]@jf2Q|,K[[u>pfj6GOz+');
define('AUTH_SALT',        'dzmtY VdWF0=4KiJ5$cv&{45HwPj[Q /UG`k=pXUH!64l+)(/M~d:Clq=H6#x0#=');
define('SECURE_AUTH_SALT', 'omq{S=$U5H#7b{$s[V+J5UW6+/!<Ji*#P9pv+db;1k|(]2S,j.;)UG-(W?okA_+ ');
define('LOGGED_IN_SALT',   'ZT[$h2yMD4_AD|aN)]+Y!zhgK8+G?#WV0T^o[9`.BUKr(/+R49WD/-_a<c-B`dN^');
define('NONCE_SALT',       'Po-}Y-jD_v2Le_9n<@pjA}|wzmz1S/!t72~`jeV,tqLG`uK}gs,n[8:wD]_-|m@-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
