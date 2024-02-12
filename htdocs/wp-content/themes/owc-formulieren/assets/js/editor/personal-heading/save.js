import { __ } from '@wordpress/i18n';
import { RichText, InnerBlocks } from '@wordpress/block-editor';

const Save = ( { attributes } ) => {
	return (
		<div className="openpdd-personal-heading">
			<div className="openpdd-personal-heading__content">
				<h1 className="openpdd-personal-heading__header">
					<span className="is-hidden openpdd-personal-heading__morning">
						{ __( 'Goedemorgen', 'owc-formulieren' ) }
					</span>
					<span className="is-hidden openpdd-personal-heading__afternoon">
						{ __( 'Goedemiddag', 'owc-formulieren' ) }
					</span>
					<span className="is-hidden openpdd-personal-heading__evening">
						{ __( 'Goedenavond', 'owc-formulieren' ) }
					</span>
					<InnerBlocks.Content />
				</h1>

				{ attributes.textContent && (
					<RichText.Content value={ attributes.textContent } />
				) }
			</div>

			<div className="openpdd-personal-heading__image-wrapper">
				{ attributes.bgImageMorningUrl && (
					<img
						className="openpdd-personal-heading__image openpdd-personal-heading__image--morning"
						src={ attributes.bgImageMorningUrl }
						alt="Placeholder image"
					/>
				) }

				{ attributes.bgImageAfternoonUrl && (
					<img
						className="openpdd-personal-heading__image openpdd-personal-heading__image--afternoon"
						src={ attributes.bgImageAfternoonUrl }
						alt="Placeholder image"
					/>
				) }

				{ attributes.bgImageEveningUrl && (
					<img
						className="openpdd-personal-heading__image openpdd-personal-heading__image--evening"
						src={ attributes.bgImageEveningUrl }
						alt="Placeholder image"
					/>
				) }
			</div>
		</div>
	);
};

export default Save;
