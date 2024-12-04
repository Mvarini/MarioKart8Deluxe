@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Permissão</h2>
            <ol class="breadcrumb mt-3 mb-3 ms-auto">
                <li class="breadcrumb-item active mt-3">Permissão</li>
            </ol>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex">
                <div class="flex-grow-1">
                    <span class="align-middle">Listar</span>
                </div>
                <div>
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ações
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                                   data-bs-target="#permissionCreate">Adicionar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <x-alert/>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="d-none d-md-table-cell">Rota</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td class="align-middle">{{ $permission->title }}</td>
                            <td class="d-none d-md-table-cell align-middle">{{ $permission->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#permissionUpdate{{ $permission->id }}" href="#">Editar</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#permissionDelete{{ $permission->id }}" href="#">Excluir</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning" role="alert">
                            Nunhuma permissão encontrada!
                        </div>
                    @endforelse
                    </tbody>
                </table>
                {{ $permissions->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
    @include('permissions.modal.modal-create')
    @include('permissions.modal.modal-update')
    @include('permissions.modal.modal-destroy')
@endsection
