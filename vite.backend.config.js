import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        chunkSizeWarningLimit: 1600,
        outDir: 'public/build/backend',
        emptyOutDir: true,
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: ({ name }) => {
                    if (/\.css$/.test(name ?? '')) {
                        return 'assets/css/[name]-[hash][extname]';
                    }

                    if (/\.(gif|jpe?g|png|svg|webp)$/.test(name ?? '')) {
                        return 'assets/images/[name]-[hash][extname]';
                    }

                    if (/\.(ttf|woff|woff2|eot)$/.test(name ?? '')) {
                        return 'assets/fonts/[name]-[hash][extname]';
                    }

                    return 'assets/[name]-[hash][extname]';
                }
            },
        }
    },
    plugins: [
        laravel({
            buildDirectory: 'build/backend',
            input: [
                'resources/css/backend/app.css',
                'resources/js/backend/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@assets': '/public/assets/',
        },
    },
});
