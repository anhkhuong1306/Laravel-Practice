import * as Vue from 'vue';
import * as Vuex from 'vuex';
import App from './App.vue';
import router from "./router";
import store from "./stores";
import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:80";

axios.interceptors.response.use(undefined, function(error) {
    if (error) {
        const originalRequest = error.config;
        if (error.response.status === 401 && !originalRequest._retry) {
            originalRequest._retry = true;
            store.dispatch("LogOut");
            return router.push("/login");
        }
    }
});

const app = Vue.createApp(App)

app.use(store);
app.use(router);
app.use(Vuex);

app.mount('#app')
