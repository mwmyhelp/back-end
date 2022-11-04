<template>
    <div class="">
        <div class="row">
            <div class="col-lg-3 col-md-4 border-end pt-3">
                <div class="p-3 text-gray-1">

                    <div class="d-flex align-items-center">
                        <div>
                            <img class="rounded icone_x1" src="/beeapp/images/default_icon.jpg"/>
                        </div>
                        <div>
                            <h4 class="fw-300 ms-2">
                                Departamentos
                            </h4>
                        </div>
                    </div>
                    <div class="lista_acao_01 text-gray-1 mt-3">
                        <a href="#" @click="visaoGeral">
                            <li class="p-2">
                                <i class="fal fa-align-center me-2"></i> Visão Geral
                            </li>
                        </a>
                        <a href="#" onclick="indisponivel();">
                            <li class="p-2">
                                <i class="fal fa-cog me-2"></i> Configurações
                            </li>
                        </a>
                        <a href="#" onclick="indisponivel();">
                            <li class="p-2">
                                <i class="fal fa-question-circle me-2"></i> Ajuda
                            </li>
                        </a>
                    </div>


                    <div class="mt-3 pt-3 border-top ps-2">
                        <lista
                            ref="listaDepartamentos"
                            @itemClicado="visualizarDepartamento"
                            @carregarDepartamento="carregarDepartamento"
                            @novoDepartamento="novoDepartamento"
                            @novoSubdepartamento="novoSubdepartamento"
                            @renomearDepartamento="renomearDepartamento"
                            @arquivarDepartamento="arquivarDepartamento"
                        ></lista>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8 bg-white pt-3">

                <div v-if="show.mgrDepartamento">
                    <managerDepartamento
                        ref="mgrDep"
                        @novoSubdepartamento="novoSubdepartamento"
                        @arquivarDepartamento="arquivarDepartamento"
                        @carregarSetor="carregarSetor"
                        @carregarCargo="carregarCargo"
                    ></managerDepartamento>
                </div>

                <div v-if="show.mgrSetor">
                    <managerSetor
                        ref="mgrSet"
                        @carregarDepartamento="carregarDepartamento"
                    ></managerSetor>
                </div>

                <div v-if="show.mgrCargo">
                    <managerCargo
                        ref="mgrCargo"
                        @carregarDepartamento="carregarDepartamento"
                    ></managerCargo>
                </div>

                <div v-if="show.visaoGeral">
                    <div class="text-center pt-3 text-gray-1">
                        <h4 class="fw-200">
                            <i class="fal fa-pause me-3"></i>
                            Ainda não possuímos informações suficientes para exibição da visão geral.
                        </h4>
                        <h5 class="fw-200 mt-4">
                            Selecione algum departamento na lista ao lado, ou crie um novo para mais opções.
                        </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import {api} from "../../helpers/Request";
import lista from './lista';
import managerDepartamento from './mgr_departamento';
import managerSetor from './mgr_setor';
import managerCargo from './mgr_cargo';

export default {
    name: "modulo",
    components: {
        lista,
        managerDepartamento,
        managerSetor,
        managerCargo
    },
    data: function () {
        return {
            show: {
                mgrDepartamento : false,
                mgrSetor: false,
                mgrCargo: false,
                visaoGeral: true
            }
        }
    },
    methods: {
        /** Métodos da Lista **/
        visualizarDepartamento: function(item){
            this.show.visaoGeral = false;
            this.show.mgrSetor = false;
            this.show.mgrCargo = false;
            this.show.mgrDepartamento = true;
            this.$nextTick(function (){
                this.$refs.mgrDep.carregarDepartamento(item.id);
            });
        },
        carregarDepartamento: function(id){
            this.show.visaoGeral = false;
            this.show.mgrSetor = false;
            this.show.mgrCargo = false;
            this.show.mgrDepartamento = true;
            this.$nextTick(function (){
                this.$refs.mgrDep.carregarDepartamento(id);
            });
        },
        atualizarLista: function(){
            this.$refs.listaDepartamentos.carregarDepartamentos();
        },
        /** Departamentos **/
        novoDepartamento: function() {

            /** Chamar Swal com solicitação do titulo **/
            Vue.swal({
                ...confVisual,
                title: "Criar departamento primário:",
                input: 'text',
                inputPlaceholder : 'Qual nome do departamento?',
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        return api.post("/empresa/departamentos/criar",{'titulo' : titulo})
                            .then((res) => {
                                chamarSucesso("Departamento criado.");
                                //Atualizar lista
                                this.atualizarLista();
                                //Selecionar departamento criado.
                                this.$refs.mgrDep.carregarDepartamento(res.data.dados.id);
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
        novoSubdepartamento: function (id, titulo) {
            /** Swal **/
            Vue.swal({
                ...confVisual,
                title: "Departamento secundário:",
                input: 'text',
                inputPlaceholder : 'Criando em '+titulo,
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        return api.post("/empresa/departamentos/criar",{'titulo' : titulo, 'id_pai' : id})
                            .then((res) => {
                                chamarSucesso("Departamento secundário criado.");
                                //Atualizar lista
                                this.atualizarLista();
                                //Selecionar departamento criado.
                                this.$refs.mgrDep.carregarDepartamento(res.data.dados.id);
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
        renomearDepartamento: function (id,titulo){
            /** Swal **/
            Vue.swal({
                ...confVisual,
                title: "Renomear",
                input: 'text',
                inputValue: titulo,
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    if(titulo.length > 2){
                        //Axios
                        return api.post("/empresa/departamentos/"+id+"/renomear",{'titulo' : titulo})
                            .then((res) => {
                                chamarSucesso("Departamento renomeado.");
                                this.atualizarLista();

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
        arquivarDepartamento: function (id,titulo){
            /** Swal **/
            Vue.swal({
                ...confVisual,
                text: "Você tem certeza que deseja arquivar o departamento "+titulo+"?",
                confirmButtonText : 'Sim',
                showCancelButton : true,
                cancelButtonText : 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (titulo) => {
                    //Axios
                    return api.delete("/empresa/departamentos/"+id+"/arquivar")
                        .then((res) => {
                            chamarSucesso("Departamento arquivado.");
                            this.atualizarLista();
                            this.visaoGeral();
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
        /** Setores **/
        carregarSetor: function(id, dep){
            this.show.visaoGeral = false;
            this.show.mgrDepartamento = false;
            this.show.mgrCargo = false;
            this.show.mgrSetor = true;
            this.$nextTick(function (){
                this.$refs.mgrSet.carregarSetor(id, dep);
            });
        },
        /** Cargos **/
        carregarCargo: function(id, dep){
            this.show.visaoGeral = false;
            this.show.mgrDepartamento = false;
            this.show.mgrSetor = false;
            this.show.mgrCargo = true;
            this.$nextTick(function (){
                this.$refs.mgrCargo.carregarCargo(id, dep);
            });
        },
        /** Geral **/
        visaoGeral: function(){
            this.show.mgrSetor = false;
            this.show.mgrCargo = false;
            this.show.mgrDepartamento = false;
            this.show.visaoGeral = true;
        }
    },
    mounted() {
       this.atualizarLista();
    }
}
</script>

<style>

</style>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */
{
    opacity: 0;
}
</style>
