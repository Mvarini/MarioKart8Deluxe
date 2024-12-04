{{--Modal--}}
@foreach($users as $user)
    <div class="modal fade" id="userUpdateForm{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">
                        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" class="row g-3"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-7">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $user->name) }}"
                                       placeholder="Nome completo" required>
                            </div>

                            <div class="col-md-5">
                                <label for="nickname" class="form-label">Apelido</label>
                                <input type="text" name="nickname" id="nickname" class="form-control"
                                       value="{{ old('nickname', $user->nickname) }}" placeholder="Apelido" required>
                            </div>

                            <div class="col-md-8">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" name="email" id="email" class="form-control"
                                       value="{{ old('email', $user->email) }}"
                                       placeholder="E-mail" required>
                            </div>

                            <div class="col-md-4">
                                <label for="birthday" class="form-label">Aniversário</label>
                                <input type="text" name="birthday" id="birthday" class="form-control date" value="{{ old('birthday', \Carbon\Carbon::parse($user->birthday)->format('d/m/Y')) }}" placeholder="Data do aniversário" required>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Imagem</label>
                                <input type="file" name="image" id="image" class="form-control"
                                       value="{{ old('image', $user->image) }}"
                                       placeholder="Imagem">
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label">Papel</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">Selecione o papel</option>
                                    @foreach($roles as $role)
                                        @if($role != 'Administrador')
                                           {{--$user->roles->pluck('name')->first(): pela o primeiro papel já atribuído ao usuáiro--}}
                                            <option {{ old('role', $user->roles->pluck('name')->first()) == $role ? 'selected' : "" }}  value="{{ $role }}">{{ $role }}</option>
                                        @else
                                            @if(auth()->user()->hasRole('Administrador'))
                                                <option {{ old('role', $user->roles->pluck('name')->first()) == $role ? 'selected' : "" }} value="{{ $role }}">{{ $role }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
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
