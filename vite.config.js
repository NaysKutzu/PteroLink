import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
 
export default defineConfig({
    plugins: [
        laravel(['resources/scripts/app.jsx']),
        react(),
    ],
    server: {
        port: 1234,
        host: '192.168.1.239',
        hmr: {
            host: '192.168.1.239',
        },
    },
    resolve: {
        alias: {
            '@': '/resources/scripts',
        },
    },
});