<?php

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
});

add_filter('automatic_updates_is_vcs_checkout', '__return_false', 10, 2);
define('FS_METHOD', 'direct');

/**
 * Proper way to enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-name', 'https://www.buren.nl/wp-content/themes/gembur2017/assets/dist/css/style.css');
});

/**
 * Enable REST API
 */
add_filter('config_expander_admin_defaults', function ($defaults) {
    $defaults['DISABLE_REST_API'] = false;
    return $defaults;
});

add_filter('config_expander_rest_endpoints_whitelist', function ($endpoints_whitelist) {

    //remove default root endpoint
    unset($endpoints_whitelist['wp/v2']);

    $endpoints_whitelist['/irma/v1/gf/handle'] = array(
        'endpoint_stub' => '/irma/v1/gf/handle',
        'methods'       => array('POST')
    );
    $endpoints_whitelist['/irma/v1/gf/session'] = array(
        'endpoint_stub' => '/irma/v1/gf/session',
        'methods'       => array('GET')
    );

    return $endpoints_whitelist;
}, 10, 1);
