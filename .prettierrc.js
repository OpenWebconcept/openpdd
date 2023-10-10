module.exports = {
	...require( '@wordpress/prettier-config' ),
	overrides: [
		{
			files: [ '*.scss', '*.css', '*.js', '*.jsx', '*.ts', '*.tsx' ],
			options: {
				// Tabs vs Spaces is also defined in the .editorconfig file
				useTabs: true,
				printWidth: 80,
				singleQuote: true,
				trailingComma: 'es5',
				bracketSpacing: true,
				parenSpacing: true,
				bracketSameLine: false,
				semi: true,
				arrowParens: 'always',
			},
		},
	],
};
