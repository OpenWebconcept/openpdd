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
	title: __( 'OpenPDD - Sidemenu' ),
	description: __(
		'Toon een OpenPDD sidemenu'
	),
	category: 'theme',
	keywords: [
		__( 'sidemenu', 'owc-formulieren' ),
		__( 'menu', 'owc-formulieren' ),
	],
	icon: {
		src: 'menu',
		background: '#fff',
		foreground: '#000',
	},
	edit,
	save,
	attributes,
};

registerBlockType( name, settings );
