<?php

namespace HK\Gravityforms;

class Export
{
    public static function modifyValue( string $value, int $form_id, string $field_id, array $entry ): string
    {
        $field = \GFAPI::get_field( $form_id, $field_id );

        if ( is_object( $field ) && is_array( $field->choices ) ) {
            return $field->get_value_export($entry, $field_id, false, false);
        }
        return $value;
    }

    public static function modifyHeading(array $form): array
    {
        // only modify the form object when the form is loaded for field selection; not when actually exporting
        if ( rgpost( 'export_lead' ) || rgpost( 'action' ) == 'rg_select_export_form' ) {
            return $form;
        }

        $fields = [];

        foreach( $form['fields'] as $field ) {
            if ( is_a( $field, 'GF_Field_Checkbox' ) && is_array( $field->inputs ) ) {
                $orig_field = clone $field;
                $field->inputs = null;
                $fields[] = $field;
                $fields[] = $orig_field;
            } else {
                $fields[] = $field;
            }
        }

        $form['fields'] = $fields;

        return $form;
    }
}
