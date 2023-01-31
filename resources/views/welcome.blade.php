@if (Route::has('login'))
    <ul>
        @auth
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        @else
            <li><a href="{{ route('login') }}">
                <!-- {{ __('Log in') }} -->

                Log in
            </a></li>

            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @endauth
    </ul>
@endif
