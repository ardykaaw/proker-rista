import './bootstrap';
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

console.log('Starting Vue application...');

try {
    const app = createApp(App)
    app.use(router)
    
    // Global error handler
    app.config.errorHandler = (err, instance, info) => {
        console.error('Global Vue Error:', err, info);
        const loading = document.getElementById('loading');
        if (loading) {
            loading.innerHTML = `
                <div style="text-align: center; color: #e53e3e;">
                    <h3>Application Error</h3>
                    <p>Error: ${err.message}</p>
                    <p>Info: ${info}</p>
                    <button onclick="location.reload()" style="margin-top: 20px; padding: 10px 20px; background: #3182ce; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Reload Page
                    </button>
                </div>
            `;
        }
    };
    
    app.mount('#app')
    console.log('Vue app mounted successfully');
} catch (error) {
    console.error('Failed to create Vue app:', error);
    const loading = document.getElementById('loading');
    if (loading) {
        loading.innerHTML = `
            <div style="text-align: center; color: #e53e3e;">
                <h3>Failed to Initialize Application</h3>
                <p>Error: ${error.message}</p>
                <button onclick="location.reload()" style="margin-top: 20px; padding: 10px 20px; background: #3182ce; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Reload Page
                </button>
            </div>
        `;
    }
}
