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
                    <nav class="d-flex ms-4 align-items-center fw-light">
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
    <main>
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="dados-empresa">
                                <img src="https://via.placeholder.com/300x150.png?text=Carregue+a+logo+da+empresa" class="w-100 boder" />
                                <div class="mt-2">
                                    Nome da Empresa
                                    <small class="d-block text-muted">
                                        15.433.895/0001-25
                                    </small>
                                </div>
                                <div class="mt-2">
                                    <a class="text-muted" data-bs-toggle="collapse" href="#mais-dados-empresa">
                                        <small class="text-info">
                                            Mais Informações <i class="fal fa-caret-down"></i>
                                        </small>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse" id="mais-dados-empresa">
                                Inamo Nessi Neie
                            </div>
                        </div>
                    </div>
                    <h4 class="fw-light mt-4">
                        Plano BeeApp
                    </h4>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Plano Selecionado</label>
                                    <select class="form-control">
                                        <option value="padrao">
                                            Plano Padrão
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    Informações do Plano
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <small class="d-block mt-2">
                                        <b>Início do Plano:</b>
                                    </small>
                                    <small class="d-block text-primary">
                                        15/04/1993
                                    </small>
                                    <small class="d-block mt-2">
                                        <b>Primeira Fatura:</b>
                                    </small>
                                    <small class="d-block text-primary">
                                        15/05/1993
                                    </small>
                                    <small class="d-block mt-2">
                                        <b>Vigência:</b>
                                    </small>
                                    <small class="d-block text-primary">
                                        15/05/1994 (1 ano)
                                    </small>
                                    <small class="d-block mt-2">
                                        <b>Plano de Pagamento:</b>
                                    </small>
                                    <small class="d-block text-primary">
                                        Mensal
                                    </small>
                                </div>
                            </div>
                            <div class="row mt-2 pt-2 border-top">
                                <div class="col-lg-6">
                                    Valor do Plano:
                                </div>
                                <div class="col-lg-6 text-end">
                                    R$ 697,00
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    Descontos:
                                </div>
                                <div class="col-lg-6 text-end">
                                    R$ 200,00
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    Valor Final:
                                </div>
                                <div class="col-lg-6 text-end">
                                    R$ 497,00
                                </div>
                            </div>
                            <div class="row mt-2 pt-2 border-top">
                                <small class="d-block mt-2">
                                    <b>Módulos:</b>
                                </small>
                                <small class="d-block text-primary">
                                    BeeCeo
                                </small>
                                <small class="d-block text-primary">
                                    UniBee + BeeHelp
                                </small>
                                <small class="d-block text-primary">
                                    BeeMet
                                </small>
                                <small class="d-block text-primary">
                                    BeeWork
                                </small>
                            </div>
                            <div class="row mt-2 pt-2 border-top">
                                <div class="col-lg-6">
                                    <h4>
                                        Total:
                                    </h4>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <h5 class="p-0 m-0 text-success">R$ 497,00</h5>
                                    <small class="text-muted d-block">
                                        Mensal
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h4 class="fw-light">
                        Cadastro BeeConta
                    </h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2">
                                <h3 class="fw-lighter">
                                    Dados da Empresa
                                </h3>
                                <small class="text-muted">
                                    Dados institucionais da empresa cliete da BeeApp
                                </small>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-5">
                                    <label>CNPJ:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-7">
                                    <label>Razão Social:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-5">
                                    <label>Nome Fantasia:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label>Telefone Fixo:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-5">
                                    <label>Telefone Celular:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-7">
                                    <label>E-mail da Empresa:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-5">
                                    <label>Website:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h3 class="fw-lighter">
                                    Endereço da Empresa
                                </h3>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <label>CEP:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8">
                                    <label>Cidade:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-4">
                                    <label>Estado:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-9">
                                    <label>Logradouro:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Número:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <label>Complemento:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-5">
                                    <label>Bairro:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="fw-light mt-4">
                        Cadastro BeeLíder
                    </h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2">
                                <h3 class="fw-lighter">
                                    Dados do Colaborador
                                </h3>
                                <small class="text-muted">
                                    Esse será o primeiro colaborador cadastrado na empresa.
                                </small>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    <label>CPF:</label>
                                    <input class="form-control" type="text" />
                                    <small class="text-muted">
                                        O BeeLíder usará o seu CPF para acessar a plataforma.
                                    </small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label>Nome:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-7">
                                    <label>Sobrenome:</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <label>Telefone Celular:</label>
                                    <input class="form-control" type="text" />
                                </div>
                                <div class="col-lg-6">
                                        <label>E-mail:</label>
                                        <input class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-primary">
                            <i class="fal fa-save me-2"></i>
                            Criar BeeConta
                        </button>
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
                    <img src="{{asset('assets/img/logo.png')}}" />
                </div>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
