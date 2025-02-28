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

        // Map menu items to URLs with their associated icons
        $icons = [];
        foreach ($menuItems as $item) {
            $icon = get_field('menu_item_icon', $item);
            if ($icon) {
                $icons[$item->url] = esc_attr($icon);
            }
        }

        // Check if the block URL matches a menu item URL and add the icon if it exists
        $blockUrl = $block['attrs']['url'] ?? '';
        if (isset($icons[$blockUrl])) {
            $iconHtml = sprintf(
                '<i class="wp-block-navigation-item__icon | fa-fw fa-regular fa-%s"></i> ',
                esc_attr($icons[$blockUrl])
            );

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
                    'label' => 'Font Awesome icoon naam',
                    'name' => 'menu_item_icon',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => 'Bijv. "arrow-left"',
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
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
            'modified' => 1727360643,
        ]);
    }
}
