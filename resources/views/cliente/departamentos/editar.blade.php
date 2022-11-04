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
                    <i class="fab fa-buromobelexperte mr-2"></i>
                    Departamentos
                </div>
                <div class="col-md-8 navegador d-flex">
                    <li class="pr-3 pl-3 d-flex align-items-center ativo ">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-pencil mr-2"></i> Editar Departamento
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

                <b>Navegação:</b>

                @include('cliente.departamentos.tree_departamentos')


            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-11 coluna">

                            <h2 class="font-weight-light border-bottom">
                                Editando departamento <b>{{$departamento->nome}}</b>
                            </h2>


                            <form class="mt-4" method="post" action="{{route('cliente.departamentos.salvar',['id_departamento' => $departamento->id])}}">
                                @csrf
                                    <input type="hidden" name="id" value="{{$departamento->id}}" />
                                    <input type="hidden" name="id_pai" value="{{$departamento->id_pai}}" />
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nome:</label>
                                        <input value="{{$departamento->nome}}" type="text" class="form-control" name="nome"
                                               required/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Icone:</label>
                                        <div class="d-flex">

                                            @foreach(array_chunk(config('conteudo.icones.departamentos'),8,true) as $chunk)
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    @foreach($chunk as $icone => $hex)
                                                        <label
                                                            class="btn btn-sm btn-secondary text-white @if($departamento->icone == $icone) active @endif">
                                                            <input value="{{$icone}}" type="radio" name="icone" required
                                                                   @if($departamento->icone == $icone) checked @endif">
                                                            <i class="{{$icone}}"></i>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Cor:</label>
                                        <input value="{{$departamento->cor}}" type="color" class="form-control" name="cor"
                                               required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Descrição Curta:</label>
                                        <input value="{{$departamento->descricao_curta}}" type="text"
                                               class="form-control" name="descricao_curta"/>

                                        <small class="form-text text-muted">
                                            Uma descrição resumida do setor para apresentações em menores espaços.
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
                                                {!! $departamento->descricao_completa  !!}
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
@endsection

