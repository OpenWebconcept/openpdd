/**
 * WordPress dependencies
 */
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import Icon from './components/icon';

const Save = ( props ) => {
	const { attributes } = props;
	const { altText } = attributes;

	const blockProps = useBlockProps.save( {
		className: 'tile',
	} );

	return (
		<div { ...blockProps }>
			<Icon { ...props } />
			{ altText && <span className="sr-only">{ altText }</span> }
			<InnerBlocks.Content />
		</div>
	);
};

export default Save;
