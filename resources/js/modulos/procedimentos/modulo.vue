<template>
    <div class="container pt-5 pb-4">
        <div class="row pt-3">
            <div class="col-12">
                <div class="alert alert-primary">
                    <i class="fal fa-books"></i> Procedimentos Operacionais podem ser <b>geral</b> quando aplicada para todos os colaboradores, ou podem pertencer a um determinado cargo ou setor. Procedimentos server para padronizar as rotinas empresariais.
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
                                <button @click="adicionarProcedimento" class="btn btn-listagem">
                                    <i class="fal fa-plus me-2"></i>
                                    Adicionar Procedimento
                                </button>
                            </div>

                            <div class="mt-3 pt-3 border-top">
                                <div class="alert alert-info">
                                    Se nenhuma opção selecionada, será carregada todas as procedimentos.
                                </div>
                                <label>
                                    Aplicadas em: <span v-if="show.loading.filtro_estruturas"><i
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
                    Procedimentos do Empresa:
                </h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <label>Filtrar:</label>
                                <input v-model="filtros.termo" type="text" class="form-control" />
                            </div>
                            <div class="col-lg-2">
                                <label>&nbsp;</label>
                                <button @click="carregarProcedimentos" class="btn btn-primary d-block">
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
                    <div v-if="show.loading.carregando_procedimentos" class="text-center pt-3">
                        <i class="fal fa-spin fa-spinner me-2"></i>
                        <h3 class="fw-200"></h3>
                        Carregando Procedimentos
                    </div>
                    <ul class="list-group list-group-flush" v-for="procedimento in lista.procedimentos">

                        <li class="list-group-item list-group-item-action border rounded mt-2"
                            aria-current="true">
                            <div class="d-flex align-items-center p-2">
                                <div>
                                    <a @click="selecionarProcedimento(procedimento)" href="#" data-bs-toggle="modal" data-bs-target="#modalProcedimento">
                                        <i class="fal fa-book-alt me-2 text-info"></i>
                                        PO {{procedimento.gcodigo}} - {{procedimento.emoji}} {{procedimento.titulo}}
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <button data-bs-toggle="collapse" :href="'#colapse-nr-'+procedimento.gcodigo" class="btn btn-sm btn-listagem">
                                        <i class="fal fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" :id="'colapse-nr-'+procedimento.gcodigo">
                                <div class="card card-body">
                                    <b>Essa procedimento está disponível para:</b><br/>
                                    <treeselect
                                        :options="lista.filtro_geral"
                                        :multiple="true"
                                        :disabled="true"
                                        placeholder="Nenhuma aplicação"
                                        :value="procedimento.aplicada_em"
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

        <div class="modal fade" id="modalProcedimento"   aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">

                        <BeeDoc ref="docprocedimento"></BeeDoc>

                    </div>
                    <div class="modal-footer d-flex align-items-center">
                        <button @click="editarProcedimento" class="btn btn-listagem">
                            <i class="fal fa-edit me-2"></i>
                            Editar
                        </button>
                        <button @click="arquivarProcedimento" class="ms-2 btn btn-listagem">
                            <i class="fal fa-archive me-2"></i>
                            Arquivar
                        </button>
                        <div class="ms-auto">
                            <button data-bs-toggle="modal" data-bs-target="#aplicacaoProcedimento" class="btn btn-listagem">
                                Aplicação do Procedimento
                            </button>
                            <button  data-bs-dismiss="modal" type="button" class="btn btn-primary">
                                Fechar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="aplicacaoProcedimento" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="fw-300 text-nowrap me-3">
                            PO {{selecionado.gcodigo}} - {{selecionado.titulo}}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            A procedimento esta sendo aplicada nos seguintes itens:
                        </div>
                        <treeselect
                            :options="lista.filtro_geral"
                            :multiple="true"
                            placeholder="Aplicar em"
                            v-model="selecionado.aplicada_em"
                            value-consists-of="ALL"
                        >
                        </treeselect>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button @click="atualizarAplicacao" type="button" class="btn btn-primary"><span v-if="show.loading.atualizando_aplicacao"><i class="fal fa-spinner fa-spin me-2"></i></span> Salvar Alterações</button>
                    </div>
                </div>
            </div>
            <button class="d-none" id="gambirra" data-bs-toggle="modal" data-bs-target="#modalProcedimento"></button>
        </div>

    </div>
</template>

<script>
import {api} from "../../helpers/Request";

//TreeSelect
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import BeeDoc from "../../components/BeeDoc";

export default {
    name: "modulo",
    components: {
        Treeselect,
        BeeDoc
    },
    data: function(){
        return {
            modal:{

            },
            show:{
              loading: {
                  filtro_estruturas : false,
                  carregando_procedimentos: true,
                  atualizando_aplicacao: false
              }
            },
            lista: {
                filtro_geral: null,
                procedimentos: {}
            },
            filtros: {
                aplicada: [],
                termo: ''
            },
            selecionado:{

            }
        }
    },
    methods: {
        adicionarProcedimento: function(){
            Vue.swal({
                ...confVisual,
                text: "Informe um titulo para a procedimento.",
                confirmButtonText : 'Criar procedimento',
                html: '<small>A numeração do procedimento é automática. </small>',
                input: 'text',
                inputPlaceholder: 'titulo do procedimento',
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        return api.post("/beeceo/procedimentos/criar",{'titulo' : titulo})
                            .then((res) => {
                                //Atualizar lista
                                this.carregarProcedimentos();
                                //Exibir procedimento para visualização e edição
                                let procedimento = res.data.dados;
                                this.selecionarProcedimento(procedimento);
                                this.$nextTick(function(){
                                    document.getElementById('gambirra').click();
                                });
                            })
                            .catch((error) => {
                                //Saida dos erros
                                tratarErroApi(error, error.response);
                                return false;
                            });
                    }else{
                        //Retornar Erro
                        Vue.swal.showValidationMessage(
                            "O título deve ter ao menos 3 caracteres."
                        );
                    }
                },
                allowOutsideClick: () => Vue.swal.isLoading()
            });
        },
        carregarFiltroEstrutura: function (){
            /** Loading **/
            this.show.loading.filtro_estruturas = true;
            //Axios
            api.get("/beeceo/geral/estrutura_empresarial_com_cargo")
                .then((res) => {
                    this.lista.filtro_geral = res.data.dados;
                    this.show.loading.filtro_estruturas = false;
                })
                .catch((error) => {
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.filtro_estruturas = false;
                });
        },
        editarProcedimento: function(){
            this.$nextTick(function(){
                this.$refs.docprocedimento.modoEdicao();
            });
        },
        carregarProcedimentos: function(){
            /** Loading **/
            this.show.loading.carregando_procedimentos = true;
            //Axios
            api.post("/beeceo/procedimentos",{termo: this.filtros.termo, aplicada: this.filtros.aplicada})
                .then((res) => {
                    const update = res.data.dados.map((item)=>{
                        item.aplicada_em = JSON.parse(item.aplicada_em);
                        return item;
                    });
                    this.lista.procedimentos = update;
                    this.show.loading.carregando_procedimentos = false;
                })
                .catch((error) => {
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.carregando_procedimentos = false;
                });
        },
        selecionarProcedimento: function(procedimento){
            this.selecionado = procedimento;
            this.$refs.docprocedimento.carregarDocumento(procedimento.id_documental);
        },
        atualizarAplicacao: function(){
            this.show.loading.atualizando_aplicacao = true;
            //Axios
            api.post("/beeceo/procedimentos/"+this.selecionado.id+"/aplicar",{aplicar_em: this.selecionado.aplicada_em})
                .then((res) => {
                    (bootstrap.Modal.getInstance(document.getElementById('aplicacaoProcedimento'))).hide();
                    this.show.loading.atualizando_aplicacao = false;
                    chamarSucesso("Aplicações atualizadas");
                })
                .catch((error) => {
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.atualizando_aplicacao = false;
                });
        },
        arquivarProcedimento: function(){
            Vue.swal({
                ...confVisual,
                icon: 'warning',
                html: "Você tem certeza que deseja arquivar a procedimento <b>PO "+this.selecionado.gcodigo+" - "+this.selecionado.titulo+"</b> ?",
                confirmButtonText : 'Sim, arquivar.',
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                        //Axios
                        return api.post("/beeceo/procedimentos/"+this.selecionado.id+"/arquivar")
                            .then((res) => {
                                //Fechar Modal
                                (bootstrap.Modal.getInstance(document.getElementById('modalProcedimento'))).hide();
                                //Atualizar listas
                                this.carregarProcedimentos();
                                //Alertar
                                chamarSucesso("Procedimento Arquivada");
                            })
                            .catch((error) => {
                                //Saida dos erros
                                tratarErroApi(error, error.response);
                                return false;
                            });

                },
                allowOutsideClick: () => Vue.swal.isLoading()
            });
        }
    },
    mounted() {
        this.carregarFiltroEstrutura();
        //Carregar as Procedimentos
        this.carregarProcedimentos();
    }
}
</script>

<style scoped>

</style>
