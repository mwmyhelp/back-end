<template>
    <div>
        <div class="container pt-4 pb-4">

            <div class="nav-progress">
                <div v-bind:class="{'active' : this.show.dados_empresa, 'complete' : this.form.dados_empresa.cnpj}">
                    <a href="#" @click="passo_dadosEmpresa">
                        Dados da Empresa
                    </a>
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div v-bind:class="{'active' : this.show.identidade_visual, 'complete' : this.form.dados_empresa.cnpj}">
                    <a href="#" @click="passo_identidadeVisual">
                        Identidade Visual
                    </a>
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div v-bind:class="{'active' : this.show.responsavel, 'complete' : this.form.dados_responsavel.cpf}">
                    <a href="#" @click="passo_responsavel">
                        Responsável
                    </a>
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div v-bind:class="{'active' : this.show.plano}">
                    <a href="#" @click="passo_plano">
                        Plano
                    </a>
                </div>
            </div>

        </div>
        <div class="container mini-container pb-4">

            <transition name="fade" mode="out-in">

                <div v-if="show.dados_empresa" key="telaDados" class="row mt-4">
                    <div class="col-md-12">
                        <form @submit="passo_identidadeVisual">
                            <h3 class="text-gray-1 fw-300">
                                Dados da Empresa
                            </h3>
                            <div class="card">
                                <div class="card-body">

                                    <div class="row g-3">
                                        <div class="col-12 col-lg-8">
                                            <label>CNPJ:</label>
                                            <input @change="consultarCnpj" required v-model="form.dados_empresa.cnpj"
                                                   v-mask="'##.###.###/####-##'" class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <label>Razão Social:</label>
                                            <input required v-model="form.dados_empresa.razao_social"
                                                   class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <label>Nome Fantasia:</label>
                                            <input required v-model="form.dados_empresa.nome_fantasia"
                                                   class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <label>Telefone Fixo:</label>
                                            <input v-model="form.dados_empresa.telefone_fixo" v-mask="'(##) ####-####'"
                                                   class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <label>Telefone Celular:</label>
                                            <input v-model="form.dados_empresa.telefone_celular"
                                                   v-mask="'(##) # ####-####'" class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <label>E-mail da Empresa:</label>
                                            <input required v-model="form.dados_empresa.email" class="form-control"
                                                   type="email"/>
                                        </div>
                                        <div class="col-12 col-lg-10">
                                            <label>Website:</label>
                                            <input v-model="form.dados_empresa.website" class="form-control"
                                                   type="text"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <h3 class="text-gray-1 fw-300 mt-3">
                                Endereço da Empresa
                            </h3>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-8">
                                            <label>CEP:</label>
                                            <input @change="consultarCep" required v-model="form.endereco_empresa.cep"
                                                   v-mask="'#####-###'" class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-1 g-3">

                                        <div class="col-8">
                                            <label>Cidade:</label>
                                            <input disabled v-model="form.endereco_empresa.cidade" class="form-control"
                                                   type="text"/>
                                        </div>
                                        <div class="col-4">
                                            <label>Estado:</label>
                                            <input disabled v-model="form.endereco_empresa.uf" class="form-control"
                                                   type="text"/>
                                        </div>
                                        <div class="col-8">
                                            <label>Logradouro:</label>
                                            <input required v-model="form.endereco_empresa.logradouro"
                                                   class="form-control" type="text"/>
                                        </div>
                                        <div class="col-4">
                                            <label>Número:</label>
                                            <input required v-model="form.endereco_empresa.numero" class="form-control"
                                                   type="text"/>
                                        </div>
                                        <div class="col-8">
                                            <label>Complemento:</label>
                                            <input v-model="form.endereco_empresa.complemento" class="form-control"
                                                   type="text"/>
                                        </div>
                                        <div class="col-8">
                                            <label>Bairro:</label>
                                            <input v-model="form.endereco_empresa.bairro" class="form-control"
                                                   type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3">

                                <button @click="$root.$emit('emit_bee_conta_gerenciar',false)" type="button"
                                        class="btn-outline-danger btn">
                                    <i class="fal fa-times me-2"></i>
                                    Cancelar
                                </button>

                                <button type="submit" class="btn-primary btn ms-auto">
                                    <i class="fal fa-save me-2"></i>
                                    Continuar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div v-if="show.identidade_visual" key="telaIdentidade" class="row mt-4">
                    <div class="col-md-12">
                        <form @submit="passo_responsavel">
                            <div class="alert alert-light justify-content-between d-flex border rounded">
                                <i class="fal fa-comment-exclamation me-3"></i>
                                As informações como cores, logos e outras de identidade visual da empresa, não são
                                obrigatórias nessa etapa.<br/>
                                A própria empresa pode configurar isso em sua área administrativa.
                            </div>
                            <h3 class="text-gray-1 fw-300">
                                Logo da Empresa:
                            </h3>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 d-flex justify-content-center">
                                            <div class="d-block">
                                                <croppa
                                                    v-model="form.identidade_visual.logo"
                                                    :prevent-white-space="true"
                                                    placeholder="Selecione a imagem."
                                                    :placeholder-font-size="16"
                                                    :show-loading="true"
                                                    :width="300"
                                                    :height="150"
                                                ></croppa>
                                                <small class="text-muted d-block text-center">
                                                    *300 x 150 ou proporcional.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-gray-1 fw-300 mt-3">
                                Configuração Visual:
                            </h3>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <label>Cor Primária:</label>
                                            <input v-model="form.identidade_visual.config.cor_primaria"
                                                   class="form-control form-control-color" type="color"/>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <small class="text-muted">
                                                Espera-se uma cor escura com bom contraste com branco.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row g-3 mt-1">
                                        <div class="col-4">
                                            <label>Cor Secundária:</label>
                                            <input v-model="form.identidade_visual.config.cor_secundaria"
                                                   class="form-control form-control-color" type="color"/>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <small class="text-muted">
                                                Normalmente utilizada nos detalhes da página.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3">

                                <button @click="$root.$emit('emit_bee_conta_gerenciar',false)" type="button"
                                        class="btn-outline-danger btn">
                                    <i class="fal fa-times me-2"></i>
                                    Cancelar
                                </button>

                                <button type="submit" class="btn-primary btn ms-auto">
                                    <i class="fal fa-save me-2"></i>
                                    Continuar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <div v-if="show.responsavel" key="telaResponsavel" class="row mt-4">
                    <div class="col-md-12">
                        <form @submit="passo_plano">
                            <div class="alert alert-light justify-content-between d-flex border rounded">
                                <i class="fal fa-comment-exclamation me-3"></i>
                                É necessário registrar um responsável para a empresa.<br/>Ele tem acesso irrestrito
                                a toda a plataforma e pode definir novos Líderes e Gestores.
                            </div>
                            <h3 class="text-gray-1 fw-300">
                                Dados do Responsável
                            </h3>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-8">
                                            <label>CPF:</label>
                                            <input @change="consultarCpf" required v-model="form.dados_responsavel.cpf"
                                                   v-mask="'###.###.###-##'" class="form-control" type="text"/>
                                            <small class="text-muted">
                                                O usuário utilizará o CPF para acessar a plataforma.
                                            </small>
                                        </div>
                                        <div class="col-12">
                                            <label>Nome:</label>
                                            <input required v-model="form.dados_responsavel.nome" class="form-control"
                                                   type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <label>Sobrenome:</label>
                                            <input required v-model="form.dados_responsavel.sobrenome"
                                                   class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <label>Telefone Celular:</label>
                                            <input required v-model="form.dados_responsavel.telefone_celular"
                                                   v-mask="'(##) # ####-####'" class="form-control" type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <label>E-mail:</label>
                                            <input required v-model="form.dados_responsavel.email" class="form-control"
                                                   type="email"/>
                                            <small class="text-muted">
                                                É importante o cadastro de e-mail para notificações e segurança.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3">

                                <button @click="$root.$emit('emit_bee_conta_gerenciar',false)" type="button"
                                        class="btn-outline-danger btn">
                                    <i class="fal fa-times me-2"></i>
                                    Cancelar
                                </button>

                                <button type="submit" class="btn-primary btn ms-auto">
                                    <i class="fal fa-save me-2"></i>
                                    Continuar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div v-if="show.plano" key="telaPlano" class="row mt-4">
                    <div class="col-md-12">
                        <div class="alert alert-light justify-content-between d-flex border rounded">
                            <i class="fal fa-comment-exclamation me-3"></i>
                            A configuração do plano de uso, determina o valor da mensalidade e as limitações dos
                            usuários na plataforma.<br/>
                            O plano do usuário pode ser alterado a qualquer momento.
                        </div>
                        <h3 class="text-gray-1 fw-300">
                            Selecionar Plano
                        </h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <select class="form-control">
                                            <option value="padrao">
                                                Plano Padrão
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label>
                                            Informações do Plano
                                        </label>
                                        <div class="row mt-2 g-3">
                                            <div class="col-6">
                                                <small class="d-block">
                                                    <b>Início do Plano:</b>
                                                </small>
                                                <small class="d-block text-primary">
                                                    15/04/1993
                                                </small>
                                            </div>
                                            <div class="col-6">
                                                <small class="d-block">
                                                    <b>Primeira Fatura:</b>
                                                </small>
                                                <small class="d-block text-primary">
                                                    15/05/1993
                                                </small>
                                            </div>
                                            <div class="col-6">
                                                <small class="d-block">
                                                    <b>Vigência:</b>
                                                </small>
                                                <small class="d-block text-primary">
                                                    15/05/1994 (1 ano)
                                                </small>
                                            </div>
                                            <div class="col-6">
                                                <small class="d-block">
                                                    <b>Plano de Pagamento:</b>
                                                </small>
                                                <small class="d-block text-primary">
                                                    Mensal
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                <small class="d-block mt-2">
                                                    <b>Módulos:</b>
                                                </small>
                                                <span class="badge rounded-pill bg-primary fw-400 ps-3 pe-3 pt-2 pb-2">
                                                    BeeCeo
                                                </span>
                                                <span class="badge rounded-pill bg-primary fw-400 ps-3 pe-3 pt-2 pb-2">
                                                    UniBee + BeeHelp
                                                </span>
                                                <span class="badge rounded-pill bg-primary fw-400 ps-3 pe-3 pt-2 pb-2">
                                                    BeeMet
                                                </span>
                                                <span class="badge rounded-pill bg-primary fw-400 ps-3 pe-3 pt-2 pb-2">
                                                    BeeWork
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 pt-2 border-top">
                                    <div class="col-6">
                                        Valor do Plano:
                                    </div>
                                    <div class="col-6 text-end">
                                        R$ 697,00
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        Descontos:
                                    </div>
                                    <div class="col-6 text-end">
                                        R$ 200,00
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        Valor Final:
                                    </div>
                                    <div class="col-6 text-end">
                                        R$ 497,00
                                    </div>
                                </div>
                                <div class="row mt-2 pt-2 border-top">
                                    <div class="col-6">
                                        <h4>
                                            Total:
                                        </h4>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h5 class="p-0 m-0 text-success">R$ 497,00</h5>
                                        <small class="text-muted d-block">
                                            Mensal
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mt-3">

                            <button @click="$root.$emit('emit_bee_conta_gerenciar',false)" type="button"
                                    class="btn-outline-danger btn">
                                <i class="fal fa-times me-2"></i>
                                Cancelar
                            </button>

                            <button type="button" @click="enviarForm" class="btn-primary btn ms-auto">
                                <div v-if="show.finalizando">
                                    <i class="fal fa-spin fa-spinner me-2"></i>
                                    Finalizando...
                                </div>
                                <div v-if="!show.finalizando">
                                    <i class="fal fa-save me-2"></i>
                                    Finalizar
                                </div>
                            </button>
                        </div>


                    </div>
                </div>

            </transition>

        </div>
    </div>
</template>

<script>
import {api} from "../../helpers/Request";
import {validarCnpj, apenasNumeros, validarCpf} from "../../helpers/Funcoes";

export default {
    name: "wizard_criar",
    data: function () {
        return {
            csrf: getCSRF(),
            show: {
                dados_empresa: true,
                identidade_visual: false,
                responsavel: false,
                plano: false,
                finalizando: false
            },
            form: {
                dados_empresa: {
                    cnpj: '',
                    razao_social: '',
                    nome_fantasia: '',
                    telefone_fixo: '',
                    telefone_celular: '',
                    email: '',
                    website: ''
                },
                endereco_empresa: {
                    cep: '',
                    cidade: '',
                    uf: '',
                    ibge: '',
                    logradouro: '',
                    numero: '',
                    complemento: '',
                    bairro: ''
                },
                identidade_visual: {
                    logo: '',
                    config: {
                        cor_primaria: '',
                        cor_secundaria: ''
                    }
                },
                dados_responsavel: {
                    cpf: '',
                    nome: '',
                    sobrenome: '',
                    telefone_celular: '',
                    email: ''
                }
            },
            label: {
                nome: ''
            },
            erros: {}
        }
    },
    methods: {
        consultarCnpj: function () {
            //Pega o CNPJ atual, valida e consulta
            if (!validarCnpj(this.form.dados_empresa.cnpj)) {
                chamarErro("CNPJ Inválido");
                this.form.dados_empresa.cnpj = '';
                return false;
            }
            //Axios
            chamarLoading();
            //Verifica se já esta em uso
            api.post("/auth/consultacnpj", {cnpj: this.form.dados_empresa.cnpj})
                .then((res) => {
                    if(res.data.msg == 'ja_existe'){
                        chamarErro("O CNPJ "+this.form.dados_empresa.cnpj+" já pertence a uma BeeConta.");
                        this.form.dados_empresa.cnpj = '';
                        encerrarLoading();
                    }else{
                        //Buscar pelos dados
                        api.get("/consulta/cnpj/" + this.form.dados_empresa.cnpj)
                            .then((res) => {
                                let dados = res.data.dados;
                                //Achou o cnpj, preencher
                                this.form.dados_empresa.razao_social = dados.nome;
                                this.form.dados_empresa.nome_fantasia = dados.fantasia;
                                this.form.dados_empresa.telefone_fixo = dados.telefone;
                                this.form.dados_empresa.email = dados.email;
                                this.form.endereco_empresa.cep = dados.cep;
                                this.form.endereco_empresa.cidade = dados.municipio;
                                this.form.endereco_empresa.uf = dados.uf;
                                this.form.endereco_empresa.logradouro = dados.logradouro;
                                this.form.endereco_empresa.numero = dados.numero;
                                this.form.endereco_empresa.complemento = dados.complemento;
                                this.form.endereco_empresa.bairro = dados.bairro;
                                this.form.endereco_empresa.ibge = dados.ibge_cidade;
                                //Encerrar o Loading
                                encerrarLoading();
                            })
                            .catch((error) => {
                                //Encerrar Loading
                                encerrarLoading();
                                //Saida dos erros
                                this.erros = tratarErroApi(error, error.response);
                            });
                    }
                })
                .catch((error) => {
                    //Encerrar Loading
                    encerrarLoading();
                    //Saida dos erros
                    this.erros = tratarErroApi(error, error.response);
                });
        },
        consultarCep: function () {
            //Pega o CEP atual, valida e consulta
            if (this.form.endereco_empresa.cep.length != 9) {
                chamarErro("CEP Inválido");
                this.form.endereco_empresa.cep = '';
                return false;
            }
            //Axios
            chamarLoading();
            api.get("/consulta/cep/" + this.form.endereco_empresa.cep)
                .then((res) => {
                    let dados = res.data.dados;
                    //Achou o cep, preencher
                    this.form.endereco_empresa.cidade = dados.localidade;
                    this.form.endereco_empresa.uf = dados.uf;
                    this.form.endereco_empresa.bairro = dados.bairro;
                    this.form.endereco_empresa.complemento = dados.complemento;
                    this.form.endereco_empresa.ibge = dados.ibge;
                    this.form.endereco_empresa.logradouro = dados.logradouro;
                    //Encerrar o Loading
                    encerrarLoading();
                })
                .catch((error) => {
                    //Encerrar Loading
                    encerrarLoading();
                    //Saida dos erros
                    this.erros = tratarErroApi(error, error.response);
                });
        },
        consultarCpf: function () {
            //Pega o CPF atual, valida, e verifica se não esta em uso
            if (!validarCpf(this.form.dados_responsavel.cpf)) {
                chamarErro("O CPF informado é inválido.");
                this.form.dados_responsavel.cpf = "";
                return false;
            }
            //Consultar API
            chamarLoading();
            api.post("/auth/consultacpf", {
                cpf: this.form.dados_responsavel.cpf
            })
                .then((res) => {
                    //Já existe CPF
                    chamarAviso("O CPF " + this.form.dados_responsavel.cpf + " já pertence a um usuário da BeeApp.");
                    this.form.dados_responsavel.cpf = '';
                    //Encerrar o Loading
                    encerrarLoading();
                })
                .catch((error) => {
                    //Analisar o erro
                    let response = error.response;
                    if (response.data.code == 'gr01') {
                        //Segue o sistema
                        encerrarLoading();
                        return true;
                    }
                    //Encerrar Loading
                    encerrarLoading();
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                });
        },
        passo_dadosEmpresa: function (e = false) {
            if (e) {
                e.preventDefault();
            }
            this.show = _.mapValues(this.show, () => false);
            this.show.dados_empresa = true;
        },
        passo_identidadeVisual: function (e = false) {
            if (e) {
                e.preventDefault();
            }
            this.show = _.mapValues(this.show, () => false);
            this.show.identidade_visual = true;
        },
        passo_responsavel: function (e = false) {
            if (e) {
                e.preventDefault();
            }
            this.show = _.mapValues(this.show, () => false);
            this.show.responsavel = true;
        },
        passo_plano: function (e = false) {
            if (e) {
                e.preventDefault();
            }

            this.show = _.mapValues(this.show, () => false);
            this.show.plano = true;
        },
        reinicializar: function () {
            //Reinicializar processo
            this.form.dados_responsavel = _.mapValues(this.form.dados_responsavel, () => false);
            this.form.identidade_visual = _.mapValues(this.form.identidade_visual, () => false);
            this.form.dados_empresa = _.mapValues(this.form.dados_empresa, () => false);
            this.form.endereco_empresa = _.mapValues(this.form.endereco_empresa, () => false);
            this.erros = {};
            this.show = _.mapValues(this.show, () => false);
            this.show.dados_empresa = true;
        },
        enviarForm: function(){
            /** Preparar **/
            this.show.finalizando = true;
            let sd = {
                endereco: {
                    cep: this.form.endereco_empresa.cep,
                    ibge_cidade: this.form.endereco_empresa.ibge,
                    nome_cidade: this.form.endereco_empresa.cidade,
                    uf: this.form.endereco_empresa.uf,
                    logradouro: this.form.endereco_empresa.logradouro,
                    numero: this.form.endereco_empresa.numero,
                    bairro: this.form.endereco_empresa.bairro,
                    complemento: this.form.endereco_empresa.complemento
                },
                pessoaJuridica: {
                    razao_social: this.form.dados_empresa.razao_social,
                    nome_fantasia: this.form.dados_empresa.nome_fantasia,
                    cnpj: this.form.dados_empresa.cnpj,
                    telefone_fixo: this.form.dados_empresa.telefone_fixo,
                    telefone_celular: this.form.dados_empresa.telefone_celular,
                    email: this.form.dados_empresa.email,
                    website: this.form.dados_empresa.website
                },
                pessoaFisica: {
                    nome: this.form.dados_responsavel.nome,
                    sobrenome: this.form.dados_responsavel.sobrenome,
                    cpf: this.form.dados_responsavel.cpf,
                    telefone_celular: this.form.dados_responsavel.telefone_celular,
                    email: this.form.dados_responsavel.email
                },
                conta: {
                    plano_selecionado: 'padrao'
                },
                configuracoes: {}
            }

            /** Fazer Inserção **/
            api.post("/sistema/beecontas", sd)
                .then((res) => {
                    this.show.finalizando = false;
                    chamarSucesso("A Bee Conta Foi Criada!");
                    //Atualizar Lista
                    this.$root.$emit('emit_bee_conta_gerenciar',true);
                })
                .catch((error) => {
                    this.show.finalizando = false;
                    //Saida dos erros
                    this.erros = tratarErroApi(error, error.response);
                });
            /** **/
        }
    },
    created() {
        //Listeners
        this.$root.$on('emit_nova_bee_conta', () => this.reinicializar());
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
