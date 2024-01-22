import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	MediaUpload,
	MediaUploadCheck,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	Card,
	CardHeader,
	CardBody,
	CardDivider,
	Button,
	Panel,
	PanelBody,
	PanelRow,
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

	const onUpdateMorningImage = ( image ) => {
		let imageUrl = image.sizes.large.url || image.url;

		setAttributes( {
			bgImageMorningId: image.id,
			bgImageMorningUrl: imageUrl,
		} );
	};

	const onRemoveMorningImage = () => {
		setAttributes( {
			bgImageMorningId: undefined,
			bgImageMorningUrl: undefined,
		} );
	};

	const onUpdateAfternoonImage = ( image ) => {
		let imageUrl = image.sizes.large.url || image.url;

		setAttributes( {
			bgImageAfternoonId: image.id,
			bgImageAfternoonUrl: imageUrl,
		} );
	};

	const onRemoveAfternoonImage = () => {
		setAttributes( {
			bgImageAfternoonId: undefined,
			bgImageAfternoonUrl: undefined,
		} );
	};

	const onUpdateEveningImage = ( image ) => {
		let imageUrl = image.sizes.large.url || image.url;

		setAttributes( {
			bgImageEveningId: image.id,
			bgImageEveningUrl: imageUrl,
		} );
	};

	const onRemoveEveningImage = () => {
		setAttributes( {
			bgImageEveningId: undefined,
			bgImageEveningUrl: undefined,
		} );
	};

	const onContentChange = ( content ) => {
		setAttributes( {
			textContent: content,
		} );
	};

	return (
		<div {...blockProps}>
			<InspectorControls>
				<Panel header={__( 'Persoonlijke heading', 'owc-formulieren' )}>
					<PanelBody
						title={__( 'Foto\'s', 'owc-formulieren' )}
						initialOpen={true}>
						<PanelRow>
							{/* Morning image */}
							<div>
								<Card
									style={{ textAlign: 'center' }}
									size={'xSmall'}>
									<CardHeader
										style={{
											backgroundColor: 'rgba(0,0,0,0.02)',
										}}>
										<h3
											style={{
												marginBottom: '0',
											}}>
											{__( 'Ochtend foto', 'owc-formulieren' )}
										</h3>
									</CardHeader>
									<CardBody>
										<div className="upload-morning-image">
											<MediaUploadCheck fallback={fallbackInstructions}>
												<MediaUpload
													title={__( 'Foto ochtend', 'owc-formulieren' )}
													onSelect={onUpdateMorningImage}
													allowedTypes={ALLOWED_MEDIA_TYPES}
													value={bgImageMorningId}
													render={( { open } ) => (
														<Button
															className={!bgImageMorningId ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
															onClick={open}>
															{!bgImageMorningId && (
																__( 'Selecteer een ochtend foto', 'owc-formulieren' )
															)}
															{!!bgImageMorningId && bgImageMorningUrl &&
															 <img
																 src={bgImageMorningUrl}
																 alt={__( 'Foto ochtend', 'owc-formulieren' )} />
															}
														</Button>
													)}
												/>
											</MediaUploadCheck>
											<CardDivider />
											{!!bgImageMorningId && bgImageMorningUrl && <MediaUploadCheck>
												<MediaUpload
													title={__( 'Ochtend foto', 'owc-formulieren' )}
													onSelect={onUpdateMorningImage}
													allowedTypes={ALLOWED_MEDIA_TYPES}
													value={bgImageMorningId}
													render={( { open } ) => (
														<Button
															onClick={open}
															isDefault>
															{__( 'Vervang de foto', 'owc-formulieren' )}
														</Button>
													)}
												/>
											</MediaUploadCheck>}
											<CardDivider />
											{!!bgImageMorningId && <MediaUploadCheck>
												<Button
													onClick={onRemoveMorningImage}
													isLink
													isDestructive>
													{__( 'Verwijder ochtend foto', 'owc-formulieren' )}
												</Button>
											</MediaUploadCheck>}
										</div>
									</CardBody>
								</Card>
							</div>
						</PanelRow>
						<PanelRow>
							{/* Afternoon image */}
							<div>
								<Card
									style={{ textAlign: 'center' }}
									size={'xSmall'}>
									<CardHeader
										style={{
											backgroundColor: 'rgba(0,0,0,0.02)',
										}}>
										<h3
											style={{
												marginBottom: '0',
											}}>
											{__( 'Middag foto', 'owc-formulieren' )}
										</h3>
									</CardHeader>
									<CardBody>
										<div className="upload-morning-image">
											<MediaUploadCheck fallback={fallbackInstructions}>
												<MediaUpload
													title={__( 'Foto middag', 'owc-formulieren' )}
													onSelect={onUpdateAfternoonImage}
													allowedTypes={ALLOWED_MEDIA_TYPES}
													value={bgImageAfternoonId}
													render={( { open } ) => (
														<Button
															className={!bgImageAfternoonId ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
															onClick={open}>
															{!bgImageAfternoonId && (
																__( 'Selecteer een middag foto', 'owc-formulieren' )
															)}
															{!!bgImageAfternoonId && bgImageAfternoonUrl &&
															 <img
																 src={bgImageAfternoonUrl}
																 alt={__( 'Foto middag', 'owc-formulieren' )} />
															}
														</Button>
													)}
												/>
											</MediaUploadCheck>
											<CardDivider />
											{!!bgImageAfternoonId && bgImageAfternoonUrl && <MediaUploadCheck>
												<MediaUpload
													title={__( 'Middag foto', 'owc-formulieren' )}
													onSelect={onUpdateAfternoonImage}
													allowedTypes={ALLOWED_MEDIA_TYPES}
													value={bgImageAfternoonId}
													render={( { open } ) => (
														<Button
															onClick={open}
															isDefault>
															{__( 'Vervang de foto', 'owc-formulieren' )}
														</Button>
													)}
												/>
											</MediaUploadCheck>}
											<CardDivider />
											{!!bgImageAfternoonId && <MediaUploadCheck>
												<Button
													onClick={onRemoveAfternoonImage}
													isLink
													isDestructive>
													{__( 'Verwijder middag foto', 'owc-formulieren' )}
												</Button>
											</MediaUploadCheck>}
										</div>
									</CardBody>
								</Card>
							</div>
						</PanelRow>
						<PanelRow>
							{/* Evening image */}
							<div>
								<Card
									style={{ textAlign: 'center' }}
									size={'xSmall'}>
									<CardHeader
										style={{
											backgroundColor: 'rgba(0,0,0,0.02)',
										}}>
										<h3
											style={{
												marginBottom: '0',
											}}>
											{__( 'Avond foto', 'owc-formulieren' )}
										</h3>
									</CardHeader>
									<CardBody>
										<div className="upload-morning-image">
											<MediaUploadCheck fallback={fallbackInstructions}>
												<MediaUpload
													title={__( 'Foto avond', 'owc-formulieren' )}
													onSelect={onUpdateEveningImage}
													allowedTypes={ALLOWED_MEDIA_TYPES}
													value={bgImageEveningId}
													render={( { open } ) => (
														<Button
															className={!bgImageEveningId ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
															onClick={open}>
															{!bgImageEveningId && (
																__( 'Selecteer een avond foto', 'owc-formulieren' )
															)}
															{!!bgImageEveningId && bgImageEveningUrl &&
															 <img
																 src={bgImageEveningUrl}
																 alt={__( 'Foto avond', 'owc-formulieren' )} />
															}
														</Button>
													)}
												/>
											</MediaUploadCheck>
											<CardDivider />
											{!!bgImageEveningId && bgImageEveningUrl && <MediaUploadCheck>
												<MediaUpload
													title={__( 'Avond foto', 'owc-formulieren' )}
													onSelect={onUpdateEveningImage}
													allowedTypes={ALLOWED_MEDIA_TYPES}
													value={bgImageEveningId}
													render={( { open } ) => (
														<Button
															onClick={open}
															isDefault>
															{__( 'Vervang de foto', 'owc-formulieren' )}
														</Button>
													)}
												/>
											</MediaUploadCheck>}
											<CardDivider />
											{!!bgImageEveningId && <MediaUploadCheck>
												<Button
													onClick={onRemoveEveningImage}
													isLink
													isDestructive>
													{__( 'Verwijder avond foto', 'owc-formulieren' )}
												</Button>
											</MediaUploadCheck>}
										</div>
									</CardBody>
								</Card>
							</div>
						</PanelRow>
					</PanelBody>
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
