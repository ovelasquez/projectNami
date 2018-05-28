<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'D:\home\site\wwwroot\wp-projectnami\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', ( getenv('ProjectNami.DBName') ? getenv('ProjectNami.DBName') : 'sw_projectnami'));

/** MySQL database username */
define('DB_USER', ( getenv('ProjectNami.DBUser') ? getenv('ProjectNami.DBUser') : 'vil8G6h@'));

/** MySQL database password */
define('DB_PASSWORD', ( getenv('ProjectNami.DBPass') ? getenv('ProjectNami.DBPass') : 'zK219upx'));

/** MySQL hostname */
define('DB_HOST', ( getenv('ProjectNami.DBHost') ? getenv('ProjectNami.DBHost') : 'medc.database.windows.net'));

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
define('AUTH_KEY',         '}F,l`@yGR!~jxMm3m:rPL7QWz;Gh/feNnnTyop4ArHWyV)RgxO=??AfsUI*F-AV,');
define('SECURE_AUTH_KEY',  '~N3q/u?Nqw!CU[OyKz4n}Y_@4=umq&p{+r$d.82|z%*K#tiW1Q$1%V,5#SrJo+9U');
define('LOGGED_IN_KEY',    'p,*(iubZddEoXXhf+f!({W#&Ja#bX_7t;_Po+/}4m rEn0r?dL3(`xTTf[@EaO@s');
define('NONCE_KEY',        '*k.XFLelj!)ry`j;J4QmS>M[M0q_HTw}3.4q<LKM.>;OKIYC]+.o, {,yQcP+OSq');
define('AUTH_SALT',        '5ZbN>j3P +bqOe?E|g!.IsFkz`QiNW4=/5@_q|NZz=axVlh>#*SC1%u|?yk7zK%b');
define('SECURE_AUTH_SALT', '2wqHu}vlw]mnUS^1H[yhUKsW;EWR|(zwU1v8S>/L@TN*wZPBLmV%8.E~ ma;XDm^');
define('LOGGED_IN_SALT',   'e0n-K~I4Z]u-m2g)sh!R-[wp29G  Bfw!v3;.r,YC;_}^Z^0G/N`Km3M/Q%:nCtU');
define('NONCE_SALT',       'NZU^gdst*23H@F{ow|t4m[Y1wB<&=X5a^km2FuFp`+u_X.Ts(z%qV4^4V+ulrZnv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mc_';

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
define('WP_DEBUG', false);



define( 'WP_MEMORY_LIMIT', '96M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
