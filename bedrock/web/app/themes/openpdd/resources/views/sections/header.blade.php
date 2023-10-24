<header class="navigation-bar | bg-white">
    <div class="container | flex h-24 items-center justify-between">
        @include('partials.header.brand')

        @include('partials.header.navigation')

        @include('partials.header.hamburger')

        @include('partials.header.login-btn', [
            'classes' => 'hidden lg:flex items-center',
        ])
    </div>
</header>

@include('partials.header.mobile-menu')
