<?php

declare(strict_types=1);

namespace App\Patterns;

class Patterns
{
    public function register(): void
    {
        add_filter('admin_menu', [$this, 'addMyPatternMenuItems']);
        add_filter('manage_wp_block_posts_columns', [$this, 'addMyPatternColumns']);
        add_filter('manage_wp_block_posts_custom_column', [$this, 'addPatternStatusColumnContent'], 10, 2);
    }

    /**
     * Adds menu items for My Patterns if enabled.
     */
    public function addMyPatternMenuItems(): void
    {
        if (! $this->MyPatternsMenuItemExists()) {
            $this->addMyPatternsMenuItem();
        }
    }

    /**
     * Checks if My Patterns menu item exists.
     */
    private function MyPatternsMenuItemExists(): bool
    {
        global $menu;

        if (! is_array($menu)) {
            return false;
        }

        return ! empty(array_filter($menu, function ($item) {
            return 'edit.php?post_type=wp_block' === $item[2];
        }));
    }

    /**
     * Adds My Patterns main menu item.
     */
    private function addMyPatternsMenuItem(): void
    {
        add_menu_page(
            __('Mijn patronen', 'owc-formulieren'),
            __('Mijn patronen', 'owc-formulieren'),
            'edit_posts',
            'edit.php?post_type=wp_block',
            '',
            'dashicons-layout',
            49 // just below "Pages"
        );
    }

    /**
     * Add columns to the WP Block admin table.
     */
    public function addMyPatternColumns(array $columns): array
    {
        return [
            'title' => $columns['title'],
            'status' => __('Status', 'owc-formulieren'),
            'date' => $columns['date'],
        ];
    }

    /**
     * Add content to the status column. If the wp_pattern_sync_status is empty, it means the pattern is synced.
     */
    public function addPatternStatusColumnContent(string $column, int $postID): void
    {
        if ('status' !== $column) {
            return;
        }

        $syncStatus = get_post_meta($postID, 'wp_pattern_sync_status', true);

        if (empty($syncStatus)) {
            echo '<span style="color: var(--wp-block-synced-color);">' . __('Gesynchroniseerd', 'owc-formulieren') . '</span>';
        } elseif ('unsynced' === $syncStatus) {
            echo '<span>' . __('Niet gesynchroniseerd', 'owc-formulieren') . '</span>';
        } else {
            echo '<span>' . __('Status onbekend', 'owc-formulieren') . '</span>';
        }
    }
}
