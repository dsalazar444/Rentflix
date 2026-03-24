<!-- Laura Andrea Castrillón Fajardo -->

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/catalog/index.css') }}">
<div class="catalog-wrapper">

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="section-header">
            <h2 class="section-title"><em>Destacados</em></h2>
        </div>
        <div class="featured-carousel" id="featured-carousel">
            @forelse ($viewData['featured'] as $movie)
            <a href="{{ route('catalog.show', ['id' => $movie['id']]) }}" class="featured-card" title="{{ $movie->getTitle() }}">
                <span class="featured-rank">{{ $loop->iteration }}</span>
                <img src="{{ asset('storage/' . $movie->getFileName()) }}" alt="{{ $movie->getTitle() }}" class="featured-img">
            </a>
            @empty
            <div class="featured-card">
                <img src="https://images.unsplash.com/photo-1489599849228-13a0f07cc6c3?w=800&h=400&fit=crop" alt="Sin destacados" class="featured-img">
            </div>
            @endforelse
        </div>
    </section>

    <!-- Newly added -->
    <section class="newdly-section">
        <h2 class="section-title">Recien Agregadas</h2>
        <div class="newdly-list">
            @foreach ($viewData['newdlyAdded'] as $movie)
            <div class="newdly-item">
                <div class="newdly-date">
                    <span class="newdly-date-month">{{ $movie->getMonthCreatedAt() }}</span>
                    <span class="newdly-date-day">{{ $movie->getDayCreatedAt() }}</span>
                </div>
                <img src="{{ asset('storage/' . $movie->getFileName()) }}" alt="{{ $movie->getTitle() }}" class="newdly-thumb">
                <div class="newdly-info">
                    <span class="newdly-title">{{ $movie->getTitle() }}</span>
                    <span class="newdly-meta">{{ $movie->getGenreCapitalized() }} • {{ $movie->getClassificationCapitalized() }}</span>
                </div>
                <div class="newdly-actions">
                    <a href="{{ route('catalog.show', ['id' => $movie['id']]) }}" class="btn-reserve">EXPLORAR</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Filters -->
    <div class="filters-bar">
        <div class="filters-left">
            <button class="filter-icon-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="4" y1="6" x2="20" y2="6"/>
                    <line x1="8" y1="12" x2="16" y2="12"/>
                    <line x1="11" y1="18" x2="13" y2="18"/>
                </svg>
                Filtros
            </button>
            <div class="genre-tags">
                <a href="{{ route('catalog.index', ['genre' => 'all', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'all' ? 'active' : '' }}">Todos</a>
                <a href="{{ route('catalog.index', ['genre' => 'Acción', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Acción' ? 'active' : '' }}">Acción</a>
                <a href="{{ route('catalog.index', ['genre' => 'Aventuras', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Aventuras' ? 'active' : '' }}">Aventuras</a>
                <a href="{{ route('catalog.index', ['genre' => 'Animación', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Animación' ? 'active' : '' }}">Animación</a>
                <a href="{{ route('catalog.index', ['genre' => 'Drama', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Drama' ? 'active' : '' }}">Drama</a>
                <a href="{{ route('catalog.index', ['genre' => 'Fantasía', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Fantasía' ? 'active' : '' }}">Fantasía</a>
                <a href="{{ route('catalog.index', ['genre' => 'Terror', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Terror' ? 'active' : '' }}">Terror</a>
                <a href="{{ route('catalog.index', ['genre' => 'Romántico', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Romántico' ? 'active' : '' }}">Romántico</a>
                <a href="{{ route('catalog.index', ['genre' => 'Sci-Fi', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Sci-Fi' ? 'active' : '' }}">Sci-Fi</a>
                <a href="{{ route('catalog.index', ['genre' => 'Policiales', 'sort' => $viewData['selectedSort']]) }}" class="genre-tag {{ $viewData['selectedGenre'] === 'Policiales' ? 'active' : '' }}">Policiales</a>
            </div>
        </div>
        <div class="filters-right">
            <form action="{{ route('catalog.index') }}" method="GET">
                <input type="hidden" name="genre" value="{{ $viewData['selectedGenre'] }}">
                <select class="sort-select" name="sort" onchange="this.form.submit()">
                    <option value="priceAsc" {{ $viewData['selectedSort'] === 'priceAsc' ? 'selected' : '' }}>Precio: menor a mayor</option>
                    <option value="priceDesc" {{ $viewData['selectedSort'] === 'priceDesc' ? 'selected' : '' }}>Precio: mayor a menor</option>
                    <option value="available" {{ $viewData['selectedSort'] === 'available' ? 'selected' : '' }}>Disponibles</option>
                </select>
            </form>
        </div>
    </div>

    <!-- All Movies -->
    <section class="movies-section">
        <div class="movies-header">
            <h2 class="section-title">Todas las Películas</h2>
            <span class="movies-count">{{ $viewData['moviesCount'] }} películas encontradas</span>
        </div>
        <div class="movies-grid">
            @foreach ($viewData['movies'] as $movie)
            <a href="{{ route('catalog.show', ['id' => $movie['id']]) }}" class="movie-card">
                
                <span class="rating-badge">{{ $movie->getClassificationCapitalized() }}</span>

                <div class="card-poster">
                    <img src="{{ asset('storage/' . $movie->getFileName()) }}" alt="{{ $movie->getTitle() }}" class="card-img">
                    <div class="card-overlay">
                        <span class="btn-reserve-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            Reservar
                        </span>
                    </div>
                </div>

                <div class="card-info">
                    <h3 class="card-title">{{ $movie->getTitle() }}</h3>
                    <div class="card-meta">
                        <span class="card-genre">{{ $movie->getGenreCapitalized() }}</span>
                        <span class="card-year">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="#22c55e" stroke="#22c55e" stroke-width="1">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            {{ $movie->getYear() }}
                        </span>
                    </div>
                    <div class="card-footer">
                        <span class="card-price">${{ $movie->getPrice() }}</span>
                        <span class="card-status available">
                            @if ($movie->getQuantity() > 0)
                                Disponible
                            @else
                                Agotada
                            @endif
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>

</div>
@endsection