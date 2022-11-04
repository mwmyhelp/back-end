@extends('beeapp.layout.principal')

@push('modal')

    <div class="modal fade" id="defCoordenador" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Definir Coordenador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post"
                      action="{{route('cliente.departamentos.coordenador',['id_departamento' => $departamento->id])}}">
                    @csrf
                    <div class="modal-body">
                        <div class="text-muted bg-light rounded p-2 text-justify">
                            <i class="fal fa-info mr-2 text-info"></i>
                            Você esta definindo um Coordenador para o departamento <b>{{$departamento->nome}}</b>.<br>
                            O coordenador pode gerenciar as normativas, atribuições e processos do departamento.
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Selecione o colaborador a se tornar coordenador:</label>
                            <select name="id_colaborador" required class="form-control">
                                <option value="0">
                                    Não definir nenhum coordenador.
                                </option>
                                @foreach($colaboradores as $colaborador)
                                    <option value="{{$colaborador->id}}">
                                        {{\laravelApiHelpers\FormatHelper::mascarar($colaborador->pessoa_fisica->cpf,'###.###.###-##')}}
                                        - {{$colaborador->pessoa_fisica->nome}} {{$colaborador->pessoa_fisica->sobrenome}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Definir Coordenador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="defLider" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Definir Líder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post"
                      action="{{route('cliente.departamentos.lider',['id_departamento' => $departamento->id])}}">
                    @csrf
                    <div class="modal-body">
                        <div class="text-muted bg-light rounded p-2 text-justify">
                            <i class="fal fa-info mr-2 text-info"></i>
                            Você esta definindo um Lider para o departamento <b>{{$departamento->nome}}</b>.<br>
                            O lider tem acesso a informações específicas do departamento e colaboradores.
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Selecione o colaborador a se tornar lider:</label>
                            <select name="id_colaborador" required class="form-control">
                                <option value="0">
                                    Não definir nenhum lider.
                                </option>
                                @foreach($colaboradores as $colaborador)
                                    <option value="{{$colaborador->id}}">
                                        {{\laravelApiHelpers\FormatHelper::mascarar($colaborador->pessoa_fisica->cpf,'###.###.###-##')}}
                                        - {{$colaborador->pessoa_fisica->nome}} {{$colaborador->pessoa_fisica->sobrenome}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Definir Líder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endpush

@push('js')

    <script>
        function remover() {
            Swal.fire({
                ...beeSwalVars,
                icon: 'warning',
                html: "Tem certeza que deseja remover<br/> <b>{{$departamento->nome}}</b>?",
                showConfirmButton: true,
                confirmButtonText: "Sim, remover.",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                willOpen: () => {
                    somAviso();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    var settings = {
                        "url": api_url + "empresa/departamentos/{{$departamento->id}}/remover",
                        "method": "DELETE",
                        "timeout": 0,
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": "Bearer {{session()->get('bearer_token')}}"
                        },
                    };

                    $.ajax(settings)
                        .done(function (response) {
                            if (response.status == "sucesso") {
                                Swal.fire({
                                    ...beeSwalVars,
                                    icon: 'success',
                                    html: "Departamento removido com sucesso.",
                                    showConfirmButton: true,
                                    showCancelButton: false,
                                    willOpen: () => {
                                        somSucesso();
                                    }
                                }).then(() => {
                                    window.location.href = "{{route('cliente.departamentos')}}";
                                });
                            }
                        }).fail(function (error) {
                        var json = error.responseJSON;
                        if (json.status == "erro" && json.codigo == "vl01") {
                            Swal.fire({
                                ...beeSwalVars,
                                icon: 'error',
                                html: "<b>Os seguintes erros foram encontrados:</b>" +
                                    "<li class='text-danger'>Você não pode remover um departamento que possua filhos.</li>" +
                                    "",
                                showConfirmButton: true,
                                showCancelButton: false,
                                willOpen: () => {
                                    somErro();
                                }
                            });
                        }
                    });
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
                    <a href="{{route('cliente.departamentos')}}">
                        <i class="fab fa-buromobelexperte mr-2"></i>
                        Departamentos
                    </a>
                </div>
                <div class="col-md-8 navegador d-flex">
                    @include('cliente.departamentos.navegador',['ativo' => 'detalhes'])
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end pt-1">
                    <a href="{{route('cliente.departamentos.editar',['id_departamento' => $departamento->id])}}"
                       class="btn btn-sm btn-outline-secondary mr-3">
                        <i class="fa fa-pencil mr-2"></i> Editar Informações
                    </a>
                    <a href="#" onclick="remover()" class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-trash mr-2"></i> Remover
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner pt-0">
        <div class="row">
            <div class="col-md-2 pt-3">
                <b>Navegação:</b>

                @include('cliente.departamentos.tree_departamentos')


            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-11">

                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="font-weight-light border-bottom">
                                        Detalhes de <i class="{{$departamento->icone}} ml-3"></i>
                                        <b>{{$departamento->nome}}</b>
                                    </h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" id="nav-profile-tab" data-toggle="tab"
                                               href="#nav-profile"
                                               role="tab" aria-controls="nav-profile" aria-selected="true">
                                                Processos Operacionais
                                            </a>
                                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab"
                                               href="#nav-contact"
                                               role="tab" aria-controls="nav-contact" aria-selected="false">
                                                Normativas
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane show active" id="nav-profile" role="tabpanel"
                                             aria-labelledby="nav-profile-tab">

                                            <div class="p-2 mt-2">
                                                <h4 class="font-weight-light">P.O.s do <b>Departamento</b>:</h4>
                                                <small>Erro ao carregar Procedimentos</small>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                             aria-labelledby="nav-contact-tab">
                                            <div class="p-2 mt-2">
                                                <h4 class="font-weight-light">Normativas do Departamento:</h4>

                                                <table class="table table-striped table-hover">
                                                    <thead class="thead-light">
                                                    <th>Cod.</th>
                                                    <th>Descrição</th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($normativas as $normativa)
                                                        <tr>
                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#modal-{{$normativa->id}}">
                                                                    NR.{{str_pad($normativa->cod,3,"0",STR_PAD_LEFT)}}
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
                                                            <td>
                                                                {{$normativa->titulo}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Coordenador:
                                        </div>
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="w-50 p-2">
                                                <img src="https://via.placeholder.com/200"
                                                     class="img-thumbnail rounded-circle"/>
                                            </div>
                                            <div class="text-center">
                                                @if($departamento->coordenador)
                                                    {{$departamento->coordenador->pessoa_fisica->nome}}&nbsp;
                                                    {{$departamento->coordenador->pessoa_fisica->sobrenome}}
                                                @else
                                                    Coordenador não definido.
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <button type="button" data-toggle="modal" data-target="#defCoordenador"
                                                    class="btn btn-sm btn-dark">
                                                Definir Coordenador
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Líder:
                                        </div>
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="w-50 p-2">
                                                <img src="https://via.placeholder.com/200"
                                                     class="img-thumbnail rounded-circle"/>
                                            </div>
                                            <div class="text-center">
                                                @if($departamento->lider)
                                                    {{$departamento->lider->pessoa_fisica->nome}}&nbsp;
                                                    {{$departamento->lider->pessoa_fisica->sobrenome}}
                                                @else
                                                    Líder não definido.
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <button type="button" data-toggle="modal" data-target="#defLider"
                                                    class="btn btn-sm btn-dark">
                                                Definir Líder
                                            </button>
                                        </div>
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

