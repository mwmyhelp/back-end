<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/admin/filemanager' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filemanager.base_route',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'filemanager.action_route',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GxJthqlIAkeZg322',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manifest.json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laravelpwa.manifest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/offline' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laravelpwa.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nJAhY6f6nUm9DuEJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/registrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::naNy7RHVQWqbzUX7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/consultacpf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oUSzp9hh9YyqOPUW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/consultacnpj' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gPyf3z9ULR3gt1XT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::caGQlG8pvbywiMaB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EkOe3aMLEYMsZQ6i',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/alterar-senha' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8uXLbU5dJ9dTyLDp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sistema/beecontas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pLyqMr82Sg5Wwy4v',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sjEfUvjEfdrsO56F',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sistema/beecontas/assumir-acesso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sistema.beecontas.assumir',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sistema/usuarios/alterarsenha' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5TeLhFrKmme5zxWN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sistema/usuarios/resetarsenha' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hFMnWYC181pNr9Kl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empresa/departamentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TRJunkMw87PfcL6g',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empresa/departamentos/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vKBBdvcqVumGHiu1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empresa/colaboradores/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::30N6mWSZIaX8PZVU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empresa/colaboradores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nSzIIOpt7PrfPEZm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/geral/estrutura_empresarial_sem_cargo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6hw1BkYrTC3SMDEe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/geral/estrutura_empresarial_com_cargo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r4oF933qM85b5ibS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/geral/estrutura_papeis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HI68yZKsu6mx2qh0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/geral/estrutura_colaboradores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w6ZlupFsEwV1QH06',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/normativas/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FO6uvJz73ZpJJuB2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/normativas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lXrt98XNAvwsC8fi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/procedimentos/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7ZBliiV9Nkn3NFz4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/procedimentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FAEYGn2gXaQPkprq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/diagramas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::O3g9Dy5SgyCb2ZnV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/beeceo/diagramas/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GxQqp5dHnuvPVCS9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/hive/conta/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::agoVFXN04hIO63Tw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/hive/conta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g4BuDvcO0umv70dH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/empresa/departamentos/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wlBjfMPCqapld1Oc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/empresa/departamentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8E8XvJkWOyFojo91',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/empresa/colaboradores/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sFOaB4TmRCgu8skc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/empresa/colaboradores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ewEXASURT7hWNcoE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/empresa/cargos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VaKGX05vI37VKJcX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/regs/atribuicoes/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BKcAyu27ht0gCtqV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/OLD/regs/atribuicoes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SUcBHNfMU2UGlCaU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teste' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YsgPmn7hSVZZojpc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inicio',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bee-contas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gestor.beeconta',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bee-contas/adicionar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gestor.beeconta.adicionar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gestor/assumir-acesso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gestor.assumir.acesso',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/beeceo/normativas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'beeceo.normativas',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/beeceo/procedimentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'beeceo.procedimentos',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/beeceo/diagramas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'beeceo.diagramas',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/departamentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'modulo.departamentos',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/colaboradores/gestao' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'modulo.colaboradores.gestao',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/colaboradores/info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'modulo.colaboradores.info',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/departamentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/departamentos/adicionar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.adicionar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/departamentos/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.criar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/colaboradores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/colaboradores/adicionar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores.adicionar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/colaboradores/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores.criar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/atribuicoes/adicionar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.atribuicoes.adicionar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/atribuicoes/editar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.atribuicoes.editar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/normativas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.normativas.principal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/normativas/adicionar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.normativas.adicionar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/normativas/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.normativas.criar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/procedimentos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.procedimentos.principal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/procedimentos/adicionar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.procedimentos.adicionar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cliente/procedimentos/criar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.procedimentos.criar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UwBiHfgOIsjKn1oO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HVEWheYCZl8agZOv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ayojT1yYVzDAczMi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sair' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G0ytBGkIJ273cV6o',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/a(?|pi/(?|oauth/(?|tokens/([^/]++)(*:42)|clients/([^/]++)(?|(*:68))|personal\\-access\\-tokens/([^/]++)(*:109))|consulta/c(?|npj/(.*)(*:139)|ep/(.*)(*:154))|files/([^/]++)(?|(*:180)|/(?|show(*:196)|download(*:212)|info(*:224))|(*:233))|empresa/(?|departamentos/([^/]++)(?|(*:278)|/(?|s(?|alvar(*:299)|etores(?|(*:316)|/(?|criar(*:333)|([^/]++)(*:349))))|re(?|nomear(*:371)|mover(*:384))|cargos(?|(*:402)|/(?|criar(*:419)|([^/]++)(?|(*:438)|/(?|tipo(*:454)|setor(*:467)))))))|colaboradores/([^/]++)(?|(*:506)|/(?|ocuparCargo(*:529)|d(?|e(?|socuparCargo(*:557)|fBeeLider(*:574))|ocumentos(*:592))|cargosOcupados(*:615)|remBeeLider(*:634))))|beeceo/(?|normativas/([^/]++)/a(?|plicar(*:685)|rquivar(*:700))|procedimentos/([^/]++)/a(?|plicar(*:742)|rquivar(*:757))|diagramas/([^/]++)(?|(*:787)|/(?|salvar(*:805)|remover(*:820)))|beedocs/([^/]++)(?|(*:849)|/(?|emoji(*:866)|renomear(*:882)|salvar(*:896))))|OLD/(?|empresa/(?|departamentos/([^/]++)(?|(*:950)|/(?|s(?|alvar(*:971)|etores(?|/(?|criar(*:997)|([^/]++)(?|(*:1016)|/(?|salvar(*:1035)|remover(*:1051)|de(?|fLider(*:1071)|sassociarPO(*:1091))|associarPO(*:1111))))|(*:1123)))|rem(?|over(*:1144)|Lider(*:1158)|Coordenador(*:1178))|de(?|f(?|Lider(*:1202)|Coordenador(*:1222))|sassociar(?|PO(*:1246)|Normativa(*:1264)))|associar(?|PO(*:1288)|Normativa(*:1306))|cargos(?|/(?|criar(*:1334)|([^/]++)(?|(*:1354)|/(?|salvar(*:1373)|remover(*:1389)|atribuicoes(?|/salvar(*:1419)|(*:1428)))))|(*:1441))))|colaboradores/([^/]++)(?|/(?|salvar(*:1488)|remover(*:1504)|atribuicoes(?|/salvar(*:1534)|(*:1543))|ocuparCargo(*:1564)|desocuparCargo(*:1587)|papeis(*:1602))|(*:1612)))|regs/atribuicoes/([^/]++)/(?|salvar(*:1658)|remover(*:1674))))|rquivos/download/(.*)(*:1707))|/v1/(?|files/(?|get/([^/]++)(*:1745)|images/docs/([^/]++)/upload(*:1781)|docs/([^/]++)/(?|upload(*:1813)|files(?|(*:1830)|/([^/]++)(*:1848))))|documents/([^/]++)(?|(*:1881)))|/cliente/(?|departamentos/([^/]++)(?|(*:1929)|/(?|editar(*:1948)|s(?|alvar(*:1966)|etores(?|(*:1984)|/(?|adicionar(*:2006)|criar(*:2020)|([^/]++)(?|(*:2040)|/(?|editar(*:2059)|salvar(*:2074))))))|c(?|argos(?|(*:2100)|/(?|adicionar(*:2122)|criar(*:2136)|([^/]++)(?|(*:2156)|/(?|editar(*:2175)|salvar(*:2190)))))|o(?|laboradores(*:2218)|ordenador(*:2236)))|lider(*:2252)))|colaboradores/([^/]++)(?|(*:2288)|/(?|salvar(*:2307)|ocuparCargo(*:2327)|desocuparCargo(*:2350)))|atribuicoes/([^/]++)/remover(*:2389)|normativas/([^/]++)/(?|editar(*:2427)|salvar(*:2442))|procedimentos/([^/]++)/(?|editar(*:2484)|salvar(*:2499)))|/filemanager/uploads/(.*)(*:2535)|/password/reset/([^/]++)(*:2568))/?$}sDu',
    ),
    3 => 
    array (
      42 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      68 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GBkunBKPn5P9DJCT',
          ),
          1 => 
          array (
            0 => 'cnpj',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      154 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::27MLEKPQ0Z1L0xVh',
          ),
          1 => 
          array (
            0 => 'cep',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      180 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QAVZOXVpNEWv6s9h',
          ),
          1 => 
          array (
            0 => 'bee_conta_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HW7G81v6rX2X4PCQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      212 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::j7zrf3yP1tNivMHA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      224 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GOxAWeUMO1V9YiPA',
          ),
          1 => 
          array (
            0 => 'bee_conta_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bLbPWw3asiUCCBpp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      278 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TsQA32VEHqYVeRbR',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::20Zrwgd3VplGjGZw',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      316 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LAoJFZCgHFbdQBRk',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LyF8e5kFqsBnHx3K',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      349 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0whsn2AiidIcZJxW',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ok0LWm57LFJZLS3d',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SvAGYKrCfm8ApQo4',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sXQIqNnMCE0bvsd6',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GrAyrrI8VSsyDWwN',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wGASLln1wRkefsjc',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      454 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QHza3vmyctMDdIyY',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      467 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l5jGSq8u1uuhavZX',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      506 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fhEg0lhF1ixSqbXH',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5zWqfB5hsGg47Kzm',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IcQTi1rjhMpZ4LAH',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Dwbi7VJAuqugdokV',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      592 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v3fYlpmsPmTqHPO0',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      615 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e63RUtxtf7ET0AIX',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      634 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XVJBBiOLcWjlmzWc',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      685 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Wytvo36ogCSL2p9c',
          ),
          1 => 
          array (
            0 => 'id_normativa',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      700 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pSQpSdqJQ4Ruu6mc',
          ),
          1 => 
          array (
            0 => 'id_normativa',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7dZNv670KVxcNNnh',
          ),
          1 => 
          array (
            0 => 'id_procedimento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5AR6mjkiHadjdwkd',
          ),
          1 => 
          array (
            0 => 'id_procedimento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      787 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hxbbip3PweDzAttX',
          ),
          1 => 
          array (
            0 => 'id_diagrama',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      805 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0KWwuROO1KOPi2pS',
          ),
          1 => 
          array (
            0 => 'id_diagrama',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::C1QDP68hJnm3CIv5',
          ),
          1 => 
          array (
            0 => 'id_diagrama',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      849 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3LNN0T6XRjbfFQfS',
          ),
          1 => 
          array (
            0 => 'id_doc',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      866 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::178u1JtZpiu0w8DG',
          ),
          1 => 
          array (
            0 => 'id_doc',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      882 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BpocEkV7luKDqtro',
          ),
          1 => 
          array (
            0 => 'id_doc',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4fo6nZNMStRAZ4T8',
          ),
          1 => 
          array (
            0 => 'id_doc',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      950 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mr32EtWgmoGFhS7b',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tKgQjP5bQJLq9PlN',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      997 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6IzVqJbms7AtcZ8q',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1016 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RIY2AAIQe8mRL6fo',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1035 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bUMlDIKqdIxzvKca',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1051 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jd1V7YausbtawX6b',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1071 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VJ6LOn07q9OPaJX0',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1091 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bLvh0jq7gE1Pxerm',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1111 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8Jx0OMJuJTGIpxOM',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d7bp8lRMCQ5zqDv9',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1144 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s9ZmWC9EEvDBwkNh',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1158 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T4Ln3XlXTQ3WLYH6',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9dcCE3IqTfkY6v3H',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1202 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ymtz1MsSLHWStKus',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1222 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vdvJuGZHyEBhQfdw',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fzvDayXCbsS2gBOJ',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1264 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sShgpYs3doiY0u1L',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q5C2Ylh8CS5019Pt',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1306 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Br3Ya0WeEPGrhGo5',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1334 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MojGNu1iGQgIbw2j',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1354 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sPlZUnK8PUcMbkvT',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1373 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YbzKKWdSLaNPF9Bl',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BTkgUm9YdaQ3f68d',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4dJQ0wB3CXG00geu',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1428 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GPXQeVfXRCexHmnv',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1441 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Zd9SSgSqd7ZBxnnM',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4vK1QqsRg8h5h5RW',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1504 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ShMo6EGDHvV6kvcv',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1534 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1fddDveGioGG5Hut',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1543 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CxdZG923lBCSBJbM',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wHkC1nBi60V4l3Bw',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::08CULTURck6lLa9k',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GRlJ1cettxWUjwj9',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4dmDbn0mR59Qieud',
          ),
          1 => 
          array (
            0 => 'id_colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1658 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JchcqVPSVWhDmnHF',
          ),
          1 => 
          array (
            0 => 'id_att',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1674 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LSndSfGZkx9aOY87',
          ),
          1 => 
          array (
            0 => 'id_att',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'files.download',
          ),
          1 => 
          array (
            0 => 'caminho',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1745 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iMGqpPz7JDLvv2CH',
          ),
          1 => 
          array (
            0 => 'file',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1781 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tPBcE0adgCpgv7bV',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1813 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cWtWKYrUGO0edbG9',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3PwvdVvjIIJB0fOc',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1848 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wrAukTw2haCdJtGx',
          ),
          1 => 
          array (
            0 => 'document',
            1 => 'file',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1881 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NpFVhMYu3V60RIlJ',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::omm6KCchxGYqDet7',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.info',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1948 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.editar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.salvar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1984 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.setores',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.setores.adicionar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.setores.criar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2040 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.setores.info',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2059 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.setores.editar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.setores.salvar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_setor',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.cargos',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.cargos.adicionar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2136 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.cargos.criar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2156 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.cargos.info',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2175 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.cargos.editar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2190 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.cargos.salvar',
          ),
          1 => 
          array (
            0 => 'id_departamento',
            1 => 'id_cargo',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.colaboradores',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.coordenador',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2252 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.departamentos.lider',
          ),
          1 => 
          array (
            0 => 'id_departamento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores.detalhes',
          ),
          1 => 
          array (
            0 => 'id_colab',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores.salvar',
          ),
          1 => 
          array (
            0 => 'id_colab',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores.ocupar.cargo',
          ),
          1 => 
          array (
            0 => 'id_colab',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2350 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.colaboradores.ocupar.desocupar',
          ),
          1 => 
          array (
            0 => 'id_colab',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cliente.atribuicoes.remover',
          ),
          1 => 
          array (
            0 => 'id_att',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2427 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.normativas.editar',
          ),
          1 => 
          array (
            0 => 'id_normativa',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2442 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.normativas.salvar',
          ),
          1 => 
          array (
            0 => 'id_normativa',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2484 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.procedimentos.editar',
          ),
          1 => 
          array (
            0 => 'id_procedimento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ceo.procedimentos.salvar',
          ),
          1 => 
          array (
            0 => 'id_procedimento',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2535 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'files.get',
          ),
          1 => 
          array (
            0 => 'caminho',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2568 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'filemanager.base_route' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/filemanager',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\BeeApp\\LaravelFilemanager\\Controllers\\FilemanagerController@getIndex',
        'controller' => '\\BeeApp\\LaravelFilemanager\\Controllers\\FilemanagerController@getIndex',
        'namespace' => '\\BeeApp\\LaravelFilemanager\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'filemanager.base_route',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filemanager.action_route' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/filemanager',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\BeeApp\\LaravelFilemanager\\Controllers\\FilemanagerController@postAction',
        'controller' => '\\BeeApp\\LaravelFilemanager\\Controllers\\FilemanagerController@postAction',
        'namespace' => '\\BeeApp\\LaravelFilemanager\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'filemanager.action_route',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GxJthqlIAkeZg322' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::GxJthqlIAkeZg322',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laravelpwa.manifest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manifest.json',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'LaravelPWA\\Http\\Controllers\\LaravelPWAController@manifestJson',
        'controller' => 'LaravelPWA\\Http\\Controllers\\LaravelPWAController@manifestJson',
        'as' => 'laravelpwa.manifest',
        'namespace' => 'LaravelPWA\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laravelpwa.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'offline',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'LaravelPWA\\Http\\Controllers\\LaravelPWAController@offline',
        'controller' => 'LaravelPWA\\Http\\Controllers\\LaravelPWAController@offline',
        'as' => 'laravelpwa.',
        'namespace' => 'LaravelPWA\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/oauth/token',
      'action' => 
      array (
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'api/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nJAhY6f6nUm9DuEJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\TestController@index',
        'controller' => 'App\\Http\\Controllers\\TestController@index',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::nJAhY6f6nUm9DuEJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::naNy7RHVQWqbzUX7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'api/registrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@registrar',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@registrar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::naNy7RHVQWqbzUX7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GBkunBKPn5P9DJCT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/consulta/cnpj/{cnpj}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Externo\\CadastroNacional@consultarCnpj',
        'controller' => 'App\\Http\\Controllers\\Api\\Externo\\CadastroNacional@consultarCnpj',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/consulta',
        'where' => 
        array (
        ),
        'as' => 'generated::GBkunBKPn5P9DJCT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'cnpj' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::27MLEKPQ0Z1L0xVh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/consulta/cep/{cep}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Externo\\Localidade@cidadePorCep',
        'controller' => 'App\\Http\\Controllers\\Api\\Externo\\Localidade@cidadePorCep',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/consulta',
        'where' => 
        array (
        ),
        'as' => 'generated::27MLEKPQ0Z1L0xVh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'cep' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oUSzp9hh9YyqOPUW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/consultacpf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@consultarUsuario',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@consultarUsuario',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::oUSzp9hh9YyqOPUW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gPyf3z9ULR3gt1XT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/consultacnpj',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@consultarBeeConta',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@consultarBeeConta',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::gPyf3z9ULR3gt1XT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::caGQlG8pvbywiMaB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/files',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@storeFile',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@storeFile',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/files',
        'where' => 
        array (
        ),
        'as' => 'generated::caGQlG8pvbywiMaB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QAVZOXVpNEWv6s9h' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/files/{bee_conta_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@index',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/files',
        'where' => 
        array (
        ),
        'as' => 'generated::QAVZOXVpNEWv6s9h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HW7G81v6rX2X4PCQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/files/{id}/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@show',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/files',
        'where' => 
        array (
        ),
        'as' => 'generated::HW7G81v6rX2X4PCQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bLbPWw3asiUCCBpp' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/files/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/files',
        'where' => 
        array (
        ),
        'as' => 'generated::bLbPWw3asiUCCBpp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::j7zrf3yP1tNivMHA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/files/{id}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@downloadFile',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@downloadFile',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/files',
        'where' => 
        array (
        ),
        'as' => 'generated::j7zrf3yP1tNivMHA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GOxAWeUMO1V9YiPA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/files/{bee_conta_id}/info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@info',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@info',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/files',
        'where' => 
        array (
        ),
        'as' => 'generated::GOxAWeUMO1V9YiPA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EkOe3aMLEYMsZQ6i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:281:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:63:"function (\\Request $request) {
				return \\auth()->user();
			}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000005e4149f000000000219ad5ec";}";s:4:"hash";s:44:"vck1yIfrNJO8dHBJ8HcKsIKEZpCJzSlml4LGv3pbPio=";}}',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/user',
        'where' => 
        array (
        ),
        'as' => 'generated::EkOe3aMLEYMsZQ6i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8uXLbU5dJ9dTyLDp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/alterar-senha',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@alterarSenha',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@alterarSenha',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/user',
        'where' => 
        array (
        ),
        'as' => 'generated::8uXLbU5dJ9dTyLDp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pLyqMr82Sg5Wwy4v' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sistema/beecontas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@store',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/sistema/beecontas',
        'where' => 
        array (
        ),
        'as' => 'generated::pLyqMr82Sg5Wwy4v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sjEfUvjEfdrsO56F' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sistema/beecontas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@procurar',
        'controller' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@procurar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/sistema/beecontas',
        'where' => 
        array (
        ),
        'as' => 'generated::sjEfUvjEfdrsO56F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sistema.beecontas.assumir' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sistema/beecontas/assumir-acesso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ContaController@assumir',
        'controller' => 'App\\Http\\Controllers\\Api\\ContaController@assumir',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/sistema/beecontas',
        'where' => 
        array (
        ),
        'as' => 'sistema.beecontas.assumir',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5TeLhFrKmme5zxWN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sistema/usuarios/alterarsenha',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@alterarSenha',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@alterarSenha',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/sistema/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::5TeLhFrKmme5zxWN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hFMnWYC181pNr9Kl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sistema/usuarios/resetarsenha',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@resetarSenha',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@resetarSenha',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/sistema/usuarios',
        'where' => 
        array (
        ),
        'as' => 'generated::hFMnWYC181pNr9Kl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TRJunkMw87PfcL6g' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/departamentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos',
        'where' => 
        array (
        ),
        'as' => 'generated::TRJunkMw87PfcL6g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vKBBdvcqVumGHiu1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos',
        'where' => 
        array (
        ),
        'as' => 'generated::vKBBdvcqVumGHiu1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TsQA32VEHqYVeRbR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::TsQA32VEHqYVeRbR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::20Zrwgd3VplGjGZw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::20Zrwgd3VplGjGZw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ok0LWm57LFJZLS3d' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/renomear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@renomear',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@renomear',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::Ok0LWm57LFJZLS3d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SvAGYKrCfm8ApQo4' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@remover',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@remover',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::SvAGYKrCfm8ApQo4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LAoJFZCgHFbdQBRk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/setores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'generated::LAoJFZCgHFbdQBRk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LyF8e5kFqsBnHx3K' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/setores/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'generated::LyF8e5kFqsBnHx3K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0whsn2AiidIcZJxW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/setores/{id_setor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::0whsn2AiidIcZJxW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sXQIqNnMCE0bvsd6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/cargos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'generated::sXQIqNnMCE0bvsd6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GrAyrrI8VSsyDWwN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/cargos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'generated::GrAyrrI8VSsyDWwN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wGASLln1wRkefsjc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::wGASLln1wRkefsjc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QHza3vmyctMDdIyY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/cargos/{id_cargo}/tipo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@definirTipo',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@definirTipo',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::QHza3vmyctMDdIyY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::l5jGSq8u1uuhavZX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/departamentos/{id_departamento}/cargos/{id_cargo}/setor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@definirSetor',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@definirSetor',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::l5jGSq8u1uuhavZX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::30N6mWSZIaX8PZVU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/colaboradores/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'generated::30N6mWSZIaX8PZVU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nSzIIOpt7PrfPEZm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/colaboradores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'generated::nSzIIOpt7PrfPEZm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fhEg0lhF1ixSqbXH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::fhEg0lhF1ixSqbXH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5zWqfB5hsGg47Kzm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}/ocuparCargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@ocuparCargo',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@ocuparCargo',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::5zWqfB5hsGg47Kzm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IcQTi1rjhMpZ4LAH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}/desocuparCargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@desocuparCargo',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@desocuparCargo',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::IcQTi1rjhMpZ4LAH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e63RUtxtf7ET0AIX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}/cargosOcupados',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listarCargosOcupados',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listarCargosOcupados',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::e63RUtxtf7ET0AIX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::v3fYlpmsPmTqHPO0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}/documentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listarDocumentos',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listarDocumentos',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::v3fYlpmsPmTqHPO0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Dwbi7VJAuqugdokV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}/defBeeLider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@setBeeLider',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@setBeeLider',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::Dwbi7VJAuqugdokV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XVJBBiOLcWjlmzWc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/empresa/colaboradores/{id_colaborador}/remBeeLider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@unsetBeeLider',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@unsetBeeLider',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::XVJBBiOLcWjlmzWc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6hw1BkYrTC3SMDEe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/beeceo/geral/estrutura_empresarial_sem_cargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaGeralSemCargos',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaGeralSemCargos',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/geral',
        'where' => 
        array (
        ),
        'as' => 'generated::6hw1BkYrTC3SMDEe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r4oF933qM85b5ibS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/beeceo/geral/estrutura_empresarial_com_cargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaGeralComCargos',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaGeralComCargos',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/geral',
        'where' => 
        array (
        ),
        'as' => 'generated::r4oF933qM85b5ibS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HI68yZKsu6mx2qh0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/beeceo/geral/estrutura_papeis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaPapeis',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaPapeis',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/geral',
        'where' => 
        array (
        ),
        'as' => 'generated::HI68yZKsu6mx2qh0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w6ZlupFsEwV1QH06' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/beeceo/geral/estrutura_colaboradores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaColaboradores',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\GeralController@estruturaColaboradores',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/geral',
        'where' => 
        array (
        ),
        'as' => 'generated::w6ZlupFsEwV1QH06',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FO6uvJz73ZpJJuB2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/normativas/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/normativas',
        'where' => 
        array (
        ),
        'as' => 'generated::FO6uvJz73ZpJJuB2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lXrt98XNAvwsC8fi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/normativas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/normativas',
        'where' => 
        array (
        ),
        'as' => 'generated::lXrt98XNAvwsC8fi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Wytvo36ogCSL2p9c' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/normativas/{id_normativa}/aplicar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@atualizarAplicacao',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@atualizarAplicacao',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/normativas/{id_normativa}',
        'where' => 
        array (
        ),
        'as' => 'generated::Wytvo36ogCSL2p9c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pSQpSdqJQ4Ruu6mc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/normativas/{id_normativa}/arquivar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@arquivar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\NormativaController@arquivar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/normativas/{id_normativa}',
        'where' => 
        array (
        ),
        'as' => 'generated::pSQpSdqJQ4Ruu6mc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7ZBliiV9Nkn3NFz4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/procedimentos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/procedimentos',
        'where' => 
        array (
        ),
        'as' => 'generated::7ZBliiV9Nkn3NFz4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FAEYGn2gXaQPkprq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/procedimentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/procedimentos',
        'where' => 
        array (
        ),
        'as' => 'generated::FAEYGn2gXaQPkprq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7dZNv670KVxcNNnh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/procedimentos/{id_procedimento}/aplicar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@atualizarAplicacao',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@atualizarAplicacao',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/procedimentos/{id_procedimento}',
        'where' => 
        array (
        ),
        'as' => 'generated::7dZNv670KVxcNNnh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5AR6mjkiHadjdwkd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/procedimentos/{id_procedimento}/arquivar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@arquivar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\ProcedimentoController@arquivar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/procedimentos/{id_procedimento}',
        'where' => 
        array (
        ),
        'as' => 'generated::5AR6mjkiHadjdwkd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::O3g9Dy5SgyCb2ZnV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/diagramas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/diagramas',
        'where' => 
        array (
        ),
        'as' => 'generated::O3g9Dy5SgyCb2ZnV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GxQqp5dHnuvPVCS9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/diagramas/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@criarDiagrama',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@criarDiagrama',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/diagramas',
        'where' => 
        array (
        ),
        'as' => 'generated::GxQqp5dHnuvPVCS9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hxbbip3PweDzAttX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/beeceo/diagramas/{id_diagrama}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@obterDiagrama',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@obterDiagrama',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/diagramas/{id_diagrama}',
        'where' => 
        array (
        ),
        'as' => 'generated::hxbbip3PweDzAttX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0KWwuROO1KOPi2pS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/diagramas/{id_diagrama}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@salvarDiagrama',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@salvarDiagrama',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/diagramas/{id_diagrama}',
        'where' => 
        array (
        ),
        'as' => 'generated::0KWwuROO1KOPi2pS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::C1QDP68hJnm3CIv5' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/beeceo/diagramas/{id_diagrama}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@removerDiagrama',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\DiagramaController@removerDiagrama',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/diagramas/{id_diagrama}',
        'where' => 
        array (
        ),
        'as' => 'generated::C1QDP68hJnm3CIv5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3LNN0T6XRjbfFQfS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/beeceo/beedocs/{id_doc}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/beedocs/{id_doc}',
        'where' => 
        array (
        ),
        'as' => 'generated::3LNN0T6XRjbfFQfS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::178u1JtZpiu0w8DG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/beedocs/{id_doc}/emoji',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@definirEmoji',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@definirEmoji',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/beedocs/{id_doc}',
        'where' => 
        array (
        ),
        'as' => 'generated::178u1JtZpiu0w8DG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BpocEkV7luKDqtro' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/beedocs/{id_doc}/renomear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@renomear',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@renomear',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/beedocs/{id_doc}',
        'where' => 
        array (
        ),
        'as' => 'generated::BpocEkV7luKDqtro',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4fo6nZNMStRAZ4T8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/beeceo/beedocs/{id_doc}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\BeeCeo\\BeeDocController@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/beeceo/beedocs/{id_doc}',
        'where' => 
        array (
        ),
        'as' => 'generated::4fo6nZNMStRAZ4T8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::agoVFXN04hIO63Tw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/hive/conta/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/hive/conta',
        'where' => 
        array (
        ),
        'as' => 'generated::agoVFXN04hIO63Tw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g4BuDvcO0umv70dH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/hive/conta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Hive\\Contas@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/hive/conta',
        'where' => 
        array (
        ),
        'as' => 'generated::g4BuDvcO0umv70dH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wlBjfMPCqapld1Oc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos',
        'where' => 
        array (
        ),
        'as' => 'generated::wlBjfMPCqapld1Oc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8E8XvJkWOyFojo91' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos',
        'where' => 
        array (
        ),
        'as' => 'generated::8E8XvJkWOyFojo91',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mr32EtWgmoGFhS7b' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::mr32EtWgmoGFhS7b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tKgQjP5bQJLq9PlN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::tKgQjP5bQJLq9PlN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s9ZmWC9EEvDBwkNh' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@remover',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@remover',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::s9ZmWC9EEvDBwkNh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ymtz1MsSLHWStKus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/defLider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@definirLider',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@definirLider',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::ymtz1MsSLHWStKus',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T4Ln3XlXTQ3WLYH6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/remLider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@removerLider',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@removerLider',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::T4Ln3XlXTQ3WLYH6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vdvJuGZHyEBhQfdw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/defCoordenador',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@definirCoordenador',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@definirCoordenador',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::vdvJuGZHyEBhQfdw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9dcCE3IqTfkY6v3H' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/remCoordenador',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@removerCoordenador',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@removerCoordenador',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::9dcCE3IqTfkY6v3H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q5C2Ylh8CS5019Pt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/associarPO',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@associarProcessoOperacional',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@associarProcessoOperacional',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::Q5C2Ylh8CS5019Pt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fzvDayXCbsS2gBOJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/desassociarPO',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@desassociarProcessoOperacional',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@desassociarProcessoOperacional',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::fzvDayXCbsS2gBOJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Br3Ya0WeEPGrhGo5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/associarNormativa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@associarNormativa',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@associarNormativa',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::Br3Ya0WeEPGrhGo5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sShgpYs3doiY0u1L' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/desassociarNormativa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@desassociarNormativa',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Departamentos@desassociarNormativa',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'generated::sShgpYs3doiY0u1L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6IzVqJbms7AtcZ8q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'generated::6IzVqJbms7AtcZ8q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d7bp8lRMCQ5zqDv9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'generated::d7bp8lRMCQ5zqDv9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RIY2AAIQe8mRL6fo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::RIY2AAIQe8mRL6fo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bUMlDIKqdIxzvKca' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::bUMlDIKqdIxzvKca',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jd1V7YausbtawX6b' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@remover',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@remover',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::jd1V7YausbtawX6b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VJ6LOn07q9OPaJX0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}/defLider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@definirLider',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@definirLider',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::VJ6LOn07q9OPaJX0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8Jx0OMJuJTGIpxOM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}/associarPO',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@associarProcessoOperacional',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@associarProcessoOperacional',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::8Jx0OMJuJTGIpxOM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bLvh0jq7gE1Pxerm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}/desassociarPO',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@desassociarProcessoOperacional',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Setores@desassociarProcessoOperacional',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'generated::bLvh0jq7gE1Pxerm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MojGNu1iGQgIbw2j' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'generated::MojGNu1iGQgIbw2j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Zd9SSgSqd7ZBxnnM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'generated::Zd9SSgSqd7ZBxnnM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sPlZUnK8PUcMbkvT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::sPlZUnK8PUcMbkvT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YbzKKWdSLaNPF9Bl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::YbzKKWdSLaNPF9Bl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BTkgUm9YdaQ3f68d' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@remover',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@remover',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::BTkgUm9YdaQ3f68d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4dJQ0wB3CXG00geu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}/atribuicoes/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@salvarAtribuicoes',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@salvarAtribuicoes',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::4dJQ0wB3CXG00geu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GPXQeVfXRCexHmnv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}/atribuicoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@obterAtribuicoes',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@obterAtribuicoes',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'generated::GPXQeVfXRCexHmnv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sFOaB4TmRCgu8skc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'generated::sFOaB4TmRCgu8skc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ewEXASURT7hWNcoE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/colaboradores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'generated::ewEXASURT7hWNcoE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4vK1QqsRg8h5h5RW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::4vK1QqsRg8h5h5RW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4dmDbn0mR59Qieud' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obter',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obter',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::4dmDbn0mR59Qieud',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ShMo6EGDHvV6kvcv' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@remover',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@remover',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::ShMo6EGDHvV6kvcv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1fddDveGioGG5Hut' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/atribuicoes/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@salvarAtribuicoes',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@salvarAtribuicoes',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::1fddDveGioGG5Hut',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CxdZG923lBCSBJbM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/atribuicoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obterAtribuicoes',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obterAtribuicoes',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::CxdZG923lBCSBJbM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wHkC1nBi60V4l3Bw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/ocuparCargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@ocuparCargo',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@ocuparCargo',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::wHkC1nBi60V4l3Bw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::08CULTURck6lLa9k' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/desocuparCargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@desocuparCargo',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@desocuparCargo',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::08CULTURck6lLa9k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GRlJ1cettxWUjwj9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/colaboradores/{id_colaborador}/papeis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obterPapeis',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Colaboradores@obterPapeis',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa/colaboradores/{id_colaborador}',
        'where' => 
        array (
        ),
        'as' => 'generated::GRlJ1cettxWUjwj9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VaKGX05vI37VKJcX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/empresa/cargos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@todos',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Cargos@todos',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/empresa',
        'where' => 
        array (
        ),
        'as' => 'generated::VaKGX05vI37VKJcX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BKcAyu27ht0gCtqV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/regs/atribuicoes/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@criar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@criar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/regs/atribuicoes',
        'where' => 
        array (
        ),
        'as' => 'generated::BKcAyu27ht0gCtqV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SUcBHNfMU2UGlCaU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/OLD/regs/atribuicoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@listar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@listar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/regs/atribuicoes',
        'where' => 
        array (
        ),
        'as' => 'generated::SUcBHNfMU2UGlCaU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JchcqVPSVWhDmnHF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/OLD/regs/atribuicoes/{id_att}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@salvar',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@salvar',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/regs/atribuicoes/{id_att}',
        'where' => 
        array (
        ),
        'as' => 'generated::JchcqVPSVWhDmnHF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LSndSfGZkx9aOY87' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/OLD/regs/atribuicoes/{id_att}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@remover',
        'controller' => 'App\\Http\\Controllers\\Api\\Empresa\\Atribuicoes@remover',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'api/OLD/regs/atribuicoes/{id_att}',
        'where' => 
        array (
        ),
        'as' => 'generated::LSndSfGZkx9aOY87',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iMGqpPz7JDLvv2CH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/files/get/{file}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Files\\FileController@getFile',
        'controller' => 'App\\Http\\Controllers\\v1\\Files\\FileController@getFile',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/files',
        'where' => 
        array (
        ),
        'as' => 'generated::iMGqpPz7JDLvv2CH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NpFVhMYu3V60RIlJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/documents/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Documents\\DocumentController@getDocument',
        'controller' => 'App\\Http\\Controllers\\v1\\Documents\\DocumentController@getDocument',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/documents/{document}',
        'where' => 
        array (
        ),
        'as' => 'generated::NpFVhMYu3V60RIlJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::omm6KCchxGYqDet7' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'v1/documents/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Documents\\DocumentController@saveChanges',
        'controller' => 'App\\Http\\Controllers\\v1\\Documents\\DocumentController@saveChanges',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/documents/{document}',
        'where' => 
        array (
        ),
        'as' => 'generated::omm6KCchxGYqDet7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tPBcE0adgCpgv7bV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/files/images/docs/{document}/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Files\\ImagesController@uploadToDocument',
        'controller' => 'App\\Http\\Controllers\\v1\\Files\\ImagesController@uploadToDocument',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/files/images/docs/{document}',
        'where' => 
        array (
        ),
        'as' => 'generated::tPBcE0adgCpgv7bV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cWtWKYrUGO0edbG9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/files/docs/{document}/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Files\\FileController@uploadToDocument',
        'controller' => 'App\\Http\\Controllers\\v1\\Files\\FileController@uploadToDocument',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/files/docs/{document}',
        'where' => 
        array (
        ),
        'as' => 'generated::cWtWKYrUGO0edbG9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3PwvdVvjIIJB0fOc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/files/docs/{document}/files',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Files\\FileController@getFiles',
        'controller' => 'App\\Http\\Controllers\\v1\\Files\\FileController@getFiles',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/files/docs/{document}',
        'where' => 
        array (
        ),
        'as' => 'generated::3PwvdVvjIIJB0fOc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wrAukTw2haCdJtGx' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/files/docs/{document}/files/{file}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Files\\FileController@removeFile',
        'controller' => 'App\\Http\\Controllers\\v1\\Files\\FileController@removeFile',
        'namespace' => 'App\\Http\\Controllers\\Api',
        'prefix' => 'v1/files/docs/{document}',
        'where' => 
        array (
        ),
        'as' => 'generated::wrAukTw2haCdJtGx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YsgPmn7hSVZZojpc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teste',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\TestController@index',
        'controller' => 'App\\Http\\Controllers\\TestController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YsgPmn7hSVZZojpc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inicio' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inicio',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gestor.beeconta' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bee-contas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Gestor\\BeeContaController@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Gestor\\BeeContaController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/bee-contas',
        'where' => 
        array (
        ),
        'as' => 'gestor.beeconta',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gestor.beeconta.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bee-contas/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Gestor\\BeeContaController@adicionar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Gestor\\BeeContaController@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/bee-contas',
        'where' => 
        array (
        ),
        'as' => 'gestor.beeconta.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gestor.assumir.acesso' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gestor/assumir-acesso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Gestor\\BeeContaController@assumir',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Gestor\\BeeContaController@assumir',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/gestor',
        'where' => 
        array (
        ),
        'as' => 'gestor.assumir.acesso',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'beeceo.normativas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'beeceo/normativas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/beeceo',
        'where' => 
        array (
        ),
        'as' => 'beeceo.normativas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'beeceo.procedimentos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'beeceo/procedimentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/beeceo',
        'where' => 
        array (
        ),
        'as' => 'beeceo.procedimentos',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'beeceo.diagramas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'beeceo/diagramas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Diagramas@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Diagramas@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/beeceo',
        'where' => 
        array (
        ),
        'as' => 'beeceo.diagramas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'modulo.departamentos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'departamentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Departamentos@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Departamentos@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'modulo.departamentos',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'modulo.colaboradores.gestao' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'colaboradores/gestao',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Empresa\\Colaboradores@gestao',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Empresa\\Colaboradores@gestao',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'modulo.colaboradores.gestao',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'modulo.colaboradores.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'colaboradores/info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Empresa\\Colaboradores@info',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Empresa\\Colaboradores@info',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'modulo.colaboradores.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@index',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@adicionar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.criar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@criar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@criar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.criar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@info',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@info',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.editar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@editar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@editar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.editar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.salvar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@salvar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.salvar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.cargos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/cargos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Cargos@index',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Cargos@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'cliente.cargos',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.cargos.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/cargos/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Cargos@adicionar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Cargos@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'cliente.cargos.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.cargos.criar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/cargos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Cargos@criar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Cargos@criar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/cargos',
        'where' => 
        array (
        ),
        'as' => 'cliente.cargos.criar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.cargos.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/cargos/{id_cargo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Cargos@info',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Cargos@info',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'cliente.cargos.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.cargos.editar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/cargos/{id_cargo}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Cargos@editar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Cargos@editar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'cliente.cargos.editar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.cargos.salvar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/cargos/{id_cargo}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Cargos@salvar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Cargos@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/cargos/{id_cargo}',
        'where' => 
        array (
        ),
        'as' => 'cliente.cargos.salvar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.setores' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/setores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Setores@index',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Setores@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'cliente.setores',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.setores.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/setores/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Setores@adicionar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Setores@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'cliente.setores.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.setores.criar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/setores/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Setores@criar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Setores@criar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/setores',
        'where' => 
        array (
        ),
        'as' => 'cliente.setores.criar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.setores.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/setores/{id_setor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Setores@info',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Setores@info',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'cliente.setores.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.setores.editar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/setores/{id_setor}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Setores@editar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Setores@editar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'cliente.setores.editar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.setores.salvar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/setores/{id_setor}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Setores@salvar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Setores@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}/setores/{id_setor}',
        'where' => 
        array (
        ),
        'as' => 'cliente.setores.salvar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.colaboradores' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/colaboradores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@colaboradores',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@colaboradores',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.colaboradores',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.lider' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/lider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@lider',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@lider',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.lider',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.departamentos.coordenador' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/departamentos/{id_departamento}/coordenador',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Departamentos@coordenador',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Departamentos@coordenador',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/departamentos/{id_departamento}',
        'where' => 
        array (
        ),
        'as' => 'cliente.departamentos.coordenador',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/colaboradores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@index',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/colaboradores/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@adicionar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores.criar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/colaboradores/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@criar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@criar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores.criar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores.detalhes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/colaboradores/{id_colab}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@detalhes',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@detalhes',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores/{id_colab}',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores.detalhes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores.salvar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/colaboradores/{id_colab}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@salvar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores/{id_colab}',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores.salvar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores.ocupar.cargo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/colaboradores/{id_colab}/ocuparCargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@ocuparCargo',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@ocuparCargo',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores/{id_colab}',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores.ocupar.cargo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.colaboradores.ocupar.desocupar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/colaboradores/{id_colab}/desocuparCargo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@desocuparCargo',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Colaboradores@desocuparCargo',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/colaboradores/{id_colab}',
        'where' => 
        array (
        ),
        'as' => 'cliente.colaboradores.ocupar.desocupar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.atribuicoes.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/atribuicoes/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Atribuicoes@adicionar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Atribuicoes@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/atribuicoes',
        'where' => 
        array (
        ),
        'as' => 'cliente.atribuicoes.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.atribuicoes.editar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/atribuicoes/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Atribuicoes@editar',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Atribuicoes@editar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/atribuicoes',
        'where' => 
        array (
        ),
        'as' => 'cliente.atribuicoes.editar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cliente.atribuicoes.remover' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/atribuicoes/{id_att}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\Cliente\\Atribuicoes@remover',
        'controller' => 'App\\Http\\Controllers\\Cliente\\Atribuicoes@remover',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/atribuicoes',
        'where' => 
        array (
        ),
        'as' => 'cliente.atribuicoes.remover',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.normativas.principal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/normativas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/normativas',
        'where' => 
        array (
        ),
        'as' => 'ceo.normativas.principal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.normativas.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/normativas/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@adicionar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/normativas',
        'where' => 
        array (
        ),
        'as' => 'ceo.normativas.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.normativas.criar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/normativas/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@salvar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/normativas',
        'where' => 
        array (
        ),
        'as' => 'ceo.normativas.criar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.normativas.editar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/normativas/{id_normativa}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@editar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@editar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/normativas/{id_normativa}',
        'where' => 
        array (
        ),
        'as' => 'ceo.normativas.editar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.normativas.salvar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/normativas/{id_normativa}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@salvar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Normativas@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/normativas/{id_normativa}',
        'where' => 
        array (
        ),
        'as' => 'ceo.normativas.salvar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.procedimentos.principal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/procedimentos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@index',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/procedimentos',
        'where' => 
        array (
        ),
        'as' => 'ceo.procedimentos.principal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.procedimentos.adicionar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/procedimentos/adicionar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@adicionar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@adicionar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/procedimentos',
        'where' => 
        array (
        ),
        'as' => 'ceo.procedimentos.adicionar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.procedimentos.criar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/procedimentos/criar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@salvar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/procedimentos',
        'where' => 
        array (
        ),
        'as' => 'ceo.procedimentos.criar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.procedimentos.editar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cliente/procedimentos/{id_procedimento}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@editar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@editar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/procedimentos/{id_procedimento}',
        'where' => 
        array (
        ),
        'as' => 'ceo.procedimentos.editar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ceo.procedimentos.salvar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cliente/procedimentos/{id_procedimento}/salvar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'post.process',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@salvar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\BeeCeo\\Procedimentos@salvar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'cliente/procedimentos/{id_procedimento}',
        'where' => 
        array (
        ),
        'as' => 'ceo.procedimentos.salvar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'files.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filemanager/uploads/{caminho}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Storage\\AcessoArquivos@acessar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Storage\\AcessoArquivos@acessar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'files.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'caminho' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'files.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'arquivos/download/{caminho}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WebControllers\\Storage\\AcessoArquivos@baixar',
        'controller' => 'App\\Http\\Controllers\\WebControllers\\Storage\\AcessoArquivos@baixar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'files.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'caminho' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UwBiHfgOIsjKn1oO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::UwBiHfgOIsjKn1oO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HVEWheYCZl8agZOv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HVEWheYCZl8agZOv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ayojT1yYVzDAczMi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ayojT1yYVzDAczMi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::G0ytBGkIJ273cV6o' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sair',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:339:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:120:"function(){
    \\Illuminate\\Support\\Facades\\Auth::logout();
    return \\redirect(\\route(\'filemanager.base_route\'));
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000005e4149f400000000219ad5ec";}";s:4:"hash";s:44:"c2ssT6Y4GpFZCZclKTHC5Q3ChyAlqH5kS/zqevX/kV4=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::G0ytBGkIJ273cV6o',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
