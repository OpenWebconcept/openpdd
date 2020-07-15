<?php defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
    'src/setup.php',
];

foreach ($includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
