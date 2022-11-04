<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BeeApp - Gestão Eficiente</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/img/icon.png')}}" type="image/png"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontAwesome/css/all.min.css')}}" />

    <!-- BS5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{asset('assets/css/BeeVars.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/BeeStyle.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/BeeBootstrap.css')}}" />

</head>
<body>

<div id="app">

    <!-- Header -->
    <div class="faixa-header">
        <div class="container p-0">
            <header class="pt-2">
                <div class="d-flex align-items-center">
                    <div class="logo">
                        <img src="{{asset('assets/img/logo-amarelo.png')}}" />
                    </div>
                    <nav class="d-flex ms-4 align-items-center fw-lighter">
                        <li class="ms-5">
                            <i class="fal fa-tachometer-alt-fastest me-2"></i>
                            Dashboard
                        </li>
                        <li class="ms-5">
                            BeeContas
                        </li>
                        <li class="ms-5">
                            Usuários
                        </li>
                        <li class="ms-5">
                            Financeiro
                        </li>
                    </nav>
                    <div class="acoes ms-auto d-flex justify-content-end align-items-center">
                        <a href="#" class="me-4">
                            <i class="fal fa-bell"></i>
                        </a>
                        <a href="#" class="d-flex align-items-center">
                            <i class="fal fa-user"></i>
                            <small class="ms-3">Raphael</small>
                        </a>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <!-- Main -->
    <main class="pb-5">

        <div class="container pt-4 pb-4">



        </div>


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
                    <img src="{{asset('assets/img/logo.png')}}" />
                </div>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
