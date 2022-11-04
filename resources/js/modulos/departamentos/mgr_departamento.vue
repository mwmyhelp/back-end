<template>
    <div class="text-gray-1">
        <div v-if="show.loading" class="text-center">
            <i class="fal fa-spin fa-spinner fa-2x pe-2"></i>
            Carregando Departamento
        </div>
        <div v-if="!show.loading">
            <div class="d-flex align-items-center">
                <div>
                    💼 Departamentos <span v-for="(item, index) in departamento.trilhaAsc"> / <a href="#"
                                                                                                 @click="carregarDepartamento(index)">{{ item }}</a> </span>
                </div>
                <div class="ms-auto d-flex align-items-center me-3">

                    <button class="btn btn-listagem bt-sm" @click="editarDocumento">
                        <i class="fal fa-edit"></i>
                    </button>
                    <button onclick="indisponivel()" class="btn btn-listagem bt-sm">
                        <i class="fal fa-star"></i>
                    </button>

                    <div class="dropdown">
                        <button class="btn btn-sm btn-listagem dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fal fa-folder-tree"></i>
                        </button>
                        <ul class="dropdown-menu">

                            <div v-for="(item, index) in departamento.trilhaDesc">

                                <li>
                                    <a class="dropdown-item" href="#"  @click="carregarDepartamento(index)">
                                        {{item}}
                                    </a>
                                </li>
                            </div>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="#" @click="novoSubdepartamento(departamento.id, departamento.titulo)">
                                    <i class="fal fa-folder-plus me-2"></i> Departamento Secundário
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="ms-2 ps-2 border-start d-flex align-items-center">
                        <div>
                            <button class="btn btn-sm btn-listagem pe-2 ps-2 me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalSetores">
                                Setores
                            </button>
                            <button class="btn btn-sm btn-listagem pe-2 ps-2 me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalCargos">
                                Cargos
                            </button>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-sm btn-listagem dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Documentos
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fal fa-file-signature fa-fw me-2"></i>
                                        Normativas
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fal fa-books fa-fw me-2"></i>
                                        Procedimentos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fal fa-project-diagram fa-fw me-2"></i>
                                        Diagramas
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="dropdown">
                            <button class="btn btn-listagem dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a onclick="indisponivel()" class="dropdown-item" href="#">
                                        <i class="fal fa-paperclip fa-fw me-2"></i>
                                        Anexos
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a onclick="indisponivel()" class="dropdown-item" href="#">
                                        <i class="fal fa-scroll fa-fw me-2"></i>
                                        Histórico
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fal fa-user-hard-hat fa-fw me-2"></i>
                                        Colaboradores
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a onclick="indisponivel()" class="dropdown-item" href="#">
                                        <i class="fal fa-file-export fa-fw me-2"></i>
                                        Exportar
                                    </a>
                                </li>
                                <li>
                                    <a @click="arquivarDepartamento"
                                       class="dropdown-item" href="#">
                                        <i class="fal fa-archive fa-fw me-2"></i>
                                        Arquivar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-doc text-gray-2 mt-2">
                <BeeDoc ref="docref"></BeeDoc>
            </div>
        </div>


        <!-- Modais -->
        <div class="modal fade" id="modalSetores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Setores</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-primary">
                            <small>
                                <i class="fal fa-comment-exclamation me-2"></i>
                                <b>Setores</b> são subdivisões de um departamento que possuem Atribuições própias. Ou seja,
                                todo qualquer colaborador que for lotado em um determinado setor, receberá as atribuições
                                descritas no mesmo.
                            </small>
                        </div>
                        <hr/>

                        <div class="list-group">
                            <div v-if="show.loadingListaSetores" class="text-center">
                                <i class="fal fa-spinner fa-spin me-2"></i>
                                Carregando Setores
                            </div>
                            <div v-for="setor in setores" :key="setor.id">
                                <a href="#" class="list-group-item list-group-item-action" @click="selecionarSetor(setor.id);">
                                    📁 {{setor.titulo}}
                                </a>
                            </div>
                            <a @click="novoSetor" href="#" class="list-group-item list-group-item-action border-dashed">
                                ➕ Adicionar Setor
                            </a>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalCargos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cargos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-primary">
                            <small>
                                <i class="fal fa-comment-exclamation me-2"></i>
                                É necessário o cadastro dos <b>cargos</b> que podem ser ocupados neste departamento,
                                isso é necessário para a gestão de atribuições por função.
                            </small>
                        </div>
                        <hr/>
                        <div class="d-flex align-items-center flex-wrap justify-content-center">

                            <div class="list-group">
                                <div v-if="show.loadingListaCargos" class="text-center">
                                    <i class="fal fa-spinner fa-spin me-2"></i>
                                    Carregando Cargos
                                </div>
                                <div v-for="cargo in cargos" :key="cargo.id">
                                    <a href="#" class="list-group-item list-group-item-action" @click="selecionarCargo(cargo.id);">
                                        👷 {{cargo.titulo}}
                                    </a>
                                </div>
                                <a @click="novoCargo" href="#" class="list-group-item list-group-item-action border-dashed">
                                    ➕ Novo Cargo
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

import BeeDoc from "../../components/BeeDoc";
import {api, get_files_url} from "../../helpers/Request";

export default {
    name: "managerDepartamento",
    components: {
        BeeDoc
    },
    data: function () {
        return {
            show: {
                loading: false,
                loadingListaSetores: false,
                loadingListaCargos: false
            },
            departamento: {},
            setores: {},
            cargos: {}
        }
    },
    methods: {
        /** Departamento **/
        carregarDepartamento(id) {
            //Carregar Dados
            this.show.loading = true;
            /** Carregar um determinado departamento **/
            api.get("/empresa/departamentos/" + id)
                .then((res) => {
                    this.departamento = res.data.dados;
                    this.show.loading = false;
                    //Carregar outras informações
                    this.$nextTick(function(){
                        //Carregar Documento
                        this.$refs.docref.carregarDocumento(this.departamento.id_documental);
                        //Carregar Setores
                        this.carregarSetores();
                        //Carregar Cargos
                        this.carregarCargos();
                    });
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loading = false;
                });
        },
        novoSubdepartamento: function (id, titulo) {
            //Emitir chamada
            this.$emit('novoSubdepartamento', id, titulo);
        },
        arquivarDepartamento: function(){
            this.$emit('arquivarDepartamento',this.departamento.id, this.departamento.titulo)
        },
        /** Documento Departamento **/
        editarDocumento(){
            this.$nextTick(function(){
                this.$refs.docref.modoEdicao();
            });
        },
        /** Setores **/
        novoSetor: function() {
            /** Criar setor no departamento selecionado **/
            (bootstrap.Modal.getInstance(document.getElementById('modalSetores'))).hide();
            /** Chamar Swal com solicitação do titulo **/
            Vue.swal({
                ...confVisual,
                title: "Criar novo setor:",
                input: 'text',
                inputPlaceholder : 'Qual nome do setor?',
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        return api.post("/empresa/departamentos/"+this.departamento.id+"/setores/criar",{'titulo' : titulo})
                            .then((res) => {
                                chamarSucesso("Setor adicionado com sucesso.");
                                //Atualizar lista de setores
                                this.carregarSetores();
                                //Selecionar o setor criado
                                this.selecionarSetor(res.data.dados.id);
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
        carregarSetores(){
            /** Carrega os setores do departamento selecionado **/
            this.show.loadingListaSetores = true;
            /** API **/
            api.get("/empresa/departamentos/"+this.departamento.id+"/setores")
                .then((res) => {
                    //Atualizar lista de setores
                    this.setores = res.data.dados;
                    this.show.loadingListaSetores = false;
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loadingListaSetores = false;
                });
        },
        selecionarSetor: function(id){
            (bootstrap.Modal.getInstance(document.getElementById('modalSetores'))).hide();
            this.$emit('carregarSetor',id, this.departamento.id);
        },
        /** Cargos **/
        novoCargo: function() {
            /** Criar cargo no departamento selecionado **/
            (bootstrap.Modal.getInstance(document.getElementById('modalCargos'))).hide();
            /** Chamar Swal com solicitação do titulo **/
            Vue.swal({
                ...confVisual,
                title: "Criar novo cargo:",
                input: 'text',
                inputPlaceholder : 'Qual titulo do cargo?',
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        console.log(this.departamento);
                        return api.post("/empresa/departamentos/"+this.departamento.id+"/cargos/criar",{'titulo' : titulo})
                            .then((res) => {
                                chamarSucesso("Cargo adicionado com sucesso.");
                                //Atualizar lista de setores
                                this.carregarCargos();
                                //Selecionar o setor criado
                                this.selecionarCargo(res.data.dados.id);
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
        carregarCargos(){
            /** Carrega os cargoso departamento selecionado **/
            this.show.loadingListaCargos = true;
            /** API **/
            api.get("/empresa/departamentos/"+this.departamento.id+"/cargos")
                .then((res) => {
                    //Atualizar lista de cargos
                    this.cargos = res.data.dados;
                    this.show.loadingListaCargos  = false;
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loadingListaCargos  = false;
                });
        },
        selecionarCargo: function(id){
            (bootstrap.Modal.getInstance(document.getElementById('modalCargos'))).hide();
            this.$emit('carregarCargo',id, this.departamento.id);
        }
    },
    mounted() {
       // this.carregarDepartamento('c21f53ab-0fea-4d48-bcb6-183656dff76a');
    }
}
</script>

<style scoped>

</style>
