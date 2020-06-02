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
define( 'DB_NAME', 'wordpress5' );

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
define('AUTH_KEY',         '?RgWOn&6+KymaK`vc?UB4#[RW[bo+Xh2ZLf#]G5N@&YZ|+W2G)UC%qiegZyu^>/5');
define('SECURE_AUTH_KEY',  'lzmveiI d5{B|4CC9RAjz_7~:h=lgqdy>C]n->4x{+B|Y@F +6=tw2$B5/-Y,pK[');
define('LOGGED_IN_KEY',    '})3HaE;n#7T=tk#OdFil(P[ms9+D$(6Y/&VC38[be1>Ufh/n;)=jP`CzoGThro$|');
define('NONCE_KEY',        'Tt[4E-_p?spK#(:xakx;B:J; ocGYKuyA6p4>|u~tIF`G(B{F9(=e>-L5^p3OJC7');
define('AUTH_SALT',        'Jl)2OLidu.0Ax=IgVL1;%R)P|d~93G|tp1Od=jNYq]u1;I1?ufQ4$~p+B&6!S_uE');
define('SECURE_AUTH_SALT', 'm_)PvHS4X;q$?[d_4[537+!~P=I:{<sXdXg9niW{|0*/@iS?n;(7:KAWH2~G.RTR');
define('LOGGED_IN_SALT',   'f#J7N.&p<{:5w%s%4zknxNK[_9H@ALaZM_-9Kp(ntikI4!}R&{-AOM$YX/`/bP0V');
define('NONCE_SALT',       'v985qwWa8O;9^|t9t|vfmt>Ei%sk]:cp~)M[`lKrK3N(gLjdh}|E2SCj]%+27+h!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp5_';

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
include_once 'new_config.php';

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
