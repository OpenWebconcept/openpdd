<?php

declare(strict_types=1);

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('openpdd-sudwest-fryslan', get_stylesheet_directory() . '/languages/');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
        'primary' => __('Primary Menu', 'openpdd-buren'),
    ]);
});

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return "Klik hier om in te loggen";
});
