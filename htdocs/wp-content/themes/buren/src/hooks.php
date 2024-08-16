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

add_filter('owc_gravityforms_zaaksysteem_templates_to_validate', function ($templates) {
    $templates[] = 'template-single-zaak';
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
