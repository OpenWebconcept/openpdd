/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import metadata from './block.json';
import edit from './edit';
import save from './save';

const { name, attributes } = metadata;

const settings = {
	apiVersion: 2,
	title: __( 'Tegel' ),
	description: __(
		'Toon een tegel met een icoon, koptekst en begeleidende tekst.'
	),
	category: 'theme',
	keywords: [
		__( 'fontawesome' ),
		__( 'font awesome', 'owc-formulieren' ),
		__( 'symbool', 'owc-formulieren' ),
	],
	icon: {
		src: 'image-filter',
		background: '#fff',
		foreground: '#000',
	},
	edit,
	save,
	attributes,
};

registerBlockType( name, settings );
