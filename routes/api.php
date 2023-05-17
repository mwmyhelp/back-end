<?php

use App\Http\Controllers\Api as C;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function () {

    /** Routes for Test and Another Things **/
    Route::any('test',[\App\Http\Controllers\TestController::class,'index']);

	/** Rotas Publicas de API */
	Route::any('/registrar', [
		C\AuthController::class,
		'registrar'
	]);
	Route::prefix('consulta')->group(function () {
		//Consultar CNPJ
		Route::get('cnpj/{cnpj}', [
			C\Externo\CadastroNacional::class,
			'consultarCnpj'
		])->where('cnpj', '.*');
		//Consultar CEP
		Route::get('cep/{cep}', [
			C\Externo\Localidade::class,
			'cidadePorCep'
		])->where('cep', '.*');
	});

	/** Rotas de usuário e autenticação **/
	Route::prefix('auth')->group(function () {
		Route::post('/consultacpf', [
			C\AuthController::class,
			'consultarUsuario'
		]);
		Route::post('/consultacnpj', [
			C\AuthController::class,
			'consultarBeeConta'
		]);
//        Route::post('/logar', [C\AuthController::class, 'logar']);
	});

	/** Rotas que exigem autenticação **/
	Route::middleware('auth:api')->group(function () {
		Route::group(['prefix' => 'files'], function ($router) {
			Route::post('', "FileController@storeFile");
			Route::get('{bee_conta_id}', "FileController@index");
			Route::get('{id}/show', "FileController@show");
			Route::delete('{id}', "FileController@destroy");
			Route::get('{id}/download', "FileController@downloadFile");
			Route::get('{bee_conta_id}/info', "FileController@info");
		});

		Route::prefix('/user')->group(function () {
			Route::get('/profile', function (Request $request) {
				return auth()->user();
			});
			Route::post('/alterar-senha', [
				C\UserController::class,
				'alterarSenha'
			]);
		});

		/** Rotas para info de sistema **/
		Route::prefix('sistema')->group(function () {
			/** Rotas para Beecontas **/
			Route::prefix('beecontas')->group(function () {
				Route::post('', [
					C\Hive\Contas::class,
					'store'
				]); //criar conta
				Route::get('', [
					C\Hive\Contas::class,
					'procurar'
				]); //lista
				Route::post('/assumir-acesso', [
					C\ContaController::class,
					'assumir'
				])->name('sistema.beecontas.assumir');
			});
			/** Rotas para Usuários **/
			Route::prefix('usuarios')->group(function () {
				//Alterar a senha do usuário logado
				Route::post('alterarsenha', [
					C\AuthController::class,
					'alterarSenha'
				]);
				//Resetar senha de um usuário específico
				Route::post('resetarsenha', [
					C\AuthController::class,
					'resetarSenha'
				]);
			});
		});
		/** Rotas para Estrutura da Empresa **/
		Route::prefix('empresa')->group(function () {
			/** Departamentos **/
			Route::prefix('departamentos')->group(function () {
				//Obter Lista
				Route::get('', [
					C\Empresa\Departamentos::class,
					'listar'
				]);
				//Criar
				Route::post('/criar', [
					C\Empresa\Departamentos::class,
					'criar'
				]);
				/** Especifico do Dep **/
				Route::prefix('{id_departamento}')->group(function () {
					//Obter
					Route::get('', [
						C\Empresa\Departamentos::class,
						'obter'
					]);
					//Salvar
					Route::post('salvar', [
						C\Empresa\Departamentos::class,
						'salvar'
					]);
					//Renomear
					Route::post('renomear', [
						C\Empresa\Departamentos::class,
						'renomear'
					]);
					//Arquivar - Remover
					Route::delete('remover', [
						C\Empresa\Departamentos::class,
						'remover'
					]);

					/** Gerenciar Setores (Porquê é ligado ao departamento) */
					Route::prefix('setores')->group(function () {
						//Listar
						Route::get('', [
							C\Empresa\Setores::class,
							'listar'
						]);
						//Criar
						Route::post('criar', [
							C\Empresa\Setores::class,
							'criar'
						]);

						/** Específico do Setor **/
						Route::prefix('{id_setor}')->group(function () {
							//Obter
							Route::get('', [
								C\Empresa\Setores::class,
								'obter'
							]);
						});
					});
					/** Gerenciar Cargos (Porquê também é ligado ao departamento) **/
					Route::prefix('cargos')->group(function () {
						//Listar
						Route::get('', [
							C\Empresa\Cargos::class,
							'listar'
						]);
						//Criar
						Route::post('criar', [
							C\Empresa\Cargos::class,
							'criar'
						]);
						/** Específico do Cargo **/
						Route::prefix('{id_cargo}')->group(function () {
							//Obter
							Route::get('', [
								C\Empresa\Cargos::class,
								'obter'
							]);
							//Definir Tipo
							Route::post('/tipo', [
								C\Empresa\Cargos::class,
								'definirTipo'
							]);
							//Definir Setor
							Route::post('/setor', [
								C\Empresa\Cargos::class,
								'definirSetor'
							]);
						});
					});
				});
			});
			/** Colaboradores **/
			Route::prefix('colaboradores')->group(function () {
				//Criar um Colaborador
				Route::post('criar', [
					C\Empresa\Colaboradores::class,
					'criar'
				]);
				//Listar
				Route::get('', [
					C\Empresa\Colaboradores::class,
					'listar'
				]);
				//Especificos
				Route::prefix('{id_colaborador}')->group(function () {
					//Obter
					Route::get('', [
						C\Empresa\Colaboradores::class,
						'obter'
					]);
					//Associar a Cargo
					Route::post('/ocuparCargo', [
						C\Empresa\Colaboradores::class,
						'ocuparCargo'
					]);
					//Desassociar Cargo
					Route::post('/desocuparCargo', [
						C\Empresa\Colaboradores::class,
						'desocuparCargo'
					]);
					//Listar Cargos Ocupados
					Route::get('/cargosOcupados', [
						C\Empresa\Colaboradores::class,
						'listarCargosOcupados'
					]);
					//Listar Documentos
					Route::get('/documentos', [
						C\Empresa\Colaboradores::class,
						'listarDocumentos'
					]);
					//Definir BeeLider
					Route::post('/defBeeLider', [
						C\Empresa\Colaboradores::class,
						'setBeeLider'
					]);
					//Rem BeeLider
					Route::post('/remBeeLider', [
						C\Empresa\Colaboradores::class,
						'unsetBeeLider'
					]);
                    //remover Colaborador
                    Route::post('/removerColaborador', [
                        C\Empresa\Colaboradores::class,
                        'remover'
                    ]);
				});
			});
		});
		/** Rotas para o BeeCeo **/
		Route::prefix('beeceo')->group(function () {
			/** Informações Gerais **/
			Route::prefix('geral')->group(function () {
				//Obter estrutura empresarial sem cargo
				Route::get('estrutura_empresarial_sem_cargo', [
					C\BeeCeo\GeralController::class,
					'estruturaGeralSemCargos'
				]);
				//Obter estrutura empresarial com cargo
				Route::get('estrutura_empresarial_com_cargo', [
					C\BeeCeo\GeralController::class,
					'estruturaGeralComCargos'
				]);
				//Obter estrutura de papeis
				Route::get('estrutura_papeis', [
					C\BeeCeo\GeralController::class,
					'estruturaPapeis'
				]);
				//Obter estrutura de colaboradores
				Route::get('estrutura_colaboradores', [
					C\BeeCeo\GeralController::class,
					'estruturaColaboradores'
				]);
			});
			/** Normtativas **/
			Route::prefix('normativas')->group(function () {
				//Criar normativas
				Route::post('criar', [
					C\BeeCeo\NormativaController::class,
					'criar'
				]);
				//Listar
				Route::post('', [
					C\BeeCeo\NormativaController::class,
					'listar'
				]);
				//Especifico
				Route::prefix('{id_normativa}')->group(function () {
					//Atualizar Aplicação
					Route::post('aplicar', [
						C\BeeCeo\NormativaController::class,
						'atualizarAplicacao'
					]);
					//Arquivar Normativa
					Route::post('arquivar', [
						C\BeeCeo\NormativaController::class,
						'arquivar'
					]);
				});
			});
			/** Procedimentos **/
			Route::prefix('procedimentos')->group(function () {
				//Criar procedimentos
				Route::post('criar', [
					C\BeeCeo\ProcedimentoController::class,
					'criar'
				]);
				//Listar
				Route::post('', [
					C\BeeCeo\ProcedimentoController::class,
					'listar'
				]);
				//Especifico
				Route::prefix('{id_procedimento}')->group(function () {
					//Atualizar Aplicação
					Route::post('aplicar', [
						C\BeeCeo\ProcedimentoController::class,
						'atualizarAplicacao'
					]);
					//Arquivar Procedimento
					Route::post('arquivar', [
						C\BeeCeo\ProcedimentoController::class,
						'arquivar'
					]);
				});
			});
			/** Diagramas **/
			Route::prefix('diagramas')->group(function () {
				//Listar Diagramas
				Route::post('', [
					C\BeeCeo\DiagramaController::class,
					'listar'
				]);
				//Inserir um diagrama
				Route::post('criar', [
					C\BeeCeo\DiagramaController::class,
					'criarDiagrama'
				]);
				//Especifico
				Route::prefix('{id_diagrama}')->group(function () {
					//Obter um diagrama
					Route::get('', [
						C\BeeCeo\DiagramaController::class,
						'obterDiagrama'
					]);
					//Salvar um diagrama
					Route::post('salvar', [
						C\BeeCeo\DiagramaController::class,
						'salvarDiagrama'
					]);
					//Remover diagrama
					Route::delete('remover', [
						C\BeeCeo\DiagramaController::class,
						'removerDiagrama'
					]);
				});
			});
			/** BeeDocs **/
			Route::prefix('beedocs')->group(function () {
				Route::prefix('{id_doc}')->group(function () {
					//Obter Beedoc
					Route::get('', [
						C\BeeCeo\BeeDocController::class,
						'obter'
					]);
					//Atualizar Emoji
					Route::post('emoji', [
						C\BeeCeo\BeeDocController::class,
						'definirEmoji'
					]);
					//Renomear Doc
					Route::post('renomear', [
						C\BeeCeo\BeeDocController::class,
						'renomear'
					]);
					//Salvar
					Route::post('salvar', [
						C\BeeCeo\BeeDocController::class,
						'salvar'
					]);
				});
			});
		});
	});

	/** As rotas abaixo serão assassinadas **/

	/** Rotas Privadas **/
	Route::middleware('auth:sanctum')->prefix('OLD')->group(function () {
		/** O agrupamento HIVE se refere a criação de contas e outras informações mais focadas no sistema **/
		Route::prefix('hive')->group(function () {
			/** Rotas para gerenciamento das contas de usuários no sistema **/
			Route::prefix('conta')->group(function () {
				//Criar uma conta
				Route::post('criar', [
					C\Hive\Contas::class,
					'criar'
				]);
				//Listar contas
				Route::get('', [
					C\Hive\Contas::class,
					'listar'
				]);
			});
		});
		/** O agrupamento EMPRESA se refere a manipulação de dados referente a empresa **/
		Route::prefix('empresa')->group(function () {
			/** Rotas para gerenciamento de departamentos **/
			Route::prefix('departamentos')->group(function () {
				//Criar um Departamento
				Route::post('criar', [
					C\Empresa\Departamentos::class,
					'criar'
				]);
				//Listar departamentos
				Route::get('', [
					C\Empresa\Departamentos::class,
					'listar'
				]);
				//Ações em departamento selecionado
				Route::prefix('{id_departamento}')->group(function () {
					//Obter departamento
					Route::get('', [
						C\Empresa\Departamentos::class,
						'obter'
					]);
					//Salvar departamento
					Route::post('salvar', [
						C\Empresa\Departamentos::class,
						'salvar'
					]);
					//Remover departamento
					Route::delete('remover', [
						C\Empresa\Departamentos::class,
						'remover'
					]);
					//Definir Líder
					Route::post('defLider', [
						C\Empresa\Departamentos::class,
						'definirLider'
					]);
					Route::post('remLider', [
						C\Empresa\Departamentos::class,
						'removerLider'
					]);
					//Definir Coordenador
					Route::post('defCoordenador', [
						C\Empresa\Departamentos::class,
						'definirCoordenador'
					]);
					Route::post('remCoordenador', [
						C\Empresa\Departamentos::class,
						'removerCoordenador'
					]);
					//Associar PO
					Route::post('associarPO', [
						C\Empresa\Departamentos::class,
						'associarProcessoOperacional'
					]);
					//Desassociar PO
					Route::post('desassociarPO', [
						C\Empresa\Departamentos::class,
						'desassociarProcessoOperacional'
					]);
					//Associar Normativa
					Route::post('associarNormativa', [
						C\Empresa\Departamentos::class,
						'associarNormativa'
					]);
					//Desassociar Normativa
					Route::post('desassociarNormativa', [
						C\Empresa\Departamentos::class,
						'desassociarNormativa'
					]);

					/** Rotas Verbosas para os Setores (Que existem apenas dentro de departamentos) **/
					Route::prefix('setores')->group(function () {
						//Criar um Setor
						Route::post('criar', [
							C\Empresa\Setores::class,
							'criar'
						]);
						//Listar Setores
						Route::get('', [
							C\Empresa\Setores::class,
							'listar'
						]);
						//Ações para um setor determinado
						Route::prefix('{id_setor}')->group(function () {
							//Obter setor
							Route::get('', [
								C\Empresa\Setores::class,
								'obter'
							]);
							//Salvar setor
							Route::post('salvar', [
								C\Empresa\Setores::class,
								'salvar'
							]);
							//Remover setor
							Route::delete('remover', [
								C\Empresa\Setores::class,
								'remover'
							]);
							//Definir Líder
							Route::post('defLider', [
								C\Empresa\Setores::class,
								'definirLider'
							]);
							//Associar PO
							Route::post('associarPO', [
								C\Empresa\Setores::class,
								'associarProcessoOperacional'
							]);
							//Desassociar PO
							Route::post('desassociarPO', [
								C\Empresa\Setores::class,
								'desassociarProcessoOperacional'
							]);
						});
					});

					/** Rotas Verbosas para os Cargos **/
					Route::prefix('cargos')->group(function () {
						//Criar um Cargo
						Route::post('criar', [
							C\Empresa\Cargos::class,
							'criar'
						]);
						//Listar Cargos
						Route::get('', [
							C\Empresa\Cargos::class,
							'listar'
						]);
						//Ações para um cargo determinado
						Route::prefix('{id_cargo}')->group(function () {
							//Obter cargo
							Route::get('', [
								C\Empresa\Cargos::class,
								'obter'
							]);
							//Salvar cargo
							Route::post('salvar', [
								C\Empresa\Cargos::class,
								'salvar'
							]);
							//Remover cargo
							Route::delete('remover', [
								C\Empresa\Cargos::class,
								'remover'
							]);
							//Salvar Atribuição
							Route::post('atribuicoes/salvar', [
								C\Empresa\Cargos::class,
								'salvarAtribuicoes'
							]);
							//Obter Atribuições
							Route::get('atribuicoes', [
								C\Empresa\Cargos::class,
								'obterAtribuicoes'
							]);
						});
					});
				});
			});

			/** Rotas para gerenciar colaboradores **/
			Route::prefix('colaboradores')->group(function () {
				//Criar Colaborador
				Route::post('criar', [
					C\Empresa\Colaboradores::class,
					'criar'
				]);
				//Listar Colaborador
				Route::get('', [
					C\Empresa\Colaboradores::class,
					'listar'
				]);
				//Ações para um colaborador específico
				Route::prefix('{id_colaborador}')->group(function () {
					//Salvar Colaborador
					Route::post('salvar', [
						C\Empresa\Colaboradores::class,
						'salvar'
					]);
					//Obter Colaborador
					Route::get('', [
						C\Empresa\Colaboradores::class,
						'obter'
					]);
					//Remover Colaborador
					Route::delete('remover', [
						C\Empresa\Colaboradores::class,
						'remover'
					]);
					//Salvar Atribuição
					Route::post('atribuicoes/salvar', [
						C\Empresa\Colaboradores::class,
						'salvarAtribuicoes'
					]);
					//Obter Atribuições
					Route::get('atribuicoes', [
						C\Empresa\Colaboradores::class,
						'obterAtribuicoes'
					]);
					//Ocupar Cargo
					Route::post('ocuparCargo', [
						C\Empresa\Colaboradores::class,
						'ocuparCargo'
					]);
					//Desocupar Cargo
					Route::post('desocuparCargo', [
						C\Empresa\Colaboradores::class,
						'desocuparCargo'
					]);
					//Obter Papeis
					Route::get('papeis', [
						C\Empresa\Colaboradores::class,
						'obterPapeis'
					]);
				});
			});

			/** Rotas temp para cargos **/
			Route::get('cargos', [
				C\Empresa\Cargos::class,
				'todos'
			]);
		});
		/** O agrupomanto REGS se refere a manipulação de registros de documentações de processos **/
		Route::prefix('regs')->group(function () {
			/** Rotas para gerenciamento de atribuições **/
			Route::prefix('atribuicoes')->group(function () {
				//Criar
				Route::post('criar', [
					C\Empresa\Atribuicoes::class,
					'criar'
				]);
				//Listar
				Route::get('', [
					C\Empresa\Atribuicoes::class,
					'listar'
				]);
				//Especifica
				Route::prefix('{id_att}')->group(function () {
					//Editar
					Route::post('salvar', [
						C\Empresa\Atribuicoes::class,
						'salvar'
					]);
					//Remover
					Route::delete('remover', [
						C\Empresa\Atribuicoes::class,
						'remover'
					]);
				});
			});
		});
	});
});
