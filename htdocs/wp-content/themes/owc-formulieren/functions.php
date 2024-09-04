<?php

declare(strict_types=1);
defined('ABSPATH') || exit;


(new App\Theme\Theme())->register();
(new App\GravityForms\GravityForms())->register();

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


function load_home_config($config_file) {
    $file_path = get_stylesheet_directory() . '/config/' . $config_file;

    if (file_exists($file_path)) {
        return include $file_path;
    }

	// Default config
    return [
        'digid_is_active' => true,
        'digid_provider' => 'owc-signicat-openid',
        'eherkenning_is_active' => true,
        'eherkenning_provider' => 'owc-signicat-openid',
        'eidas_is_active' => true,
        'eidas_provider' => 'owc-signicat-openid',
    ];
}
