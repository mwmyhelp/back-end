<template>
    <div>
        <div class="container pt-5 pb-4" v-show="!show.diagrama.open">
            <div class="row pt-3">
                <div class="col-12">
                    <div class="alert alert-primary">
                        <i class="fal fa-project-diagram"></i> Diagramas são utilizados para representar uma estrutura
                        organizacional ou de um process. Pode ser aplicado a toda a empresa (<b>Geral</b>), ou a um
                        determinado departamento ou setor.
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-3">
                    <h3 class="text-gray-1 fw-300">
                        Opções:
                    </h3>
                    <div class="card">
                        <div class="card-body">

                            <div>
                                <button @click="criarDiagrama" class="btn btn-listagem">
                                    <i class="fal fa-plus me-2"></i>
                                    Adicionar Diagrama
                                </button>
                            </div>

                            <div class="mt-3 pt-3 border-top">
                                <div class="alert alert-info">
                                    Se nenhuma opção selecionada, será carregado todos os diagramas.
                                </div>
                                <label>
                                    Aplicados em: <span v-if="show.loading.filtro_estruturas"><i
                                    class="fal fa-spin fa-spinner ms-2"></i></span>
                                </label>
                                <treeselect
                                    :options="lista.filtro_geral"
                                    :multiple="true"
                                    placeholder="Filtrar estrutura"
                                    v-model="filtros.aplicada"
                                    value-consists-of="ALL"
                                >
                                </treeselect>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h3 class="text-gray-1 fw-300">
                        Diagramas da Empresa:
                    </h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label>Filtrar:</label>
                                    <input v-model="filtros.termo" type="text" class="form-control"/>
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>
                                    <button @click="lista_diagramas" class="btn btn-primary d-block">
                                        <i class="fal fa-filter me-2"></i>
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        Pg. 1 / 1
                        <button class="btn btn-listagem btn-sm">
                            <i class="fal fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-listagem btn-sm">
                            <i class="fal fa-chevron-right"></i>
                        </button>
                    </div>

                    <div>
                        <div v-if="show.loading.carregando_normativas" class="text-center pt-3">
                            <i class="fal fa-spin fa-spinner me-2"></i>
                            <h3 class="fw-200"></h3>
                            Carregando Diagramas
                        </div>
                        <ul class="list-group list-group-flush" v-for="diagrama in lista.diagramas">

                            <li class="list-group-item list-group-item-action border rounded mt-2"
                                aria-current="true">
                                <div class="d-flex align-items-center p-2">
                                    <div>
                                        <a href="#" @click="selecionarDiagrama(diagrama.id)">
                                            <i class="fal fa-book-alt me-2 text-info"></i>
                                            DG {{diagrama.gcodigo}} - {{ diagrama.titulo }}
                                        </a>
                                    </div>
                                    <div class="ms-auto">
                                        <button data-bs-toggle="collapse" :href="'#colapse-nr-'+diagrama.gcodigo"
                                                class="btn btn-sm btn-listagem">
                                            <i class="fal fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse" :id="'colapse-nr-'+diagrama.gcodigo">
                                    <div class="card card-body">
                                        <b>Esse diagrama está disponível para:</b><br/>
                                        <treeselect
                                            :options="lista.filtro_geral"
                                            :multiple="true"
                                            :disabled="true"
                                            placeholder="Nenhuma aplicação"
                                            :value="JSON.parse(diagrama.aplicado_em)"
                                            value-consists-of="ALL"
                                        >
                                        </treeselect>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>

        </div>
        <div class="container-fluid p-4" v-show="show.diagrama.open">
            <div v-show="!show.loading.carregando_diagrama">
                <div class="row ps-4">
                    <div class="col-12">
                        <h3 v-if="show.diagrama.create_mode" class="fw-300">
                            Criar novo diagrama
                        </h3>
                        <h3 v-if="show.diagrama.view_mode || show.diagrama.edit_mode" class="fw-300">
                            DG {{form.diagrama.gcodigo}} - {{form.diagrama.titulo}}
                        </h3>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <DxDiagram
                                    id="diagrama"
                                    ref="diagrama"
                                    units="cm"
                                    :read-only="show.diagrama.view_mode"
                                >
                                </DxDiagram>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <form @submit="salvarDiagrama">
                            <div class="d-flex">
                                <button :disabled="show.diagrama.view_mode" class="btn btn-primary" type="submit">
                                    <div v-if="show.loading.salvando_diagrama">
                                        <i class="fal fa-spinner fa-spin me-2"></i>
                                        Salvando...
                                    </div>
                                    <div v-if="!show.loading.salvando_diagrama">
                                        <i class="fal fa-save me-2"></i>
                                        Salvar Anterações
                                    </div>
                                </button>
                                <button :disabled="show.loading.salvando_diagrama" @click="telaInicial" class="btn btn-danger ms-auto" type="button">
                                    Voltar
                                </button>
                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <label>Disponível para:</label>

                                <treeselect
                                    :options="lista.filtro_geral"
                                    :multiple="true"
                                    :disabled="show.diagrama.view_mode"
                                    placeholder="Filtrar estrutura"
                                    v-model="form.diagrama.aplicado_em"
                                    value-consists-of="ALL"
                                >
                                </treeselect>

                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <div>
                                    <label>Numeração:</label>
                                    <input v-if="show.diagrama.create_mode" type="text" disabled value="Gerada Automaticamente" class="form-control" />
                                    <input v-if="!show.diagrama.create_mode" type="text" disabled :value="'DR '+form.diagrama.gcodigo" class="form-control" />
                                </div>
                                <div class="mt-2">
                                    <label>Identificação:</label>
                                    <input :disabled="show.diagrama.view_mode" required type="text" class="form-control"
                                           v-model="form.diagrama.titulo"/>
                                </div>
                                <div class="mt-2">
                                    <label>Descrição:</label>
                                    <textarea :disabled="show.diagrama.view_mode" class="form-control"
                                              v-model="form.diagrama.descricao"></textarea>
                                </div>
                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <div v-if="show.diagrama.view_mode" class="d-flex justify-content-end">

                                    <button @click="modo_edicao" class="btn btn-info" type="button">
                                        <i class="fal fa-pencil me-3"></i>
                                        Editar
                                    </button>

                                    <button onclick="indisponivel()" class="btn btn-outline-danger ms-auto"
                                            type="button">
                                        <i class="fal fa-trash me-3"></i>
                                        Remover
                                    </button>
                                </div>
                            </div>
                            <div v-if="show.diagrama.view_mode" class="mt-3 pt-3 border-top d-flex flex-column">
                                <small class="fw-600">
                                    Criada em:
                                </small>
                                <small class="fw-300">
                                    15/04/2021 15:09:33
                                </small>
                                <small class="fw-600">
                                    Atualizada:
                                </small>
                                <small class="fw-300">
                                    15/04/2021 15:09:33
                                </small>
                                <small class="fw-600">
                                    Revisão nº:
                                </small>
                                <small class="fw-300">
                                    01
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div v-show="show.loading.carregando_diagrama" class="text-center p-5">
                <i class="fal fa-spinner fa-spin me-2 fa-2x"></i> <h3 class="fw-200">Carregando Diagrama</h3>
            </div>
        </div>
    </div>
</template>

<script>
import {api} from "../../helpers/Request";
import DxDiagram from 'devextreme-vue/diagram';
import '../../../../node_modules/devexpress-diagram/dist/dx-diagram.min.css';
//PT-BR
import {locale, loadMessages, formatMessage} from 'devextreme/localization';
import ptMessages from "devextreme/localization/messages/pt.json";

//TreeSelect
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import BeeDoc from "../../components/BeeDoc";

export default {
    name: "modulo",
    components: {
        Treeselect,
        BeeDoc,
        DxDiagram,
    },
    data: function () {
        return {
            modal: {},
            show: {
                loading: {
                    filtro_estruturas: false,
                    carregando_normativas: true,
                    atualizando_aplicacao: false,
                    salvando_diagrama: false,
                    carregando_diagrama: false
                },
                diagrama: {
                    open: false,
                    create_mode: false,
                    edit_mode: false,
                    view_mode: false
                }
            },
            lista: {
                filtro_geral: null,
                diagramas: {}
            },
            filtros: {
                aplicada: [],
                termo: ''
            },
            selecionado: {},
            form: {
                diagrama: {
                    cod: '',
                    aplicado_em: null,
                    descricao: '',
                    json: null,
                    titulo: ''
                }
            }
        }
    },
    methods: {
        carregarFiltroEstrutura: function () {
            /** Loading **/
            this.show.loading.filtro_estruturas = true;
            //Axios
            api.get("/beeceo/geral/estrutura_empresarial_sem_cargo")
                .then((res) => {
                    this.lista.filtro_geral = res.data.dados;
                    this.show.loading.filtro_estruturas = false;
                })
                .catch((error) => {
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.filtro_estruturas = false;
                });
        },
        criarDiagrama: function () {
            //Definir modo de criação
            this.show.diagrama = _.mapValues(this.show.diagrama, () => false);
            this.show.diagrama.create_mode = true;
            //Abrir
            var diagrama = this.$refs['diagrama'].instance;
            diagrama.import('');
            this.$nextTick(function(){
                diagrama.repaint();
            });

            this.show.diagrama.open = true;
        },
        salvarDiagrama: function(e){
            e.preventDefault();
          /** Criar ou salvar? **/
          this.show.loading.salvando_diagrama = true;
          if(this.show.diagrama.edit_mode){
              //Salvar
              api.post("/beeceo/diagramas/"+this.form.diagrama.id+'/salvar',{
                  aplicado_em : JSON.stringify(this.form.diagrama.aplicado_em),
                  titulo : this.form.diagrama.titulo,
                  json : this.obter_diagrama(),
                  descricao : this.form.diagrama.descricao
              })
                  .then((res) => {
                      this.show.loading.salvando_diagrama = false;
                      this.show.diagrama = _.mapValues(this.show.diagrama, () => false);
                      this.show.diagrama.view_mode = true;
                      this.show.diagrama.open = true;
                      this.lista_diagramas();
                      //Sucesso
                      chamarSucesso("Diagrama salvo com sucesso!");
                  })
                  .catch((error) => {
                      this.show.loading.salvando_diagrama = false;
                      //Saida de outros erros
                      this.erros = tratarErroApi(error, error.response);
                  });
          }else{
              //Criar
              api.post("/beeceo/diagramas/criar",{
                  aplicado_em : JSON.stringify(this.form.diagrama.aplicado_em),
                  titulo : this.form.diagrama.titulo,
                  json : this.obter_diagrama(),
                  descricao : this.form.diagrama.descricao
              })
                  .then((res) => {
                      this.show.loading.salvando_diagrama = false;
                      this.telaInicial();
                      //Recarregar Diagramas
                      this.lista_diagramas();
                      //Sucesso
                      chamarSucesso("Diagrama criado com sucesso!");
                  })
                  .catch((error) => {
                      this.show.loading.salvando_diagrama = false;
                      //Saida de outros erros
                      this.erros = tratarErroApi(error, error.response);
                  });
          }
        },
        telaInicial: function () {
            //Definir modo de criação
            this.show.diagrama = _.mapValues(this.show.diagrama, () => false);
            this.show.diagrama.open = false;
            //Limpando Formulário
            this.form.diagrama = _.mapValues(this.form.diagrama, () => '');
            this.form.diagrama.aplicado_em = null;
        },
        obter_diagrama: function () {
            var diagrama = this.$refs['diagrama'].instance;
            return diagrama.export();
        },
        lista_diagramas: function(){
            //Carrengando
            this.show.loading.carregando_normativas = true;
            //Axios
            api.post("/beeceo/diagramas",{
                termo : this.filtros.termo,
                aplicada: this.filtros.aplicada
            })
                .then((res) => {
                    this.show.loading.carregando_normativas = false;
                    this.lista.diagramas = res.data.dados;
                })
                .catch((error) => {
                    this.show.loading.carregando_normativas = false;
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                });
        },
        selecionarDiagrama: function(id){
            /** Loading **/
            this.show.loading.carregando_diagrama = true;
            this.show.diagrama.open = true;
            /** Axios **/
            api.get("/beeceo/diagramas/"+id)
                .then((res) => {
                    this.show.loading.carregando_diagrama = false;
                    let dados = res.data.dados;
                    dados.aplicado_em = JSON.parse(dados.aplicado_em);
                    this.form.diagrama = dados;
                    //Abrir Diagrama
                    var diagrama = this.$refs['diagrama'].instance;
                    diagrama.import(this.form.diagrama.json);
                    //Definir modo de criação
                    this.show.diagrama = _.mapValues(this.show.diagrama, () => false);
                    this.show.diagrama.view_mode = true;
                    this.show.diagrama.open = true;
                })
                .catch((error) => {
                    this.show.diagrama.open = false;
                    this.show.loading.carregando_diagrama = false;
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                });
        },
        modo_edicao: function(){
            //Definir modo de criação
            this.show.diagrama = _.mapValues(this.show.diagrama, () => false);
            this.show.diagrama.edit_mode = true;
            this.show.diagrama.open = true;
        },
    },
    created() {
        this.carregarFiltroEstrutura();
        //Carregar os Diagramas
        this.lista_diagramas();
        //Deixar em portugues
        loadMessages(ptMessages);
        locale('pt');
    }
}
</script>

<style scoped>

</style>
