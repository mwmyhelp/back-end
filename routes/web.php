<?php

use App\Http\Controllers as C;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/** Indo */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('teste', [C\TestController::class, 'index']);

/** Rotas Privadas **/

Route::middleware('auth')->group(function(){

    Route::middleware('post.process')->group(function (){
        //Dashboard Padrão do Sistema
        Route::get('/', [C\HomeController::class, 'index'])->name('inicio');
        //Rotas para BeeContas
        Route::prefix('bee-contas')->group(function(){
           //Módulo principal
            Route::get('', [C\WebControllers\Gestor\BeeContaController::class, 'index'])->name('gestor.beeconta');
           //Criar Beeconta
            Route::get('/adicionar', [C\WebControllers\Gestor\BeeContaController::class, 'adicionar'])->name('gestor.beeconta.adicionar');
        });

        /** Rotas para o Gestor **/
        Route::prefix("gestor")->group(function(){
            //Rotas para gerenciar empresa e Beecontas
            Route::prefix('bee-contas')->group(function(){
                //Página principal
            });
            //Assumir o acesso de outra conta
            Route::get('/assumir-acesso', [C\WebControllers\Gestor\BeeContaController::class, 'assumir'])->name('gestor.assumir.acesso');
        });

        /** Acesso Principal aos Módulos do CEO */
        Route::prefix('beeceo')->group(function(){
            /** Acesso a normativas **/
            Route::get('normativas',[C\WebControllers\BeeCeo\Normativas::class,'index'])->name('beeceo.normativas');
            /** Acesso aos procedimentos operacionais **/
            Route::get('procedimentos',[C\WebControllers\BeeCeo\Procedimentos::class,'index'])->name('beeceo.procedimentos');
            /** Acesso aos diagramas **/
            Route::get('diagramas',[C\WebControllers\BeeCeo\Diagramas::class,'index'])->name('beeceo.diagramas');
        });

        /** Rotas para Departamentos **/
        Route::get('departamentos',[C\WebControllers\BeeCeo\Departamentos::class,'index'])->name('modulo.departamentos');

        /** Acesso aos Colaboradores */
        Route::prefix('colaboradores')->group(function(){
            /** Gestão */
            Route::get('gestao',[C\WebControllers\Empresa\Colaboradores::class,'gestao'])->name('modulo.colaboradores.gestao');
            /** Info */
            Route::get('info',[C\WebControllers\Empresa\Colaboradores::class,'info'])->name('modulo.colaboradores.info');
        });



        /** Rotas para o Cliente **/
        Route::prefix("cliente")->group(function(){
            //Rotas para gerenciar Departamentos
            Route::prefix('departamentos')->group(function () {
                                //Página Principal
                Route::get('', [C\Cliente\Departamentos::class, 'index'])->name('cliente.departamentos');
                //Adicionar
                Route::get('/adicionar', [C\Cliente\Departamentos::class, 'adicionar'])->name('cliente.departamentos.adicionar');
                Route::post('/criar', [C\Cliente\Departamentos::class, 'criar'])->name('cliente.departamentos.criar');
                //Informações
                Route::prefix('{id_departamento}')->group(function () {
                    //Principal
                    Route::get('', [C\Cliente\Departamentos::class, 'info'])->name('cliente.departamentos.info');
                    //Editar
                    Route::get('/editar', [C\Cliente\Departamentos::class, 'editar'])->name('cliente.departamentos.editar');
                    Route::post('/salvar', [C\Cliente\Departamentos::class, 'salvar'])->name('cliente.departamentos.salvar');
                    //Gerenciar Cargos
                    Route::prefix('cargos')->group(function () {
                        //Principal
                        Route::get('', [C\Cliente\Cargos::class, 'index'])->name('cliente.cargos');
                        Route::get('/adicionar', [C\Cliente\Cargos::class, 'adicionar'])->name('cliente.cargos.adicionar');
                        Route::post('/criar', [C\Cliente\Cargos::class, 'criar'])->name('cliente.cargos.criar');
                        //Informações
                        Route::prefix('{id_cargo}')->group(function () {
                            //Principal
                            Route::get('', [C\Cliente\Cargos::class, 'info'])->name('cliente.cargos.info');
                            Route::get('/editar', [C\Cliente\Cargos::class, 'editar'])->name('cliente.cargos.editar');
                            Route::post('/salvar', [C\Cliente\Cargos::class, 'salvar'])->name('cliente.cargos.salvar');
                        });
                    });
                    //Gerenciar Setores
                    Route::prefix('setores')->group(function () {
                        //Principal
                        Route::get('', [C\Cliente\Setores::class, 'index'])->name('cliente.setores');
                        Route::get('/adicionar', [C\Cliente\Setores::class, 'adicionar'])->name('cliente.setores.adicionar');
                        Route::post('/criar', [C\Cliente\Setores::class, 'criar'])->name('cliente.setores.criar');
                        //Informações
                        Route::prefix('{id_setor}')->group(function () {
                            //Principal
                            Route::get('', [C\Cliente\Setores::class, 'info'])->name('cliente.setores.info');
                            Route::get('/editar', [C\Cliente\Setores::class, 'editar'])->name('cliente.setores.editar');
                            Route::post('/salvar', [C\Cliente\Setores::class, 'salvar'])->name('cliente.setores.salvar');
                        });
                    });
                    //Colaboradores
                    Route::get('colaboradores', [C\Cliente\Departamentos::class, 'colaboradores'])->name('cliente.departamentos.colaboradores');
                    //Definir Lider
                    Route::post('/lider', [C\Cliente\Departamentos::class, 'lider'])->name('cliente.departamentos.lider');
                    //Definir Coordenador
                    Route::post('/coordenador', [C\Cliente\Departamentos::class, 'coordenador'])->name('cliente.departamentos.coordenador');
                });
            });
            //Rotas para gerenciar Colaboradores
            Route::prefix('colaboradores')->group(function(){
               //Tela Principal
                Route::get('', [C\Cliente\Colaboradores::class, 'index'])->name('cliente.colaboradores');
               //Adicionar
                Route::get('/adicionar', [C\Cliente\Colaboradores::class, 'adicionar'])->name('cliente.colaboradores.adicionar');
               //Criar
                Route::post('/criar', [C\Cliente\Colaboradores::class, 'criar'])->name('cliente.colaboradores.criar');
               //Especificas para um colab
                Route::prefix('{id_colab}')->group(function(){
                    //Detalhes do Colaborador
                    Route::get('', [C\Cliente\Colaboradores::class, 'detalhes'])->name('cliente.colaboradores.detalhes');
                    //Salvar
                    Route::post('salvar', [C\Cliente\Colaboradores::class, 'salvar'])->name('cliente.colaboradores.salvar');
                    //Ocupar Cargo
                    Route::post('ocuparCargo', [C\Cliente\Colaboradores::class, 'ocuparCargo'])->name('cliente.colaboradores.ocupar.cargo');
                    //Route Desocupar
                    Route::get('desocuparCargo', [C\Cliente\Colaboradores::class, 'desocuparCargo'])->name('cliente.colaboradores.ocupar.desocupar');
               });
            });
            //Rotas para Atribuições
            /** As atribuições existem em vários locais, por esse motivo temos um controle próprio delas. **/
            Route::prefix('atribuicoes')->group(function(){
                //Adicionar Atribuição
                Route::post('adicionar', [C\Cliente\Atribuicoes::class, 'adicionar'])->name('cliente.atribuicoes.adicionar');
                //Editar Atribuição
                Route::post('editar', [C\Cliente\Atribuicoes::class, 'editar'])->name('cliente.atribuicoes.editar');
                //Remover Atribuição
                Route::get('{id_att}/remover', [C\Cliente\Atribuicoes::class, 'remover'])->name('cliente.atribuicoes.remover');
            });
            //Rotas para normativas
            Route::prefix('normativas')->group(function(){
                //Principal
                Route::get('', [C\WebControllers\BeeCeo\Normativas::class, 'index'])
                    ->name('ceo.normativas.principal');
                //Adicionar Normativa
                Route::get('adicionar', [C\WebControllers\BeeCeo\Normativas::class, 'adicionar'])
                    ->name('ceo.normativas.adicionar');
                //Salvar Normativa
                Route::post('criar', [C\WebControllers\BeeCeo\Normativas::class, 'salvar'])
                    ->name('ceo.normativas.criar');
                //Especifico
                Route::prefix('{id_normativa}')->group(function(){
                    //Editar
                    Route::get('editar', [C\WebControllers\BeeCeo\Normativas::class, 'editar'])
                        ->name('ceo.normativas.editar');
                    //Salvar
                    Route::post('salvar', [C\WebControllers\BeeCeo\Normativas::class, 'salvar'])
                        ->name('ceo.normativas.salvar');
                });
            });
            //Rotas para procedimentos
            Route::prefix('procedimentos')->group(function(){
                //Principal
                Route::get('', [C\WebControllers\BeeCeo\Procedimentos::class, 'index'])
                    ->name('ceo.procedimentos.principal');
                //Adicionar Normativa
                Route::get('adicionar', [C\WebControllers\BeeCeo\Procedimentos::class, 'adicionar'])
                    ->name('ceo.procedimentos.adicionar');
                //Salvar Normativa
                Route::post('criar', [C\WebControllers\BeeCeo\Procedimentos::class, 'salvar'])
                    ->name('ceo.procedimentos.criar');
                //Especifico
                Route::prefix('{id_procedimento}')->group(function(){
                    //Editar
                    Route::get('editar', [C\WebControllers\BeeCeo\Procedimentos::class, 'editar'])
                        ->name('ceo.procedimentos.editar');
                    //Salvar
                    Route::post('salvar', [C\WebControllers\BeeCeo\Procedimentos::class, 'salvar'])
                        ->name('ceo.procedimentos.salvar');
                });
            });
        });

    });

});

/** Get Files */

/**
 * Rotas para acesso de arquivos
 */

//Acesso ao arquivo e retorno via response.
Route::get('filemanager/uploads/{caminho}',[C\WebControllers\Storage\AcessoArquivos::class,'acessar'])->where('caminho', '.*')->name('files.get');
//Acesso ao arquivo e retorno via download.
Route::get('arquivos/download/{caminho}',[C\WebControllers\Storage\AcessoArquivos::class,'baixar'])->where('caminho', '.*')->name('files.download');

Auth::routes();

Route::get('/sair',function(){
    Auth::logout();
    return redirect(route('filemanager.base_route'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
