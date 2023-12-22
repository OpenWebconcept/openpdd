<?php declare(strict_types=1);

/**
 * The custom header for our veilig-thuis.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="/wp-content/themes/owc-formulieren/assets/js/vendor/readspeaker-13499.min.js" integrity="sha384-hyFM1G9kz06nbBCtnZ6MBojLDgrIpWANO0Q8Q56z3syj1EfXjrUAEK6ARydUTvjM" crossorigin="anonymous"></script>
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
                    <?php get_template_part('templates/partials/site-branding');?>
                    <?php get_template_part('partials/navigation');?>
                </div>
            </div>
        </div>
        <div class="page-content">
