@extends('layouts.collection')
@section('collectionContent')
<link rel="stylesheet" href="{{ asset('css/collections/collections.css') }}">
<div class="library-wrapper">

    @if($viewData['libraryItems']->count() == 0)
    <div class="empty-state">
        <div class="empty-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/>
                <line x1="7" y1="2" x2="7" y2="22"/>
                <line x1="17" y1="2" x2="17" y2="22"/>
                <line x1="2" y1="12" x2="22" y2="12"/>
                <line x1="2" y1="7" x2="7" y2="7"/>
                <line x1="2" y1="17" x2="7" y2="17"/>
                <line x1="17" y1="17" x2="22" y2="17"/>
                <line x1="17" y1="7" x2="22" y2="7"/>
            </svg>
        </div>
        <h3 class="empty-title">Tu libreria esta vacia</h3>
        <p class="empty-subtitle">Las peliculas que alquilas apareceran aqui</p>
        <a href="{{ route('catalog.index') }}" class="btn-explore">Explorar Catalogo</a>
    </div>
    @else

    <!-- Movies -->

    @if($viewData['expiringSoon']->count() > 0)
    <div class="notifications-container">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2" class="notification-icon">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3.05h16.94a2 2 0 0 0 1.71-3.05L13.71 3.86a2 2 0 0 0-3.42 0z"/>
            <line x1="12" y1="9" x2="12" y2="13"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
        </svg>
        <div class="notifications-list">
            @foreach($viewData['expiringSoon'] as $item)
            <div class="alert-expiring"> En {{ $item->getDaysUntilExpiration() }} dias expira: {{ $item->movie->getTitle() }}</div>
            @endforeach
        </div>
    </div>
    @endif
    <div class="library-grid">
        @foreach ($viewData['libraryItems'] as $item)
        <a href="{{ route('catalog.show', ['id' => $item->movie->getId()]) }}" target="_blank" class="library-card {{ $item->getDaysUntilExpiration() <= 3 ? 'card-expiring' : '' }}" style="text-decoration: none; color: inherit;">
            <div class="card-poster">
                <img src="{{ asset('storage/' . $item->movie->getFileName()) }}" alt="Sample Movie" class="card-img">
                <span class="card-badge">{{ $item->movie->getClassificationCapitalized() }}</span>
            </div>

            <div class="card-info">
                <h3 class="card-title">{{ $item->movie->getTitle() }}</h3>
                <span class="card-genre">{{ $item->movie->getGenreCapitalized() }}</span>

                <div class="card-expiry {{ $item->getDaysUntilExpiration() <= 3 ? 'expiry-warning' : 'expiry-ok' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Expira en {{ $item->getDaysUntilExpiration() }} dias
                </div>

                <span class="card-expiry-date">{{ $item->getExpirationDate() }}</span>
            </div>
        </a>
        @endforeach
        
    </div>
    @endif

</div>
@endsection