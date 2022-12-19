<?php

declare(strict_types=1);

add_action('init', function () {
    if (is_admin() or is_rest()) {
        return;
    }

    if (!function_exists('csp_nonce')) {
        return;
    }

    $nonceScript = csp_nonce('script');
    $nonceStyle = csp_nonce('style');

    ob_end_clean();
    ob_start();
    add_action('shutdown', function () use ($nonceScript, $nonceStyle) {
        $content = ob_get_clean();
        echo App\Security\CSP::make($content, $nonceScript, $nonceStyle)->add();
    }, 0);
});

add_action('send_headers', function () {
    \Bepsvpt\SecureHeaders\SecureHeaders::fromFile(APP_ROOT . '/config/secure-headers.php')->send();
});

function is_rest()
{
    $prefix = rest_get_url_prefix();
    if (
        defined('REST_REQUEST') && REST_REQUEST // (#1)
        || isset($_GET['rest_route']) // (#2)
        && strpos(trim($_GET['rest_route'], '\\/'), $prefix, 0) === 0
    ) {
        return true;
    }
    // (#3)
    global $wp_rewrite;
    if (null === $wp_rewrite) {
        $wp_rewrite = new WP_Rewrite();
    }

    // (#4)
    $rest_url = wp_parse_url(trailingslashit(rest_url()));
    $current_url = wp_parse_url(add_query_arg([]));
    $current_url_path = $current_url['path'] ?? '';
    return (strpos($current_url_path, $rest_url['path'], 0) === 0);
}

/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and
 * avoids many potential problems.
 *
 * Values are constants set in wp-config.php
 */
add_action('phpmailer_init', function (\PHPMailer\PHPMailer\PHPMailer $phpmailer) {
    if (in_array(env('APP_ENV'), ['production'])) {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'form01.yard.nl';
        $phpmailer->Port = 25;
    }
});

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

add_action('init', function () {
    $labels = [
        'name'              => _x('Owner', 'taxonomy general name', 'openpdd-hoeksche-waard'),
        'singular_name'     => _x('Owner', 'taxonomy singular name', 'openpdd-hoeksche-waard'),
        'search_items'      => __('Search owners', 'openpdd-hoeksche-waard'),
        'all_items'         => __('All owners', 'openpdd-hoeksche-waard'),
        'parent_item'       => __('Parent owner', 'openpdd-hoeksche-waard'),
        'parent_item_colon' => __('Parent owner:', 'openpdd-hoeksche-waard'),
        'edit_item'         => __('Edit owner', 'openpdd-hoeksche-waard'),
        'update_item'       => __('Update owner', 'openpdd-hoeksche-waard'),
        'add_new_item'      => __('Add new owner', 'openpdd-hoeksche-waard'),
        'new_item_name'     => __('New owner name', 'openpdd-hoeksche-waard'),
        'menu_name'         => __('Owner', 'openpdd-hoeksche-waard'),
    ];

    register_taxonomy('form-owner', 'page', [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => false,
        'show_in_rest'      => true,
    ]);
    register_taxonomy_for_object_type('category', 'page');
});

add_action('init', function () {
    $labels = [
        'name'              => _x('Link', 'taxonomy general name', 'openpdd-hoeksche-waard'),
        'singular_name'     => _x('Link', 'taxonomy singular name', 'openpdd-hoeksche-waard'),
        'search_items'      => __('Search Links', 'openpdd-hoeksche-waard'),
        'all_items'         => __('All Links', 'openpdd-hoeksche-waard'),
        'parent_item'       => __('Parent Link', 'openpdd-hoeksche-waard'),
        'parent_item_colon' => __('Parent Link:', 'openpdd-hoeksche-waard'),
        'edit_item'         => __('Edit Link', 'openpdd-hoeksche-waard'),
        'update_item'       => __('Update Link', 'openpdd-hoeksche-waard'),
        'add_new_item'      => __('Add new Link', 'openpdd-hoeksche-waard'),
        'new_item_name'     => __('New Link name', 'openpdd-hoeksche-waard'),
        'menu_name'         => __('Link', 'openpdd-hoeksche-waard'),
    ];

    register_taxonomy('form-links', 'page', [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => false,
        'show_in_rest'      => true,
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/assets/dist/frontend.css', [], filemtime(__DIR__));
    wp_enqueue_script('child-theme-script', get_template_directory_uri() . '/assets/dist/frontend.js', ['jquery'], filemtime(__DIR__), true);
});

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script('theme-blocks-js', get_stylesheet_directory_uri() . '/assets/dist/editor.js', [], filemtime(__DIR__));
    wp_enqueue_style('theme-blocks-css', get_stylesheet_directory_uri() . '/assets/dist/editor.css', [], filemtime(__DIR__));
});

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/8442ade4bd.js', [], null, true);
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
    }

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

add_action('wp_default_scripts', function ($scripts) {
    if (!is_admin() && !empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

if (class_exists(\GF_Fields::class)) {
    \GF_Fields::register(new HW\Gravityforms\Fields\HWCodesValidation());
}
add_filter('gform_export_fields', [HW\Gravityforms\Export::class, 'modifyHeading'], 10, 1);
add_filter('gform_export_field_value', [HW\Gravityforms\Export::class, 'modifyValue'], 10, 4);

add_filter('gform_field_groups_form_editor', function ($field_groups) {
    $field_groups['hw_fields'] = [
        'name'   => 'hw_fields',
        'label'  => 'Gemeente Hoeksche Waard velden',
        'fields' => []
    ];
    return $field_groups;
});

\add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-core', 'https://code.jquery.com/ui/1.13.2/jquery-ui.min.js', ['jquery'], '1.13.2', 1);
    wp_enqueue_script('jquery-ui-core');
    wp_script_add_data('jquery-ui-core', ['integrity', 'crossorigin'], ['sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==', 'anonymous']);
});
