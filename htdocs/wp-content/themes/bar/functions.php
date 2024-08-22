<?php

declare(strict_types=1);
defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
];

foreach ($includes as $file) {
    if (! $filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'bar'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

add_filter('gform_enable_legacy_markup', '__return_true');
