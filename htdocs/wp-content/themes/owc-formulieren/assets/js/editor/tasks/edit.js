/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'openpdd-tasks',
	} );

	return (
		<div { ...blockProps }>
			Taken blok, back-end volgt.
		</div>
	);
};

export default Edit;
