<!-- Laura Andrea Castrillón Fajardo -->

<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="movieModalLabel">{{ __('adminMovieModalCreate.modalTitle') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('adminMovieModalCreate.closeButtonLabel') }}"></button>
            </div>

            <!-- Movie Create Form -->
            <div class="modal-body">
                <form id="movieForm" action="{{ route('admin.movie.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="movie-form-group mb-3">
                        <label for="title">{{ __('adminMovieModalCreate.titleLabel') }}</label>
                        <input type="text" id="title" name="title"
                            value="{{ old('title') }}"
                            class="movie-input @error('title') is-invalid @enderror"
                            placeholder="{{ __('adminMovieModalCreate.titlePlaceholder') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="movie_image">{{ __('adminMovieModalCreate.imageLabel') }}</label>
                        <input type="file" id="movie_image" name="movie_image"
                            class="movie-input @error('movie_image') is-invalid @enderror">
                        @error('movie_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="genre">{{ __('adminMovieModalCreate.genreLabel') }}</label>
                            <select id="genre" name="genre"
                                class="movie-input @error('genre') is-invalid @enderror">
                                <option value="">{{ __('adminMovieModalCreate.genreSelectPlaceholder') }}</option>
                                <option value="accion" {{ old('genre') == 'accion' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.action') }}</option>
                                <option value="aventuras" {{ old('genre') == 'aventuras' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.adventure') }}</option>
                                <option value="animacion" {{ old('genre') == 'animacion' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.animation') }}</option>
                                <option value="comedia" {{ old('genre') == 'comedia' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.comedy') }}</option>
                                <option value="drama" {{ old('genre') == 'drama' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.drama') }}</option>
                                <option value="fantasia" {{ old('genre') == 'fantasia' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.fantasy') }}</option>
                                <option value="terror" {{ old('genre') == 'terror' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.horror') }}</option>
                                <option value="ciencia ficcion" {{ old('genre') == 'ciencia ficcion' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.genres.scifi') }}</option>
                            </select>
                            @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="classification">{{ __('adminMovieModalCreate.classificationLabel') }}</label>
                            <select id="classification" name="classification"
                                class="movie-input @error('classification') is-invalid @enderror">
                                <option value="ATP" {{ old('classification') == 'ATP' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.classifications.ATP') }}</option>
                                <option value="7"  {{ old('classification') == '7' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.classifications.7') }}</option>
                                <option value="13" {{ old('classification') == '13' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.classifications.13') }}</option>
                                <option value="18" {{ old('classification') == '18' ? 'selected' : '' }}>{{ __('adminMovieModalCreate.classifications.18') }}</option>
                            </select>
                            @error('classification')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="year">{{ __('adminMovieModalCreate.yearLabel') }}</label>
                            <input type="number" id="year" name="year"
                                value="{{ old('year', date('Y')) }}"
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
                            value="{{ old('trailer_link') }}"
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
                                value="{{ old('director') }}"
                                class="movie-input @error('director') is-invalid @enderror">
                            @error('director')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="location">{{ __('adminMovieModalCreate.locationLabel') }}</label>
                            <input type="text" id="location" name="location"
                                value="{{ old('location') }}"
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
                            placeholder="{{ __('adminMovieModalCreate.descriptionPlaceholder') }}">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="quantity">{{ __('adminMovieModalCreate.quantityLabel') }}</label>
                        <input type="number" id="quantity" name="quantity"
                            value="{{ old('quantity', 1) }}"
                            min="0"
                            class="movie-input @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer movie-modal-footer">
                        <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">{{ __('adminMovieModalCreate.cancelButton') }}</button>
                        <button type="submit" class="movie-btn-save">{{ __('adminMovieModalCreate.saveButton') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>