<!-- Made by: Samuel Martínez Arteaga -->

@php
$profileInitial = $profileInitial ?? 'R';
$cartMovieItems = $cartMovieItems ?? collect();
$cartCount = $cartCount ?? 0;
$cartSubtotal = $cartSubtotal ?? 0;
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
            <a href="{{ route('collections.library') }}" class="nav-item">
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
            <a href="{{ route('collections.wishlist') }}">
                <button class="action-btn favorites-btn" aria-label="Favoritos">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </button>
            </a>
            <button class="action-btn cart-btn" aria-label="Carrito" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="cart-badge">{{ $cartCount }}</span>
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

<div class="offcanvas offcanvas-end cart-offcanvas" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
    <div class="offcanvas-header cart-offcanvas-header">
        <h5 class="offcanvas-title" id="cartOffcanvasLabel">Mi carrito</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>

    <div class="offcanvas-body cart-offcanvas-body">
        <div class="cart-items" aria-live="polite">
            @if($cartMovieItems->isEmpty())
            <div class="cart-empty-state">
                <p class="cart-empty-title">Tu carrito esta vacio</p>
                <p class="cart-empty-subtitle">Agrega peliculas para verlas aqui.</p>
            </div>
            @else
            <div class="cart-item-list">
                @foreach($cartMovieItems as $movie)
                <div class="cart-item-card">
                    <img src="{{ asset('storage/' . $movie->getFileName()) }}" alt="{{ $movie->getTitle() }}" class="cart-item-thumb">
                    <div class="cart-item-info">
                        <p class="cart-item-title">{{ $movie->getTitle() }}</p>
                        <p class="cart-item-meta">{{ $movie->getGenreCapitalized() }} · {{ $movie->getYear() }}</p>
                        <div class="cart-item-row">
                            <strong class="cart-item-price">${{ number_format($movie->getPrice(), 2) }}</strong>
                            <form action="{{ route('cart.remove', ['id' => $movie->getId()]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cart-item-remove">Quitar</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="cart-summary">
            <div class="cart-summary-row">
                <span>Subtotal</span>
                <strong>${{ number_format($cartSubtotal, 2) }}</strong>
            </div>
            <div class="cart-summary-row">
                <span>Total</span>
                <strong>${{ number_format($cartSubtotal, 2) }}</strong>
            </div>
            <button class="cart-checkout-btn" type="button" {{ $cartMovieItems->isEmpty() ? 'disabled' : '' }}>Finalizar compra</button>
        </div>
    </div>
</div>