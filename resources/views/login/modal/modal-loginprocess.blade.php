<!-- Modal -->
<div class="modal fade" id="loginProcess" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login.process') }}" method="POST" class="row g-3">
                    @csrf
                    @method('POST')

                    <x-alert/>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}"
                               placeholder="Digite seu e-mail">
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control"
                               value="{{ old('password') }}" placeholder="Digite sua senha">
                    </div>

                    <div class="col-12">
                        <span>Esquceu sua senha?</span><a href="#"> Clique aqui.</a>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

