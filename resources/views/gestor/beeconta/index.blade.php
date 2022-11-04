@extends('beeapp.layout.principal')
@push('js')

    <script>
        var tabela_bee_conta;
        $(document).ready(function () {
            //Datatable
            tabela_bee_conta = $('#tabela_bee_conta').DataTable({
                "language": {
                    "url": "/lang/dataTable/principal.json"
                },
                "dom": 'rtip'
            });
            //Filtros
            $('#pesquisar_bee_conta').on('keyup', function () {
                tabela_bee_conta.search(this.value).draw();
            });

        });

        function assumirAcesso(nome, id){
            Swal.fire({
                title: "Confirmação",
                text : "Você tem certeza que deseja assumir o acesso do usuario "+nome+"? " +
                    "Após assumir, é necessário logout da conta para retomar ao seu usuário.",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Assumir",
                icon: 'warning'
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "/gestor/assumir-acesso?uuid="+id;
                }
            });
        }
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
                <b>Filtros:</b>

                <div class="text-muted mt-3">
                    <div class="form-group m-0 p-0 w-100">
                        <label>
                            Pesquisar:
                            <input id="pesquisar_bee_conta" class="form-control"/>
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-11 coluna">

                            <h2 class="font-weight-light border-bottom">
                                Contas cadastradas na plataforma:
                            </h2>


                            <div class="table-responsive mt-4">
                                <table class="table table-striped" id="tabela_bee_conta">
                                    <thead class="bg-dark text-white">
                                    <th></th>
                                    <th>Nome da Conta</th>
                                    <th>Razão CNPJ</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bee_contas as $conta)
                                        <tr>
                                            <td width="1">
                                                <img style="width: 50px;" class="rounded-circle"
                                                     src="{{\laravelApiHelpers\AssetHelper::get($conta->imagem_perfil)}}"/>
                                            </td>
                                            <td>{{$conta->pessoa->nome_fantasia}}</td>
                                            <td>
                                                <b>{{$conta->pessoa->razao_social}}</b><br/>
                                                {{\laravelApiHelpers\FormatHelper::mascarar($conta->pessoa->cnpj, "##.###.###/####-##")}}
                                            </td>
                                            <td>{{$conta->email_principal}}</td>
                                            <th>
                                                <button type="button" onclick="assumirAcesso('{{$conta->pessoa->nome_fantasia}}','{{$conta->id_usuario}}')" class="btn btn-sm btn-dark mr-3">
                                                    Assumir Acesso
                                                </button>
                                                <a href="#" class="text-info mr-3">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

