<?php

declare(strict_types=1);


add_action('init', function () {
    $labels = [
        'name'              => _x('Owner', 'taxonomy general name', 'hoekschewaard'),
        'singular_name'     => _x('Owner', 'taxonomy singular name', 'hoekschewaard'),
        'search_items'      => __('Search owners', 'hoekschewaard'),
        'all_items'         => __('All owners', 'hoekschewaard'),
        'parent_item'       => __('Parent owner', 'hoekschewaard'),
        'parent_item_colon' => __('Parent owner:', 'hoekschewaard'),
        'edit_item'         => __('Edit owner', 'hoekschewaard'),
        'update_item'       => __('Update owner', 'hoekschewaard'),
        'add_new_item'      => __('Add new owner', 'hoekschewaard'),
        'new_item_name'     => __('New owner name', 'hoekschewaard'),
        'menu_name'         => __('Owner', 'hoekschewaard'),
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
        'name'              => _x('Link', 'taxonomy general name', 'hoekschewaard'),
        'singular_name'     => _x('Link', 'taxonomy singular name', 'hoekschewaard'),
        'search_items'      => __('Search Links', 'hoekschewaard'),
        'all_items'         => __('All Links', 'hoekschewaard'),
        'parent_item'       => __('Parent Link', 'hoekschewaard'),
        'parent_item_colon' => __('Parent Link:', 'hoekschewaard'),
        'edit_item'         => __('Edit Link', 'hoekschewaard'),
        'update_item'       => __('Update Link', 'hoekschewaard'),
        'add_new_item'      => __('Add new Link', 'hoekschewaard'),
        'new_item_name'     => __('New Link name', 'hoekschewaard'),
        'menu_name'         => __('Link', 'hoekschewaard'),
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

add_filter('gform_enable_legacy_markup', '__return_true');

/**
 * Purpose: Display decrypted BSN values exclusively on GF administration pages within the Hollands Kroon theme.
 * Reason: Vital for Hollands Kroon's processes, as they heavily rely on decrypted BSN values.
 * Caution: Adding this filter to additional themes carries inherent risks.
 */
add_filter('owc_gravityforms_digid_use_value_bsn_decrypted', '__return_true');

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return "Klik hier om in te loggen";
});
