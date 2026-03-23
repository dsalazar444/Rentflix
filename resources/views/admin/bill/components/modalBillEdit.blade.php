<!-- Made by: Daniela Salazar -->

<div class="modal fade" id="modalBillEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content movie-modal-content">

            <div class="modal-header movie-modal-header">
                <h5 class="modal-title" id="modalEditLabel">Editar Factura</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form id="formBillEdit" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <!--Items edition -> edit quantity and delete items-->
                    <div class="movie-form-group mb-3">
                        <label>Items de la factura</label>
                        <div id="bill-items-list">
                        </div>
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
    window.movieUpdateRoute = "{{ route('admin.bill.update', ':id') }}";
</script>