import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/components/pages/HomePage.vue';

const routes = [
    {
        path: '/',
        component: HomePage,
    },
    {
        path: '/about',
        component: () => import('@/components/pages/AboutPage.vue'),
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notfound',
        component: () => import('@/components/pages/NotFoundPage.vue'),
    },
];

const router = createRouter({
    history: createWebHistory('/spa/'),
    routes,
});

export default router;
