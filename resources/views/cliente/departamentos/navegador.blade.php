<li class="pr-3 pl-3 d-flex align-items-center @if($ativo == 'detalhes') ativo @endif">
    <a href="{{route('cliente.departamentos.info',['id_departamento' => request()->route('id_departamento')])}}" class="font-weight-light">
        <i class="fal fa-info mr-2"></i> Detalhes
    </a>
</li>
<li class="pr-3 pl-3 d-flex align-items-center ml-3  @if($ativo == 'setores') ativo @endif">
    <a href="{{route('cliente.setores',['id_departamento' => request()->route('id_departamento')])}}" class="font-weight-light">
        <i class="fal fa-list mr-2"></i> Setores
    </a>
</li>

<li class="pr-3 pl-3 d-flex align-items-center ml-3  @if($ativo == 'cargos') ativo @endif">
    <a href="{{route('cliente.cargos',['id_departamento' => request()->route('id_departamento')])}}" class="font-weight-light">
        <i class="fal fa-cog mr-2"></i> Cargos
    </a>
</li>

<li class="pr-3 pl-3 d-flex align-items-center ml-3  @if($ativo == 'colaboradores') ativo @endif">
    <a href="{{route('cliente.departamentos.colaboradores',['id_departamento' => request()->route('id_departamento')])}}" class="font-weight-light">
        <i class="fal fa-user mr-2"></i> Colaboradores
    </a>
</li>
