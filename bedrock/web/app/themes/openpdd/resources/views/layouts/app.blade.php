<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header')

@hasSection('sidebar')
    <aside class="sidebar">
        @yield('sidebar')
    </aside>
@endif

<main id="main" class="main">
    @yield('content')
</main>

@include('sections.footer')
