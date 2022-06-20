<?php declare(strict_types=1);

/**
 * The header for our theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://kit.fontawesome.com/8442ade4bd.js" crossorigin="anonymous"></script>
    <script src="//cdn1.readspeaker.com/script/8150/webReader/webReader.js?pids=wr" type="text/javascript"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a class="btn btn-primary btn-focus | sr-only sr-only-focusable" href="#main">Spring naar content</a>
    <div id="page">
        <div class="nav">
            <div class="navbar navbar-expand shadow w-100" role="navigation">
                <div class="container">
                    <?php get_template_part('partials/site-branding'); ?>
                    <?php get_template_part('partials/navigation'); ?>
                </div>
            </div>
        </div>
        <?php if (get_current_blog_id() === env('HW_SITE_ID', 4)) : ?>
            <?php get_template_part('partials/a11y-toolbar'); ?>
        <?php endif; ?>
        <div class="page-content">