<?php

namespace App\GravityForms;

class GravityForms
{
    private const LEGACY_MARKUP_VERSION = 1;
    private const NEW_MARKUP_VERSION = 2;
    private const INCOMPLETE_SUBMISSIONS_EXPIRATION_DAYS = 7;

    public function register(): void
    {
        add_action('pre_get_posts', [$this, 'handleLegacyForms']);
        add_filter('gform_form_theme_slug', [$this, 'setFormThemeSlug'], 10, 2);
        add_filter('gform_incomplete_submissions_expiration_days', fn () => self::INCOMPLETE_SUBMISSIONS_EXPIRATION_DAYS);
        add_filter('gform_require_login_pre_download', '__return_true');
        add_filter('pre_option_rg_gforms_enable_html5', '__return_true');
    }

    /**
     * Disable Gravity Forms CSS when using a legacy form.
     *
     * First, we used to always force legacy markup & disable the CSS for all forms. However, the client wanted
     * to choose whether to use the new Gravity Forms 2.5 functionality (which needs standard CSS) through the
     * "Legacy markup" toggle.
     */
    public function handleLegacyForms(): void
    {
        global $post;

        if (
            ! function_exists('has_blocks')
            || ! is_a($post, \WP_Post::class)
            || ! has_blocks($post->post_content)
            || ! class_exists('GFAPI')
        ) {
            return;
        }

        $blocks = parse_blocks($post->post_content);

        foreach ($blocks as $block) {
            if ('gravityforms/form' !== $block['blockName']) {
                continue;
            }
            $formID = isset($block['attrs']['formId']) ? intval($block['attrs']['formId']) : 0;

            if (! $formID) {
                continue;
            }
            $form = \GFAPI::get_form($formID);

            // No database value or 1 means legacy markup enabled, disable CSS.
            if(! isset($form['markupVersion']) || self::LEGACY_MARKUP_VERSION === $form['markupVersion']) {
                add_filter('pre_option_rg_gforms_disable_css', '__return_true');
            } elseif(self::NEW_MARKUP_VERSION === $form['markupVersion']) {
                add_filter('pre_option_rg_gforms_disable_css', '__return_false');
            }
        }
    }

    public function setFormThemeSlug(string $slug, array $form): string
    {
        return (self::NEW_MARKUP_VERSION === ($form['markupVersion'] ?? 0)) ? 'gravity-theme' : $slug;
    }
}
