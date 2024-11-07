<!-- Modal -->
<div class="modal fade" id="userImportExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data" class="row">
                    @csrf
                    @method('POST')

                    <div class="col-12">
                        <label class="form-label" for="excel">Importar Excel</label>
                        <input type="file" name="excel" id="excel" class="form-control form-control-sm">
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Importar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
