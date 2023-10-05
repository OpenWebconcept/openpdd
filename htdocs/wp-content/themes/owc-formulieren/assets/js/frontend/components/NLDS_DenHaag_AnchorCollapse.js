export default class NLDS_DenHaag_AnchorCollapse {

    constructor() {
        this.initialized = false;

        this.breakpoint = 768;
        this.classNames = {
            active: 'denhaag-anchor-collapse--active',
            hover: 'denhaag-anchor-collapse--hover',
            focus: 'denhaag-anchor-collapse--focus',
        }

        this.collapses = [];
        this.toggles = [];
    }

    /**
     * Initialize the component.
     */
    init() {
        this.initialized = this.collapses.length > 0;
        this.collapses = Array.from( document.getElementsByClassName( 'denhaag-anchor-collapse' ) );
        this.toggles = Array.from( document.getElementsByClassName( 'denhaag-anchor-collapse__toggle' ) );
    }

    /**
     * Fire on-resize event.
     */
    resize() {
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
