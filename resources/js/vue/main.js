import { createApp } from 'vue';

import 'tailwindcss/tailwind.css';
import '@mdi/font/css/materialdesignicons.min.css';
import '../../css/vue.css';
import '@oruga-ui/theme-oruga/dist/oruga.css'; // Agregar esta línea
import Oruga from '@oruga-ui/oruga-next';


import App from './App.vue';

import axios from 'axios';

import router from './router';



const app = createApp(App);

app.use(router);
app.use(Oruga);

app.config.globalProperties.$axios = axios;
window.axios = axios;

app.mount('#app');
