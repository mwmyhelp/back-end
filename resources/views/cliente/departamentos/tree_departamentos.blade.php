@php
/** Obtendo a lista de Departamentos **/
$response = \Http::withToken(\Session::get('bearer_token'))->get(config('app.api_url')."empresa/departamentos/?exibir=completo");
$body = json_decode($response->body());
$dados = $body->dados;

@endphp
<div class="bee-tree">
    @foreach($dados as $nivelA)
        <a href="{{route('cliente.departamentos.info',['id_departamento' => $nivelA->id])}}">
            <div class="box-item">
                <i class="{{$nivelA->icone}} mr-2"></i>
                {{$nivelA->nome}}
            </div>
        </a>
        <div class="pl-3 pb-3">

            @if($nivelA->filhos)
                @foreach($nivelA->filhos as $nivelB)
                    <a href="{{route('cliente.departamentos.info',['id_departamento' => $nivelB->id])}}">
                        <div class="box-item">
                            <i class="{{$nivelB->icone}} mr-2"></i>
                            {{$nivelB->nome}}
                        </div>
                    </a>
                @endforeach
            @endif


            <a href="{{route('cliente.departamentos.adicionar',['id_pai' => $nivelA->id,'pai' => $nivelA->nome])}}">
                <div class="box-novo">
                    Adicionar Departamento
                </div>
            </a>
        </div>
    @endforeach
        <a href="{{route('cliente.departamentos.adicionar')}}">
            <div class="box-novo">
                <i class="fa fa-plus mr-2"></i>
                Adicionar Departamento
            </div>
        </a>
</div>
