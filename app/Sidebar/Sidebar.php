<?php

namespace App\Sidebar;

class Sidebar
{
    public function register(): void
    {
        add_action('acf/include_fields', [$this, 'addAcfFields']);
        add_action('wp_nav_menu_objects', [$this, 'addIconsToMenuItems'], 10, 2);
        add_action('render_block_core/navigation-link', [$this, 'addIconsToBlockMenuItems'], 10, 2);
    }

    /**
     * Adds icons to block menu items based on ACF field values.
     */
    public function addIconsToBlockMenuItems($blockContent, $block): string
    {
        if ('core/navigation-link' !== $block['blockName']) {
            return $blockContent;
        }
        $location = 'mijn-zaken-sidebar';
        $locations = get_nav_menu_locations();

        if (! isset($locations[$location])) {
            return $blockContent;
        }

        $menu = wp_get_nav_menu_object($locations[$location]);

        if (! $menu) {
            return $blockContent;
        }

        $menuItems = wp_get_nav_menu_items($menu->term_id);

        if (! $menuItems) {
            return $blockContent;
        }

        // Map menu items to URLs with their associated icon details.
        // If "menu_item_icon" has a value, use that.
        // If empty, check "menu_item_muncipality_icon". If it's not "none",
        // then mark it as a municipality icon.
        $icons = [];
        foreach ($menuItems as $item) {
            $fieldIcon = get_field('menu_item_icon', $item);
            if (! empty($fieldIcon)) {
                $icons[$item->url] = [
                    'type' => 'fontawesome',
                    'icon' => esc_attr($fieldIcon),
                ];
            } else {
                $municipalityIcon = get_field('menu_item_muncipality_icon', $item);
                if (! empty($municipalityIcon) && 'none' !== $municipalityIcon) {
                    $icons[$item->url] = [
                        'type' => 'municipality',
                        'icon' => esc_attr($municipalityIcon),
                    ];
                }
            }
        }

        // Check if the block URL matches a menu item URL and add the icon if it exists.
        $blockUrl = $block['attrs']['url'] ?? '';
        if (isset($icons[$blockUrl])) {
            $iconData = $icons[$blockUrl];
            if ('fontawesome' === $iconData['type']) {
                $iconHtml = sprintf(
                    '<i class="wp-block-navigation-item__icon | fa-fw fa-regular fa-%s"></i> ',
                    $iconData['icon']
                );
            } elseif ('municipality' === $iconData['type']) {
                // Construct the path to the municipality icon SVG file.
                $svgPath = get_template_directory() . '/assets/img/municipality-icons/' . $iconData['icon'] . '.svg';
                if (file_exists($svgPath)) {
                    $iconHtml = file_get_contents($svgPath) . ' ';
                } else {
                    // Fallback in case file doesn't exist.
                    $iconHtml = '';
                }
            } else {
                $iconHtml = '';
            }

            $blockContent = preg_replace(
                '/(<span class="wp-block-navigation-item__label")/',
                $iconHtml . '$1',
                $blockContent
            );
        }

        return $blockContent;
    }

    public function addIconsToMenuItems(array $items): array
    {
        foreach ($items as $item) {
            $iconName = get_post_meta($item->ID, 'menu_item_icon', true);

            if (! empty($iconName) && is_string($iconName)) {
                $iconHTML = '<i class="fa-fw fa-regular fa-' . esc_attr($iconName) . '"></i>';
                $item->title = $iconHTML . ' ' . $item->title;
            }
        }

        return $items;
    }

    public function addAcfFields(): void
    {
        if (! function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group([
            'key' => 'group_66f54927e0cb1',
            'title' => 'Mijn Zaken sidebar',
            'fields' => [
                [
                    'key' => 'field_66f549282efec',
                    'label' => 'Font Awesome icoon',
                    'name' => 'menu_item_icon',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => 'Bijv. "arrow-left". Laat leeg om een gemeente icoon te gebruiken.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'maxlength' => '',
                    'allow_in_bindings' => 0,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ],
                [
                    'key' => 'field_67dbede85dc28',
                    'label' => 'Gemeente icoon',
                    'name' => 'menu_item_muncipality_icon',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => 'Bekijk de iconen op <a href="https://www.gemeenteniconen.nl/iconen" target="_blank">https://www.gemeenteniconen.nl/iconen</a>',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => $this->getMunicipalityIcons(),
                    'default_value' => false,
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_null' => 0,
                    'allow_in_bindings' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'placeholder' => '',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'nav_menu_item',
                        'operator' => '==',
                        'value' => 'location/mijn-zaken-sidebar',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'field',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ]);
    }

    /**
     * Returns an array of municipality icons.
     */
    public function getMunicipalityIcons(): array
    {
        $default = ['none' => 'Geen icoon geselecteerd'];
        $directory = get_template_directory() . '/assets/img/municipality-icons/*.svg';
        $iconPaths = glob($directory);

        if (! is_array($iconPaths) || empty($iconPaths)) {
            return $default;
        }

        $icons = [];
        foreach ($iconPaths as $path) {
            $icon = basename($path, '.svg');
            $icons[$icon] = $icon;
        }

        return array_merge($default, $icons);
    }
}
