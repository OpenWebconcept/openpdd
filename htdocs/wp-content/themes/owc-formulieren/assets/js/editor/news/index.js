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
	title: __( 'OpenPDD - Nieuws' ),
	description: __(
		'Toon OpenPDD nieuws'
	),
	category: 'theme',
	keywords: [
		__( 'news', 'owc-formulieren' ),
		__( 'nieuws', 'owc-formulieren' ),
		__( 'openpdd', 'owc-formulieren' ),
	],
	icon: {
		src: 'editor-ul',
		background: '#fff',
		foreground: '#000',
	},
	edit,
	save,
	attributes,
};

registerBlockType( name, settings );
