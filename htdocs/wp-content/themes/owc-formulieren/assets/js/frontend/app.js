import A11yToolbar from './components/A11yToolbar';
import Dropdown from './components/Dropdown';
import Navigation from './components/Navigation';
import NLDS_DenHaag_AnchorCollapse from './components/NLDS_DenHaag_AnchorCollapse';

const nlds_dh_ac = new NLDS_DenHaag_AnchorCollapse();

document.addEventListener( 'DOMContentLoaded', () => {
	A11yToolbar();
	Dropdown();
	Navigation();
	nlds_dh_ac.init();
	nlds_dh_ac.toggleEvents();
} );

window.addEventListener( 'resize', () => nlds_dh_ac.resizeEvents() );
window.addEventListener( 'orientationchange', () => nlds_dh_ac.resizeEvents() );

window.addEventListener( 'scroll', () => nlds_dh_ac.scrollEvents() );