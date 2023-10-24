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
	title: __( 'OpenPDD - Mijn berichten' ),
	description: __(
		'Toon OpenPDD persoonlijke berichten'
	),
	category: 'theme',
	keywords: [
		__( 'messages', 'owc-formulieren' ),
		__( 'berichten', 'owc-formulieren' ),
		__( 'openpdd', 'owc-formulieren' ),
	],
	icon: {
		src: 'email',
		background: '#fff',
		foreground: '#000',
	},
	edit,
	save,
	attributes,
};

registerBlockType( name, settings );
