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
define('DB_NAME', 'roofandb_rbs');

/** MySQL database username */
define('DB_USER', 'roofandb_crockf');

/** MySQL database password */
define('DB_PASSWORD', 'marketing01');

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
define('AUTH_KEY',         'VF]W|M]tMcB:7>nnG#OMSrSb$4=kTa(+T|,<-x11^j-tZU$/y<m#w#DXxJYH4Z??');
define('SECURE_AUTH_KEY',  'y4 ].)CQ_p38o$,bOFn{5|r-y]`EZ4+U02*P~criBIv8a-]=5r^dS 5mU=-,}3B<');
define('LOGGED_IN_KEY',    's0=I(6xhwtoR~b>4K>yA;Ei f*^tI3|*a2e|C?ai~kOG=^T%7wr:})xr_T$V;t5{');
define('NONCE_KEY',        'H`Y*^]!w7_UL<, s9?Vwv7v.qhrrDqunsGW1zvo(]L04Rs2AB/F`ggaVa3Qb?O|i');
define('AUTH_SALT',        'QYTf`RqK|Veu45%Qv54[a>3#7iw]kxeS$Fe&8[A<Ucd[_X?Z]0T[uAj4<-B6JOg|');
define('SECURE_AUTH_SALT', '[o_[+%+KR>8 B|?xrT+BT(xLL-6+Db6gb?L|HIqI)%biB)U20q$E0t+:Q>xC+B!`');
define('LOGGED_IN_SALT',   'PFc~1@=hPPO3;z~~9-yA#Sq,$hZ-fXM(+hLhe*uv/4*L!J+5.-Ni`%>1eLX@w8.M');
define('NONCE_SALT',       ':$)kJXT+@|L*6~;goK1Zh#7+a ]@|UGV!;<w$-C8)SYM0@_kBt_^j1XhA2g9ScXW');

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
