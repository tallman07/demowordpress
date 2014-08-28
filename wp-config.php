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
define('DB_NAME', 'wordpres_3.9.1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'p|$|*+8`0/||E|0@37B&INX_|hdKnnf3A;%iZbKi}B7GdqasWol-.@<Tavf{wrf&');
define('SECURE_AUTH_KEY',  '[4WKo[Lq 8!A_a/~F:eC*cE60+Lxz)Li,f/iLPFbSHl0w&$|*zF_PELYd4+|_[Jc');
define('LOGGED_IN_KEY',    '68d;-6/-gA(FD2b5}4Ub+r{cz}i#f-U8`|v_-*`7JCp+0I66Z<m4I/U{e,Uo-|Ym');
define('NONCE_KEY',        '&nj/6F^ SY(lwDZr/^OcU>5pZdtZE6:/%KD(<d.Cqi@-tn1Gd]{K=ao0hAw-~-bm');
define('AUTH_SALT',        '-n|h%n;5KF5a~?df@PwE-(j8leb{W(|i%|1:Vhz!>+ulN!4O=IK9p*J}L+2:BiPg');
define('SECURE_AUTH_SALT', 'j?y<nyjv&D,,1,ROFLz/Q8:Vi,jYhh<:cgOOaWPx^sO.XjSAfT?:|;}>e+v *#4O');
define('LOGGED_IN_SALT',   '|;W#oEAQ+_W_,qk#+%9aHU3]Kt_USuUtkMwb:|tTQl&w`W<tFtGSe#jW#HvyZEh^');
define('NONCE_SALT',       ')K:^Hz4w$]S?Jv>GW2+5VHY!l!_1g@^61Y:3=]y4+@N#m;5Z>c0^L83f}[;Qz+)8');

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
