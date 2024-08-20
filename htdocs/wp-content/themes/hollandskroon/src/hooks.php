<?php

declare(strict_types=1);


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
    $site_url = 'https://www.hollandskroon.nl/';

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
            /**
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

            /**
             * Custom Capabilities
             */
            'edit_yard_options'             => true,
            'gravityforms_power_automate'   => true,
            'gravityforms_pronamic_pay'     => true,
            'gravityforms_webhooks'         => true,
            'edit_payment'                  => true,
            'read_payment'                  => true,
            'edit_payments'                 => true,
            'edit_others_payments'          => true,
            'read_private_payments'         => true,
            'edit_private_payments'         => true,
            'edit_published_payments'       => true,
            'wpseo_bulk_edit'               => true,
            'wpseo_manage_options'          => true,
        ];

        $caps = array_merge($caps, $role->getGravityFormsCapsKeyValue());

        $role->addRole('Super-user', $caps);
    }
});

/**
 * Add caps to existing roles
 */
add_action('after_switch_theme', function () {
    $roles = ['editor', 'superuser'];

    foreach ($roles as $role) {
        $role = new App\Roles\Role($role);
        if (null === $role->getRole()) {
            continue;
        }

        foreach ($role->getGravityFormsCaps() as $cap) {
            if (! $role->getRole()->has_cap($cap)) {
                $role->addCap($cap);
            }
        }
    }
});

add_filter('gform_enable_legacy_markup', '__return_true');

/**
 * Purpose: Display decrypted BSN values exclusively on GF administration pages within the Hollands Kroon theme.
 * Reason: Vital for Hollands Kroon's processes, as they heavily rely on decrypted BSN values.
 * Caution: Adding this filter to additional themes carries inherent risks.
 */
add_filter('owc_gravityforms_digid_use_value_bsn_decrypted', '__return_true');
