<?php

declare(strict_types=1);

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('barbarendrecht', get_stylesheet_directory() . '/languages/');

});
