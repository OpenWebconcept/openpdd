/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'openpdd-news',
	} );

	return (
		<div { ...blockProps }>
			Nieuws blok, data komt uit OpenPub.
		</div>
	);
};

export default Edit;
