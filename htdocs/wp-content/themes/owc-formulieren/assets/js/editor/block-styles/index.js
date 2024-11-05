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

const navigationMenuStyles = [
	{
		label: 'Tegels',
		name: 'tiles',
	},
];

domReady( () => {
	// Register styles
	registerBlockStyle( 'core/list', listStyles );
	registerBlockStyle( 'core/navigation', navigationMenuStyles );
} );
