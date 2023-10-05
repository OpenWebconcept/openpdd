export default class NLDS_DenHaag_AnchorCollapse {

    constructor() {
        this.initialized = false;

        this.breakpoint = 768;
        this.classNames = {
            active: 'denhaag-anchor-collapse--active',
            hover: 'denhaag-anchor-collapse--hover',
            focus: 'denhaag-anchor-collapse--focus',
        }

        this.scrollDelay = 500;

        this.collapses = [];
        this.toggles = [];
        this.anchorLinks = [];
    }

    /**
     * Initialize the component.
     */
    init() {
        this.initialized = this.collapses.length > 0;
        this.anchorLinks = Array.from( document.querySelectorAll( '.denhaag-sidenav__link[href*="#"]' ) );
        this.collapses = Array.from( document.getElementsByClassName( 'denhaag-anchor-collapse' ) );
        this.toggles = Array.from( document.getElementsByClassName( 'denhaag-anchor-collapse__toggle' ) );
    }


    /**
     * Update active-state on window scroll after a delay.
     */
    scrollEvents() {
        let scrollTimeout;
        clearTimeout( scrollTimeout );
        scrollTimeout = setTimeout( () => this.updateOnScroll(), this.scrollDelay );
    }

    /**
     * Update anchor navigation active state on the viewport position.
     */
    updateOnScroll() {
        // @todo: check which section is closest to the top of the viewport.
        // @todo: loop through the anchor links and add active class to the closest section.
    }

    /**
     * Fire on-resize event.
     */
    resizeEvents() {
        if (!this.initialized) {
            return;
        }

        if (window.matchMedia( `(min-width: ${this.breakpoint}px)` ).matches) {
            this.removeClassNames();
        }
    }

    /**
     * Toggle the collapses.
     */
    toggleEvents() {
        this.toggles?.forEach( toggle => this.toggle( toggle ) );
    }

    /**
     * Toggle the specific collapse.
     * @param {HTMLElement} button The button element to click on.
     */
    toggle(button) {
        // Switch aria-expanded attribute to the opposite value on click.
        button.setAttribute( 'aria-expanded', button.getAttribute( 'aria-expanded' ) === 'true' ? 'false' : 'true' );
        button.parentNode.parentNode?.classList?.toggle( this.classNames.active );
    }

    /**
     * Reset the toggles.
     * @param {HTMLElement} toggle The button to reset it's attributes.
     */
    resetToggle(toggle) {
        toggle.classList.remove( this.classNames.active );
        toggle.setAttribute( 'aria-expanded', 'false' );
    }


    /**
     * Remove the classNames.
     */
    removeClassNames() {
        this.collapses.forEach( collapse => collapse.classList.remove( this.classNames.active ) );
        this.toggles.forEach( toggle => this.resetToggle( toggle ) );
    }
};
