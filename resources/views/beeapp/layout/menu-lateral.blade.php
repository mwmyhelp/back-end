<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            @if(EMPRESA_SELECIONADA)
                @php
                    $empresa = \App\Models\Empresa\Empresa::findOrFail(EMPRESA_SELECIONADA);
                @endphp

                @if($empresa->imagem_perfil)
                    <img src="{{asset($empresa->imagem_perfil)}}" class="w-100"/>
                @endif
            @endif
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if(\Illuminate\Support\Facades\Storage::disk('public')->exists(Auth::user()->profile_photo_path))
                        <img
                            src="{{\Illuminate\Support\Facades\Storage::disk('public')->url(Auth::user()->profile_photo_path)}}"
                            alt="Imagem de Perfil" class="avatar-img rounded">
                    @else
                        <img
                            src="{{\Illuminate\Support\Facades\Storage::disk('public')->url('avatar/avatar-padrao.png')}}"
                            alt="Imagem de Perfil" class="avatar-img rounded">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="/user/profile">
                                    <span class="link-collapse">Meu Perfil</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="link-collapse">Configurações</span>
                                </a>
                            </li>

                            <form method="POST" action="/logout">
                                @csrf
                                <li>
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Sair
                                    </a>

                                </li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                @if(Auth::user()->nivel == 'master')

                    <li class="nav-item active">
                        <a href="#dashboard">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a data-toggle="collapse" href="#base_empresas">
                            <i class="fas fa-layer-group"></i>
                            <p>Empresas</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base_empresas">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('empresas.index')}}">
                                        <span class="sub-item">Gerenciar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('empresas.nova')}}">
                                        <span class="sub-item">Adicionar Empresa</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if(Auth::user()->nivel == 'colaborador')
                    Menu Colab
                @endif
                @if(Auth::user()->nivel == 'administrador' || (Auth::user()->nivel == 'master' &&  defined('EMPRESA_SELECIONADA') && EMPRESA_SELECIONADA))

                    @if(Auth::user()->nivel == 'master')
                            <li class="nav-item mt-4 border-top">
                                <a href="{{route('empresas.minha-empresa')}}">
                                    <i class="fas fa-home"></i>
                                    <p>Empresa Selecionada</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a href="{{route('empresas.minha-empresa')}}">
                                    <i class="fas fa-home"></i>
                                    <p>Minha Empresa</p>
                                </a>
                            </li>
                        @endif

                    <li class="nav-item mt-4">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Colaboradores</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('empresas.colaboradores')}}">
                                        <span class="sub-item">Todos</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('empresa.colaboradores.novo')}}">
                                        <span class="sub-item">Novo Colaborador</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('empresas.departamentos')}}">
                            <i class="fal fa-building"></i>
                            <p>Departamentos</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('procedimentos.operacionais')}}">
                            <i class="fal fa-tasks"></i>
                            <p>Procedimentos</p>
                        </a>
                    </li>

                    <li class="nav-item mt-4">
                        <a data-toggle="collapse" href="#conhecimento">
                            <i class="fal fa-books"></i>
                            <p>Base de Conhecimento</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="conhecimento">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('base.conhecimento.navegar')}}">
                                        <span class="sub-item">Navegar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('base.conhecimento.categorias')}}">
                                        <span class="sub-item">Categorias</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</div>
