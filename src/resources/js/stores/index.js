import * as Vuex from 'vuex';
import * as Vue from 'vue';
import createPersistedState from 'vuex-persistedstate';
import auth from './modules/auth';
import nav from './modules/nav';

export default new Vuex.createStore({
    modules: {
        auth,
        nav,
    },
    plugins: [createPersistedState()]
})
