<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

try {
	(new HK\Providers\CommandServiceProvider())->boot();
} catch (Exception $e) {
	// Log error.
	error_log('Error booting CommandServiceProvider: ' . $e->getMessage());
}

/**
 * If the browser of the visitor is not Chrome or Edge.
 * Display message,
 */
add_filter('the_content', function ($content) {
    if (strpos($content, '[gravityforms') === false) {
        return $content;
    }

    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $browsers = [
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
    ];

    foreach ($browsers as $regex => $value) {
        if (! preg_match($regex, $userAgent)) {
            continue;
        }

        return $content;
    }

    return str_replace('[gravityforms', '<p class="alert-danger | p-2">Dit formulier werkt helaas niet in de browser die u momenteel gebruikt. Open het formulier in <a href="https://www.microsoft.com/nl-nl/edge" target="_blank" rel="noopener noreferrer">Edge</a> of <a href="https://www.google.com/intl/nl_nl/chrome/" target="_blank" rel="noopener noreferrer">Chrome</a> om uw aanvraag te voltooien.</p> [gravityforms', $content);
});



add_action('init', function () {
    $labels = [
        'name' => _x('Owner', 'taxonomy general name', 'hollandskroon'),
        'singular_name' => _x('Owner', 'taxonomy singular name', 'hollandskroon'),
        'search_items' => __('Search owners', 'hollandskroon'),
        'all_items' => __('All owners', 'hollandskroon'),
        'parent_item' => __('Parent owner', 'hollandskroon'),
        'parent_item_colon' => __('Parent owner:', 'hollandskroon'),
        'edit_item' => __('Edit owner', 'hollandskroon'),
        'update_item' => __('Update owner', 'hollandskroon'),
        'add_new_item' => __('Add new owner', 'hollandskroon'),
        'new_item_name' => __('New owner name', 'hollandskroon'),
        'menu_name' => __('Owner', 'hollandskroon'),
    ];

    register_taxonomy('form-owner', 'page', [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'show_in_rest' => true,
    ]);
    register_taxonomy_for_object_type('category', 'page');
});

add_action('init', function () {
    $labels = [
        'name' => _x('Link', 'taxonomy general name', 'hollandskroon'),
        'singular_name' => _x('Link', 'taxonomy singular name', 'hollandskroon'),
        'search_items' => __('Search Links', 'hollandskroon'),
        'all_items' => __('All Links', 'hollandskroon'),
        'parent_item' => __('Parent Link', 'hollandskroon'),
        'parent_item_colon' => __('Parent Link:', 'hollandskroon'),
        'edit_item' => __('Edit Link', 'hhollandskroon'),
        'update_item' => __('Update Link', 'hollandskroon'),
        'add_new_item' => __('Add new Link', 'hollandskroon'),
        'new_item_name' => __('New Link name', 'hollandskroon'),
        'menu_name' => __('Link', 'hollandskroon'),
    ];

    register_taxonomy('form-links', 'page', [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'show_in_rest' => true,
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


add_filter('gform_enable_legacy_markup', '__return_false');

/**
 * Purpose: Display decrypted BSN values exclusively on GF administration pages within the Hollands Kroon theme.
 * Reason: Vital for Hollands Kroon's processes, as they heavily rely on decrypted BSN values.
 * Caution: Adding this filter to additional themes carries inherent risks.
 */
add_filter('owc_gravityforms_digid_use_value_bsn_decrypted', '__return_true');

add_filter('owc_gravityforms_digid_field_display_title', function () {
    return 'Klik hier om in te loggen';
});

/**
 * Allow passing a custom component for the form title. Forms can use
 * this to pass information to a confirmation form.
 */
add_filter('the_title', function ($title) {
    if (isset($_GET['page_title']) && ! empty($_GET['page_title'])) {

        $title .= ' - ' . sanitize_text_field($_GET['page_title']);
    }

    return $title;
}, 10, 1);

/**
 * Same as above, for the page title.
 */
add_filter('document_title_parts', function ($title) {
    if (isset($_GET['page_title']) && ! empty($_GET['page_title'])) {

        $title['title'] .= ' - ' . sanitize_text_field($_GET['page_title']);
    }

    return $title;
});

/**
 * Set the theme directory where the mapping option files are situated, for the OWC Prefill plugin.
 */
add_filter('owc_prefill_gravity_forms_theme_dir_mapping_options', function ($value) {
    return __DIR__ . '/templates/owc-prefill/';
}, 10, 1);
