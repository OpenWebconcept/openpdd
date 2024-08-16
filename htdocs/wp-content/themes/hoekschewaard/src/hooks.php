<?php

declare(strict_types=1);

/**
 * Add CSP to admin-ajax and initialize nonces for resources.
 */
add_action('init', function () {
    if (strpos(sanitize_text_field($_SERVER['REQUEST_URI']), '/wp-admin/admin-ajax.php') !== false) {
        header("Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'; font-src 'self'; frame-ancestors 'self';");
    }

    if (is_admin() or is_rest()) {
        return;
    }

    if (! function_exists('csp_nonce')) {
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

/**
 * Add a complete CSP to the document.
 */
add_action('send_headers', function () {
    if (is_admin()) {
        return;
    }

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

/**
 * GravityPerks Limit Choices
 */
add_filter('gplc_remove_choices', '__return_false');
add_filter('gplc_pre_render_choice', function ($choice, $exceededLimit, $field, $form, $count) {
    $limit = rgar($choice, 'limit');
    $choicesLeft = max($limit - $count, 0);
    $message = sprintf('(%s plekken over)', $choicesLeft);
    $choice['text'] = sprintf('%s %s', $choice['text'], $message);

    return $choice;
}, 10, 5);

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

if (class_exists(\GF_Fields::class)) {
    \GF_Fields::register(new HW\Gravityforms\Fields\HWCodesValidation());
}
add_filter('gform_export_fields', [HW\Gravityforms\Export::class, 'modifyHeading'], 10, 1);
add_filter('gform_export_field_value', [HW\Gravityforms\Export::class, 'modifyValue'], 10, 4);

add_filter('gform_field_groups_form_editor', function ($field_groups) {
    $field_groups['hw_fields'] = [
        'name'   => 'hw_fields',
        'label'  => 'Gemeente Hoeksche Waard velden',
        'fields' => [],
    ];

    return $field_groups;
});

add_filter('owc_gravityforms_zaaksysteem_templates_to_validate', function ($templates) {
    $templates[] = 'template-mijn-zaken';
    $templates[] = 'template-mijn-zaken-main';

    return $templates;
});

/**
 * Disable Gravity Forms CSS when using a legacy form.
 *
 * First, we used to always force legacy markup & disable the CSS for all forms. However, the client wanted
 * to choose whether to use the new Gravity Forms 2.5 functionality (which needs standard CSS) through the
 * "Legacy markup" toggle.
 */
add_action('pre_get_posts', function () {
    global $post;

    if (function_exists('has_blocks') && $post instanceof WP_Post && has_blocks($post->post_content)) {
        $blocks = parse_blocks($post->post_content);

        foreach ($blocks as $block) {
            if ('gravityforms/form' === $block['blockName']) {
                $formID = isset($block['attrs']['formId']) ? intval($block['attrs']['formId']) : 0;

                if ($formID && class_exists('GFAPI')) {
                    $form = GFAPI::get_form($formID);

                    // No database value or 1 means legacy markup enabled, disable CSS.
                    if(! isset($form['markupVersion']) || 1 === $form['markupVersion']) {
                        add_filter('pre_option_rg_gforms_disable_css', '__return_true');
                    } elseif(2 === $form['markupVersion']) {
                        add_filter('pre_option_rg_gforms_disable_css', '__return_false');
                    }
                }
            }
        }
    }
});
add_filter('pre_option_rg_gforms_enable_html5', '__return_true');
/**
 * New markup enabled? Then force gravity-theme
 */
add_filter('gform_form_theme_slug', function ($slug, $form) {
    return (2 === ($form['markupVersion'] ?? 0)) ? 'gravity-theme' : $slug;
}, 10, 2);
