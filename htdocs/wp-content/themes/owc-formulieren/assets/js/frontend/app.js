import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import FocusStyle from './components/FocusStyle';
import Navigation from './components/Navigation';
import DynamicPersonalHeader from './components/DynamicPersonalHeader';
import ReadSpeakerLoader from './external/ReadSpeakerLoader';

const app = () => {
	A11yToolbar();
	Dropdown();
	FocusStyle();
	Navigation();
	DynamicPersonalHeader();
	ReadSpeakerLoader();
};

document.addEventListener( 'DOMContentLoaded', app );
