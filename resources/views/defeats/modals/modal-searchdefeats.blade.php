<!-- Modal -->
<div class="modal fade" id="formSearchDefeat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pesquisar derrota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('defeat.index') }}" method="GET" class="row g-3">
                    @csrf
                    @method('GET')
                    <div class="col-md-6">
                        <label class="form-label" for="user_id">Perdedor</label>
                        <select name="user_id" id="user_id" class="form-select">
                            <option selected disabled value="">Selecione o perdedor</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="date_at">Data</label>
                        <input type="text" name="date_at" id="date_at" class="form-control date" placeholder="xx/xx/xxxx" />
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('defeat.index') }}" class="btn btn-secondary btn-sm me-2">Limpar</a>
                        <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
