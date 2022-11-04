@extends('beeapp.layout.principal')

@push('js')

    <script>

        function remover(){
            Swal.fire({
                ...beeSwalVars,
                icon: 'warning',
                html: "Tem certeza que deseja remover o setor<br/> <b>{{$setor->nome}}</b>?",
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
                        "url": api_url+"empresa/departamentos/{{$departamento->id}}/setores/{{$setor->id}}/remover",
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
                                    html: "Setor removido com sucesso.",
                                    showConfirmButton: true,
                                    showCancelButton:false,
                                    willOpen: () => {
                                        somSucesso();
                                    }
                                }).then(() => {
                                    window.location.href = "{{route('cliente.setores',['id_departamento' => $departamento->id])}}";
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

    </script>
@endpush

@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <a href="{{route('cliente.setores',['id_departamento' => $departamento->id])}}">
                        <i class="fab fa-plus mr-2"></i>
                       Adicionar Setor
                    </a>
                </div>
                <div class="col-md-8 navegador d-flex">
                    @include('cliente.departamentos.navegador',['ativo' => 'setores'])
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end pt-1">
                    <a href="{{route('cliente.setores.editar',['id_departamento' => $departamento->id, 'id_setor' => $setor->id])}}" class="btn btn-sm btn-outline-secondary mr-3">
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
                                Setores de <i class="{{$departamento->icone}} ml-3"></i> <b>{{$departamento->nome}}</b>
                            </h2>

                            <div class="row">
                                <div class="col-md-3 bg-light h-100 pt-4 pb-4">
                                    <b>Setores Cadastrados:</b>
                                    @include('cliente.departamentos.setores.tree_setores')
                                </div>
                                <div class="col-md-9 pb-4 pt-2 pl-5">

                                    <h2 class="font-weight-light text-center">
                                        {{$setor->nome}}
                                    </h2>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Descrição curta:</label>
                                            <div class="d-block">
                                                @if($setor->descricao_curta)
                                                    {{$setor->descricao_curta}}
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
                                                @if($setor->descricao_longa)
                                                    {!! $setor->descricao_longa  !!}
                                                @else
                                                    Nenhuma descrição informada.
                                                @endif
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
    </div>
@endsection

