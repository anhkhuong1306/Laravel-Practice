import axios from "axios";
const state = {
    user: null,
    posts: null,
};

const getters = {
    isAuthenticated: state => !!state.user,
    StateUser: state => state.user,
};

const actions = {
    async Register({dispatch}, form) {
        await axios.post('register', form);
        let UserForm = new FormData();
        UserForm.append('email', form.username);
        UserForm.append('password', form.password);
        await dispatch('LogIn', UserForm);
    },

    async LogIn({commit}, User) {
        await axios.post('/api/admin/login', User);
        await commit('setUser', User.get('email'));
    },

    async LogOut({commit}) {
        let user = null;
        commit('LogOut', user);
    }
};

const mutations = {
    setUser(state, username) {
        state.user = username;
    },
    LogOut(state) {
        state.user = null;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
