require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue';
import VueToastify from 'vue-toastify';

Vue.use(VueToastify);
Vue.component('contact-component', require('./components/Contact.vue').default)

const app = new Vue({
    el: '#app'
})
