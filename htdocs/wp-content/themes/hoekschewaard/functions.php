<?php defined('ABSPATH') || exit;

// Bootstrap application
$includes = [
    'src/hooks.php',
    'src/setup.php',
    'src/gf-forms-extend.php',
];

foreach ($includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

// $secureHeaders = new \Bepsvpt\SecureHeaders\SecureHeaders(require('/app/config/secure-headers.php'));
// var_dump($secureHeaders->headers()); exit;

add_action( 'send_headers', function() {

    $host = parse_url(get_site_url(),PHP_URL_HOST);
    $wildcard = sprintf('*.%s', $host);

    // Set values for the content secure policy:
    $cspSources = implode('; ', [
        "default-src 'self' {$wildcard} *.fontawesome.com *.readspeaker.com",
        "script-src 'self' 'unsafe-inline' {$wildcard} *.googleapis.com *.google-analytics.com *.fontawesome.com *.readspeaker.com *.jquery.com",
        "style-src 'self' 'unsafe-inline' {$wildcard} *.googleapis.com *.fontawesome.com *.readspeaker.com",
        "font-src data: 'self' {$wildcard} fonts.gstatic.com *.fontawesome.com *.readspeaker.com",
        "media-src 'self' {$wildcard} *.fontawesome.com *.readspeaker.com",
        "img-src data: 'self' {$wildcard} *.fontawesome.com *.google-analytics.com *.readspeaker.com"
    ]);

    // Enforce the use of HTTPS
    // header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
    // Prevent Clickjacking
    header("X-Frame-Options: SAMEORIGIN");
    // Prevent XSS Attack
    header("Content-Security-Policy: " . $cspSources); // FF 23+ Chrome 25+ Safari 7+ Opera 19+
    header("X-Content-Security-Policy: " . $cspSources); // IE 10+
    // Block Access If XSS Attack Is Suspected
    header("X-XSS-Protection: 1; mode=block");
    // Prevent MIME-Type Sniffing
    header("X-Content-Type-Options: nosniff");
    // Referrer Policy
    header("Referrer-Policy: no-referrer-when-downgrade");
});
