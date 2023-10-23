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
	title: __( 'OpenPDD - Mijn Zaken' ),
	description: __(
		'Toon OpenPDD \'Mijn zaken\''
	),
	category: 'theme',
	keywords: [
		__( 'affairs', 'owc-formulieren' ),
		__( 'zaken', 'owc-formulieren' ),
        __( 'mijn zaken', 'owc-formulieren' ),
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
