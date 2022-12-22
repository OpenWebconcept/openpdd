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
    \Bepsvpt\SecureHeaders\SecureHeaders::fromFile(APP_ROOT .'/config/secure-headers.php')->send();
});

function is_rest()
{
    $prefix = rest_get_url_prefix();
    if (defined('REST_REQUEST') && REST_REQUEST // (#1)
        || isset($_GET['rest_route']) // (#2)
            && strpos(trim($_GET['rest_route'], '\\/'), $prefix, 0) === 0) {
        return true;
    }
    // (#3)
    global $wp_rewrite;
    if (null === $wp_rewrite) {
        $wp_rewrite = new WP_Rewrite();
    }

    // (#4)
    $rest_url = wp_parse_url(trailingslashit(rest_url()));
    $current_url = wp_parse_url(add_query_arg([ ]));
    return (strpos($current_url['path'], $rest_url['path'], 0) === 0);
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

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/assets/dist/frontend.css', [], filemtime(__DIR__));
    wp_enqueue_script('child-theme-script', get_template_directory_uri() . '/assets/dist/frontend.js', ['jquery'], filemtime(__DIR__), true);
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
    $custom_logo_id = get_theme_mod('custom_logo');
    $site_url = 'https://www.sudwestfryslan.nl';

    if ($custom_logo_id) {
        $custom_logo_attr = [
            'class'    => 'custom-logo',
            'itemprop' => 'logo',
        ];

        $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $custom_logo_attr['alt'] = get_bloginfo('name', 'display');
        }

        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a><a href="%3$s" class="site-branding__title h2 font-weight-bold d-none d-md-block text-dark mb-0 pl-3">Gemeente Súdwest-Fryslân</a>',
            esc_url($site_url),
            wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr),
            site_url('/')
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
    if (! is_admin() && ! empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, [ 'jquery-migrate' ]);
    }
});

\add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-core', 'https://code.jquery.com/ui/1.13.2/jquery-ui.min.js', ['jquery'], '1.13.2', 1);
    wp_enqueue_script('jquery-ui-core');
    wp_script_add_data('jquery-ui-core', ['integrity', 'crossorigin'], ['sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==', 'anonymous']);
});