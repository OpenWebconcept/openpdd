<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header')

<main id="main" class="flex-auto my-12">
    @yield('content')
</main>

@include('sections.footer')
