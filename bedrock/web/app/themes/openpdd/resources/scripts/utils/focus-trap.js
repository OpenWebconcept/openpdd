/**
 * The element has visibility: hidden, which makes it initially un-focusable, creating an error.
 * This ensures an wait until it can activate the trap.
 */
export const checkCanFocusTrap = (elements) => {
    const results = elements.map((element) => {
        return new Promise((resolve) => {
            const interval = setInterval(() => {
                if (getComputedStyle(element).visibility !== 'hidden') {
                    resolve();
                    clearInterval(interval);
                }
            }, 5);
        });
    });
    return Promise.all(results);
};
