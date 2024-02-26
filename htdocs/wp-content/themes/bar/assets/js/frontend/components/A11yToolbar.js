import Cookies from 'js-cookie';

export default () => {
	const contrastBtn = document.getElementById( 'js-toggle-contrast' );
	const textBtn = document.getElementById( 'js-toggle-text' );
	const contrastCookie = Cookies.get( 'high-contrast-color' ) === 'true';
	const textCookie = Cookies.get( 'text-large' ) === 'true';

	const events = () => {
		if ( ! contrastBtn || ! textBtn ) return;

		initContrast();
		initText();

		contrastBtn.addEventListener( 'click', () => onClickContrast() );
		textBtn.addEventListener( 'click', () => onClickText() );
	};

	/**
	 * Set text-size and color contrast on page-load based on cookies
	 */
	const initContrast = () => {
		if ( contrastCookie ) {
			toggleContrast();
		}
	};

	const initText = () => {
		if ( textCookie ) {
			toggleText();
		}
	};

	/**
	 * Click and toggle contrast
	 */
	const onClickContrast = () => {
		setCookie( 'high-contrast-color' );
		toggleContrast();
	};

	const toggleContrast = () => {
		if ( Cookies.get( 'high-contrast-color' ) === 'true' ) {
			contrastBtn.setAttribute( 'aria-label', 'Verlaag schermcontrast' );
		} else {
			contrastBtn.setAttribute( 'aria-label', 'Verhoog schermcontrast' );
		}

		document.body.classList.toggle( 'a11y-high-contrast' );
	};

	/**
	 * Click and toggle text
	 */
	const onClickText = () => {
		setCookie( 'text-large' );
		toggleText();
	};

	const toggleText = () => {
		if ( Cookies.get( 'text-large' ) === 'true' ) {
			textBtn.setAttribute( 'aria-label', 'Verklein leestekst' );
		} else {
			textBtn.setAttribute( 'aria-label', 'Vergroot leestekst' );
		}

		document.body.classList.toggle( 'a11y-increased-text' );
	};

	/**
	 * Change value cookie
	 *
	 * @param {string} cookie
	 */
	const setCookie = ( cookie ) => {
		if ( Cookies.get( cookie ) === 'true' ) {
			return Cookies.set( cookie, false, { expires: 90 } );
		}

		return Cookies.set( cookie, true, { expires: 90 } );
	};

	events();
};
