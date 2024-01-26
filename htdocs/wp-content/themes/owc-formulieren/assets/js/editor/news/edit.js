/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	TextControl,
	Panel,
	PanelBody,
	Placeholder,
} from '@wordpress/components';

const Edit = ( props ) => {
	const { attributes, setAttributes } = props;
	const { apiUrl, amountOfPosts, detailPageUrl } = attributes;

	const blockProps = useBlockProps( {
		className: 'openpdd-news',
		style: {
			backgroundColor: '#fff',
			padding: '1.5rem',
			border: '1px solid rgba(0, 0, 0, 0.1)',
		},
	} );

	const isValidUrl = urlString => {
		const urlPattern = new RegExp( '^(https?:\\/\\/)?' + // validate protocol
		                               '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // validate domain name
		                               '((\\d{1,3}\\.){3}\\d{1,3}))' + // validate OR ip (v4) address
		                               '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // validate port and path
		                               '(\\?[;&a-z\\d%_.~+=-]*)?' + // validate query string
		                               '(\\#[-a-z\\d_]*)?$', 'i' ); // validate fragment locator
		return !!urlPattern.test( urlString );
	};

	const onApiUrlChange = ( url ) => {
		if ( !isValidUrl( url ) ) {
			return;
		}

		setAttributes( {
			apiUrl: url,
		} );
	};

	const onDetailPageUrl = ( url ) => {
		if ( !isValidUrl( url ) ) {
			return;
		}

		setAttributes( {
			detailPageUrl: url,
		} );
	};

	const onAmountOfPostsChange = ( amount ) => {
		setAttributes( {
			amountOfPosts: parseInt( amount ),
		} );
	};

	return (
		<div {...blockProps}>
			<InspectorControls>
				<Panel>
					<PanelBody
						title={__( 'Persoonlijk nieuws', 'owc-formulieren' )}
						initialOpen={true}>
						<TextControl
							label={__( 'API Url', 'owc-formulieren' )}
							value={apiUrl}
							onChange={onApiUrlChange}
							type="text"
						/>
						<TextControl
							label={__( 'URL van de detailpagina', 'owc-formulieren' )}
							value={detailPageUrl}
							onChange={onDetailPageUrl}
							type="text"
							help={__( 'Dit is de pagina waar rekening gehouden wordt met de parameters', 'owc-formulieren' )}
						/>
						<TextControl
							label={__( 'Maximaal aantal berichten', 'owc-formulieren' )}
							value={amountOfPosts}
							onChange={onAmountOfPostsChange}
							type="number"
						/>
					</PanelBody>
				</Panel>
			</InspectorControls>

			<Placeholder
				label={__( 'Persoonlijk nieuws', 'owc-formulieren' )}
				instructions={__( 'Het persoonlijke nieuws wordt getoond aan de voorkant.', 'owc-formulieren' )}
			/>
		</div>
	);
};

export default Edit;
