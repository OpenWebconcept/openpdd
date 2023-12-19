import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import Navigation from './components/Navigation';
import DynamicPersonalHeader from './components/DynamicPersonalHeader';

const app = () => {
	A11yToolbar();
	Dropdown();
	Navigation();
	DynamicPersonalHeader();
};

document.addEventListener( 'DOMContentLoaded', app );
