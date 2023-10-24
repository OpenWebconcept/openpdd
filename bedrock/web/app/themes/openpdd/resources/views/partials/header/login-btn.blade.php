@php
    $classes = $classes ?? '';
@endphp
<a href="{{ home_url() }}" class="login-btn | flex items-center text-white wp-block-button__link {{ $classes }}">
    <div class="w-5 h-5 mr-4">
        {!! asset('/images/icons/arrow-right-to-bracket.svg')->contents() !!}
    </div>
    Inloggen
</a>
