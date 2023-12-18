import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import Navigation from './components/Navigation';
import fetchOpenPubData from './components/fetch-openpub-data';
import dynamicPersonalHeader from './components/dynamic-personal-header';

const app = () => {
	A11yToolbar();
	Dropdown();
	Navigation();
	dynamicPersonalHeader();
	fetchOpenPubData( '7101', '.openpdd-news' );
};

document.addEventListener( 'DOMContentLoaded', app );
