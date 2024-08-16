<?php
define( 'WP_CACHE', true );


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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ics' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'S4TQwKzZvWEeCsJ2MMrjmQ64SgL1Bx7NtXMNkhXnrmlDLXSkqjdWPpwEbNlLyv38');
define('SECURE_AUTH_KEY',  'SbUsTErt6QKtVNmnB1jg1gcE9rrCj8NHlkTZEmhgEfre9zlsFRYr1JZikGWVSXqe');
define('LOGGED_IN_KEY',    'mP152o388OIusWUnUHjpDwovCjKgPsD3pMgMo9vLDPZUxJX1BUPgwyaHFt0ulapD');
define('NONCE_KEY',        'qUajIgc1UGTmTJ9eBoI5GGKS2lmyaM6GqM5DK7pSWwaQALGldTf8ZlwSKlcbumK5');
define('AUTH_SALT',        'WErCbNKtf5PFFRImkCeYnZMRKVUnIP6ibF4h7SsAqx6XhJzHbOg8OTWedS11z2Ef');
define('SECURE_AUTH_SALT', 'k4PXOgR5Sj9siZk2kzLh1ufeTpDxNOjPAri27JzVZICVZ7PX5HB8GqxdDikH6rHo');
define('LOGGED_IN_SALT',   'e28UkWMEGsh9BihWWK6x2VlfVtzWHrPrqIIJdZpAzb9lZgviIHXB7WcLpQ7cY97c');
define('NONCE_SALT',       '6TpIEvvImh9DYAmL7qDNGWlbgASqyBcNIMb9hPcUzeUJkOrCL90tD5vFPF29sXu9');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
