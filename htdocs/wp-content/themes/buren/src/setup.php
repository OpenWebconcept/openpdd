<?php

declare(strict_types=1);

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('openpdd-buren', get_stylesheet_directory() . '/languages/');
});

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return "Klik hier om in te loggen";
});
