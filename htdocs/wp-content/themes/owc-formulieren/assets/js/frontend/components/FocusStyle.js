export default () => {
	const bodyClassTabbing = 'js-user-is-tabbing';

	const events = () => {
		window.addEventListener( 'keydown', ( e ) => handleTab( e ) );
		window.addEventListener( 'mousedown', () => handleMouseDown() );
	};

	const handleTab = ( e ) => {
		if ( e.key !== 'Tab' ) return;

		document.body.classList.add( bodyClassTabbing );
		window.removeEventListener( 'keydown', handleTab );
	};

	const handleMouseDown = () => {
		document.body.classList.remove( bodyClassTabbing );
		window.removeEventListener( 'mousedown', handleMouseDown );
	};

	events();
};
