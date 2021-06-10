<?php
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
define( 'DB_NAME', 'topupdeal' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '>R0$@5;OqU7UQ~(hjmO%_tT@:eN(y8=3%4nzTkr4B]+ps/.53UnJ[MWDJP?=c/yD' );
define( 'SECURE_AUTH_KEY',  '!`1xAw*;+cXpE{1}(cQduRL_*7Jq yUHiqqAw8Q*L{ug#[VvkPGHH?YLv1x )r?o' );
define( 'LOGGED_IN_KEY',    'A9^PHh_hiz%JVZ@f[3e{;Af10ZsC-{1%uFb5kaX:?jw&3<7A<.kyDm@6:ATkafEM' );
define( 'NONCE_KEY',        'vwAZx:^?KH>xqFLZOIjP#TVC1YXC|UWFGkdXdb?xMw9-O/oDR28s;Ls_NFl/a]!N' );
define( 'AUTH_SALT',        ' EQ1.mngw>)SD%FlNC~X PBI9,P]+(Z11&mEiHf1U/PQQ?zfBK`<fL]iiGKAxBJ2' );
define( 'SECURE_AUTH_SALT', '.d5hJLAqhY(OZN]m3tI`=H$o=R`,=lx|:7`$=+BMpJ>d$|>O4/!2dW|nnqTZ}_WX' );
define( 'LOGGED_IN_SALT',   'TB]&9txH=s|H/T]T`D$aHBx:&22CaxxeTe6 _dnC1^b^#{7> )DGsrcH_s%E>ztA' );
define( 'NONCE_SALT',       '!0AHaIN-i/H-4[Z-SUN__dGD0u~udt)d5Y`/V9TbsT5)CUUr&_>HK(UDdpFLju3+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
