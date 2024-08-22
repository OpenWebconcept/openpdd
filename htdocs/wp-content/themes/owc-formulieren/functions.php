<?php

declare(strict_types=1);
defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
];

foreach ($includes as $file) {
    if (! $filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);


(new App\GravityForms\GravityForms())->register();

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


/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and
 * avoids many potential problems.
 *
 * Values are constants set in wp-config.php
 */
add_action('phpmailer_init', function (\PHPMailer\PHPMailer\PHPMailer $phpmailer) {
    if (in_array(env('APP_ENV'), ['production'])) {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'form01.yard.nl';
        $phpmailer->Port = 25;
    }
});

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

add_action('after_setup_theme', function () {
    $sidebarConfig = get_theme_file_path('config/sidebars.php');

    if (! file_exists($sidebarConfig)) {
        return;
    }

    $sidebars = require_once $sidebarConfig;

    foreach ($sidebars as $sidebar) {
        register_sidebar([
            'name'          => $sidebar['name'],
            'id'            => $sidebar['id'],
            'description'   => $sidebar['description'],
            'class'         => $sidebar['class'],
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        ]);
    }
});

add_action('after_setup_theme', function () {

    $menuConfig = get_theme_file_path('config/menus.php');

    if (! file_exists($menuConfig)) {
        return;
    }
    $menus = require_once $menuConfig;

    register_nav_menus($menus);
});

add_action('after_setup_theme', function () {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /**
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /**
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');

    /*
     * Add site logo since 4.5
     */
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => ['site-title', 'site-description'],
    ]);

});

/**
 * Setup theme
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain(get_template(), get_template_directory() . '/languages');
    if (is_child_theme()) {
        load_textdomain(get_stylesheet(), get_stylesheet_directory() . '/languages');
    }
});

/**
 * Add superuser role
 */
add_action('after_switch_theme', function () {
    $role = new App\Roles\Role('superuser');

    if (null === $role->getRole()) {
        $superUserConfig = get_theme_file_path('config/caps/superuser.php');

        if (! file_exists($superUserConfig)) {
            return;
        }
        $caps = require_once $superUserConfig;
        $role->addRole('Super-user', $caps);
    }
});

/**
 * Add caps to existing roles
 */
add_action('after_switch_theme', function () {
    $roles = ['editor', 'superuser'];
    $gravityFormsConfig = get_theme_file_path('config/caps/gravityforms.php');

    if (! file_exists($gravityFormsConfig)) {
        return;
    }
    $caps = require_once $gravityFormsConfig;

    foreach ($roles as $role) {
        $role = new App\Roles\Role($role);
        if (null === $role->getRole()) {
            continue;
        }

        foreach (array_keys($caps) as $cap) {
            if (! $role->getRole()->has_cap($cap)) {
                $role->addCap($cap);
            }
        }
    }
}, 11);
