const argv = require( 'minimist' )( process.argv.slice( 2 ) );

/**
 * Returns the path to the specified theme. Not using the CLI will result in no theme being set
 * (like using `npm run dev:frontend`). In that case, the 'owc-formulieren' theme will be returned.
 *
 * @param {string} theme - The name of the theme to get the path for.
 */
const getPathToTheme = ( theme ) => {
	const currentTheme = theme ? theme : getCurrentTheme();
	return getPathToThemes() + currentTheme + '/';
};

const getCurrentTheme = () => {
	if (
		argv.env &&
		( typeof argv.env === 'string' || argv.env instanceof String )
	) {
		return argv.env.replace( 'theme=', '' );
	}
	return 'owc-formulieren';
};

const getPathToThemes = () => {
	return 'htdocs/wp-content/themes/';
};

module.exports = {
	getPathToTheme,
};
