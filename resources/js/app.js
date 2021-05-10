require('./bootstrap');

import Vue from 'vue'

// import money from 'v-money'
// Vue.use(money, {precision: 4})

import App from './vue/app.vue'

// make jw pagination component available in application
import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);

Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');

axios.get(`api/donors/${Vue.prototype.$userId}`)
    .then(response => {
        Vue.prototype.$user = response.data
    })
    .catch(error => {
        console.log(error)
    })

Vue.prototype.$selectOrg = {
    id: 0
};

const app = new Vue({
    el: '#app',
    component: { App },
    render: h => h(App)
});
