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
if ( file_exists( dirname( __FILE__ ) . '/wp-config-production.php' ) ) {
    require( 'wp-config-production.php' );
}else {
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

    /** Environment variable */
    define('WP_ENV', 'local');

    /** Debugging tools */
    define('WP_DEBUG', false);

    /**#@+
     * Authentication Unique Keys and Salts.
     *
     * Change these to different unique phrases!
     * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
     * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
     *
     * @since 2.6.0
     */
    define('AUTH_KEY',         '(vZK+5-^|21<53?B##;NJI!{BLK&-AOcwa>|s *]V|RU#+~*4812sM8/B{{I&hu9');
    define('SECURE_AUTH_KEY',  'P6,Ek:7JA!o6I[4|462!pBG>|cNpT-a3tvH5j!s-puIv-}FgGJx47A%)v^bmiGkJ');
    define('LOGGED_IN_KEY',    '3iTOFH@Z_(0E|@zi%;H!fUp8^K`>~eaR@WjY#{$.9ILB.W+-4!^0N$|cK.AURlCV');
    define('NONCE_KEY',        '~d>Rh%P^*KlgSh?GgDUt/KxSH$Tur^Ji(8[8gNeQ@UFpk.sNo-0:vQ/MF<6{<gV#');
    define('AUTH_SALT',        'uHT3S}>3?-GFo!}I_6AY-+Ub84Pb2!-CJHcq.vsHmR*5[jHF8ZSt{TY[~;8E8n}-');
    define('SECURE_AUTH_SALT', 'beze<sq5=N+J-AN!mnat/u<sr<ytYs?ZxfUYQ[dKU=<ej-0TpYVyj0HG4DC:EgJK');
    define('LOGGED_IN_SALT',   'r0|$2KN.l<U4zo7-k|*9*)}X?,It DXnb}#Fdd^iE|Mui/*W2@-2~<j)i>6GC%aL');
    define('NONCE_SALT',       'vxv)ElwW]JoAHz[-]6JgrA(OKnBLKr*neYPVC|-1P{7}- Sq[XrX}_N%CD }|6/*');

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

    /* That's all, stop editing! Happy blogging. */

    /** Absolute path to the WordPress directory. */
    if ( !defined('ABSPATH') )
    	define('ABSPATH', dirname(__FILE__) . '/');

    /** Sets up WordPress vars and included files. */
    require_once(ABSPATH . 'wp-settings.php');
}
