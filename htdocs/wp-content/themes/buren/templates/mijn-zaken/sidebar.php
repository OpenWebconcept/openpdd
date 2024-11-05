<?php
/**
 * Template partial for the NLDS Den Haag Sidebar navigation.
 *
 * @design https://nl-design-system.github.io/denhaag/?path=/docs/css-navigation-sidenav--default-story
 *
 * @author Paul van Impelen <paul@acato.nl>
 */
?>
<?php if(has_nav_menu('mijn-zaken-sidebar')) : ?>
	<?php get_template_part('templates/mijn-zaken/sidebar/sidebar-menu'); ?>
<?php else : ?>
<nav class="denhaag-sidenav">
    <ul class="denhaag-sidenav__list">
        <li class="denhaag-sidenav__item">
            <a href="<?php echo home_url("overzicht"); ?>" <?php echo is_page('overzicht') ? ' aria-current="page"' : '' ?> class="denhaag-sidenav__link<?php echo is_page('overzicht') ? ' denhaag-sidenav__link--current' : '' ?>">
                <svg
                    width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <path
                        d="M3 5a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm6 0H5v4h4V5zm4 0a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2V5zm6 0h-4v4h4V5zM3 15a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4zm6 0H5v4h4v-4zm4 0a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4zm6 0h-4v4h4v-4z"
                        fill="currentColor" />
                </svg>
                Overzicht
            </a>
        </li>
        <li class="denhaag-sidenav__item">
			<a href="<?php echo home_url("mijn-zaken"); ?>" <?php echo is_page('mijn-zaken') ? ' aria-current="page"' : '' ?> class="denhaag-sidenav__link<?php echo is_page('mijn-zaken') ? ' denhaag-sidenav__link--current' : '' ?>">
                <svg
                    width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
                    <path
                        d="M2 5a2 2 0 012-2h16a2 2 0 012 2v2a2 2 0 01-1.017 1.742c.011.084.017.17.017.258v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9c0-.087.006-.174.017-.258A2 2 0 012 7V5zm18 2V5H4v2h16zM5 9v10h14V9H5zm3 3a1 1 0 011-1h6a1 1 0 110 2H9a1 1 0 01-1-1z"
                        fill="currentColor" />
                </svg>
                Mijn zaken
            </a>
        </li>
		<li class="denhaag-sidenav__item">
			<a href="<?php echo home_url("formulieren"); ?>" <?php echo is_page('formulieren') ? ' aria-current="page"' : '' ?> class="denhaag-sidenav__link<?php echo is_page('formulieren') ? ' denhaag-sidenav__link--current' : '' ?>">
				<svg
                    width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="denhaag-icon" focusable="false" aria-hidden="true" shape-rendering="auto">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M19 3H14.82C14.4 1.84 13.3 1 12 1C10.7 1 9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V21C3 22.1 3.9 23 5 23H19C20.1 23 21 22.1 21 21V5C21 3.9 20.1 3 19 3ZM12 3C12.55 3 13 3.45 13 4C13 4.55 12.55 5 12 5C11.45 5 11 4.55 11 4C11 3.45 11.45 3 12 3ZM5 5V21H19V5H17V8H7V5H5Z" fill="currentColor"/>
				</svg>
                Formulieren
            </a>
        </li>
    </ul>
    <hr class="denhaag-divider" role="presentation">
    <ul class="denhaag-sidenav__list">
        <li class="denhaag-sidenav__item">
			<a href="<?php echo home_url("mijn-gegevens"); ?>" <?php echo is_page('mijn-gegevens') ? ' aria-current="page"' : '' ?> class="denhaag-sidenav__link<?php echo is_page('mijn-gegevens') ? ' denhaag-sidenav__link--current' : '' ?>">
                <svg
                    width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
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
<?php endif; ?>
