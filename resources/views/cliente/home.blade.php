@extends('beeapp.layout.principal')
@push('js')

@endpush

@push('modal')

@endpush

@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <i class="fad fa-globe-americas mr-2"></i>
                    Dashboard
                </div>
                <div class="col-md-8 navegador d-flex">

                        <li class="pr-3 pl-3 d-flex align-items-center ativo">
                            <a href="#" class="font-weight-light">
                                <i class="fal fa-tachometer mr-2"></i> Dashboard
                            </a>
                        </li>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="#">
                        <i class="fal fa-cog mr-2"></i>
                        Configurações
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner pt-0">
        <div class="row">
            <div class="col-md-2 pt-3">
                <b>Notificações:</b>

                <div class="border text-muted mt-3 p-2">
                    Nenhuma notificação para o dia de hoje.
                </div>

            </div>
            <div class="col-md-10">
                <div class="painel-tarefas p-3 ">
                    <div class="row">

                        <div class="col-md-6 coluna">

                            Nenhuma informação a ser exibida.

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

