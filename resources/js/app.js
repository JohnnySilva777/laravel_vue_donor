require('./bootstrap');

import Vue from 'vue'

import App from './vue/app'

Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');

const app = new Vue({
    el: '#app',
    component: { App },
    render: h => h(App)
});
