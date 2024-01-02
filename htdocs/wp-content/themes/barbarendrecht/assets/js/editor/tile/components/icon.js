const Icon = ( props ) => {
	const { attributes } = props;
	const { icon, altText } = attributes;

	return (
		<i
			className={ `tile-icon ${ icon }` }
			title={ altText ? altText : null }
		></i>
	);
};

export default Icon;
