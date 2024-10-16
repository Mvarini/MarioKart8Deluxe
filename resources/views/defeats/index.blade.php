@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Derrotas</h2>
            <ol class="breadcrumb mt-3 mb-3 ms-auto">
                <li class="breadcrumb-item mt-3"><a href="#" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active mt-3">Derrotas</li>
            </ol>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <span class="align-middle">Listar</span>
                </div>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                   data-bs-target="#formCreate">Adicionar</a>
            </div>
            <div class="card-body">
                <x-alert/>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Perdedor</th>
                        <th>Algoz</th>
                        <th>Castigo</th>
                        <th>Data</th>
                        <th class="text-center" style="width: 20px">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($defeats as $defeat)
                        <tr>
                            <td class="align-middle">{{ $defeat->user->name }}</td>
                            <td class="align-middle">{{ $defeat->harmed }}</td>
                            <td class="align-middle">{{ $defeat->pain }}</td>
                            <td class="align-middle"> {{ \Carbon\Carbon::parse($defeat->date_at)->format('d/m/Y') }}</td>
                            <td class="d-md-flex flex-row justify-content-center">
                                <div class="dropdown">
                                    <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formShow{{ $defeat->id }}" href="#">Visualizar</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formUpdate{{ $defeat->id }}" href="#">Editar</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#formDelete{{ $defeat->id }}" href="#">Excluir</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger" role="alert">
                            Nenhuma derrota encontrada!
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $defeats->onEachSide(5)->links() }}
    </div>
    @include('defeats.modals.modal-create')
    @include('defeats.modals.modal-show')
    @include('defeats.modals.modal-update')
    @include('defeats.modals.modal-delete')
@endsection



