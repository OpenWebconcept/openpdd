<?php
/**
 * Template partial for the NLDS Den Haag Sidebar navigation.
 */

$sidebar_nav_menu_slug = 'sidenav-mijn-zaken';

if ( ! has_nav_menu( $sidebar_nav_menu_slug ) ) {
    return;
}

wp_nav_menu(
    [
        'theme_location'  => $sidebar_nav_menu_slug,
        'menu_class'      => 'denhaag-sidenav__list',
        'container'       => 'nav',
        'container_class' => 'denhaag-sidenav',
        'walker'          => new App\Navigation\SideNavWalker(),
    ]
);
