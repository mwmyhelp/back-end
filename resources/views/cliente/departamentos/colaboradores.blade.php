@extends('beeapp.layout.principal')


@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <a href="{{route('cliente.departamentos')}}">
                        <i class="fab fa-buromobelexperte mr-2"></i>
                        Colaboradores do Departamento
                    </a>
                </div>
                <div class="col-md-8 navegador d-flex">
                    @include('cliente.departamentos.navegador',['ativo' => 'colaboradores'])
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
                                        Colaboradores de <i class="{{$departamento->icone}} ml-3"></i> <b>{{$departamento->nome}}</b>
                                    </h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <th>
                                                Cargo
                                            </th>
                                            <th>
                                                Nome
                                            </th>
                                        </thead>
                                        <tbody>
                                            @if(count($colaboradores) >= 1)
                                                @foreach($colaboradores as $colaborador)
                                                    @foreach($colaborador->cargos as $item)
                                                        @if($item->cargo->departamento->id == $departamento->id)
                                                            <tr>
                                                                <td>
                                                                    {{$item->cargo->titulo}}
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('cliente.colaboradores.detalhes',['id_colab' => $colaborador->id])}}">
                                                                        {{$colaborador->pessoa_fisica->nome}}&nbsp;
                                                                        {{$colaborador->pessoa_fisica->sobrenome}}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="border p-5 text-center text-muted">
                                                            Nenhum colaborador alocado neste departamento.
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
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
@endsection

