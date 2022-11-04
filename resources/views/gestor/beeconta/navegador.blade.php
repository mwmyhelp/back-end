<li class="pr-3 pl-3 d-flex align-items-center @if($ativo == 'listagem') ativo @endif">
    <a href="#" class="font-weight-light">
        <i class="fal fa-list mr-2"></i> Listagem
    </a>
</li>
<li class="pr-3 pl-3 d-flex align-items-center ml-3  @if($ativo == 'adicionar') ativo @endif">
    <a href="{{route('gestor.beeconta.adicionar')}}" class="font-weight-light">
        <i class="fal fa-plus mr-2"></i> Adicionar Bee Conta
    </a>
</li>
