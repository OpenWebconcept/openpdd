/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'openpdd-my-messages'
	} );

	return (
		<div { ...blockProps }>
			Mijn berichten blok, data komt uit API.
		</div>
	);
};

export default Edit;
