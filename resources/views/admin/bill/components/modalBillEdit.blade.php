<!-- Made by: Daniela Salazar -->

<div class="modal fade" id="modalBillEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="modalEditLabel">{{ __('adminBillModalEdit.modalTitle') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('adminBillModalEdit.closeButtonLabel') }}"></button>
            </div>

            <div class="modal-body">
                <form id="formBillEdit" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <!--Items edition -> edit quantity and delete items-->
                    <div class="movie-form-group mb-3">
                        <label>{{ __('adminBillModalEdit.itemsLabel') }}</label>
                        <div id="bill-items-list">
                        </div>
                    </div>
                    
                    <div class="modal-footer movie-modal-footer">
                        <button type="button" class="movie-btn-cancel" data-bs-dismiss="modal">{{ __('adminBillModalEdit.cancelButton') }}</button>
                        <button type="submit" class="movie-btn-save">{{ __('adminBillModalEdit.saveButton') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    window.movieUpdateRoute = "{{ route('admin.bill.update', ':id') }}";
</script>