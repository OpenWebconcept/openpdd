<?php

declare(strict_types=1);

if (is_user_logged_in()) : ?>
    <?php
    $current_user = wp_get_current_user();
    $first_name = $current_user->first_name ? $current_user->first_name : $current_user->user_login;
    ?>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle white-space-nowrap" aria-expanded="false" aria-haspopup="true">
            <?php echo esc_html($first_name); ?>
        </button>
        <div class="shadow dropdown-menu dropdown-menu-right" aria-hidden="true">
            <div class="mb-2 dropdown-item d-flex justify-content-between align-items-center font-weight-bold" href="<?php echo home_url('/overzicht'); ?>">
                <?php _e('Mijn HW', 'openpdd-hoeksche-waard'); ?>
                <button class="dropdown-button-close" aria-label="<?php _e('Sluiten', 'openpdd-hoeksche-waard'); ?>">
                    <svg width="16" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.292893 0.792893C0.683417 0.402369 1.31658 0.402369 1.70711 0.792893L7 6.08579L12.2929 0.792893C12.6834 0.402369 13.3166 0.402369 13.7071 0.792893C14.0976 1.18342 14.0976 1.81658 13.7071 2.20711L8.41421 7.5L13.7071 12.7929C14.0976 13.1834 14.0976 13.8166 13.7071 14.2071C13.3166 14.5976 12.6834 14.5976 12.2929 14.2071L7 8.91421L1.70711 14.2071C1.31658 14.5976 0.683417 14.5976 0.292893 14.2071C-0.0976311 13.8166 -0.0976311 13.1834 0.292893 12.7929L5.58579 7.5L0.292893 2.20711C-0.0976311 1.81658 -0.0976311 1.18342 0.292893 0.792893Z" fill="#4D4D54" />
                    </svg>
                </button>
            </div>
            <a class="dropdown-item d-flex justify-content-between align-items-center <?php echo is_page('mijn-gegevens') ? 'active' : ''; ?>" href="<?php echo home_url('/mijn-gegevens'); ?>">
                <?php _e('Mijn gegevens', 'openpdd-hoeksche-waard'); ?>
                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2C6.79086 2 5 3.79086 5 6C5 8.20914 6.79086 10 9 10C11.2091 10 13 8.20914 13 6C13 3.79086 11.2091 2 9 2ZM3 6C3 2.68629 5.68629 0 9 0C12.3137 0 15 2.68629 15 6C15 9.31371 12.3137 12 9 12C5.68629 12 3 9.31371 3 6ZM5 16C3.34315 16 2 17.3431 2 19C2 19.5523 1.55228 20 1 20C0.447715 20 0 19.5523 0 19C0 16.2386 2.23858 14 5 14H13C15.7614 14 18 16.2386 18 19C18 19.5523 17.5523 20 17 20C16.4477 20 16 19.5523 16 19C16 17.3431 14.6569 16 13 16H5Z" fill="#4D4D54" />
                </svg>
            </a>
            <a class="dropdown-item d-flex justify-content-between align-items-center" href="<?php echo wp_logout_url(); ?>">
                <?php _e('Uitloggen', 'openpdd-hoeksche-waard'); ?>
                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-n1">
                    <path d="M5.36442e-07 2.5C5.96046e-07 1.39543 0.89543 0.5 2 0.5L11 0.5C12.1046 0.5 13 1.39543 13 2.5L13 4.5C13 5.05229 12.5523 5.5 12 5.5C11.4477 5.5 11 5.05228 11 4.5L11 2.5L2 2.5L2 14.5H11V12.5C11 11.9477 11.4477 11.5 12 11.5C12.5523 11.5 13 11.9477 13 12.5V14.5C13 15.6046 12.1046 16.5 11 16.5H2C0.895431 16.5 0 15.6046 0 14.5L5.36442e-07 2.5ZM15.2929 4.79289C15.6834 4.40237 16.3166 4.40237 16.7071 4.79289L19.7071 7.79289C20.0976 8.18342 20.0976 8.81658 19.7071 9.20711L16.7071 12.2071C16.3166 12.5976 15.6834 12.5976 15.2929 12.2071C14.9024 11.8166 14.9024 11.1834 15.2929 10.7929L16.5858 9.5H7C6.44772 9.5 6 9.05228 6 8.5C6 7.94772 6.44772 7.5 7 7.5L16.5858 7.5L15.2929 6.20711C14.9024 5.81658 14.9024 5.18342 15.2929 4.79289Z" fill="#4D4D54" />
                </svg>

            </a>
        </div>
    </div>
<?php else : ?>
    <a href="<?php echo home_url('/inloggen'); ?>" class="btn btn-primary white-space-nowrap">
        <svg width="23" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 3.33317C8.15905 3.33317 6.66667 4.82555 6.66667 6.6665C6.66667 8.50745 8.15905 9.99984 10 9.99984C11.8409 9.99984 13.3333 8.50745 13.3333 6.6665C13.3333 4.82555 11.8409 3.33317 10 3.33317ZM5 6.6665C5 3.90508 7.23858 1.6665 10 1.6665C12.7614 1.6665 15 3.90508 15 6.6665C15 9.42793 12.7614 11.6665 10 11.6665C7.23858 11.6665 5 9.42793 5 6.6665ZM6.66667 14.9998C5.28595 14.9998 4.16667 16.1191 4.16667 17.4998C4.16667 17.9601 3.79357 18.3332 3.33333 18.3332C2.8731 18.3332 2.5 17.9601 2.5 17.4998C2.5 15.1986 4.36548 13.3332 6.66667 13.3332H13.3333C15.6345 13.3332 17.5 15.1987 17.5 17.4998C17.5 17.9601 17.1269 18.3332 16.6667 18.3332C16.2064 18.3332 15.8333 17.9601 15.8333 17.4998C15.8333 16.1191 14.714 14.9998 13.3333 14.9998H6.66667Z" fill="white" />
        </svg>
        <?php _e('Mijn HW', 'openpdd-hoeksche-waard'); ?>
    </a>
<?php endif; ?>