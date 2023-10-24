@php
    /**
     * Template partial for the NLDS Den Haag Sidebar navigation.
     *
     * @design https://nl-design-system.github.io/denhaag/?path=/docs/css-navigation-sidenav--default-story
     *
     * @author Paul van Impelen <paul@acato.nl>
     */
@endphp

<nav class="denhaag-sidenav">
    <ul class="denhaag-sidenav__list">
        <li class="denhaag-sidenav__item">
            <a href="<?php echo home_url('overzicht'); ?>" <?php echo is_page('overzicht') ? ' aria-current="page"' : ''; ?> class="denhaag-sidenav__link<?php echo is_page('overzicht') ? ' denhaag-sidenav__link--current' : ''; ?>">
                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <path
                        d="M3 5a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm6 0H5v4h4V5zm4 0a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2V5zm6 0h-4v4h4V5zM3 15a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4zm6 0H5v4h4v-4zm4 0a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4zm6 0h-4v4h4v-4z"
                        fill="currentColor" />
                </svg>
                Overzicht
            </a>
        </li>
        <li class="denhaag-sidenav__item">
            <a href="<?php echo home_url('mijn-berichten'); ?>" <?php echo is_page('mijn-berichten') ? ' aria-current="page"' : ''; ?> class="denhaag-sidenav__link<?php echo is_page('mijn-berichten') ? ' denhaag-sidenav__link--current' : ''; ?>">
                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <path
                        d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm2 9v5h14v-5h-2.28l-.771 2.316A1 1 0 0115 17H9a1 1 0 01-.949-.684L7.28 14H5zm14-2V5H5v7h2.28a2 2 0 011.897 1.367L9.72 15h4.558l.544-1.633A2 2 0 0116.721 12H19z"
                        fill="currentColor" />
                </svg>
                Mijn berichten
                <div class="denhaag-badge-counter">
                    <span class="denhaag-dot-indicator denhaag-dot-indicator--overlap-rectangle">
                        <div class="denhaag-badge-counter__counter">4</div>
                        <span class="denhaag-dot-indicator__dot"></span>
                    </span>
                </div>
            </a>
        </li>
        <li class="denhaag-sidenav__item">
            <a href="<?php echo home_url('mijn-zaken'); ?>" <?php echo is_page('mijn-zaken') ? ' aria-current="page"' : ''; ?> class="denhaag-sidenav__link<?php echo is_page('mijn-zaken') ? ' denhaag-sidenav__link--current' : ''; ?>">
                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <path
                        d="M2 5a2 2 0 012-2h16a2 2 0 012 2v2a2 2 0 01-1.017 1.742c.011.084.017.17.017.258v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9c0-.087.006-.174.017-.258A2 2 0 012 7V5zm18 2V5H4v2h16zM5 9v10h14V9H5zm3 3a1 1 0 011-1h6a1 1 0 110 2H9a1 1 0 01-1-1z"
                        fill="currentColor" />
                </svg>
                Mijn zaken
                <div class="denhaag-badge-counter">
                    <span class="denhaag-dot-indicator denhaag-dot-indicator--overlap-rectangle">
                        <div class="denhaag-badge-counter__counter">2</div>
                        <span class="denhaag-dot-indicator__dot"></span>
                    </span>
                </div>
            </a>
        </li>
        <li class="denhaag-sidenav__item">
            <a href="<?php echo home_url('mijn-wijk'); ?>" <?php echo is_page('mijn-wijk') ? ' aria-current="page"' : ''; ?> class="denhaag-sidenav__link<?php echo is_page('mijn-wijk') ? ' denhaag-sidenav__link--current' : ''; ?>">
                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <!-- Missing icon for a map in the NLDS -->
                    <path
                        d="M2 5a2 2 0 012-2h16a2 2 0 012 2v2a2 2 0 01-1.017 1.742c.011.084.017.17.017.258v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9c0-.087.006-.174.017-.258A2 2 0 012 7V5zm18 2V5H4v2h16zM5 9v10h14V9H5zm3 3a1 1 0 011-1h6a1 1 0 110 2H9a1 1 0 01-1-1z"
                        fill="currentColor" />
                </svg>
                Mijn wijk
            </a>
        </li>
    </ul>
    <hr class="denhaag-divider" role="presentation">
    <ul class="denhaag-sidenav__list">
        <li class="denhaag-sidenav__item">
            <a href="<?php echo home_url('mijn-gegevens'); ?>" <?php echo is_page('mijn-gegevens') ? ' aria-current="page"' : ''; ?> class="denhaag-sidenav__link<?php echo is_page('mijn-gegevens') ? ' denhaag-sidenav__link--current' : ''; ?>">
                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <path
                        d="M12 4a4 4 0 100 8 4 4 0 000-8zM6 8a6 6 0 1112 0A6 6 0 016 8zm2 10a3 3 0 00-3 3 1 1 0 11-2 0 5 5 0 015-5h8a5 5 0 015 5 1 1 0 11-2 0 3 3 0 00-3-3H8z"
                        fill="currentColor"></path>
                </svg>
                Mijn gegevens
            </a>
        </li>
    </ul>
</nav>
