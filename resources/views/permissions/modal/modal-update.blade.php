{{--Modal--}}
@foreach($permissions as $permission)
    <div class="modal fade" id="permissionUpdate{{ $permission->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Permissão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">
                        <form action="{{ route('permission.update', ['permission' => $permission->id]) }}" method="POST" class="row g-3"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-6">
                                <label for="title" class="form-label">Nome</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="{{ old('title', $permission->title) }}"
                                       placeholder="Nome da permissão">
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">Rota</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $permission->name) }}"
                                       placeholder="Nome da rota">
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
@endforeach
