<!-- Laura Andrea Castrillón Fajardo -->

<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="movieModalLabel">Agregar Nueva Película</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Movie Create Form -->
            <div class="modal-body">
                <form id="movieForm" action="{{ route('admin.movie.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="movie-form-group mb-3">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title"
                            value="{{ old('title') }}"
                            class="movie-input @error('title') is-invalid @enderror"
                            placeholder="Ej: The Dark Knight">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="movie_image">Imagen de Portada</label>
                        <input type="file" id="movie_image" name="movie_image"
                            class="movie-input @error('movie_image') is-invalid @enderror">
                        @error('movie_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="genre">Género</label>
                            <select id="genre" name="genre"
                                class="movie-input @error('genre') is-invalid @enderror">
                                <option value="">Seleccionar...</option>
                                <option value="accion"        {{ old('genre') == 'accion' ? 'selected' : '' }}>Acción</option>
                                <option value="aventuras"     {{ old('genre') == 'aventuras' ? 'selected' : '' }}>Aventuras</option>
                                <option value="animacion"     {{ old('genre') == 'animacion' ? 'selected' : '' }}>Animación</option>
                                <option value="comedia"       {{ old('genre') == 'comedia' ? 'selected' : '' }}>Comedia</option>
                                <option value="drama"         {{ old('genre') == 'drama' ? 'selected' : '' }}>Drama</option>
                                <option value="fantasia"      {{ old('genre') == 'fantasia' ? 'selected' : '' }}>Fantasía</option>
                                <option value="terror"        {{ old('genre') == 'terror' ? 'selected' : '' }}>Terror</option>
                                <option value="ciencia ficcion" {{ old('genre') == 'ciencia ficcion' ? 'selected' : '' }}>Ciencia Ficción</option>
                            </select>
                            @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="classification">Clasificación</label>
                            <select id="classification" name="classification"
                                class="movie-input @error('classification') is-invalid @enderror">
                                <option value="ATP" {{ old('classification') == 'ATP' ? 'selected' : '' }}>ATP</option>
                                <option value="7"  {{ old('classification') == '7' ? 'selected' : '' }}>7+</option>
                                <option value="13" {{ old('classification') == '13' ? 'selected' : '' }}>13+</option>
                                <option value="18" {{ old('classification') == '18' ? 'selected' : '' }}>18+</option>
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
                                value="{{ old('year', date('Y')) }}"
                                min="1900" max="{{ date('Y') }}"
                                class="movie-input @error('year') is-invalid @enderror">
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="price">Precio ($)</label>
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
                        <label for="trailer_link">Link del Trailer</label>
                        <input type="text" id="trailer_link" name="trailer_link"
                            value="{{ old('trailer_link') }}"
                            placeholder="https://..."
                            class="movie-input @error('trailer_link') is-invalid @enderror">
                        @error('trailer_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col movie-form-group">
                            <label for="director">Director</label>
                            <input type="text" id="director" name="director"
                                value="{{ old('director') }}"
                                class="movie-input @error('director') is-invalid @enderror">
                            @error('director')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="location">Ubicación</label>
                            <input type="text" id="location" name="location"
                                value="{{ old('location') }}"
                                class="movie-input @error('location') is-invalid @enderror"
                                placeholder="Ej: Almacén A">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col movie-form-group">
                            <label for="format">Formato</label>
                            <select id="format" name="format"
                                class="movie-input @error('format') is-invalid @enderror">
                                <option value="DVD" {{ old('format') == 'DVD' ? 'selected' : '' }}>DVD</option>
                                <option value="digital" {{ old('format') == 'digital' ? 'selected' : '' }}>Digital</option>
                            </select>
                            @error('format')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description" rows="3"
                            class="movie-input @error('description') is-invalid @enderror"
                            placeholder="Sinopsis de la película...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="quantity">Cantidad disponible</label>
                        <input type="number" id="quantity" name="quantity"
                            value="{{ old('quantity', 1) }}"
                            min="0"
                            class="movie-input @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer movie-modal-footer">
                        <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="movie-btn-save">Guardar Película</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>