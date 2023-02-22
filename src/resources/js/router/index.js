import * as Vue from 'vue';
import * as VueRouter from 'vue-router';
import store from '../stores';
import Home from '../views/Home.vue';
import DashBoard from '../pages/HomeView.vue';
import Register from '../views/Register';
import Login from '../views/Login';
import Posts from '../views/Posts';
import NotFound from '../views/NotFound';
import {createWebHistory} from "vue-router";


const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
        meta: { guest: true },
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
      meta: { guest: true }
    },
    {
        path: '/posts',
        name: 'Posts',
        component: Posts,
        meta: { requiresAuth: true },
    },
    {   path: '/404',
        name: '404',
        component: NotFound
    },
    {
        path: '/:catchAll(.*)',
        redirect: '/404'
    },
];

const router = VueRouter.createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isAuthenticated) {
            next();
            return;
        }
        next('/login');
    } else {
        next();
    }
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.guest)) {
        if (store.getters.isAuthenticated) {
            next('/posts');
            return;
        }
        next();
    } else {
        next();
    }
});

export default router;
