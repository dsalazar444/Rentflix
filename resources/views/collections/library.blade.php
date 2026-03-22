@extends('layouts.collection')
@section('collectionContent')
<link rel="stylesheet" href="{{ asset('css/collection/library.css') }}">
<div class="library-wrapper">

    @if(1==0)
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
        <h3 class="empty-title">Your library is empty</h3>
        <p class="empty-subtitle">Movies you rent will appear here</p>
        <a href="{{ route('catalog.index') }}" class="btn-explore">Explore Catalog</a>
    </div>
    @else

    {{-- Movies grid --}}
    <div class="library-grid">
        @foreach ($viewData['libraryItems'] as $item)
        <div class="library-card">
            <div class="card-poster">
                <img src="{{ asset('storage/' . $item->movie->getFileName()) }}" alt="Sample Movie" class="card-img">
                <span class="card-badge">{{ $item->movie->getClassificationCapitalized() }}</span>
            </div>

            <div class="card-info">
                <h3 class="card-title">{{ $item->movie->getTitle() }}</h3>
                <span class="card-genre">{{ $item->movie->getGenreCapitalized() }}</span>

                <div class="card-expiry expiry-ok">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Expires in 5 days
                </div>

                <span class="card-expiry-date">Apr 20, 2026</span>
            </div>
        </div>
        @endforeach

        <div class="library-card card-expiring">
            <div class="card-poster">
                <img src="https://via.placeholder.com/300x450/1a1a1a/e63946?text=Expiring+Soon" alt="Expiring Movie" class="card-img">
                <span class="card-badge">R</span>
            </div>

            <div class="card-info">
                <h3 class="card-title">Expiring Soon Movie</h3>
                <span class="card-genre">Drama</span>

                <div class="card-expiry expiry-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Expires in 2 days
                </div>

                <span class="card-expiry-date">Mar 24, 2026</span>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection