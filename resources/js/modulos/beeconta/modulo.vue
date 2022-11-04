<template>
    <div>
        <transition name="fade" mode="out-in">
            <div v-if="tela.gerenciar" key="modulo_gerenciar">
                <gerenciar_beeconta></gerenciar_beeconta>
            </div>
            <div v-if="tela.criar" key="wizard_criar">
                <wizard_criar></wizard_criar>
            </div>
        </transition>
    </div>
</template>

<script>
import gerenciar_beeconta from "./gerenciar";
import wizard_criar from "./wizard_criar";

export default {
    name: "modulo",
    components: {
        gerenciar_beeconta,
        wizard_criar
    },
    data : function(){
        return {
            tela: {
                gerenciar: true,
                criar: false
            }
        }
    },
    methods: {
        //Chamada de Telas
        iniciarNovaConta: function(){
            this.tela.gerenciar = false;
            this.tela.criar = true;
        },
        retomarGerenciamento: function(recarregar = false){
            if(!recarregar){
                this.tela.gerenciar = true;
                this.tela.criar = false;
            }
        },
        novaContaCriada: function(){
            //Atualizar lista
            this.retomarGerenciamento(true);
        }
    },
    created(){
        //Listeners
        this.$root.$on('emit_nova_bee_conta', () => this.iniciarNovaConta());
        this.$root.$on('emit_bee_conta_gerenciar', (recarregar) => this.retomarGerenciamento(recarregar));
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
    opacity: 0;
}
</style>
