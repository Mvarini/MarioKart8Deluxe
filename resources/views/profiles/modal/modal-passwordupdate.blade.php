{{--Modal--}}
<div class="modal fade" id="profileUpdatePassword" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Minha senha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-alert/>
                <div class="container-fluid px-3">
                    <form action="{{ route('profile.password-update')}}" method="POST" class="row g-3"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label class="form-label" for="password">Senha</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="senha"/>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="password_confirmation">Confirmar senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" placeholder="Confirmar senha"/>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
