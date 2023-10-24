<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header')

<main id="main" class="flex-auto my-12">
    <div class="container flex flex-col lg:flex-row">
        <div class="sidebar">
            @yield('sidebar')
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</main>

@include('sections.footer')
