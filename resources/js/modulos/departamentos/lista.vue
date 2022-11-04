<template>
    <div id="listaGeral">
        <div class="d-flex align-items-center">
            <i class="fal fa-list me-2"></i>
            <div>
                Listagem
            </div>
            <div v-if="show.loading" class="ms-2">
                <i class="fal fa-spin fa-spinner"></i>
            </div>
            <div class="ms-auto">
                <button @click="toggleSearch" type="button" class="btn btn-listagem" data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Filtrar">
                    <i class="fal fa-search"></i>
                </button>
                <button @click="novoDepartamento" type="button" class="btn btn-listagem" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Adicionar Departamento">
                    <i class="fal fa-plus"></i>
                </button>
            </div>
        </div>
        <DxTreeView
            ref="listaRef"
            id="listaRef"
            :items="lista"
            width="100%"
            :search-enabled="show.search"
            :searchEditorOptions="{placeholder:'Filtrar'}"
            :selectByClick="true"
            selectionMode="single"
            items-expr="filhos"
            key-expr="id"
            search-expr="titulo"
            noDataText="Nada a exibir"
        >
            <template #item="item">
                <div class="d-flex align-items-center">
                    <a class="d-flex align-items-center" href="#" @click="clicarItem(item.data)">
                        <span>
                            {{ item.data.emoji}}&nbsp;{{ item.data.titulo }}
                        </span>
                    </a>
                    <div class="ms-auto d-flex align-items-center">

                        <div class="dropdown">
                            <button class="btn btn-listagem dropdown-toggle lista-bugada" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-boundary="window">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Mais ações">
                                    <i class="far fa-ellipsis-h"></i>
                                </div>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a @click="carregarDepartamento(item.data.id)" class="dropdown-item" href="#"><i class="fal fa-check-square fa-fw me-2"></i> Selecionar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a @click="renomearDepartamento(item.data.id,item.data.titulo)" class="dropdown-item" href="#"><i class="fal fa-i-cursor fa-fw me-2"></i>Renomear</a></li>
                                <li><a @click="carregarDepartamento(item.data.id)" class="dropdown-item" href="#"><i class="fal fa-edit fa-fw me-2"></i>Editar</a></li>
                                <li><a onclick="indisponivel()" class="dropdown-item" href="#"><i class="fal fa-star fa-fw me-2"></i>Favoritar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a onclick="indisponivel()" class="dropdown-item" href="#"><i class="fal fa-link fa-fw me-2"></i>Obter Link</a></li>
                                <li><a @click="arquivarDepartamento(item.data.id,item.data.titulo)" class="dropdown-item" href="#"><i class="fal fa-archive fa-fw me-2"></i>Arquivar</a></li>
                            </ul>
                        </div>

                        <button @click="novoSubdepartamento(item.data.id,item.data.titulo)" class="btn btn-listagem"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Adicionar Departamento Secundário">
                            <i class="fal fa-plus"></i>
                        </button>
                    </div>
                </div>
            </template>
        </DxTreeView>
    </div>
</template>

<script>
import DxTreeView from 'devextreme-vue/tree-view';
import {api} from "../../helpers/Request";

export default {
    name: "lista",
    components: {
        DxTreeView,
    },
    data: function () {
        return {
            show: {
                search: false,
                loading: false
            },
            lista: []
            ,
            selecionado: {

            }
        }
    },
    methods: {
        /** Locais **/
        toggleSearch: function () {
            this.show.search = !this.show.search;
        },
        /** Emitir Eventos **/
        clicarItem: function (item) {
            //Emitir chamada e enviar item
            this.$emit('itemClicado', item);
            //Selecionar
            this.selecionado = item;
        },
        carregarDepartamento: function(id){
            //Emitir chamada
            this.$emit('carregarDepartamento',id);
        },
        novoDepartamento: function () {
            //Emitir chamada
            this.$emit('novoDepartamento');
        },
        novoSubdepartamento: function (id, titulo) {
            //Emitir chamada
            this.$emit('novoSubdepartamento', id, titulo);
        },
        renomearDepartamento: function (id,titulo){
            //Emitir chamada
            this.$emit('renomearDepartamento', id, titulo);
        },
        arquivarDepartamento: function (id,titulo){
            //Emitir chamada
            this.$emit('arquivarDepartamento', id, titulo);
        },
        carregarDepartamentos: function () {
            //Loading
            this.show.loading = true;
            //Axios
            api.get("/empresa/departamentos?modelo=arvore")
                .then((res) => {
                    this.lista = res.data.dados;
                })
                .catch((error) => {
                    //Saida dos erros
                    this.erros = tratarErroApi(error, error.response);
                })
                .finally(() => {
                    //Encerrar o Loading
                    this.show.loading = false;
                    //Selecionar o item?
                    let tree = this.$refs["listaRef"].instance;
                    tree.selectItem(this.selecionado);
                });
            ;
        },
    }
}
</script>
<style>

.dx-state-selected {
    background-color: rgba(0, 0, 0, .05);
    color: var(--cor-primaria) !important;
}

.dx-treeview-item {
    padding: 0px;
    color: #647795 !important;
    background-color: transparent !important;
}

.dx-item-content span {
    text-transform: capitalize !important;
}

.dx-treeview-node {
    transition: all 0.3s;
}

.dx-treeview-toggle-item-visibility {
    color: #647795 !important;
    top: 3px;
}

.dx-treeview-node:hover {
    background-color: rgba(0, 0, 0, .06);
}

.dx-treeview-node[aria-expanded="true"]:hover {
    background-color: transparent;
}
</style>
<style scoped>

</style>
