module.exports = ( ctx ) => {
	// Plugins for all environments
	const plugins = {
		'@tailwindcss/postcss': {},
	};

	// // Production-specific plugins
	if ( ctx.env === 'production' ) {
		plugins[ '@tailwindcss/postcss' ] = { optimize: { minify: true } };
	}

	return { plugins };
};
