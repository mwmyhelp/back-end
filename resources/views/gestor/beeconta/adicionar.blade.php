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
                    Bee Contas
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
                        Ao adicionar uma nova <b>Bee Conta</b>, o usuário receberá o e-mail de boas vindas e dados de acesso
                        no endereço informado no formulário ao lado. Será gerado uma senha temporária e ele deve alterar assim
                        que acessar a <b>BeeApp</b> pela primeira vez!
                    </div>
                </div>


            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-11 coluna">

                            <h2 class="font-weight-light border-bottom">
                                Adicionar nova Bee Conta:
                            </h2>


                            <form class="mt-4" method="post" action="{{route('gestor.beeconta.criar')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h5 class="font-weight-bold">Dados da Empresa:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>CNPJ:</label>
                                        <input value="{{old('pessoa.cnpj')}}" type="text" class="form-control" name="pessoa[cnpj]" mask="cnpj" required/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Razão Social:</label>
                                        <input value="{{old('pessoa.razao_social')}}" type="text" class="form-control" name="pessoa[razao_social]" required/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Nome Fantasia:</label>
                                        <input value="{{old('pessoa.nome_fantasia')}}" type="text" class="form-control" name="pessoa[nome_fantasia]" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Telefone Principal:</label>
                                        <input value="{{old('conta.telefone_principal')}}" type="text" class="form-control" name="conta[telefone_principal]" mask="telefone" required />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Telefone Adicional:</label>
                                        <input value="{{old('conta.telefone_adicional')}}" type="text" class="form-control" name="conta[telefone_adicional]" mask="telefone" />
                                    </div>
                                    <div class="form-group col-md-3 offset-md-1">
                                        <label>E-mail Principal:</label>
                                        <input value="{{old('conta.email_principal')}}" type="email" class="form-control" name="conta[email_principal]" required />
                                        <small class="form-text text-muted">
                                            Esse será o e-mail de acesso do administrador dessa <b>BeeConta</b> na plataforma.
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>E-mail Adicional:</label>
                                        <input value="{{old('conta.email_adicional')}}" type="email" class="form-control" name="conta[email_adicional]" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h5 class="font-weight-bold">Endereço:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>CEP:</label>
                                        <input value="{{old('endereco.cep')}}" type="text" class="form-control" name="endereco[cep]" mask="cep" required />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Cidade:</label>
                                        <input value="{{old('endereco.nome_cidade')}}" type="text" class="form-control" name="endereco[nome_cidade]" required/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Estado:</label>
                                        <select name="endereco[uf]" class="form-control" required>
                                            @foreach(config('sistema.estados_brasileiro') as $uf => $estado)
                                                <option value="{{$uf}}" @if($uf == old('endereco.uf')) selected @endif>{{$estado}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Logradouro:</label>
                                        <input value="{{old('endereco.logradouro')}}" type="text" class="form-control" name="endereco[logradouro]"  required />
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Número:</label>
                                        <input value="{{old('endereco.numero')}}" type="text" class="form-control" name="endereco[numero]"  required />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Bairro:</label>
                                        <input value="{{old('endereco.bairro')}}" type="text" class="form-control" name="endereco[bairro]"  required />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Complemento:</label>
                                        <input value="{{old('endereco.complemento')}}" type="text" class="form-control" name="endereco[complemento]" />
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

