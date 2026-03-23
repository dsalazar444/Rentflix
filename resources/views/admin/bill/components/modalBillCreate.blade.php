<!-- Made by: Daniela Salazar -->

<div class="modal fade" id="modalBillCreate" tabindex="-1" aria-labelledby="billModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="billModalLabel">Agregar nueva Factura</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Bill Create Form -->
            <div class="modal-body">
                @if ($errors->any() && session('lastForm') === 'billForm')
                    <div class="alert alert-danger alert-notify-m">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form id="billForm" action="{{ route('admin.bill.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="movie-form-group mb-3">
                        <label for="user_id">Usuario</label>
                        <select id="user_id" name="user_id"
                            class="movie-input @error('user_id') is-invalid @enderror" required>
                            <option value="">Seleccionar usuario...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->getId() }}" {{ old('user_id') == $user->getId() ? 'selected' : '' }}>
                                    {{ $user->getName() }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="price">Precio Total ($)</label>
                        <input type="number" id="price" name="price"
                            value="{{ old('price', 0) }}"
                            min="0" step="0.01"
                            class="movie-input @error('price') is-invalid @enderror" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="movie-form-group mb-3">
                        <label for="address">Dirección de Envío</label>
                        <textarea id="address" name="address" rows="3"
                            class="movie-input @error('address') is-invalid @enderror"
                            placeholder="Ingresa la dirección de envío...">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Items (Movies) -->
                    <div class="movie-form-group mb-3">
                        <label>Items de la factura (Películas)</label>
                        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                            <select id="movieSelect" class="movie-input" style="flex: 1;">
                                <option value="">Seleccionar película...</option>
                                @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}" data-title="{{ $movie->getTitle() }}" data-price="{{ $movie->getPrice() }}">
                                        {{ $movie->title }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="number" id="quantityInput" class="movie-input" min="1" value="1" style="width: 80px;" placeholder="Cantidad">
                            <button type="button" class="btn btn-danger btn-sm" onclick="addNewBillItem()">Agregar</button>
                        </div>
                        
                        <div id="bill-items-list-create" class="bill-create-no-items">
                            <p class= "bill-txt-no-items" >No hay items agregados</p>
                        </div>
                    </div>

                    <div class="modal-footer movie-modal-footer">
                        <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="movie-btn-save">Guardar Factura</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
