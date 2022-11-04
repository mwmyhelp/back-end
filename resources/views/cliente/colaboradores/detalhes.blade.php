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
            //Cargos
            atualizarCargos();

        });

        function editarAt(cod, desc, id) {
            $('#modal_at_num').html(cod);
            $('#modal_at_desc').html(desc);
            $('#modal_at_id').val(id);
            $('#editAtribuicao').modal();
        }

        function removerAt(cod, desc, id) {
            Swal.fire({
                ...beeSwalVars,
                icon: 'warning',
                html: "Você confirma a remoção da <b>AT " + cod + "</b>:<br/>" + desc,
                footer: '<small>Evite apagar atribuições, as numerações não poderão ser reutilizadas.',
                showConfirmButton: true,
                showCancelButton: true,
                willOpen: () => {
                    somAviso();
                },
                confirmButtonText: "Sim, confirmo.",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/cliente/atribuicoes/" + id + "/remover";
                }
            });
        }

        function atualizarCargos() {
            var dep = $('#id_departamento').val();
            $('#id_cargo option').hide();
            $('#id_cargo option[dep="' + dep + '"]').show();
            $('#id_cargo').val('');
        }

        function deslinkarCargo(id_cargo, desc) {
            Swal.fire({
                ...beeSwalVars,
                icon: 'warning',
                html: "Você confirma a desocupação do cargo:<br/>" + desc,
                footer: '<small>O colaborador não terá acesso as normativas, processos e atribuições deste cargo.',
                showConfirmButton: true,
                showCancelButton: true,
                willOpen: () => {
                    somAviso();
                },
                confirmButtonText: "Sim, confirmo.",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/cliente/colaboradores/{{$colaborador->id}}/desocuparCargo?cargo=" + id_cargo;
                }
            });
        }

    </script>
@endpush

@push('modal')

    <div class="modal fade" id="addAtribuicao" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova atribuição</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post"
                      action="{{route('cliente.atribuicoes.adicionar',['tipo' => 'colaborador', 'id_colab' => $colaborador->id])}}">
                    @csrf
                    <div class="modal-body">
                        <div class="text-muted bg-light rounded p-2 text-justify">
                            <i class="fal fa-info mr-2 text-info"></i>
                            Você esta adicionando uma nova atribuição diretamente ao colaborador,
                            essa atribuição não poderá ser reutilizada para outros colaboradores. Caso necessário
                            atribua diretamente
                            em cargos ou papéis exercidos.<br>
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Descreva a atribuição no campo abaixo:</label>
                            <textarea rows="5" name="descricao" class="form-control" placeholder="Atribuição..."></textarea>
                            <small class="text-muted">
                                A númeração da AT é gerada automaticamente.
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAtribuicao" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Atribuição</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('cliente.atribuicoes.editar')}}">
                    @csrf
                    <input type="hidden" name="id" id="modal_at_id" required/>
                    <div class="modal-body">
                        <div class="text-muted bg-light rounded p-2 text-justify">
                            <i class="fal fa-info mr-2 text-info"></i>
                            Você esta alterando a Atribuição n. <b id="modal_at_num">0</b>
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Descreva a atribuição no campo abaixo:</label>
                            <textarea id="modal_at_desc" name="descricao" class="form-control" placeholder="Atribuição..."
                                      required></textarea>
                            <small class="text-muted">
                                A numeração da AT não pode ser alterada.
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editColab" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('cliente.colaboradores.salvar',['id_colab' => $colaborador->id])}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row mt-2">
                            <div class="form-group col-md-5">
                                <label>Nome:</label>
                                <input name="nome" class="form-control" value="{{$colaborador->pessoa_fisica->nome}}"
                                       required/>
                            </div>
                            <div class="form-group col-md-7">
                                <label>Sobrenome:</label>
                                <input name="sobrenome" class="form-control"
                                       value="{{$colaborador->pessoa_fisica->sobrenome}}" required/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-5">
                                <label>Data de Nascimento:</label>
                                <input name="nascimento" type="date" class="form-control"
                                       value="{{$colaborador->pessoa_fisica->nascimento}}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="linkarCargo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ocupar Cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post"
                      action="{{route('cliente.colaboradores.ocupar.cargo',['id_colab' => $colaborador->id])}}">
                    @csrf
                    <div class="modal-body">
                        <div class="text-muted bg-light rounded p-2 text-justify">
                            <i class="fal fa-info mr-2 text-info"></i>
                            Selecione um departamento, e assim que a lista de cargos carregar, selecione o cargo
                            desejado.<br>
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Departamento:</label>
                            <select onchange="atualizarCargos()" name="id_departamento" id="id_departamento"
                                    class="form-control">
                                @foreach($lista_departamentos as $departamento)
                                    @if($departamento->filhos)
                                        <option value="{{$departamento->id}}">
                                            {{$departamento->nome}}
                                        </option>
                                        @foreach($departamento->filhos as $filho)
                                            <option value="{{$filho->id}}">
                                                ----->{{$filho->nome}}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="{{$departamento->id}}">
                                            {{$departamento->nome}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <small class="text-muted">
                                Ao selecionar o departamento, a lista de cargos será atualizada.
                            </small>
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Cargo:</label>
                            <select name="id_cargo" id="id_cargo" class="form-control">
                                @foreach($lista_cargos as $cargo)
                                    <option value="{{$cargo->id}}" dep="{{$cargo->id_departamento}}">
                                        {{$cargo->titulo}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Ocupar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endpush

@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    Detalhes do Colaborador
                </div>
                <div class="col-md-8 navegador d-flex">
                    <li class="pr-3 pl-3 d-flex align-items-center ativo">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-info mr-2"></i> Detalhes
                        </a>
                    </li>
                    <div class="pr-3 pl-3 d-flex align-items-center ml-1">
                        <h5 class="m-0 p-0">
                            {{$colaborador->pessoa_fisica->nome}}&nbsp;{{$colaborador->pessoa_fisica->sobrenome}}
                        </h5>
                    </div>

                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fal fa-trash mr-2"></i>
                        Remover Colaborador
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner pt-0">
        <div class="row">
            <div class="col-md-2 pt-3">

                <div class="text-muted mt-3">
                    <div class="form-group m-0 p-0 w-100">
                        <div class="d-flex align-items-center">
                            <label>
                                Cargos Ocupados:
                            </label>
                            <button class="btn btn-sm btn-dark ml-auto" data-toggle="modal" data-target="#linkarCargo">
                                <i class="fal fa-link"></i>
                            </button>
                        </div>
                        <div class="border p-2 mt-2">
                            @foreach($colaborador->cargos as $item)
                                {{$item->cargo->titulo}} <a href="#"
                                                            onclick="deslinkarCargo('{{$item->cargo->id}}', '{{$item->cargo->titulo}}')"
                                                            class="ml-3 text-info"> <i class="fal fa-unlink"></i> </a>
                                <br/>
                                <b>{{$item->cargo->departamento->nome}}</b>
                                <hr/>
                            @endforeach


                        </div>
                    </div>
                    <div class="form-group m-0 p-0 w-100 mt-5">
                        <label>
                            Papeis Exercidos:
                        </label>
                        <div class="border p-2">
                            @foreach($lista_papeis->departamentos_coordenados as $papel)
                                Coordenador de <br/> <b>{{$papel->nome}}</b>
                                <hr/>
                            @endforeach

                            @foreach($lista_papeis->departamentos_liderados as $papel)
                                Líder de <br/> <b>{{$papel->nome}}</b>
                                <hr/>
                            @endforeach

                            @foreach($lista_papeis->setores_liderados as $papel)
                                Líder de <br/> <b>{{$papel->titulo}}</b>
                                <hr/>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-12">

                            <form>
                                <div class="row">

                                    <div class="col-md-12 d-flex">
                                        <img src="https://via.placeholder.com/150" class="img-thumbnail"/>
                                        <div class="ml-3">
                                            <div class="border p-4 d-flex h-100">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <h3 class="font-weight-light">
                                                            Informações do Colaborador:
                                                        </h3>

                                                        <button type="button" data-toggle="modal"
                                                                data-target="#editColab"
                                                                class="btn btn-sm btn-outline-info ml-4">
                                                            <i class="fal fa-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <b>Nome:</b> {{$colaborador->pessoa_fisica->nome}}
                                                    &nbsp;{{$colaborador->pessoa_fisica->sobrenome}} <br/>
                                                    <b>CPF:</b> {{\laravelApiHelpers\FormatHelper::mascarar($colaborador->pessoa_fisica->cpf,'###.###.###-##')}}
                                                    <br/>
                                                    <b>Nascimento:</b> {{date('d/m/Y',strtotime($colaborador->pessoa_fisica->nascimento))}}
                                                </div>
                                                <div class="ml-3 pl-3 border-left">
                                                    <div class="d-flex align-items-center">
                                                        <h3 class="font-weight-light">
                                                            Informações do Usuário:
                                                        </h3>

                                                        <button class="btn btn-sm btn-outline-secondary ml-4">
                                                            <i class="fal fa-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <b>E-mail:</b> {{$colaborador->usuario->email}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>

                        <div class="col-md-12 border-top mt-3 pt-3">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                       role="tab" aria-controls="nav-home" aria-selected="true">
                                        Atribuições
                                    </a>
                                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                       role="tab" aria-controls="nav-profile" aria-selected="false">
                                        Procedimentos Operacionais
                                    </a>
                                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                       role="tab" aria-controls="nav-contact" aria-selected="false">
                                        Normativas
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <div class="p-2 mt-2">
                                        <div class="d-flex align-items-center">
                                            <h4 class="font-weight-light">Atribuições do Colaborador:</h4>
                                            <button class="btn btn-sm btn-outline-dark ml-auto" data-toggle="modal"
                                                    data-target="#addAtribuicao">
                                                <i class="fal fa-plus-hexagon mr-2"></i>
                                                Adicionar Atribuição
                                            </button>
                                        </div>
                                        <table class="table table-striped table-hover">
                                            <thead class="thead-light">
                                            <th>Cod.</th>
                                            <th>Descrição</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                            @foreach($att_colaborador as $att)
                                                <tr>
                                                    <td width="1">
                                                        AT.{{str_pad($att->cod,3,'0',STR_PAD_LEFT)}}
                                                    </td>
                                                    <td>
                                                        {!! $att->descricao !!}
                                                    </td>
                                                    <td class="d-flex justify-content-end">
                                                        <a href="#"
                                                           onclick="editarAt('{{str_pad($att->cod,3,'0',STR_PAD_LEFT)}}','{{$att->descricao}}','{{$att->id}}')"
                                                           class="text-info">
                                                            <i class="fal fa-pencil m-3"></i>
                                                        </a>
                                                        <a href="#"
                                                           onclick="removerAt('{{str_pad($att->cod,3,'0',STR_PAD_LEFT)}}','{{$att->descricao}}','{{$att->id}}')"
                                                           class="text-danger">
                                                            <i class="fal fa-trash m-3"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <h4 class="font-weight-light">Atribuições dos Cargos:</h4>
                                        <table class="table table-striped table-hover">
                                            <thead class="thead-light">
                                            <th>Cod.</th>
                                            <th>Descrição</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                            @foreach($colaborador->cargos as $item)
                                                <tr>
                                                    <td colspan="3" class="bg-dark text-white">
                                                        {{$item->cargo->titulo}}
                                                    </td>
                                                </tr>
                                                @foreach($item->cargo->atribuicoes as $att)
                                                    <tr>
                                                        <td width="1">
                                                            AT.{{str_pad($att->cod,3,'0',STR_PAD_LEFT)}}
                                                        </td>
                                                        <td>
                                                            {{$att->descricao}}
                                                        </td>
                                                        <td width="1">

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">

                                    <div class="p-2 mt-2">
                                        <h4 class="font-weight-light">Procedimentos <b>Gerais</b>:</h4>

                                        <table class="table table-striped table-hover">
                                            <thead class="thead-light">
                                            <th>Cod.</th>
                                            <th>Descrição</th>
                                            </thead>
                                            <tbody>
                                            @foreach($procedimentos_gerais as $normativa)
                                                <tr>
                                                    <td width="1">
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#modal-{{$normativa->id}}">
                                                            PO.{{str_pad($normativa->cod,3,"0",STR_PAD_LEFT)}}
                                                        </a>


                                                        <div class="modal fade" id="modal-{{$normativa->id}}"
                                                             tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">{{$normativa->titulo}}</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
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
                                                    <td>
                                                        {{$normativa->titulo}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="p-2 mt-2">

                                        @foreach($procedimentos_departamentos as $index => $item)
                                            <h4 class="font-weight-light">Procedimentos de <b>{{$item['titulo']}}</b>:
                                            </h4>
                                            <table class="table table-striped table-hover">
                                                <thead class="thead-light">
                                                <th>Cod.</th>
                                                <th>Descrição</th>
                                                </thead>
                                                <tbody>
                                                @foreach($item['procedimentos'] as $normativa)
                                                    <tr>
                                                        <td width="1">
                                                            <a href="#" data-toggle="modal"
                                                               data-target="#modal-{{$normativa->id}}">
                                                                PO.{{str_pad($normativa->cod,3,"0",STR_PAD_LEFT)}}
                                                            </a>


                                                            <div class="modal fade" id="modal-{{$normativa->id}}"
                                                                 tabindex="-1" aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">{{$normativa->titulo}}</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
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
                                                        <td>
                                                            {{$normativa->titulo}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <div class="p-2 mt-2">
                                        <h4 class="font-weight-light">Normativas <b>Gerais</b>:</h4>

                                        <table class="table table-striped table-hover">
                                            <thead class="thead-light">
                                            <th>Cod.</th>
                                            <th>Descrição</th>
                                            </thead>
                                            <tbody>
                                            @foreach($normativas_gerais as $normativa)
                                                <tr>
                                                    <td width="1">
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#modal-{{$normativa->id}}">
                                                            NR.{{str_pad($normativa->cod,3,"0",STR_PAD_LEFT)}}
                                                        </a>


                                                        <div class="modal fade" id="modal-{{$normativa->id}}"
                                                             tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">{{$normativa->titulo}}</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
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
                                                    <td>
                                                        {{$normativa->titulo}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="p-2 mt-2">

                                        @foreach($normativas_departamentos as $index => $item)
                                            <h4 class="font-weight-light">Normativas de <b>{{$item['titulo']}}</b>:</h4>
                                            <table class="table table-striped table-hover">
                                                <thead class="thead-light">
                                                <th>Cod.</th>
                                                <th>Descrição</th>
                                                </thead>
                                                <tbody>
                                                @foreach($item['normativas'] as $normativa)
                                                    <tr>
                                                        <td width="1">
                                                            <a href="#" data-toggle="modal"
                                                               data-target="#modal-{{$normativa->id}}">
                                                                NR.{{str_pad($normativa->cod,3,"0",STR_PAD_LEFT)}}
                                                            </a>


                                                            <div class="modal fade" id="modal-{{$normativa->id}}"
                                                                 tabindex="-1" aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">{{$normativa->titulo}}</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
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
                                                        <td>
                                                            {{$normativa->titulo}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

