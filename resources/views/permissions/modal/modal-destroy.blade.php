{{--Modal--}}
@foreach($permissions as $permission)
    <div class="modal fade" id="permissionDelete{{ $permission->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Permissão</h1>
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
                            <dt class="col-3">Permissão:</dt>
                            <dd class="col-9">{{ $permission->title }}</dd>
                            <dt class="col-3">Rota:</dt>
                            <dd class="col-9">{{ $permission->name }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('permission.destroy', ['permission' => $permission->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Sim, excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

