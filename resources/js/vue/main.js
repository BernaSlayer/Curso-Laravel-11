import { createApp } from "vue";

import '@mdi/font/css/materialdesignicons.min.css';
import Oruga from "@oruga-ui/oruga-next";

import App from "./App.vue";

import axios from "axios";


import router from "./router";

const app = createApp(App);

app.use(Oruga).use(router);

app.config.globalProperties.$axios = axios;
window.axios = axios;

app.mount("#app");