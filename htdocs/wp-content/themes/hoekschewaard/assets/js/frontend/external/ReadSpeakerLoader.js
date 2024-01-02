export default ( id ) => {
	const events = () => {
		injectWRScript( id );
	};

	function injectWRScript( cid ) {
		const _webReader = document.createElement( 'script' );
		_webReader.id = 'rs_req_Init';
		_webReader.src = `https://cdn-eu.readspeaker.com/script/${ cid }/webReader/webReader.js?pids=wr`;
		document.head.appendChild( _webReader );

		// Adds the menu to the button, if the user has not yet interacted with webReader.
		setTimeout( () => {
			ReadSpeaker.q( function () {
				rspkr.tools.toggler.add();
			} );
		}, 100 );
	}

	events();
};
