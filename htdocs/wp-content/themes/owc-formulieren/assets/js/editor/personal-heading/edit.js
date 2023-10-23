/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'openpdd-personal-heading',
	} );

	return (
		<div { ...blockProps }>
			Persoonlijke header blok, back-end volgt.
		</div>
	);
};

export default Edit;
