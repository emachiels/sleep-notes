import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.tsx'],
            refresh: true,
        })
    ],
    build: {
        target: 'es2020'
    },
    server: {
        port: 3000,
        host: '0.0.0.0'
    },
    optimizeDeps: {
        include: [
            '@inertiajs/inertia',
            '@inertiajs/inertia-react'
        ]
    }
});
