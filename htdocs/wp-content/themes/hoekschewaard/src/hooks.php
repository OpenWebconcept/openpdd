<?php

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

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/assets/dist/css/style.css', [], filemtime(__DIR__));
});

add_action('after_switch_theme', function () {
    $stylesheet = get_option('template');
    if ('templates' !== basename($stylesheet)) {
        update_option('template', $stylesheet . '/templates');
    }
});

/**
 * Remove Gravity Forms styling
 */
add_filter('pre_option_rg_gforms_disable_css', '__return_true');
add_filter('pre_option_rg_gforms_enable_html5', '__return_true');

add_filter('gform_get_form_filter', function ($form_string, $form) {
    // $form_string = str_replace('gform_wrapper', 'gform_wrapper rs_preserve', $form_string);
    return $form_string;
}, 10, 2);

/**
 * Change the custom logo URL
 */
add_filter('get_custom_logo', function () {
    $custom_logo_id = get_theme_mod('custom_logo'); // The logo
    $site_url = 'gemeentehw.nl';

    if ($custom_logo_id) {
        // Attr
        $custom_logo_attr = [
            'class'    => 'custom-logo',
            'itemprop' => 'logo',
        ];

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

require_once get_stylesheet_directory() . '/inc/Role.php';

/**
 * Add superuser role
 */
add_action('init', function () {
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
add_action('init', function () {
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

add_filter('script_loader_tag', 'add_integrity_crossorigin', 10, 3);
add_filter('style_loader_tag', 'add_integrity_crossorigin', 10, 4);

/**
 * Add integrity and crossorigin parameters to resources.
 *
 * Add integrity and crossorigin parameters to script and link resources
 * when the values are set via wp_script_add_data or wp_style_add_data.
 *
 * wp_script_add_data( 'script-handle', 'integrity', 'sha384-sDc5PYnGGjKkmKOlkzS+YesGwz4SwiEm6fhX1vbXuVxeS6sSooIz0V3E7y8Gk2CB' );
 * wp_script_add_data( 'script-handle', 'crossorigin', 'anonymous' );
 *
 * wp_style_add_data( 'style-handle', 'integrity', 'sha384-5N3soZvYZ/q8LjWj8vDk5cHod041te75qnL+79nIM6NfuSK5ZJLu5CE6nRu6kefr' );
 * wp_style_add_data( 'style-handle', 'crossorigin', 'anonymous' );
 *
 * @global \WP_Scripts $wp_scripts The global WP_Scripts object, containing registered scripts.
 * @global \WP_Styles $wp_styles The global WP_Styles object, containing registered styles.
 *
 * @param string $tag The filtered HTML tag.
 * @param string $handle The handle for the registered script/style.
 * @param string $src The resource URL.
 * @param string $media Optional. The style media value. Equal to null when filtering the script tag.
 * @return string The filtered HTML tag.
 */
function add_integrity_crossorigin(string $tag, string $handle, string $src, string $media = null)
{
    global $wp_scripts, $wp_styles;

    if (null === $media) {
        $tag_name = 'script';
        $resource_object = $wp_scripts;
    } else {
        $tag_name = 'link';
        $resource_object = $wp_styles;
    }

    if (!empty($resource_object->registered[$handle]->extra['integrity'])) {
        if (preg_match('/integrity="[^"]*"/', $tag, $match)) {
            $tag = str_replace($match[0], 'integrity="' . esc_attr($resource_object->registered[$handle]->extra['integrity']) . '"', $tag);
        } else {
            $tag = str_replace('<' . $tag_name . ' ', '<' . esc_attr($tag_name) . ' integrity="' . esc_attr($resource_object->registered[$handle]->extra['integrity']) . '" ', $tag);
        }
    }

    if (!empty($resource_object->registered[$handle]->extra['crossorigin'])) {
        if (preg_match('/crossorigin="[^"]*"/', $tag, $match)) {
            $tag = str_replace($match[0], 'crossorigin="' . esc_attr($resource_object->registered[$handle]->extra['crossorigin']) . '"', $tag);
        } else {
            $tag = str_replace('<' . $tag_name . ' ', '<' . esc_attr($tag_name) . ' crossorigin="' . esc_attr($resource_object->registered[$handle]->extra['crossorigin']) . '" ', $tag);
        }
    }

    return $tag;
}

add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.5.1.min.js', [], '3.5.1', false); // jQuery v3
    wp_script_add_data('jquery', 'integrity', 'sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=');
    wp_script_add_data('jquery', 'crossorigin', 'anonymous');
});
