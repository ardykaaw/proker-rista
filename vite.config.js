import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        outDir: 'public/build',
        assetsDir: 'assets',
        // Optimize for limited resources
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['vue', 'vue-router'],
                    utils: ['axios']
                }
            }
        },
        // Reduce memory usage
        chunkSizeWarningLimit: 1000,
        sourcemap: false,
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    // Optimize for shared hosting
    optimizeDeps: {
        include: ['vue', 'vue-router', 'axios']
    },
    esbuild: {
        // Reduce memory usage
        target: 'es2015',
        minifyIdentifiers: true,
        minifySyntax: true,
        minifyWhitespace: true,
    }
});
