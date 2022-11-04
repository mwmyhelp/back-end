<template>
    <div class="text-gray-1">
        <div v-if="show.loading" class="text-center">
            <i class="fal fa-spin fa-spinner fa-2x pe-2"></i>
            Carregando Setor
        </div>
        <div v-if="!show.loading">
            <div class="d-flex align-items-center">
                <div>
                    💼 Departamentos <span v-for="(item, index) in setor.trilhaAsc"> / <a href="#"
                                                                                                 @click="carregarDepartamento(index)">{{ item }}</a> </span>
                    / 📁 {{setor.titulo}}
                </div>
                <div class="ms-auto d-flex align-items-center me-3">

                    <button class="btn btn-listagem bt-sm" @click="editarDocumento">
                        <i class="fal fa-edit"></i>
                    </button>
                    <button onclick="indisponivel()" class="btn btn-listagem bt-sm">
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
                                    <a @click="arquivarSetor(setor.id,setor.titulo)"
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

    </div>
</template>

<script>

import BeeDoc from "../../components/BeeDoc";
import {api, get_files_url} from "../../helpers/Request";

export default {
    name: "managerSetor",
    components: {
        BeeDoc
    },
    data: function () {
        return {
            show: {
                loading: false
            },
            setor: {},
        }
    },
    methods: {
        /** Setor **/
        carregarSetor(id, dep) {
            //Carregar Dados
            this.show.loading = true;
            /** Carregar um determinado departamento **/
            api.get("/empresa/departamentos/"+dep+"/setores/"+id)
                .then((res) => {
                    this.setor = res.data.dados;
                    this.show.loading = false;
                    //Carregar outras informações
                    this.$nextTick(function(){
                        //Carregar Documento
                        this.$refs.docref.carregarDocumento(this.setor.id_documental);
                    });
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loading = false;
                });
        },
        /** Documento Setor **/
        editarDocumento(){
            this.$nextTick(function(){
                this.$refs.docref.modoEdicao();
            });
        },
        carregarDepartamento: function(id){
            this.$emit('carregarDepartamento',id);
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
