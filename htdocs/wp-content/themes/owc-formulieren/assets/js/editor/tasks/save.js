/**
 * Internal dependencies
 */
import {ErrorIcon, ArrowRightIcon, BellIcon} from './components/icons';

const Save = (props) => {

    return (
      <div className="openpdd-tasks">
          <h2 className="openpdd-tasks__header">
              <BellIcon />
              Wat moet ik regelen?
          </h2>

          <ul className="openpdd-tasks__list">
              <li className="openpdd-tasks__task">
                  <a
                    className="openpdd-tasks__link"
                    href="#">
                      <strong className="openpdd-tasks__task-title">
                          Geef informatie voor uw aanvraag subsidie geluidisolatie
                      </strong>
                      <span className="openpdd-tasks__task-status--error">
                          <ErrorIcon />
                          Nog 2 dagen
                      </span>
                      <span className="openpdd-tasks__arrow-right">
                          <ArrowRightIcon />
                      </span>
                  </a>
              </li>

              <li className="openpdd-tasks__task">
                  <a
                    className="openpdd-tasks__link"
                    href="#">
                      <strong className="openpdd-tasks__task-title">
                          Betaal uw parkeerbon van € 74,90 voor parkeren bij Valeriusplein
                      </strong>
                      <span className="openpdd-tasks__task-status">
                          voor 1 maart 2023
                      </span>
                      <span className="openpdd-tasks__arrow-right">
                          <ArrowRightIcon />
                      </span>
                  </a>
              </li>

              <li className="openpdd-tasks__task">
                  <a
                    className="openpdd-tasks__link"
                    href="#">
                      <strong className="openpdd-tasks__task-title">
                          Verleng uw identiteitskaart
                      </strong>
                      <span className="openpdd-tasks__arrow-right">
                          <ArrowRightIcon />
                      </span>
                  </a>
              </li>
          </ul>
      </div>
    );
};

export default Save;
