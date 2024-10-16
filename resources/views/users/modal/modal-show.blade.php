{{--Modal--}}
@foreach($users as $user)
    <div class="modal fade" id="userShowForm{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card border-0">
                                    <div class="card-body text-center">
{{--                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png"--}}
                                        <img src="/storage/{{ $user->image }}"
                                             class="rounded-circle"  alt="{{ $user->nickname }}" style="width: 200px; height: 200px" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-4">Apelido:</dt>
                                            <dd class="col-8">{{ $user->nickname }}</dd>

                                            <dt class="col-4">Nome:</dt>
                                            <dd class="col-8">{{ $user->name }}</dd>

                                            <dt class="col-4">E-mail:</dt>
                                            <dd class="col-8">{{ $user->email }}</dd>

                                            <dt class="col-4">Niver:</dt>
                                            <dd class="col-8">{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</dd>

                                            <dt class="col-4">Atualizado:</dt>
                                            <dd class="col-8">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s')}}</dd>

                                            <dt class="col-4">Cadastrado:</dt>
                                            <dd class="col-8">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
