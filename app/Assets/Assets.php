<?php

declare(strict_types=1);

namespace App\Assets;

class Assets
{
    private static array $defaultScripts = [
        'jquery-ui-core' => [
            'url' => 'https://code.jquery.com/ui/1.14.0/jquery-ui.min.js',
            'integrity' => 'sha256-Fb0zP4jE3JHqu+IBB9YktLcSjI1Zc6J2b6gTjB0LpoM=',
            'deps' => ['jquery'],
        ],
        'jquery-migrate' => [
            'url' => 'https://code.jquery.com/jquery-migrate-3.5.2.min.js',
            'integrity' => 'sha256-ocUeptHNod0gW2X1Z+ol3ONVAGWzIJXUmIs+4nUeDLI=',
        ],
    ];

    /**
     * Enqueues scripts and styles for the frontend.
     */
    public static function enqueueScripts(): void
    {
        $assetDetails = self::getAssetDetails('frontend.asset.php');

        wp_register_script(
            'theme',
            $assetDetails['baseUrl'] . 'frontend.js',
            $assetDetails['scriptAsset']['dependencies'],
            $assetDetails['scriptAsset']['version'],
        );

        wp_enqueue_script('theme');

        wp_enqueue_style('theme', $assetDetails['baseUrl'] . 'frontend.css', [], $assetDetails['scriptAsset']['version']);

        $sitesWithRS = [
            env('GGD_SITE_ID', 5) => '13499',
            env('HW_SITE_ID', 4) => '8150',
        ];

        wp_localize_script('theme', 'theme', [
            'rsID' => $sitesWithRS[get_current_blog_id()] ?? '0',
        ]);
    }

    /**
     * Enqueues scripts for the block editor.
     */
    public static function enqueueBlockEditorScripts(): void
    {
        $assetDetails = self::getAssetDetails('editor.asset.php');

        wp_register_script(
            'theme-block-editor',
            $assetDetails['baseUrl'] . 'editor.js',
            $assetDetails['scriptAsset']['dependencies'],
            $assetDetails['scriptAsset']['version'],
            true
        );

        wp_enqueue_script('theme-block-editor');
        wp_enqueue_style('theme-block-editor', $assetDetails['baseUrl'] . 'editor.css', [], $assetDetails['scriptAsset']['version']);
    }

    /**
     * Retrieve common asset details.
     *
     * @param string $assetFileName The name of the php asset file.
     */
    private static function getAssetDetails($assetFileName): array
    {
        $baseUrl = get_stylesheet_directory_uri() . '/assets/dist/';
        $basePath = get_stylesheet_directory() . '/assets/dist/';

        $scriptAssetPath = $basePath . $assetFileName;
        $scriptAsset = file_exists($scriptAssetPath) ? require($scriptAssetPath) : ['dependencies' => [], 'version' => round(microtime(true))];

        return [
            'baseUrl' => $baseUrl,
            'basePath' => $basePath,
            'scriptAssetPath' => $scriptAssetPath,
            'scriptAsset' => $scriptAsset,
        ];
    }

    /**
     * Replace defaultscripts with latest version
     */
    public static function replaceDefaultScripts(\WP_Scripts $scripts): void
    {
        if (is_admin()) {
            return;
        }

        foreach (self::$defaultScripts as $handle => $props) {
            $props = wp_parse_args(
                $props,
                [
                    'url' => null,
                    'integrity' => null,
                    'deps' => [],
                    'ver' => null,
                ]
            );

            $scripts->remove($handle);
            $scripts->add($handle, $props['url'], $props['deps'], $props['ver'], true);
            $scripts->enqueue($handle);
        }
    }

    /**
     * Add script attributes for external scripts
     * - integrity
     * - crossorigin
     */
    public static function addScriptAttributes(array $attributes): array
    {
        if (is_admin()) {
            return $attributes;
        }

        foreach (self::$defaultScripts as $handle => $props) {
            if ($props['url'] !== $attributes['src']) {
                continue;
            }
            if (! empty($props['integrity'])) {
                $attributes['integrity'] = $props['integrity'];
                $attributes['crossorigin'] = 'anonymous';
            }

            break;
        }

        return $attributes;
    }
}
