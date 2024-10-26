import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Core CSS files
                'resources/assets/vendor/css/core.css',
                'resources/assets/vendor/css/theme-default.css',
                'resources/assets/css/demo.css',
                'resources/assets/vendor/fonts/boxicons.css',

                // Vendor CSS (for specific plugins)
                'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
                'resources/assets/vendor/libs/apex-charts/apex-charts.css',
                // auth
                'resources/assets/vendor/css/pages/page-auth.css',

                // Main CSS entry point
                'resources/css/app.css',
                // Main JS entry point
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

});

