@extends('beeapp.layout.principal')

@push('js')

    <script>

    </script>
@endpush


@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <a href="{{route('cliente.departamentos')}}">
                        <i class="fab fa-buromobelexperte mr-2"></i>
                        Cargos
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
                                <div class="col-md-9 pb-4">
                                    <div class="border p-4 text-muted">
                                        Selecione um cargo para mais informações.
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

