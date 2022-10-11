<?php

declare(strict_types=1);
defined('ABSPATH') || exit;

// PSR autoloader
spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/src/';
    $namespace = str_replace("\\", "/", __NAMESPACE__);
    $className = str_replace("\\", "/", $className);
    $class = $baseDir . (empty($namespace) ? "" : $namespace . "/") . $className . '.php';
    if (file_exists($class)) {
        require_once $class;
    }
});

// Bootstrap application
$includes = [
    'src/Role.php',
    'src/hooks.php',
    'src/setup.php'
];

foreach ($includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'ggd'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

add_filter('gform_enable_legacy_markup', '__return_true');
