<?php declare(strict_types=1);

namespace App\Assets;

class Assets
{
    /**
     * Enqueues scripts and styles for the frontend.
     */
    public static function enqueueScripts()
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
    }

    /**
     * Enqueues scripts for the block editor.
     */
    public static function enqueueBlockEditorScripts()
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
}
