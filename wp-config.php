<?php
//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'H9shp8K1MzwTB9xdHbEYloJPNvLqGhMwvprI5hBj6q9rT1y3Xj6BpqbUUyN0r2s5');
//END Really Simple Security key

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache



define('WP_AUTO_UPDATE_CORE', 'minor');
 // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'qsaaxmsq_wp820' );
/** MySQL database username */
define( 'DB_USER', 'qsaaxmsq_wp820' );
/** MySQL database password */
define( 'DB_PASSWORD', '.X3p]fl05S(-]6sV' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'U/?}Jss}B@X6yUlbEI~])d[5}mU_2k7XdKFaDo2SD>Wa^dl]9~8Z9<%<`A/ yG(w' );
define( 'SECURE_AUTH_KEY',  '#h^ob-@pH~X*Lx>7o9y1AYz?<>C$kjU~g%lpWGa5R;  F=YTp[l|h{#K,5J-RT9}' );
define( 'LOGGED_IN_KEY',    'rlN<UNkx0>n(uLkT}MWBS>+jPVWrC)tQa]j(vJ*p)*-6v-bY(6)Q!BFcNlq)E8>[' );
define( 'NONCE_KEY',        '*YM[Y+kL=e2^JHQSRxL]d~YSXav b;P3 j|bJ|,zLUc6:33n{2{S)4MVg&O(=@/c' );
define( 'AUTH_SALT',        '{KiS,pbw{N,<`~D_NClrm_TQVL4$.yb/ne&PUa)E{ZB{j*S/G9:sj*tOv4q&1fl|' );
define( 'SECURE_AUTH_SALT', 'g/5Qf%d%HLN8ro}/7 |PNc7f5l_Y^qgM,ZavrmUZ@*1T:=`G)uV k/E/&TMRY _9' );
define( 'LOGGED_IN_SALT',   '!7VYS0#K#cZ z(H$gR&;ii~Dl2ay!WAf2;xK{Tded/(s(M`NyY&1*+y<UC-(>?)E' );
define( 'NONCE_SALT',       '7;4gSB8 B%THZo7!Q~xn~ldlVF<(r3>fk&LE?buSfYbF5;6?WaP=s6Wf~;~k~]L{' );
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'uni_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_HOME', 'https://qsa.az');
define('WP_SITEURL', 'https://qsa.az');

/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';