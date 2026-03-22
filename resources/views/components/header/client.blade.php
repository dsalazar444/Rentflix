<!-- Made by: Samuel Martínez Arteaga -->

@php
    $profileInitial = session()->has('user_id') ? 'C' : 'R';
@endphp

<header class="rentflix-header client-header">
    <div class="header-container">
        <a href="{{ route('catalog.index') }}" class="header-logo" aria-label="Ir al catalogo">
            <img src="{{ asset('images/logoRentflix.png') }}" alt="RentFlix Logo" class="logo-img">
        </a>

        <nav class="header-nav">
            <a href="{{ route('catalog.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Catalogo</span>
            </a>
            <a href="{{ route('collection.library') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4l2-3h2l2 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2z"></path>
                    <circle cx="12" cy="13" r="3"></circle>
                </svg>
                <span>Mi Biblioteca</span>
            </a>
        </nav>

        <div class="header-search">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="search-input" placeholder="Buscar peliculas...">
        </div>

        <div class="header-actions">
            <button class="action-btn favorites-btn" aria-label="Favoritos">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </button>
            <button class="action-btn cart-btn" aria-label="Carrito">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </button>

            <div class="profile-menu-wrapper">
                <button class="action-btn profile-btn profile-menu-toggle" aria-label="Perfil" aria-expanded="false">
                    <span class="profile-initial">{{ $profileInitial }}</span>
                </button>

                <div class="profile-menu" role="menu" aria-hidden="true">
                    <a href="{{ route('auth.logout') }}" class="profile-menu-item" role="menuitem">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>
</header>
