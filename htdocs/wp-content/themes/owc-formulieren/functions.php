<?php defined('ABSPATH') || exit;

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

add_action('after_switch_theme', function () {
    $stylesheet = get_option('template');
    if ('templates' !== basename($stylesheet)) {
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

add_action('init', function () {
    if (null === get_role('superuser')) {
        add_role('superuser', 'Super-User', [
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
            'gravityforms_create_forms'         => true,
            'gravityforms_delete_forms'         => true,
            'gravityforms_edit_forms'           => true,
            'gravityforms_preview_forms'        => true,
            'gravityforms_view_entries'         => true,
            'gravityforms_edit_entries'         => true,
            'gravityforms_delete_entries'       => true,
            'gravityforms_view_entry_notes'     => true,
            'gravityforms_edit_entry_notes'     => true,
            'wpseo_bulk_edit'                   => true,
            'wpseo_manage_options'              => true,
            'edit_yard_options'                 => true,
        ]);

        return;
    }
});
