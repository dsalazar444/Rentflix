<!-- Made by: Samuel Martínez Arteaga -->

@php
    $profileInitial = session()->has('user_id') ? 'A' : 'R';
@endphp

<header class="rentflix-header admin-header">
    <div class="header-container">
        <a href="{{ route('admin.movie.index') }}" class="header-logo" aria-label="Ir al panel admin">
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
                <span>Panel de Peliculas</span>
            </a>

            <a href="{{ route('admin.bill.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Panel de Facturas</span>
            </a>

            <a href="{{ route('catalog.index') }}" class="nav-item">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4l2-3h2l2 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2z"></path>
                    <circle cx="12" cy="13" r="3"></circle>
                </svg>
                <span>Catalogo</span>
            </a>
        </nav>

        <div class="header-actions">
            <button class="action-btn" aria-label="Notificaciones">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
            </button>

            <div class="profile-menu-wrapper">
                <button class="action-btn profile-btn profile-menu-toggle" aria-label="Perfil administrador" aria-expanded="false">
                    <span class="profile-initial">{{ $profileInitial }}</span>
                </button>

                <div class="profile-menu" role="menu" aria-hidden="true">
                    <a href="{{ route('auth.logout') }}" class="profile-menu-item" role="menuitem">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>
</header>
