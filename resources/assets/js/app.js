
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

Vue.component('table-users', require('./components/_users/UserTable'));
Vue.component('trow-user', require('./components/_users/UserRow'));
Vue.component('button-add-user', require('./components/_users/AddUser'));
Vue.component('loader', require('./components/Loader.vue'));

const app = new Vue({
    el: '#app'
});
