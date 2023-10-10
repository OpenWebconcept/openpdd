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
    <?php if (get_current_blog_id() === env('GGD_SITE_ID', 5)): ?>
        <script src="https://cdn1.readspeaker.com/script/13499/webReader/webReader.js?pids=wr" integrity="sha384-76zFw0GBmiEWCfR6N1FbWYgwoCosY1aGDGeolfEnkhZvVhJ5x7x0562YwAz7ffy+" crossorigin="anonymous"></script>
    <?php else: ?>
        <script src="https://cdn1.readspeaker.com/script/8150/webReader/webReader.js?pids=wr" integrity="sha384-fSI6639Q1xrU43pEpwyTWDOFknjF3MiUirZTpJybCkMG+lhC1As1I1gyleMJA5j3" crossorigin="anonymous"></script>
    <?php endif; ?>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/regular.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/light.min.css" rel="stylesheet">
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