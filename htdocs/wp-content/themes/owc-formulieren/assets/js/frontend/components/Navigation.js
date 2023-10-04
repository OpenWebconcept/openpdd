export default () => {
	const navigationItems = document.querySelectorAll(
		'.navbar-menu-list > .menu-item'
	);
	const expandableNavigationItems = document.querySelectorAll(
		'.navbar-menu-list > .menu-item-has-children'
	);

	const events = () => {
		if ( ! navigationItems ) return;

		document.addEventListener( 'keyup', onKeyUp );
		document.addEventListener( 'click', onClickDocument );
		document.addEventListener( 'focusin', onFocusIn );

		initExpandableMenuItems();
	};

	/**
	 * A11y: Check if escape key is pressed, then close all expandable items and set focus to parent link
	 *
	 * @param {Event} event - The key up event
	 */
	const onKeyUp = ( event ) => {
		if ( event.key !== 'Escape' ) return;

		closeAllExpandableMenuItems();

		const item = event.target.closest( '.menu-item-has-children' );
		if ( ! item ) return;

		const link = item.querySelector( 'a' );
		link?.focus();
	};

	/**
	 * Close expandable items if there is clicked somewhere which is not a menu item
	 *
	 * @param {Event} event - The click event
	 */
	const onClickDocument = ( event ) => {
		const isClickedOutside = Array.from( navigationItems ).every(
			( item ) => ! item.contains( event.target )
		);

		if ( ! isClickedOutside ) return;

		closeAllExpandableMenuItems();
	};

	/**
	 * Close expandable items if the focus is somewhere which is not a sub menu
	 *
	 * @param {Event} event - The focusin event
	 */
	const onFocusIn = ( event ) => {
		if ( event.target.closest( '.sub-menu' ) ) return;

		closeAllExpandableMenuItems();
	};

	/**
	 * Initialize expandable menu items and add necessary aria attributes.
	 */
	const initExpandableMenuItems = () => {
		expandableNavigationItems.forEach( ( item ) => {
			const link = item.querySelector( 'a' );

			link.setAttribute( 'aria-haspopup', 'true' );
			link.setAttribute( 'aria-expanded', 'false' );

			link.addEventListener( 'click', ( event ) =>
				openExpandableMenuItem( event, item, link )
			);

			item.addEventListener( 'mouseenter', ( event ) =>
				openExpandableMenuItem( event, item, link )
			);

			item.addEventListener( 'mouseleave', closeAllExpandableMenuItems );
		} );
	};

	/**
	 * Handle click/mouseenter event. Prevent opening link, add aria-expanded and toggle class.
	 *
	 * @param {Event}       event - The click/mouseenter event
	 * @param {Element}     item  - The expandable item element
	 * @param {HTMLElement} link  - The link element within the expandable item
	 */
	const openExpandableMenuItem = ( event, item, link ) => {
		event.preventDefault();

		const isOpen = link.getAttribute( 'aria-expanded' ) === 'true';
		link.setAttribute( 'aria-expanded', String( ! isOpen ) );

		item.classList.toggle( 'show-sub-menu' );
	};

	/**
	 * Close all expandable menu items. Set aria-expanded to false and remove active class.
	 */
	const closeAllExpandableMenuItems = () => {
		expandableNavigationItems.forEach( ( item ) => {
			const link = item.querySelector( 'a' );
			link.setAttribute( 'aria-expanded', 'false' );
			item.classList.remove( 'show-sub-menu' );
		} );
	};

	events();
};
