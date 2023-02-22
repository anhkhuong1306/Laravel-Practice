import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './stores';
import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://localhost:80';

Vue.config.productionTip = false;
new Vue({
    store,
    router,
    render: history => history(App)
}).$mount('#app');
