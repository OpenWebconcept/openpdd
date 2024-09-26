<?php

namespace App\Sidebar;

class Sidebar
{
    public function register(): void
    {
        add_action('acf/include_fields', [$this, 'addAcfFields']);
        add_action('wp_nav_menu_objects', [$this, 'addIconsToMenuItems'], 10, 2);
    }

    public function addIconsToMenuItems(array $items): array
    {
        foreach ($items as $item) {
            $icon_name = get_post_meta($item->ID, 'menu_item_icon', true);

            if (! empty($icon_name) && is_string($icon_name)) {
                $icon_html = '<i class="fa-fw fa-regular fa-' . esc_attr($icon_name) . '"></i>';
                $item->title = $icon_html . ' ' . $item->title;
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
