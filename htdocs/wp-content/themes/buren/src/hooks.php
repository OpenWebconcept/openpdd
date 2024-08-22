<?php

declare(strict_types=1);

/**
 * Change the custom logo URL
 */
add_filter('get_custom_logo', function () {
    $custom_logo_id = get_theme_mod('custom_logo');
    $site_url = 'https://www.buren.nl';

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
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a><a href="%3$s" class="site-branding__title h2 font-weight-bold d-none d-md-block text-dark mb-0 pl-3">%4$s</a>',
            esc_url($site_url),
            wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr),
            site_url('/overzicht'),
            get_bloginfo('name')
        );
    }

    return $html;
});


add_filter('owc_gravityforms_zaaksysteem_templates_to_validate', function ($templates) {
    $templates[] = 'template-single-zaak';
    $templates[] = 'template-mijn-zaken';
    $templates[] = 'template-mijn-zaken-main';

    return $templates;
});

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return "Klik hier om in te loggen";
});
