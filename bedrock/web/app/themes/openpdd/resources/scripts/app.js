import domReady from '@roots/sage/client/dom-ready';
import MobileMenu from './components/MobileMenu.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  MobileMenu();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
