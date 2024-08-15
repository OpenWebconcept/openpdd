<?php

declare(strict_types=1);

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('openpdd-hoeksche-waard', get_stylesheet_directory() . '/languages/');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');

    /*
     * Add site logo since 4.5
     */
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => ['site-title', 'site-description'],
    ]);

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
        'primary'            => __('Primary Menu', 'openpdd-hoeksche-waard'),
        'primary-mijn-zaken' => __('Mijn Zaken menu', 'openpdd-hoeksche-waard'),
        'footer-bottom'      => __('Footer bottom', 'openpdd-hoeksche-waard'),
    ]);

    $sidebars = [
        [
            'name'        => __('Footer column 1', 'openpdd-hoeksche-waard'),
            'id'          => 'footer-1',
            'description' => '',
            'class'       => '',
        ],
        [
            'name'        => __('Footer column 2', 'openpdd-hoeksche-waard'),
            'id'          => 'footer-2',
            'description' => '',
            'class'       => '',
        ],
        [
            'name'        => __('Footer column 3', 'openpdd-hoeksche-waard'),
            'id'          => 'footer-3',
            'description' => '',
            'class'       => '',
        ],
    ];

    foreach ($sidebars as $sidebar) {
        register_sidebar([
            'name'          => $sidebar['name'],
            'id'            => $sidebar['id'],
            'description'   => $sidebar['description'],
            'class'         => $sidebar['class'],
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        ]);
    }
});

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return "Klik hier om in te loggen";
});
