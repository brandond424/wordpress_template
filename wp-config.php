<?php
/**
 * @package WordPress
 */

// Composer
include(dirname( __FILE__ ) . '/vendor/autoload.php');
$dotenv = new Dotenv\Dotenv(__DIR__, "localhost.env");
$dotenv->load();

// MySQL settings //
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASS'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Salts  @{ https://api.wordpress.org/secret-key/1.1/salt/ } //
define('AUTH_KEY',         'ls5+}?=s~2QZeDJ+*Cb47Dg};|:Cw&iGJW3h?`K+^zm5jtfh8xlSJzS?y#Rn`<8/');
define('SECURE_AUTH_KEY',  '`eD7TGMdtf<0m%`)vu4gOtn77|fS6LZdJ3-j#++I6F<,DGxC%%{:va8&fdmK&u(K');
define('LOGGED_IN_KEY',    'Axd.5NXkhdT`X|]+</Vfiw89BU!hucG=M5ru-%]VT0!X@8`Jm1|9--]t6J?j=^qM');
define('NONCE_KEY',        '!a?{A](:ut%2tV}ROAd3C-?x(R9,y;~idCS}C-oRy3$>j69yaP_XY4Yr/9VtjMW^');
define('AUTH_SALT',        'B&p{mi+oXSoApE|h~^XPL~11s^m>R-E3BTM^6/[.Ib<H<VGJ}Q9$2o@9==|l]z;c');
define('SECURE_AUTH_SALT', '?gW9JaMM.Ai~wMF>oK.x<!H-*9+m t=e3|aMnNuWsgi E$Aru6)+=T]]F# TTcmx');
define('LOGGED_IN_SALT',   '9!b!tWB_9 ^*p!Bw15Ah8.)pky-T]{8A3WH|(%-4S:Jh7p]zC<-0</r9f5$yW ve');
define('NONCE_SALT',       'c`v&71Db^_VdFsL.KOm5c[Z8^}WewIt2EzG!p=Eyi8`Q{@|oC8PC$=-HkPUVXHUR');

// define('AUTH_KEY',         'put your unique phrase here');
// define('SECURE_AUTH_KEY',  'put your unique phrase here');
// define('LOGGED_IN_KEY',    'put your unique phrase here');
// define('NONCE_KEY',        'put your unique phrase here');
// define('AUTH_SALT',        'put your unique phrase here');
// define('SECURE_AUTH_SALT', 'put your unique phrase here');
// define('LOGGED_IN_SALT',   'put your unique phrase here');
// define('NONCE_SALT',       'put your unique phrase here');

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
