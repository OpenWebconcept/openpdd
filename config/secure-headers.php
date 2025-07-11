<?php

declare(strict_types=1);

return [

    /**
     * Server
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Server
     *
     * Note: when server is empty string, it will not add to response header
     */

    'server' => 'Yard | Digital Agency',

    /**
     * X-Content-Type-Options
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Content-Type-Options
     *
     * Available Value: 'nosniff'
     */

    'x-content-type-options' => 'nosniff',

    /**
     * X-Download-Options
     *
     * Reference: https://msdn.microsoft.com/en-us/library/jj542450(v=vs.85).aspx
     *
     * Available Value: 'noopen'
     */

    'x-download-options' => 'noopen',

    /**
     * X-Frame-Options
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options
     *
     * Available Value: 'deny', 'sameorigin', 'allow-from <uri>'
     */

    'x-frame-options' => 'sameorigin',

    /**
     * X-Permitted-Cross-Domain-Policies
     *
     * Reference: https://www.adobe.com/devnet/adobe-media-server/articles/cross-domain-xml-for-streaming.html
     *
     * Available Value: 'all', 'none', 'master-only', 'by-content-type', 'by-ftp-filename'
     */

    'x-permitted-cross-domain-policies' => 'none',

    /**
     * X-Powered-By
     *
     * Note: it will not add to response header if the value is empty string.
     */

    'x-powered-by' => 'Yard | Digital Agency',

    /**
     * X-XSS-Protection
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection
     *
     * Available Value: '1', '0', '1; mode=block'
     */

    'x-xss-protection' => '1; mode=block',

    /**
     * Referrer-Policy
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Referrer-Policy
     *
     * Available Value: 'no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin',
     *                  'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'
     */

    'referrer-policy' => 'same-origin',

    /**
     * Clear-Site-Data
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Clear-Site-Data
     */

    'clear-site-data' => [
        'enable'            => false,
        'all'               => false,
        'cache'             => true,
        'cookies'           => true,
        'storage'           => true,
        'executionContexts' => true,
    ],

    /**
     * HTTP Strict Transport Security
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/Security/HTTP_strict_transport_security
     *
     * Please ensure your website had set up ssl/tls before enable hsts.
     */

    'hsts' => [
        'enable'              => true,
        'max-age'             => 31536000,
        'include-sub-domains' => true,
        'preload'             => true,
    ],

    /**
     * Expect-CT
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Expect-CT
     */

    'expect-ct' => [
        'enable'  => false,
        'max-age' => 2147483648,
        'enforce' => false,
        // report uri must be absolute-URI
        'report-uri' => env('SENTRY_SECURITY_HEADERS_REPORT'),
    ],

    /**
     * Permissions Policy
     *
     * Reference: https://w3c.github.io/webappsec-permissions-policy/
     */

    'permissions-policy' => [
        'enable' => true,

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/accelerometer
        'accelerometer' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/autoplay
        'autoplay' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/camera
        'camera' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://www.chromestatus.com/feature/5690888397258752
        'cross-origin-isolated' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/document-domain
        'document-domain' => [
            'none'    => false,
            '*'       => true,
            'self'    => false,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/encrypted-media
        'encrypted-media' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/fullscreen
        'fullscreen' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/geolocation
        'geolocation' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/gyroscope
        'gyroscope' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        'interest-cohort' => [
            'none' => true,
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/magnetometer
        'magnetometer' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/microphone
        'microphone' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/midi
        'midi' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/payment
        'payment' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/picture-in-picture
        'picture-in-picture' => [
            'none'    => false,
            '*'       => true,
            'self'    => false,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/publickey-credentials-get
        'publickey-credentials-get' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/screen-wake-lock
        'screen-wake-lock' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/sync-xhr
        'sync-xhr' => [
            'none'    => false,
            '*'       => true,
            'self'    => false,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/usb
        'usb' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/xr-spatial-tracking
        'xr-spatial-tracking' => [
            'none'    => false,
            '*'       => false,
            'self'    => true,
            'origins' => [],
        ],
    ],

    /**
     * Content Security Policy
     *
     * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP
     */

    'csp' => [
        'enable' => true,
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy-Report-Only
        'report-only' => false,
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-to
        'report-to' => env('SENTRY_SECURITY_HEADERS_REPORT'),
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri
        'report-uri' => [
            env('SENTRY_SECURITY_HEADERS_REPORT'),
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/block-all-mixed-content
        'block-all-mixed-content' => false,
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/upgrade-insecure-requests
        'upgrade-insecure-requests' => true,
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/base-uri
        'base-uri' => [
            'self' => true
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/child-src
        'child-src' => [
            'self' => true
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/connect-src
        'connect-src' => [
            'self' => true,
            'allow' => [
                '*.readspeaker.com',
                'nominatim.openstreetmap.org',
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/default-src
        'default-src' => [
            'none' => true,
            'self' => true,
            'allow' => [
                '*.readspeaker.com'
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/font-src
        'font-src' => [
            'none' => false,
            'self' => true,
            'report-sample' => true,
            'allow' => [
                'fonts.gstatic.com',
                '*.readspeaker.com'
            ],
            'schemes' => [
                'data:',
                // 'https:',
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/form-action
        'form-action' => [
            'self' => true,
            'allow' => [
                '*.readspeaker.com',
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-ancestors
        'frame-ancestors' => [
            'self' => true
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-src
        'frame-src' => [
            'self' => true,
            'allow' => [
                '*.google.com',
                '*.readspeaker.com',
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/img-src
        'img-src' => [
            'none'          => false,
            'self'          => true,
            'report-sample' => true,
            'allow'         => [
                '*.readspeaker.com',
                'secure.gravatar.com',
                '*.tile.osm.org',
            ],
            'schemes'       => [
                'data:',
                // 'https:',
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/manifest-src
        'manifest-src' => [
            'self' => true
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/media-src
        'media-src' => [
            'none'          => false,
            'self'          => true,
            'report-sample' => true,
            'allow'         => [
                '*.readspeaker.com'
            ],
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/navigate-to
        'navigate-to' => [
            'unsafe-allow-redirects' => false,
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/object-src
        'object-src' => [
            'none' => true,
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/plugin-types
        'plugin-types' => [
            // 'application/pdf',
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/prefetch-src
        // Deprecated and Non-standard

        // https://w3c.github.io/webappsec-trusted-types/dist/spec/#integration-with-content-security-policy
        'require-trusted-types-for' => [
            'script' => false,
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/sandbox
        'sandbox' => [
            'enable'                                  => false,
            'allow-downloads-without-user-activation' => false,
            'allow-forms'                             => false,
            'allow-modals'                            => false,
            'allow-orientation-lock'                  => false,
            'allow-pointer-lock'                      => false,
            'allow-popups'                            => false,
            'allow-popups-to-escape-sandbox'          => false,
            'allow-presentation'                      => false,
            'allow-same-origin'                       => false,
            'allow-scripts'                           => false,
            'allow-storage-access-by-user-activation' => false,
            'allow-top-navigation'                    => false,
            'allow-top-navigation-by-user-activation' => false,
        ],

        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
        'script-src' => [
            'none'          => false,
            'self'          => true,
            'report-sample' => true,
            'allow'         => [
                '*.readspeaker.com',
                'code.jquery.com',
                'siteimproveanalytics.com'
            ],
            'schemes' => [
                // 'data:',
                // 'https:',
            ],
            /* followings are only work for `script` and `style` related directives */
            'unsafe-inline' => false,
            'unsafe-eval' => false,
            // https://www.w3.org/TR/CSP3/#unsafe-hashes-usage
            'unsafe-hashes' => false,
            // Enable `strict-dynamic` will *ignore* `self`, `unsafe-inline`,
            // `allow` and `schemes`. You can find more information from:
            // https://www.w3.org/TR/CSP3/#strict-dynamic-usage
            'strict-dynamic' => false
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-attr
        'script-src-attr' => [
            'none'          => false,
            'self'          => true,
            'report-sample' => true,
            'allow'         => [
                '*.readspeaker.com',
                'code.jquery.com',
                'siteimproveanalytics.com'
            ],
            'schemes' => [
                // 'data:',
                // 'https:',
            ],
            /* followings are only work for `script` and `style` related directives */
            'unsafe-inline' => false,
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-elem
        'script-src-elem' => [
            //
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src
        'style-src' => [
            'none'          => false,
            'self'          => true,
            'report-sample' => true,
            'allow'         => [
                'fonts.googleapis.com',
                '*.readspeaker.com'
            ],
            'unsafe-inline' => false
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src-attr
        'style-src-attr' => [
            'none'          => false,
            'self'          => true,
            'unsafe-inline' => false,
            'report-sample' => true
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src-elem
        'style-src-elem' => [],
        // https://w3c.github.io/webappsec-trusted-types/dist/spec/#trusted-types-csp-directive
        'trusted-types' => [
            'enable'           => false,
            'allow-duplicates' => false,
            'default'          => false,
            'policies'         => [
                //
            ],
        ],
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/worker-src
        'worker-src' => [
            'none' => true
        ],
    ],
];
