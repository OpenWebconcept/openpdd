<div id="js-mobile-menu"
    class="mobile-menu | ease-in-out invisible fixed top-24 bottom-0 left-0 right-0 z-10 w-full bg-white opacity-0 transition-all duration-500">
    <div class="flex flex-col items-start justify-center h-full space-y-8 overflow-y-scroll">
        @php
            if (has_nav_menu('primary_navigation')) {
                wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'mobile-menu-navigation | list-none mb-0 list-none pr-4',
                    'container' => '',
                    'id' => '',
                ]);
            }
        @endphp
        @include('partials.header.login-btn')
        <button id="js-mobile-menu-close-btn"
            class="sr-only btn btn-primary focus:not-sr-only">{{ __('Sluiten', 'sage') }}
        </button>
    </div>
</div>
