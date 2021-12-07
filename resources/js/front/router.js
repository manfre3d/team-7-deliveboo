import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import home from "./pages/Homepage.vue";
import test1 from "./pages/test1.vue";
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
            path: '/test1',
            name: 'test1',
            component: test1
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