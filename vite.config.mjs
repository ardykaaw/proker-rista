import { fileURLToPath, URL } from 'node:url';
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import { PrimeVueResolver } from '@primevue/auto-import-resolver';
import Components from 'unplugin-vue-components/vite';
import path from 'path';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        Components({
            resolvers: [PrimeVueResolver()]
        })
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./src', import.meta.url)),
            '~': fileURLToPath(new URL('./node_modules', import.meta.url)),
            '@assets': fileURLToPath(new URL('./resources/assets', import.meta.url)),
            '@sass': fileURLToPath(new URL('./resources/sass', import.meta.url))
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
                    @import "./resources/scss/_variables.scss";
                `
            }
        }
    },
    optimizeDeps: {
        include: ['chart.js', 'primevue/resources/themes/lara-light-blue/theme.css']
    },
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: 'resources/js/app.js'
        }
    }
}); 