<!-- Made by: Daniela Salazar -->

<div class="modal fade" id="itemsModal" tabindex="-1" aria-labelledby="itemsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">
            <div class="modal-header movie-modal-header">
                <h3 class="modal-title" id="itemsModalLabel">{{ __('adminBillModalListItems.modalTitle') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('adminBillModalListItems.closeButtonLabel') }}"></button>
            </div>
            <div class="modal-body">
                <div id="itemsList"></div>
            </div>
        </div>
    </div>
</div>