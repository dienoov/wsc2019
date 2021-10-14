<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', '2019_cms' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'P2r[Rd+*?(A}}DnI~*GJ_m1{d7hBR;>73.t]6#PFA^!T=T+{l7%^?6l5&:4]Oe*)' );
define( 'SECURE_AUTH_KEY',  'H*qY0nP/-%$QOFJ;?5pt~ PSn,nS!`-I(/t*hq6d;m A$D`[8DrHd.L|L.g@yw}o' );
define( 'LOGGED_IN_KEY',    'ja{Qi5Mxo|=vT2oyGhZWt-Je&Ciqw?4FBk(NQk8azW^WshN/k@z9Je3g%{kp}vmf' );
define( 'NONCE_KEY',        ']GIZBFm8(VIkJ<OR3J$|UQ-|s KS[ +-OpF*:HWYe.ME==OQc3@b!wmx/l 7fsaL' );
define( 'AUTH_SALT',        'E9cj6C!nP;@k/#<7DMaSoAb(Br:7P!m!yiEE%d)-Qb9dbJW1NktVJR4,K@S^>{fc' );
define( 'SECURE_AUTH_SALT', 'Bqyx!C/r}w9I~-}(?z.(Omb)-_mL$UQ*aL+cVybGo)<J @}ZV{1nO(~7J31VKl%o' );
define( 'LOGGED_IN_SALT',   '7Cdw!F$R{9VV6N:q%NKOs;PFtyjTak;yT`}&:x|D0]2sH|!eXm-kz31;J}L#C7n^' );
define( 'NONCE_SALT',       'e R_.$a_G`JBe-@MJF0Zi8|@C)52Ku7egok5D_`eR3jMe}EX srfe-e<hj|5b##j' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
