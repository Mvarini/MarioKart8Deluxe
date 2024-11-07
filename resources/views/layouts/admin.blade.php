<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/booststrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sbadmin.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Mario Kart 8</title>
</head>
<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link order-1 order-lg-0  ms-1 text-white" id="sidebarToggle"><i
            class="fas fa-bars fa-lg"></i></button>
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-2" href="{{ route('web.index') }}">Mario Kart 8</a>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            @yield('search')
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            @if(Auth::check())
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    @if(Auth::user()->image)
                        <img class="rounded-5 me-2" src="/storage/{{ Auth::user()->image }}" alt="{{ Auth::user()->nickname }}" style="width: 35px; height: 35px"/>
                    @else
                        <i class="fas fa-user fa-fw me-2"></i>
                    @endif
                    {{ Auth::user()->nickname }}
                </a>
            @endif
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileUpdateForm" href="">Perfil</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileUpdatePassword" href="">Senha</a></li>
                <li><a class="dropdown-item" href="{{ route('login.destroy') }}">Sair</a></li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a @class(['nav-link', 'active' => isset($menu) && $menu == 'dashboardActiveMenu']) href="{{ route('dashboard.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        Dashboard
                    </a>
                    <a @class(['nav-link', 'active' => isset($menu) && $menu == 'userActiveMenu']) href="{{ route('user.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Usuários
                    </a>
                    <a @class(['nav-link', 'active' => isset($menu) && $menu == 'defeatActiveMenu']) href="{{ route('defeat.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-crown"></i></div>
                        Derrotas
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        <footer class="py-1 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex justify-content-between small">
                    <div class="text-muted"></div>
                    <div>
                        <p class="text-decoration-none">&copy; Marciel {{ date('Y') }} desenvolvido com &hearts;</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@include('profiles.modal.modal-updateprofile')
@include('profiles.modal.modal-passwordupdate')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sbadmin.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="{{ asset('js/mask-inputmask.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>

@stack('graficos')

</body>
</html>
