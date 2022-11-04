<template>
    <div class="text-gray-1">
        <div v-if="show.loading" class="text-center">
            <i class="fal fa-spin fa-spinner fa-2x pe-2"></i>
            Carregando Cargo
        </div>
        <div v-if="!show.loading">
            <div class="d-flex align-items-center">
                <div>
                    💼 Departamentos <span v-for="(item, index) in cargo.trilhaAsc"> / <a href="#"
                                                                                          @click="carregarDepartamento(index)">{{
                        item
                    }}</a> </span>
                    / 👷 {{ cargo.titulo }}
                </div>
                <div class="ms-auto d-flex align-items-center me-3">

                    <button class="btn btn-listagem bt-sm" @click="editarDocumento">
                        <i class="fal fa-edit"></i>
                    </button>
                    <button class="btn btn-listagem bt-sm">
                        <i class="fal fa-star"></i>
                    </button>

                    <div class="ms-2 ps-2 border-start d-flex align-items-center">
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
                                    <a class="dropdown-item" href="#">
                                        <i class="fal fa-paperclip fa-fw me-2"></i>
                                        Anexos
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
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
                                    <a class="dropdown-item" href="#">
                                        <i class="fal fa-file-export fa-fw me-2"></i>
                                        Exportar
                                    </a>
                                </li>
                                <li>
                                    <a @click="arquivarCargo(cargo.id,cargo.titulo)"
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
                <div class="d-flex">
                    <div class="ms-auto">
                        <button class="btn btn-sm btn-listagem me-3" @click="tipoCargo">
                            <div v-if="cargo.permissao == 'padrao'">
                                <b>Gestor: </b>Não
                            </div>
                            <div v-if="cargo.permissao == 'lider'">
                                <b>Gestor: </b>Líder
                            </div>
                            <div v-if="cargo.permissao == 'coordenador'">
                                <b>Gestor: </b>Coordenador
                            </div>
                        </button>
                        <button :disabled="show.botaoSetor" class="btn btn-sm btn-listagem" @click="definirSetor">
                            <div v-if="cargo.setor">
                               <b>Setor: </b> {{cargo.setor.titulo}}
                            </div>
                            <div v-if="!cargo.setor">
                                Não participa de nenhum setor
                            </div>
                        </button>
                    </div>
                </div>
                <BeeDoc ref="docref"></BeeDoc>
            </div>
        </div>

    </div>
</template>

<script>

import BeeDoc from "../../components/BeeDoc";
import {api, get_files_url} from "../../helpers/Request";

export default {
    name: "managerCargo",
    components: {
        BeeDoc
    },
    data: function () {
        return {
            show: {
                loading: false,
                botaoSetor: true
            },
            cargo: {},
            setores: {}
        }
    },
    methods: {
        /** Cargo **/
        carregarCargo(id, dep) {
            //Carregar Dados
            this.show.loading = true;
            /** Carregar um determinado departamento **/
            api.get("/empresa/departamentos/" + dep + "/cargos/" + id)
                .then((res) => {
                    this.cargo = res.data.dados;
                    console.log(this.cargo);
                    this.show.loading = false;
                    //Carregar outras informações
                    this.$nextTick(function () {
                        //Carregar Documento
                        this.$refs.docref.carregarDocumento(this.cargo.id_documental);
                    });
                    /** Carregar os Setores para alteração **/
                    api.get("/empresa/departamentos/"+this.cargo.id_departamento+"/setores")
                        .then((res) => {
                            //Atualizar lista de setores
                            var setores = {
                                'nenhum' : 'Nenhum Setor'
                            };
                            res.data.dados.map(function(item){
                               setores[item.id] = item.titulo;
                            });
                            this.setores = setores;
                            this.show.botaoSetor = false;
                        })
                        .catch((error) => {
                            //Saida dos erros
                            tratarErroApi(error, error.response);
                        });
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loading = false;
                });
        },
        /** Documento Setor **/
        editarDocumento() {
            this.$nextTick(function () {
                this.$refs.docref.modoEdicao();
            });
        },
        carregarDepartamento: function (id) {
            this.$emit('carregarDepartamento', id);
        },
        tipoCargo: function () {
            Vue.swal({
                ...confVisual,
                title: "Deseja alterar o tipo do cargo",
                input: 'select',
                inputOptions: {
                    padrao: 'Padrão (Comum)',
                    lider: 'Líder',
                    coordenador: 'Coordenador'
                },
                inputValue: this.cargo.permissao,
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (tipo) => {

                        //Axios
                        return api.post("/empresa/departamentos/" + this.cargo.id_departamento + "/cargos/" + this.cargo.id + '/tipo',
                            {'tipo': tipo})
                            .then((res) => {
                                chamarSucesso("Permissões atualizadas.");
                                this.cargo.permissao = tipo;
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
        definirSetor: function(){
            if(this.cargo.setor){
                var value = this.cargo.setor.id;
            }else{
                var value = 'nenhum';
            }
            Vue.swal({
                ...confVisual,
                title: "Deseja definir um setor para este cargo?",
                input: 'select',
                inputOptions: this.setores,
                inputValue: value,
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (id) => {

                    //Axios
                    return api.post("/empresa/departamentos/" + this.cargo.id_departamento + "/cargos/" + this.cargo.id + '/setor',
                        {'id_setor': id})
                        .then((res) => {
                            chamarSucesso("Setor atualizado com sucesso");
                            this.cargo.setor = res.data.dados.setor;
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
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
