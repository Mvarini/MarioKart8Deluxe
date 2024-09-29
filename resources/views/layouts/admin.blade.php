<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/sbadmin.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet"/>

    <title>Mario Kart 8</title>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link order-1 order-lg-0  ms-1 text-white" id="sidebarToggle"><i
            class="fas fa-bars fa-lg"></i></button>
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-2" href="#">Mario Kart 8</a>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            @yield('search')
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Meu Perfil</a></li>
                <li><a class="dropdown-item" href="#!">Sair</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="{{ route('defeat.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Derrota
                    </a>
                    <a class="nav-link collapsed" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logado como:</div>
                Marciel A. Varini
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')

            @include('defeats.modals.modal-show')
            @include('defeats.modals.modal-create')
            @include('defeats.modals.modal-update')
            @include('defeats.modals.modal-delete')

        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted"></div>
                    <div>
                        <p class="text-decoration-none">&copy; Marciel {{ date('Y') }} desenvolvido com &hearts;</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sbadmin.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
</body>
</html>
