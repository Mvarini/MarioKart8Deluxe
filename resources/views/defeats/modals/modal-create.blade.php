<!-- Modal -->
<div class="modal fade" id="formCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Derrota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('defeat.store') }}" method="POST" class="row g-3">
                    @csrf
                    @method('POST')

{{--                    <x-alert/>--}}

                    <div class="col-md-6">
                        <label for="user_id" class="form-label">Perdedor</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option selected disabled value="">Selecione o perdedor</option>
                            @foreach($users as $user)
                                <option {{ old('user_id') == $user->id ? "selected" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="harmed" class="form-label">Algoz</label>
                        <select name="harmed" id="harmed" class="form-select" required>
                            <option value="">Selecione o fela da pota</option>
                            <option {{ old('harmed') == "Roleta" ? "selected" : "" }} value="Roleta">Roleta</option>
                            <option {{ old('harmed') == "Bruno" ? "selected" : "" }} value="Bruno">Bruno</option>
                            <option {{ old('harmed') == "Hugo" ? "selected" : "" }} value="Hugo">Hugo</option>
                            <option {{ old('harmed') == "Jean" ? "selected" : "" }} value="Jean">Jean</option>
                            <option {{ old('harmed') == "Marciel" ? "selected" : "" }}value="Marciel">Marciel</option>
                            <option {{ old('harmed') == "Miguel" ? "selected" : "" }} value="Miguel">Miguel</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="pain" class="form-label">Castigo</label>
                        <select name="pain" id="pain" class="form-select" required>
                            <option value="">Selecione o castigo</option>
                            <option {{ old('pain') == "Fazer café" ? "selected" : "" }} value="Fazer café">Fazer café</option>
                            <option {{ old('pain') == "Buscar café" ? "selected" : "" }} value="Buscar café">Buscar café</option>
                            <option {{ old('pain') == "Lavar louça" ? "selected" : "" }} value="Lavar louça">Lavar louça</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="date_at" class="form-label">Data</label>
                        <input type="text" name="date_at" id="date_at" class="form-control date" value="{{ old('date_at', date('d/m/Y')) }}" required/>
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-5">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
