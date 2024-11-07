<!-- Modal show-->
@foreach($defeats as $defeat)
    <div class="modal fade" id="formDelete{{ $defeat->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel{{ $defeat->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Derrota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">

                        <div>
                            <p>Tem certeza em excluir os dados abaixo?</p>
                        </div>

                        <dl class="row">

                            <dt class="col-md-2">Jogador:</dt>
                            <dd class="col-md-10">{{ $defeat->user->name }}</dd>

                            <dt class="col-md-2">Algoz:</dt>
                            <dd class="col-md-10">{{ $defeat->harmed }}</dd>

                            <dt class="col-md-2">Castigo:</dt>
                            <dd class="col-md-10">{{ $defeat->pain }}</dd>

                            <dt class="col-md-2">Data:</dt>
                            <dd class="col-md-10">{{ \Carbon\Carbon::parse($defeat->date_at)->format('d/m/Y') }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('defeat.destroy', ['defeat' => $defeat->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Sim, excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
