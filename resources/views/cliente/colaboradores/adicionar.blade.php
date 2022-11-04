@extends('beeapp.layout.principal')
@push('js')

    <script>

    </script>
@endpush


@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <i class="fad fa-user mr-2"></i>
                    Colaboradores
                </div>
                <div class="col-md-8 navegador d-flex">
                    @include('gestor.beeconta.navegador',['ativo' => 'listagem'])
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner pt-0">
        <div class="row">
            <div class="col-md-2 pt-3">

                <div class="card bee-aviso">
                    <div class="card-title">
                        <img src="{{asset('images/char/bee-01.png')}}" />
                        <b>Fique ligado!</b>
                    </div>
                    <div class="card-body">
                        Ao adicionar um novo <b>Colaborador</b>, será criado um usuário com o e-mail informado.
                        Será enviado um e-mail com a senha de acesso temporária, assim que acessar pela primeira vez, o usuário devera inserir uma nova senha.
                    </div>
                </div>

            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-11 coluna">

                            <h2 class="font-weight-light border-bottom">
                                Adicionar novo Colaborador:
                            </h2>


                            <form class="mt-4" method="post" action="{{route('cliente.colaboradores.criar')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h5 class="font-weight-bold">Dados da Empresa:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>CPF:</label>
                                        <input value="{{old('cpf')}}" type="text" class="form-control" name="cpf" mask="cpf" required/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Nome:</label>
                                        <input value="{{old('nome')}}" type="text" class="form-control" name="nome" required/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Sobrenome:</label>
                                        <input value="{{old('sobrenome')}}" type="text" class="form-control" name="sobrenome" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-lg-4">
                                        <label>Data de Nascimento:</label>
                                        <input value="{{old('nascimento')}}" type="date" class="form-control" name="nascimento" required />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>E-mail Principal:</label>
                                        <input value="{{old('email')}}" type="email" class="form-control" name="email" required />
                                        <small class="form-text text-muted">
                                            Esse será o e-mail de acesso desse <b>Colaborador</b> na plataforma.
                                        </small>
                                    </div>
                                </div>
                                <div class="row border-top">
                                    <div class="form-group col-md-2 offset-md-10">
                                        <button class="btn btn-block btn-outline-dark">
                                            <i class="fa fa-archive mr-2"></i> Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

