/**
 * WordPress dependencies
 */
import { registerBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

const listStyles = [
	{
		label: 'Pijlen',
		name: 'arrows',
	},
];

domReady( () => {
	// Register styles
	registerBlockStyle( 'core/list', listStyles );
} );
