import { __ } from '@wordpress/i18n';

import {
	useBlockProps,
	MediaUpload,
	MediaUploadCheck,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';

import {
	CardDivider,
	Button,
	Panel,
	PanelBody,
} from '@wordpress/components';

const ALLOWED_MEDIA_TYPES = ['image'];

const Edit = ( props ) => {
	const blockProps = useBlockProps( {
		className: 'openpdd-personal-heading',
	} );

	const { attributes, setAttributes } = props;
	const {
		textContent,
		bgImageMorningId,
		bgImageMorningUrl,
		bgImageAfternoonId,
		bgImageAfternoonUrl,
		bgImageEveningId,
		bgImageEveningUrl,
	} = attributes;

	const fallbackInstructions =
		<p>{__( 'U heeft geen rechten om foto\'s aan te passen. Neem contact op met de beheerder.', 'owc-formulieren' )}</p>;

	const onContentChange = ( content ) => {
		setAttributes( {
			textContent: content,
		} );
	};

	const ImageUpload = ( { timeOfDay, imageId, imageUrl, onUpdate, onRemove } ) => {
		return (
			<PanelBody
				title={`${timeOfDay} foto`}
				initialOpen={true}>
				<MediaUploadCheck fallback={fallbackInstructions}>
					<MediaUpload
						title={`Foto ${timeOfDay}`}
						onSelect={onUpdate}
						allowedTypes={ALLOWED_MEDIA_TYPES}
						value={imageId}
						render={( { open } ) => (
							<Button
								className={!imageId ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
								onClick={open}>
								{!imageId && (
									`Selecteer een ${timeOfDay} foto`
								)}
								{!!imageId && imageUrl && <img
									src={imageUrl}
									alt={__( 'Foto ochtend', 'owc-formulieren' )} />}
							</Button>
						)}
					/>
				</MediaUploadCheck>
				<CardDivider />
				{!!imageId && imageUrl &&
				 <MediaUploadCheck>
					 <MediaUpload
						 title={`${timeOfDay} foto`}
						 onSelect={onUpdate}
						 allowedTypes={ALLOWED_MEDIA_TYPES}
						 value={imageId}
						 render={( { open } ) => (
							 <Button
								 onClick={open}
								 isDefault>
								 {__( 'Vervang de foto', 'owc-formulieren' )}
							 </Button>
						 )}
					 />
				 </MediaUploadCheck>
				}
				<CardDivider />
				{!!imageId &&
				 <MediaUploadCheck>
					 <Button
						 onClick={onRemove}
						 isLink
						 isDestructive>
						 {__( 'Verwijder foto', 'owc-formulieren' )}
					 </Button>
				 </MediaUploadCheck>
				}
			</PanelBody>
		);
	};

	const onUpdateImage = ( timeOfDay, image ) => {
		const imageUrl = image.sizes.large.url || image.url;

		setAttributes( {
			[`bgImage${timeOfDay}Id`]: image.id,
			[`bgImage${timeOfDay}Url`]: imageUrl,
		} );
	};

	const onRemoveImage = ( timeOfDay ) => {
		setAttributes( {
			[`bgImage${timeOfDay}Id`]: undefined,
			[`bgImage${timeOfDay}Url`]: undefined,
		} );
	};

	return (
		<div {...blockProps}>
			<InspectorControls>
				<Panel header={__( 'Persoonlijke heading', 'owc-formulieren' )}>
					<ImageUpload
						timeOfDay="Ochtend"
						imageId={bgImageMorningId}
						imageUrl={bgImageMorningUrl}
						onUpdate={( image ) => onUpdateImage( 'Morning', image )}
						onRemove={() => onRemoveImage( 'Morning' )}
					/>
					<ImageUpload
						timeOfDay="Middag"
						imageId={bgImageAfternoonId}
						imageUrl={bgImageAfternoonUrl}
						onUpdate={( image ) => onUpdateImage( 'Afternoon', image )}
						onRemove={() => onRemoveImage( 'Afternoon' )}
					/>
					<ImageUpload
						timeOfDay="Avond"
						imageId={bgImageEveningId}
						imageUrl={bgImageEveningUrl}
						onUpdate={( image ) => onUpdateImage( 'Evening', image )}
						onRemove={() => onRemoveImage( 'Evening' )}
					/>
				</Panel>
			</InspectorControls>

			<div className="openpdd-personal-heading__content">
				<h1 className="openpdd-personal-heading__header">
					{__( 'Goedemorgen NAAM', 'owc-formulieren' )}
				</h1>

				<RichText
					value={textContent}
					onChange={onContentChange}
					placeholder={__( 'Tekst in header...', 'owc-formulieren' )}
				/>
			</div>

			<div className="openpdd-personal-heading__image-wrapper"></div>
		</div>
	);
};

export default Edit;
