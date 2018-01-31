<?php
/**
 * @package WordPress
 */

// Composer
include(dirname( __FILE__ ) . '/vendor/autoload.php');

// MySQL settings //
$devENV = array(
	'127.0.0.1',
	'::1',
	'localhost'
);

if (in_array($_SERVER['HTTP_HOST'], $devENV)) {
    define('WP_ENV', 'local');
}
else {
	define('WP_ENV', 'staging');
}

if (WP_ENV == 'local') {
	define('DB_NAME', '');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
}
else {
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
}

// Salts  @{ https://api.wordpress.org/secret-key/1.1/salt/ } //
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// Content Directories //
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/site' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/site' );
define( 'WPMU_PLUGIN_DIR', dirname( __FILE__ ) . '/site/mu-plugins' );
define( 'WPMU_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/site/mu-plugins' );

// DB Prefix //
$table_prefix  = 'wp_';

// PHP Memory Limit (may need to be defined on server)
define('WP_MEMORY_LIMIT', '128M');

// Server File Permissions
define('FS_CHMOD_FILE', 0644);
define('FS_CHMOD_DIR', 0755);

// WP Debug Mode
define('WP_DEBUG', false);
if (WP_DEBUG) {
	define( 'WP_DEBUG_LOG', true);
	define( 'WP_DEBUG_DISPLAY', true);
	define('WP_ALLOW_REPAIR', true);
	@ini_set('display_errors', 0);
	@ini_set( 'error_reporting', E_ALL ^ E_NOTICE );
	@ini_set('error_log', dirname(__FILE__) . '/site/php-errors.log');
}

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
