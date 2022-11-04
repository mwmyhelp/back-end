@extends('beeapp.layout.principal')
@push('js')

    <script>
        var tabela_colaboradores;
        $(document).ready(function () {
            //Datatable
            tabela_normativas = $('#tabela-normativas').DataTable({
                "language": {
                    "url": "/lang/dataTable/principal.json"
                },
                "dom": 'rtip'
            });
            //Filtros
            $('#pesquisar_normativas').on('keyup', function () {
                tabela_normativas.search(this.value).draw();
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
                    Normativas
                </div>
                <div class="col-md-8 navegador d-flex">
                    <li class="pr-3 pl-3 d-flex align-items-center ativo">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-list mr-2"></i> Listagem
                        </a>
                    </li>
                    <li class="pr-3 pl-3 d-flex align-items-center ml-3">
                        <a href="{{route('ceo.normativas.adicionar')}}" class="font-weight-light">
                            <i class="fal fa-plus mr-2"></i> Adicionar Normativa
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
                        <input id="pesquisar_normativas" class="form-control"/>
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

                            <table class="table table-striped table-hover" id="tabela-normativas">
                                <thead class="thead-dark">
                                    <th>
                                        Código
                                    </th>
                                    <th>
                                        Titulo
                                    </th>
                                    <th>
                                        Aplicação
                                    </th>
                                <th>
                                    Ações
                                </th>
                                </thead>
                                <tbody>
                                @foreach($normativas as $normativa)
                                    <tr>
                                        <td>
                                            NR.{{str_pad($normativa->cod,3,"0",STR_PAD_LEFT)}}
                                        </td>
                                        <td>
                                            {{$normativa->titulo}}
                                        </td>
                                        <td>
                                            @if($normativa->geral)
                                                <b>Norma Geral</b>
                                            @elseif($normativa->departamentos)
                                                <b>Departamentos</b><br/>
                                                @foreach($normativa->obterDepartamentos() as $dep)
                                                    {{$dep->nome}}<br/>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td width="1">
                                            <a href="{{route('ceo.normativas.editar',['id_normativa' => $normativa->id])}}" class="text-info mr-3">
                                                <i class="fal fa-pencil"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#modal-{{$normativa->id}}" class="text-success mr-3">
                                                <i class="fal fa-eye"></i>
                                            </a>

                                            <div class="modal fade" id="modal-{{$normativa->id}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$normativa->titulo}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! $normativa->html !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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

