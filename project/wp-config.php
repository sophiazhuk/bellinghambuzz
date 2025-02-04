<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'prjdatabase' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         ';0] s98A.GeA)<&nrJ.FBf0_|7<r,r[)f3G4n[:~2*%C 9}w&Fea=z;~2+,&K;dl' );
define( 'SECURE_AUTH_KEY',  'e(R?~L^Km:)>7/&-OI tK`].(o=~@m!uNrJt2z{wQ+|[%`@N_e~|J!eD`NyaP)^E' );
define( 'LOGGED_IN_KEY',    '3~abJ0zPr!#Kks`aP@~p!aXxI2jGl87_e)/6_::I$FE#|trM%EMLec846|Wtllw<' );
define( 'NONCE_KEY',        '0xtRXc %:iAl!GRKb;F2LO8dfbi7PK*tt.Buch:8!BHGJAJ*ptUX0%+9$y2eb][w' );
define( 'AUTH_SALT',        '^&o;ieX*>Kpw~$]_!eJ,7CK#V@h3FcTQs$F<TZtgS82W}2z1-+dIr#&pDL8Qnc_I' );
define( 'SECURE_AUTH_SALT', '8TWlJ5n=BJubh45.c}Q?-|=SDX)Zc*C@>?j#95Jpey)DE>l]>HmgRJtV7tsArMhR' );
define( 'LOGGED_IN_SALT',   ']=iSQ(Q.rIaoJ??]=)ePS^N!N:)8HZR>MQRQuw6[PcpG8@]M U]yd[L9z]Fl|iHJ' );
define( 'NONCE_SALT',       '2TWIH{COF&2# p$yXu8D~G4%v]-m@d&&D~$hzp7mUhf)>:?)HRn)2g+7dO28n;FT' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
