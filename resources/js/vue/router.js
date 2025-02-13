import { createRouter, createWebHashHistory } from "vue-router";
import List from "./components/ListComponents.vue";
import Save from "./components/SaveComponent.vue";

const routes = [
    {
       name: "list",
       path: 'vue',
       component: List
    },
    {
        name: "save",
        path: 'vue/save',
        component: Save
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;