import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import Navigation from './components/Navigation';
import fetchOpenPubData from './components/fetch-openpub-data';

const app = () => {
	A11yToolbar();
	Dropdown();
	Navigation();
    fetchOpenPubData( '7101', '.openpdd-news' );
};

document.addEventListener( 'DOMContentLoaded', app );
