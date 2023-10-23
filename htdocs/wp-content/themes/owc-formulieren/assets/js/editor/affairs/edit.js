/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'openpdd-affairs',
	} );

	return (
		<div { ...blockProps }>
			Zaken blok, back-end volgt.
		</div>
	);
};

export default Edit;
