<!-- Modal show-->
@foreach($defeats as $defeat)
    <div class="modal fade" id="formUpdate{{ $defeat->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel{{ $defeat->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Derrota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-4">
                        <form action="{{ route('defeat.update', ['defeat' => $defeat->id]) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-6">
                                <label for="user_id" class="form-label">Perdedor</label>
                                <select name="user_id" id="user_id" class="form-select" required>
                                    <option value="">Selecione o perdedor</option>
                                    @foreach($users as $user)
                                        <option {{ $user->id == $defeat->user_id ? "selected" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="harmed" class="form-label">Prejudicou</label>
                                <select name="harmed" id="harmed" class="form-select" required>
                                    <option value="">Selecione o fela da pota</option>
                                    @php
                                        $harmed = $defeat->harmed;
                                        $select = function ($value) use ($harmed){
                                            return ($harmed == $value ? "selected" : "");
                                        }
                                    @endphp

                                    <option {{ $select('Roleta') }} value="Roleta">Roleta</option>
                                    <option {{ $select('Bruno') }} value="Bruno">Bruno</option>
                                    <option {{ $select('Hugo') }} value="Hugo">Hugo</option>
                                    <option {{ $select('Jean') }} value="Jean">Jean</option>
                                    <option {{ $select('Marciel') }} value="Marciel">Marciel</option>
                                    <option {{ $select('Miguel') }} value="Miguel">Miguel</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="pain" class="form-label">Castigo</label>
                                <select name="pain" id="pain" class="form-select" required>
                                    <option value="">Selecione o castigo</option>

                                    @php
                                        $pain = $defeat->pain;
                                        $select = function ($value) use ($pain){
                                            return ($pain == $value ? "selected" : "");
                                        }
                                    @endphp

                                    <option {{ $select('Fazer café') }} value="Fazer café">Fazer café</option>
                                    <option {{ $select('Buscar café') }} value="Buscar café">Buscar café</option>
                                    <option {{ $select('Lavar louça') }} value="Lavar louça">Lavar louça</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="date_at" class="form-label">Data</label>
                                <input type="text" name="date_at" id="date_at" class="form-control date" value="{{ old('date_at', \Carbon\Carbon::parse($defeat->date_at)->format('d/m/Y')) }}" placeholder="Data" required/>
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-5">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
