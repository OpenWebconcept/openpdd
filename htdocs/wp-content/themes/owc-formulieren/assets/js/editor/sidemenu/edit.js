/**
 * WordPress dependencies
 */
import {useBlockProps} from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import {GridIcon, InboxIcon, DocumentIcon, MapIcon, UserIcon} from './components/icons';

const Edit = () => {
    const blockProps = useBlockProps( {
        className: 'pdd-sidemenu',
    } );

    return (
      <nav {...blockProps}>
          <ul className="denhaag-sidenav__list">
              <li className="denhaag-sidenav__item">
                  <GridIcon />
                  <a
                    className="denhaag-sidenav__link"
                    href="/#">
                      Overzicht
                  </a>
              </li>
          </ul>
          <ul className="denhaag-sidenav__list">
              <li className="denhaag-sidenav__item">
                  <a
                    className="denhaag-sidenav__link"
                    href="/#">
                      <InboxIcon />
                      Mijn inbox
                  </a>
              </li>
              <li className="denhaag-sidenav__item--parent">
                  <a
                    className="denhaag-sidenav__link denhaag-sidenav__link--parent"
                    href="/#">
                      <DocumentIcon />
                      Mijn zaken
                  </a>
              </li>
              <li className="denhaag-sidenav__item">
                  <a
                    className="denhaag-sidenav__link"
                    href="/#">
                      <MapIcon />
                      Mijn wijk
                  </a>
              </li>
          </ul>
          <ul className="denhaag-sidenav__list">
              <li className="denhaag-sidenav__item">
                  <a
                    className="denhaag-sidenav__link"
                    href="/#">
                      <UserIcon />
                      Mijn gegevens
                  </a>
              </li>
          </ul>
      </nav>
    );
};

export default Edit;
