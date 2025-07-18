<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html <?php language_attributes();
do_action('get_header'); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://cdn1.readspeaker.com/script/8150/webReader/webReader.js?pids=wr" integrity="sha384-cNMxmSTjQPcJhhwDas45IOziCSo0swILDD3Oe980VxpnYcDWtGBU9eUf5wkVaLOI" crossorigin="anonymous"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fontawesome/css/light.min.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="btn btn-primary btn-focus | sr-only sr-only-focusable" href="#main">Spring naar content</a>
    <div class="nav">
        <div class="shadow navbar navbar-expand w-100" role="navigation">
            <div class="container">
                <?php get_template_part('templates/partials/site-branding'); ?>
                <?php get_template_part('templates/mijn-zaken/header/navigation'); ?>
                <?php get_template_part('templates/mijn-zaken/header/dropdown-button'); ?>
            </div>
        </div>
    </div>
