{{--Modal--}}
@foreach($roles as $role)
    <div class="modal fade" id="roleUpdate{{ $role->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Papel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">
                        <form action="{{ route('role.update', ['role' => $role->id]) }}" method="POST" class="row g-3"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="name" class="form-label">Papel</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $role->name) }}"
                                       placeholder="Nome do papel" required>
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

