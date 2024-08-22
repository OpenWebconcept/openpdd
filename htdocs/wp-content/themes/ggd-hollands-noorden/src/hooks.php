<?php

declare(strict_types=1);

/**
 * A11y: add aria-label to custom logo
 */
add_filter('get_custom_logo', function ($html) {
    $blog_name = get_bloginfo('name');
    $aria_label = 'Home ' . $blog_name;
    $html = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '"', $html);

    return $html;
});
