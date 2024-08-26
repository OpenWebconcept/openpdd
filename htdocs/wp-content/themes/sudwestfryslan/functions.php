<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return 'Klik hier om in te loggen';
});
