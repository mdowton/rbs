<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'rbs');

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
define('AUTH_KEY',         '-*GjO:v82l,W)8+b+ 5deaU7RN$o-mW6*4u_% UA&E<UUiUIoM=~Y+[8w{*&G:=T');
define('SECURE_AUTH_KEY',  'Zycsq6l^}sGM=EwI-lN!`bq3=|/7nnv@WxNR|RA5mommU*.z{T1^N+H6mvOC/uPn');
define('LOGGED_IN_KEY',    'FV2Ylw-XN^D~UKT;Wc/O~:<G+ GC@CIVJ[CpYqm^Gpld`} 1}ssZ%Lb+fWW*Gwl;');
define('NONCE_KEY',        'ggrEqul^zU7Ui4*g/kYMjYRqM1TY@qL0Y@G1wg|-<+3jw=U<TNkx CK|6WFbifvF');
define('AUTH_SALT',        '_!&MB|0bG2h?*R+yx/u8I-s)e11UOC0Gfe: ~d|oRG.@I4F_-(i4?y.Y4&<=+n!w');
define('SECURE_AUTH_SALT', 'FUKRzUi_H@9KwJ[.p=cUkG5HXl/ 4pNKX0~Se?zPXDfHz:fh.#])0oq!{SERVSh ');
define('LOGGED_IN_SALT',   'vV+kit19h4A7%Y-#m1J)Tm+S{<ql-l`IjuN~});se]/ce3L-A&Jyx[`~n;mz6vjF');
define('NONCE_SALT',       '.6ql)V{TYIX|nL]&KDon}P- fj5X4ta|Bg[]$7Dg7j;3|Rg1-+dH!^7gaE+8~A:X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'roof_';

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
