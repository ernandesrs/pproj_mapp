import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin/app.css', 'resources/js/admin/app.js',

                'resources/css/dash/app.css', 'resources/js/dash/app.js',

                'resources/css/auth/app.css', 'resources/js/auth/app.js',
            ],
            refresh: true,
        }),
    ],
});
