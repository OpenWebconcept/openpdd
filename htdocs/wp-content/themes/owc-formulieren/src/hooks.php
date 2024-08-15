<?php

declare(strict_types=1);

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
 * Uploads are not protected by default. Let's protect them.
 */
add_filter('gform_require_login_pre_download', function () {
    return true;
}, 10, 0);

/**
 * Add superuser role
 */
add_action('after_switch_theme', function () {
    $role = new App\Roles\Role('superuser');

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
    $role = new App\Roles\Role('editor');

    if (null === $role->getRole()) {
        return null;
    }

    $caps = [];

    $caps = array_merge($caps, $role->getGravityFormsCaps());

    foreach ($caps as $cap) {
        if (! $role->getRole()->has_cap($cap)) {
            $role->addCap($cap);
        }
    }
});

add_action('wp_enqueue_scripts', 'App\Assets\Assets::enqueueScripts');
add_action('enqueue_block_editor_assets', 'App\Assets\Assets::enqueueBlockEditorScripts');

/**
 * A11y: add aria-label to custom logo
 */
add_filter('get_custom_logo', function ($html) {
    $blog_name = get_bloginfo('name');
    $aria_label = 'Home ' . $blog_name;
    $html = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '"', $html);

    return $html;
});
