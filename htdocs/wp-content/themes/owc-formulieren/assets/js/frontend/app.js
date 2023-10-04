import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import Navigation from './components/Navigation';

const app = () => {
	A11yToolbar();
	Dropdown();
	Navigation();
};

document.addEventListener( 'DOMContentLoaded', app );
