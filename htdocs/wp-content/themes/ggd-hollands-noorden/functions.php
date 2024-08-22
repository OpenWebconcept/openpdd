<?php

declare(strict_types=1);
defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
];

foreach ($includes as $file) {
    if (! $filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'ggd'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

(new GGD\AFAS\AfasServiceProvider());
(new GGD\AFAS\SOAP\SOAPContainer());

add_filter('gform_enable_legacy_markup', '__return_true');
