module.exports = {
	presets: [
		[
			'@wordpress/babel-preset-default',
			{
				targets: {
					ie: '11',
				},
				useBuiltIns: 'entry',
				corejs: 3,
			},
		],
	],
	plugins: [
		'@wordpress/babel-plugin-import-jsx-pragma',
		'@babel/plugin-transform-react-jsx',
	],
};
