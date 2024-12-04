@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Papel</h2>
            <ol class="breadcrumb mt-3 mb-3 ms-auto">
                <li class="breadcrumb-item mt-3"><a href="#" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active mt-3">Papéis</li>
            </ol>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex">
                <div class="flex-grow-1">
                    <span class="align-middle">Listar</span>
                </div>
                <div>
                    @if(auth()->user()->can('store-role'))
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Ações
                            </button>

                            <ul class="dropdown-menu">
                                {{--                            <li><a class="dropdown-item btn btn-warning" data-bs-toggle="modal"--}}
                                {{--                                   data-bs-target="#formSearchDefeat">Pesquisar</a></li>--}}
                                <li><a class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                                       data-bs-target="#roleCreate">Adicionar</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">

                <x-alert/>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        @if(auth()->user()->can('update-role') || auth()->user()->can('destroy-role') || auth()->user()->can('index-permission') )
                            <th class="text-center" style="width: 20px">Ações</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td class="align-middle">{{ $role->name }}</td>
                            @if(auth()->user()->can('update-role') || auth()->user()->can('destroy-role') || auth()->user()->can('index-permission') )
                                <td class="d-md-flex flex-row justify-content-center">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark border-0" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @can('update-role')
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                       data-bs-target="#roleUpdate{{ $role->id }}" href="#">Editar</a>
                                                </li>
                                            @endcan

                                            @can('destroy-role')
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                       data-bs-target="#roleDelete{{ $role->id }}" href="#">Excluir</a>
                                                </li>
                                            @endcan

                                            @can('index-permission')
                                                <li><a class="dropdown-item"
                                                       href="{{ route('role-permission.index', ['role' => $role->id]) }}">Permissões</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <div class="alert alert-warning" role="alert">
                            Nenhum papel encontrada!
                        </div>
                    @endforelse
                    </tbody>
                </table>
                {{ $roles->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
    @include('roles.modal.modal-create')
    @include('roles.modal.modal-update')
    @include('roles.modal.modal-destroy')
@endsection




