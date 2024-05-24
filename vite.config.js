import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/modules/Create.js',
                'resources/js/modules/List.js',
                'resources/js/modules/Update.js',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/assets/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
