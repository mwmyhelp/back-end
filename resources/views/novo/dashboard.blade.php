@extends('layouts.principal')

@section('conteudo')
    <div class="container pt-4 pb-4">

        <div class="row">
            <div class="col-12 d-flex flex-column flex-lg-row">
                <h3 class="text-gray-1 fw-300">
                    Dashboard
                </h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-300">
                            Últimas Atividades:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>
                                        Data/Hora
                                    </th>
                                    <th>
                                        BeeConta
                                    </th>
                                    <th>
                                        Atividade
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            03/09/21<br/>
                                            16:58
                                        </td>
                                        <td class="align-middle">
                                            BeeApp
                                        </td>
                                        <td class="align-middle">
                                            Raphael Barboza criou um departamento.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
