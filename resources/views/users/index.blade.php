@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Usuários</h2>
            <ol class="breadcrumb mt-3 mb-3 ms-auto">
                <li class="breadcrumb-item mt-3"><a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active mt-3">Usuários</li>
            </ol>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <span class="align-middle">Listar</span>
                </div>
                <a data-bs-toggle="modal" data-bs-target="#userCreateForm" class="btn btn-primary btn-sm">Adicionar</a>
            </div>
            <div class="card-body shadow-sm">
                <x-alert/>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="d-none d-md-table-cell">E-mail</th>
                        <th class="w-10 text-center">Ações</th>
                    </tr>
                    </thead>
                    @forelse($users as $user)
                        <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userUpdatePasswordForm{{ $user->id }}" href="#">Senha</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userShowForm{{ $user->id }}" href="#">Visualizar</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userUpdateForm{{ $user->id }}" href="#">Editar</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userDeleteForm{{ $user->id }}" href="#">Excluir</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @empty
                        <div class="alert alert-danger" role="alert">
                            Nenhum usuário encontrado!
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
        {{ $users->onEachSide(5)->links() }}
    </div>
    @include('users.modal.modal-create')
    @include('users.modal.modal-show')
    @include('users.modal.modal-update')
    @include('users.modal.modal-delete')
    @include('users.modal.modal-updatePassword')
@endsection
