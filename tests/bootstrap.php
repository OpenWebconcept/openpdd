<?php declare(strict_types=1);
/**
 * PHPUnit bootstrap file
 */

/**
 * Load dependencies with Composer autoloader.
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Bootstrap WordPress Mock.
 */
\WP_Mock::setUsePatchwork(true);
\WP_Mock::bootstrap();
