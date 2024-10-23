<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

add_filter('owc_gravityforms_zaaksysteem_templates_to_validate', function (array $templates) {
    $templates[] = 'template-single-zaak';
    $templates[] = 'template-mijn-zaken';
    $templates[] = 'template-mijn-zaken-main';

    return $templates;
});

add_filter('gform_enable_legacy_markup', '__return_true');
