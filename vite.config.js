import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {exec} from 'child_process';

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
    build: {
        rollupOptions: {
            output: {
                dir: 'public/build',
            },
        },
        // Run the copy command after the build completes
        writeBundle() {
            exec('npm run copy-assets', (error, stdout, stderr) => {
                if (error) {
                    console.error(`Error copying assets: ${error.message}`);
                    return;
                }
                if (stderr) {
                    console.error(`Error: ${stderr}`);
                    return;
                }
                console.log(`Assets copied successfully: ${stdout}`);
            });
        },
    },
});

