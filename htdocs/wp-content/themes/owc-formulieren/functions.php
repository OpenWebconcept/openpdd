<?php

declare(strict_types=1);
defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
    'src/setup.php',
];

foreach ($includes as $file) {
    if (! $filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);


$types = [
    'index',
    '404',
    'archive',
    'attachment',
    'author',
    'category',
    'date',
    'embed',
    'home',
    'frontpage',
    'home',
    'page',
    'page_template',
    'paged',
    'post_type_archive',
    'privacypolicy',
    'search',
    'single',
    'singular',
    'sticky',
    'tag',
    'tax',
    'taxonomy',
    'time',
    'year',
];

foreach ($types as $type) {
    \add_filter("{$type}_template_hierarchy", function (array $templates): array {
        return array_map(
            function (string $template): string {
                return (str_starts_with($template, 'templates/')) ? $template : 'templates/' . $template;
            },
            $templates
        );
    });
}
// Script hooks
add_action('wp_default_scripts', [App\Assets\Assets::class, 'replaceDefaultScripts']);
add_filter('wp_script_attributes', [App\Assets\Assets::class, 'addScriptAttributes']);
add_action('wp_enqueue_scripts', [App\Assets\Assets::class, 'enqueueScripts']);
add_action('enqueue_block_editor_assets', [App\Assets\Assets::class, 'enqueueBlockEditorScripts']);

// Gravity Forms hooks
add_filter('gform_incomplete_submissions_expiration_days', fn () => 7);
add_filter('gform_require_login_pre_download', '__return_true');

// Config expander hooks
add_filter('yard/config-expander/config/admin', function ($defaults) {
    $defaults['DISABLE_REST_API'] = false;

    return $defaults;
});

add_filter('owc/config-expander/rest-api/whitelist', function ($endpoints_whitelist) {
    $endpoints_whitelist['/irma/v1/gf/handle'] = [
        'endpoint_stub' => '/irma/v1/gf/handle',
        'methods'       => ['POST'],
    ];
    $endpoints_whitelist['/irma/v1/gf/session'] = [
        'endpoint_stub' => '/irma/v1/gf/session',
        'methods'       => ['GET'],
    ];

    return $endpoints_whitelist;
}, 10, 1);

// Various hooks
add_filter('automatic_updates_is_vcs_checkout', '__return_false', 10, 2);
