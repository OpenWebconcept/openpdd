/*
 * Add extra class to GB links.
 *
 * Note: The reason why I'm targeting paragraphs instead of, for example, a LinkControl is because we
 * apparently can not add any custom attributes to a LinkControl. So we will style based on the parent.
 */

/**
 * The components to target.
 *
 * @type {string[]}
 */
const componentsToTarget = ['core/paragraph'];

/**
 * Adds an extra attribute to the block settings so we can save the value.
 *
 * @param settings The block settings.
 * @param name Name of the block.
 */
function addExtraClassAttribute( settings, name ) {
	if ( typeof settings.attributes !== 'undefined' ) {
		if ( componentsToTarget.includes( name ) ) {
			settings.attributes = Object.assign( settings.attributes, {
				arrowsInLinks: {
					type: 'boolean',
				},
			} );
		}
	}
	return settings;
}

// Hook into the block and add the extra attribute.
wp.hooks.addFilter(
	'blocks.registerBlockType',
	'openpdd/add-extra-class-attribute',
	addExtraClassAttribute,
);

/**
 * Adds an extra class to the component based on the selected value.
 *
 * @param BlockEdit The block edit component.
 */
const addExtraClassComponent = wp.compose.createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		const { Fragment } = wp.element;
		const { ToolbarButton } = wp.components;
		const { BlockControls } = wp.blockEditor;
		const { attributes, setAttributes } = props;

		if ( !componentsToTarget.includes( props.name ) ) {
			return <BlockEdit {...props} />;
		}

		return (
			<Fragment>
				<BlockControls>
					<ToolbarButton
						icon={'arrow-right-alt'}
						isActive={attributes.arrowsInLinks}
						label={wp.i18n.__( 'Voeg pijltjes toe aan alle links in dit component', 'owc-formulieren' )}
						onClick={() => setAttributes( { arrowsInLinks: !attributes.arrowsInLinks } )}
					/>
				</BlockControls>

				<BlockEdit {...props} />
			</Fragment>
		);
	};
}, 'addExtraClassComponent' );

// Hook into the block edit component and add the extra button in the toolbar.
wp.hooks.addFilter(
	'editor.BlockEdit',
	'openpdd/add-extra-class-component',
	addExtraClassComponent,
);

/**
 * Applies the extra class to the component based on whether or not the user has selected it.
 *
 * @param extraProps Extra properties for the block.
 * @param blockType Type of block
 * @param attributes Saved attributes from the block.
 */
function applyExtraClass( extraProps, blockType, attributes ) {
	const { arrowsInLinks } = attributes;

	if ( typeof arrowsInLinks !== 'undefined' && arrowsInLinks ) {
		extraProps.className += ' openpdd-arrowed-links';
	}

	return extraProps;
}

// Hook into the save content and apply the extra class if the user has selected it.
wp.hooks.addFilter(
	'blocks.getSaveContent.extraProps',
	'openpdd/apply-extra-class',
	applyExtraClass,
);


