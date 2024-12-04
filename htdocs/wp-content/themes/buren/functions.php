<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

add_filter('owc_gravityforms_zaaksysteem_templates_to_validate', function ($templates) {
    $templates[] = 'template-single-zaak';
    $templates[] = 'template-mijn-zaken';
    $templates[] = 'template-mijn-zaken-main';

    return $templates;
});

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return 'Klik hier om in te loggen';
});

/**
 * Buren uses an ip-address instead of a domain in the 'zaaksysteem' configuration.
 * This causes the SSL verification to fail, this filter disables it.
 */
add_filter('owc_gravityforms_zaaksysteem_disable_ssl_verification', '__return_true');
