@if (has_nav_menu('primary_navigation'))
    <nav class="hidden mx-auto lg:flex" aria-label="{{ __('Primaire navigatie', 'sage') }}">
        @php
            wp_nav_menu([
                'container' => '',
                'depth' => 2,
                'id' => '',
                'menu_class' => 'nav flex align-center justify-center list-none h-full mb-0 ',
                'theme_location' => 'primary_navigation',
            ]);
        @endphp
    </nav>
@endif
