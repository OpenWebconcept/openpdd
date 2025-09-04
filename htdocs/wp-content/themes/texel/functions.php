<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

add_filter('gform_enable_legacy_markup', '__return_true');

/**
 * Set the theme directory where the mapping option files are situated, for the OWC Prefill plugin.
 */
add_filter('owc_prefill_gravity_forms_theme_dir_mapping_options', function ($value) {
    return __DIR__ . '/templates/owc-prefill/';
}, 10, 1);
