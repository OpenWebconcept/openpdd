<?php

declare(strict_types=1);

/**
 * Autoload dependencies with Composer
 */
require __DIR__ . '/../vendor/autoload.php';

define('APP_ROOT', realpath(__DIR__ . '/../'));

/**
 * Initialize DotEnv environment variables.
 */
\Dotenv\Dotenv::createImmutable(__DIR__ . '/../')->load();

/**
 * Setup Database Configuration
 */
define('DB_NAME', env('DB_DATABASE'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST'));

define('WP_DEBUG', filter_var(env('WP_DEBUG'), FILTER_VALIDATE_BOOL));
define('WP_DEBUG_DISPLAY', filter_var(env('WP_DEBUG_DISPLAY'), FILTER_VALIDATE_BOOL));
define('WP_DEBUG_LOG', filter_var(env('WP_DEBUG_LOG'), FILTER_VALIDATE_BOOL));
define('SCRIPT_DEBUG', filter_var(env('SCRIPT_DEBUG'), FILTER_VALIDATE_BOOL));

/**
 * Setup secret keys.
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));
define('WP_CACHE_KEY_SALT', env('WP_CACHE_KEY_SALT'));

/**
 * Multisite config.
 */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', env('DOMAIN_CURRENT_SITE'));
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

# Sentry
define('WP_SENTRY_PHP_DSN', env('WP_SENTRY_PHP_DSN'));

# Gravity Forms
define('CROSSPEAK_GRAVITYFORMS_ENCRYPTION_KEY', env('CROSSPEAK_GRAVITYFORMS_ENCRYPTION_KEY', ''));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
    if ((! empty($_SERVER['HTTPS']) && 'off' !== $_SERVER['HTTPS']) || 443 == $_SERVER['SERVER_PORT']) {
        define('WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content');
    } else {
        define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');
    }
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wp/');
}
require_once ABSPATH . 'wp-settings.php';
