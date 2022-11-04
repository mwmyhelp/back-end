@extends('beeapp.layout.principal')

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
                      action="{{route('cliente.atribuicoes.adicionar',['tipo' => 'cargo', 'id_colab' => $cargo->id])}}">
                    @csrf
                    <div class="modal-body">
                        <div class="text-muted bg-light rounded p-2 text-justify">
                            <i class="fal fa-info mr-2 text-info"></i>
                            Você esta adicionando uma nova atribuição no cargo <b>{{$cargo->titulo}}</b>,
                            todos os colaboradores que exercerem esse cargo, terão essas atribuições.<br>
                        </div>
                        <div class="form-group w-100 mt-2">
                            <label>Descreva a atribuição no campo abaixo:</label>
                            <input name="descricao" class="form-control" placeholder="Atribuição..." required/>
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
                            <input id="modal_at_desc" name="descricao" class="form-control" placeholder="Atribuição..."
                                   required/>
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

@endpush

@push('js')

    <script>

        function remover(){
            Swal.fire({
                ...beeSwalVars,
                icon: 'warning',
                html: "Tem certeza que deseja remover o cargo<br/> <b>{{$cargo->titulo}}</b>?",
                showConfirmButton: true,
                confirmButtonText: "Sim, remover.",
                showCancelButton:true,
                cancelButtonText: "Cancelar",
                willOpen: () => {
                    somAviso();
                }
            }).then((result) => {
                if(result.isConfirmed){
                    var settings = {
                        "url": api_url+"empresa/departamentos/{{$departamento->id}}/cargos/{{$cargo->id}}/remover",
                        "method": "DELETE",
                        "timeout": 0,
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": "Bearer {{session()->get('bearer_token')}}"
                        },
                    };

                    $.ajax(settings)
                        .done(function (response) {
                            if(response.status == "sucesso"){
                                Swal.fire({
                                    ...beeSwalVars,
                                    icon: 'success',
                                    html: "Cargo removido com sucesso.",
                                    showConfirmButton: true,
                                    showCancelButton:false,
                                    willOpen: () => {
                                        somSucesso();
                                    }
                                }).then(() => {
                                    window.location.href = "{{route('cliente.cargos',['id_departamento' => $departamento->id])}}";
                                });
                            }
                        }).fail(function(error){
                        var json = error.responseJSON;
                        if(json.status == "erro" && json.codigo == "vl01"){
                            Swal.fire({
                                ...beeSwalVars,
                                icon: 'error',
                                html: "<b>Os seguintes erros foram encontrados:</b>" +
                                    "<li class='text-danger'>Erro na solicitação de remoção.</li>"+
                                    "",
                                showConfirmButton: true,
                                showCancelButton:false,
                                willOpen: () => {
                                    somErro();
                                }
                            });
                        }
                    });
                }
            });
        }

        function editarAt(cod, desc, id) {
            $('#modal_at_num').html(cod);
            $('#modal_at_desc').val(desc);
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

    </script>
@endpush

@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <a href="{{route('cliente.departamentos')}}">
                        <i class="fab fa-plus mr-2"></i>
                       Adicionar Cargo
                    </a>
                </div>
                <div class="col-md-8 navegador d-flex">
                    @include('cliente.departamentos.navegador',['ativo' => 'cargos'])
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end pt-1">
                    <a href="{{route('cliente.cargos.editar',['id_departamento' => $departamento->id, 'id_cargo' => $cargo->id])}}" class="btn btn-sm btn-outline-secondary mr-3">
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

                        <div class="col-md-11 coluna">

                            <h2 class="font-weight-light border-bottom">
                                Cargos de <i class="{{$departamento->icone}} ml-3"></i> <b>{{$departamento->nome}}</b>
                            </h2>

                            <div class="row">
                                <div class="col-md-3 bg-light h-100 pt-4 pb-4">
                                    <b>Cargos Cadastrados:</b>
                                    @include('cliente.departamentos.cargos.tree_cargos')
                                </div>
                                <div class="col-md-9 pb-4 pt-2 pl-5">

                                    <h2 class="font-weight-light text-center">
                                        {{$cargo->titulo}}
                                    </h2>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Descrição curta:</label>
                                            <div class="d-block">
                                                @if($cargo->descricao_curta)
                                                    {{$cargo->descricao_curta}}
                                                @else
                                                    Nenhuma descrição informada.
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Descrição Completa:</label>
                                            <div class="d-block">
                                                @if($cargo->descricao_longa)
                                                    {!! $cargo->descricao_longa  !!}
                                                @else
                                                    Nenhuma descrição informada.
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="d-flex">
                                                Atribuições:
                                                <div class="ml-auto">
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#addAtribuicao">
                                                        Adicionar Atribuição
                                                    </button>
                                                </div>
                                            </label>
                                            <table class="table table-striped table-hover">
                                                <thead class="thead-light">
                                                <th>Cod.</th>
                                                <th>Descrição</th>
                                                <th></th>
                                                </thead>
                                                <tbody>
                                                @foreach($att_cargo as $att)
                                                    <tr>
                                                        <td width="1">
                                                            AT.{{str_pad($att->cod,3,'0',STR_PAD_LEFT)}}
                                                        </td>
                                                        <td>
                                                            {{$att->descricao}}
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

