<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        if(Auth::user()->tipo == 'admin'){
         $perm = '1346'; // Administrador
}
if(Auth::user()->tipo == 'admin_empresa'){
         $perm = '7946'; // Administrador da Empresa
}

    if(Auth::user()->tipo == 'bee_lider'){
         $perm = '1948'; // Bee Líder
}

    if(Auth::user()->tipo == 'colaborador'){
         $perm = '5784'; // Colaborador
}
    @endphp
    <meta name="utkp" content="{{$perm}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>BeeApp - Gestão Eficiente</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="{{asset('assets/img/icon.png')}}" type="image/png"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontAwesome/css/all.min.css')}}"/>

    <!-- BS5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{asset('assets/css/BeeVars.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/BeeStyle.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/BeeBootstrap.css')}}"/>

    <link href="{{asset('beeapp/css/swal.css')}}" rel="stylesheet"/>

    @stack('css')

</head>
<body>

<div id="app">

    <!-- Header -->
    <div class="faixa-header">
        <div class="container p-0">
            <header class="pt-2">
                <div class="d-flex align-items-center">
                    <div class="logo">
                        <img src="{{asset('assets/img/logo-amarelo.png')}}"/>
                    </div>
                    <nav class="d-flex ms-4 align-items-center fw-lighter">
                        <a href="{{route('inicio')}}">
                            <li class="ms-5">
                                <i class="fal fa-tachometer-alt-fastest me-2"></i>
                                Dashboard
                            </li>
                        </a>
                        @if(Auth::user()->tipo == 'colaborador' || Auth::user()->tipo == 'bee_lider')
                            <a href="{{route('modulo.colaboradores.info',['view' => '','colab' => Auth::user()->colaborador->id])}}">
                                <li class="ms-5">
                                    Meus Dados
                                </li>
                            </a>
                        @endif
                        @if(Auth::user()->tipo == 'admin')
                            <a href="{{route('gestor.beeconta')}}">
                                <li class="ms-5">
                                    BeeContas
                                </li>
                            </a>
                            <a href="#" onclick="indisponivel()">
                                <li class="ms-5">
                                    Usuários
                                </li>
                            </a>
                            <a href="#" onclick="indisponivel()">
                                <li class="ms-5">
                                    Financeiro
                                </li>
                            </a>
                            @if(Session::get('ASSUMIR_EMPRESA'))
                                <div class="dropdown">
                                    <a class="" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <li class="ms-5">
                                            @php
                                                //Obter Rapidamente a empresa e exibir
                                                $empresa = \App\Models\Hive\BeeConta::where('id',Auth::user()->bee_conta)->first();
                                                echo $empresa->pessoa->nome_fantasia;
                                            @endphp
                                            <i class="fal fa-chevron-down ms-1"></i>
                                        </li>
                                    </a>
                                    <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item text-muted"
                                               href="{{route('modulo.departamentos')}}">
                                                <i class="fab fa-buromobelexperte me-2"></i> Departamentos
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-muted"
                                               href="{{route('modulo.colaboradores.gestao')}}">
                                                <i class="fal fa-user-tie me-2"></i> Colaboradores
                                            </a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-muted" href="{{route('beeceo.normativas')}}">
                                                <i class="fal fa-file-signature me-2"></i> Normativas
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-muted"
                                               href="{{route('beeceo.procedimentos')}}">
                                                <i class="fal fa-books me-2"></i> Procedimentos Operacionais
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-muted" href="{{route('beeceo.diagramas')}}">
                                                <i class="fal fa-project-diagram me-2"></i> Diagramas
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                        @endif

                        @if(Auth::user()->tipo == 'admin_empresa' || Auth::user()->tipo == 'bee_lider')
                            <div class="dropdown">
                                <a class="" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <li class="ms-5">
                                        Minha Empresa <i class="fal fa-chevron-down ms-1"></i>
                                    </li>
                                </a>
                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-muted" href="{{route('modulo.departamentos')}}">
                                            <i class="fab fa-buromobelexperte me-2"></i> Departamentos
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-muted"
                                           href="{{route('modulo.colaboradores.gestao')}}">
                                            <i class="fal fa-user-tie me-2"></i> Colaboradores
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="dropdown">
                                <a class="" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <li class="ms-5">
                                        Gestão de Processos <i class="fal fa-chevron-down ms-1"></i>
                                    </li>
                                </a>
                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-muted" href="{{route('beeceo.normativas')}}">
                                            <i class="fal fa-file-signature me-2"></i> Normativas
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-muted" href="{{route('beeceo.procedimentos')}}">
                                            <i class="fal fa-books me-2"></i> Procedimentos Operacionais
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-muted" href="{{route('beeceo.diagramas')}}">
                                            <i class="fal fa-project-diagram me-2"></i> Diagramas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif


                    </nav>
                    <div class="acoes ms-auto d-flex justify-content-end align-items-center">
                        <a href="#" class="me-4">
                            <i class="fal fa-bell"></i>
                        </a>
                        <div class="dropdown">
                            <a class="d-flex align-items-center" href="#" role="button" id="dropdownMenuLink"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fal fa-user"></i>
                                <small class="ms-3">{{Auth::user()->name}}</small>
                            </a>

                            <ul class="dropdown-menu mt-3">
                                <a class="log-out-btn" href="#"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <li class="text-primary ps-3">
                                        <i class="fal fa-portal-exit me-3"></i>
                                        Sair
                                    </li>
                                </a>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <!-- Main -->
    <main>

        @yield('conteudo')

    </main>

    <!-- Footer -->
    <footer class="pt-2 border-top">
        <div class="container p-0">
            <div class="d-flex align-items-center">
                <div>
                    <nav class="d-flex">
                        <li class="me-4">
                            Ajuda
                        </li>
                        <li class="me-4">
                            Fale Conosco
                        </li>
                        <li class="me-4">
                            Segurança e Privacidade
                        </li>
                        <li class="me-4">
                            Planos
                        </li>
                    </nav>
                    <div class="mt-2">
                        <small class="text-muted">
                            ©2021 - BeeApp, Todos os direitos reservados
                            <a href="#">
                                Termos de uso
                            </a>
                        </small>
                    </div>
                </div>
                <div class="logo ms-auto">
                    <img src="{{asset('assets/img/logo.png')}}"/>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="d-none" id="loadingApp">
    <div class="meter">
        <span style="width:90%;"><span class="progress"></span></span>
    </div>

    <div class="aviso text-center shadow">
        <img src="{{asset('beeapp/images/bee_animation-min.gif')}}">
        <div>
            Estamos carregando suas informações...
        </div>
    </div>
</div>

<script src="{{asset('beeapp/js/main.js')}}"></script>
<script src="{{asset('beeapp/js/alertas.js')}}"></script>
<script src="{{asset('beeapp/js/tratamento.js')}}"></script>
<script src="{{asset('beeapp/js/functions.js')}}"></script>
@stack('js')
<script src="{{asset('js/app.js')}}"></script>
<script>
    tooltips();
</script>
</body>
</html>
