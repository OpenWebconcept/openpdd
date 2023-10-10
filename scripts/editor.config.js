/**
 * External dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

/**
 * Internal dependencies
 */
const { getPathToTheme } = require( './helpers' );

const isProduction = process.env.NODE_ENV === 'production';

module.exports = ( { theme } ) => {
	return {
		...defaultConfig,
		mode: isProduction ? 'production' : 'development',
		entry: {
			editor: [
				path.resolve(
					process.cwd(),
					getPathToTheme( 'owc-formulieren' ),
					'assets/js/editor',
					'index.js'
				),
				path.resolve(
					process.cwd(),
					getPathToTheme( theme ),
					'assets/scss',
					'editor.scss'
				),
			],
		},
		output: {
			path: path.resolve( getPathToTheme( theme ), 'assets/dist' ),
		},
		resolve: {
			alias: {
				ParentTheme: path.resolve(
					process.cwd(),
					getPathToTheme( 'owc-formulieren' )
				),
			},
		},
		plugins: [
			// Remove CleanWebpackPlugin otherwise assets will be deleted
			...defaultConfig.plugins.filter( ( plugin ) => {
				return ! ( plugin.constructor.name === 'CleanWebpackPlugin' );
			} ),
		],
	};
};
