<?php

/**
 * Autoload dependencies with Composer
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Initialize DotEnv environment variables.
 */
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->overLoad();

/**
 * Setup Database Configuration
 */
define('DB_NAME', getenv('DB_DATABASE'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST', 'localhost'));

/**
 * Elasticsearch instance
 */
define('EP_HOST', getenv('EP_HOST'));

define('WP_REDIS_HOST', getenv('REDIS_HOST'));
define('WP_REDIS_DISABLED', getenv('WP_REDIS_DISABLED', false));

define('WP_DEBUG', getenv('WP_DEBUG', false));
define('WP_DEBUG_DISPLAY', getenv('WP_DEBUG_DISPLAY', false));
define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG', false));
define('SCRIPT_DEBUG', getenv('SCRIPT_DEBUG', false));

/**
 * Setup secret keys.
 */
define('AUTH_KEY', getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('NONCE_KEY'));
define('AUTH_SALT', getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('NONCE_SALT'));
define('WP_CACHE_KEY_SALT', getenv('WP_CACHE_KEY_SALT'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** License key of WP Migrate DB Pro */
define('WPMDB_LICENCE', getenv('WPMDB_LICENCE'));

define('ES_INSTANCE', getenv('ES_INSTANCE'));
define('PORTAL_URL', getenv('PORTAL_URL'));
define('PORTAL_PDC_SLUG', getenv('PORTAL_PDC_SLUG'));

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '0wc_pdc_';

/**
 * Custom content directory
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');

/**
 * If call is made via cli, ignore global $_SERVER variables
 */
if ('cli' !== php_sapi_name()) {
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        define('WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content');
    } else {
        define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');
    }
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wp/');
}
require_once ABSPATH . 'wp-settings.php';
