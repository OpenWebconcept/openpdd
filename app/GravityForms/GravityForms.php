<?php

namespace App\GravityForms;

use GFCommon;

class GravityForms
{
    private const INCOMPLETE_SUBMISSIONS_EXPIRATION_DAYS = 7;

    public function register(): void
    {
        add_action('pre_get_posts', [$this, 'handleLegacyForms']);
        add_filter('gform_form_theme_slug', [$this, 'setFormThemeSlug'], 10, 2);
        add_filter('gform_incomplete_submissions_expiration_days', fn () => self::INCOMPLETE_SUBMISSIONS_EXPIRATION_DAYS);
        add_filter('gform_require_login_pre_download', '__return_true');
        add_filter('pre_option_rg_gforms_enable_html5', '__return_true');
        add_filter('gform_field_validation', [$this, 'changeRequiredFieldMessage'], 10, 4);
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
            || ! class_exists('GFCommon')
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

            if (GFCommon::is_legacy_markup_enabled($formID)) {
                add_filter('pre_option_rg_gforms_disable_css', '__return_true');
            } else {
                add_filter('pre_option_rg_gforms_disable_css', '__return_false');
            }
        }
    }

    public function setFormThemeSlug(string $slug, array $form): string
    {
        return isset($form['id']) && GFCommon::is_legacy_markup_enabled($form['id']) ? $slug : 'gravity-theme';
    }

    /**
     * A11y: change required field message
     */
    public function changeRequiredFieldMessage(array $result, $value, $form, $field): array
    {
        $label = isset($field['label']) && is_string($field['label']) ? $field['label'] : '';
        $result['message'] = str_replace(
            'Dit veld is vereist',
            'Het verplichte veld "' . $label . '" is niet ingevuld',
            $result['message']
        );

        return $result;
    }
}
