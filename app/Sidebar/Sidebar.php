<?php

namespace App\Sidebar;

class Sidebar
{
    const ICON_TYPE_MUNICIPALITY = 'municipality';
    const ICON_TYPE_FONTAWESOME = 'fontawesome';

    const ACF_FIELD_FONTAWESOME_ICON = 'menu_item_icon';
    const ACF_FIELD_MUNICIPALITY_ICON = 'menu_item_muncipality_icon';

    const ICON_NONE = 'none';

    public function register(): void
    {
        add_action('acf/include_fields', [$this, 'addAcfFields']);
        add_action('wp_nav_menu_objects', [$this, 'addIconsToMenuItems'], 10, 2);
        add_action('render_block_core/navigation-link', [$this, 'addIconsToBlockMenuItems'], 10, 2);
    }

    public function addIconsToBlockMenuItems($blockContent, $block): string
    {
        if ('core/navigation-link' !== $block['blockName']) {
            return $blockContent;
        }

        $icons = $this->getMenuIcons('mijn-zaken-sidebar');

        $blockUrl = $block['attrs']['url'] ?? '';

        if (isset($icons[$blockUrl])) {
            $iconHtml = $this->generateIconHtml($icons[$blockUrl]);

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
            $iconHTML = $this->generateIconHtml($this->getMenuItemIcon($item));
            if (! empty($iconHTML)) {
                $item->title = $iconHTML . ' ' . $item->title;
            }
        }

        return $items;
    }

    private function getMenuIcons(string $location): array
    {
        $locations = get_nav_menu_locations();
        if (! isset($locations[$location])) {
            return [];
        }

        $menu = wp_get_nav_menu_object($locations[$location]);
        if (! $menu) {
            return [];
        }

        $menuItems = wp_get_nav_menu_items($menu->term_id);
        if (! $menuItems) {
            return [];
        }

        $icons = [];
        foreach ($menuItems as $item) {
            $icon = $this->getMenuItemIcon($item);
            if ($icon) {
                $icons[$item->url] = $icon;
            }
        }

        return $icons;
    }

    private function getMenuItemIcon($item): ?array
    {
		if(! function_exists('get_field')) {
			return null;
		}

        $fieldIcon = get_field(self::ACF_FIELD_FONTAWESOME_ICON, $item);
        if (! empty($fieldIcon)) {
            return ['type' => self::ICON_TYPE_FONTAWESOME, 'icon' => esc_attr($fieldIcon)];
        }

        $municipalityIcon = get_field(self::ACF_FIELD_MUNICIPALITY_ICON, $item);
        if (! empty($municipalityIcon) && self::ICON_NONE !== $municipalityIcon) {
            return ['type' => self::ICON_TYPE_MUNICIPALITY, 'icon' => esc_attr($municipalityIcon)];
        }

        return null;
    }

    private function generateIconHtml(?array $iconData): string
    {
        if (! $iconData) {
            return '';
        }

        switch ($iconData['type']) {
            case self::ICON_TYPE_FONTAWESOME:
                return sprintf('<i class="wp-block-navigation-item__icon | fa-fw fa-regular fa-%s"></i> ', $iconData['icon']);
            case self::ICON_TYPE_MUNICIPALITY:
                return $this->getMunicipalityIconHtml($iconData['icon']);
            default:
                return '';
        }
    }

    private function getMunicipalityIconHtml(string $iconName): string
    {
        $svgPath = get_template_directory() . '/assets/img/municipality-icons/' . $iconName . '.svg';
        if (file_exists($svgPath)) {
            return '<div class="yard-municipality-icon">' . file_get_contents($svgPath) . '</div>';
        }

        return '';
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
                    'name' => self::ACF_FIELD_FONTAWESOME_ICON,
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
                    'name' => self::ACF_FIELD_MUNICIPALITY_ICON,
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

    public function getMunicipalityIcons(): array
    {
        $default = [self::ICON_NONE => 'Geen icoon geselecteerd'];
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
