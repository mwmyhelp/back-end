@extends('beeapp.layout.principal')
@push('js')

    <script>
        var tabela_colaboradores;
        $(document).ready(function () {
            //Datatable
            tabela_colaboradores = $('#tabela-colaboradores').DataTable({
                "language": {
                    "url": "/lang/dataTable/principal.json"
                },
                "dom": 'rtip'
            });
            //Filtros
            $('#pesquisar_colaboradores').on('keyup', function () {
                tabela_colaboradores.search(this.value).draw();
            });

        });
    </script>
@endpush


@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <i class="fab fa-users-cog mr-2"></i>
                    Colaboradores
                </div>
                <div class="col-md-8 navegador d-flex">
                    <li class="pr-3 pl-3 d-flex align-items-center ativo">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-list mr-2"></i> Listagem
                        </a>
                    </li>
                    <li class="pr-3 pl-3 d-flex align-items-center ml-3">
                        <a href="{{route('cliente.colaboradores.adicionar')}}" class="font-weight-light">
                            <i class="fal fa-plus mr-2"></i> Adicionar Colaborador
                        </a>
                    </li>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner pt-0">
        <div class="row">
            <div class="col-md-2 pt-3">

                <div class="text-muted mt-3">
                    <div class="form-group m-0 p-0 w-100">
                        <label>
                            Pesquisar:
                        </label>
                        <input id="pesquisar_colaboradores" class="form-control"/>
                        <small class="text-muted mt-2">
                            Você pode pesquisar pelo valor de qualquer uma das colunas.
                        </small>
                    </div>
                </div>


            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-12">

                            <table class="table table-striped" id="tabela-colaboradores">
                                <thead class="thead-dark">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Documento
                                    </th>
                                    <th>
                                        Nascimento
                                    </th>
                                    <th>
                                        Cargos
                                    </th>
                                    <th>
                                        Usuário
                                    </th>
                                </thead>
                                <tbody>
                                @foreach($colaboradores as $colab)
                                    <tr>
                                        <td>
                                            <a href="{{route('cliente.colaboradores.detalhes',['id_colab' => $colab->id])}}">

                                                {{$colab->pessoa_fisica->nome." ".$colab->pessoa_fisica->sobrenome}}

                                            </a>
                                        </td>
                                        <td>
                                            {{\laravelApiHelpers\FormatHelper::mascarar($colab->pessoa_fisica->cpf,"###.###.###-##")}}
                                        </td>
                                        <td>
                                            {{date("d/m/Y",strtotime($colab->pessoa_fisica->nascimento))}}
                                        </td>
                                        <td>
                                            <b>-</b>
                                        </td>
                                        <td>
                                            {{$colab->usuario->email}}
                                        </td>
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
@endsection

