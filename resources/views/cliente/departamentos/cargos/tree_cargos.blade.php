@php
/** Obtendo a lista de Departamentos **/
$response = \Http::withToken(\Session::get('bearer_token'))
->get(config('app.api_url')."empresa/departamentos/".request()->route('id_departamento')."/cargos/");
$body = json_decode($response->body());
$dados = $body->dados;
@endphp
<div class="bee-tree">

    @foreach($dados as $cargo)
        <a href="{{route('cliente.cargos.info',[
    'id_departamento' => request()->route('id_departamento'),
    'id_cargo' => $cargo->id
    ])}}">
            <div class="box-item">
                {{$cargo->titulo}}
            </div>
        </a>
    @endforeach
        <a href="{{route('cliente.cargos.adicionar',['id_departamento' => request()->route('id_departamento')])}}">
            <div class="box-novo">
                Adicionar Cargo
            </div>
        </a>
</div>
