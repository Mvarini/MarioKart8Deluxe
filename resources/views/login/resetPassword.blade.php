@extends('layouts.login')
@section('content')
    <!--wrapper-->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 align-items-center vh-100">
                <div class="col mx-auto">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="border shadow p-4 rounded">
                                <div class="d-grid">
                                    <a class="my-4"> <span
                                            class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="{{ asset('web/img/casco-vermelho.webp') }}"
                                                     width="200"
                                                     alt="casco_vermelho">
											</span>
                                    </a>
                                    <div class="login-separater text-center mb-2">
                                        <span>Seja bem-vindo(a)</span>
                                    </div>

                                </div>
                                <div class="login-separater text-center mb-4">
                                    <span>Vamos atualizar a sua senha!</span>
                                </div>

                                <x-alert/>
                                {{--                                    @if(session('success'))--}}
                                {{--                                        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
                                {{--                                            {{ session('success') }}--}}
                                {{--                                            <button type="button" class="btn-close" data-bs-dismiss="alert"--}}
                                {{--                                                    aria-label="Close"></button>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endif--}}

                                {{--                                    @if(session('error'))--}}
                                {{--                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
                                {{--                                            {{ session('error') }}--}}
                                {{--                                            <button type="button" class="btn-close" data-bs-dismiss="alert"--}}
                                {{--                                                    aria-label="Close"></button>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endif--}}

                                {{--                                    @if($errors->any())--}}
                                {{--                                            @foreach ($errors->all() as $error)--}}
                                {{--                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
                                {{--                                                    {{ $error }}--}}
                                {{--                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
                                {{--                                                </div>--}}
                                {{--                                            @endforeach--}}
                                {{--                                    @endif--}}

                                <div class="form-body">
                                    <form class="row g-3" action="{{ route('password.reset-submit') }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="E-mail" value="{{ old('email') }}">
                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control" id="password"
                                                   name="password"
                                                   placeholder="Nova senha">
                                        </div>

                                        <div class="col-12">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                   name="password_confirmation"
                                                   placeholder="Confirmar nova senha">
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"
                                                        onclick="this.innerText='Atualizando...'">Atualizar
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-4">
                                            <a href="{{ route('web.index') }}" class="text-decoration-none">Voltar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end wrapper-->
@endsection
