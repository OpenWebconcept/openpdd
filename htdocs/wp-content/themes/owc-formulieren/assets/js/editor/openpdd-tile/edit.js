/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import Inspector from './components/inspector';
import Icon from './components/icon';

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'tile',
	} );

	const template = [
		[
			'core/heading',
			{ placeholder: __( 'Titel', 'owc-formulieren' ), level: 3 },
		],
		[
			'core/paragraph',
			{
				placeholder: __(
					'Introductie van maximaal 4 regels',
					'owc-formulieren'
				),
			},
		],
	];

	return (
		<div { ...blockProps }>
			<Inspector { ...props } />
			<Icon { ...props } />
			<InnerBlocks template={ template } templateLock={ true } />
		</div>
	);
};

export default Edit;
