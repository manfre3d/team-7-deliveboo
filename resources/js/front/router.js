import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import home from "./pages/Homepage.vue";
import advanced_search from "./pages/AdvancedSearch.vue";
import test2 from "./pages/test2.vue";
import NotFound from "./pages/NotFound.vue";



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: home
        },
        {
            path: '/advanced_search',
            name: 'advanced_search',
            component: advanced_search
        },
        {
            path: '/test2',
            name: 'test2',
            component: test2,
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        },
    ],
});

export default router;