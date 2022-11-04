<div class="main-header">

    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="bee2">

        <div class="container-fluid pl-0">

            <div class="border-right pr-md-3 mr-md-3 link-modulos">
                <a href="#" onclick="window.history.back();">
                    <i class="fal fa-undo"></i>
                </a>
            </div>

            <a href="{{route('inicio')}}" class="logo mr-4 text-center">
                <img  src="{{asset('assets/img/logo.png')}}" alt="navbar brand" class="navbar-brand">
            </a>

            @if(!isset($meet))
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <i class="fal fa-tachometer-alt-fastest mr-2"></i> Dashboard
                                </a>
                            </li>
                            @if(Auth::user()->tipo == "admin_empresa" || Session::get('ASSUMIR_EMPRESA'))
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Minha Empresa</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('cliente.departamentos')}}">
                                            <i class="fab fa-buromobelexperte mr-2"></i> Departamentos
                                        </a>
                                        <a class="dropdown-item" href="{{route('cliente.colaboradores')}}">
                                            <i class="fal fa-user-tie mr-2"></i> Colaboradores
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
                                            <i class="fal fa-globe-americas mr-2"></i>  Visão Geral
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Gestão de Processos
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('ceo.normativas.principal')}}">
                                            <i class="fab fa-buromobelexperte mr-2"></i> Normativas
                                        </a>
                                        <a class="dropdown-item" href="{{route('ceo.procedimentos.principal')}}">
                                            <i class="fab fa-cogs mr-2"></i> Procedimentos Operacionais
                                        </a>
                                    </div>
                                </li>

                            @endif

                            @if(Auth::user()->tipo == "admin")
                                @if(Session::get('ASSUMIR_EMPRESA'))
                                    <div class="border-left ml-2 mr-2">

                                    </div>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('gestor.beeconta')}}">BeeContas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Usuários</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Financeiro</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </nav>
                <div class="collapse ml-md-3" id="search-nav">
                    <form class="navbar-left navbar-form nav-search mr-md-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1">
                                    <i class="fal fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" placeholder="Procurar ..." class="form-control">
                        </div>
                    </form>
                </div>
            @else
                    <div class="d-flex align-items-center justify-content-center" id="reuniaoAcoes">
                        <a href="#">
                            <i class="fal fa-webcam mr-2"></i>
                            Câmera
                        </a>

                        <a href="#">
                            <i class="fal fa-microphone-alt mr-2"></i>
                            Microfone
                        </a>

                        <a href="#">
                            <i class="fal fa-desktop-alt mr-2"></i>
                            Compartilhar Tela
                        </a>

                        <a href="#">
                            <i class="far fa-record-vinyl mr-2"></i>
                            Gravar Reunião
                        </a>

                        <a href="#">
                            <i class="fal fa-comments-alt mr-2"></i>
                            Chat
                        </a>


                    </div>
            @endif



            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item toggle-nav-search hidden-caret">
                    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li class="d-none nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                        <li>
                            <div class="dropdown-title d-flex justify-content-between align-items-center">
                                Discussões
                                <a href="#" class="small">Marcar todas como lida</a>
                            </div>
                        </li>
                        <li>
                            <div class="message-notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="../assets/img/jm_denis.jpg" alt="Img Profile">
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Jimmy Denis</span>
                                            <span class="block">
														How are you ?
													</span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="../assets/img/chadengle.jpg" alt="Img Profile">
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Chad</span>
                                            <span class="block">
														Ok, Thanks !
													</span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="../assets/img/mlane.jpg" alt="Img Profile">
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Jhon Doe</span>
                                            <span class="block">
														Ready for the meeting today...
													</span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="../assets/img/talha.jpg" alt="Img Profile">
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Talha</span>
                                            <span class="block">
														Hi, Apa Kabar ?
													</span>
                                            <span class="time">17 minutes ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="javascript:void(0);">Ver todas as discussões.<i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <!--
                        <span class="notification">1</span>
                        -->
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                       <!--
                        <li>
                            <div class="dropdown-title">Você tem 1 novas notificações</div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <div class="bg-light text-center p-3">
                                        <small>Notificações em teste</small>
                                    </div>
                                    <a href="#" class="d-none">
                                        <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                        <div class="notif-content">
													<span class="block">
														New user registered
													</span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="d-none">
                            <a class="see-all" href="javascript:void(0);">Ver todas as noticiações<i class="fa fa-angle-right"></i> </a>
                        </li>
                        -->
                    </ul>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                    </a>
                    <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                        <div class="quick-actions-header">
                            <span class="title mb-1">Ações Rápidas</span>
                            <span class="subtitle op-8">Atalhos</span>
                        </div>
                        <div class="quick-actions-scroll scrollbar-outer">
                            <div class="quick-actions-items">
                                <div class="row m-0">
                                    <!--
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-file-1"></i>
                                            <span class="text">Processos Empresariais</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-database"></i>
                                            <span class="text">Base de Conhecimento</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-pen"></i>
                                            <span class="text">Minha Empresa</span>
                                        </div>
                                    </a>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">

                            <img src="{{\laravelApiHelpers\AssetHelper::get(Auth::user()->imagem_perfil)}}" alt="Imagem de Perfil" class="avatar-img rounded">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                            <img src="{{\laravelApiHelpers\AssetHelper::get(Auth::user()->imagem_perfil)}}" alt="Imagem de Perfil" class="avatar-img rounded">
                                    </div>
                                    <div class="u-text">
                                        <h4>{{Auth::user()->name}}</h4>
                                        <p class="text-muted">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <!--
                                <a class="dropdown-item" href="/user/profile">Meu Perfil</a>
                                <a class="dropdown-item" href="#">Minhas Atividades</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Configurações</a>
                                <div class="dropdown-divider"></div>
                                !-->
                                <form method="POST" action="/logout">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>

                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
