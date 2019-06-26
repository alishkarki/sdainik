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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sdainik' );

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
define( 'AUTH_KEY',         ',EdmWtMu4PaMr[CQ}qtOq`2i`hsK?NBN%N!MD}$M1@[q%?2+G j8fx;?uf7dZ!{w' );
define( 'SECURE_AUTH_KEY',  'I$P=cV?Rc*b?l5O!rV]0DE]x`^t/Og`#U>dA{d]E8h<26flO%k0VSwPB7KJxpW/&' );
define( 'LOGGED_IN_KEY',    '#DVBnPe1P[8kyR%P4e;Rvdb*Pa%rm)s*(iVaf-%duUj4?~@6B:]Hc14{C!$bZh+e' );
define( 'NONCE_KEY',        'zD?i~Y },UEC$i^7s2>O`%!CuAitlrw=+8|{*wn7ZJ2|26ny1sgX,I>aB~r&oE;2' );
define( 'AUTH_SALT',        'Jto(7>DRhK<%kRqsf=yi;vJlQhH vREx2nQ^l/Y%r]nh{IOD;X,TmdZwDeI;84hJ' );
define( 'SECURE_AUTH_SALT', '>)gqZUK]fL+R+?3&a=MY3hsFzA*?`CA<Q/@KGoBpAp/!^k;KL~ePF0yk_:x<tJoc' );
define( 'LOGGED_IN_SALT',   'Vnu]GRGv3F.xZMD.8 `NLm*&U2o{qOjZ/ )R~V#)#hK!aoUI}Z;aC9SdOhIXvUaE' );
define( 'NONCE_SALT',       'PT[AAUX;0~i8!*,XfP[8rI/q%GJXV.MXmj(J%S%BpjM](Rk65vqHMhzl%s.sjzan' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sd_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
