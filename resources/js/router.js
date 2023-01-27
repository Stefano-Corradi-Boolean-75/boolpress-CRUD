import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contacts from './pages/Contacts.vue';
import Error404 from './pages/Error404.vue';
import Blog from './pages/Blog.vue';
import PostDetail from './pages/PostDetail.vue';

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/blog/dettaglio-post/:slug',
            name: 'detail',
            component: PostDetail
        },
        {
            // rotta per 404 da mettere in fondo alle altre rotte
            path: '/:pathMatch(.*)*',
            component: Error404
        }
    ]

});

export { router };
