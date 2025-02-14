import { createRouter, createWebHistory } from "vue-router";
import List from "./components/ListComponent.vue";
import Save from "./components/SaveComponent.vue";

const routes = [
    {
        path: '/',
        redirect: '/vue'
    },
    {
        name: "list",
        path: '/vue',
        component: List
    },
    {
        name: "save",
        path: '/vue/save:slug?',
        component: Save,
        props: true
    },
    {
        name: 'edit',
        path: '/vue/edit',
        component: Save
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;