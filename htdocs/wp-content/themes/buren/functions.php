<?php

declare(strict_types=1);
defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
];

foreach ($includes as $file) {
    if (! $filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

// Add editor styles
add_theme_support('editor-styles');
