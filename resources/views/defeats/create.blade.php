@extends('layouts.admin')
@section('content')
<h1>Cadastrar derrota</h1>

<a href="{{ route('defeat.index') }}"><button type="button">Voltar a lista</button></a><br><br>

@if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('defeat.store') }}" method="POST">
    @csrf
    @method('POST')

    <label>Perdedor</label>
    <select name="user_id" id="user_id">
        <option value="">Selecione o perdedor</option>
        @foreach($users as $user)
            <option {{ old('user_id') == $user->id ? "selected" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select><br><br>

    <label>Prejudicou</label>
    <select name="harmed" id="harmed">
        <option value="">Selecione o fela da pota</option>
        <option {{ old('harmed') == "Roleta" ? "selected" : "" }} value="Roleta">Roleta</option>
        <option {{ old('harmed') == "Bruno" ? "selected" : "" }} value="Bruno">Bruno</option>
        <option {{ old('harmed') == "Hugo" ? "selected" : "" }} value="Hugo">Hugo</option>
        <option {{ old('harmed') == "Jean" ? "selected" : "" }} value="Jean">Jean</option>
        <option {{ old('harmed') == "Marciel" ? "selected" : "" }}value="Marciel">Marciel</option>
        <option {{ old('harmed') == "Miguel" ? "selected" : "" }} value="Miguel">Miguel</option>
    </select><br><br>

    <label>Castigo</label>
    <select name="pain" id="pain">
        <option value="">Selecione o castigo</option>
        <option {{ old('pain') == "Fazer café" ? "selected" : "" }} value="Fazer café">Fazer café</option>
        <option {{ old('pain') == "Buscar café" ? "selected" : "" }} value="Buscar café">Buscar café</option>
        <option {{ old('pain') == "Lavar louça" ? "selected" : "" }} value="Lavar louça">Lavar louça</option>
    </select><br><br>

    <label>Data</label>
    <input type="date" name="date_at" id="date_at"  value="{{ old('date_at') }}" placeholder="Data"/><br><br>

    <button type="submit">Cadastrar</button>

</form>
@endsection
