<?php

declare(strict_types=1);

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Yard startertheme, use a find and replace
     * to change 'yard-startertheme' to the name of your theme in all the template files
     */
    load_theme_textdomain('yard-startertheme', get_template_directory() . '/languages');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
        'primary' => __('Primary Menu', 'yard-startertheme'),
        'primary-mijn-zaken' => __('Mijn Zaken menu', 'yard-startertheme'),
    ]);
});
