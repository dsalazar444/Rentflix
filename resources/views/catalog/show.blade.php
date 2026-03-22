@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/catalog/show.css') }}">
<div class="movie-detail-wrapper">

    <div class="movie-detail-container">

        <div class="movie-poster-col">
            <div class="movie-poster">
                <img src="{{ asset('storage/' . $viewData['movie']->getFileName()) }}" alt="{{ $viewData['movie']->getTitle() }}" class="poster-img">
            </div>

            <button class="btn-rent">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                Reservar
            </button>

            <a href="{{ $viewData['movie']->getTrailerLink() }}" target="_blank" class="btn-trailer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="5 3 19 12 5 21 5 3"/>
                </svg>
                Ver Trailer
            </a>
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
                        Director
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
                        Año de estreno
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
                        Genero
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getGenre() }}</span>
                </div>

                <div class="spec-item">
                    <span class="spec-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        </svg>
                        Formato
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
                        Clasificacion
                    </span>
                    <span class="spec-value">{{ $viewData['movie']->getClassificationCapitalized() }}+</span>
                </div>

            </div>
            <div class="divider"></div>

            <div class="stats-row">
                <div class="stat-box">
                    <span class="stat-number">${{ $viewData['movie']->getPrice() }}</span>
                    <span class="stat-label">Precio de renta</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number {{ $viewData['movie']->getQuantity() > 0 ? 'stat-available' : 'stat-unavailable' }}">
                        @if($viewData['movie']->getQuantity()) 
                            Disponible
                        @else
                            Agotada
                        @endif
                    </span>
                    <span class="stat-label">Estado</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $viewData['movie']->getQuantityViews() }}</span>
                    <span class="stat-label">Total Vistas</span>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection