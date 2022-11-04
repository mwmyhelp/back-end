<template>
    <div class="card p-4 border-0 shadow">
        <div class="text-center">
            <h3 class="fw-400 text-dark">
                Acesse a BeeApp
            </h3>
        </div>
        <form method="POST" id="form" action="/login" @submit="enviar_form">
            <input type="hidden" name="_token" v-model="csrf"/>
            <input type="hidden" name="cpf" v-model="form.cpf"/>
            <transition-group name="fade" mode="out-in" @after-leave="focar_senha">
                <div v-if="show.tela_cpf" key="telaCpf">
                    <div class="text-muted text-center">
                        Seja bem vindo a nossa plataforma! Para começar com nossas tranformações, nos informe seus
                        dados.
                    </div>
                    <div class="mt-5 pe-5 ps-5">
                        <div>
                            <label class="fw-500">Informe seu CPF:</label>
                            <input v-bind:autofocus="{'autofocus' : this.show.tela_cpf}" v-mask="'###.###.###-##'"
                                   v-model="form.cpf" required type="text" class="form-control form-control-lg"
                                   v-bind:class="{ 'is-invalid': this.erros.cpf }"/>
                            <div v-if="erros.cpf" class="invalid-feedback">
                                {{ this.erros.cpf }}
                            </div>
                        </div>
                        <div class="mt-3">
                            <button @click="checar_cpf" type="button" class="btn btn-primary w-100">
                                Continuar
                            </button>
                        </div>
                    </div>


                    <div class="mt-5">
                        <div class="mt-5 d-flex flex-column align-items-end">
                            <small class="text-muted">
                                Esta enfrentando problemas no acesso?
                            </small>
                            <a href="#" class="fw-700">
                                Solicitar ajuda.
                            </a>
                        </div>
                    </div>

                </div>
                <div v-else-if="show.tela_senha" key="telaSenha">
                    <div class="bg-light rounded p-3 d-flex align-items-center">
                        <i class="fal fa-user fa-2x"></i>
                        <div class="ms-3">
                            Bem vindo:<br/>
                            <span class="text-muted">
                                            {{ this.label.nome }}
                                        </span>
                        </div>
                        <a href="#" @click="reiniciar" class="ms-auto">
                            <b>Alterar</b>
                        </a>
                    </div>

                    <div class="mt-3 pe-5 ps-5">
                        <div>
                            <label class="fw-500">Informe sua senha:</label>
                            <input id="campo_senha" v-model="form.senha" name="password" required type="password"
                                   class="form-control form-control-lg"/>
                        </div>
                        <div class="mt-2">
                            <div class="custom-control custom-checkbox">
                                <input name="remember" type="checkbox" class="custom-control-input">
                                <label class="custom-control-label">Manter logado</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" @click="checar_senha" class="btn btn-primary w-100">
                                Continuar
                            </button>
                        </div>
                    </div>


                    <div class="mt-5">
                        <div class="mt-5 d-flex flex-column align-items-end">
                            <small class="text-muted">
                                Você esqueceu sua senha?
                            </small>
                            <a href="#" class="fw-700">
                                Recuperar senha.
                            </a>
                        </div>
                    </div>

                </div>
            </transition-group>
        </form>
    </div>
</template>

<script>
import {api} from "../helpers/Request";
import {validarCpf, apenasNumeros} from "../helpers/Funcoes";

export default {
    name: "login",
    data: function () {
        return {
            csrf: getCSRF(),
            show: {
                tela_cpf: true,
                tela_senha: false
            },
            form: {
                cpf: '',
                senha: '',
                certo: false
            },
            label: {
                nome: ''
            },
            erros: {}
        }
    },
    methods: {
        checar_cpf: function () {
            //Zerar erros
            this.erros = {};
            //Validar o CPF
            if (!validarCpf(this.form.cpf)) {
                this.erros = {
                    cpf: 'CPF Inválido'
                }
                return false;
            }
            //Loading Geral
            chamarLoading();

            //Consultar API
            api.post("/auth/consultacpf", {
                cpf: this.form.cpf
            })
                .then((res) => {
                    //Achou o usuário
                    this.show.tela_cpf = false;
                    this.show.tela_senha = true;
                    //Focus
                    //Atualizar Dados
                    this.label.nome = res.data.dados.name;
                    this.$nextTick(() => document.getElementById("campo_senha").focus());
                    //Encerrar o Loading
                    encerrarLoading();
                })
                .catch(async (error) => {
                    //Encerrar Loading
                    encerrarLoading();
                    //Saida dos erros
                    this.erros = await tratarErroApi(error, error.response, 'form');
                });

        },
        checar_senha: function () {
            //Apertei enter enquando to checando o CPF?
            if (this.show.tela_cpf) {
                //Vamos checar o CPF então
                this.checar_cpf();
                return false;
            }
            //Opa, vamos checar a senha e logar mesmo
            chamarLoading();
            //Chamada Axios
            let that = this;
            //Consultar API
            api.post("/auth/logar", {
                cpf: apenasNumeros(this.form.cpf),
                password: this.form.senha
            })
                .then((res) => {
                    //Logou com sucesso, redirecionando para home
                    this.form.certo = true;
                    let form = document.getElementById("form");
                    // Nos campos input hidden o v-model apresenta bugs
                    let input = document.createElement("input");
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('value', res.data.dados.access_token);
                    input.setAttribute('name', 'b_token');
                    form.appendChild(input);
                    form.submit();
                })
                .catch((error) => {
                    //Erro ao logar
                    encerrarLoading();
                    tratarErroApi(error, error.response);
                });
        },
        enviar_form: function (e) {
            if (this.form.certo) {
                return true;
            } else {
                e.preventDefault();
                if (this.show.tela_cpf) {
                    this.checar_cpf();
                    return false;
                }
                if (this.show.tela_senha) {
                    this.checar_senha();
                    return false;
                }
            }
        },
        reiniciar: function (e) {
            e.preventDefault();
            this.show.tela_cpf = true;
            this.label.nome = '';
            this.erros = {};
            this.show.tela_senha = false;
            document.getElementById("campo_cpf").focus();
        },
        focar_senha: function () {
            document.getElementById('campo_senha').focus();
        }
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */
{
    opacity: 0;
}
</style>
