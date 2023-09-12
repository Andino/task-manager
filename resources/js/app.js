import './bootstrap';

import {createApp} from 'vue'

import App from './App.vue' 

import {createRouter, createWebHistory} from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('./pages/Homepage.vue')
        }
    ],
})

const app = createApp(App)
    .use(router)
    .mount('#app')