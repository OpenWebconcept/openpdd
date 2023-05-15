<?php declare(strict_types=1);

namespace HK\Gravityforms\Fields;

use GFFormsModel;

if (!class_exists('GFForms')) {
    die();
}

class HKCodesValidation extends \GF_Field
{
    public $type = 'hk-codes-validation';

    public $label = 'Code validatie';

    public function __construct($data = [])
    {
        parent::__construct($data);

        add_action('gform_editor_js_set_default_values', function () { ?>
            case "hk-codes-validation":
            if (!field.label)
            field.label = <?php echo json_encode(esc_html__('Code validation field', 'hollandskroon')); ?>;
            break;
<?php
        });
    }

    /**
     * Returns the markup for the field description.
     *
     * @param string $description The field description.
     * @param string $css_class   The css class to be assigned to the description container.
     */
    public function get_description($description, $css_class): string
    {
        $is_form_editor = $this->is_form_editor();
        $is_entry_detail = $this->is_entry_detail();
        $is_admin = $is_form_editor || $is_entry_detail;
        $id = "gfield_description_{$this->formId}_{$this->id}";

        $description = '';
        if ($this->is_form_editor()) {
            $description = strip_tags($description);
        }

        return $is_admin || !empty($description) ? "<div class='$css_class' id='$id'>" . $description . '</div>' : '';
    }

    /**
     * Define the fields inner markup.
     *
     * @param array $form The Form Object currently being processed.
     * @param string|array $value The field value. From default/dynamic population, $_POST, or a resumed incomplete submission.
     * @param null|array $entry Null or the Entry Object currently being edited.
     */
    public function get_field_input($form, $value = '', $entry = null): string
    {
        $is_entry_detail = $this->is_entry_detail();
        $is_form_editor = $this->is_form_editor();

        $form_id = absint($form['id']);
        $id = intval($this->id);
        $field_id = $is_entry_detail || $is_form_editor || 0 == $form_id ? "input_$id" : 'input_' . $form_id . "_$id";
        $form_id = ($is_entry_detail || $is_form_editor) && empty($form_id) ? rgget('id') : $form_id;

        $disabled_text = $is_form_editor ? "disabled='disabled'" : '';
        $class_suffix = $is_entry_detail ? '_admin' : '';

        $required_attribute = 'aria-required="true"';
        $invalid_attribute = $this->failed_validation ? 'aria-invalid="true"' : 'aria-invalid="false"';
        $aria_describedby = $this->get_aria_describedby();

        $validationCode = '';

        if (is_array($value)) {
            $validationCode = esc_attr(rgget($this->id, $value));
        }

        $validationCodeValue = GFFormsModel::get_input($this, $this->id);

        $single_placeholder_attribute = $this->get_field_placeholder_attribute();
        $validationCode_placeholder_attribute = $this->get_input_placeholder_attribute($validationCodeValue);
        $class = '';

        if ($is_form_editor) {
            return "<div class='ginput_complex ginput_container ginput_container_code_validation' id='{$field_id}_container'>
                        <span id='{$field_id}_container' class='ginput_left'>
                            <input class='" . esc_attr($class) . "' type='text' name='input_{$id}' id='{$field_id}' disabled='disabled' {$single_placeholder_attribute} {$validationCode_placeholder_attribute} {$required_attribute} {$invalid_attribute} />
                        </span>
                        <div class='gf_clear gf_clear_complex'></div>
                    </div>";
        } else {
            if (!$is_entry_detail) {
                $first_tabindex = $this->get_tabindex();
                $validationCode = is_array($value) ? rgar($value, 0) : $value;
                $validationCode = esc_attr($validationCode);
                return "<div class='ginput_complex ginput_container ginput_container_code_validation' id='{$field_id}_container'>
                            <span id='{$field_id}_container' class='ginput_left{$class_suffix}'>
                                <input name='input_{$id}' type='text' id='{$field_id}' value='{$validationCode}' {$first_tabindex} {$disabled_text} {$single_placeholder_attribute} {$validationCode_placeholder_attribute} {$required_attribute} {$invalid_attribute}/>
                            </span>
                            <div class='gf_clear gf_clear_complex'></div>
                        </div>";
            } else {
                $tabindex = $this->get_tabindex();
                $value = esc_attr($value);
                $class = esc_attr($class);

                return "<div class='ginput_complex ginput_container ginput_container_code_validation'>
                            <input name='input_{$id}' id='{$field_id}' type='text' value='$value' class='{$class}' {$tabindex} {$disabled_text} {$single_placeholder_attribute} {$required_attribute} {$invalid_attribute} {$aria_describedby}/>
                        </div>";
            }
        }
    }

    /**
     * Returns the class names of the settings which should be available on the field in the form editor.
     */
    public function get_form_editor_field_settings(): array
    {
        return [
            'conditional_logic_field_setting',
            'error_message_setting',
            'label_setting',
            'size_setting',
            'placeholder_setting',
            'description_setting',
            'css_class_setting',
        ];
    }

    /**
     * Returns the field button properties for the form editor. The array contains two elements:
     * 'group' => 'standard_fields' // or  'advanced_fields', 'post_fields', 'pricing_fields'
     * 'text'  => 'Button text'
     *
     * Built-in fields don't need to implement this because the buttons are added in sequence in GFFormDetail
     */
    public function get_form_editor_button(): array
    {
        return [
            'group' => 'hk_fields',
            'text'  => $this->get_form_editor_field_title()
        ];
    }

    /**
     * Override to indicate if this field type can be used when configuring conditional logic rules.
     */
    public function is_conditional_logic_supported(): bool
    {
        return true;
    }

    /**
     * Returns the field title.
     */
    public function get_form_editor_field_title(): string
    {
        return esc_attr__('Code validation', 'hollandskroon');
    }

    /**
     * Override this method to perform custom validation logic.
     *
     * Return the result (bool) by setting $this->failed_validation.
     * Return the validation message (string) by setting $this->validation_message.
     *
     * @param string|array $value The field value from get_value_submission().
     * @param array        $form  The Form Object currently being processed.
     */
    public function validate($value, $form): void
    {
        $validationCode = rgpost('input_' . $this->id);
        if (empty($validationCode)) {
            $this->failed_validation = true;
            $this->validation_message = empty($this->errorMessage) ? esc_html__('This field is required', 'hollandskroon') : $this->errorMessage;
        } else {
            $validationCodes = array_map('trim', explode(PHP_EOL, $this->description));
            if (!in_array($validationCode, $validationCodes)) {
                $this->failed_validation = true;
                $this->validation_message = empty($this->errorMessage) ? esc_html__('The code is not valid', 'hollandskroon') : $this->errorMessage;
            }
        }
    }
}
