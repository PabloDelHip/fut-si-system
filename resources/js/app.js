/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from './routes';
import store from './store';
const VueGoogleMaps = require('vue2-google-maps');
import Geocoder from "@pderas/vue2-geocoder";
import Select2 from 'v-select2-component';
import SelectCiudades from './components/SelectCiudadesComponent.vue';
// import VeeValidate from 'vee-validate';
import * as VeeValidate from 'vee-validate';
import { localize } from 'vee-validate';
import es from 'vee-validate/dist/locale/es.json';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueRouter from 'vue-router'


// Activate the español locale.
localize('es',es);


window.Vue = require('vue');
Vue.use(Select2);
Vue.use(SelectCiudades);
Vue.use(VeeValidate);
Vue.use(VueSweetalert2);
Vue.use(VueRouter)


Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyDEsVicSEB-OMgHjVwdjaFi4KXYtWCOYgU',
      libraries: 'places'
    }
  });

  Vue.use(Geocoder, {
    defaultCountryCode: null, // e.g. 'CA'
    defaultLanguage:    null, // e.g. 'en'
    defaultMode:        'address', // or 'lat-lng'
    googleMapsApiKey:   'AIzaSyDEsVicSEB-OMgHjVwdjaFi4KXYtWCOYgU'
});

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
Vue.component('instalaciones-component', require('./components/InstalacionesComponent.vue').default);
Vue.component('organizacion-component', require('./components/OrganizacionComponent.vue').default);
Vue.component('categoria-component', require('./components/CategoriaComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store
});
