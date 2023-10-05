<?php

declare(strict_types=1);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress detects theme in themes/theme-name
 * 2. We tell WordPress that the theme is actually in themes/theme/path-to-configured-templates-directory
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/theme
 *
 * We do this so that the Template Hierarchy will look in themes/theme/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/theme
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/theme
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/theme
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/theme
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/theme/templates
 */
add_filter('template', function ($stylesheet) {
    return dirname($stylesheet);
});

/**
 * Remove Gravity Forms styling
 */
add_filter('pre_option_rg_gforms_disable_css', '__return_true');
add_filter('pre_option_rg_gforms_enable_html5', '__return_true');

/**
 * Change the validation error message of the Gravity Forms Real Time Validation Plugin
 */
add_filter('lv_default_error_messages', function ($default_messages) {
    $translation = 'Dit veld is verplicht.';
    $new_messages = [];

    foreach ($default_messages as $key => $value) {
        $new_messages[$key] = $translation;
    };

    return $new_messages;
});

/**
 * Overrides the number of days until incomplete submissions are purged.
 */
add_filter('gform_incomplete_submissions_expiration_days', function ($expiration_days) {
    $expiration_days = 7;
    return $expiration_days;
});

/**
 * Add superuser role
 */
add_action('after_switch_theme', function () {
    $role = new Role('superuser');

    if (null === $role->getRole()) {
        $caps = [
            /*
             * Default Capabilities
             */
            'edit_dashboard'            => true,
            'edit_files'                => true,
            'export'                    => false,
            'import'                    => false,
            'manage_links'              => false,
            'manage_options'            => false,
            'moderate_comments'         => true,
            'read'                      => true,
            'unfiltered_html'           => true,
            'update_core'               => false,
            'upload_files'              => true,
            'edit_posts'                => true,
            'edit_others_posts'         => true,
            'publish_posts'             => true,
            'read_private_posts'        => true,
            'delete_posts'              => true,
            'delete_private_posts'      => true,
            'delete_published_posts'    => true,
            'delete_others_posts'       => true,
            'edit_private_posts'        => true,
            'edit_published_posts'      => true,
            'edit_pages'                => true,
            'edit_others_pages'         => true,
            'publish_pages'             => true,
            'read_private_pages'        => true,
            'delete_pages'              => true,
            'delete_private_pages'      => true,
            'delete_published_pages'    => true,
            'delete_others_pages'       => true,
            'edit_private_pages'        => true,
            'edit_published_pages'      => true,
            'manage_categories'         => true,
            'delete_themes'             => false,
            'edit_theme_options'        => true,
            'edit_themes'               => false,
            'install_themes'            => false,
            'switch_themes'             => false,
            'update_themes'             => false,
            'activate_plugins'          => false,
            'delete_plugins'            => false,
            'edit_plugins'              => false,
            'install_plugins'           => false,
            'update_plugins'            => false,
            'create_users'              => true,
            'delete_users'              => true,
            'edit_users'                => true,
            'list_users'                => true,
            'promote_users'             => true,
            'remove_users'              => true,

            /*
             * Custom Capabilities
             */
            'wpseo_bulk_edit'           => true,
            'wpseo_manage_options'      => true,
            'edit_yard_options'         => true,
        ];

        $caps = array_merge($caps, $role->getGravityFormsCapsKeyValue());

        $role->addRole('Super-user', $caps);
    }
});

/**
 * Add caps to editor role
 */
add_action('after_switch_theme', function () {
    $role = new Role('editor');

    if (null === $role->getRole()) {
        return null;
    }

    $caps = [];

    $caps = array_merge($caps, $role->getGravityFormsCaps());

    foreach ($caps as $cap) {
        if (!$role->getRole()->has_cap($cap)) {
            $role->addCap($cap);
        }
    }
});

add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');

    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1', false); // jQuery v3
    wp_enqueue_script('jquery');
    wp_script_add_data('jquery', ['integrity', 'crossorigin'], ['sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=', 'anonymous']);
});

add_action('wp_enqueue_scripts', 'App\Assets\Assets::enqueueScripts');
add_action('enqueue_block_editor_assets', 'App\Assets\Assets::enqueueBlockEditorScripts');

/**
 * The following code is used to update certain libraries to their latest version.
 */
add_action('wp_enqueue_scripts', function () {
    // jQuery core.
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');

    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1', false); // jQuery v3
    wp_enqueue_script('jquery');

    // jQuery UI Core.
    wp_deregister_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-core', 'https://code.jquery.com/ui/1.13.2/jquery-ui.min.js', ['jquery'], '1.13.2', 1);
    wp_enqueue_script('jquery-ui-core');
});

/**
 * Add integrity and crossorigin attributes to CDN scripts.
 */
function theme_script_loader_tag($tag, $handle)
{
    $scripts_to_load = [
      [
        ('name')      => 'jquery',
        ('integrity') => 'sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs',
      ],
      [
        ('name')      => 'jquery-ui-core',
        ('integrity') => 'sha384-4D3G3GikQs6hLlLZGdz5wLFzuqE9v4yVGAcOH86y23JqBDPzj9viv0EqyfIa6YUL',
      ]
    ];

    $key = array_search($handle, array_column($scripts_to_load, 'name'));
    if (false !== $key) {
        $tag = str_replace('></script>', ' integrity=\'' . $scripts_to_load[$key]['integrity'] . '\' crossorigin=\'anonymous\'></script>', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'theme_script_loader_tag', 10, 2);
