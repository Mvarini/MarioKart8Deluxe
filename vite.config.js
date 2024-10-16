import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/app_web.css', 'resources/js/app_web.js'],
            refresh: true,
        }),
    ],
});
