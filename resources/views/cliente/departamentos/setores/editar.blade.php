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
                       Editar Cargo
                    </a>
                </div>
                <div class="col-md-8 navegador d-flex">
                    @include('cliente.departamentos.navegador',['ativo' => 'setores'])
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
                                Setores de <i class="{{$departamento->icone}} ml-3"></i> <b>{{$departamento->nome}}</b>
                            </h2>

                            <div class="row">
                                <div class="col-md-3 bg-light h-100 pt-4 pb-4">
                                    <b>Setores Cadastrados:</b>
                                    @include('cliente.departamentos.setores.tree_setores')
                                </div>
                                <div class="col-md-9 pb-4 pt-2 pl-5">

                                    <h2 class="font-weight-light text-center">
                                        Editar {{$setor->nome}}
                                    </h2>

                                    <form method="post" action="{{route('cliente.setores.salvar',['id_departamento' => $departamento->id, 'id_setor' => $setor->id])}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$setor->id}}" />
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Nome:</label>
                                                <input value="{{$setor->nome}}" type="text" class="form-control" name="nome"
                                                       required/>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Icone:</label>
                                                <div class="d-flex">

                                                    @foreach(array_chunk(config('conteudo.icones.departamentos'),8,true) as $chunk)
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            @foreach($chunk as $icone => $hex)
                                                                <label
                                                                    class="btn btn-sm btn-secondary text-white @if($setor->icone == $icone) active @endif">
                                                                    <input value="{{$icone}}" type="radio" name="icone"
                                                                           @if($setor->icone == $icone) checked @endif">
                                                                    <i class="{{$icone}}"></i>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Cor:</label>
                                                <input value="{{$setor->cor}}" type="color" class="form-control" name="cor"
                                                       />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Descrição Curta:</label>
                                                <input value="{{$setor->descricao_curta}}" type="text"
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
                                            <textarea rows="5" name="descricao_longa" id="editor_01">
                                                {!! $setor->descricao_longa !!}
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

