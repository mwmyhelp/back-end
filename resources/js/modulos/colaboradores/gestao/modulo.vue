<template>
    <div class="container pt-4 pb-4">
        <div v-show="show.listaColaboradores">
            <div class="row">
                <div class="col-12 d-flex flex-column flex-lg-row">
                    <h3 class="text-gray-1 fw-300">
                        Colaboradores da minha empresa
                    </h3>
                    <div class="dropdown ms-lg-auto">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Lista de Ações
                        </button>
                        <ul class="dropdown-menu">
                            <li><a @click="adicionarColaborador" class="dropdown-item" href="#">Adicionar
                                Colaborador</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 col-lg-8">
                                    <label>Buscar pelo nome:</label>
                                    <input v-model="filtrocolab" type="text" class="form-control"/>
                                </div>
                                <div class="col-12 col-lg-2">
                                    <label>Max. Resultados:</label>
                                    <input v-model="numcolab" type="number" min="1" max="100" class="form-control"/>
                                </div>
                                <div class="col-12 col-lg-2">
                                    <label>&nbsp;</label>
                                    <button @click="tabelaColaboradores" class="btn btn-primary w-100 d-block">
                                        <i class="fal fa-filter me-2"></i>
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">

                    <div v-if="show.loading.tabelacolab" class="mt-3 pt-3 text-center">
                        <i class="fal fa-spinner fa-spin me-3"></i>
                        <h3 class="fw-200">Carregando colaboradores</h3>
                    </div>

                    <div class="card" v-show="!show.loading.tabelacolab">
                        <div class="card-body">
                            <ul class="list-group list-group-flush" v-for="colab in lista.tabelacolab">
                                <li class="list-group-item list-group-item-action d-flex align-items-center"
                                    aria-current="true">
                                    <div class="avatar mb-auto">
                                        <img :src="get_files_url+colab.usuario.imagem_perfil"
                                             class="img-thumbnail rounded-circle wp-100"/>
                                    </div>
                                    <div class="descricao d-flex flex-column ms-4">
                                        <b>{{ colab.nome }} {{ colab.sobrenome }}</b>
                                        <small class="text-muted">
                                            <div v-for="cargo in colab.cargos">
                                                <span
                                                    class="fw-300">{{ cargo.cargo.titulo }} em {{ cargo.cargo.departamento.titulo }}</span>
                                            </div>
                                            <br/>
                                            <b>CPF: </b>{{ colab.cpf }}
                                        </small>
                                        <small class="text-muted">
                                            {{ colab.usuario.email }}
                                        </small>

                                        <div class="d-flex align-items-center mt-3">
                                            <a :href="'/colaboradores/info?view&colab='+colab.id" class="btn btn-sm btn-outline-primary rounded-pill">
                                                Mais informações
                                            </a>
                                            <a @click="resetarSenha(colab.id_usuario,colab.nome + ' ' + colab.sobrenome)"
                                               href="#" class="btn btn-sm btn-outline-dark rounded-pill ms-3">
                                                Alterar Senha
                                            </a>

                                            <a onclick="indisponivel()" href="#"
                                               class="btn btn-sm btn-outline-danger rounded-pill ms-4">
                                                Bloquear Acesso
                                            </a>
                                        </div>

                                    </div>
                                    <div class="status ms-auto mb-auto d-flex flex-column g-3">
                                        <div v-if="colab.tipo_acesso == 'beelider'"
                                             class="badge bg-warning text-dark p-2">
                                            <i class="fal fa-star me-3"></i> Bee Líder
                                        </div>
                                        <div v-if="colab.tipo_acesso == 'beelider'"
                                             class="badge bg-primary text-white p-2 mt-2">
                                            <i class="fal fa-head-side-brain me-3"></i> Gestor
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div v-show="show.adicionarColaborador">
            <div class="nav-progress">
                <div v-bind:class="{ 'active' : show.etapaCadastro.etapa01, 'complete' : show.validado.etapa01 }">
                    <a @click="irParaEtapa1" href="#">Dados do Colaborador</a>
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div v-bind:class="{ 'active' : show.etapaCadastro.etapa02, 'complete' : show.validado.etapa02 }">
                    <a @click="irParaEtapa2" href="#">Institucional</a>
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div v-bind:class="{ 'active' : show.etapaCadastro.etapa03, 'complete' : show.validado.etapa03 }">
                    <a @click="irParaEtapa3" href="#">Desenvolvimento</a>
                    <div class="arrow-wrapper">
                        <div class="arrow-cover">
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div v-bind:class="{ 'active' : show.etapaCadastro.etapa04 }">
                    <a @click="irParaEtapa4" href="#">Outros</a>
                </div>
            </div>
            <div class="container mini-container">
                <div v-show="show.etapaCadastro.etapa01">
                    <div class="row mt-4">
                        <div class="col-md-12">

                            <form @submit="validarEtapa1">
                                <h3 class="text-gray-1 fw-300">
                                    Dados do Colaborador
                                </h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 col-lg-8">
                                                <label>CPF:</label>
                                                <input v-model="form.dados.cpf" required v-mask="'###.###.###-##'"
                                                       class="form-control" type="text"/>
                                                <small class="text-muted">
                                                    O CPF será utilizado para o login do usuário na plataforma.
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                <label>Nome:</label>
                                                <input v-model="form.dados.nome" required class="form-control"
                                                       type="text"/>
                                            </div>
                                            <div class="col-12">
                                                <label>Sobrenome:</label>
                                                <input v-model="form.dados.sobrenome" required class="form-control"
                                                       type="text"/>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <label>Telefone Celular:</label>
                                                <input v-model="form.dados.celular" v-mask="'(##) #####-####'"
                                                       class="form-control" type="text"/>
                                            </div>
                                            <div class="col-12">
                                                <label>E-mail:</label>
                                                <input v-model="form.dados.email" class="form-control" type="email"/>
                                                <small class="text-muted">
                                                    O e-mail pode ser adicionado em outro momento.
                                                </small>
                                            </div>

                                            <div class="col-12 col-lg-8">
                                                <label>Nascimento:</label>
                                                <input v-model="form.dados.nascimento" required class="form-control"
                                                       type="date"/>
                                            </div>

                                            <div class="col-12 col-lg-4">
                                                <label>Tipo Sanguíneo:</label>
                                                <input v-model="form.dados.sangue" class="form-control" type="text"/>
                                            </div>

                                            <div class="col-12 col-lg-8">
                                                <label>Estado Civil:</label>
                                                <select v-model="form.dados.estado_civil" class="form-control">
                                                    <option value="solteiro">
                                                        Solteiro(a)
                                                    </option>
                                                    <option value="casado">
                                                        Casado(a)
                                                    </option>
                                                    <option value="divorciado">
                                                        Divorciado(a)
                                                    </option>
                                                    <option value="viuvo">
                                                        Viuvo(a)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a class="text-primary" data-bs-toggle="collapse" href="#collapseFotoColaborador">
                                        Adicionar foto ao colaborador <i class="fal fa-chevron-down ms-2"></i>
                                    </a>
                                </div>

                                <div class="collapse border-top mt-3 pt-3" id="collapseFotoColaborador">
                                    <h3 class="text-gray-1 fw-300">
                                        Foto do Colaborador:
                                    </h3>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-12 pe-5 ps-5">
                                                    <div class="me-5 ms-5">
                                                        <img
                                                            src="https://via.placeholder.com/300x300.png?text=Carregue+a+foto"
                                                            class="w-100 border"/>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <small class="text-muted">
                                                        *300 x 150 ou proporcional.
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-end mt-3">
                                    <button class="btn-primary btn" type="submit">
                                        <i class="fal fa-save me-2"></i>
                                        Continuar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div v-show="show.etapaCadastro.etapa02">
                    <div class="row mt-4">
                        <div class="col-md-12">

                            <form @submit="validarEtapa2">
                                <div class="alert alert-light justify-content-between d-flex border rounded">
                                    <i class="fal fa-comment-exclamation me-3"></i>
                                    Nenhuma das informações institucionais do colaborador não são obrigatórias.<br/>
                                    Essas informações podem ser alteradas a qualquer momento no painel do colaborador.
                                </div>
                                <h3 class="text-gray-1 fw-300 mt-3">
                                    Informações Corporativas:
                                </h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-7">
                                                <label>Data de Admissão:</label>
                                                <input v-model="form.institucional.admissao" required
                                                       class="form-control" type="date"/>
                                            </div>
                                            <div class="col-5">
                                                <label>Tipo de Acesso:</label>
                                                <select required v-model="form.institucional.tipo_acesso"
                                                        class="form-control">
                                                    <option value="padrao" selected>Padrão</option>
                                                    <option value="gestor">Gestor</option>
                                                    <option value="beelider">Bee Líder</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-1">
                                            <div class="col-12">
                                                <label>Chefia Imediata: <span v-if="show.loading.colaboradores"><i
                                                    class="fal fa-spin fa-spinner me-2"></i> <small>carregando...</small></span>
                                                </label>
                                                <treeselect
                                                    :options="lista.colaboradores"
                                                    placeholder="Quem é seu gestor?"
                                                    v-model="form.institucional.chefia_imediata"
                                                >
                                                </treeselect>
                                            </div>
                                            <div class="col-12">
                                                <label>Posições Ocupadas: <span v-if="show.loading.posicoes"><i
                                                    class="fal fa-spin fa-spinner me-2"></i> <small>carregando...</small></span>
                                                </label>
                                                <treeselect
                                                    :multiple="true"
                                                    :options="lista.posicoes"
                                                    placeholder="Selecione..."
                                                    v-model="form.institucional.posicoes_ocupadas"
                                                    :disable-branch-nodes="true"
                                                    :show-count="true"
                                                >
                                                </treeselect>
                                                <small class="text-muted">
                                                    Não se preocupe, você pode preencher o cargo e papeis de liderança
                                                    em outro momento.
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                <label>Empresa Anterior:</label>
                                                <input v-model="form.institucional.empresa_aterior" type="text"
                                                       class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-end mt-3">
                                    <button class="btn-primary btn">
                                        <i class="fal fa-save me-2"></i>
                                        Continuar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div v-show="show.etapaCadastro.etapa03">
                    <div class="row mt-4">
                        <div class="col-md-12">

                            <form @submit="validarEtapa3">
                                <div class="alert alert-light justify-content-between d-flex border rounded">
                                    <i class="fal fa-comment-exclamation me-3"></i>
                                    Informações de desenvolvimento profissional são importantes para que os gestores
                                    tenham conhecimento das habilidades dos colaboradores.
                                    <br/>
                                    É importante manter atualizado essas informações.
                                </div>
                                <h3 class="text-gray-1 fw-300">
                                    Desenvolvimento Profissional
                                </h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label>Experiências Profissionais:</label>
                                                <textarea v-model="form.desenvolvimento.experiencias" rows="5"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label>Nível de Formação:</label>
                                                <select required v-model="form.desenvolvimento.nivel_formacao"
                                                        class="form-control">
                                                    <option value="noin">Não Informar</option>
                                                    <option value="nuncaestudou">Nunca Estudou</option>
                                                    <option value="fundamental">Ensino Fundamental Completo</option>
                                                    <option value="medio">Ensino Médio Completo</option>
                                                    <option value="superior_cursando">Cursando Ensino Superior</option>
                                                    <option value="superior_completo">Ensino Superior Completo</option>
                                                    <option value="pos_cursando">Cursando Pós Graduação</option>
                                                    <option value="pos_completo">Pós Graduação Completa</option>
                                                    <option value="mestrado">Mestrado</option>
                                                    <option value="doutorado">Doutorado</option>
                                                </select>
                                                <small class="text-muted">
                                                    Baseado na formação atual (ou última concluida).
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                <label>Descreva as formações acadêmicas:</label>
                                                <textarea v-model="form.desenvolvimento.formacao_academica" rows="5"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label>Habilidades Naturais:</label>
                                                <textarea v-model="form.desenvolvimento.habilidades_naturais" rows="5"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label>Habilidades Profissionais:</label>
                                                <textarea v-model="form.desenvolvimento.habilidades_profissionais"
                                                          rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label>Como vem ao trabalho:</label>
                                                <select required v-model="form.desenvolvimento.vem_ao_trabalho"
                                                        class="form-control">
                                                    <option value="transporte_publico">Transporte público</option>
                                                    <option value="transporte_privado">Serviço de transporte privado
                                                    </option>
                                                    <option value="ape">A pé</option>
                                                    <option value="veiculo_proprio">Veículo próprio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-end mt-3">
                                    <button class="btn-primary btn">
                                        <i class="fal fa-save me-2"></i>
                                        Continuar
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div v-show="show.etapaCadastro.etapa04">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <form @submit="validarEtapa4">
                                <h3 class="text-gray-1 fw-300">
                                    Outras Informações
                                </h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">

                                            <div class="col-6">
                                                <label>Número de Filhos:</label>
                                                <input v-model="form.outros.numero_filhos" value="0" type="number"
                                                       class="form-control"/>
                                            </div>

                                            <div class="col-12">
                                                <label>Idades:</label>
                                                <input v-model="form.outros.idade_filhos" type="text"
                                                       class="form-control"/>
                                            </div>

                                            <div class="col-12">
                                                <label>Objetivos de Vida:</label>
                                                <textarea v-model="form.outros.objetivos_vida" rows="5"
                                                          class="form-control"></textarea>
                                            </div>

                                            <div class="col-12">
                                                <label>Atividades de Lazer:</label>
                                                <textarea v-model="form.outros.atividades_lazer" rows="5"
                                                          class="form-control"></textarea>
                                            </div>

                                            <div class="col-12">
                                                <label>Gostos por Comida:</label>
                                                <textarea v-model="form.outros.gostos_comida" rows="5"
                                                          class="form-control"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-end mt-3">
                                    <button class="btn-primary btn">
                                        <i class="fal fa-save me-2"></i>
                                        Finalizar
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div v-show="show.loading.salvando">
                    <div class="row mt-4">
                        <div class="col-md-12 pt-4 mt-3">
                            <div class="text-center">
                                <i class="fa-spin fal fa-spinner me-2 fa-2x"></i>
                                <h3 class="fw-200">Salvando...</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {api, get_files_url} from "../../../helpers/Request";

//TreeSelect
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'


export default {
    name: "modulo",
    components: {
        Treeselect
    },
    data: function () {
        return {
            get_files_url,
            show: {
                listaColaboradores: true,
                adicionarColaborador: false,
                etapaCadastro: {
                    etapa01: true,
                    etapa02: false,
                    etapa03: false,
                    etapa04: false
                },
                validado: {
                    etapa01: false,
                    etapa02: false,
                    etapa03: false
                },
                loading: {
                    posicoes: false,
                    salvando: false,
                    colaboradores: false,
                    tabelacolab: true,
                }
            },
            form: {
                dados: {
                    cpf: '',
                    nome: '',
                    sobrenome: '',
                    celular: '',
                    email: '',
                    nascimento: '',
                    sangue: '',
                    estado_civil: ''
                },
                institucional: {
                    admissao: '',
                    tipo_acesso: '',
                    chefia_imediata: null,
                    posicoes_ocupadas: [],
                    empresa_aterior: ''
                },
                desenvolvimento: {
                    experiencias: '',
                    nivel_formacao: '',
                    formacao_academica: '',
                    habilidades_naturais: '',
                    habilidades_profissionais: '',
                    vem_ao_trabalho: ''
                },
                outros: {
                    numero_filhos: 0,
                    idade_filhos: '',
                    objetivos_vida: '',
                    atividades_lazer: '',
                    gostos_comida: ''
                }
            },
            lista: {
                posicoes: null,
                colaboradores: null,
                tabelacolab: {}
            },
            filtrocolab: '',
            numcolab: '5'
        }
    },
    methods: {
        validarEtapa1: function (e) {
            e.preventDefault();
            /** Se rodou aqui é porque validou **/
            this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
            this.show.etapaCadastro.etapa02 = true;
            this.show.validado.etapa01 = true;
        },
        validarEtapa2: function (e) {
            e.preventDefault();
            /** Se rodou aqui é porque validou **/
            this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
            this.show.etapaCadastro.etapa03 = true;
            this.show.validado.etapa02 = true;
        },
        validarEtapa3: function (e) {
            e.preventDefault();
            /** Se rodou aqui é porque validou **/
            this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
            this.show.etapaCadastro.etapa04 = true;
            this.show.validado.etapa03 = true;
        },
        validarEtapa4: function (e) {
            e.preventDefault();
            /** Se rodou aqui é porque validou **/
            this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
            this.show.loading.salvando = true;
            //Tratando dados
            this.form.dados.cpf = this.form.dados.cpf.replace(/[^\d]+/g, '');
            //Rodar API
            api.post("/empresa/colaboradores/criar", this.form)
                .then((res) => {
                    //Sucesso
                    chamarSucesso(res.data.msg);
                    //Encerrar o Loading
                    this.show.loading.salvando = false;
                    this.show.etapaCadastro.etapa04 = true;
                    this.show.adicionarColaborador = false;
                    this.show.listaColaboradores = true;
                    //Atualizar Lista de Colaboradores
                    this.dropdownColaboradores();
                })
                .catch((error) => {
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.salvando = false;
                    this.show.etapaCadastro.etapa04 = true;
                });
        },
        irParaEtapa1: function () {
            this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
            this.show.etapaCadastro.etapa01 = true;
        },
        irParaEtapa2: function () {
            if (this.show.validado.etapa01) {
                this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
                this.show.etapaCadastro.etapa02 = true;
            }
        },
        irParaEtapa3: function () {
            if (this.show.validado.etapa02) {
                this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
                this.show.etapaCadastro.etapa03 = true;
            }
        },
        irParaEtapa4: function () {
            if (this.show.validado.etapa03) {
                this.show.etapaCadastro = _.mapValues(this.show.etapaCadastro, () => false);
                this.show.etapaCadastro.etapa04 = true;
            }
        },
        adicionarColaborador: function () {
            //Zerando valores
            this.form.dados = _.mapValues(this.form.dados, () => '');
            this.form.institucional = _.mapValues(this.form.institucional, () => '');
            this.form.institucional.chefia_imediata = null;
            this.form.institucional.posicoes_ocupadas = null;
            this.form.desenvolvimento = _.mapValues(this.form.desenvolvimento, () => '');
            this.form.outros = _.mapValues(this.form.outros, () => '');
            this.form.outros.numero_filhos = 0;
            //Etapa
            this.irParaEtapa1();
            this.show.validado = _.mapValues(this.show.validado, () => false);
            //Tela
            this.show.listaColaboradores = false;
            this.show.adicionarColaborador = true;
        },
        dropdownColaboradores: function () {
            this.show.loading.colaboradores = true;
            /** Carregar Colaboradores **/
            api.get("/beeceo/geral/estrutura_colaboradores")
                .then((res) => {
                    this.lista.colaboradores = res.data.dados;
                    this.show.loading.colaboradores = false;
                })
                .catch((error) => {
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.colaboradores = false;
                });
        },
        tabelaColaboradores: function () {
            /** Carregar Colaboradores **/
            this.show.loading.tabelacolab = true;
            //Axios
            api.get("/empresa/colaboradores?nome=" + this.filtrocolab + "&num=" + this.numcolab)
                .then((res) => {
                    //Sucesso
                    this.lista.tabelacolab = res.data.dados;
                    //Encerrar o Loading
                    this.show.loading.tabelacolab = false;
                })
                .catch((error) => {
                    //Saida de outros erros
                    this.erros = tratarErroApi(error, error.response);
                    this.show.loading.tabelacolab = false;
                });
        },
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
        }
    },
    created() {
        /** Carregar a Estrutura de Papeis **/
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
        //Colab
        this.dropdownColaboradores();
        this.tabelaColaboradores();
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
