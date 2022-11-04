
<template>
    <div>
       <div v-if="show.loading" class="text-center">
           <i class="fa-spinner fal fa-spin fa-2x me-3"></i>
           Carregando Documento
       </div>
       <div v-if="!show.loading && !show.editMode">
            <div v-if="doc.url_capa">
                <img class="doc-capa" src="https://via.placeholder.com/900x160/AAB6C8/808080%20?Text=BeeUser" />
            </div>
            <h3 class="fw-300">{{doc.emoji}} {{doc.titulo}}</h3>
            <div class="d-flex align-items-center doc-crt">
                <div class="img">
                    <img :src="get_files_url+doc.autor.imagem_perfil"/>
                </div>
                <div class="txt">
                    Criado por {{doc.autor.name}}<br/>
                    Atualizado em: {{ doc.updated_at }}
                </div>
            </div>
            <div class="doc-html">
                <div v-if="doc.tipo == 'atribuicao_setor'">
                    <h4 class="fw-300">
                        Atribuições do setor:
                    </h4>
                </div>
                <div v-if="doc.tipo == 'atribuicao_cargo'">
                    <h4 class="fw-300">
                        Atribuições do cargo:
                    </h4>
                </div>
                <div v-if="doc.conteudo_publicado">
                    <div v-html="doc.conteudo_publicado">

                    </div>
                </div>
                <div v-if="!doc.conteudo_publicado" class="text-center">
                    <small class="text-gray-1">
                        Nenhuma informação adicional a ser exibida.
                    </small>
                </div>
            </div>
        </div>
       <div v-if="!show.loading && show.editMode">
            <div v-if="doc.url_capa">
                <img class="doc-capa" src="https://via.placeholder.com/900x160/AAB6C8/808080%20?Text=BeeUser" />
            </div>
            <div class="border-bottom d-flex align-items-center">
                <button class="btn btn-sm btn-listagem me-2" data-bs-toggle="modal" data-bs-target="#modalEmoji">
                    <i class="fal fa-smile-wink me-2"></i>Definir Emoji
                </button>
                <button class="btn btn-sm btn-listagem me-2">
                    <i class="fal fa-image me-2"></i>Definir Imagem de Capa
                </button>
                <button class="btn btn-sm btn-listagem me-2" @click="renomearDocumento">
                    <i class="fal fa-i-cursor me-2"></i>Renomear
                </button>

                <button class="btn btn-sm btn-primary ms-auto" @click="salvarConteudo">
                    <div v-if="show.salvando">
                        <i class="fal fa-spin fa-spinner me-2"></i>Salvado
                    </div>
                    <div v-if="!show.salvando">
                        <i class="fal fa-save me-2"></i>Salvar
                    </div>
                </button>
            </div>
            <h3 class="fw-300">{{doc.emoji}} {{doc.titulo}}</h3>
            <div class="d-flex align-items-center doc-crt">
                <div class="img" v-if="doc.autor">
                    <img :src="get_files_url+doc.autor.imagem_perfil"/>
                </div>
                <div class="txt" v-if="doc.autor">
                    Criado por {{doc.autor.name}}<br/>
                    Atualizado em: {{ doc.updated_at }}
                </div>
            </div>
            <div class="doc-html">
                <div v-if="doc.tipo == 'atribuicao_setor'">
                    <h4 class="fw-300">
                        Atribuições do setor:
                    </h4>
                </div>
                <div v-if="doc.tipo == 'atribuicao_cargo'">
                    <h4 class="fw-300">
                        Atribuições do cargo:
                    </h4>
                </div>
                <ckeditor :editor="editor" v-model="doc.conteudo_edicao" :config="editorConfig"></ckeditor>

            </div>
        </div>

        <div class="modal fade" id="modalEmoji" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" style="width: 360px;">
                <div class="modal-content">
                    <div class="modal-body">
                        <VEmojiPicker @select="selecionarEmoji"></VEmojiPicker>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {api, get_files_url} from "../helpers/Request";
import { VEmojiPicker } from 'v-emoji-picker';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import '@ckeditor/ckeditor5-build-classic/build/translations/pt-br.js';
import {ck_toolbar_0} from "../helpers/Vars";
export default {
    name: "BeeDoc",
    components: {
        VEmojiPicker,
        CKEditor
    },
    data: function () {
        return {
            get_files_url,
            ck_toolbar_0,
            show: {
                loading: false,
                editMode: false,
                salvando: false
            },
            doc:{

            },
            autoria:{

            },
            anexos: {

            },
            historico: {

            },
            editor: ClassicEditor,
            editorConfig: {
                language: 'pt-br',
                placeholder: 'Nenhuma informação disponível, descreva algo.',
                ...ck_toolbar_0
            }
        }
    },
    methods: {
        carregarDocumento: function(id){
            this.show.loading = true;
            this.show.editMode = false;
            /** Carregar um determinado documento **/
            api.get("/beeceo/beedocs/"+id)
                .then((res) => {
                    this.doc = res.data.dados;
                    this.show.loading = false;
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.loading = false;
                });
        },
        modoEdicao: function(){
            //Entra em modo edição, se o documento tiver carregado.
            this.show.editMode = !this.show.editMode;
        },
        selecionarEmoji: function(emoji){
            //Atualizar Local
            this.doc.emoji = emoji.data;
            //Consumir API
            api.post("/beeceo/beedocs/"+this.doc.id+"/emoji", {emoji : emoji.data})
                .then((res) => {
                    console.log('Emoji atualizado');
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                });
            //Fechar Modal
            (bootstrap.Modal.getInstance(document.getElementById('modalEmoji'))).hide();
        },
        renomearDocumento: function (){
            /** Swal **/
            Vue.swal({
                ...confVisual,
                title: "Renomear",
                input: 'text',
                inputValue: this.doc.titulo,
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        return api.post("/beeceo/beedocs/"+this.doc.id+"/renomear",{'titulo' : titulo})
                            .then((res) => {
                                chamarSucesso("Renomeado com sucesso.");
                                //Atualizar local
                                this.doc.titulo = res.data.dados;

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
        salvarConteudo: function(){
            /** Salvando **/
            this.show.salvando = true;
            /** Enviando API **/
            api.post("/beeceo/beedocs/"+this.doc.id+"/salvar", {conteudo : this.doc.conteudo_edicao})
                .then((res) => {
                    console.log(this.doc);
                    this.doc.conteudo_publicado = this.doc.conteudo_edicao;
                    this.show.salvando = false;
                    this.show.editMode = false;
                })
                .catch((error) => {
                    //Saida dos erros
                    tratarErroApi(error, error.response);
                    this.show.salvando = false;
                });
        }
    },
    props: {
        result_title : {
            default: 'Resultados',
            type: String
        }
    },
    created() {

    }
}
</script>

<style scoped>

</style>
