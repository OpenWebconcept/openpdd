import A11yToolbar from './components/A11yToolbar';
import ReadSpeakerLoader from './external/ReadSpeakerLoader';

const app = () => {
	A11yToolbar();
	ReadSpeakerLoader( 13499 );
};

document.addEventListener( 'DOMContentLoaded', app );
