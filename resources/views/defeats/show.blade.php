@extends('layouts.admin')
@section('content')
    <h1>Visualizar</h1>

    <a href="{{ route('defeat.index') }}"><button type="button">Voltar a lista</button></a><br><br>

    ID: {{ $defeat->id }}<br>
    Nome: {{ $defeat->user->name }}<br>
    Prejudicou: {{ $defeat->harmed }}<br>
    Castigo: {{ $defeat->pain }}<br>
    Data: {{ \Carbon\Carbon::parse($defeat->date_at)->format('d/m/Y') }}<br><br>

    <a href="{{ route('defeat.edit', ['defeat' => $defeat->id]) }}"><button type="button">Editar</button></a><br><br>
    <form action="{{ route('defeat.destroy', ['defeat' => $defeat->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza ao excluir?')">Excluir</button>
    </form>
@endsection
