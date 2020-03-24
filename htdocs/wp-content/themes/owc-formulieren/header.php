<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page">
        <div class="fixed-top navbar-wrapper" style="display:none;">
            <nav class="navbar navbar-default navbar--top">
                <div class="container">
                    <header id="masthead" class="site-header">

                        <div class="site-branding">
                            <a href="https://www.buren.nl/" class="custom-logo-link" rel="home" itemprop="url"><img width="300" height="261" src="https://www.buren.nl/wp-content/uploads/2017/03/cropped-buren_png.png" class="custom-logo" alt="Gemeente Buren" itemprop="logo"></a>
                        </div>

                        <div class="site-name text-center">
                            <a class="link--unstyle" href="https://www.buren.nl">
                                <span class="pl-sm-0 pl-md-3">Gemeente Buren</span>
                            </a>
                        </div>

                        <nav class="site-navigation main-navigation hidden-md-down">
                            <div class="menu-menu-1-container">
                                <ul id="menu-menu-2" class="nav navbar-nav">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-106 nav-item"><a href="https://www.buren.nl/" class="nav-link">Home</a></li>
                                </ul>
                            </div>
                        </nav>

                        <div class="site-phone text-center">
                            <a href="tel:140344">
                                <span class="hidden-sm-down">14 0344</span>
                            </a>
                        </div>
                    </header>
                </div>
            </nav>
        </div>
        <div class="container">
            <section class="breadcrumb-bar">
            </section>
        </div>
        <div class="page-content">