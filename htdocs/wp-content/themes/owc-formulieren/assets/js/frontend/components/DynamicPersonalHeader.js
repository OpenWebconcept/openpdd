const changePersonalHeaderText = () => {
	const personalHeaderElement = document.querySelector( '.openpdd-personal-heading' );

	if ( !personalHeaderElement ) {
		return;
	}

	const currentTimeOfDay = getCurrentTimeOfDay();

	personalHeaderElement.classList.add( currentTimeOfDay );
	changePersonalHeaderGreeting( personalHeaderElement, currentTimeOfDay );
	showCorrectHeaderImage( personalHeaderElement, currentTimeOfDay );
};

const showCorrectHeaderImage = ( personalHeaderElement, currentTimeOfDay ) => {
	const personalHeaderImage = personalHeaderElement.querySelector( `.openpdd-personal-heading__image--${currentTimeOfDay}` );

	if ( !personalHeaderImage ) {
		return;
	}

	personalHeaderImage.style.display = 'block';
};

const changePersonalHeaderGreeting = ( personalHeaderElement, currentTimeOfDay ) => {
	const personalHeaderGreeting = personalHeaderElement.querySelector( `.openpdd-personal-heading__${currentTimeOfDay}` );

	if ( !personalHeaderGreeting ) {
		return;
	}

	personalHeaderGreeting.style.display = 'inline-block';
};

const getCurrentTimeOfDay = () => {
	const currentHour = new Date().getHours();
	let currentTimeOfDay = 'morning';

	if ( currentHour >= 12 && currentHour < 18 ) {
		currentTimeOfDay = 'afternoon';
	}

	if ( currentHour >= 18 || currentHour < 5 ) {
		currentTimeOfDay = 'evening';
	}

	return currentTimeOfDay;
};

export default changePersonalHeaderText;
