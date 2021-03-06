/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from "vue-router";


//window.Vue = require('vue');


window.Vue = Vue;
Vue.use(VueRouter);

import Form from "./utilities/Form";
window.Form = Form;

import router from './routes';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('companyshow-component', require('./components/company/CompanyShowComponent.vue').default);
Vue.component('shift-component', require('./components/ShiftComponent.vue').default);
Vue.component('subsidiary-component', require('./components/SubsidiaryComponent.vue').default);
Vue.component('companycreate-component', require('./components/company/CompanyCreateComponent.vue').default);
Vue.component('subsidiaryindex-component', require('./components/subsidiary/SubsidiaryIndexComponent.vue').default);
Vue.component('subsidiarycreate-component', require('./components/subsidiary/SubsidiaryCreateComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
    router
});