<!-- Modal -->
<div class="modal fade" id="forgotPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Esqueceu a senha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('forgot-password.process') }}" method="POST" class="row g-3">
                    @csrf
                    @method('POST')

                    <x-alert/>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}"
                               placeholder="Digite seu e-mail">
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">Recuperar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


