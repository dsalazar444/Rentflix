<!-- Laura Andrea Castrillón Fajardo -->

@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/admin/movie.index.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
@endsection

@section('content')
<div class="admin-panel">

	<div class="panel-header">
		<a href="{{ route('admin.movie.index') }}" class="btn-add text-decoration-none ms-auto">
			<span>←</span> Volver
		</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success alert-notify-m">
			{{ session('success') }}
		</div>
	@endif

	@if(session('error'))
		<div class="alert alert-danger alert-notify-m">
			{{ session('error') }}
		</div>
	@endif

	<div class="movie-modal-content">
		<div class="modal-header movie-modal-header">
			<h5 class="modal-title" id="movieModalLabel">{{ __('adminMovieModalCreate.modalTitle') }}</h5>
		</div>

		<div class="modal-body">
			<form id="externalSearchForm" action="{{ route('admin.movie.searchMovieExternalApi') }}" method="POST" class="mb-3">
				@csrf
				<label for="external_title">{{ __('adminMovieModalCreate.titleLabel') }}</label>
				<div style="display:flex; gap:0.5rem; align-items:center;">
					<input type="text" id="external_title" name="title"
						value="{{ old('title', $viewData['movie']['title'] ?? '') }}"
						class="movie-input @error('title') is-invalid @enderror"
						placeholder="{{ __('adminMovieModalCreate.titlePlaceholder') }}">
					<button id="btnExternalSearch" type="submit" class="search-btn">Buscar</button>
				</div>
				@error('title')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</form>

			<form id="movieForm" action="{{ route('admin.movie.save') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<input type="hidden" id="title" name="title" value="{{ old('title', $viewData['movie']['title'] ?? '') }}">

				<div class="movie-form-group mb-3">
					<label for="storage">{{ __('adminMovieModalCreate.storageLabel') }}</label>
					<select id="storage" name="storage"
						class="movie-input @error('storage') is-invalid @enderror">
						<option value="gcp" {{ old('storage', 'gcp') === 'gcp' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.storageOptions.gcp') }}</option>
						<option value="local" {{ old('storage') === 'local' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.storageOptions.local') }}</option>
					</select>
					@error('storage')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="row mb-3 align-items-start">
					<div class="col-md-3 text-center">
						<label class="d-block mb-2">{{ __('adminMovieModalCreate.imageLabel') }}</label>
						@php
							$existingFile = old('file_name', $viewData['movie']['file_name'] ?? '');
						@endphp
						<div class="poster-wrapper">
							<img id="posterPreview" class="poster-preview" src="{{ $existingFile }}" alt="Poster"
								@if(empty($existingFile)) hidden @endif>

							<div id="noImagePlaceholder" class="no-image-placeholder" @if(!empty($existingFile)) hidden @endif>
								{{ __('adminMovieModalCreate.noImageYet') }}
							</div>
						</div>
					</div>

					<div class="col-md-9">
						<div class="movie-form-group mb-2">
							<input type="file" id="movie_image" name="movie_image"
								class="movie-input @error('movie_image') is-invalid @enderror">
							@error('movie_image')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>

						<div class="movie-form-group">
							<input type="text" id="file_name" name="file_name"
								value="{{ old('file_name', $viewData['movie']['file_name'] ?? '') }}"
								class="movie-input @error('file_name') is-invalid @enderror">
							@error('file_name')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col movie-form-group">
						<label for="genre">{{ __('adminMovieModalCreate.genreLabel') }}</label>
						<input type="text" id="genre" name="genre"
							value="{{ old('genre', $viewData['movie']['genre'] ?? '') }}"
							class="movie-input @error('genre') is-invalid @enderror">
						@error('genre')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<div class="col movie-form-group">
						<label for="classification">{{ __('adminMovieModalCreate.classificationLabel') }}</label>
						<input type="text" id="classification" name="classification"
							value="{{ old('classification', $viewData['movie']['classification'] ?? '') }}"
							class="movie-input @error('classification') is-invalid @enderror">
						@error('classification')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<div class="col movie-form-group">
						<label for="year">{{ __('adminMovieModalCreate.yearLabel') }}</label>
						<input type="number" id="year" name="year"
									value="{{ old('year', $viewData['movie']['year'] ?? date('Y')) }}"
							min="1900" max="{{ date('Y') }}"
							class="movie-input @error('year') is-invalid @enderror">
						@error('year')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<div class="col movie-form-group">
						<label for="price">{{ __('adminMovieModalCreate.priceLabel') }}</label>
						<input type="number" id="price" name="price"
									value="{{ old('price', 0) }}"
							min="0" step="0.01"
							class="movie-input @error('price') is-invalid @enderror">
						@error('price')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>

				<div class="movie-form-group mb-3">
					<label for="trailer_link">{{ __('adminMovieModalCreate.trailerLabel') }}</label>
					<input type="text" id="trailer_link" name="trailer_link"
								value="{{ old('trailer_link', '') }}"
						placeholder="{{ __('adminMovieModalCreate.trailerPlaceholder') }}"
						class="movie-input @error('trailer_link') is-invalid @enderror">
					@error('trailer_link')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="row mb-3">
					<div class="col movie-form-group">
						<label for="director">{{ __('adminMovieModalCreate.directorLabel') }}</label>
						<input type="text" id="director" name="director"
									value="{{ old('director', $viewData['movie']['director'] ?? '') }}"
							class="movie-input @error('director') is-invalid @enderror">
						@error('director')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<div class="col movie-form-group">
						<label for="location">{{ __('adminMovieModalCreate.locationLabel') }}</label>
						<input type="text" id="location" name="location"
							value="{{ old('location', '') }}"
							class="movie-input @error('location') is-invalid @enderror"
							placeholder="{{ __('adminMovieModalCreate.locationPlaceholder') }}">
						@error('location')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					<div class="col movie-form-group">
						<label for="format">{{ __('adminMovieModalCreate.formatLabel') }}</label>
						<select id="format" name="format"
							class="movie-input @error('format') is-invalid @enderror">
							<option value="DVD" {{ old('format') == 'DVD' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.formats.DVD') }}</option>
							<option value="digital" {{ old('format') == 'digital' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.formats.digital') }}</option>
						</select>
						@error('format')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>

				<div class="movie-form-group mb-3">
					<label for="description">{{ __('adminMovieModalCreate.descriptionLabel') }}</label>
					<textarea id="description" name="description" rows="3"
								class="movie-input @error('description') is-invalid @enderror"
								placeholder="{{ __('adminMovieModalCreate.descriptionPlaceholder') }}">{{ old('description', $viewData['movie']['description'] ?? '') }}</textarea>
					@error('description')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="movie-form-group mb-3">
					<label for="quantity">{{ __('adminMovieModalCreate.quantityLabel') }}</label>
					<input type="number" id="quantity" name="quantity"
								value="{{ old('quantity', $viewData['movie']['quantity'] ?? 1) }}"
						min="0"
						class="movie-input @error('quantity') is-invalid @enderror">
					@error('quantity')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="modal-footer movie-modal-footer">
					<a href="{{ route('admin.movie.index') }}" class="movie-btn-cancel text-decoration-none">{{ __('adminMovieModalCreate.cancelButton') }}</a>
					<button type="submit" class="movie-btn-save">{{ __('adminMovieModalCreate.saveButton') }}</button>
				</div>

			</form>
		</div>
	</div>
</div>

@push('scripts')
	<script src="{{ asset('js/admin/modalMovieCreate.js') }}"></script>
@endpush
@endsection
