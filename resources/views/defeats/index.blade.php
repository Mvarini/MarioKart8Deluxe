@extends('layouts.admin')
@section('content')
    <h1>Listar todas as derrotas</h1>

    <a href="{{ route('defeat.create') }}"><button type="button">Cadastrar</button></a><br><br>

    @if(session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif

    @forelse($defeats as $defeat)
        ID: {{ $defeat->id }}<br>
        Nome: {{ $defeat->user->name }}<br>
        Prejudicou: {{ $defeat->harmed }}<br>
        Castigo: {{ $defeat->pain }}<br>
        Data: {{ \Carbon\Carbon::parse($defeat->date_at)->format('d/m/Y') }}<br><br>

        <a href="{{ route('defeat.show', ['defeat' => $defeat->id]) }}"><button type="button">Visualizar</button></a><br><br>
        <a href="{{ route('defeat.edit', ['defeat' => $defeat->id]) }}"><button type="button">Editar</button></a><br><br>
        <form action="{{ route('defeat.destroy', ['defeat' => $defeat->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza ao excluir?')">Excluir</button>
        </form>

        <hr>
    @empty
        <p>Nenhum registro encontrado</p>
    @endforelse
@endsection
