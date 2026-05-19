<!-- Made by: Samuel Martínez Arteaga -->

<header class="rentflix-header admin-header">
    <div class="header-container">
        <a href="{{ route('admin.movie.index') }}" class="header-logo" aria-label="{{ __('headerAdmin.goAdminPanel') }}">
            <img src="{{ asset('images/logoRentflix.png') }}" alt="RentFlix Logo" class="logo-img">
        </a>

        <nav class="header-nav">
            <a href="{{ route('admin.movie.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>{{ __('headerAdmin.moviesPanel') }}</span>
            </a>

            <a href="{{ route('admin.bill.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>{{ __('headerAdmin.billsPanel') }}</span>
            </a>

            <a href="{{ route('movie.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4l2-3h2l2 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2z"></path>
                    <circle cx="12" cy="13" r="3"></circle>
                </svg>
                <span>{{ __('headerAdmin.movies') }}</span>
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
            <button class="action-btn" aria-label="{{ __('headerAdmin.notifications') }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
            </button>

            <div class="profile-menu-wrapper">
                <button class="action-btn profile-btn profile-menu-toggle" aria-label="{{ __('headerAdmin.adminProfile') }}" aria-expanded="false">
                    <span class="profile-initial">{{ 'A' }}</span>
                </button>

                <div class="profile-menu" role="menu" aria-hidden="true">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="profile-menu-item" role="menuitem">{{ __('headerAdmin.logout') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>