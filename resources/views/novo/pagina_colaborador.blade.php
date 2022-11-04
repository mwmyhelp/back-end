<!DOCTYPE html>
<html lang="pt-br">
<head>
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
    <div class="sub-faixa-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-2 mb-2">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Resumo
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main -->
    <main>

        <div class="container pt-5 pb-4">

            <div class="row pt-3">
                <div class="col-lg-8">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="fal fa-flag me-2"></i>
                        Nenhuma notificação a ser exibida.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <h3 class="text-gray-1 fw-300">
                        Exercício:
                    </h3>
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action d-flex align-items-center"
                                    aria-current="true">
                                    <div class="avatar mb-auto">
                                        <img src="https://via.placeholder.com/350"
                                             class="img-thumbnail rounded-circle wp-75"/>
                                    </div>
                                    <div class="descricao d-flex flex-column ms-4">
                                        <b>Analista Financeiro</b>
                                        <small class="text-muted">
                                            <b>Administrativo, Financeiro</b>
                                        </small>
                                        <small class="text-muted">
                                            Contas a Pagar
                                        </small>
                                    </div>


                                    <div class="status ms-auto mb-auto d-flex flex-column g-3 align-items-stretch">

                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-outline-primary dropdown-toggle w-100" href="#"
                                               role="button"
                                               id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fal fa-file-alt me-2"></i> Documentos
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Atribuições
                                                        </span>
                                                        <small class="text-muted ms-auto">
                                                            5
                                                        </small>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Procedimentos
                                                        </span>
                                                        <small class="text-muted ms-auto">
                                                            2
                                                        </small>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Normativas
                                                        </span>
                                                        <small class="text-muted ms-auto">
                                                            2
                                                        </small>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="dropdown">
                                            <button class="btn btn-sm mt-2 btn-outline-danger w-100">
                                                <i class="fal fa-unlink me-2"></i> Desassociar
                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Atribuições
                                                        </span>
                                                        <small class="text-muted ms-auto">
                                                            5
                                                        </small>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Procedimentos
                                                        </span>
                                                        <small class="text-muted ms-auto">
                                                            2
                                                        </small>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Normativas
                                                        </span>
                                                        <small class="text-muted ms-auto">
                                                            2
                                                        </small>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <h3 class="text-gray-1 fw-300 mt-3">
                        Documentação:
                    </h3>

                    <div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action border rounded"
                                aria-current="true">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <i class="fal fa-list-ul me-2 text-info"></i>
                                        Minhas Atribuições
                                    </div>
                                    <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        2
                                    </span>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item list-group-item-action border rounded mt-2"
                                aria-current="true">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <i class="fal fa-book-alt me-2 text-info"></i>
                                        Normativas
                                    </div>
                                    <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        2
                                    </span>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item list-group-item-action border rounded mt-2"
                                aria-current="true">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <i class="fal fa-tasks-alt me-2 text-info"></i>
                                        Procedimentos Operacionais
                                    </div>
                                    <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        2
                                    </span>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item list-group-item-action border rounded mt-2"
                                aria-current="true">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <i class="fal fa-project-diagram me-2 text-info"></i>
                                        Diagramas
                                    </div>
                                    <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        2
                                    </span>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item list-group-item-action border rounded mt-2"
                                aria-current="true">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <i class="fal fa-page-break me-2 text-info"></i>
                                        Formulários
                                    </div>
                                    <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        2
                                    </span>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-lg-4">
                    <h3 class="text-gray-1 fw-300">
                        Informações:
                    </h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar mb-auto pe-5 ps-5">
                                <img src="https://via.placeholder.com/350"
                                     class="img-thumbnail rounded-circle wp-200"/>
                            </div>
                            <div class="mt-3 d-flex flex-column align-items-center">
                                <span class="fw-500">
                                    Raphael Aparecido de Melo Barboza
                                </span>
                                <span class="text-muted">
                                    015.663.191-10
                                </span>
                                <div class="badge bg-warning text-dark">
                                    <i class="fal fa-star me-2"></i>
                                    BeeLíder
                                </div>
                            </div>
                            <div class="border-top mt-2 pt-2">
                                <div class="d-flex flex-column">
                                    <small class="fw-600">
                                        Telefone Celular:
                                    </small>
                                    <span class="text-muted">
                                    (66) 9 9229-5969
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2">
                                    <small class="fw-600">
                                        Email:
                                    </small>
                                    <span class="text-muted">
                                    eletronic.raphael@gmail.com
                                    </span>
                                </div>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <div class="d-flex flex-column">
                                    <small class="fw-600">
                                        Nascimento:
                                    </small>
                                    <span class="text-muted">
                                    15/04/1993 (21 anos)
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2">
                                    <small class="fw-600">
                                        Estado Civil:
                                    </small>
                                    <span class="text-muted">
                                    Casado
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2">
                                    <small class="fw-600">
                                        Tipo Sanguíneo:
                                    </small>
                                    <span class="text-muted">
                                    A+
                                    </span>
                                </div>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <button class="btn btn-outline-info w-100">
                                    <i class="fal fa-key-skeleton me-3"></i>
                                    Redefinir Senha
                                </button>
                                <button class="btn btn-outline-danger mt-2 w-100">
                                    <i class="fal fa-ban me-3"></i>
                                    Bloquear Acesso
                                </button>
                                <button class="btn btn-danger mt-4 w-100">
                                    <i class="fal fa-trash me-3"></i>
                                    Remover Colaborador
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

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
                    <img src="{{asset('assets/img/logo.png')}}"/>
                </div>
            </div>
        </div>
    </footer>
</div>


</body>
</html>
