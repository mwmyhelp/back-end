@extends('beeapp.layout.principal')

@push('js')

    <script>
        $(document).ready(function(){
            ClassicEditor
                .create( document.querySelector( '#editor_01' ) )
                .catch( error => {
                    console.error( error );
                } );
        });
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
                                        Novo Cargo
                                    </h2>

                                    <form method="post" action="{{route('cliente.cargos.criar',['id_departamento' => $departamento->id])}}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Titulo do Cargo:</label>
                                                <input value="{{old('titulo')}}" type="text" class="form-control" name="titulo"
                                                       required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Descrição Curta:</label>
                                                <input value="{{old('descricao_curta')}}" type="text"
                                                       class="form-control" name="descricao_curta"/>

                                                <small class="form-text text-muted">
                                                    Uma descrição resumida do cargo para apresentações em menores espaços.
                                                </small>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Descrição Longa:
                                                    <a class="btn btn-sm btn-primary" data-toggle="collapse"
                                                       href="#descricaoLonga" role="button" aria-expanded="false">
                                                        Informar
                                                    </a>
                                                </label>
                                                <div class="collapse" id="descricaoLonga">
                                            <textarea rows="5" name="descricao_completa" id="editor_01">
                                                {{old('descricao_completa')}}
                                            </textarea>
                                                </div>
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
        </div>
    </div>
@endsection

