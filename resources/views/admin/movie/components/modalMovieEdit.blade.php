<!-- Laura Andrea Castrillón Fajardo -->

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="modalEditLabel">{{ __('adminMovieModalEdit.modalTitle') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('adminMovieModalEdit.closeButtonLabel') }}"></button>
            </div>

            <div class="modal-body">
                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="movie-form-group mb-3">
                        <label for="title">{{ __('adminMovieModalEdit.titleLabel') }}</label>
                        <input type="text" id="title" name="title"
                            class="movie-input @error('title') is-invalid @enderror"
                            placeholder="{{ __('adminMovieModalEdit.titlePlaceholder') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="genre">{{ __('adminMovieModalEdit.genreLabel') }}</label>
                            <select id="genre" name="genre"
                                class="movie-input @error('genre') is-invalid @enderror">
                                <option value="">{{ __('adminMovieModalEdit.genreSelectPlaceholder') }}</option>
                                <option value="accion">{{ __('adminMovieModalEdit.genres.action') }}</option>
                                <option value="aventuras">{{ __('adminMovieModalEdit.genres.adventure') }}</option>
                                <option value="animacion">{{ __('adminMovieModalEdit.genres.animation') }}</option>
                                <option value="comedia">{{ __('adminMovieModalEdit.genres.comedy') }}</option>
                                <option value="drama">{{ __('adminMovieModalEdit.genres.drama') }}</option>
                                <option value="fantasia">{{ __('adminMovieModalEdit.genres.fantasy') }}</option>
                                <option value="terror">{{ __('adminMovieModalEdit.genres.horror') }}</option>
                                <option value="ciencia ficcion">{{ __('adminMovieModalEdit.genres.scifi') }}</option>
                            </select>
                            @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="classification">{{ __('adminMovieModalEdit.classificationLabel') }}</label>
                            <select id="classification" name="classification"
                                class="movie-input @error('classification') is-invalid @enderror">
                                <option value="ATP">{{ __('adminMovieModalEdit.classifications.ATP') }}</option>
                                <option value="7">{{ __('adminMovieModalEdit.classifications.7') }}</option>
                                <option value="13">{{ __('adminMovieModalEdit.classifications.13') }}</option>
                                <option value="18">{{ __('adminMovieModalEdit.classifications.18') }}</option>
                            </select>
                            @error('classification')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="year">{{ __('adminMovieModalEdit.yearLabel') }}</label>
                            <input type="number" id="year" name="year"
                                min="1900" max="{{ date('Y') }}"
                                class="movie-input @error('year') is-invalid @enderror">
                            @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="price">{{ __('adminMovieModalEdit.priceLabel') }}</label>
                            <input type="number" id="price" name="price"
                                min="0" step="0.01"
                                class="movie-input @error('price') is-invalid @enderror">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="movie-form-group mb-3">
                        <label>{{ __('adminMovieModalEdit.posterPreviewLabel') }}</label>
                        <div class="preview-container" style="text-align: center; margin-bottom: 15px;">
                            <img id="posterPreview" src="" alt="{{ __('adminMovieModalEdit.posterPreviewAlt') }}" 
                                style="max-width: 100%; max-height: 300px; border-radius: 8px; object-fit: cover;">
                        </div>
                        <label for="movie_image_edit">{{ __('adminMovieModalEdit.selectNewImageLabel') }}</label>
                        <input type="file" id="movie_image_edit" name="movie_image"
                            class="movie-input @error('movie_image') is-invalid @enderror"
                            onchange="handleFileSelect()">
                        <div id="fileNameDisplay" style="margin-top: 8px; color: #666; font-size: 0.9em;"></div>
                        @error('movie_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="trailer_link">{{ __('adminMovieModalEdit.trailerLabel') }}</label>
                        <input type="text" id="trailer_link" name="trailer_link"
                            value="{{ old('trailer_link') }}"
                            placeholder="{{ __('adminMovieModalEdit.trailerPlaceholder') }}"
                            class="movie-input @error('trailer_link') is-invalid @enderror">
                        @error('trailer_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="description">{{ __('adminMovieModalEdit.descriptionLabel') }}</label>
                        <textarea id="description" name="description" rows="3"
                            class="movie-input @error('description') is-invalid @enderror"
                            placeholder="{{ __('adminMovieModalEdit.descriptionPlaceholder') }}"></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="director">{{ __('adminMovieModalEdit.directorLabel') }}</label>
                            <input type="text" id="director" name="director"
                                class="movie-input @error('director') is-invalid @enderror">
                            @error('director')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="format">{{ __('adminMovieModalEdit.formatLabel') }}</label>
                            <select id="format" name="format"
                                class="movie-input @error('format') is-invalid @enderror">
                                <option value="DVD">{{ __('adminMovieModalEdit.formats.DVD') }}</option>
                                <option value="digital">{{ __('adminMovieModalEdit.formats.digital') }}</option>
                            </select>
                            @error('format')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="location">{{ __('adminMovieModalEdit.locationLabel') }}</label>
                        <input type="text" id="location" name="location"
                            class="movie-input @error('location') is-invalid @enderror">
                        @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="quantity">{{ __('adminMovieModalEdit.quantityLabel') }}</label>
                        <input type="number" id="quantity" name="quantity"
                            min="0"
                            class="movie-input @error('quantity') is-invalid @enderror">
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer movie-modal-footer">
                        <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">{{ __('adminMovieModalEdit.cancelButton') }}</button>
                        <button type="submit" class="movie-btn-save">{{ __('adminMovieModalEdit.saveButton') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    window.movieUpdateRoute = "{{ route('admin.movie.update', ':id') }}";
</script>