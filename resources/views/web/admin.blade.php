<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Mario Kart 8</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
          rel="stylesheet">

    {{--    @vite(['resources/css/app_web.css', 'resources/js/app_web.js'])--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/web/lib/animate/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/web/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/web/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/web/css/style.css') }}" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<!-- Navbar Start -->
<div class="container-fluid sticky-top">
    <x-alert/>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a href="{{ route('web.index') }}" class="navbar-brand">
                <h1 class="text-white">MARIO KART 8</h1>
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('web.index') }}" class="nav-item nav-link">Home</a>
                    <a href="#sobreNos" class="nav-item nav-link">Sobre</a>
                    <a href="#castigos" class="nav-item nav-link">Castigo</a>
                    <a href="#partidas" class="nav-item nav-link">Partidas</a>
                    <a href="#jogadores" class="nav-item nav-link">Jogadores</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Restrito</a>
                        <div class="dropdown-menu bg-light mt-2">
                            @if(Auth::check())
                                <a href="{{ route('dashboard.index') }}" type="button"
                                   class="dropdown-item small">
                                    Acessar
                                </a>
                            @else
                                <a type="button" class="dropdown-item small" data-bs-toggle="modal"
                                   data-bs-target="#loginProcess">
                                    Entrar
                                </a>
                            @endif
                            <a href="{{ route('forgot.password-show') }}" class="dropdown-item small">Senha</a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

@include('login.modal.modal-loginprocess')
{{--@include('login.modal.modal-forgotpassword')--}}

<!-- Start -->
<div class="container-fluid pt-5 bg-primary hero-header mb-5">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInLeft">mantra do jogo
                </div>
                <h1 class="display-4 text-white mb-4 animated slideInLeft">O que importa não é ganhar a corrida! </h1>
                <p class="text-white mb-4 animated slideInLeft">Mas com certeza fazer o adversário perder de forma mais
                    humilhante e estressante possível, afinal o jogo Mario Kart 8 Deluxe não foi feito para relaxar!</p>
                <div class="d-flex justify-content-start">
                    <div class="animated slideInLeft me-5">
                        <img class="img-fluid" src="{{ asset('web/img/casco-azul.webp') }}" style="width: 90px" alt="#">
                    </div>

                    <div class="animated slideInLeft me-5">
                        <img class="img-fluid" src="{{ asset('web/img/casco-vermelho.webp') }}" style="width: 90px"
                             alt="#">
                    </div>
                    <div class="animated slideInLeft me-5">
                        <img class="img-fluid" src="{{ asset('web/img/bomb.webp') }}" style="width: 90px"
                             alt="#">
                    </div>
                    <div class="animated slideInLeft">
                        <img class="img-fluid" src="{{ asset('web/img/casco-verde.webp') }}" style="width: 90px"
                             alt="#">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end mb-5">
                <img class="img-fluid" src="{{ asset('web/img/mario.png') }}" alt="Mario Kart 8 - Deluxe">
            </div>
        </div>
    </div>
</div>
<!-- End -->

<!-- Sobre Start -->
<div class="container-fluid py-5" id="sobreNos">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="{{ asset('web/img/deadpool.png') }}" alt="#">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Sobre nós</div>
                <h1 class="mb-4">O intuito deste site é controlar a quantidade de partidas e derrotas dos jogadores</h1>
                <p class="mb-4">É claro que exite uma rivalidade entre os jogadores, ninguém gosta de perder! A única
                    forma
                    de provar ao perdedor que ele continua perdendo é cadastrar as informações da partida no banco de
                    dados. Acredite nós levamos isso a
                    sério, além do cadastrado do usuário, da derrota, controle de acesso, autenticação, ainda temos um
                    dashboard das derrotas.
                </p>
                <p class="mb-4">Quem perde está sujeito a ser humilhado, como assim? É simples, o perdedor é obrigado a
                    pagar um castigo do mais humilhante possível!</p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Raiva</h6>
                        <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Estresse</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Ódio</h6>
                        <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Humilhação</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sobre End -->

<!-- Castigo Start -->
<div class="container-fluid bg-light mt-5 py-5" id="castigos">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">E o castigo?</div>
                <h1 class="mb-4">Nosso Castigo é Humilhante e sem Piedade</h1>
                <p class="mb-4">A humilhação rola solta, isso mesmo! Além da zoeira com o perdedor ele se vê obrigado à
                    pagar o castigo. Desde lavar louça, fazer café, buscar café, suco e até mesmo beber algum tipo de
                    bebida formulada pelo capiroto.</p>
                <div class="">
                    <img class="img-fluid" src="{{ asset('web/img/emoji-vomito.png') }}" style="width: 90px"
                         alt="emoji-vomito">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-robot fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Jogue como um robô</h5>
                                    <p>Nunca perca o foco, jamais se destráia com algo e minime as distrações.
                                        Apenas continue.</p>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa-solid fa-piggy-bank fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Suborno</h5>
                                    <p>Dê propina à um inimigo para que ele lhe ajude durante aquela partida difícil. Se
                                        livrando da derrota!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-4">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Estude o adversário</h5>
                                    <p>Descubra a fraqueza do seu adversário, onde ele é pior, onde está tendo um
                                        péssimo rendimento!</p>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-brain fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Use o cérebro</h5>
                                    <p>Analise o decorrer da partida, é hora de atacar ou se defender?! Aguarde o
                                        momento certo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Castigo End -->

<!-- Partidas Start -->
<div class="container-fluid bg-primary feature pt-5" id="partidas">
    <div class="container pt-5">
        <div class="row g-5">
            <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">E as partidas?</div>
                <h1 class="text-white mb-4">Quem tem problema no coração não deveria jogar</h1>
                <p class="text-light mb-4">Segue abaixo algumas informações sobre as partidas de Mario Kart 8 -
                    Deluxe </p>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Jogamos offline com 4 jogadores ao mesmo tempo</span>
                </div>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Sempre rola um lanche durante as partidas</span>
                </div>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Normalmente acontece na sexta-feira</span>
                </div>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Agreção física também acontece</span>
                </div>
                <div class="row g-4 pt-3">
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                            <i class="fa fa-users fa-3x text-white"></i>
                            <div class="ms-3">
                                <h2 class="text-white mb-0" data-toggle="counter-up">{{ $users->count() }}</h2>
                                <p class="text-white mb-0">Total de jogadores</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                            <i class="fa fa-skull-crossbones fa-3x text-white"></i>
                            <div class="ms-3">
                                <h2 class="text-white mb-0" data-toggle="counter-up">{{ $defeats }}</h2>
                                <p class="text-white mb-0">Total de partidas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-end text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                <img class="img-fluid" src="{{ asset('web/img/feature.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Partidas End -->

<!-- Perguntas Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Populares FAQs</div>
            <h1 class="mb-4">Perguntas Frequentes que nos fazem</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="accordion" id="accordionFAQ1">
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                O que é o Mario Kart 8 - Deluxe?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                             data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                É um jogo de Nintendo Switch.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Por que jogar Mario Kart 8 - Deluxe?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                             data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Porque é possível jogar quatro jogadores ao mesmo tempo.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                O que torna esse jogo diferente dos demais?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                             data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                É uma corrida com quatro jogadores ao mesmo tempo onde qualquer um pode ferrar o
                                amiguinho kkkk.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Por que vocês não jogam online?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                             data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Porque nem todos os jogadores possuem o Nintendo switch, dessa forma é mais econômico
                                jogarmos com um único console com quatro controles e a tela da tv dividida em quatro
                                partes.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion" id="accordionFAQ2">
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                O que é a bebida formulada pelo capiroto?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                             data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                É uma mistura de boldo com o que encontramos pela frente tipo, azeite, orêgano,
                                refrigerante, molho de pimenta, catchup e por ai vai!!!.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.6s">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Quais são as agreções que acontece durante o jogo?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                             data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Normalmente são verbais e raramente alguns tapas na cabeça kkkkkk.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.7s">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Que é o mais perdedor do jogo?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                             data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Óbivio, é o Jean!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Jogam valendo dinheiro?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                             data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Não. sem fins lucrativos, jogamos apenas pela diversão e por fazer alguém ficar nervoso
                                durante a jogatina.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Perguntas Start -->

<!-- Time Start -->
<div class="container-fluid bg-light py-5" id="jogadores">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Nosso Time</div>
                <h1 class="mb-4">Conheça nossos experientes jogadores</h1>
                <p class="mb-4">O mais correto toma a caixa do gardenal, o mais forte está só
                    a capa do batman, o mais inteligênte não terminou o ensino fundamental, porém, o ponto positivo para
                    essa cambada de fela da pota é que nenhum deles vota no PT!
                </p>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">
                            @if($marcielUser)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4"
                                             src="storage/{{ $marcielUser->image }}" alt="{{ $marcielUser->nickname }}"
                                             style="width: 350px; height: 300px">
                                        <h5 class="mb-0">{{ $marcielUser->name }}</h5>
                                        <small>Derrotas: {{ $marcielDefeats }}</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($jeanUser)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="storage/{{ $jeanUser->image }}"
                                             alt="{{ $jeanUser->nickname }}" style="width: 350px; height: 300px">
                                        <h5 class="mb-0">{{ $jeanUser->name}}</h5>
                                        <small>Derrotas: {{ $jeanDefeats }}</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($hugoUser)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="storage/{{ $hugoUser->image }}"
                                             alt="{{ $hugoUser->nickname }}" style="width: 350px; height: 300px">
                                        <h5 class="mb-0">{{ $hugoUser->name}}</h5>
                                        <small>Derrotas: {{ $hugoDefeats }}</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-6 pt-md-4">
                        <div class="row g-4">
                            @if($brunoUser)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="storage/{{ $brunoUser->image }}"
                                             alt="{{ $brunoUser->nickname }}" style="width: 350px; height: 300px">
                                        <h5 class="mb-0">{{ $brunoUser->name }}</h5>
                                        <small>Derrotas: {{ $brunoDefeats }} </small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href="#"><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($miguelUser)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="storage/{{ $miguelUser->image }}"
                                             alt="{{ $miguelUser->nickname }}" style="width: 350px; height: 300px">
                                        <h5 class="mb-0">{{ $miguelUser->name }}</h5>
                                        <small>Derrotas: {{ $miguelDefeats }}</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($hilarioUser)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4"
                                             src="storage/{{ $hilarioUser->image }}"
                                             alt="{{ $hilarioUser->nickname }}" style="width: 350px; height: 300px">
                                        <h5 class="mb-0">{{ $hilarioUser->name }}</h5>
                                        <small>Derrotas: {{ $hilarioDefeats }}</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Time End -->

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5">
    <div class="container py-5">
        <div class="row g-5 d-flex justify-content-between">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <a href="#" class="d-inline-block mb-3">
                    <h3 class="text-white">Mario Kart 8 - Deluxe</h3>
                </a>
                <p class="mb-0">Mario Kart 8 Deluxe inclui todo o conteúdo para download (DLC) de Mario Kart 8,
                    incluindo personagens, percursos e componentes de veículos, em um único produto para Nintendo
                    Switch, além de ser o primeiro jogo Mario para o console.</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <h5 class="text-white mb-4">Menu</h5>
                <a class="btn btn-link" href="{{ route('web.index') }}">Home</a>
                <a class="btn btn-link" href="#sobreNos">Sobre</a>
                <a class="btn btn-link" href="#castigos">Castigo</a>
                <a class="btn btn-link" href="#partidas">Partidas</a>
                <a class="btn btn-link" href="#jogadores">Jogadores</a>
                <a class="btn btn-link" href="">Entrar</a>
            </div>
            <div class="col-md-6 col-lg-3">
                <img class="img-fluid" src="{{ asset('web/img/char_mario.png') }}" style="width: 300px"
                     alt="char_mario">
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>

<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/web/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/web/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('js/web/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('js/web/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('js/web/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('js/web/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/web/js/main.js') }}"></script>

</body>

</html>
