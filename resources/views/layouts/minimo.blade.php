<!doctype html>
<html lang="pt_BR">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link href="{{asset('beeapp/css/swal.css')}}" rel="stylesheet" />

    @stack('css')

</head>
<body class="bg-secondary">
<div id="app">
    <header class="border-bottom bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-3 pb-3 d-flex align-items-center">
                    <img class="wp-100" src="{{asset('images/logo.png')}}"/>
                    <div class="ms-auto">
                        Não possue acesso?
                        <a href="#">
                            <b class="text-primary">Entre em contato!</b>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('conteudo')
    <footer class="fixed-bottom border-top bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-3 pb-3">
                    <div class="text-center">
                        <a href="#">
                            <small>
                                <i class="fal fa-lock me-3"></i>
                                Políticas de Privacidade
                            </small>
                        </a>
                    </div>
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
        <img src="https://cdn.dribbble.com/users/2049961/screenshots/5390540/bee_animation_dribble.gif">
        <div>
            Estamos carregando suas informações...
        </div>
    </div>
</div>

<script src="{{asset('beeapp/js/alertas.js')}}"></script>
<script src="{{asset('beeapp/js/tratamento.js')}}"></script>
<script src="{{asset('beeapp/js/functions.js')}}"></script>
@stack('js')
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
