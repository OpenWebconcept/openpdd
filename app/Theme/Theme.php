<?php

namespace App\Theme;

use App\Roles\Role;

class Theme
{
    protected const TEMPLATE_TYPES = [
        'index',
        '404',
        'archive',
        'attachment',
        'author',
        'category',
        'date',
        'embed',
        'home',
        'frontpage',
        'home',
        'page',
        'page_template',
        'paged',
        'post_type_archive',
        'privacypolicy',
        'search',
        'single',
        'singular',
        'sticky',
        'tag',
        'tax',
        'taxonomy',
        'time',
        'year',
    ];

    public function register()
    {
        add_action('after_setup_theme', [$this, 'registerSidebars']);
        add_action('after_setup_theme', [$this, 'registerNavMenus']);
        add_action('after_setup_theme', [$this, 'addThemeSupport']);
        add_action('after_setup_theme', [$this, 'loadTextDomains']);
        add_action('after_switch_theme', [$this, 'addSuperuserRole']);
        add_action('after_switch_theme', [$this, 'addGravityFormsCaps'], 11);

        foreach (self::TEMPLATE_TYPES as $type) {
            \add_filter("{$type}_template_hierarchy", [$this, 'setTemplatePath']);
        }
    }

    public function setTemplatePath(array $templates): array
    {
        return array_map(
            function (string $template): string {
                return (str_starts_with($template, 'templates/')) ? $template : 'templates/' . $template;
            },
            $templates
        );
    }

    public function registerSidebars()
    {
        $sidebars = $this->getConfig('sidebars', []);
        foreach ($sidebars as $sidebar) {
            register_sidebar([
                'name'          => $sidebar['name'],
                'id'            => $sidebar['id'],
                'description'   => $sidebar['description'],
                'class'         => $sidebar['class'],
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
            ]);
        }
    }

    public function registerNavMenus()
    {
        $menus = $this->getConfig('menus', []);
        register_nav_menus($menus);
    }

    public function loadTextDomains()
    {
        load_theme_textdomain(get_template(), get_template_directory() . '/languages');
        if (is_child_theme()) {
            load_textdomain(get_stylesheet(), get_stylesheet_directory() . '/languages');
        }
    }

    public function addThemeSupport()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        /*
         * Add site logo since 4.5
         */
        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 300,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => ['site-title', 'site-description'],
        ]);
    }

    public function addSuperuserRole()
    {
        $role = new Role('superuser');

        if (null !== $role->getRole()) {
            return;
        }

        $caps = $this->getConfig('caps/superuser', []);
        $role->addRole('Super-user', $caps);
    }

    public function addGravityFormsCaps()
    {
        $$caps = $this->getConfig('caps/gravityforms', []);
        foreach ($roles as $role) {
            $role = new Role($role);
            if (null === $role->getRole()) {
                continue;
            }

            foreach (array_keys($caps) as $cap) {
                if (! $role->getRole()->has_cap($cap)) {
                    $role->addCap($cap);
                }
            }
        }
    }

    protected function getConfig(string $key, $default)
    {
        $configFile = get_theme_file_path('config/' . $key . '.php');

        if (! file_exists($configFile)) {
            return $default;
        }

        return require_once $configFile;
    }
}
