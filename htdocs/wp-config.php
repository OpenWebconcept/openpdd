<?php

/**
 * Autoload dependencies with Composer
 */
require __DIR__.'/../vendor/autoload.php';

/**
 * Initialize DotEnv environment variables.
 */
\Dotenv\Dotenv::create(__DIR__ . '/../')->load();

/**
 * Setup Database Configuration
 */
define('DB_NAME', getenv('DB_DATABASE'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));


define('WP_DEBUG', filter_var(getenv('WP_DEBUG'), FILTER_SANITIZE_STRING));
define('WP_DEBUG_DISPLAY', filter_var(getenv('WP_DEBUG_DISPLAY'), FILTER_SANITIZE_STRING));
define('WP_DEBUG_LOG', filter_var(getenv('WP_DEBUG_LOG'), FILTER_SANITIZE_STRING));
define('SCRIPT_DEBUG', filter_var(getenv('SCRIPT_DEBUG'), FILTER_SANITIZE_STRING));

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

define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', getenv('DOMAIN_CURRENT_SITE'));
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/**
 * TWOFAS
 */
define('TWOFAS_LIGHT_CHECK_CONFLICTED_PLUGINS', false);

/**
 * License keys
 */
define('WPMDB_LICENCE', getenv('WPMDB_LICENCE'));
define('META_BOX_KEY', getenv('META_BOX_KEY'));

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '0wc_forms_';

/**
 * Custom content directory
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');

/**
 * If call is made via cli, ignore global $_SERVER variables
 */
if ('cli' !== php_sapi_name()) {
    if ((!empty($_SERVER['HTTPS']) && 'off' !== $_SERVER['HTTPS']) || 443 == $_SERVER['SERVER_PORT']) {
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
