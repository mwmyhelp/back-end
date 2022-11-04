<template>
    <div>
        <div class="row ps-4">
            <h3 v-if="show.modo_criacao" class="fw-300">
                Criar novo diagrama
            </h3>
            <h3 v-if="!show.modo_criacao" class="fw-300">
                Visualizar diagrama
            </h3>
        </div>
        <div class="row p-3">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <DxDiagram
                            id="diagrama"
                            ref="diagrama"
                            units="cm"
                            :read-only="!show.modo_edicao"
                        >
                        </DxDiagram>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <form @submit="salvar_diagrama">
                    <div class="d-flex">
                        <button :disabled="!show.modo_edicao" class="btn btn-primary" type="submit">
                            <i class="fal fa-save me-2"></i>
                            Salvar Anterações
                        </button>
                        <button class="btn btn-danger ms-auto" type="button">
                            Voltar
                        </button>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <label>Disponível para:</label>
                        <treeselect
                            :multiple="true"
                            :options="options"
                            placeholder="Selecione..."
                            v-model="form.aplicar_em"
                            :disabled="!show.modo_edicao"
                        >
                        </treeselect>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <div>
                            <label>Numeração:</label>
                            <input type="text" disabled value="Gerada Automática" class="form-control">
                        </div>
                        <div class="mt-2">
                            <label>Identificação:</label>
                            <input :disabled="!show.modo_edicao" required type="text" class="form-control" v-model="form.identificacao"/>
                        </div>
                        <div class="mt-2">
                            <label>Descrição:</label>
                            <textarea :disabled="!show.modo_edicao" class="form-control" v-model="form.descricao"></textarea>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <div v-if="!show.modo_criacao" class="d-flex justify-content-end">

                            <button @click="liberar_edicao" class="btn btn-info" type="button">
                                <i class="fal fa-pencil me-3"></i>
                                Editar
                            </button>

                            <button @click="liberar_edicao" class="btn btn-outline-danger ms-auto" type="button">
                                <i class="fal fa-trash me-3"></i>
                                Remover
                            </button>
                        </div>
                    </div>
                    <div  v-if="!show.modo_criacao" class="mt-3 pt-3 border-top d-flex flex-column">
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
</template>

<script>
import DxDiagram from 'devextreme-vue/diagram';
import '../../../../node_modules/devexpress-diagram/dist/dx-diagram.min.css';
//PT-BR
import {locale, loadMessages, formatMessage} from 'devextreme/localization';
import ptMessages from "devextreme/localization/messages/pt.json";
//TreeSelect
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import {api} from "../../helpers/Request";

export default {
    components: {
        DxDiagram,
        Treeselect
    },
    name: "editor",
    data: function () {
        return {
            show: {
                modo_edicao: true,
                modo_criacao: true
            },
            form: {
              aplicar_em: [],
              numeracao: '',
              identificacao : '',
              descricao : '',
              json: null
            },
            selecionado: {

            },
            options: null
        }
    },
    methods: {
        liberar_edicao: function () {
            this.show.modo_edicao = true;
        },
        obter_diagrama: function () {
            var diagrama = this.$refs['diagrama'].instance;
            return diagrama.export();
        },
        salvar_diagrama: function (e) {
            e.preventDefault();
            //loading
            chamarLoading();
            //Enviando
            if(this.show.modo_criacao){
                //Criando
                api.post("/api/beeceo/diagramas/criar",{
                    aplicar_em : JSON.stringify(this.form.aplicar_em),
                    titulo : this.form.identificacao,
                    json : this.obter_diagrama(),
                    descricao : this.form.descricao
                })
                    .then((res) => {
                        //Sucesso
                        chamarSucesso("Diagrama criado com sucesso!");
                        //Encerrar o Loading
                        encerrarLoading();
                        this.carregar_diagrama(res.data.dados.id);
                    })
                    .catch((error) => {
                        encerrarLoading();
                        //Saida de outros erros
                        this.erros = tratarErroApi(error, error.response);
                    });
            }else{
                //Salvando
                api.post("/api/beeceo/diagramas/"+this.selecionado+"/salvar",{
                    aplicar_em : JSON.stringify(this.form.aplicar_em),
                    titulo : this.form.identificacao,
                    json : this.obter_diagrama(),
                    descricao : this.form.descricao
                })
                    .then((res) => {
                        //Sucesso
                        chamarSucesso("Diagrama salvo com sucesso!");
                        //Encerrar o Loading
                        encerrarLoading();
                    })
                    .catch((error) => {
                        encerrarLoading();
                        //Saida de outros erros
                        this.erros = tratarErroApi(error, error.response);
                    });
            }
        },
        carregar_diagrama: function (id){
            chamarLoading();
            api.get("/api/beeceo/diagramas/"+id)
                .then((res) => {
                    //Sucesso, configurar
                    this.show.modo_criacao = false;
                    this.show.modo_edicao = false;
                    this.form = _.mapValues(this.form, () => false);
                    this.form.descricao = res.data.dados.descricao;
                    this.form.identificacao = res.data.dados.titulo;
                    let str = res.data.dados.cod;
                    this.form.numeracao = String(str).padStart(3, '0');
                    this.form.aplicar_em = JSON.parse(res.data.dados.aplicado_em);
                    var diagrama = this.$refs['diagrama'].instance;
                    diagrama.import(res.data.dados.json);
                    this.selecionado = res.data.dados.id;
                    //Encerrar o Loading
                    encerrarLoading();
                })
                .catch((error) => {
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                    encerrarLoading();
                });
        }
    },
    created() {
        //Loading
        chamarLoading();
        //Deixar em portugues
        loadMessages(ptMessages);
        locale('pt');
        //Verificar se é inserção ou edição
        if(this.show.modo_criacao){
            //Carregar nova numereção.
            api.get("/api/beeceo/diagramas/max_cod")
                .then((res) => {
                    //Sucesso
                    this.form.numeracao = res.data.dados.cod;
                    //Encerrar o Loading
                })
                .catch((error) => {
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                });
        }
        //Carregando opções
        api.get("/api/beeceo/geral/estrutura_empresarial?geral=true")
            .then((res) => {
                //Sucesso, carregar lista
                this.options = res.data.dados;
                //Encerrar o Loading
                encerrarLoading();
            })
            .catch((error) => {
                //Saida de outros erros
                this.erros = tratarErroApi(error, error.response);
                encerrarLoading();
            });

        //Carregando edicao
        //this.carregar_diagrama('eec15029-20c4-4505-8923-ef4fdb653b51');

    }
}
</script>

<style scoped>

</style>
