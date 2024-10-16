{{--Modal--}}
@foreach($users as $user)
    <div class="modal fade" id="userDeleteForm{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">
                        <div>
                            <p>
                                Tem certeza em excluir os dados abaixo?
                            </p>
                        </div>

                        <dl class="row">
                            <dt class="col-3">Apelido:</dt>
                            <dd class="col-9">{{ $user->nickname }}</dd>

                            <dt class="col-3">Nome:</dt>
                            <dd class="col-9">{{ $user->name }}</dd>

                            <dt class="col-3">Niver:</dt>
                            <dd class="col-9">{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</dd>

                            <dt class="col-3">E-mail:</dt>
                            <dd class="col-9">{{ $user->email }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sim, excluir!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
