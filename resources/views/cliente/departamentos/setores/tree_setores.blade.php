@php
/** Obtendo a lista de Departamentos **/
$response = \Http::withToken(\Session::get('bearer_token'))
->get(config('app.api_url')."empresa/departamentos/".request()->route('id_departamento')."/setores/");
$body = json_decode($response->body());
$dados = $body->dados;
@endphp
<div class="bee-tree">

    @foreach($dados as $setor)
        <a href="{{route('cliente.setores.info',[
    'id_departamento' => request()->route('id_departamento'),
    'id_setor' => $setor->id
    ])}}">
            <div class="box-item">
                {{$setor->nome}}
            </div>
        </a>
    @endforeach
        <a href="{{route('cliente.setores.adicionar',['id_departamento' => request()->route('id_departamento')])}}">
            <div class="box-novo">
                Adicionar Setor
            </div>
        </a>
</div>
