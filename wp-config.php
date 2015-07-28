<?php
/**
 * @package WordPress
 */




// MySQL settings //
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASS'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

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
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/app' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/app' );
define( 'WPMU_PLUGIN_DIR', dirname( __FILE__ ) . '/app/mu-plugins' );
define( 'WPMU_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/app/mu-plugins' );

// DB Prefix //
$table_prefix  = 'wp_';

define('WP_DEBUG', false);
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
