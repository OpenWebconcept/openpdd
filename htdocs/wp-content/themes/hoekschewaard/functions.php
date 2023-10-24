<?php declare(strict_types=1);
defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/Role.php',
    'src/hooks.php',
    'src/setup.php',
    'src/gf-forms-extend.php',
];

foreach ($includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'openpdd-hoeksche-waard'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

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
        '/edge/i' => 'Edge'
    ];

    foreach ($browsers as $regex => $value) {
        if (!preg_match($regex, $userAgent)) {
            continue;
        }

        return $content;
    }

    return str_replace('[gravityforms', '<p class="alert-danger | p-2">Dit formulier werkt helaas niet in de browser die u momenteel gebruikt. Open het formulier in <a href="https://www.microsoft.com/nl-nl/edge" target="_blank" rel="noopener noreferrer">Edge</a> of <a href="https://www.google.com/intl/nl_nl/chrome/" target="_blank" rel="noopener noreferrer">Chrome</a> om uw aanvraag te voltooien.</p> [gravityforms', $content);
});

add_action('admin_init', function() {
	new App\Navigation\NavigationMetaFields();
});
