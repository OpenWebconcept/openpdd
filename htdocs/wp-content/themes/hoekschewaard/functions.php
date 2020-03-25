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

/**
 * Remove Gravity Forms styling
 */
add_filter('pre_option_rg_gforms_disable_css', '__return_true');
add_filter('pre_option_rg_gforms_enable_html5', '__return_true');

/**
 * Change the custom logo URL
 */
add_filter('get_custom_logo', function () {
    $custom_logo_id = get_theme_mod('custom_logo'); // The logo
    $site_url = 'gemeentehw.nl';

    if ($custom_logo_id) {
        // Attr
        $custom_logo_attr = array(
            'class'    => 'custom-logo',
            'itemprop' => 'logo',
        );

        // Image alt
        $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $custom_logo_attr['alt'] = get_bloginfo('name', 'display');
        }

        // Get the image
        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url($site_url),
            wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr)
        );
    }

    // Return
    return $html;
});
