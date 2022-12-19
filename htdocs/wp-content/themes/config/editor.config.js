const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const { getCurrentTheme } = require( './helpers' );

const isProduction = process.env.NODE_ENV === 'production';

module.exports = ( env ) => {
	const theme = env.theme ? env.theme : getCurrentTheme(); // fallback when no env.theme is set
	return {
		...defaultConfig,
		mode: isProduction ? 'production' : 'development',
		entry: {
			editor: [
				path.resolve(
					process.cwd(),
					'owc-formulieren',
					'assets/js/editor',
					'index.js'
				),
				path.resolve(
					process.cwd(),
					theme,
					'assets/scss',
					'editor.scss'
				),
			],
		},
		output: {
			path: path.resolve( theme, 'assets/dist' ),
		},
		resolve: {
			alias: {
				ParentTheme: path.resolve(
					process.cwd(),
					'./owc-formulieren/'
				),
				NodeModules: path.resolve( process.cwd(), './node_modules/' ),
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
