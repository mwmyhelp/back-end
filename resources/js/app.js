/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('modulo-login', require('./modulos/login').default);
Vue.component('beeconta-modulo', require('./modulos/beeconta/modulo').default);
Vue.component('departamentos-modulo', require('./modulos/departamentos/modulo').default);
Vue.component('colaborador-gestao-modulo', require('./modulos/colaboradores/gestao/modulo').default);
Vue.component('colaborador-info-modulo',require('./modulos/colaboradores/info/modulo').default);
Vue.component('normativas-modulo',require('./modulos/normativas/modulo').default);
Vue.component('procedimentos-modulo',require('./modulos/procedimentos/modulo').default);
Vue.component('diagramas-modulo',require('./modulos/diagramas/modulo').default);
Vue.component('diagrama-editor',require('./modulos/diagramas/editor').default);

/** DevExtreme **/
import 'devextreme/dist/css/dx.light.css';

/** Importando o VueSweetAlert **/
import Vue from 'vue';
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

/** Importanto o CK Editor **/
import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use(CKEditor);

/** Importanto o The Mask **/
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask);

/** FontAwesome Picker **/
import VueFontAwesomePicker from "vfa-picker";
Vue.use(VueFontAwesomePicker)

/** Croppa **/
import 'vue-croppa/dist/vue-croppa.css'
import Croppa from 'vue-croppa'
Vue.use(Croppa)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
