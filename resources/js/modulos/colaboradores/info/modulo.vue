<template>
    <div class="container pt-5 pb-4">

        <div v-if="show.loadingPage">
            <div class="text-center mt-3 pt-3">
                <i class="fal fa-spinner fa-spin me-3"></i>
                <h3 class="fw-300"></h3>
                Carregando Informações
            </div>
        </div>
        <div v-if="!show.loadingPage && show.infoUser">
            <div class="row pt-3">
                <div class="col-lg-8">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="fal fa-flag me-2"></i>
                        Nenhuma notificação a ser exibida.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <h3 class="text-gray-1 fw-300 d-flex">
                        Exercício:
                        <div class="ms-auto" v-if="perm != '5784'">
                            <button class="btn btn-sm btn-listagem"  data-bs-toggle="modal" data-bs-target="#novoCargo">
                                Associar a um novo cargo.
                            </button>
                        </div>
                    </h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center p-3" v-if="show.carregandoPapeis">
                                <i class="fal fa-2x fa-spin fa-spinner me-3"></i>
                                <h3 class="fw-200">
                                    Carregando os cargos ocupados...
                                </h3>
                            </div>
                            <div v-if="!show.carregandoPapeis">
                                <ul class="list-group list-group-flush" v-for="papel in papeis">
                                    <li class="list-group-item list-group-item-action d-flex align-items-center border-top"
                                        aria-current="true">
                                        <div class="descricao d-flex flex-column ms-4">
                                            <b>{{papel.cargo.titulo}}</b>
                                            <small class="text-muted">
                                                <b>{{papel.cargo.departamento.titulo}}</b>
                                            </small>
                                            <small class="text-muted">
                                                <div v-if="papel.cargo.setor">
                                                    {{papel.cargo.setor.titulo}}
                                                </div>
                                            </small>
                                        </div>


                                        <div class="status ms-auto mb-auto d-flex flex-column g-3 align-items-stretch">

                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-outline-primary dropdown-toggle w-100" href="#"
                                                   role="button"
                                                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fal fa-file-alt me-2"></i> Documentos
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li>
                                                        <a @click="exibirListaDocumentos('atribuicao',papel.atribuicoes)" class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Atribuições
                                                        </span>
                                                            <small class="text-muted ms-auto">
                                                                {{Object.keys(papel.atribuicoes).length}}
                                                            </small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a @click="exibirListaDocumentos('procedimento',papel.procedimentos)" class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Procedimentos
                                                        </span>
                                                            <small class="text-muted ms-auto">
                                                                {{Object.keys(papel.procedimentos).length}}
                                                            </small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a @click="exibirListaDocumentos('normativa',papel.normativas)" class="dropdown-item d-flex align-items-center" href="#">
                                                        <span>
                                                            Normativas
                                                        </span>
                                                            <small class="text-muted ms-auto">
                                                                {{Object.keys(papel.normativas).length}}
                                                            </small>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div v-if="perm != '5784'">
                                                <button @click="desocuparCargo(papel.cargo.id)" class="btn btn-sm mt-2 btn-outline-danger w-100">
                                                    <i class="fal fa-unlink me-2"></i> Desassociar
                                                </button>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-gray-1 fw-300 mt-3">
                        Documentação:
                    </h3>

                    <div v-if="!show.carregandoDocumentos">
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action border rounded"
                                    aria-current="true">
                                    <div class="d-flex align-items-center p-2">
                                        <a href="#" @click="exibirListaDocumentos('atribuicao',meusDocumentos.atribuicoes)">
                                            <div>
                                                <i class="fal fa-list-ul me-2 text-info"></i>
                                                Minhas Atribuições
                                            </div>
                                        </a>
                                        <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        {{ Object.keys(meusDocumentos.atribuicoes).length }}
                                    </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item list-group-item-action border rounded mt-2"
                                    aria-current="true">
                                    <div class="d-flex align-items-center p-2">
                                        <a href="#" @click="exibirListaDocumentos('normativa',meusDocumentos.normativas)">
                                            <div>
                                                <i class="fal fa-book-alt me-2 text-info"></i>
                                                Normativas
                                            </div>
                                        </a>
                                        <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                       {{ Object.keys(meusDocumentos.normativas).length }}
                                    </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item list-group-item-action border rounded mt-2"
                                    aria-current="true">
                                    <div class="d-flex align-items-center p-2">
                                        <a href="#" @click="exibirListaDocumentos('procedimento',meusDocumentos.procedimentos)">
                                            <div>
                                                <i class="fal fa-tasks-alt me-2 text-info"></i>
                                                Procedimentos Operacionais
                                            </div>
                                        </a>
                                        <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        {{ Object.keys(meusDocumentos.procedimentos).length }}
                                    </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item list-group-item-action border rounded mt-2"
                                    aria-current="true">
                                    <div class="d-flex align-items-center p-2">
                                        <a href="#" @click="exibirListaDocumentos('diagrama',meusDocumentos.diagramas)">
                                            <div>
                                                <i class="fal fa-project-diagram me-2 text-info"></i>
                                                Diagramas
                                            </div>
                                        </a>
                                        <div class="ms-auto">
                                    <span class="text-primary fw-600">
                                        {{ Object.keys(meusDocumentos.diagramas).length }}
                                    </span>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="text-center p-3" v-if="show.carregandoDocumentos">
                        <i class="fal fa-2x fa-spin fa-spinner me-3"></i>
                        <h3 class="fw-200">
                            Carregando os documentos...
                        </h3>
                    </div>

                </div>
                <div class="col-lg-4">
                    <h3 class="text-gray-1 fw-300">
                        Informações:
                    </h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar mb-auto pe-5 ps-5">
                                <img :src="get_files_url+colab.usuario.imagem_perfil"
                                     class="img-thumbnail rounded-circle wp-200"/>
                            </div>
                            <div class="mt-3 d-flex flex-column align-items-center">
                                <span class="fw-500">
                                    {{ colab.nome }} {{ colab.sobrenome }}
                                </span>
                                <span class="text-muted">
                                    {{ colab.cpf }}
                                </span>
                                <div v-if="colab.tipo_acesso == 'beelider'" class="badge bg-warning text-dark">
                                    <i class="fal fa-star me-2"></i>
                                    BeeLíder
                                </div>
                                <div v-if="colab.tipo_acesso == 'gestor'" class="badge bg-primary text-white">
                                    <i class="fal fa-head-side-brain me-2"></i>
                                    Gestor
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <b>Chefia Imediata:</b>
                                <div v-if="this.colab.chefe">
                                    <div v-if="perm != '5784'">
                                        <a :href="'/colaboradores/info?view&colab='+this.colab.chefia_imediata">
                                            {{this.colab.chefe.nome}} {{this.colab.chefe.sobrenome}}
                                        </a>
                                    </div>
                                    <div v-if="perm == '5784'">

                                            {{this.colab.chefe.nome}} {{this.colab.chefe.sobrenome}}

                                    </div>
                                </div>
                            </div>
                            <div class="border-top mt-2 pt-2">
                                <div class="d-flex flex-column">
                                    <small class="fw-600">
                                        Telefone Celular:
                                    </small>
                                    <span class="text-muted">
                                    {{ colab.pessoa_fisica.telefone_celular }}
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2">
                                    <small class="fw-600">
                                        Email:
                                    </small>
                                    <span class="text-muted">
                                    {{ colab.usuario.email }}
                                    </span>
                                </div>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <div class="d-flex flex-column">
                                    <small class="fw-600">
                                        Nascimento:
                                    </small>
                                    <span class="text-muted">
                                    {{ colab.pessoa_fisica.nascimento }} (?? anos)
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2">
                                    <small class="fw-600">
                                        Estado Civil:
                                    </small>
                                    <span class="text-muted">
                                    {{ colab.estado_civil }}
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2">
                                    <small class="fw-600">
                                        Tipo Sanguíneo:
                                    </small>
                                    <span class="text-muted">
                                    {{ colab.tipo_sanguineo }}
                                    </span>
                                </div>
                            </div>

                            <div class="border-top mt-2 pt-2">
                                <div v-if="perm == '7946' || perm == '1346'">
                                    <button @click="unsetBeeLider" class="btn btn-warning w-100 mb-3" v-if="colab.usuario.tipo == 'bee_lider'">
                                        🐝 Remover de BeeLíder
                                    </button>
                                    <button @click="setBeeLider" class="btn btn-success w-100 mb-3" v-if="colab.usuario.tipo != 'bee_lider'">
                                        🐝 Definir como BeeLíder
                                    </button>
                                </div>

                                <button @click="resetarSenha(colab.id_usuario,colab.nome+' '+colab.sobrenome)" class="btn btn-outline-info w-100">
                                    <i class="fal fa-key-skeleton me-3"></i>
                                    Redefinir Senha
                                </button>
                                <div v-if="perm != '5784'">
                                    <button onclick="indisponivel()" class="btn btn-outline-danger mt-2 w-100">
                                        <i class="fal fa-ban me-3"></i>
                                        Bloquear Acesso
                                    </button>
                                    <button @click="() => {chamarAviso('Para essa ação, entre em contato com o suporte.')}" class="btn btn-danger mt-4 w-100">
                                        <i class="fal fa-trash me-3"></i>
                                        Remover Colaborador
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="listaDocumentos" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{tituloLista}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group" v-for="(txt, id) in listaDocumentos">
                            <a href="#" @click="exibirDocumento(id,txt)" class="list-group-item list-group-item-action" aria-current="true">
                                <i :class="iconeLista"></i> {{txt}}
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="gambirraListaDocumentos" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#listaDocumentos">
            X
        </button>
        <div class="modal fade" id="exibirDocumento" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex">
                            {{tituloDocumento}}
                            <button @click="editarDocumento" class="btn btn-sm btn-listagem" v-show="!show.sDiagrama && perm != '5784'">
                                <i class="fal fa-pencil me-2"></i>
                                Editar
                            </button>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-show="show.sDiagrama">
                            <div class="text-center p-3" v-show="show.loading.carregando_diagrama">
                                <i class="fal fa-spin fa-spinner me-2"></i>Carregando Diagrama
                            </div>
                            <div v-show="!show.loading.carregando_diagrama">
                                <DxDiagram
                                    id="diagrama"
                                    ref="diagrama"
                                    units="cm"
                                    :read-only="true"
                                >
                                </DxDiagram>
                            </div>
                        </div>
                        <div v-show="!show.sDiagrama">
                            <bee-doc ref="docref">
                            </bee-doc>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="gambirraExibirDocumento" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exibirDocumento">
            X
        </button>
        <div class="modal fade" id="novoCargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Nova Associação de Cargo
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Selecione um cargo abaixo: <span v-if="show.loading.posicoes"><i
                        class="fal fa-spin fa-spinner me-2"></i> <small>carregando...</small></span>
                        <treeselect
                            :multiple="false"
                            :options="lista.posicoes"
                            placeholder="Selecione..."
                            v-model="cargoSelecionado"
                            :disable-branch-nodes="true"
                            :show-count="true"
                        >
                        </treeselect>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button :disabled="show.loading.salvandoCargo" @click="ocuparCargo" type="button" class="btn btn-primary">
                            <div v-if="show.loading.salvandoCargo">
                                <i class="fal fa-spin fa-spinner me-2"></i>
                                Salvando...
                            </div>
                            <div v-if="!show.loading.salvandoCargo">
                                Salvar
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import queryString from 'querystring';
import {api, get_files_url} from "../../../helpers/Request";
import BeeDoc from "../../../components/BeeDoc";
//TreeSelect
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

import DxDiagram from 'devextreme-vue/diagram';
import '../../../../../node_modules/devexpress-diagram/dist/dx-diagram.min.css';
//PT-BR
import {locale, loadMessages, formatMessage} from 'devextreme/localization';
import ptMessages from "devextreme/localization/messages/pt.json";

export default {
    name: "modulo",
    components: {BeeDoc,Treeselect,DxDiagram},
    data: function () {
        return {
            get_files_url,
            perm:'',
            show: {
                loadingPage: true,
                infoUser : false,
                carregandoPapeis : true,
                carregandoDocumentos: true,
                loading:{
                    posicoes: false,
                    salvandoCargo: false,
                    carregando_diagrama: false
                },
                sDiagrama: false,
            },
            lista: {
                posicoes: null
            },
            cargoSelecionado: null,
            colab: null,
            papeis: {},
            listaDocumentos: {},
            tituloLista: {},
            iconeLista: {},
            tituloDocumento: '',
            meusDocumentos: {}
        }
    },
    methods: {
        resetarSenha: function (id, nome) {

            Vue.swal({
                ...confVisual,
                ...confAviso,
                html: "Você tem certeza que deseja resetar a senha de <b>" + nome + "</b>?",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {

                    //Axios
                    return api.post("/sistema/usuarios/resetarsenha", {'usuario': id})
                        .then((res) => {
                            console.log(res);
                            chamarSucesso(res.data.msg);
                        })
                        .catch((error) => {
                            //Saida dos erros
                            tratarErroApi(error, error.response);
                            return false;
                        });

                },
                allowOutsideClick: () => Vue.swal.isLoading()
            });
        },
        carregarPapeis: function(){
            /** Loading **/
            this.show.carregandoPapeis = true;
            //Axios
            api.get("/empresa/colaboradores/"+this.colab.id+"/cargosOcupados")
                .then((res) => {
                    //Acolher
                    this.papeis = res.data.dados;
                    //Exibir
                    this.show.carregandoPapeis = false;
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    return false;
                });
        },
        carregarMeusDocumentos: function(){
            /** Loading **/
            this.show.carregandoDocumentos = true;
            //Axios
            api.get("/empresa/colaboradores/"+this.colab.id+"/documentos")
                .then((res) => {
                    //Acolher
                    this.meusDocumentos = res.data.dados;
                    //Exibir
                    this.show.carregandoDocumentos = false;
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    return false;
                });
        },
        ocuparCargo: function(){
            this.show.loading.salvandoCargo = true;
            var ids = this.cargoSelecionado;
            ids = ids.replace('_cargo_','');
            ids = ids.replace('_','');
            api.post("/empresa/colaboradores/"+this.colab.id+"/ocuparCargo", {'id_cargo': ids})
                .then((res) => {
                    chamarSucesso(res.data.msg);
                    this.carregarMeusDocumentos();
                    this.carregarPapeis();
                    this.show.loading.salvandoCargo = false;
                    (bootstrap.Modal.getInstance(document.getElementById('novoCargo'))).hide();
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loading.salvandoCargo = false;
                });
        },
        desocuparCargo: function(id){
            Vue.swal({
                ...confVisual,
                ...confAviso,
                html: "Você tem certeza que deseja desassociar o colaborador ao cargo?",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {

                    //Axios
                    return api.post("/empresa/colaboradores/"+this.colab.id+"/desocuparCargo", {'id_cargo': id})
                        .then((res) => {
                            chamarSucesso(res.data.msg);
                            this.carregarMeusDocumentos();
                            this.carregarPapeis();
                        })
                        .catch((error) => {
                            //Saida dos erros
                            tratarErroApi(error, error.response);
                            return false;
                        });

                },
                allowOutsideClick: () => Vue.swal.isLoading()
            });
        },
        exibirListaDocumentos: function(tipo, lista){
            if(Object.keys(lista).length > 0){
                //Carregando Lista
                this.listaDocumentos = lista;
                if(tipo == 'atribuicao'){
                    this.tituloLista = "Lista de Atribuições";
                    this.iconeLista = "fal fa-tasks me-2";
                }
                if(tipo == 'normativa'){
                    this.iconeLista = "fal fa-file-signature me-2";
                    this.tituloLista = "Lista de Normativas";

                }
                if(tipo == 'procedimento'){
                    this.tituloLista = "Lista de Procedimentos";
                    this.iconeLista = "fal fa-books me-2";
                }
                if(tipo == 'diagrama'){
                    this.tituloLista = "Lista de Diagramas";
                    this.iconeLista = "fal fa-project-diagram me-2";
                }
                //Abrindo Modal
                document.getElementById('gambirraListaDocumentos').click();
            }
        },
        exibirDocumento: function(id, titulo){
            var tipo = titulo.substring(0,2);
            this.tituloDocumento = titulo;
            console.log(tipo);
            //Tipo do Documento
            if(tipo == 'DG'){
                //Diagrama
                this.show.sDiagrama = true;
                this.selecionarDiagrama(id);
            }else{
                //Documento
                this.show.sDiagrama = false;
                this.$refs.docref.carregarDocumento(id);
            }
            //Abrindo Modal
            document.getElementById('gambirraExibirDocumento').click();
        },
        editarDocumento: function(){
            this.$refs.docref.modoEdicao();
        },
        selecionarDiagrama: function(id){
            /** Loading **/
            this.show.loading.carregando_diagrama = true;
            /** Axios **/
            api.get("/beeceo/diagramas/"+id)
                .then((res) => {
                    this.show.loading.carregando_diagrama = false;
                    let dados = res.data.dados;
                    //Abrir Diagrama
                    var diagrama = this.$refs['diagrama'].instance;
                    diagrama.import(dados.json);
                    this.$nextTick(function(){
                        diagrama.repaint();
                    });
                })
                .catch((error) => {
                    this.show.loading.carregando_diagrama = false;
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                });
        },
        setBeeLider:function(){
            Vue.swal({
                ...confVisual,
                ...confAviso,
                html: "Tem certeza que deseja definir <b>" + this.colab.nome + "</b> como um BeeLíder?",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {

                    //Axios
                    return api.post("/empresa/colaboradores/"+this.colab.id+"/defBeeLider")
                        .then((res) => {
                            this.colab.usuario.tipo = 'bee_lider';
                            chamarSucesso(res.data.msg);
                        })
                        .catch((error) => {
                            //Saida dos erros
                            tratarErroApi(error, error.response);
                            return false;
                        });

                },
                allowOutsideClick: () => Vue.swal.isLoading()
            });
        },
        unsetBeeLider:function(){
            Vue.swal({
                ...confVisual,
                ...confAviso,
                html: "Tem certeza que deseja remover a permissão de <b>" + this.colab.nome + "</b> como um BeeLíder?",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {

                    //Axios
                    return api.post("/empresa/colaboradores/"+this.colab.id+"/remBeeLider")
                        .then((res) => {
                            this.colab.usuario.tipo = 'colaborador';
                            chamarSucesso(res.data.msg);
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
    created() {
        this.perm = document.querySelector('meta[name="utkp"]').content;

        //Deixar em portugues
        loadMessages(ptMessages);
        locale('pt');

        let vars = queryString.parse(location.search);
        if(vars.colab){
            this.show.loadingPage = true;
            //Axios
            api.get("/empresa/colaboradores/"+vars.colab)
                .then((res) => {
                    //Acolher
                    this.colab = res.data.dados;
                    console.log(this.colab);
                    //Exibir
                    this.show.loadingPage = false;
                    this.show.infoUser = true;
                    //Carregar Papeis
                    this.carregarPapeis();
                    this.carregarMeusDocumentos();
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    return false;
                });
            //Carregar Lista de Posições
            this.show.loading.posicoes = true;
            api.get("/beeceo/geral/estrutura_papeis")
                .then((res) => {
                    this.lista.posicoes = res.data.dados;
                    this.show.loading.posicoes = false;
                })
                .catch((error) => {
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.posicoes = false;
                });
        }else{
            chamarErro("Erro na requisição, tente trocar de página.");
        }
    }
}
</script>

<style scoped>

</style>
