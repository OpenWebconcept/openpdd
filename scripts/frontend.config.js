/**
 * External dependencies
 */
const path = require( 'path' );
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
					'assets/css',
					'style.css'
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
			} ),
			new CopyPlugin( {
				patterns: [
					{
						from: './node_modules/@fortawesome/fontawesome-pro/webfonts',
						to: './fontawesome/webfonts',
					},
					{
						from: './node_modules/@fortawesome/fontawesome-pro/css',
						to: './fontawesome/css',
					},
				],
			} ),
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
