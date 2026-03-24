<!-- Daniela Salazar Amaya -->

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/movie/result.css') }}">
<link rel="stylesheet" href="{{ asset('css/catalog/index.css') }}">

<div class="catalog-wrapper">
    <section class="movies-section">
        <div class="movies-header">
            <h2 class="section-title">Resultados</h2>
            <span class="movies-count">Coincidencias con {{ $viewData['query'] }} </span>
        </div>

        @if($viewData['notFound'])
            <div class="no-results-message">
                <p >No hay coincidencias para "{{ $viewData['query'] }}"</p>
                <a href="{{ route('catalog.index') }}" class="btn-return">Volver al catálogo</a>
            </div>
        @else
        <div class="movies-grid">
            @foreach ($viewData['movies'] as $movie)
            <a href="{{ route('catalog.show', ['id' => $movie->getId()]) }}" class="movie-card">
                
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
        @endif
    </section>
</div>
@endsection