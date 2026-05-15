<!-- Made by: Samuel Martínez Arteaga -->

<header class="rentflix-header guest-header">
    <div class="header-container">
        <a href="{{ route('movie.index') }}" class="header-logo" aria-label="{{ __('headerGuest.goHome') }}">
            <img src="{{ asset('images/logoRentflix.png') }}" alt="RentFlix Logo" class="logo-img">
        </a>

        <nav class="header-nav">
            <a href="{{ route('movie.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>{{ __('headerGuest.movies') }}</span>
            </a>

            <form action="{{ route('movie.search') }}" method="GET" class="header-search-form">
                <div class="header-search">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" name="movie_name" class="search-input" placeholder="{{ __('headerClient.searchPlaceholder') }}" required>
                </div>
            </form>
        </nav>

        <div class="header-actions">
            <a href="{{ route('auth.index') }}" class="auth-link-btn">{{ __('headerGuest.login') }}</a>
        </div>
    </div>
</header>