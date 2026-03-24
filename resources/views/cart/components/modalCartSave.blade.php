<!-- Samuel Martínez Arteaga -->

<!-- Modal de Checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content movie-modal-content">
            <div class="modal-header movie-modal-header">
                <h5 class="modal-title">{{ __('cartModalSave.modalTitle') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('cart.process') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                    <input type="hidden" name="price" value="{{ $cartSubtotal }}">
                    
                    @foreach($cartMovieItems as $movie)
                        <input type="hidden" name="items[{{ $loop->index }}][movie_id]" value="{{ $movie->getId() }}">
                        <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="1">
                        <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $movie->getPrice() }}">
                    @endforeach

                    <div class="movie-form-group mb-3">
                        <label for="address" class="form-label">{{ __('cartModalSave.addressLabel') }}</label>
                        <input type="text" name="address" id="address" class="movie-input" placeholder="{{ __('cartModalSave.addressPlaceholder') }}" required>
                    </div>
                </div>

                <div class="modal-footer movie-modal-footer">
                    <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">{{ __('cartModalSave.cancelButton') }}</button>
                    <button type="submit" class="movie-btn-save">{{ __('cartModalSave.confirmButton') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
