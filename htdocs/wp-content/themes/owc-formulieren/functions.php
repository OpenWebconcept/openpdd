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

add_action('wp_default_scripts', [App\Assets\Assets::class, 'replaceDefaultScripts']);
add_filter('wp_script_attributes', [App\Assets\Assets::class, 'addScriptAttributes']);
