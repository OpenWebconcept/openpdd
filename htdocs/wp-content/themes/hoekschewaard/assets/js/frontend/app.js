import A11yToolbar from './components/A11yToolbar';
import ReadSpeakerLoader from './external/ReadSpeakerLoader';

const app = () => {
	A11yToolbar();
	ReadSpeakerLoader( 8150 );
};

document.addEventListener( 'DOMContentLoaded', app );
