import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // Importa el plugin de Vue
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/vue/main.js' // Asegúrate de incluir tu archivo Vue
            ],
            refresh: true,
        }),
        vue(), // Agrega el plugin de Vue
    ],
});