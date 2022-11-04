@extends('beeapp.layout.principal')
@push('jsx')

    <script>
        var tabela_bee_conta;
        $(document).ready(function () {
            //Datatable
            tabela_bee_conta = $('#tabela_bee_conta').DataTable({
                "language": {
                    "url": "/lang/dataTable/principal.json"
                },
                "dom": 'rtip'
            });
            //Filtros
            $('#pesquisar_bee_conta').on('keyup', function () {
                tabela_bee_conta.search(this.value).draw();
            });

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
                    <li class="pr-3 pl-3 d-flex align-items-center ativo">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-eye mr-2"></i> Visão Geral
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

                            <div class="border text-muted text-center p-4">
                                Nenhuma informação disponível para a visão geral.
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

