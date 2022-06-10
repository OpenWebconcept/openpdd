const argv = require( 'minimist' )( process.argv.slice( 2 ) );

const getCurrentTheme = () => {
	if ( argv.env && argv.env instanceof String ) {
		return argv.env.replace( 'theme=', '' );
	}
	return 'owc-formulieren';
};

module.exports = { getCurrentTheme };
