<?php

namespace App\GravityForms;

use GF_Field;
use GFCommon;

class GravityForms
{
    private const INCOMPLETE_SUBMISSIONS_EXPIRATION_DAYS = 7;

    public function register(): void
    {
        add_filter('gform_get_form_filter', [$this, 'disableReadSpeakerHiddenField'], 10, 2);
        add_action('pre_get_posts', [$this, 'handleLegacyForms']);
        add_filter('gform_form_theme_slug', [$this, 'setFormThemeSlug'], 10, 2);
        add_filter('gform_incomplete_submissions_expiration_days', fn () => self::INCOMPLETE_SUBMISSIONS_EXPIRATION_DAYS);
        add_filter('gform_require_login_pre_download', '__return_true');
        add_filter('pre_option_rg_gforms_enable_html5', '__return_true');
        add_filter('gform_field_validation', [$this, 'changeRequiredFieldMessage'], 10, 4);
        add_filter('gform_field_validation', [$this, 'validateFieldIBAN'], 10, 4);
        add_filter('gform_currencies', [$this, 'changeCurrencyInputDisplay']);

        // Remove the encryption filter for merge tags so the data can be used in emails.
        remove_filter('gform_merge_tag_filter', 'gf_encryption_gform_merge_tag_filter', 10, 4);

    }

    /**
     * Disable ReadSpeaker for hidden fields
     */
    public function disableReadSpeakerHiddenField(string $formString, array $form): string
    {
        $formString = str_replace('gfield--type-hidden', 'gfield--type-hidden rs_skip', $formString);
        $formString = str_replace('d-none', 'd-none rs_skip', $formString);
        $formString = str_replace('gfield--type-honeypot', 'gfield--type-honeypot rs_skip', $formString);

        return $formString;
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

    public function validateFieldIBAN(array $result, $value, array $form, GF_Field $field): array
    {
        if ('text' !== $field->type || 'IBAN' !== $field->label) {
            return $result;
        }

        $iban = $value;
        $iban = strtolower(str_replace(' ', '', $iban));

        $countriesWithIBAN = [
            'al' => 28,'ad' => 24,'at' => 20,'az' => 28,'bh' => 22,'be' => 16,'ba' => 20,'br' => 29,'bg' => 22,'cr' => 21,'hr' => 21,'cy' => 28,'cz' => 24,
            'dk' => 18,'do' => 28,'ee' => 20,'fo' => 18,'fi' => 18,'fr' => 27,'ge' => 22,'de' => 22,'gi' => 23,'gr' => 27,'gl' => 18,'gt' => 28,'hu' => 28,
            'is' => 26,'ie' => 22,'il' => 23,'it' => 27,'jo' => 30,'kz' => 20,'kw' => 30,'lv' => 21,'lb' => 28,'li' => 21,'lt' => 20,'lu' => 20,'mk' => 19,
            'mt' => 31,'mr' => 27,'mu' => 30,'mc' => 27,'md' => 24,'me' => 22,'nl' => 18,'no' => 15,'pk' => 24,'ps' => 29,'pl' => 28,'pt' => 25,'qa' => 29,
            'ro' => 24,'sm' => 27,'sa' => 24,'rs' => 22,'sk' => 24,'si' => 19,'es' => 24,'se' => 24,'ch' => 21,'tn' => 24,'tr' => 26,'ae' => 23,'gb' => 22,'vg' => 24,
        ];

        $lettersAsNumerics = [
            'a' => 10,'b' => 11,'c' => 12,'d' => 13,'e' => 14,'f' => 15,'g' => 16,'h' => 17,'i' => 18,'j' => 19,'k' => 20,'l' => 21,'m' => 22,
            'n' => 23,'o' => 24,'p' => 25,'q' => 26,'r' => 27,'s' => 28,'t' => 29,'u' => 30,'v' => 31,'w' => 32,'x' => 33,'y' => 34,'z' => 35,
        ];

        if (empty($countriesWithIBAN[ substr($iban, 0, 2) ])) {
            return [
                'is_valid' => false,
                'message' => 'Incorrecte landcode, deze lijkt niet te worden gebruikt door een van de deelnemende landen.',
            ];
        }

        // Check length of string by country code.
        if (strlen($iban) !== $countriesWithIBAN[ substr($iban, 0, 2) ]) {
            return [
                'is_valid' => false,
                'message' => sprintf('Incorrect gezien de lengte van %d tekens, dit moet %d tekens zijn.', strlen($iban), $countriesWithIBAN[substr($iban, 0, 2)]),
            ];
        }

        // Move the first 4 digits to the end.
        $movedDigits = substr($iban, 4) . substr($iban, 0, 4);

        $movedDigitsArray = str_split($movedDigits);
        $numericIBAN = "";

        foreach ($movedDigitsArray as $key => $value) {
            if (! is_numeric($movedDigitsArray[$key])) {
                $movedDigitsArray[$key] = $lettersAsNumerics[$movedDigitsArray[$key]];
            }

            $numericIBAN .= $movedDigitsArray[$key];
        }

        if (function_exists('bcmod')) {
            $validationResult = bcmod($numericIBAN, '97') == 1;
        } else {
            $validationResult = $this->customModulus($numericIBAN, 97) == 1;
        }

        if (! $validationResult) {
            return [
                'is_valid' => false,
                'message' => 'Incorrect rekeningnummer.',
            ];
        }

        return [
            'is_valid' => true,
            'message' => '',
        ];
    }

    protected function customModulus($number, $modulus): int
    {
        $number = str_replace(',', '', $number);
        $parts = str_split($number, 8);

        $carry = 0;

        foreach ($parts as $part) {
            $carry = ($carry . $part) % $modulus;
        }

        return $carry;
    }

    /**
     * Displays the euro sign before the amount rather than behind
     * @see https://docs.gravityforms.com/gform_currencies/#h-1-update-euro
     */
    public function changeCurrencyInputDisplay(array $currencies): array
    {
        $currencies['EUR']['symbol_left'] = '€';
        $currencies['EUR']['symbol_right'] = '';

        return $currencies;
    }
}
