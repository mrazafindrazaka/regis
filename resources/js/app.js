/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.$ = require('jquery');
window.JQuery = require('jquery');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/CreateQuittanceComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('create-quittance-component', require('./components/CreateQuittanceComponent.vue').default);
Vue.component('detail-quittance-component', require('./components/DetailQuittanceComponent.vue').default);
Vue.component('quittance-component', require('./components/QuittanceComponent.vue').default);

Vue.component('create-facture-component', require('./components/CreateFactureComponent.vue').default);
Vue.component('detail-facture-component', require('./components/DetailFactureComponent.vue').default);
Vue.component('facture-component', require('./components/FactureComponent.vue').default);

Vue.mixin({
    methods: {
        redirect_path: function (path) {
            window.location.href = path;
        }
    }
});

Vue.use(require('vue-moment'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
