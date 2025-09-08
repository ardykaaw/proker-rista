import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

// Set base URL for API calls
window.axios.defaults.baseURL = window.location.origin;

console.log('Bootstrap loaded successfully');
