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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pop' );

/** Database username */
define( 'DB_USER', 'pop' );


/** Database password */
define( 'DB_PASSWORD', 'pop' );

/** Database hostname */
define( 'DB_HOST', '157.90.156.100:4535' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '):dxE%R&6zNYU0@jJ[[v4oU!V}LPRPBUPRLgb&(G_^fo6:.JU8w}e=V=uo, ,o[`' );
define( 'SECURE_AUTH_KEY',   'ADUOfkC|5]>;}dB_,e1tQCTfhwjR.wRCgCY4@#f#MGGil(64geKxO6&{44[XNO<<' );
define( 'LOGGED_IN_KEY',     'k[UT8|7$2pK{pS<:6__`L[[wG8I%1+DEB:%tD=?FKu_0;<$G!E|XfiVyu4(ey$3r' );
define( 'NONCE_KEY',         '@KGo*z:ILkUb~Bnp)9|I: -Onm5np[{]X*oh.+7z0sxY[?L:ju8_r:9gbHIzUV:b' );
define( 'AUTH_SALT',         '|N^+q@sn4C9=H_yEdu.JcTJc?vjVkA`a5n@Kp)Ql-T *1AZN6YsBT&Nm,- *WT4^' );
define( 'SECURE_AUTH_SALT',  '=5y^$DF)mAK:h+XCw<FmZ<Y6G5l?i7+ 5[)K_13*=|r##^~08.P,we$}|?jihj?1' );
define( 'LOGGED_IN_SALT',    'd<D4KbLN^Vh7b1a,phwJ<*+ZYRZ}opLG?XcF*IlIbXCyIIdlVcfk5ua?|DvbgdS ' );
define( 'NONCE_SALT',        'DP2wrHwKyKXM%^]-`$Z_h}bW.F3[<^Z;a7[^P &(N%|P-;uh@KCd3yUsBa]z5<T0' );
define( 'WP_CACHE_KEY_SALT', '!%&U:Y03VO[e@r+/,m_A/?AJKJ!yXAKm2kJH7|*WhCIw5n(1l?cnAuz:31V:!H}?' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
