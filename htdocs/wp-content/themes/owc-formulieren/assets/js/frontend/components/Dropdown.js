export default () => {
	const events = () => {
		initDropdowns();
	};

	const initDropdowns = () => {
		const dropdowns = document.querySelectorAll( '.dropdown' );

		dropdowns.forEach( initSingleDropdown );
	};

	/**
	 * Initialize a single dropdown.
	 *
	 * @param {HTMLElement} dropdown - The dropdown element.
	 */
	const initSingleDropdown = ( dropdown ) => {
		const dropdownButton = dropdown.querySelector( '.dropdown-toggle' );
		const dropdownMenu = dropdown.querySelector( '.dropdown-menu' );
		const dropdownButtonClose = dropdown.querySelector(
			'.dropdown-button-close'
		);

		dropdownButton.addEventListener( 'click', () => {
			toggleDropdown( dropdownMenu );
		} );

		dropdown.ownerDocument.addEventListener( 'click', ( event ) => {
			if ( ! dropdown.contains( event.target ) ) {
				toggleDropdown( dropdownMenu, false );
			}
		} );

		dropdownMenu.addEventListener( 'blur', () => {
			toggleDropdown( dropdownMenu, false );
		} );

		dropdownButtonClose.addEventListener( 'click', () => {
			toggleDropdown( dropdownMenu, false );
		} );
	};

	/**
	 * Toggle the visibility of the dropdown menu and update ARIA attributes.
	 *
	 * @param {HTMLElement} dropdownMenu - The dropdown menu element.
	 * @param {boolean} [isOpen] - Flag indicating if the dropdown menu should be open (true) or closed (false).
	 */
	const toggleDropdown = ( dropdownMenu, isOpen ) => {
		isOpen =
			typeof isOpen === 'boolean'
				? isOpen
				: ! dropdownMenu.classList.contains( 'show' );
		const dropdownButton =
			dropdownMenu.parentElement.querySelector( '.dropdown-toggle' );

		dropdownMenu.classList.toggle( 'show', isOpen );
		dropdownButton.setAttribute(
			'aria-expanded',
			isOpen ? 'true' : 'false'
		);
		dropdownMenu.setAttribute( 'aria-hidden', isOpen ? 'false' : 'true' );
	};

	events();
};
