import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import Navigation from './components/Navigation';
import FetchOpenPubData from './components/FetchOpenPubData';

const app = () => {
	A11yToolbar();
	Dropdown();
	Navigation();
	FetchOpenPubData();
};

document.addEventListener( 'DOMContentLoaded', app );
