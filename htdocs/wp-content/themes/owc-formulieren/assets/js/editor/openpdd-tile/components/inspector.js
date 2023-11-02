/**
 * WordPress dependencies
 */
import { InspectorControls, FontSizePicker } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import IconPickerControl from './icon-picker-control';

const Inspector = ( props ) => {
	const { setAttributes, attributes } = props;
	const { icon } = attributes;

	return (
		<InspectorControls>
			<PanelBody title={ __( 'Kies een icoon', 'owc-formulieren' ) }>
				<IconPickerControl
					icon={ icon }
					onChange={ ( result ) =>
						setAttributes( {
							icon: result,
						} )
					}
				/>
			</PanelBody>
		</InspectorControls>
	);
};

export default Inspector;
