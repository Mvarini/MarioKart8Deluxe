{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
<div class="container-fluid px-4">
    {{--        <div class="mb-1 hstack gap-2">--}}
    {{--            <h2 class="mt-3">Derrota</h2>--}}
    {{--            <ol class="breadcrumb mt-3 mb-3 ms-auto">--}}
    {{--                <li class="breadcrumb-item mt-3"><a href="#" class="text-decoration-none">Dashboard</a></li>--}}
    {{--                <li class="breadcrumb-item mt-3"><a href="{{ route('defeat.index') }}" class="text-decoration-none">Derrotas</a></li>--}}
    {{--                <li class="breadcrumb-item active mt-3">Derrota</li>--}}
    {{--            </ol>--}}
    {{--        </div>--}}
    {{--        <div class="card mb-4">--}}
    {{--            <div class="card-header">--}}
    {{--                <span>Detalhes</span>--}}
    {{--            </div>--}}
    {{--            <div class="card-body">--}}
    <dl class="row">
        <dt class="col-md-2">ID:</dt>
        <dd class="col-md-10">{{ $defeat->id }}</dd>

        <dt class="col-md-2">Nome:</dt>
        <dd class="col-md-10">{{ $defeat->user->name }}</dd>

        <dt class="col-md-2">Algoz:</dt>
        <dd class="col-md-10">{{ $defeat->harmed }}</dd>

        <dt class="col-md-2">Castigo:</dt>
        <dd class="col-md-10">{{ $defeat->pain }}</dd>

        <dt class="col-md-2">Data:</dt>
        <dd class="col-md-10">{{ $defeat->date_at }}</dd>

        <dt class="col-md-2">Atualizado:</dt>
        <dd class="col-md-10">{{ \Carbon\Carbon::parse($defeat->updated_at)->format('d/m/Y H:i:s') }}</dd>

        <dt class="col-md-2">Cadastrado:</dt>
        <dd class="col-md-10">{{ \Carbon\Carbon::parse($defeat->created_at)->format('d/m/Y H:i:s') }}</dd>
    </dl>
</div>
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
