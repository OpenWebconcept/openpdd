<nav aria-label="primaire navigatie" class="w-100" id="site-navigation">
    <?php if (has_nav_menu('primary')) {
        wp_nav_menu([
                'theme_location' => 'primary',
                'depth' => 3,
                'menu_class' => 'navbar-menu-list | gap-4 navbar-nav mr-auto align-items-xl-center justify-content-end',
            ]);
    }
    ?>
</nav>