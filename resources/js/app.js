import './bootstrap';

import {createApp} from 'vue'

import App from './App.vue'

import {createRouter, createWebHistory} from 'vue-router';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faTrash, faEdit } from '@fortawesome/free-solid-svg-icons'
import Notifications from '@kyvg/vue3-notification'

/* add icons to the library */
library.add([faTrash, faEdit])

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
    .component('font-awesome-icon', FontAwesomeIcon)
    .use(router)
    .use(Notifications)
    .mount('#app')
