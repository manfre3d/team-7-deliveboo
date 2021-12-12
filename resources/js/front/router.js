import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import Home from "./pages/Homepage.vue";
import Restaurant from "./pages/Restaurant.vue";
import NotFound from "./pages/NotFound.vue";




const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/restaurant/:slug',
            name: 'Restaurant',
            component: Restaurant
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        },
    ],
});

export default router;