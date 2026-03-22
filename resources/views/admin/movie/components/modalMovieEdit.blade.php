<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="modalEditLabel">Editar Película</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="movie-form-group mb-3">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title"
                            class="movie-input @error('title') is-invalid @enderror"
                            placeholder="Ej: The Dark Knight">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="genre">Género</label>
                            <select id="genre" name="genre"
                                class="movie-input @error('genre') is-invalid @enderror">
                                <option value="">Seleccionar...</option>
                                <option value="accion">Acción</option>
                                <option value="aventuras">Aventuras</option>
                                <option value="animacion">Animación</option>
                                <option value="comedia">Comedia</option>
                                <option value="drama">Drama</option>
                                <option value="fantasia">Fantasía</option>
                                <option value="terror">Terror</option>
                                <option value="ciencia ficcion">Ciencia Ficción</option>
                            </select>
                            @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="classification">Clasificación</label>
                            <select id="classification" name="classification"
                                class="movie-input @error('classification') is-invalid @enderror">
                                <option value="ATP">ATP</option>
                                <option value="7">7+</option>
                                <option value="13">13+</option>
                                <option value="18">18+</option>
                            </select>
                            @error('classification')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="year">Año</label>
                            <input type="number" id="year" name="year"
                                min="1900" max="{{ date('Y') }}"
                                class="movie-input @error('year') is-invalid @enderror">
                            @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="price">Precio ($)</label>
                            <input type="number" id="price" name="price"
                                min="0" step="0.01"
                                class="movie-input @error('price') is-invalid @enderror">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="movie-form-group mb-3">
                        <label>Vista previa del Póster</label>
                        <div class="preview-container" style="text-align: center; margin-bottom: 15px;">
                            <img id="posterPreview" src="" alt="Póster" 
                                style="max-width: 100%; max-height: 300px; border-radius: 8px; object-fit: cover;">
                        </div>
                        <label for="movie_image_edit">Seleccionar nueva imagen</label>
                        <input type="file" id="movie_image_edit" name="movie_image"
                            class="movie-input @error('movie_image') is-invalid @enderror"
                            onchange="handleFileSelect()">
                        <div id="fileNameDisplay" style="margin-top: 8px; color: #666; font-size: 0.9em;"></div>
                        @error('movie_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="trailer_link">Link del Trailer</label>
                        <input type="text" id="trailer_link" name="trailer_link"
                            value="{{ old('trailer_link') }}"
                            placeholder="https://..."
                            class="movie-input @error('trailer_link') is-invalid @enderror">
                        @error('trailer_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description" rows="3"
                            class="movie-input @error('description') is-invalid @enderror"
                            placeholder="Sinopsis de la película..."></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="director">Director</label>
                            <input type="text" id="director" name="director"
                                class="movie-input @error('director') is-invalid @enderror">
                            @error('director')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="format">Formato</label>
                            <select id="format" name="format"
                                class="movie-input @error('format') is-invalid @enderror">
                                <option value="DVD">DVD</option>
                                <option value="digital">Digital</option>
                            </select>
                            @error('format')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="location">Ubicación</label>
                        <input type="text" id="location" name="location"
                            class="movie-input @error('location') is-invalid @enderror">
                        @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="quantity">Cantidad disponible</label>
                        <input type="number" id="quantity" name="quantity"
                            min="0"
                            class="movie-input @error('quantity') is-invalid @enderror">
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer movie-modal-footer">
                        <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="movie-btn-save">Guardar Cambios</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    window.movieUpdateRoute = "{{ route('admin.movie.update', ':id') }}";
</script>