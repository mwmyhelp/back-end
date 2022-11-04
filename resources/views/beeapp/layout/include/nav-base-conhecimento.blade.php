<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">{{$empresa->nome_fantasia}}</h2>
                <h5 class="text-white op-7 mb-2">
                    Painel Administrativo Empresarial
                </h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">


                <button class="d-none btn btn-white btn-border btn-round mr-2 dropdown-toggle" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acesso Rápido
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Departamentos</a>
                    <a class="dropdown-item" href="#">Usuários</a>
                    <a class="dropdown-item" href="#">Colaboradores</a>
                </div>


                <a href="#" class="d-none btn btn-white btn-border btn-round mr-2">
                    <i class="fal fa-paperclip mr-2"></i> Processos Internos
                </a>

            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark-gradient">
        <a class="navbar-brand mr-5"
           href="#">Navegação</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                @if($selecionado == 'inicio')
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Início <span class="sr-only">(selecionado)</span></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                @endif

                @if($selecionado=='departamentos')

                    <li class="nav-item active d-flex">
                        <a class="nav-link" href="#">Departamentos <span class="sr-only">(selecionado)</span></a>
                    </li>
                @else
                        <li class="nav-item active d-flex">
                            <a class="nav-link" href="#">Departamentos <span class="sr-only">(selecionado)</span></a>
                        </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
