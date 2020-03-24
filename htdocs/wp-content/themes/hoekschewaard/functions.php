<?php defined('ABSPATH') || exit;


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/assets/dist/css/style.css', [], filemtime(__DIR__));
});

add_action('after_switch_theme', function () {
    $stylesheet = get_option('template');
    if (basename($stylesheet) !== 'templates') {
        update_option('template', $stylesheet . '/templates');
    }
});

// Bootstrap application
$includes = [
    'src/setup.php',
];

foreach ($includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

// GravityForms
add_filter('pre_option_rg_gforms_disable_css', '__return_true');
add_filter('pre_option_rg_gforms_enable_html5', '__return_true');
