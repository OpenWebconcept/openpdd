/**
 * External dependencies
 */
import {disableBodyScroll, enableBodyScroll} from 'body-scroll-lock';
import * as focusTrap from 'focus-trap';

/**
 * Internal dependencies
 */
import {checkCanFocusTrap} from '../utils/focus-trap.js';

export default () => {
  let focusTrapMobileMenu;
  const closeBtn = document.querySelector('#js-mobile-menu-close-btn');
  const hamburger = document.querySelector('#js-hamburger');
  const mobileMenu = document.querySelector('#js-mobile-menu');
  const focusTrapOptions = {
    allowOutsideClick: true,
    checkCanFocusTrap,
    onActivate: () => {
      disableBodyScroll(mobileMenu);
      hamburger.setAttribute('aria-expanded', 'true');
      hamburger.setAttribute('aria-label', 'Sluit menu');
      mobileMenu.setAttribute('aria-hidden', 'false');
      mobileMenu.animate(
        [
          {transform: 'translateX(-100%)', opacity: '0', visibility: 'hidden'},
          {transform: 'translateX(0)', opacity: '1', visibility: 'visible'},
        ],
        {
          duration: 500,
          easing: 'cubic-bezier( 0.22, 1, 0.36, 1 )',
          fill: 'both',
        },
      );
    },
    onDeactivate: () => {
      enableBodyScroll(mobileMenu);
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.setAttribute('aria-label', 'Open menu');
      mobileMenu.setAttribute('aria-hidden', 'true');
      mobileMenu.animate(
        [
          {transform: 'translateX(0)', opacity: '1', visibility: 'visible'},
          {transform: 'translateX(-100%)', opacity: '0', visibility: 'hidden'},
        ],
        {
          duration: 500,
          easing: 'ease-out',
          fill: 'both',
        },
      );
    },
  };

  const events = () => {
    if (!closeBtn || !hamburger || !mobileMenu) return;

    focusTrapMobileMenu = focusTrap.createFocusTrap(
      mobileMenu,
      focusTrapOptions,
    );

    closeBtn.addEventListener('click', focusTrapMobileMenu.deactivate);
    hamburger.addEventListener('click', () => {
      focusTrapMobileMenu.active
        ? focusTrapMobileMenu.deactivate()
        : focusTrapMobileMenu.activate();
    });
  };

  events();
};
