<!-- Laura Andrea Castrillón Fajardo -->

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/catalog/show.css') }}">
<div class="movie-detail-wrapper">

    <div class="movie-detail-container">

        <div class="movie-poster-col">
            <div class="movie-poster">
                <img src="{{ asset('storage/' . $viewData['movie']->getFileName()) }}" alt="{{ $viewData['movie']->getTitle() }}" class="poster-img">
            </div>

            <form action="{{ route('cart.add', ['id' => $viewData['movie']->getId()]) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-rent {{ $viewData['isInShoppingCart'] ? 'btn-rent-disabled' : '' }}" {{ $viewData['isInShoppingCart'] ? 'disabled' : '' }} aria-disabled="{{ $viewData['isInShoppingCart'] ? 'true' : 'false' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                    </svg>
                    {{ $viewData['isInShoppingCart'] ? __('catalogShow.alreadyInCartButton') : __('catalogShow.addToCartButton') }}
                </button>
            </form>

            <a href="{{ $viewData['movie']->getTrailerLink() }}" target="_blank" class="btn-trailer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="5 3 19 12 5 21 5 3"/>
                </svg>
                @if($viewData['isInLibrary'])
                    {{ __('catalogShow.watchMovieButton') }}
                @else
                    {{ __('catalogShow.watchTrailerButton') }}
                @endif
            </a>

            <form action="{{ route($viewData['isInWishlist'] ? 'collections.wishlist.delete' : 'collections.wishlist.add', ['id' => $viewData['movie']->getId()]) }}" method="POST" style="display: inline;">
                @csrf
                @if($viewData['isInWishlist'])
                    @method('DELETE')
                @endif
                <button type="submit" class="btn-wishlist {{ $viewData['isInWishlist'] ? 'btn-wishlist-remove' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                    {{ $viewData['isInWishlist'] ? __('catalogShow.removeFromWishlistButton') : __('catalogShow.addToWishlistButton') }}
                </button>
            </form>
        </div>

        <div class="movie-info-col">

            <div class="movie-heading">
                <h1 class="movie-title">{{ $viewData['movie']->getTitle() }}</h1>
                <div class="movie-subtitle">
                    <span class="movie-director">{{ $viewData['movie']->getDescription() }}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="specs-grid">

                <div class="spec-item">
                    <span class="spec-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        {{ __('catalogShow.specLabels.director') }}
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getDirector() }}</span>
                </div>

                <div class="spec-item">
                    <span class="spec-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v4l3 3"/>
                        </svg>
                        {{ __('catalogShow.specLabels.releaseYear') }}
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getYear() }}</span>
                </div>

                <div class="spec-item">
                    <span class="spec-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/>
                            <line x1="4" y1="22" x2="4" y2="15"/>
                        </svg>
                        {{ __('catalogShow.specLabels.genre') }}
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getGenreCapitalized() }}</span>
                </div>

                <div class="spec-item">
                    <span class="spec-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        </svg>
                        {{ __('catalogShow.specLabels.format') }}
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getFormatCapitalized() }}</span>
                </div>

                <div class="spec-item">
                    <span class="spec-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2z"/>
                            <path d="M12 8v4l3 3"/>
                        </svg>
                        {{ __('catalogShow.specLabels.classification') }}
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getClassificationCapitalized() }}+</span>
                </div>

            </div>
            <div class="divider"></div>

            <div class="stats-row">
                <div class="stat-box">
                    <span class="stat-number">${{ $viewData['movie']->getPrice() }}</span>
                    <span class="stat-label">{{ __('catalogShow.rentalPrice') }}</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number {{ $viewData['movie']->getQuantity() > 0 ? 'stat-available' : 'stat-unavailable' }}">
                        @if($viewData['movie']->getQuantity()) 
                            {{ __('catalogShow.statusAvailable') }}
                        @else
                            {{ __('catalogShow.statusSoldOut') }}
                        @endif
                    </span>
                    <span class="stat-label">{{ __('catalogShow.status') }}</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $viewData['movie']->getQuantityViews() }}</span>
                    <span class="stat-label">{{ __('catalogShow.totalViews') }}</span>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection