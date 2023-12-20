/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __experimentalDivider as Divider, __experimentalNumberControl as NumberControl } from '@wordpress/components';

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
			<h1>
				{__( 'Persoonlijk nieuws', 'owc-formulieren' )}
			</h1>

			<Divider />

			<label>
				<strong>
					{__( 'API Url', 'owc-formulieren' )}
				</strong>
			</label>
			<RichText
				value={apiUrl}
				onChange={onApiUrlChange}
				placeholder={__( 'API Url', 'owc-formulieren' )}
				style={{
					backgroundColor: '#fff',
					padding: '.5rem',
					border: '1px solid rgba(0, 0, 0, 0.1)',
				}}
			/>

			<Divider />

			<label>
				<strong>
					{__( 'URL van de detailpagina', 'owc-formulieren' )}
				</strong>
			</label>
			<RichText
				value={detailPageUrl}
				onChange={onDetailPageUrl}
				placeholder={__( 'Detailpagina Url', 'owc-formulieren' )}
				style={{
					backgroundColor: '#fff',
					padding: '.5rem',
					border: '1px solid rgba(0, 0, 0, 0.1)',
				}}
			/>
			<small
				style={{
					fontSize: '.75rem',
					lineHeight: '1'
				}}>
				{__( 'Dit is de pagina waar rekening gehouden wordt met de parameters', 'owc-formulieren' )}
			</small>

			<Divider />

			<label>
				<strong>
					{__( 'Maximaal aantal berichten', 'owc-formulieren' )}
				</strong>
			</label>
			<NumberControl
				isShiftStepEnabled={true}
				onChange={onAmountOfPostsChange}
				shiftStep={1}
				value={amountOfPosts}
			/>
		</div>
	);
};

export default Edit;
