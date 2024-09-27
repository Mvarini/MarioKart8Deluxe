@extends('layouts.admin')
@section('content')
    <h1>Editar a derrota</h1>

    <a href="{{ route('defeat.index') }}"><button type="button">Voltar a lista</button></a><br><br>

    @if($errors->any())
        <div style="color: red">
            @foreach($errors->all() as $error)
                <p> {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('defeat.update', ['defeat' => $defeat->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Perdedor</label>
        <select name="user_id" id="user_id">
            <option value="">Selecione o perdedor</option>
            @foreach($users as $user)
                <option {{ $user->id == $defeat->user_id ? "selected" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br><br>

        <label>Prejudicou</label>
        <select name="harmed" id="harmed">
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
        </select><br><br>

        <label>Castigo</label>
        <select name="pain" id="pain">
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
        </select><br><br>

        <label>Data</label>
        <input type="date" name="date_at" id="date_at"  value="{{ old('date_at', $defeat->date_at) }}" placeholder="Data"/><br><br>

        <button type="submit">Atualizar</button>

    </form>
@endsection
