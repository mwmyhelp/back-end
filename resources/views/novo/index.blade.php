@extends('layouts.principal')

@section('conteudo')
    <div class="container pt-4 pb-4">

        <div class="row">
            <div class="col-12 d-flex flex-column flex-lg-row">
                <h3 class="text-gray-1 fw-300">
                    BeeContas cadastradas
                </h3>
                <div class="dropdown ms-lg-auto">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Lista de Ações
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Criar nova conta</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <label>Buscar pelo nome:</label>
                                <input type="text" class="form-control"/>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label>Plano:</label>
                                <select class="form-control">
                                    <option value="todos">Todos</option>
                                </select>
                            </div>
                            <div class="col-6 col-lg-5">
                                <label>Criadas de:</label>
                                <input type="date" class="form-control"/>
                            </div>
                            <div class="col-6 col-lg-5">
                                <label>Até:</label>
                                <input type="date" class="form-control"/>
                            </div>
                            <div class="col-12 col-lg-2">
                                <label>&nbsp;</label>
                                <button class="btn btn-primary w-100 d-block">
                                    <i class="fal fa-filter me-2"></i>
                                    Filtrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action d-flex align-items-center"
                                aria-current="true">
                                <div class="avatar mb-auto">
                                    <img src="https://via.placeholder.com/350"
                                         class="img-thumbnail rounded-circle wp-100"/>
                                </div>
                                <div class="descricao d-flex flex-column ms-4">
                                    <b>Agrosolos Agricultura de Precisão</b>
                                    <small class="text-muted">
                                        <b>Radin e Gebert LTDA</b><br/>14.007.549/0001-12
                                    </small>
                                    <small class="text-muted">
                                        dep.pessoal@agrosolosap.com.br
                                    </small>

                                    <div class="d-flex align-items-center mt-3">
                                        <a href="#" class="btn btn-sm btn-outline-dark rounded-pill">
                                            Assumir acesso
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-pill ms-3">
                                            Mais informações
                                        </a>
                                    </div>

                                </div>
                                <div class="status ms-auto mb-auto d-flex flex-column">
                                    <b class="text-success">
                                        Cliente Ativo
                                    </b>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
