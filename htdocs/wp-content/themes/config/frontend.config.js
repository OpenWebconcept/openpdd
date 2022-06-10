const path = require( 'path' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const { getCurrentTheme } = require( './helpers' );

const isProduction = process.env.NODE_ENV === 'production';

module.exports = ( env ) => {
	const theme = env.theme ? env.theme : getCurrentTheme(); // fallback when no env.theme is set
	return {
		...defaultConfig,
		mode: isProduction ? 'production' : 'development',
		entry: {
			frontend: [
				path.resolve(
					process.cwd(),
					'owc-formulieren',
					'assets/js',
					'app.js'
				),
				path.resolve(
					process.cwd(),
					theme,
					'assets/scss',
					'style.scss'
				),
			],
		},
		devtool: isProduction ? false : 'inline-source-map',
		output: {
			path: path.resolve( theme, 'assets/dist' ),
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
				return ! ( plugin instanceof CleanWebpackPlugin );
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
