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
		label: 'Tegels / Kaart',
		name: 'tiles',
	},
	{
		label: 'App',
		name: 'app',
	},
];

domReady( () => {
	// Register styles
	registerBlockStyle( 'core/list', listStyles );
	registerBlockStyle( 'core/navigation', navigationMenuStyles );
} );
