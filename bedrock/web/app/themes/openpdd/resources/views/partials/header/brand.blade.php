<div class="flex items-center">
    @if (has_custom_logo())
        {!! get_custom_logo() !!}
    @else
        <a href="{{ home_url('/') }}">
            {!! $siteName !!}
        </a>
    @endif
</div>
