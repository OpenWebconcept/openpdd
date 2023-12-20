/**
 * External dependencies
 */
const path = require( 'path' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const CopyPlugin = require( 'copy-webpack-plugin' );

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
			frontend: [
				path.resolve(
					process.cwd(),
					getPathToTheme( 'owc-formulieren' ),
					'assets/js/frontend',
					'app.js'
				),
				path.resolve(
					process.cwd(),
					getPathToTheme( theme ),
					'assets/scss',
					'style.scss'
				),
			],
		},
		devtool: isProduction ? false : 'inline-source-map',
		output: {
			path: path.resolve( getPathToTheme( theme ), 'assets/dist' ),
		},
		resolve: {
			...defaultConfig.resolve,
			extensions: [ '.ts', '.tsx', '.js', '.json' ],
		},
		module: {
			...defaultConfig.module,
			rules: [
				...defaultConfig.module.rules,
				{
					test: /\.ts(x)?$/,
					use: 'ts-loader',
					exclude: /node_modules/,
				},
			],
		},
		plugins: [
			// Remove CleanWebpackPlugin otherwise assets will be deleted
			...defaultConfig.plugins.filter( ( plugin ) => {
				return ! ( plugin.constructor.name === 'CleanWebpackPlugin' );
			} )
		],
		optimization: {
			splitChunks: {
				cacheGroups: {
					commons: {
						test: /[\\/]node_modules[\\/]/,
						name: 'vendor',
						chunks: 'all',
					},
				},
			},
		},
	};
};
