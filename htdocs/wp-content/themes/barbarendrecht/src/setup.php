<?php

declare(strict_types=1);

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('barbarendrecht', get_stylesheet_directory() . '/languages/');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
        'primary' => __('Primary Menu', 'barbarendrecht'),
        'primary-mijn-zaken' => __('Mijn Zaken menu', 'openpdd-hoeksche-waard'),
        'footer-bottom'      => __('Footer bottom', 'openpdd-hoeksche-waard'),
    ]);
});
