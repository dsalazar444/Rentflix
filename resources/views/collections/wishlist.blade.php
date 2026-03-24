<!-- Samuel Martinez Arteaga -->

@extends('layouts.collection')
@section('collectionContent')
<link rel="stylesheet" href="{{ asset('css/collections/collections.css') }}">
<div class="library-wrapper">
	@if($viewData['wishlistItems']->isEmpty())
	<div class="empty-state">
		<div class="empty-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
				fill="none" stroke="currentColor" stroke-width="1.5">
				<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
			</svg>
		</div>
		<h3 class="empty-title">Tu wishlist está vacía</h3>
		<p class="empty-subtitle">Agrega pelis desde el catálogo para verlas aquí</p>
		<a href="{{ route('catalog.index') }}" class="btn-explore">Explorar Catálogo</a>
	</div>
	@else
	<div class="library-grid">
		@foreach($viewData['wishlistItems'] as $wishlistItem)
			@if($wishlistItem->movie)
			<a href="{{ route('catalog.show', ['id' => $wishlistItem->movie->getId()]) }}" class="library-card" style="text-decoration: none;">
				<div class="card-poster">
					<img src="{{ asset('storage/' . $wishlistItem->movie->getFileName()) }}" alt="{{ $wishlistItem->movie->getTitle() }}" class="card-img">
					<span class="card-badge">{{ $wishlistItem->movie->getClassificationCapitalized() }}+</span>
				</div>

				<div class="card-info">
					<h3 class="card-title">{{ $wishlistItem->movie->getTitle() }}</h3>
					<span class="card-genre">{{ $wishlistItem->movie->getGenre() }}</span>

					<div class="card-expiry {{ $wishlistItem->movie->getQuantity() > 0 ? 'expiry-ok' : 'expiry-warning' }}">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
							fill="none" stroke="currentColor" stroke-width="2">
							<circle cx="12" cy="12" r="10"/>
						</svg>
						{{ $wishlistItem->movie->getQuantity() > 0 ? 'Disponible' : 'Sin stock' }}
					</div>

					<span class="card-expiry-date">{{ $wishlistItem->movie->getYear() }} · {{ $wishlistItem->movie->getFormatCapitalized() }}</span>
				</div>
			</a>
			@endif
		@endforeach
	</div>
	@endif
</div>
@endsection