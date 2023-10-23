/**
 * Internal dependencies
 */
import {ArrowRightIcon} from './components/icons';

const Save = (props) => {

    return (
      <div className="openpdd-affairs">
          <h2 className="openpdd-affairs__title">
              Mijn lopende zaken
          </h2>

          <ul className="openpdd-affairs__list">
              <li className="openpdd-affairs__item">
                  <div className="MuiPaper-root MuiCard-root denhaag-card denhaag-card--case MuiPaper-elevation1 MuiPaper-rounded">
                      <div className="denhaag-card__wrapper">
                          <div className="denhaag-card__background"></div>
                          <div className="MuiCardContent-root denhaag-card__content">
                              <div className="denhaag-card__text-wrapper">
                                  <p className="MuiTypography-root denhaag-card__title MuiTypography-body1">
                                      <a href="#">
                                          Aanvraag subsidie geluidsisolatie
                                      </a>
                                  </p>
                                  <p className="MuiTypography-root denhaag-card__subtitle MuiTypography-body1">
                                      Lorem ipsum dolor sit amet.
                                  </p>
                              </div>
                              <div className="MuiCardActions-root denhaag-card__actions">
                                  <div className="MuiTypography-root denhaag-card__subtitle MuiTypography-body1">
                                      <time dateTime="2020-01-21T00:00:00.000Z">21/01/2020</time>
                                  </div>
                                  <span className="denhaag-card__action-chip">
                                      1 taak open
                                  </span>
                                  <span
                                    className="material-icons MuiIcon-root denhaag-card__arrow"
                                    aria-hidden="true"
                                    aria-label="ArrowRightIcon">
                                      <ArrowRightIcon />
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>

              <li className="openpdd-affairs__item">
                  <div className="MuiPaper-root MuiCard-root denhaag-card denhaag-card--case MuiPaper-elevation1 MuiPaper-rounded">
                      <div className="denhaag-card__wrapper">
                          <div className="denhaag-card__background"></div>
                          <div className="MuiCardContent-root denhaag-card__content">
                              <div className="denhaag-card__text-wrapper">
                                  <p className="MuiTypography-root denhaag-card__title MuiTypography-body1">
                                      <a href="#">
                                          Aanvraag Parkeervergunning
                                      </a>
                                  </p>
                                  <p className="MuiTypography-root denhaag-card__subtitle MuiTypography-body1">
                                      Lorem ipsum dolor sit amet.
                                  </p>
                              </div>
                              <div className="MuiCardActions-root denhaag-card__actions">
                                  <div className="MuiTypography-root denhaag-card__subtitle MuiTypography-body1">
                                      <time dateTime="2020-01-21T00:00:00.000Z">21/01/2020</time>
                                  </div>
                                  <span
                                    className="material-icons MuiIcon-root denhaag-card__arrow"
                                    aria-hidden="true"
                                    aria-label="ArrowRightIcon">
                                      <ArrowRightIcon />
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>

          <a
            className="openpdd-affairs__view-all"
            href="#">
              Bekijk alle zaken
              <ArrowRightIcon />
          </a>
      </div>
    );
};

export default Save;
