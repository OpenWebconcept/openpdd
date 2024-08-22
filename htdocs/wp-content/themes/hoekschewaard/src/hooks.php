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

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return "Klik hier om in te loggen";
});
